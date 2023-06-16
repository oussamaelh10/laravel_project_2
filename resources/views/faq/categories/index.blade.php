@extends('layouts.app')

@section('content')
    <h1>FAQ Categories</h1>

    <a href="{{ route('faq.categories.create') }}" class="btn btn-primary">Add Category</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('faq.categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('faq.categories.destroy', $category->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
