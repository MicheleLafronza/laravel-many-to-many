<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Technology;
use App\Functions\Helper;
use App\Http\Requests\TechnologyRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        // dd($technologies);
        

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyRequest $request)
    {
        $data = $request->all();
        $new_technology = new Technology();
        $new_technology->name = $data['name'];
        $new_technology->slug = Helper::generateSlug($new_technology->name, technology::class);
        $new_technology->save();

        return redirect()->route('admin.technologies.index')->with('success', 'Nuova tecnologia ' . $new_technology->name . ' creata');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('deleted', 'La tecnologia ' . $technology->name . ' è stata eliminata');
    }
}
