<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
       return view('admin.viewAbout',compact('about') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  echo "<pre>";
        //  print_r($request->all());
        //  die();
        $validator =  Validator::make(array(
            "title"=> $request->title,
            "description"=> $request->description,
            "icons"=> $request->icons,
            
            ), array(
                    "title"=>"required",
                    "description"=>"required",
                    "icons"=>"required",
                ));
    
                if( $validator->fails()){
                        return back()->withErrors($validator)->withInput();
                }else{
                    $tag = new About();
                    $tag->title = $request->title;
                    $tag->description = $request->description;
                    $tag->icons = $request->icons;
                    $tag->save();
                    return back()->with('message', 'About Data Has Been Added Successfully !! ');
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
        $about = About::where('id' , $id)->first();
        return view('admin.editAbout',compact('about') );
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
        $validator =  Validator::make(array(
            "title"=> $request->title,
            "description"=> $request->description,
            "icons"=> $request->icons,
            ), array(
                    "title"=>"required",
                    "description"=>"required",
                    "icons"=>"required",
                ));
    
                if( $validator->fails()){
                        return back()->withErrors($validator)->withInput();
                }else{
                    $tag = About::find($id);
                    $tag->title = $request->title;
                    $tag->description = $request->description;
                    $tag->icons = $request->icons;
                    $tag->save();
                    return back()->with('message', 'About Data Has Been Updated Successfully !! ');
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       About::where('id' , $id)->delete();
       return redirect()->back();
    }
}
