<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Facades\Auth;
use App\Discussion;
use App\Like;
use App\User;
use Illuminate\Http\Request;
use App\Reply;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;
// use App\Notification;

class RepliesController extends Controller
{
    public function reply($id){

        $d = Discussion::find($id);

        $reply = Reply::create([
        'user_id' => Auth::id(),
        'discussion_id' => $id,
        'content' => request()->reply,
        ]);

        $reply->user->points += 25;
        $reply->user->save();

        $watchers = array();

        foreach ($d->watchers as $watcher):
            array_push($watchers, User::find($watcher->user_id));
        endforeach;

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));

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

    public function best_answer($id){

        $reply = Reply::find($id);
        $reply->best_answer = 1;
        $reply->save();

        $reply->user->points += 100;
        $reply->user->save();
        
        Session()->flash('success', 'Reply has been marked as best answer');

        return redirect()->back();
    }
}
