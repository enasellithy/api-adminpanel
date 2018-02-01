<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Comment;

class CommentController extends Controller
{
    public function welcome()
    {
        $news = News::orderBy('id','desc')->paginate(10);
        return view('welcome',compact('news'));
    }

    public function showNews($id)
    {
        $news = News::findOrFail($id);
        return view('news.news')->with('news',$news);
    }

    public function addComment(Request $request)
    {
        /*if($request->ajax())
        {
            $this->Validate($request,[
                'comment' => 'required',
            ]);
            $comment = new Comment();
            $comment->comment = $request->comment;
            $comment->user_id = auth()->user()->id;
            $comment->news_id = $request->news_id;
            $comment->save();
        }*/
        $this->Validate($request,[
            'comment' => 'required',
        ]);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->news_id = $request->news_id;
        $comment->save();
        return redirect()->back();
    }
}
