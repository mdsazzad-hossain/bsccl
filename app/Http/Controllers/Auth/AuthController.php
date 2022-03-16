<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
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
        $model = User::create($request->all());
        return response()->json([
            'message'=>'success'
        ],200);
    }

    public function login()
    {
        dd('ok');
        //  if (Auth::attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ])) {
        //     dd('ok');
        //     // return response()->json([
        //     //     'msg'=>"success"
        //     // ],200);
        // }else{
        //     return response()->json([
        //         'msg'=>"success"
        //     ],500);
        // };
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
