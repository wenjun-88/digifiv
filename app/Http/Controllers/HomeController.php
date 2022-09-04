<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['home']);
    }

    public function index()
    {
        $data = $this->getDashboardData();

        return view('admin.index', $data);
    }

    function getDashboardData()
    {
        //===========================================================================
        // total registered user
        // get user role
        $userRole = Role::query()->where('name', 'User')->first();
        $role_id = $userRole->id;
        $userCount = User::query()->whereHas('roles', function ($query) use ($role_id) {
            $query->where('id', $role_id);
        })->count();

        return [
            'userCount' => $userCount,
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return redirect()->route('admin.index');
    }
}
