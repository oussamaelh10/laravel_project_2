@extends('layouts.app')

@section('content')
    <h1>Edit FAQ Item</h1>

    <form action="{{ route('faq.items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="question">Question</label>
            <input type="text" name="question" id="question" value="{{ $item->question }}">
        </div>

        <div>
            <label for="answer">Answer</label>
            <textarea name="answer" id="answer">{{ $item->answer }}</textarea>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
