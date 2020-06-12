<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use App\Models\Portfolio;
use Validator;

class PortfolioController extends Controller
{
    //
    public function index()
    {   
         $portfolio = Portfolio::with('categoryname')->get();
        // dd($portfolio);
         return view('admin.viewportfolio',compact('portfolio'));
    }
    public function create()
    {
        $PortfolioCategory = PortfolioCategory::get();
        return view('admin.addPortfolio',compact('PortfolioCategory') );
    }

    public function savePortfolio( Request $request)
    {
        $validator =  Validator::make(array(
            "title"=> $request->title,
            "image"=> $request->image,
            "category"=> $request->category,
          
           ), array(
                    "title"=>"required|",
                    "image"=>"required|image|mimes:jpeg,png,jpg|max:2048",
                    "category"=>"required",
                    
                    
                ));
    
              if( $validator->fails()){
                    return redirect("admin/create")->withErrors($validator)->withInput();
              }
       
                $file = $request->file("image");
                $bg_images = time().'.'.$file->getClientOriginalExtension();
                if($request->hasFile("image"))
                {
                    $bg_images = time().'.'.$file->getClientOriginalExtension();
                    $file->move("uploads/portfolio" , $bg_images );       
                 }
    
    
              // print_r($request->all() );   // this will give all form field names
    
              $obj = new Portfolio();
              $obj->title= request('title');
              $obj->image = $bg_images;
              $obj->category = request('category');
     
              $obj->save();
              $request->session()->flash("message","Portfolio Has Been Created Successfully !! ");
              return redirect("admin/create");
    
            
    }

    
      public function edit($id)
      {
        $portfolio = Portfolio::where('id',$id)->first();
        $PortfolioCategory = PortfolioCategory::get();
        return view('admin.editPortfolio',compact('portfolio','PortfolioCategory') );
      }

       
      public function updatePortfolio(Request $request,$id)
      {

        $obj = Portfolio::find($id);
        $obj->title= request('title');
        $obj->category = request('category');
       // $obj->image = $bg_images;
        
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move("uploads/portfolio" , $filename );
            $obj->image=$filename;
        } 
 

        $obj->save();
        $request->session()->flash("message","Portfolio Has Been Updated Successfully !! ");
        return redirect("admin/editPortfolio/".$id);
      }

      public function deletePortfolio($id)
      {
          Portfolio::where('id', $id)->delete();
         return redirect()->back();
      }

}
