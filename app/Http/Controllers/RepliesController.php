<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Facades\Auth;
use App\Discussion;
use App\Like;
use App\User;
use Illuminate\Http\Request;
use App\Reply;

class RepliesController extends Controller
{
    public function reply($id){

        $d = Discussion::find($id);

        $reply = Reply::create([
        'user_id' => Auth::id(),
        'discussion_id' => $id,
        'content' => request()->reply,
        ]);


        $watchers = array();

        foreach ($d->watchers as $watcher):
            array_push($watchers, User::find($watcher->user_id));
        endforeach;

        dd($watchers);

        Session()->flash('success', 'Replied to Discussion');

        return redirect()->back();
    }

    public function like($id){

        Like::create([
            'reply_id' => $id,
            'user_id' => Auth::id()
        ]);

        Session()->flash('success', 'You liked the reply');

        return redirect()->back();
    }

    public function unlike($id){
        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

        $like->delete();

        Session()->flash('success', 'You unliked the reply');

        return redirect()->back();
    }
}
