<?php

namespace App\Http\Controllers;

use App\Repositories\CampRepository;
use Illuminate\Http\Request;
use App\Camp;
use Illuminate\Support\Facades\Redirect;

class CampController extends Controller
{
    protected $camp;

    public function __construct(CampRepository $camp)
    {
        $this->camp = $camp;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camps = $this->camp->findAll();
        return view('admin.camps', ['camps' => $camps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->input('name'),
            'duration' => $request->input('duration'),
            'price' => $request->input('price'),
            'feature_1' => $request->input('feature_1'),
            'feature_2' => $request->input('feature_2'),
            'active' => $request->input('active')
        );
        try {
            $camp = $this->camp->create($data);
            $request->session()->flash('status', 'Task was successful!');
            return Redirect::to('/admin/camps');
        } catch (\Exception $e) {
            return Redirect::to('/admin/camps')->with(['message' => $e->getMessage()]);
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camp = $this->camp->findById($id);
        return view('admin.show_camp', ['camp' => $camp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camp = $this->camp->findById($id);
        return view('admin.edit', ['camp' => $camp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array(
            'name' => $request->input('name'),
            'duration' => $request->input('duration'),
            'price' => $request->input('price'),
            'feature_1' => $request->input('feature_1'),
            'feature_2' => $request->input('feature_2'),
            'active' => $request->input('active')
        );
        try {
            $camp = $this->camp->update($data, $id);
            $request->session()->flash('status', 'Task was successful!');
            return Redirect::to('/admin/camps');
        } catch (\Exception $e) {
            return Redirect::to('/admin/camps')->with(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camp = Camp::find($id);
        $camp->delete();

        return Redirect::to('/admin/camps');
    }
}
