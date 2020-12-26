<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Messsage;
use App\User;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    // メッセージ作成画面
    public function create(Request $request) {
        $login_user = Auth::user();
        $users = [];
        if ($login_user->type === 1) {
          $users = User::where('type', '2')->get();
        } else {
          $users = User::where('type', '1')->get();
        }
        return view('message/create', compact('users'));
    }

    // メッセージ登録
    public function store(Request $request) {
        $sender_id = Auth::id();
        $receiver_id = $request->receiver_id;
        $title = $request->title;
        $content = $request->content;
        Messsage::create([
          'sender_id' => $sender_id,
          'receiver_id' => $receiver_id,
          'title' => $title,
          'content' => $content,
        ]);
        return redirect('/maine');
    }
}
