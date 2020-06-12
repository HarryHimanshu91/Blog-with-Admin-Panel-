<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\post; 
use App\Models\tag; 
use App\Models\category; 
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = post::all();
        return view('admin.view_allpost',compact('post') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tag::all();
        $categories = category::all();
        return view('admin.add_post',compact('tags','categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // return $request->all(); die;

         $validator =  Validator::make(array(
            "title"=> $request->title,
            "subtitle"=> $request->subtitle,
            "slug"=> $request->slug,
            "body"=> $request->body,

                ), array(
                    "title"=>"required",
                    "subtitle"=>"required",
                    "slug"=>"required",
                    "body"=>"required",
                ));

                if( $validator->fails()){
                        return redirect("admin/post/create")->withErrors($validator)->withInput();
                }else{
                    $post = new post;
                    $post->title = $request->title;
                    $post->subtitle = $request->subtitle;
                    $post->slug = $request->slug;
                    $post->body = $request->body;
                    $post->save();
                    $post->tags()->sync($request->tags);
                    $post->categories()->sync($request->categories);
                    $request->session()->flash("message","Post Has Been Created Successfully !! ");
                    return redirect("admin/post/create");
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
       $post=  Post::where('id', $id)->update(['status' => '0' ]);
       return redirect()->back()->with(['message' => 'Post Has Been Deactivated Successfully']);
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
        $post = post::with('tags','categories')->where('id',$id)->first();
        $tags = tag::all();
        $categories = category::all();
        return view('admin.editpost',compact('post' ,'tags','categories'));
        
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
        
        // return $request->all();

        $validator =  Validator::make(array(
            "title"=> $request->title,
            "subtitle"=> $request->subtitle,
            "slug"=> $request->slug,
            "body"=> $request->body,

                ), array(
                    "title"=>"required",
                    "subtitle"=>"required",
                    "slug"=>"required",
                    "body"=>"required",
                ));

                if( $validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }else{
                    $post = post::find($id);
                    $post->title = $request->title;
                    $post->subtitle = $request->subtitle;
                    $post->slug = $request->slug;
                    $post->body = $request->body;

                    $post->save();

                    $post->tags()->sync($request->tags);
                    $post->categories()->sync($request->categories);


                    $request->session()->flash("message","Post Has Been Updated Successfully !! ");
                    return redirect("admin/post");
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
       //  echo $id;
       post::where('id',$id)->delete();
       return redirect()->back();
    }


    public function activatePost($id)
    {
        $post=  Post::where('id', $id)->update(['status' => '1' ]);
        return redirect()->back()->with(['message' => 'Post Has Been Activated Successfully']);
    }
  

}
