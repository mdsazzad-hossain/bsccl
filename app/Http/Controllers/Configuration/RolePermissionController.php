<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Configuration\Menu;
use App\Models\Configuration\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('menus.permission')->orderBy('id', 'DESC')->get();
        return response([
            'data'=>$roles
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $roleModels = Role::create($request->all());
            $manus = $request['menus'];
            foreach ($manus as $key => $value) {
                if ($value['title_value']) {
                    $menu = Menu::create([
                        'role_id'=> $roleModels->id,
                        'menu_name'=> $value['menu_name'],
                        'm_id'=> $value['m_id']
                    ]);
                    $menu->create_permission()->delete();
                    $menu->create_permission()->createMany($value['permission']);
                }
            }

            DB::commit();
            return response([
                'msg'=> 'Success'
            ],201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response([
                'success' => false,
                'message' => 'Failed to save data.',
                'errors'  => $th->getMessage()
            ], 500);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
