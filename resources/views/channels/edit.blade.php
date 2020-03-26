@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header text-center">Edit Channel</div>

                
                <div class="card-body">
                    <form action="{{ url('/editChannel', ['channel' => $channel->id ]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <input type="text" name="channel" value="{{ $channel->title }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    {{ __('Update Channel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                        
                </div>
            </div>
@endsection
