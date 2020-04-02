@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header text-center">Create a New Channel</div>

                
                <div class="card-body">
                    <form action="{{ route('channels.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input id="channel" type="text" name="channel" class="form-control @error('name') is-invalid @enderror"
                            name="channel" value="{{ old('channel') }}" required autocomplete="channel" autofocus>
                                @error('channel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    {{ __('Save Channel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                        
                </div>
            </div>
@endsection
