<?php


namespace app\models;

use DateTime;
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
            ShortLink::updateDateLink($longLink);
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

    static function isShortLinkActive($shortLink) {
        $link = ShortLink::getLongLink($shortLink);
        $date = $link['date'];

        $dateDelete = new DateTime( $date);
        $dateDelete->modify('+3 DAYS');
        $dateNow = new DateTime();
        if ($dateNow >= $dateDelete) {
            ShortLink::delShortLink($link['short_url']);
            return false;
        }
        return true;
    }

    static function getLongLink($shortLink) {
        $link = DataBase::getRow("SELECT * FROM `urls` WHERE `short_url` = ?", [$shortLink]);
        if ($link) {
            return $link;
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

    static function getAllLinks() {
        return DataBase::getRows('SELECT * FROM `urls`');
    }

    static function delShortLink($shortLink) {
        DataBase::sql('DELETE FROM `urls` WHERE `short_url` = ?', [$shortLink]);
    }

    static function delNoActiveLinks() {
        DataBase::sql('DELETE FROM `urls` WHERE `date` <= now() - interval (3*60*24) minute');
    }

    static function updateDateLink($longLink) {
        DataBase::sql('UPDATE `urls` SET `date`= NOW() WHERE `long_url` = ?', [$longLink]);
    }

    static function addItemInStory($shortLink, $ip, $user_agent) {
        DataBase::sql('INSERT INTO `story` (`date`, `short_url`, `ip`, `user_agent`) VALUES (NOW(), :short_url, :ip, :user_agent)',
        ['short_url' =>$shortLink,
        'ip' => $ip,
        'user_agent' => $user_agent]);

    }
}