<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Redirect;
use App\Reply;


class DiscussionsController extends Controller
{
    public function create(){
        return view('discuss');
    }

    public function store(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'channel_id' => 'required',
            'content'=> 'required',

        ]);

        $discussions = Discussion::create([
            'title' => $request->title,
            'channel_id' => $request->channel_id,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title)
        ]);

        return redirect()->route('discussion', ['slug' => $discussions->slug])->with('response', 'Discussion created successfully');
    }

    public function show($slug){
        return view('discussions.show')->with('d', Discussion::where('slug', $slug)->first());
    }
    
    public function reply(Request $request, $id){

        $replies = Discussion::find($id);
        $replies = Reply::create([
        'user_id' => Auth::id(),
        'discussion_id' => $id,
        'content' => $request->reply,
        ]);
        dd($replies);
        // return redirect()->back()->with('response', 'Replied to Discussion');

    }
}
