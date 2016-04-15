<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Post;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class PostController
 *
 * @author  The scaffold-interface created at 2016-04-12 08:46:49pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('post.create'
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::except('_token');

        $post = new Post();

        
        $post->title = $input['title'];

        
        $post->content = $input['content'];

        
        
        $post->save();

        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Request::ajax())
        {
            return URL::to('post/'.$id);
        }

        $post = Post::findOrfail($id);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Request::ajax())
        {
            return URL::to('post/'. $id . '/edit');
        }

        
        $post = Post::findOrfail($id);
        return view('post.edit',compact('post'
                )
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Request::except('_token');

        $post = Post::findOrfail($id);
    	
        $post->title = $input['title'];
        
        $post->content = $input['content'];
        
        
        $post->save();

        return redirect('post');
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link  https://github.com/amranidev/ajaxis
     *
     * @return  String
     */
    public function DeleteMsg($id)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/post/'. $id . '/delete/');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$post = Post::findOrfail($id);
     	$post->delete();
        return URL::to('post');
    }

}
