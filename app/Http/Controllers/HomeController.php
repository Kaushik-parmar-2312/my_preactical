<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User ;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile(){
        $id=auth::user()->id ;
        $data = User::find($id);
        return view('profile',compact('data'));
    }

    public function updateprofile(Request $request){


        $name = $request->name;
        $email = $request->email;

        $UpdateDetails = User::where('id', '=' , auth::user()->id )->first();
        $UpdateDetails->name = $name;
        $UpdateDetails->email=$email;
        $UpdateDetails->save();

        return redirect('home');
    }
}
