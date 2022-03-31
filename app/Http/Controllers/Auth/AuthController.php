<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.registration');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if($request->id){
            $model = User::find($request->id);
            $model->update($request->all());
        }else{
            $model = User::create($request->all());
        }
        return response()->json([
            'message'=>'success'
        ],200);
    }

    public function login(Request $request)
    {
         if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])) {
            return response()->json([
                'msg'=>"success"
            ],200);
        }else{
            return response()->json([
                'msg'=>"Cridential not match!"
            ],500);
        };
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

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        return response([
            'msg'=> "Logout"
        ],200);
    }
}
