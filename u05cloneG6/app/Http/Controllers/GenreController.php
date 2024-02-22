<?php

namespace App\Http\Controllers;

use App\Models\Admin\cmdb_genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = cmdb_genre::all();
        return view('genre', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cmdb_genres|max:255',
        ]);

        /**
         * the cmdb_genre(our table name) plus ::create will try to create a column in our table.
         * And it requests a name to do so.
         */
        cmdb_genre::create([
            'name' => $request->name,
        ]); 

        /**
         * If the colums is created successfully we will be redirected to the index function with a message.
         */
        return redirect()->route('genre')->with('success', 'Genre added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genres = cmdb_genre::find($id);
        return view('genre', ['genres' => $genres]);
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
    public function destroy(string $id)
    {
        //
    }
}
