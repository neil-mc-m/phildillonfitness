<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 21/11/2017
 * Time: 23:16
 */

namespace App\Http\Controllers;

use App\Camp;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     *
     * @return Response
     */
    public function show()
    {
        return view('hello', ['camp' =>Camp::findOrFail('1')]);
    }
}