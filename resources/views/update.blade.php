@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            update form
            <form method="POST" action={{ route('posts.update') }}>
                @csrf
                <input type="text" name="name" value={{$update[0]->name}}/>
                <input type="hidden" name="id" value={{$update[0]->id}}/>
                    
                <textarea name="content" id="" cols="10" rows="5">

                        {{ $update[0]->content }}

                </textarea>
                <input type="submit" name="submit" />
            </form>
            
        </div>
    </div>

@endsection