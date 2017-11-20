<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 20/11/2017
 * Time: 21:52
 */

namespace App\Extensions\Twig;


class TwigFilters extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('get_env', [$this, 'getEnv']),
        ];
    }

    public function getEnv($variable)
    {
        return env($variable);
    }
}