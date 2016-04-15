<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Comment;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class CommentController
 *
 * @author  The scaffold-interface created at 2016-04-12 08:49:32pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('comment.create'
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

        $comment = new Comment();

        
        $comment->post_date = $input['post_date'];

        
        $comment->comment = $input['comment'];

        
        
        $comment->save();

        return redirect('comment');
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
            return URL::to('comment/'.$id);
        }

        $comment = Comment::findOrfail($id);
        return view('comment.show',compact('comment'));
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
            return URL::to('comment/'. $id . '/edit');
        }

        
        $comment = Comment::findOrfail($id);
        return view('comment.edit',compact('comment'
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

        $comment = Comment::findOrfail($id);
    	
        $comment->post_date = $input['post_date'];
        
        $comment->comment = $input['comment'];
        
        
        $comment->save();

        return redirect('comment');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/comment/'. $id . '/delete/');

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
     	$comment = Comment::findOrfail($id);
     	$comment->delete();
        return URL::to('comment');
    }

}
