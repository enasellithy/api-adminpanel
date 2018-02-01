<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Comment;

class NewsController extends Controller
{
    public function all_news()
    {
        $all_news = News::withCount('comments')
                   ->orderBy('id','desc')->paginate(10);
        return response([
            'all_news' => $all_news
        ]);
    }

    public function show($id)
    {
        $news = News::with('comments')->findOrFail($id);
        return response([
            'news' => $news,
            'status' => true
        ],200);
    }

    public function edit($id)
    {
        $news = News::withCount('comments')->findOrFail($id);
        return response([
            'news' => $news,
            'status' => true
        ],200);
    }

    public function update(Request $request ,$id)
    {
        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->des = $request->des;
        $news->content = $request->content;
        $news->status = $request->status;
        $news->user_id = $request->user_id;
        $news->save();
        return response([
            'news' => $news,
            'status' => true
        ],200);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return response([
            'news' => $news,
            'status' => true
        ],200);
    }
}
