@extends('layouts.app')

@section('content')

           @foreach($discussions as $d)
                <div class="card bg-light">
                    <div class="card-header">
                        <img src="{{ $d->user->avatar }}" alt="{{ $d->user->avatar }}" 
                        width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                        <span>{{ $d->user->name }}</span>
                        <a href="{{ route('discussion', ['slug' => $d->slug]) }}" class="btn btn-secondary btn-sm float-right">view</a>
                    </div>

                    <div class="card-body">
                        <h5 class="text-center">
                            {{ $d->title }}
                        </h5>

                        <p class="text-center"> 
                            {{ Str::limit($d->content,50) }}
                        </p>
                    </div>
                </div>

                <div class="card-footer">
                    <p>
                        {{ $d->replies->count() }}Replies
                    </p>
                </div>
                <br>
           @endforeach

           <div class="float-center">
                {{ $discussions->links() }}
           </div>
@endsection
