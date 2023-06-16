@extends('layouts.app')

@section('content')
<div class="row justify-content-center">

<div class="col-md-8">
    <div class="card">
        <div class="card-header">User Profile </div>

        
       

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
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection

