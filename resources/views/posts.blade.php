@extends('layouts.app')

@section('content')
<div class="container">
    Ajout de post
    {{Auth::user()}}
    <div class="card-body">
        <form method="POST" action="{{ route('post.create') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                
                <div class="col-md-6">
                    <input name="name" id="name" type="text" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>
                
                <div class="col-md-6">
                    <textarea name="content" id="content" type="text" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection