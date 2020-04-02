<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    public function index(){
        $discussions = Discussion::orderBy('created_at', 'desc')->paginate(4);

        return view('forum', compact('discussions',$discussions));
    }
}
