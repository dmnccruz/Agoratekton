<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Hide;
use App\Comment;
use App\Like;
use App\Message;
use App\Meeting;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();   
        $users = User::all();
        $meetings = Meeting::all();
        
        // $meetingmes = Meeting::all()->where('caller_id', '=', Auth::user()->id);
        // $meetingyous = Meeting::all()->where('receiver_id', '=', Auth::user()->id);
        // dd($meetingmes === null);

        return view('/timeline', compact('posts', 'users', 'meetings'));
    }
    
    public function hidepost($myid, $postid)
    {
        $new_hide = new Hide;
        $new_hide->user_id = $myid;
        $new_hide->post_id = $postid;

        $new_hide->save();

        return ('post is now hidden');
    }

    public function unhidepost($myid, $postid)
    {
        $unhide = Hide::select()->where('user_id', '=', $myid)->where('post_id', '=', $postid);

        $unhide->user_id = $myid;
        $unhide->post_id = $postid;
        
        $unhide->delete();

        return ('post is now unhidden');
    }

    public function sendcomment($myid, $postid, $commentbody)
    {
        $comment = new Comment;
        $comment->user_id = $myid;
        $comment->postid = $postid;
        $comment->commentbody = $commentbody;

        $id = $postid;
        $addcomment = Post::find($postid);
        $addcomment->commentCount = $addcomment->commentCount + 1;

        $addcomment->save();
        $comment->save();
        $addcomment->comments()->attach($comment);

        // return ('comment sent');
        return (Comment::select()->where('user_id', '=', $myid)->where('postid', '=', $postid)->latest()->get()->first());
    }

    public function deletecomment($myid, $postid, $commentid)
    {   
        $comment = Comment::select()->where('user_id', '=', $myid)->where('postid', '=', $postid)->where('id', '=', $commentid);
        $comment->user_id = $myid;
        $comment->postId = $postid;

        $removecomment = Post::find($postid);
        $removecomment->commentCount = $removecomment->commentCount - 1;

        $removecomment->save();

        $removecomment->comments()->detach($commentid);
        $comment->delete();

        return ('comment deleted');
    }

    public function editcomment($myid, $postid, $commentid, $commentbody)
    {   
        $comment = Comment::find($commentid);
        $comment->commentbody = $commentbody;
        $comment->save();

        return ('comment edited');
    }

    public function likepost($myid, $postid)
    {
        $like = new Like;
        $like->user_id = $myid;
        $like->postId = $postid;

        $addlike = Post::find($postid);
        $addlike->likeCount = $addlike->likeCount + 1;

        $like->save();
        $addlike->save();
        $addlike->likes()->attach($like);

        return ('liked');
    }

    public function unlikepost($myid, $postid)
    {   
        $like = Like::select()->where('user_id', '=', $myid)->where('postid', '=', $postid)    ;
        $like->user_id = $myid;
        $like->postId = $postid;

        $subtractlike = Post::find($postid);
        $subtractlike->likeCount = $subtractlike->likeCount - 1;

        $subtractlike->save();

        $subtractlike->likes()->detach();
        $like->delete();

        return ('unliked');
    }

    public function sendmessage($myid, $toid, $messagebody)
    {
        function generateRandomString($length = 10) {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $message = new Message;
        $message->from_id = $myid;
        $message->to_id = $toid;
        $message->body = $messagebody;
        $message->type = "user";
        $message->id = generateRandomString();
    
        $message->save();
        return ('message sent');
    }
    
    public function storeRequest($callerId, $recId, $callername, $recname, $date, $topic)
    {
        $meeting = new Meeting;
        $meeting->caller_id = $callerId;
        $meeting->receiver_id = $recId;
        $meeting->meetingdate = $date;
        $meeting->meetingtopic = $topic;
        $meeting->caller_name = $callername;
        $meeting->receiver_name = $recname;

        $meeting->save();
        return ('meeting saved');
    }

    public function newUser($name, $email, $password, $avatar, $roleId)
    {

        function generateRandomString($length = 3) {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make('$password');
        // $user->password = $password;
        
        $user->avatar = "images/" . $avatar;
        // $image = $avatar->file('profilePic');

        // bcrypt(request('$password'))

        $user->role_id = $roleId;
        $user->meetingid = generateRandomString()."-".generateRandomString()."-".generateRandomString();
        $user->created_at = now();
        $user->updated_at = now();

        $user->save();
        return ('user saved');
    }

    
    public function store(Request $request)
    {
        $myId = $request->user_id;

        $new_post = new Post;
        $new_post->posttitle = $request->posttitle;
        // $new_post->post_type_id = 1;
        $new_post->post_type_id = $request->postType;
        $new_post->summary = $request->summary;

        if($request->file('createCoverPhoto') != null){
            $image1 = $request->file('createCoverPhoto');
            $image_name1 = time() . "." . $image1->getClientOriginalExtension();
            $destination = "images/"; 
            $image1->move($destination, $image_name1);
            $result = \Cloudinary\Uploader::upload_large($destination.$image_name1);
            $new_post->coverPhoto = $result['secure_url'];
        }

        else {
            $new_post->coverPhoto = 'images/agoratektonstockphoto.jpg';
        }

        if($request->postType === '1') {

            if($request->file('photo1') != null){
                $image2 = $request->file('photo1');
                $image_name2 = time() . "1" . "." . $image2->getClientOriginalExtension();
                $destination = "images/"; 
                $image2->move($destination, $image_name2);
                $result2 = \Cloudinary\Uploader::upload_large($destination.$image_name2);
                $new_post->photo1 = $result2['secure_url'];
            }

            else {
                $new_post->photo1 = 'images/agoratektonstockphoto.jpg';
            }

            if($request->file('photo2') != null){
                $image3 = $request->file('photo2');
                $image_name3 = time() . "2" . "." . $image3->getClientOriginalExtension();
                $destination = "images/"; 
                $image3->move($destination, $image_name3);
                $result3 = \Cloudinary\Uploader::upload_large($destination.$image_name3);
                $new_post->photo2 = $result3['secure_url'];
            }

            else {
                $new_post->photo2 = 'images/agoratektonstockphoto.jpg';
            }

            if($request->file('photo3') != null){
                $image4 = $request->file('photo3');
                $image_name4 = time() . "3" . "." . $image4->getClientOriginalExtension();
                $destination = "images/"; 
                $image4->move($destination, $image_name4);
                $result4 = \Cloudinary\Uploader::upload_large($destination.$image_name4);
                $new_post->photo3 = $result4['secure_url'];
            }

            else {
                $new_post->photo3 = 'images/agoratektonstockphoto.jpg';
            }
        }
       
        $addpost = User::find($myId);
        $new_post->save();
        $addpost->posts()->attach($new_post);

        // $posts = Post::all();   
        // $users = User::all();
        // $meetings = Meeting::all();
 
        // return view('timeline', compact('posts', 'users', 'meetings'));
        return ($new_post);
    } 

    public function updatepost($id, Request $request)
    {
        $post = Post::find($id);

        $post->posttitle = $request->posttitle;
        $post->post_type_id = $request->postType;
        $post->summary = $request->summary;

        if($request->file('createCoverPhoto') != null){
            $image1 = $request->file('createCoverPhoto');
            $image_name1 = time() . "." . $image1->getClientOriginalExtension();
            $destination = "images/"; 
            $image1->move($destination, $image_name1);
            $result = \Cloudinary\Uploader::upload_large($destination.$image_name1);
            $post->coverPhoto = $result['secure_url'];
        }

        else {
            $post->coverPhoto = $post->coverPhoto;
        }

        if($request->postType === '1') {

            if($request->file('photo1') != null){
                $image2 = $request->file('photo1');
                $image_name2 = time() . "1" . "." . $image2->getClientOriginalExtension();
                $destination = "images/"; 
                $image2->move($destination, $image_name2);
                $result2 = \Cloudinary\Uploader::upload_large($destination.$image_name2);
                $post->photo1 = $result2['secure_url'];
            }

            else {
                $post->photo1 = $post->photo1;
            }

            if($request->file('photo2') != null){
                $image3 = $request->file('photo2');
                $image_name3 = time() . "2" . "." . $image3->getClientOriginalExtension();
                $destination = "images/"; 
                $image3->move($destination, $image_name3);
                $result3 = \Cloudinary\Uploader::upload_large($destination.$image_name3);
                $post->photo2 = $result3['secure_url'];
            }

            else {
                $post->photo2 = $post->photo2;
            }

            if($request->file('photo3') != null){
                $image4 = $request->file('photo3');
                $image_name4 = time() . "3" . "." . $image4->getClientOriginalExtension();
                $destination = "images/"; 
                $image4->move($destination, $image_name4);
                $result4 = \Cloudinary\Uploader::upload_large($destination.$image_name4);
                $post->photo3 = $result4['secure_url'];
            }

            else {
                $post->photo3 = $post->photo3;
            }
        }
       
        $post->save();

        return ($post);
    } 

    public function deletepost($myid, $postid)
    {   
        $post = Post::find($postid);
        $post->users()->detach();
        $post->likes()->detach();
        $post->comments()->detach();

        $post->delete();

        return ('post deleted');
    }
    
}

