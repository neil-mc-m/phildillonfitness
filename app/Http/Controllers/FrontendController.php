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

    /**
     * Show the pricing page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pricing()
    {
        return view('pricing',
            array(
                'camp' => Camp::findOrFail('1')
            ));
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

}