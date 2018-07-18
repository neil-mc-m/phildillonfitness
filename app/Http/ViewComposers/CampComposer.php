<?php

namespace App\Http\ViewComposers;

use App\Repositories\CampRepository;
use Illuminate\View\View;

class CampComposer
{
    protected $camps;

    public function __construct(CampRepository $camps)
    {
        $this->camps = $camps;
    }

    public function compose(View $view)
    {
        $view->with('count', $this->camps->count());
    }
}