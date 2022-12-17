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
        try {
            $karyawan = User::with('roles')->whereHas('roles', function($q){
                $q->where('name', 'Admin')
                    ->orWhere('name', 'Kasir');
                })
                ->where('outlet_id', auth()->user()->outlet->id)
                ->latest()->paginate(10);
    
            return view('karyawan.index', compact('karyawan'));
        } catch (\Throwable $th) {
            return view('auth.login');
        }
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
        ])->assignRole(2);

        event(new Registered($user));

        return to_route('karyawan.index');
    }
    public function update(User $user)
    {
        if (!$user->hasRole(['Owner', 'Admin'])) {
            $user->syncRoles(2);
        }
        return back();
    }

    public function destroy(User $user)
    {
        if (!$user->hasRole('Owner')) {
            $user->delete();
        }
        return to_route('karyawan.index');
    }
}
