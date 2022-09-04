<?php
use Illuminate\Support\Facades\Route;

function activeRoute($route, $nested = false): string
{
    if ($nested)
    {
        return Route::is($route . '*') ? 'active' : '';
    }
    return (Route::currentRouteName() === $route) ? 'menu-item-active' : '';
}
