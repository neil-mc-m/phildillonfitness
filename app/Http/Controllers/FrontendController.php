<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 21/11/2017
 * Time: 23:16
 */

namespace App\Http\Controllers;

use App\Camp;
use App\Mail\BookingForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


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

    /**
     * Process the contact form and send an email form it.
     *
     * @param Request $request
     * @return view
     */
    public function book(Request $request)
    {

        $bookingFormData = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'date' => $request->input('date'),
            'message' => $request->input('message')
        );
        try {
            Mail::to(env('MAIL_TO'))->send(new BookingForm($bookingFormData));
            return view('contact')->with(['sent' => true]);
        } catch (\Exception $e) {
            return view('contact')->with(['sent' => false]);
        }


    }
}