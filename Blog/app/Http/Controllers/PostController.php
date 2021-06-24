<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Post::all();
        $cat=Category::all();
        return view('post',['title'=>'All Posts','datas'=>$data,'cats'=>$cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::all();
        return view('postadd',['cats'=>$cat,'title'=>'Post Create',]);
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
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required'
        ]);
        
        if($request->hasFile('thumb')){
            $image1=$request->file('thumb');
            $reimgthumb=time().".".$image1->getClientOriginalExtension();
            $destination=public_path('/img/postthumb');
            $image1->move($destination,$reimgthumb);

        }else{
            $reimgthumb='N/A';
        }
        if($request->hasFile('full_img')){
            $image2=$request->file('full_img');
            $reimgfull=time().".".$image2->getClientOriginalExtension();
            $destination=public_path('/img/postfullimg');
            $image2->move($destination,$reimgfull);

        }else{
            $reimgfull='N/A';
        }

        $post=new Post;
        $post->user_id=0;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reimgthumb;
        $post->full_img=$reimgfull;
        $post->detail=$request->detail;
        $post->tags=$request->tag;
        

        $post->save();

        return redirect('/admin/post/create')->with('success','Data has been Added');
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
        $cat=Category::all();
        $data=Post::find($id);
        return view('postupdate',['cats'=>$cat,'data'=>$data,'title'=>'Post Update',]);
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
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required'
        ]);
        
        if($request->hasFile('thumb')){
            $image1=$request->file('thumb');
            $reimgthumb=time().".".$image1->getClientOriginalExtension();
            $destination=public_path('/img/postthumb');
            $image1->move($destination,$reimgthumb);

        }else{
            $reimgthumb=$request->thumb;
        }
        if($request->hasFile('full_img')){
            $image2=$request->file('full_img');
            $reimgfull=time().".".$image2->getClientOriginalExtension();
            $destination=public_path('/img/postfullimg');
            $image2->move($destination,$reimgfull);

        }else{
            $reimgfull=$request->full_img;
        }

        $post=Post::find($id);
        $post->user_id=0;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reimgthumb;
        $post->full_img=$reimgfull;
        $post->detail=$request->detail;
        $post->tags=$request->tag;
        

        $post->save();

        return redirect('/admin/post')->with('success','Data has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect('/admin/post')->with('warning','Data has been Deleted');
    }
}
