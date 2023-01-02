<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    
    public function index()
    {
        return view('karyawan.index');
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
        ])->assignRole(3);

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

    public function data(Request $request)
    {
        $roleRequest = $request->get('role');

        if ($request->get('role') != null) {
            
            $model= User::with('roles')
                        ->whereRelation('roles', 'name', '=', $roleRequest);
        }else {
            $model= User::with('roles');
        }
                        
        $model->whereRelation('roles', 'name', '!=', 'Owner')
                ->where('outlet_id', '=', auth()->user()->outlet->id);
        return DataTables::eloquent($model)
                            ->addIndexColumn()
                            ->addColumn('roles', function (User $user) {
                                return $user->roles->map(function($roles) {
                                    return $roles->name;
                                })->implode('<br>');
                            })
                            ->addColumn('action', function($model){
                                if (auth()->user()->hasRole(['Owner'])) {
                                    return view('karyawan.button', compact('model'));
                                }
                            })
                            ->rawColumns(['action'])
                            ->toJson();
    }
}
