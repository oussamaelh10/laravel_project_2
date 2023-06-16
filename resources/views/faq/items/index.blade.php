@extends('layouts.app')

@section('content')
    <h1>FAQ Items</h1>

    <table>
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->question }}</td>
                    <td>{{ $item->answer }}</td>
                    <td>
                        <a href="{{ route('faq.items.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('faq.items.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
