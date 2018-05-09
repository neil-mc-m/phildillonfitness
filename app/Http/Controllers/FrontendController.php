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
use App\Mail\CallBackForm;
use App\Price;
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
        $camp = Camp::where('active', '=', 1)
            ->first();
        return view('hello',
            [
                'camp' => $camp
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
                'camp' => Camp::where('active', '=', 1)->first(),
                'price' => Price::where('type', '=', 'solo')->first(),
                'group_price' => Price::where('type', '=', 'group')->first()
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
            return view('partials.confirm_email')->with(['message' => 'Success. Ill get back to you as soon as i can.']);
        } catch (\Exception $e) {
            return view('partials.confirm_email')->with(['message' => 'Oops, that didnt send']);
        }
    }

    public function callback(Request $request)
    {
        $callbackFormData = array(
            'name' => $request->input('name'),
            'phone' => $request->input('phone')
        );

        try {
            Mail::to(env('MAIL_TO'))->send(new CallBackForm($callbackFormData));
            return view('partials.confirm_email');
        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
}