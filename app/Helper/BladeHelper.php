<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('current_controller')) {
    /**
     * 現在いる Controller 名を返す
     *
     * @return mixed|string|null
     */
    function current_controller()
    {
        $current_route_name = explode('.', Route::currentRouteName());
        return $current_route_name[0] ?? null;
    }

    /**
     * @return string|null
     */
    function currentRouteName() :string
    {
        return Route::currentRouteName();
    }
}
