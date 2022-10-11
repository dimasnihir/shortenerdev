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
            var_dump($longLink);
            header("Location: {$longLink}");
            die();
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }
}