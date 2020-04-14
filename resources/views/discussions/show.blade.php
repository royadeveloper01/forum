@extends('layouts.app')

@section('content')

            
            <div class="card bg-light">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    <div class="card-header">
                        <img src="{{ $d->user->avatar }}" alt="{{ $d->user->avatar }}" 
                        width="40px" height="40px">&nbsp;&nbsp;&nbsp;

                        <span>{{ $d->user->name }} <b>( {{ $d->user->points }} )</b></span>
                        @if($d->is_being_watched_by_auth_user())
                            <a href="{{ route('discussion.unwatch',['id' => $d->id]) }}" 
                                class="btn btn-secondary btn-sm float-right"><i class="far fa-eye-slash">Unwatch</i></a>
                        @else
                            <a href="{{ route('discussion.watch',['id' => $d->id]) }}" 
                                class="btn btn-secondary btn-sm float-right"><i class="far fa-eye">Watch</i></a>
                        @endif
                    </div>

                    <div class="card-body">
                        <h5 class="text-center">
                            <b>{{ $d->title }}</b>
                        </h5>

                        <hr>
                        <p class="text-center"> 
                            {{ $d->content }}
                        </p>

                        <hr>

                        @if($best_answer)
                                <div class="text-center" style="padding:40px">
                                    <h3 class="text-center">Best Answer</h3>
                                    <div class="card bg-success">
                                        <div class="card-header">
                                            <img src="{{ $best_answer->user->avatar }}" alt="{{ $best_answer->user->avatar }}" 
                                                width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                                            <span>{{ $best_answer->user->name }} <b>( {{ $best_answer->user->points }} )</b></span>
                                        </div>
                                        <div class="card-body">
                                                {{ $best_answer->content }}
                                        </div>
                                    </div>
                                </div>
                        @endif
                    </div>
            </div>

            <div class="card-footer">
                <span class="badge badge-pill badge-info">{{ $d->replies->count() }} Replies</span>
                <a href="{{ route('channel', ['slug' => $d->channel->slug]) }}" class="float-right btn btn-primary btn-sm">{{ $d->channel->title }}</a>
            </div>
            <br>

            @foreach($d->replies as $r)
            <div class="card">
                <div class="card-header">
                        <img src="{{ $r->user->avatar }}" alt="{{ $r->user->avatar }}" 
                        width="40px" height="40px">&nbsp;&nbsp;&nbsp;

                        <span>{{ $r->user->name }} <b>( {{ $r->user->points }} )</b></span>
                        @if(!$best_answer)
                            <a href="{{ route('reply.best', ['id' => $r->id]) }}" class="btn btn-info btn-sm float-right">Mark as best Answer</a>
                        @endif
                </div>

                <div class="card-body">
                    <h5 class="text-center">
                        <b>{{ $r->title }}</b>
                    </h5>

                    <hr>
                    <p class="text-center"> 
                        {{ $r->content }}
                    </p>
                </div>

                <div class="card-footer">
                    @if($r->is_liked_by_auth_user())
                        <a href="{{ route('reply.unlike', ['id' => $r->id]) }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-thumbs-down">Unlike <span class="badge badge-light">{{ $r->likes->count() }}</span></i></a>
                    @else
                        <a href="{{ route('reply.like', ['id' => $r->id]) }}" class="btn btn-success btn-sm">
                            <i class="fas fa-thumbs-up">Like <span class="badge badge-light">{{ $r->likes->count() }}</span></i></a>
                    @endif
                </div>
            </div>
            @endforeach

            <div class="card">
                <div class="card-body">
                    @if(Auth::check())
                        <form action="{{ route('discussion.reply', ['id' => $d->id]) }}" method="POST">
                            {{ csrf_field() }}
                                
                            <div class="form-group">
                                <label for="reply">Leave a reply...</label>
                                <textarea name="reply" id="reply" cols="20" rows="10" 
                                class="form-control" required autocomplete="reply" autofocus></textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success float-right">Leave a Reply</button>
                            </div>
                        </form> 
                    @else
                        <div class="text-center">
                            <h2><b>Sign in to leave a Reply</b></h2>
                        </div>
                    @endif
               </div>
            </div>
@endsection
