<?php
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes($routes)
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return 'active';
            }
        }
        return '';
    }
}
if (!function_exists('areActiveRoutesMenu')) {
    function areActiveRoutesMenu($routes)
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return 'menu-is-opening menu-open';
            }
        }
        return '';
    }
}
?>