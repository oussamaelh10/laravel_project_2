@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$post->title}}</div>

                <div class="card-body">
                   
                   
                   
                    <small>Gepost door <a href="{{ route('profile', $post->user->name)}}"> {{$post->user->name}} </a> op {{$post->created_at->format('d/m/Y \o\m H:i')}}</small><br>
                <br>    
                    
                    {{$post->message}}

                <br><br>
                
                    
                    
                    @auth
                    @if(Auth::check() && $post->user_id == Auth::user()->id)
                        <a href="{{route('posts.edit', $post->id)}}">Edit Post</a>
                    @else 
                    <a href="{{route('like', $post->id)}}">Like Post</a>    
                    @endif
                    <br>
                    @endauth
                    Post heeft {{$post->likes()->count()}} likes


                    @Auth
                        @if(Auth::user()->is_admin) <!-- auth::user = if de huidige ingeloggde gebruiker is admin-->
                        <br><br>
                       <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE POST" style="background-color:crimson;" onclick="return confirm('Are you sure you want to delete this post ?');"> 
                        
                    </form>
                        @endif
                    @endauth
                   


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
