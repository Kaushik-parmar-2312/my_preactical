<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        if(Auth::user()->isadmin == 1)
        {
            return view('home');
        }else
        {
            $data= user::where('isadmin','1')->get();
            return view('User.userlist',compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|max:8'
         ]);

        $data =  $request->all() ;
        // dd($data);
         $show = user::create($data);

         return redirect('admin/user') -> with('success',' Data Inserted Successfully'  );

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
        $data=user::findOrFail($id);
        return view('user.edit',compact('data')) ;
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


        $data =  $request ->validate([
            'name'=>'required',
            'email'=>'required',
        ]);

       //dd($data);
        user::whereId($id)->update($data);

       return redirect('/admin/user') -> with('success',' Data UPDATE Successfully'  );

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
        $data = user::findOrFail($id);
        $data->delete();
        return redirect('admin/user') -> with('success',' Data Deleted Successfully '  );
    }
}
