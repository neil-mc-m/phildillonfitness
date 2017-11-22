<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 21/11/2017
 * Time: 23:16
 */

namespace App\Http\Controllers;

use App\Camp;

class FrontendController extends Controller
{
    /**
     * Show the home page.
     *
     *
     * @return Response
     */
    public function home()
    {
        return view('hello',
            [
                'camp' => Camp::findOrFail('1')
            ]
        );
    }

    public function pricing()
    {
        return view('pricing',
            array(
                'camp' => Camp::findOrFail('1')
            ));
    }

    public function contact()
    {
        return view('contact');
    }

}