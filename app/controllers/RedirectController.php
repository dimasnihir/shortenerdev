<?php


namespace app\controllers;

use app\models\ShortLink;
use shortener\base\Controller;

class RedirectController extends Controller
{
    public function indexAction() {
        $shortLink = $_SERVER['HTTP_HOST'] . '/' . $this->route['token'];
        if (!ShortLink::isNotShortLink($shortLink)) {
            $longLink = ShortLink::getLongLink($shortLink);
            If (ShortLink::isShortLinkActive($shortLink)) {
                ob_start();
                header("Location: {$longLink['long_url']}");
                die();
            } else {
                throw new \Exception("Страница не найдена", 404);
            }
         } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }
}