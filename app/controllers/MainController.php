<?php

namespace app\controllers;
use app\models\ShortLink;
use shortener\App;
use \shortener\base\Controller;
use shortener\Registry;

class MainController extends Controller
{
    public function indexAction() {

        $this->setMeta('Главная', 'Описание....', 'ключи');

        if (!empty($_POST['long_url'])) {
                $longLink = $_POST['long_url'];
                $shortLink = ShortLink::createShortLink($longLink);

                $this->set(["shortLink" => $shortLink,
                    "longLink" => $longLink]);
        }
        $this->getView();
    }
}