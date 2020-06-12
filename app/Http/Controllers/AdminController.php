<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;
use App\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $countPosts = Post::count();
        $countCategory = Category::count();
        $countTag = Tag::count();
        $countUser = User::count();
        
        return view('admin.dashboard',compact('countPosts','countCategory','countTag' ,'countUser' ));
    }

    
    public function showloginform()
    {
       return view('admin.login');
    }
    
    public function checkUserlogin(Request $request)
    {
        $validator = Validator::make(array(
            "email"=>$request->email,
            "password"=>$request->password
        ),array(
            "email"=>"required",
            "password"=>"required"
        ));

        if($validator->fails())
        {
            return redirect("admin/login")->withErrors($validator)->withInput();
        }
        else{
             $user_info = array(
                "email"=>$request->email,
                "password"=>$request->password
             );

             if(auth()->guard("admin")->attempt($user_info)){
                $logged_user_details = auth()->guard("admin")->user();
               
                //print_r($logged_user_details);
                session(["is_active"=>1]);
                session(["user_details"=>$logged_user_details]);
                return redirect("/admin/dashboard");
            
             }else{
                 $error_message = "Invalid Credentials";
                 return redirect()->back()->withErrors($error_message);
             }

        }
    
    }


    public function logout()
    {
         Session::flush();
         Auth::guard("admin")->logout();
         return redirect("/admin/login");

    }

   public function AllUsers(){
      $users = User::all();
      return view('admin.showAllUsers',compact('users') );
   }

  public function deleteuser($id)
  {
    User::where('id',$id)->delete();
    return redirect()->back();
  }

}
