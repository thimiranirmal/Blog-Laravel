<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::all();
        return view('category',['categorydata'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoryadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);
        
        if($request->hasFile('image')){
            $image=$request->file('image');
            $reimg=time().".".$image->getClientOriginalExtension();
            $destination=public_path('/img');
            $image->move($destination,$reimg);

        }else{
            $reimg='';
        }

        $catregory=new Category;
        $catregory->title=$request->title;
        $catregory->description=$request->detail;
        $catregory->image=$reimg;

        $catregory->save();

        return redirect('/admin/category/create')->with('success','Data has been Added');
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
        $data=Category::find($id);
        return view('categoryupdate',['data'=>$data]);
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
        $request->validate([
            'title'=>'required'
        ]);
        
        if($request->hasFile('image')){
            $image=$request->file('image');
            $reimg=time().".".$image->getClientOriginalExtension();
            $destination=public_path('/img');
            $image->move($destination,$reimg);

        }else{
            $reimg=$request->image;
        }

        $catregory=Category::find($id);
        $catregory->title=$request->title;
        $catregory->description=$request->detail;
        $catregory->image=$reimg;

        $catregory->save();

        return redirect('/admin/category')->with('success','Data has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect('/admin/category')->with('warning','Data has been Deleted');
    }
}
