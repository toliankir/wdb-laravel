<?php

namespace App\Helpers;

use Illuminate\Support\Facades\URL;

class Helper
{
    public static function test($linkAfterVerification = null)
    {
        $link = $linkAfterVerification ? $linkAfterVerification : URL::previous();
        return ('<input type="text" name="retirects_to" value="'.$link.'">');
    }

    public static function getBackLink($count)
    {
        $links = session('urlHistory');
        if ($links[$count] && $count < $links->count()) {
            return $links[$count];
        }
        return false;
    }
}
