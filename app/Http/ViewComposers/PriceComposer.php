<?php

namespace App\Http\ViewComposers;


use App\Repositories\PriceRepository;
use Illuminate\View\View;

class PriceComposer
{
    protected $price;

    public function __construct(PriceRepository $price)
    {
        $this->price = $price;
    }

    public function compose(View $view)
    {
        $view->with('price_count', $this->price->count());
    }

}