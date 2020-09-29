@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($msg ?? '')
                        <div class="alert alert-success" role="alert">
                            {{ $msg ?? '' }}
                        </div>
                    @endif

                    @if ($my_posts)
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Content</th>
                                    <th>Id</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @foreach ($my_posts as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->content}}</td>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        <button><a href={{ route('posts.form.update', ['id' => $item->id]) }}>U</button>
                                        <button><a href={{ route('posts.delete', ['id' => $item->id]) }}>D</button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
