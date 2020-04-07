@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session('response'))
                <div class="alert alert-success">{{session('response')}}</div>
        @endif
            <div class="card">
                <div class="card-header text-center">Channels</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                Name
                            </th>

                            <th>
                                Edit
                            </th>

                            <th>
                                Delete
                            </th>

                        </thead>

                        <tbody>
                            @foreach($channels as $channel)

                                <tr>
                                    <td>{{ $channel->title}}</td>

                                    <td>
                                        <a href='{{ url("/edit/{$channel->id}") }}' class="btn btn-xs btn-info">
                                        <i class="far fa-edit">Edit</i></a>
                                    </td>

                                    <td>
                                        <a href='{{ url("/delete/{$channel->id}") }}' class="btn btn-xs btn-danger">
                                    Delete<i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
