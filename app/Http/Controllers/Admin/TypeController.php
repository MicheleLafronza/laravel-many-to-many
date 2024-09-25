<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Type;
use PHPUnit\TextUI\Help;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        
        return view('admin.types.index', compact('types'));
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
    public function store(TypeRequest $request)
    {
        $data = $request->all();
        $new_type = new Type;
        $new_type->name = $data['name'];
        $new_type->slug = Helper::generateSlug($new_type->name, Type::class);
        $new_type->save();


        return redirect()->route('admin.types.index')->with('success', 'Nuovo linguaggio ' . $new_type->name . ' è stato creato');
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
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('deleted', 'Il linguaggio ' . $type->name . ' è stato eliminato');
    }
}
