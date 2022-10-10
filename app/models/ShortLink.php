<?php


namespace app\models;

use shortener\base\Model;
use shortener\DataBase;

class ShortLink extends Model
{
    public static function createShortLink($longLink) {

        if (self::isNotLongLink($longLink)) {
            $hash = md5($longLink);
            $shortLink = $_SERVER['HTTP_HOST'] . '/' . substr($hash,0,5);
            $query = "INSERT INTO `urls` (
                  `date`,
                  `long_url`,
                  `short_url`
                  )
                VALUES (
                  NOW(),
                  :long_url,
                  :short_url
                )";

            if (self::isNotShortLink($shortLink)) {
                $args = [
                    'long_url' => $longLink,
                    'short_url' => $shortLink
                ];
            } else {
                $shortLink = $_SERVER['HTTP_HOST'] . '/' . substr($hash,5,11);
            }

            $args = [
                'long_url' => $longLink,
                'short_url' => $shortLink
            ];
            DataBase::sql($query, $args);
            return $shortLink;
        } else {
            return self::getShortLink($longLink)['short_url'];
        }
    }

    static function getShortLink($longLink) {
        return DataBase::getRow("SELECT `short_url` FROM `urls` WHERE `long_url` = ?", [$longLink]);

    }

    static function isNotShortLink($link) {
        $link = DataBase::getRow("SELECT * FROM `urls` WHERE `short_url` = ?", [$link]);
        if (!$link) {
            return 1;
        } else {
            return 0;
        }
    }

    static function getLongLink($shortLink) {
        $link = DataBase::getRow("SELECT `long_url` FROM `urls` WHERE `short_url` = ?", [$shortLink]);
        if ($link) {
            return $link['long_url'];
        } else {
            return 0;
        }
    }

    static function isNotLongLink($link) {
        $link = DataBase::getRow("SELECT * FROM `urls` WHERE `long_url` = ?", [$link]);
        if (!$link) {
            return 1;
        } else {
            return 0;
        }
    }
}