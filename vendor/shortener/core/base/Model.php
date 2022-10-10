<?php

namespace shortener\base;

 use shortener\DataBase;

 class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct() {
        DataBase::instance();
    }
}