<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Produk;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o = Outlet::paginate(10);
        return view('outlets.index', compact('o'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|max:13',
        ]);

        $data = [
            'nama' => $rules['nama'],
            'alamat' => $rules['alamat'],
            'telepon' => $rules['telepon'],
            'user_id' => auth()->user()->id,
        ];

        Outlet::create($data);
        return to_route('outlet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        $p = Produk::where('outlet_id', $outlet->id)->get();
        return view('produk.index', compact('p','outlet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        return view('outlets.update', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $rules = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|max:13',
        ]);

        $data = [
            'nama' => $rules['nama'],
            'alamat' => $rules['alamat'],
            'telepon' => $rules['telepon'],
            'user_id' => auth()->user()->id,
        ];

        $outlet->update($data);
        return to_route('outlet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return to_route('outlet.index');
    }

}
