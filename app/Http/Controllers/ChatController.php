<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getChat()
    {
        $chats = Chat::get();
        return view('chat.chat',compact('chats'));
    }

    public function storeChat(Request $request)
    {
        /*if($request->ajax())
        {

        }*/
        $this->Validate($request,[
            'msg' => 'required',
        ]);
        $chat = new Chat();
        $chat->msg = $request->msg;
        $chat->save();
        return redirect('/chat');
    }
}
