@extends('layouts.app')

@section('content')
    <h1>Add FAQ Category</h1>

    <form action="{{ route('faq.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
@endsection
