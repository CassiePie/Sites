<?php

namespace App\Http\Controllers;

use index;
use App\Models\Game;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $games = Game::all();
        // return view('games.index', ['games' => $games]);
        return view('games.index', compact('games'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $game = new Game;
        $publishers = Publisher::all();
    
        return view('games.create', [
            'game' => $game,
            'publishers' => $publishers,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd('test');
        $validatedData = $request->validate([
            'completed' => 'nullable|boolean',
            'name' => 'required',
            'publisher_id' => 'required|exists:publishers,id',
        ]);
        
        $game = new Game;
        $game->name = $validatedData['name'];
        $game->publisher_id = $validatedData['publisher_id'];
        $game->completed = filter_var($request->input('completed'), FILTER_VALIDATE_BOOLEAN);
        $game->save();
        
        return redirect()->route('games.index');
        
        // try {
        //     $game = new Game;
        //     $game->name = $request->input('name');
        //     $game->publisher_id = $request->input('publisher_id');
        //     $game->completed = $request->has('completed');
        //     $game->save();
    
        //     dd($game);
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::findOrFail($id);
        // return view('games.show', compact('game'));
        $games = Game::where('publisher_id', $game->publisher_id)
                ->where('id', '<>', $game->id)
                ->orderBy('name')
                ->get();

        return view('games.show', [
            'game' => $game,
            'games' => $games,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::findOrFail($id);
        $publishers = Publisher::orderBy('name')->get();
        return view('games.edit', compact('game', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'completed' => 'nullable|boolean',
            'name' => 'required',
            'publisher_id' => 'required|exists:publishers,id',
        ]);
    
        $game = Game::findOrFail($id);
        $game->name = $validatedData['name'];
        $game->publisher_id = $validatedData['publisher_id'];
        $game->completed = filter_var($request->input('completed'), FILTER_VALIDATE_BOOLEAN);
        $game->save();
    
        return redirect()->route('games.show', ['game' => $game]);
    }

    /**
     * Show the form for deleting
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $game = Game::findOrFail($id);
        return view('games.delete', compact('game'));    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('games.index');
    }
}
