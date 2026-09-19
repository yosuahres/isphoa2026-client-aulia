<?php

namespace App\Support;

/**
 * Derived SEO values for the public site.
 *
 * Ported from apps/web/src/lib/seo.ts. The content itself lives in
 * config/isphoa.php; this only assembles the strings the <head> needs.
 */
class Seo
{
    /**
     * Canonical origin for the deployed site.
     *
     * APP_URL wins so local and staging emit their own URLs; the seminar's own
     * domain is the fallback for when the variable is missing in production,
     * because a canonical pointing at http://localhost is worse than one
     * pointing at the right host.
     */
    public static function siteUrl(): string
    {
        $configured = trim((string) config('app.url'));

        if ($configured === '' || str_contains($configured, 'localhost')) {
            return rtrim((string) config('isphoa.event.website'), '/');
        }

        return rtrim($configured, '/');
    }

    public static function absoluteUrl(string $path): string
    {
        return static::siteUrl().(str_starts_with($path, '/') ? $path : '/'.$path);
    }

    /** "ISPhOA 2026" */
    public static function siteName(): string
    {
        return config('isphoa.event.shortName').' '.config('isphoa.event.edition');
    }

    /** Social cards have room for the expansion the tab title leaves out. */
    public static function socialTitle(?string $pageTitle = null): string
    {
        return $pageTitle
            ? $pageTitle.' · '.static::siteName()
            : static::siteName().' · '.config('isphoa.event.fullName');
    }

    public static function description(): string
    {
        $event = config('isphoa.event');

        return sprintf(
            'The 6th %s (%s): %s. %s at %s, %s, %s.',
            $event['fullName'],
            static::siteName(),
            $event['theme'],
            $event['dates'],
            $event['venue'],
            $event['region'],
            $event['country'],
        );
    }

    /**
     * Keyword list. Google ignores the meta tag, but Bing and several
     * academic aggregators still read it, and it costs one line.
     *
     * @return list<string>
     */
    public static function keywords(): array
    {
        $event = config('isphoa.event');

        return array_values(array_unique(array_merge([
            static::siteName(),
            $event['fullName'],
            'photonics conference 2026',
            'optics seminar Indonesia',
            'SPIE proceedings',
            'call for papers photonics',
            'conference '.$event['city'],
        ], array_column(config('isphoa.tracks'), 'title'))));
    }

    /**
     * Every publicly indexable route, with the crawl hints the sitemap needs.
     * Anything behind sign-in stays out, and is blocked again in robots.txt.
     *
     * @return list<array{route: string, changefreq: string, priority: string}>
     */
    public static function indexableRoutes(): array
    {
        return [
            ['route' => 'site.home', 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['route' => 'site.call-for-papers', 'changefreq' => 'weekly', 'priority' => '0.9'],
            ['route' => 'site.submission', 'changefreq' => 'weekly', 'priority' => '0.9'],
            ['route' => 'site.important-dates', 'changefreq' => 'weekly', 'priority' => '0.8'],
            ['route' => 'site.speakers', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['route' => 'site.committee', 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['route' => 'site.registration', 'changefreq' => 'weekly', 'priority' => '0.8'],
            ['route' => 'site.venue', 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['route' => 'site.travel-information', 'changefreq' => 'monthly', 'priority' => '0.5'],
            ['route' => 'site.contact', 'changefreq' => 'yearly', 'priority' => '0.5'],
        ];
    }
}
