<?php


namespace app\controllers;


use app\models\ShortLink;
use shortener\base\Controller;

class RedirectController extends Controller
{
    public function indexAction() {
        $shortLink = $_SERVER['HTTP_HOST'] . '/' . $this->route['token'];
        var_dump($shortLink);
        if (!ShortLink::isNotShortLink($shortLink)) {
            $longLink = ShortLink::getLongLink($shortLink);
            var_dump($shortLink);
            var_dump($longLink);
//            header("Location: https://github.com/dimasnihir/ishop");
//            die();

//            header("Location: {$longLink}");
        } else {
//            throw new \Exception("Страница не найдена", 404);
        }
    }
}