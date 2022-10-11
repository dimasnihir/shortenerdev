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
            ob_start();
            header("Location: https://github.com/dimasnihir/ishop");

//            header("Location: {$longLink}");
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }
}