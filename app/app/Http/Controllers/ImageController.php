<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function image(request $request){
        /* $imgResource = imagecreatetruecolor(1000, 500);

        $gray = imagecolorallocate($imgResource, 100, 100, 100);
        $red = imagecolorallocate($imgResource, 255, 0, 0);
        $black = imagecolorallocate($imgResource, 0, 0, 0);

        imageFill($imgResource, 0, 0, $gray);

        imagefilledrectangle($imgResource, 100, 100, 200, 200, $red);

        imagettftext($imgResource, 24, 0, 50, 50,
            $black,
            "/app/resources/font/Rushtice.ttf",
            "Hello world");*/

        $imgFont = imagecreatefromjpeg("/app/resources/img/font.jpeg");
        $imgEl = imagecreatefrompng("/app/resources/img/el.png");

        $imgEl = imagescale($imgEl, 100);


        $w2 = imagesx($imgEl);
        $h2 = imagesy($imgEl);


        imagecopyresized($imgFont, $imgEl, 0, 0, 0, 0, $w2, $h2, $w2 ,  $h2);

        imagefilter($imgFont, IMG_FILTER_GAUSSIAN_BLUR);

        ob_start();

       // imagepng($imgResource);
        imagejpeg($imgFont);

        $imageData = ob_get_clean();

        return response($imageData)->withHeaders([
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="image.png"'
        ]);
    }
}
