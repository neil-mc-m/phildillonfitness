<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camp;
use Illuminate\Support\Facades\Redirect;

class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camps = Camp::all();
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
        $camp = new Camp();
        $camp->name = $request->input('name');
        $camp->duration = $request->input('duration');
        $camp->price = $request->input('price');
        $camp->feature_1 = $request->input('feature_1');
        $camp->feature_2 = $request->input('feature_2');
        $camp->save();

        $request->session()->flash('status', 'Task was successful!');
        return Redirect::to('/admin/camps');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camp = Camp::find($id);
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
        $camp = Camp::find($id);
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
        $camp = Camp::find($id);
        $camp->name       = $request->input('name');
        $camp->duration      = $request->input('duration');
        $camp->price = $request->input('price');
        $camp->feature_1 = $request->input('feature_1');
        $camp->feature_2 = $request->input('feature_2');
        $camp->save();
        // get the updated camp from the db
        $newCamp = Camp::find($id);
        // redirect with message
        $request->session()->flash('status', 'Task was successful!');
        return view('admin.show_camp', ['camp' => $newCamp]);
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
