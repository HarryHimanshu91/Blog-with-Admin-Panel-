<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\Category; 
use App\Models\Tag; 
use App\Models\Testimonial; 
use App\Models\Portfolio; 
use App\Models\PortfolioCategory; 
use App\Models\Slider; 
use App\Models\Client; 
use App\Models\About; 
use App\Models\Team; 
use Session;

class HomepageController extends Controller
{
    //
    public function index(){
         $slider = Slider::all();
         $clients = Client::all();
         $about = About::all();

         $category = PortfolioCategory::all();
        
         if(Session::get('id')){
             $portfolio = PortfolioCategory::whereId(Session::get('id'))->with('portfolio')->first();
            // dd($portfolio);
             $portfolio = $portfolio->portfolio;
         }else{
             $portfolio = Portfolio::all();
         }


         return view('welcome',compact('slider', 'portfolio','category','clients','about') );
    }

    
    public function aboutUs(){
        $about = About::all();
        $teams = Team::all();
        return view('userside.about',compact('about','teams') );
    }
    public function testimonials(){
        return view('userside.testimonials');
    }
    public function blogs(){

        $post = Post::with('categories','tags')->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('userside/blogs',compact('post','categories','tags'));
    }

    public function portfolio(){
        $category = PortfolioCategory::all();
        
        if(Session::get('id')){
            $portfolio = PortfolioCategory::whereId(Session::get('id'))->with('portfolio')->first();
           // dd($portfolio);
            $portfolio = $portfolio->portfolio;
        }else{
            $portfolio = Portfolio::all();
        }
        return view('userside/portfolio',compact('portfolio','category'));        
    }


    public function findByCategory($id)
    {
        // dd($id);
        return redirect()->route('portfolio')->with(['id' => $id]);
    }


    public function contact(){
        return view('userside/contact');
    }

    public function detailBlogs($id){
        //echo $id;
        $post = Post::where('id',$id)->with('categories','tags')->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('userside.singleblog',compact('post','categories','tags'));
    }
   
 
   
    public function searchPosts(Request $request)
    {
        //  print_r($request->all());
        $search = $request->get('q');
        $post = Post::where('title','like','%'.$search.'%' )->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('userside.search', compact('post','categories','tags') );
    }

    public function showTestimonials(){
         $Testimonial = Testimonial::all();
         return view('userside.testimonials',compact('Testimonial'));
    }

   


   
    

}
