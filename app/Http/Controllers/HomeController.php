<?php

namespace App\Http\Controllers;

use App\Models\Post;
use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(){
        if (Auth::id()){
            $post = Post::where('user_status','=','active')->get();
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user'){
                return view('home.homepage', compact('post'));
            }
            else if ($usertype == 'admin'){
                return view('admin.adminHome');
            }
            else{
                return redirect()->back();
            }
        }
    }
    public function homepage(){
        $post = Post::where('user_status','=','active')->get();
        return view('home.homepage', compact('post'));
    }
    public function post_details($id){
        $post = Post::find($id);
        return view('home.post_details', compact('post'));
    }
    public function create_post(){
        return view('home.create_post');
    }
    public function user_post(Request $request){
        $user=Auth()->user();
        $userid = $user->id;
        $username=$user->name;
        $usertype=$user->usertype;
        $post = New Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id=$userid;
        $post->name=$username;
        $post->usertype=$usertype;
        $post->user_status='pending';
        $image=$request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();
        Alert::success('Congrats','You have added the post successfully');
        return redirect()->back();
    }
    public function my_posts(){
        $user = Auth::user();
        $userid =$user->id;
        $data = Post::where('user_id','=',$userid)->get();
        return view('home.my_posts', compact('data'));
    }
    public function my_post_del($id){
        $data = Post::find($id);
        $data->delete();
        return redirect()->back()->with('message','Post deleted successfully');
    }
    public function post_edit_page($id){
        $data = Post::find($id);


        return view('home.post_edit_page', compact('data'));

    }
    public function edit_post_data(Request $request, $id){
        $data = Post::find($id);
        $data->title= $request->title;
        $data->description= $request->description;
        $image= $request->image;
        if($image){
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image =$imagename;
        }
        $data->save();
        return redirect()->back()->with('message','Post updated successfully');

    }
}
