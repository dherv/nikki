<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daily;
use App\User;
use App\Word;
use App\Grammar;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(1);

        return response()->json(Daily::with('words', 'grammars')->where('language_id', $user->language_id)->orderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|min:10',
        ]);

        $user = User::find(1);
        $created = Daily::create(['body' => $request->body, 'user_id' => 1, 'language_id' => $user->language_id]);

        return response()->json(['id' => $created->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $daily
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return response()->json(Daily::with('words', 'grammars')->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daily $daily)
    {
        $this->validate($request, [
            'body' => 'required|min:10',
            'words.*.word' => 'required|max:45',
            'words.*.translation' => 'required|max:45',
            'words.*.ruby' => 'max:45',
            'grammars.*.grammar' => 'required',
            'grammars.*.explanation' => 'required|min:10',
            'grammars.*.example' => 'required|min:10',
            'grammars.*.example_translation' => 'required|min:10'
        ]);

        foreach ($request->words as $key => $value) {
            $id = $value['id'];
            $updated = $value['word'];
            if (!$daily->words->contains('word', $updated)) {
                $daily->words()->save(new Word($value));
            }
        }

        foreach ($request->grammars as $key => $value) {
            $id = $value['id'];
            $updated = $value['grammar'];
            if (!$daily->grammars->contains('grammar', $updated)) {
                $daily->grammars()->save(new Grammar($value));
            }
        }
     
        $daily->body = $request->body;
        $daily->save();
    
        return response()->json(Daily::with('words', 'grammars')->find($daily->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
