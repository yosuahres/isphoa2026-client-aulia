<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Renders public/og-image.png, the 1200x630 card social platforms show when
 * the site is linked. The Next.js app generated this with satori at build
 * time; there is no PHP equivalent, so it is a committed artifact and this
 * command is how it gets rebuilt when the event details change.
 */
class GenerateOgImage extends Command
{
    protected $signature = 'isphoa:og-image {--font= : Directory holding Arial.ttf and Arial Bold.ttf}';

    protected $description = 'Regenerate the Open Graph card from config/isphoa.php';

    /** Site palette, hard-coded because GD cannot read CSS custom properties. */
    private const PAPER = '#0e0e43';

    private const ACCENT = '#a9a9f0';

    private const WIDTH = 1200;

    private const HEIGHT = 630;

    public function handle(): int
    {
        if (! extension_loaded('gd') || ! (gd_info()['FreeType Support'] ?? false)) {
            $this->error('GD with FreeType support is required.');

            return self::FAILURE;
        }

        [$bold, $regular] = $this->fonts();

        if (! $bold || ! $regular) {
            $this->error('Could not find Arial.ttf and Arial Bold.ttf. Pass --font=/path/to/fonts.');

            return self::FAILURE;
        }

        $event = config('isphoa.event');
        $im = imagecreatetruecolor(self::WIDTH, self::HEIGHT);

        [$pr, $pg, $pb] = $this->rgb(self::PAPER);
        [$ar, $ag, $ab] = $this->rgb(self::ACCENT);

        $ink = imagecolorallocate($im, 255, 255, 255);
        $accent = imagecolorallocate($im, $ar, $ag, $ab);
        imagefill($im, 0, 0, imagecolorallocate($im, $pr, $pg, $pb));

        // Radial glow at 85% / 12%, matching the satori original.
        $cx = self::WIDTH * 0.85;
        $cy = self::HEIGHT * 0.12;
        $radius = self::WIDTH * 0.55;

        for ($y = 0; $y < self::HEIGHT; $y++) {
            for ($x = 0; $x < self::WIDTH; $x++) {
                $d = sqrt(($x - $cx) ** 2 + ($y - $cy) ** 2);

                if ($d >= $radius) {
                    continue;
                }

                $t = (1 - $d / $radius) * 0.22;
                imagesetpixel($im, $x, $y, imagecolorallocate($im,
                    (int) ($pr + ($ar - $pr) * $t),
                    (int) ($pg + ($ag - $pg) * $t),
                    (int) ($pb + ($ab - $pb) * $t),
                ));
            }
        }

        $this->drawLogoChip($im);

        imagettftext($im, 40, 0, 204, 124, $ink, $bold, $event['shortName'].' '.$event['edition']);

        $y = 300;
        foreach ($this->wrap($event['fullName'], $bold, 44, self::WIDTH - 144) as $line) {
            imagettftext($im, 44, 0, 72, $y, $ink, $bold, $line);
            $y += 62;
        }

        imagettftext($im, 26, 0, 72, $y + 34, $accent, $regular, $event['theme']);

        // Accent rule above the footer line, echoing the .rule element.
        imagefilledrectangle($im, 72, self::HEIGHT - 116, 168, self::HEIGHT - 113, $accent);
        imagettftext($im, 24, 0, 72, self::HEIGHT - 60, $ink, $regular,
            $event['dates'].'  ·  '.$event['venue'].', '.$event['country']);

        imagepng($im, public_path('og-image.png'), 6);
        imagedestroy($im);

        $this->info(sprintf('Wrote public/og-image.png (%d KB).', (int) (filesize(public_path('og-image.png')) / 1024)));

        return self::SUCCESS;
    }

    /**
     * The logo art is supplied on a white ground, so on the dark card it can
     * only ever be a light block. Making that an explicit rounded chip reads
     * as a design decision rather than a stray white square.
     */
    private function drawLogoChip(\GdImage $im): void
    {
        $path = public_path(ltrim((string) config('isphoa.brand.logo'), '/'));
        $logo = is_file($path) ? @imagecreatefromjpeg($path) : false;

        if (! $logo) {
            // A card without the mark still beats no card at all.
            return;
        }

        [$size, $x0, $y0, $radius, $pad] = [104, 72, 56, 14, 6];

        $tile = imagecreatetruecolor($size, $size);
        imagefill($tile, 0, 0, imagecolorallocate($tile, 255, 255, 255));
        imagecopyresampled($tile, $logo, $pad, $pad, 0, 0, $size - 2 * $pad, $size - 2 * $pad, imagesx($logo), imagesy($logo));
        imagedestroy($logo);

        for ($y = 0; $y < $size; $y++) {
            for ($x = 0; $x < $size; $x++) {
                $dx = $x < $radius ? $radius - $x : ($x >= $size - $radius ? $x - ($size - $radius - 1) : 0);
                $dy = $y < $radius ? $radius - $y : ($y >= $size - $radius ? $y - ($size - $radius - 1) : 0);

                if ($dx && $dy && sqrt($dx * $dx + $dy * $dy) > $radius) {
                    continue;
                }

                imagesetpixel($im, $x0 + $x, $y0 + $y, imagecolorat($tile, $x, $y));
            }
        }

        imagedestroy($tile);
    }

    /** @return list<string> */
    private function wrap(string $text, string $font, int $size, int $maxWidth): array
    {
        $lines = [];
        $line = '';

        foreach (explode(' ', $text) as $word) {
            $candidate = $line === '' ? $word : "{$line} {$word}";
            $box = imagettfbbox($size, 0, $font, $candidate);

            if ($box[2] - $box[0] > $maxWidth && $line !== '') {
                $lines[] = $line;
                $line = $word;
            } else {
                $line = $candidate;
            }
        }

        $lines[] = $line;

        return $lines;
    }

    /** @return array{0: ?string, 1: ?string} */
    private function fonts(): array
    {
        $dirs = array_filter([
            $this->option('font'),
            resource_path('fonts'),
            '/System/Library/Fonts/Supplemental',
            '/usr/share/fonts/truetype/msttcorefonts',
            '/usr/share/fonts/truetype/liberation',
        ]);

        foreach ($dirs as $dir) {
            foreach ([['Arial Bold.ttf', 'Arial.ttf'], ['LiberationSans-Bold.ttf', 'LiberationSans-Regular.ttf']] as [$b, $r]) {
                if (is_file("{$dir}/{$b}") && is_file("{$dir}/{$r}")) {
                    return ["{$dir}/{$b}", "{$dir}/{$r}"];
                }
            }
        }

        return [null, null];
    }

    /** @return array{0: int, 1: int, 2: int} */
    private function rgb(string $hex): array
    {
        return [
            (int) hexdec(substr($hex, 1, 2)),
            (int) hexdec(substr($hex, 3, 2)),
            (int) hexdec(substr($hex, 5, 2)),
        ];
    }
}
