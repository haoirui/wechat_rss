<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 2018/12/10
 * Time: 3:58 PM
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}
