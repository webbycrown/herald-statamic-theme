<?php

$root = dirname(__DIR__);
$imgDir = $root . '/public/assets/image';
$outDir = $root . '/public/assets/images/marketplace';
$fontB = $root . '/storage/tmp-fonts/LiberationSans-Bold.ttf';
$fontR = $root . '/storage/tmp-fonts/LiberationSans-Regular.ttf';

@mkdir($outDir, 0775, true);

$ink = [30, 41, 59];
$teal = [15, 118, 110];
$paper = [241, 239, 232];
$white = [255, 255, 255];

function loadPhoto($path, $w, $h)
{
    $src = null;
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    if (in_array($ext, ['jpg', 'jpeg'], true)) {
        $src = @imagecreatefromjpeg($path);
    } elseif ($ext === 'png') {
        $src = @imagecreatefrompng($path);
    } elseif ($ext === 'webp' && function_exists('imagecreatefromwebp')) {
        $src = @imagecreatefromwebp($path);
    }
    if (!$src) {
        $src = imagecreatetruecolor($w, $h);
        $c = imagecolorallocate($src, 30, 41, 59);
        imagefilledrectangle($src, 0, 0, $w, $h, $c);
        return $src;
    }
    $sw = imagesx($src);
    $sh = imagesy($src);
    $scale = max($w / $sw, $h / $sh);
    $nw = (int) ceil($sw * $scale);
    $nh = (int) ceil($sh * $scale);
    $tmp = imagecreatetruecolor($nw, $nh);
    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $nw, $nh, $sw, $sh);
    imagedestroy($src);
    $out = imagecreatetruecolor($w, $h);
    imagecopy($out, $tmp, 0, 0, (int) (($nw - $w) / 2), (int) (($nh - $h) / 2), $w, $h);
    imagedestroy($tmp);
    return $out;
}

function shade($im, $rgb, $x, $y, $w, $h, $a)
{
    $c = imagecolorallocatealpha($im, $rgb[0], $rgb[1], $rgb[2], $a);
    imagefilledrectangle($im, $x, $y, $x + $w, $y + $h, $c);
}

function text($im, $font, $size, $x, $y, $rgb, $str)
{
    $c = imagecolorallocate($im, $rgb[0], $rgb[1], $rgb[2]);
    $parts = preg_split('/\s+/', $str);
    $cursor = (float) $x;
    $gap = max(6, (int) round($size * 0.36));
    foreach ($parts as $part) {
        imagettftext($im, $size, 0, (int) $cursor, (int) $y, $c, $font, $part);
        $box = imagettfbbox($size, 0, $font, $part);
        $cursor += ($box[2] - $box[0]) + $gap;
    }
}

function saveJpg($im, $path)
{
    imagejpeg($im, $path, 88);
    imagedestroy($im);
    echo "wrote {$path}\n";
}

$photos = [
    'home' => $imgDir . '/hero-city-hall.jpg',
    'news' => $imgDir . '/hero-markets.jpg',
    'sections' => $imgDir . '/industries-1.jpg',
    'features' => $imgDir . '/hero-culture.jpg',
    'reporters' => $imgDir . '/members-1.jpg',
    'contact' => $imgDir . '/about.jpg',
];

$im = loadPhoto($photos['home'], 1600, 900);
imagealphablending($im, true);
imagesavealpha($im, false);
shade($im, $ink, 0, 0, 1600, 900, 50);
shade($im, $ink, 0, 0, 760, 900, 28);
imagefilledrectangle($im, 0, 0, 12, 900, imagecolorallocate($im, $teal[0], $teal[1], $teal[2]));
text($im, $fontB, 22, 80, 160, $teal, 'STATAMIC STARTER KIT');
text($im, $fontB, 86, 80, 290, $paper, 'HERALD');
text($im, $fontR, 28, 80, 360, $paper, 'A city desk. Named bylines. Dated stories.');
text($im, $fontB, 20, 80, 470, $teal, 'herald-statamic.webbydemo.in');
text($im, $fontR, 18, 80, 780, $paper, 'News / Sections / Features / Reporters');
saveJpg($im, $outDir . '/01-herald-main.jpg');

$slides = [
    ['02-herald-home.jpg', $photos['home'], 'Home', 'City hall, markets, politics, and culture desks'],
    ['03-herald-news.jpg', $photos['news'], 'News', 'Dated stories with bylines and a public correction window'],
    ['04-herald-sections.jpg', $photos['sections'], 'Sections', 'Beats for city, markets, schools, and the street'],
    ['05-herald-features.jpg', $photos['features'], 'Features', 'Longform that holds a name and a date'],
    ['06-herald-reporters.jpg', $photos['reporters'], 'Reporters', 'Named bylines, not anonymous desk copy'],
    ['07-herald-contact.jpg', $photos['contact'], 'Contact', 'Tips, corrections, letters, and the public window'],
];

foreach ($slides as [$name, $src, $title, $line]) {
    $im = loadPhoto($src, 1200, 800);
    imagealphablending($im, true);
    shade($im, $ink, 0, 0, 1200, 800, 55);
    shade($im, $ink, 0, 520, 1200, 280, 18);
    imagefilledrectangle($im, 0, 0, 10, 800, imagecolorallocate($im, $teal[0], $teal[1], $teal[2]));
    text($im, $fontB, 16, 56, 80, $teal, 'HERALD');
    text($im, $fontB, 54, 56, 620, $paper, $title);
    text($im, $fontR, 20, 56, 670, $paper, $line);
    text($im, $fontB, 16, 56, 740, $teal, 'herald-statamic.webbydemo.in');
    saveJpg($im, $outDir . '/' . $name);
}

echo "done\n";
