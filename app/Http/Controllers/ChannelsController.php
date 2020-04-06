<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    //Display a listing of the resource

    public function index(){
        return view('channels.index')->with('channels', Channel::all());
    }

    public function create()
    {
        return view('channels.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'channel' => 'required'
        ]);

        Channel::create([
            'title'=> $request->channel
        ]);

        return redirect('/channels')->with('response', 'Channel Created Successfully');
    }

    public function edit($id){
        $channels = Channel::find($id);
        return view('channels.edit', [ 'channel' => $channels]);
    }
    
    public function editChannel($id){
        $channels = Channel::findOrFail($id);
        $channels->title = request()->channel;
        $channels->update();
        return redirect('/channels')->with('response', 'Channel Updated Successfully');
    }

    public function destroy($id){
        Channel::where('id', $id)
        ->delete();
        return redirect('/channels')->with('response', 'Channel Deleted Successfully');
    }
}
