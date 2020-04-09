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

                        <span>{{ $d->user->name }} <b>{{ $d->created_at->diffForHumans() }}</b></span>
                        <a href="{{ route('discussion', ['slug' => $d->slug]) }}" 
                            class="btn btn-secondary btn-sm float-right"><i class="fas fa-eye">View</i></a>
                    </div>

                    <div class="card-body">
                        <h5 class="text-center">
                            <b>{{ $d->title }}</b>
                        </h5>

                        <hr>
                        <p class="text-center"> 
                            {{ $d->content }}
                        </p>
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

                        <span>{{ $r->user->name }} <b>{{ $r->created_at->diffForHumans() }}</b></span>
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
