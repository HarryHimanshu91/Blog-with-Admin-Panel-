<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        return view('userside.profile',compact('user'));
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
        //
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
        $user = \Auth::user()->where('id', $id )->first();
        return view('userside.editProfile',compact('user'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('avatar');
        if($image !='')
        {
            $request->validate([
                'name'     =>  'required',
                'email'    =>  'required',
                'avatar'   =>  'required|image|mimes:jpeg,jpg,png|max:2048'
            ]);
           
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move("uploads/UserProfile" , $image_name );

        }
        else
        {
            $request->validate([
                'name'    =>  'required',
                'email'  =>  'required',
            ]);
        }
        $obj = \Auth::user()->find($id);
        $obj->name= request('name');
        $obj->email = request('email');
        $obj->avatar = $image_name;
        $obj->save();
        return redirect("profile")->with('message', 'Profile Has Been Updated Successfully !!');
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

    public function userLogout()
    {
        echo "Hello";
    }
}
