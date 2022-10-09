<?php

namespace core\base;

 use core\DataBase;

 class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct() {
        DataBase::instance();
    }
}