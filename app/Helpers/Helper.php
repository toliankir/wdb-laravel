<?php
namespace App\Helpers;

use PHPUnit\Framework\Exception;

class Helper {


    public static function getBackLink($count) {
        $links = session('urlHistory');
        if ($links[$count] && $count < $links->count()) {
            return $links[$count];
        }
        return false;
    }

}