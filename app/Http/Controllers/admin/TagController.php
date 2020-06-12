<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tag; 
use Validator;
use App\Models\category;
use App\Models\category_post; 
use App\Models\post;
use App\Models\post_tag; 

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = tag::all();
        return view('admin.view_alltags',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add_tag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
       $validator =  Validator::make(array(
        "name"=> $request->name,
        "slug"=> $request->slug,
        ), array(
                "name"=>"required",
                "slug"=>"required",
            ));

            if( $validator->fails()){
                    return redirect("admin/tags/create")->withErrors($validator)->withInput();
            }else{
                $tag = new tag;
                $tag->name = $request->name;
                $tag->slug = $request->slug;
                $tag->save();
                $request->session()->flash("message","Tags Has Been Created Successfully !! ");
                return redirect("admin/tags/create");
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
        // echo $id;
         $tagPosts = Tag::where('id',$id)->with('posts')->first();
         //dd($tagPosts);
         $ids = $tagPosts->posts->pluck('id')->toArray();
         // dd($ids);
       
          
         $TagId =  Tag::whereId($id)->first();
         // dd($TagId);

         $post =  Post::whereIn('id',$ids)->with('categories','tags')->get()->toArray();
         // dd($post);

         $TagId->post = $post;
        // dd($TagId->toArray());
        $categories = Category::all();
        $tags = Tag::all();

         return view('userside.tag',compact('TagId','categories','tags' ));
       
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
        $tags = tag::where('id',$id)->first();
        return view('admin.editTags',compact('tags'));
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
            "name"=> $request->name,
            "slug"=> $request->slug,
            ), array(
                    "name"=>"required",
                    "slug"=>"required",
                ));
    
                if( $validator->fails()){
                        return back()->withErrors($validator)->withInput();
                }else{
                    $tag = tag::find($id);
                    $tag->name = $request->name;
                    $tag->slug = $request->slug;
                    $tag->save();
                    return back()->with('message', 'Tags Has Been Updated Successfully !! ');
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
        tag::where('id',$id)->delete();
        return redirect()->back();
    }
}
