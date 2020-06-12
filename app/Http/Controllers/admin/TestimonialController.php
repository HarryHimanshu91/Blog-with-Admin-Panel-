<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Models\Testimonial;
use Validator;

class TestimonialController extends Controller
{
    //
    public function index(){
         $Testimonial = Testimonial::all();
         return view('admin.view_testimonials',compact('Testimonial'));
    }
    
   public function create(){
       return view('admin.addTestimonial');
   }

   public function saveTestimonial(Request $request)
   {
    $validator =  Validator::make(array(
        "description"=> $request->description,
        "author_name"=> $request->author_name,
        "author_meta"=> $request->author_meta,
        "author_image"=> $request->author_image,
       ), array(
                "description"=>"required|",
                "author_name"=>"required",
                "author_meta"=>"required",
                "author_image"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048",
                
            ));

          if( $validator->fails()){
                return redirect("admin/addTestimonial")->withErrors($validator)->withInput();
          }
   
            $file = $request->file("author_image");
            $bg_images = time().'.'.$file->getClientOriginalExtension();
            if($request->hasFile("author_image"))
            {
                $bg_images = time().'.'.$file->getClientOriginalExtension();
                $file->move("uploads/" , $bg_images );       
             }


          // print_r($request->all() );   // this will give all form field names

          $obj = new Testimonial();
          $obj->description= request('description');
          $obj->author_name = request('author_name');
          $obj->author_meta = request('author_meta');
          $obj->author_image = $bg_images;
 
          $obj->save();
          $request->session()->flash("message","Testimonials Has Been Created Successfully !! ");
          return redirect("admin/addTestimonial");

        }


        public function editTestimonial($id)
        {
          $testimonial = Testimonial::where('id',$id)->first();
          return view('admin.editTestimonial',compact('testimonial'));
        }

        public function updateTestimomial(Request $request , $id)
        {
          
        $obj =Testimonial::find($id);
        $obj->description= request('description');
        $obj->author_name = request('author_name');
        $obj->author_meta = request('author_meta');

        if ($request->hasfile('author_image')){
          $file = $request->file('author_image');
          $extension = $file->getClientOriginalExtension();
          $filename = time().'.'.$extension;
          $file->move("uploads/" , $filename );
          $obj->author_image=$filename;
      } 
        $obj->save();
        $request->session()->flash("message","Testimonials Has Been Updated Successfully !! ");
        return redirect("admin/edit/".$id);
        }


        public function deleteTestimonial($id)
        {
          Testimonial::where('id', $id )->delete();
          return redirect()->back();
        }
   

}
