<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function edit()
    {
        $id = auth()->user()->outlet->id;
        $outlet = Outlet::findOrFail($id);
        
        return view('outlets.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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

        $outlet_id = auth()->user()->outlet->id;
        $outlet = Outlet::findOrFail($outlet_id);
        $outlet->update($data);
        return back();
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
