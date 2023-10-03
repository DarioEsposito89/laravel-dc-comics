<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comic = new Comic();
        return view('comics.create', compact('comic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'thumb' => 'nullable|url',
            'price' => 'string',
            'series' => 'required|string',
            'sale_date' => 'string',
            'type' => 'string',
            'artists' => 'nullable|string',
            'writers' => 'nullable|string',
        ]);
       $data = $request->all();

       $comic = new Comic();
        $comic->fill($data);
        $comic->save();

        return to_route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::findOrFail($id);
        
        return view('comics.show', compact('comic'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
    
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required|string', Rule::unique('comics')->ignore($comic->id),
            'description' => 'nullable|string',
            'thumb' => 'nullable|url',
            'price' => 'string',
            'series' => 'required|string',
            'sale_date' => 'string',
            'type' => 'string',
            'artists' => 'nullable|string',
            'writers' => 'nullable|string',
        ]);
        $comic->update($data);
        $comic->save();

        return to_route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index')->with('delete', "il comic $comic->title è stato cancellato");
    }
}
