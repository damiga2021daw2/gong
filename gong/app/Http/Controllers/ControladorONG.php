<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ONG;

class ControladorONG extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ong = ONG::all();
        return view('index', compact('ong'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $novaOng = $request->validate([
            'cif' => 'required|max:255',
            'nom' => 'required|max:255',
            'adreca' => 'required|max:255',
            'poblacio' => 'required|max:255',
            'comarca' => 'required|max:255',
            'tipus' => 'required|max:255',
            'utpublica' => 'required|max:255',
        ]);
        $ong = ONG::create($novaOng);

        return redirect('/ong')->with('completed', 'ONG creada!');
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
        $ong = ONG::findOrFail($id);
        return view('actualitza', compact('ong'));
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
        $dades = $request->validate([
            'cif' => 'required|max:255',
            'nom' => 'required|max:255',
            'adreca' => 'required|max:255',
            'poblacio' => 'required|max:255',
            'comarca' => 'required|max:255',
            'tipus' => 'required|max:255',
            'utpublica' => 'required|max:255',
        ]);

        ONG::whereId($id)->update($dades);
        return redirect('/ong')->with('completed', 'ONG actualitzada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ong = ONG::findOrFail($id);
        return view('index', compact('ong'));
    }
}
