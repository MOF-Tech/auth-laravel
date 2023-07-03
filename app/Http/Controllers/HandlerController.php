<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


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
             'email'=>'required|email|unique:users',
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
            return back()->with('error','something went wrong');
        }
       
    }
    
    public function loginUser(request$request)
    {
        //

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|max:12|min:8'
        ]);

        // $sub = User::where('email','=',$request->input('email'))->first();
        $sub = User::where('email','=',$request->email)->first();
        if($sub){
            // return back()->with('success','you are logged in');

            if(Hash::check($request->password,$sub->password)){

                $request->session()->put('loginId',$sub->id);
                return redirect(url('dash'));

            }else{
                return back()->with('error','password doesnt match');
            }
        }else{
            return back()->with('error','email doesnt exist');
        }


       
    }
    public function dash()
    {
        //
          $info = array();
          if(session::has('loginId')){
            // loged in
            $info = User::where('id','=',session::get('loginId'))->first();
        //   dd($info);
          }
         
        return view('dash',compact('info'));
    }

    public function logout(){
        if(session::has('loginId')){
            session()->pull('loginId');
            return redirect(url('/join'))->with('success','you are logged out');
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
