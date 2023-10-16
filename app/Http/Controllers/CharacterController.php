<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): view
    {
        $characters = Character::all();
        return view('character.index', compact('characters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'race' => 'required',
            'age' => 'required',
            'backstory' => 'required'
        ]);
        Character::create($request->all());
        return redirect()->route('character.index')->with('success', 'character created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'race' => 'required',
            'age' => 'required',
            'backstory' => 'required'
        ]);
        $post = Character::find($id);
        $post->update($request->all());
        return redirect()->route('character.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $post = Character::find($id);
        $post->delete();
        return redirect()->route('character.index')->with('success', 'Post deleted successfully');
    }

    //------------------//
    // routes functions //
    //------------------//
    /**
     * Show the form for creating a new post.
     *
     * @return View
     */
    public function create(): View
    {
        return view('character.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $character = Character::find($id);
        return view('character.show', compact('character'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $character = Character::find($id);
        return view('character.edit', compact('character'));
    }
}
