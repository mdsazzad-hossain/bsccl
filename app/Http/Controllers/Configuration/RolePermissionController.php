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
        $data = auth()->user();
        return view('pages.configuration.role-permission',[
            'data'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                        'menu_name'=> $value['title'],
                        'm_id'=> $value['title_value']
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
