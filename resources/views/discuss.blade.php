@extends('layouts.app')

@section('content')
<div class="card">
        @if(session('response'))
            <div class="alert alert-success">{{session('response')}}</div>
        @endif
    <div class="card-header text-center">Create a new discussion</div>

    <div class="card-body">
        <form action="{{ url('discussions/store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                required autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            <div class="form-group">
                <label for="channel">Pick a channel</label>
                <select name="channel_id" id="channel_id" class="form-control">
                    @foreach($channels as $channel)
                        <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content">Ask a question</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror"
                required autocomplete="content" autofocus></textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-success float-right" type="submit">Create discussion</button>
            </div>
        </form>
    </div>
</div>
@endsection
