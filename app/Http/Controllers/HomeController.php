<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        self::initPermissions();
        
        return view('home');
    }

    private static function initPermissions() {
        
        return;
        
        Role::create([
            'name' => 'Admin',
            'name' => 'Editor'
        ]);

        Permission::create([
            'name' => 'create_service',
            'name' => 'create_system',
            'name' => 'edit_service',
            'name' => 'edit_system'
        ]);

        $role = Role::findById(1);
        $role = Role::findById(2);
        $permission_1 = Permission::findById(1);
        $permission_2 = Permission::findById(2);
        $permission_3 = Permission::findById(3);
        $permission_4 = Permission::findById(4);
        $role->givePermissionTo($permission_1);
        $role->givePermissionTo($permission_2);
        $role->givePermissionTo($permission_3);
        $role->givePermissionTo($permission_4);
    }

}
