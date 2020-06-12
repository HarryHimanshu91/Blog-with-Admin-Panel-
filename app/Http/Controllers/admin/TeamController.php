<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Validator;
use File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
       // $teams = Team::skip(0)->take(3)->get();
       // $teams= Team::orderBy('id','asc')->take(2)->get();
       return view('admin.viewTeams',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.addTeam');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
    
        $request->validate([
            'team_name'    =>  'required',
            'designation'  =>  'required',
            'image'        =>  'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension(); 
        $image->move("uploads/ourTeams" , $new_name );

        $obj = new Team();
        $obj->team_name= request('team_name');
        $obj->designation = request('designation');
        $obj->image = $new_name;
        $obj->save();
        return redirect("admin/team")->with('message', 'Team Has Been Created Successfully !!');

        
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
       $teams = Team::where('id',$id )->first();
       return view('admin.editTeam',compact('teams'));
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
        $image = $request->file('image');
        if($image !='')
        {
            $request->validate([
                'team_name'    =>  'required',
                'designation'  =>  'required',
                'image'        =>  'required|image|mimes:jpeg,jpg,png|max:2048'
            ]);
           
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move("uploads/ourTeams" , $image_name );

        }
        else
        {
            $request->validate([
                'team_name'    =>  'required',
                'designation'  =>  'required',
            ]);
        }
        $obj = Team::find($id);
        $obj->team_name= request('team_name');
        $obj->designation = request('designation');
        $obj->image = $image_name;
        $obj->save();
        return redirect("admin/team")->with('message', 'Team Has Been Updated Successfully !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
         Team::where('id', $id )->delete();
         return redirect()->back();
    }
}
