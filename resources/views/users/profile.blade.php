@extends('layouts.app')




@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Profiel van {{$user->name }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                @if($user->avatar)
                                <img src="{{ asset('storage/'.$user->avatar) }}" alt="Avatar" class="avatar img-fluid rounded-circle">
                            @else
                            <img src="{{ asset('images/placeholder.png') }}" alt="Placeholder" class="avatar img-fluid rounded-circle">
                            @endif
                        
                        </div>
                        </div>
                    
                        <div class="col-md-8">
                            <h4>Gebruikersnaam:</h4>
                            <p>{{$user->name}}</p>
                            <h4>Geboortedatum:</h4>
                            <p>{{$user->birthday}}</p>
                            <h4>About me:</h4>
                            <p>{{$user->bio}}</p>
                        </div>
                    </div>
                    

                    <hr>
                    <h2>Gemaakte Posts</h2>
                    @foreach($user->posts as $post)
                    <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a><br>
                    @endforeach

<hr>
                    <h2>Gelikete Posts</h2>
                    @foreach($user->likes as $like)
                   <a href="{{route('posts.show', $like->post_id)}}">{{$like->post->title}}</a><br>
                    @endforeach
                   
<div class="card-footer">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#profileOptions" aria-expanded="false" aria-controls="profileOptions">
        Edit profile
    </button>
    <div class="collapse mt-3" id="profileOptions">
        <form action="{{ route('profile.update', ['name' => $user->name]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nouveau mot de passe">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nouvel e-mail">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>

                   

                   

                </div>

            </div>

        </div>

    </div>

</div>

@endsection