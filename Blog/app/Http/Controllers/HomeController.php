<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request){

        if($request->has('q')){
            $q=$request->q;
            $posts=Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->paginate(9);

        }else{
            $posts=Post::orderBy('id','desc')->paginate(9);
        }
        return view('home',['posts'=>$posts]);
    }

    public function detail(Request $request,$slug,$postId){
        //view count
        Post:: find($postId)->increment('views');
        //
        $detail=Post::find($postId);
        return view('detail',['detail'=>$detail]);
    }

    public function save_comment(Request $request,$slug,$id){

        $request->validate([
            'comment'=>'required'
        ]);

        $data=new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();

        return redirect('detail/'.$slug.'/'.$id);


    }

    function all_category(){
        $categories=Category::orderBy('id','desc')->paginate(9);
        return view('categories',['categories'=>$categories]);
    }

    function category_posts(Request $request,$cat_slug,$cat_id){
        $category=Category::find($cat_id);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(9);
        return view('category-posts',['posts'=>$posts , 'category'=>$category]);
    }


    function submit_post(){
        $categories=Category::all();
        return view('save-post-form',['cats'=>$categories]);
    }

    function save_post(Request $request){
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
        $post->user_id=$request->user()->id;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reimgthumb;
        $post->full_img=$reimgfull;
        $post->detail=$request->detail;
        $post->tags=$request->tag;
        $post->status=1;
        

        $post->save();

        return redirect('save-post-form')->with('success','Data has been Added');
    }


}

