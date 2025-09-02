<?php
namespace App\Traits;

use Carbon\Carbon;

trait ColorGenerator
{
    public function generateRandomColor()
    {
        $red = mt_rand(0, 255);
        $green = mt_rand(0, 255);
        $blue = mt_rand(0, 255);
        $hexRed = sprintf("%02x", $red);
        $hexGreen = sprintf("%02x", $green);
        $hexBlue = sprintf("%02x", $blue);

        return "#" . $hexRed . $hexGreen . $hexBlue;
    }
}
