<?php
/**
 * Created by PhpStorm.
 * User: anh Đức
 * Date: 13/8/2015
 * Time: 10:49 PM
 */
function __autoload($fileName) {
    include_once $fileName.'.php';
}