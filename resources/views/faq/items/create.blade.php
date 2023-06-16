@extends('layouts.app')

@section('content')
    <h1>Create FAQ Item</h1>

    <form action="{{ route('faq.items.store') }}" method="POST">
        @csrf

        <div>
            <label for="question">Question</label>
            <input type="text" name="question" id="question">
        </div>

        <div>
            <label for="answer">Answer</label>
            <textarea name="answer" id="answer"></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection
