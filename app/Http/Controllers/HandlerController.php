<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\New_;

class HandlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        //
        return view('userform.login');
    }
    public function reg()
    {
        //
        return view('userform.register');
    }
    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        //
          
 

    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(Request $request)
    {
        //

        $request->validate([
             'username'=>'required',
             'email'=>'required|email',
             'password'=>'required|max:12|min:8'
        ]);

      

        $user = New User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password =Hash::make($request->password); 
        $person =$user->save();

        
        if($person){
            return back()->with('success','you have been registerd');
        }else{
            return back()->with('fail','something went wrong');
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
