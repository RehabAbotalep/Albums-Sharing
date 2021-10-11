<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $usersCount = User::isAdmin(0)->count();
        $adminsCount = User::isAdmin(1)->count();
        $albumsCount = Album::count();
        $rolesCount = Role::count();

        return view('admin.dashboard', compact(
            'usersCount', 'adminsCount', 'albumsCount', 'rolesCount'
        ));
    }
}
