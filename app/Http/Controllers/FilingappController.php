<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Messsage;
use Illuminate\Support\Facades\Auth;


class FilingappController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request) {
        // app.php内のtimezoneを編集する
        $start = new Carbon('first day of this month');
        // $year = $start->year;
        // $month = $start->month;
        // // 0~6で曜日が入っている
        // $dayOfWeek = $start->dayOfWeek;
        // $daysInMonth = $start->daysInMonth;
        // // dd($daysInMonth);
        $end = new Carbon('last day of this month');
        $login_user = Auth::user();
        // 絞り込み方法.selectでカラム指定；WEARで全カラム対象(オブジェクト)：名前の絞り込み
        $send_users = Messsage::select('users.name','users.id','messsages.created_at')
        ->join('users','messsages.sender_id','=','users.id')
        ->where('receiver_id','=',$login_user->id)
        ->orderBy('messsages.created_at','desc')
        ->get();

        // 連想配列にすることで同じ人を繰り返さないようにPHPで実装してあげた
        $users = [];
        foreach($send_users as $user){
            $users[$user->id] = $user->name;
        }

        // メッセージを送ってきた相手のID
        $sender_id = $request->sender_id;

        // メッセージを送ってきた相手のメール表示
        $messages = Messsage::select('sender_id','created_at','title','content')
        ->where('sender_id','=',$sender_id)
        ->where('receiver_id','=',$login_user->id)
        ->orderBy('messsages.created_at','desc')
        ->get();

        // dd($messages);

        return view('maine/index',compact('start','end','users','messages'));
    }

    // public function us(Request $request) {
    //     Messsage::create([
    //         'sender_id' => $request->sender_id,
    //         'title' => $request->title
    //     ]);
    //     return view('/maine');
    // }


    public function custmer() {
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');
        return view('maine/custmer',compact('start','end'));
    }

    public function mainmail() {
        return view('maine/mainmail');
    }

    public function secret() {
        return view('maine/secret');
    }

    public function meething() {
        return view('maine/meething');
    }
}
