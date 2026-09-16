@php
    use App\Support\Seo;

    $event = config('isphoa.event');
    $venue = config('isphoa.venue');
    $tracks = config('isphoa.tracks');

    $allSpeakers = array_merge(
        config('isphoa.plenarySpeakers'),
        config('isphoa.speakers'),
        config('isphoa.invitedSpeakers'),
    );

    $place = [
        '@type' => 'Place',
        'name' => $venue['name'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $venue['street'],
            'addressLocality' => $event['city'],
            'addressRegion' => $event['region'],
            'postalCode' => $venue['postalCode'],
            'addressCountry' => 'ID',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => $venue['coords']['lat'],
            'longitude' => $venue['coords']['lng'],
        ],
    ];

    $organization = fn (array $org) => [
        '@type' => 'Organization',
        'name' => $org['name'],
        'logo' => Seo::absoluteUrl($org['logo']),
    ];

    $data = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'WebSite',
                '@id' => Seo::absoluteUrl('/#website'),
                'url' => Seo::absoluteUrl('/'),
                'name' => Seo::siteName(),
                'alternateName' => $event['fullName'],
                'description' => Seo::description(),
                'inLanguage' => 'en',
            ],
            [
                '@type' => 'Event',
                '@id' => Seo::absoluteUrl('/#event'),
                'name' => Seo::siteName().': '.$event['theme'],
                'alternateName' => $event['fullName'],
                'description' => Seo::description(),
                'url' => Seo::absoluteUrl('/'),
                'startDate' => $event['startsAt'],
                'endDate' => $event['endsAt'],
                'eventStatus' => 'https://schema.org/EventScheduled',
                'eventAttendanceMode' => 'https://schema.org/MixedEventAttendanceMode',
                'image' => [Seo::absoluteUrl('/photos/gedung.jpg')],
                'inLanguage' => 'en',
                'isAccessibleForFree' => false,
                'keywords' => implode(', ', array_column($tracks, 'title')),
                'about' => $event['theme'],
                'location' => [
                    $place,
                    ['@type' => 'VirtualLocation', 'url' => Seo::absoluteUrl('/')],
                ],
                'organizer' => array_map($organization, config('isphoa.organizers')),
                'sponsor' => array_map($organization, config('isphoa.supporters')),
                'performer' => array_values(array_map(fn ($person) => [
                    '@type' => 'Person',
                    'name' => $person['name'],
                    'affiliation' => [
                        '@type' => 'Organization',
                        'name' => $person['institution'],
                    ],
                    'image' => Seo::absoluteUrl($person['photo']),
                    'url' => Seo::absoluteUrl('/speakers#'.$person['slug']),
                ], array_filter($allSpeakers, fn ($p) => ! empty($p['name'])))),
            ],
        ],
    ];

    // JSON_HEX_TAG/JSON_HEX_AMP escape < > & to < > &. Without
    // them a literal `</script>` in any future speaker bio or track title
    // would close the block early and turn the remainder into live markup.
    $json = json_encode(
        $data,
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP,
    );
@endphp

{{-- schema.org markup for the seminar itself. Rendered on the homepage only,
     so the event resolves to a single canonical entity. --}}
<script type="application/ld+json">{!! $json !!}</script>
