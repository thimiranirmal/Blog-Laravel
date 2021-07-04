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
            $posts=Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->paginate(1);

        }else{
            $posts=Post::orderBy('id','desc')->paginate(1);
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
        $categories=Category::orderBy('id','desc')->paginate(5);
        return view('categories',['categories'=>$categories]);
    }

    function category_posts(Request $request,$cat_slug,$cat_id){
        $category=Category::find($cat_id);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(1);
        return view('category-posts',['posts'=>$posts , 'category'=>$category]);
    }


}

