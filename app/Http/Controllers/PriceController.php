<?php

namespace App\Http\Controllers;

use App\Price;
use App\Repositories\PriceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PriceController extends Controller
{
    private $priceRepository;

    /**
     * PriceController constructor.
     * @param $priceRepository
     */
    public function __construct(PriceRepository $priceRepository)
    {
        $this->priceRepository = $priceRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = $this->priceRepository->findAll();

        return view('admin.prices', array(
            'prices' => $prices
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.price_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'type' => $request->input('type'),
            'price' => $request->input('price'),
            'bulk' => $request->input('bulk')
        );
        try {
            $this->priceRepository->create($data);
            $request->session()->flash('status', 'Task was successful!');
            return Redirect::to('/admin/prices');
        } catch (\Exception $e)
        {
            return Redirect::to('/admin/prices')->with(array(
                'message' => $e->getMessage()
                )
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Price $price)
    {
        try {
            $price->delete();
            $request->session()->flash('status', 'Task was successful!');
            return Redirect::to('/admin/prices');
        } catch (\Exception $e)
        {
            return Redirect::to('/admin/prices')->with(array(
                    'message' => $e->getMessage()
                )
            );
        }

    }
}
