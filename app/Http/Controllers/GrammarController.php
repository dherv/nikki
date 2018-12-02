<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daily;
use App\Grammar;
use App\User;

class GrammarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        // $grammars = Daily::with(['grammars' => function ($query) {
        //     $query->where('languag_id', $user->language_id);
        // }])->get();
        $grammars = Daily::language()->with('grammars')->get()->pluck('grammars')->flatten();
        return response()->json($grammars);
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
    public function store(Request $request, $daily)
    {
        $this->validate(
            $request,
            [
                'grammar' => 'required',
                'explanation' => 'required|min:10',
                'example' => 'required|min:10',
                'example_translation' => 'required|min:10'
            ]
        );


        Grammar::create([
            'daily_id' => $daily,
            'grammar' => $request->grammar,
            'example' => $request->example,
            'example_translation' => $request->example_translation,
            'explanation' => $request->explanation
        ]);

        return response()->json(Grammar::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
