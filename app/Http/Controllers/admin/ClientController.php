<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.viewAllClients',compact('clients') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addNewClients');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make(array(
            "image"=> $request->image,
           ), array(
                    "image"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048",
                    
                ));
    
              if( $validator->fails()){
                    return redirect("admin/clients/create")->withErrors($validator)->withInput();
              }
       
                $file = $request->file("image");
                $bg_images = time().'.'.$file->getClientOriginalExtension();
                if($request->hasFile("image"))
                {
                    $bg_images = time().'.'.$file->getClientOriginalExtension();
                    $file->move("uploads/Clients/" , $bg_images );       
                 }
    
    
              // print_r($request->all() );   // this will give all form field names
    
              $obj = new Client();
              $obj->image = $bg_images;
     
              $obj->save();
              return redirect("admin/clients")->with('message', 'Clients Has Been Created Successfully !!');
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
        $clients = Client::where('id',$id )->first();
        return view('admin.editClients',compact('clients') );
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
        $obj =Client::find($id);
        if ($request->hasfile('image')){
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension();
          $filename = time().'.'.$extension;
          $file->move("uploads/Clients" , $filename );
          $obj->image=$filename;
      } 
        $obj->save();
        //$request->session()->flash("message","Clients Has Been Updated Successfully !! ");
        return redirect("admin/clients")->with('message', 'Clients Has Been Created Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Client::where('id',$id)->delete();
       return redirect()->back();
    }
}
