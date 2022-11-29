<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $karyawan = User::where('outlet_id', auth()->user()->outlet->id)->latest()->paginate(10);
                        // ->where('name', "LIKE", "%ba%")
        return view('karyawan.index', compact('karyawan'));
    }

    public function create(Request $request)
    {
        return view('karyawan.create');
    }

    public function store(Request $request){

        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'telephone' => ['required', 'string', 'max:13'],
            'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'outlet_id' => auth()->user()->outlet->id,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return to_route('karyawan.index');
    }

    public function destroy(User $user)
    {
        if ($user->id != auth()->user()->id) {
            $user->delete();
        }
        return to_route('karyawan.index');
    }
}
