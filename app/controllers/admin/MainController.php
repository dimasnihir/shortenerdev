<?php


namespace app\controllers\admin;


use app\models\ShortLink;
use shortener\base\Controller;

class MainController extends Controller
{
    public function indexAction() {

        if (isset($_POST['btn_delete'])) {
            $shortLink = $_POST['btn_delete'];
            ShortLink::delShortLink($shortLink);
        }
        ShortLink::delNoActiveLinks();
        $links = ShortLink::getAllLinks();
        $this->set(compact('links'));
        $this->getView();
    }

}