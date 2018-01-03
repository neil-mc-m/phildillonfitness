<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 02/01/2018
 * Time: 22:29
 */

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