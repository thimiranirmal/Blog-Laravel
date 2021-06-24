<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(){
        $setting=Setting::first();
        return view('setting',['setting'=>$setting,'title'=>'Setting']);
    }

    public function change(Request $request){
        
        $countFirst=Setting::count();
        if($countFirst==0){
            $data=new Setting;
            $data->comment_auto=$request->comment_auto;
            $data->user_auto=$request->user_auto;
            $data->recent_post=$request->recent_post;
            $data->popular_post=$request->popular_post;
            $data->recent_comment_post=$request->recent_comment_post;
            $data->save();
        }else{
            $fistData=Setting::first();
            $data=Setting::find($fistData->id);
            $data->comment_auto=$request->comment_auto;
            $data->user_auto=$request->user_auto;
            $data->recent_post=$request->recent_post;
            $data->popular_post=$request->popular_post;
            $data->recent_comment_post=$request->recent_comment_post;
            $data->save();
        }
        return redirect('admin/setting')->with('success','Setting Has been Updated');
    }
}
