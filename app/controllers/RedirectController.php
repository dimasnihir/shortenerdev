<?php


namespace app\controllers;


use app\models\ShortLink;
use shortener\base\Controller;
use shortener\DataBase;

class RedirectController extends Controller
{

    // urlshortener.space/8461d
    public function indexAction() {

        $shortLink = $_SERVER['HTTP_HOST'] . '/' . $this->route['token'];
        if (!ShortLink::isNotShortLink($shortLink)) {
            $longLink = ShortLink::getLongLink($shortLink);
            header("Location: {$longLink}");
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }
}