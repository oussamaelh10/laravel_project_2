@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profiel van {{$user ->name}}</div>

                <div class="card-body">
                    
                    <h2>Gemaakte Posts</h2>

                    @foreach($user->posts as $post)
                    <a href="">{{ $post->title}} </a><br>
                    @endforeach

                <br>
                <br>

                    <h2>Gelikete Posts</h2>

                    @foreach($user->likes as $like)
                    <a href="">{{ $like->post->title}} </a><br>
                    @endforeach

        

                        
                   


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
