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
                        <a href="{{ route('discussion', ['slug' => $d->slug]) }}" class="btn btn-secondary btn-sm float-right">view</a>
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
                <p>{{ $d->replies->count() }} Replies</p>
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
                    LIKE
                </div>
            </div>
            @endforeach

            <div class="card">
                <div class="card-body">
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
                </div>
            </div>
@endsection
