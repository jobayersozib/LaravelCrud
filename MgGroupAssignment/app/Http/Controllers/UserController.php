<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login(){
        return view('users.login');
    }

    public function auth(Request $request){
       $data=User::where('email',$request->mail)->get();
       if(count($data)>0){
            if(Hash::check($request->input('pass'), $data[0]->password)){
                session(['user' => $data[0]->name,'email'=>$data[0]->email,'id'=>$data[0]->id]);
                return redirect('/products');
            }else{
                return view('users.login');
            }
       }else{
            return view('users.login');
       }
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User;
        $user->name=$request->input('name');
        $user->email=$request->input('mail');
        $user->password=Hash::make($request->input('pass'));
        if($request->input('pass') == $request->input('cpass')){
            $user->save();
            return redirect('/login');
        }else{
            return view('users.register',['msg'=>"password mismatch or duplicate email"]);
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
