<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $sliders = Slider::all();
         return view('admin.view_all_slider',compact('sliders') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addSliders');
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
        $validator =  Validator::make(array(
            "title"=> $request->title,
            "description"=> $request->description,
            "image"=> $request->image,
           ), array(
                    "title"=>"required|",
                    "description"=>"required",
                    "image"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048",
                    
                ));
    
              if( $validator->fails()){
                    return redirect("admin/create")->withErrors($validator)->withInput();
              }
       
                $file = $request->file("image");
                $bg_images = time().'.'.$file->getClientOriginalExtension();
                if($request->hasFile("image"))
                {
                    $bg_images = time().'.'.$file->getClientOriginalExtension();
                    $file->move("uploads/Banners/" , $bg_images );       
                 }
    
    
              // print_r($request->all() );   // this will give all form field names
    
              $obj = new Slider();
              $obj->title= request('title');
              $obj->description= request('description');
              $obj->image = $bg_images;
     
              $obj->save();
              return redirect("admin/slider")->with('message', 'Slider Has Been Created Successfully !!');
        
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
        $slider = Slider::where('id', $id )->first();
        return view('admin.editSliders',compact('slider'));
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
      $obj = Slider::find($id);
      $obj->title= request('title');
      $obj->description= request('description');

       if ($request->hasfile('image'))
       {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move("uploads/Banners/" , $filename );
            $obj->image=$filename;
       } 

      $obj->save();
      return redirect("admin/slider")->with('message', 'Slider Has Been Updated Successfully !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::where('id',$id)->delete();
        return redirect()->back();
    }
}
