<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryPost; 
use App\Models\post_tag; 
use App\Models\Post;
use App\Models\Tag;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.viewall_category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add_category');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   return $request->all();
        $validator =  Validator::make(array(
            "name"=> $request->name,
            "slug"=> $request->slug,
            ), array(
                    "name"=>"required",
                    "slug"=>"required",
                ));

                if( $validator->fails()){
                        return redirect("admin/category/create")->withErrors($validator)->withInput();
                }else{
                    $category = new category;
                    $category->name = $request->name;
                    $category->slug = $request->slug;
                    $category->save();
                    $request->session()->flash("message","Category Has Been Created Successfully !! ");
                    return redirect("admin/category/create");
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
        // echo $id; die; 
        $category_posts = Category::where('id',$id)->with('posts')->first();
        $post_ids = ($category_posts->posts)->pluck('id')->toArray();
        $singleCategory = Category::whereId($id)->first();
        $posts = Post::whereIn('id',$post_ids)->with('categories','tags')->get()->toArray();
        $singleCategory->posts = $posts;
       // dd($singleCategory->toArray());

       // dd($category_posts);
       //  dd($post_ids);

       $categories = Category::all();
       $tags = Tag::all();
        return view('userside.category_dummy',compact('singleCategory','categories','tags' ));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::where('id',$id)->first();
        return view('admin.editcategory',compact('category'));
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
        $validator =  Validator::make(array(
            "name"=> $request->name,
            "slug"=> $request->slug,
            ), array(
                    "name"=>"required",
                    "slug"=>"required",
                ));

                if( $validator->fails()){
                        return redirect()->back()->withErrors($validator)->withInput();
                }else{
                    $category = category::find($id);
                    $category->name = $request->name;
                    $category->slug = $request->slug;
                    $category->save();
                    $request->session()->flash("message","Category Has Been Updated Successfully !! ");
                    return redirect("admin/category");
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
        category::where('id',$id)->delete();
        return redirect()->back();
    }
}
