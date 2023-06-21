@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>FAQ</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>After-service</h2>

                <!-- Laat ons een commentaar -->
                <h3>Laat ons een commentaar</h3>
                <form method="POST" action="{{ route('faq.store') }}">
                    @csrf
                    <input type="hidden" name="category" value="After-service">
                    <div class="mb-3">
                        <label for="question">Title</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer">Content</label>
                        <textarea name="answer" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

            <div class="col-md-6">
                <h2>Vragen over ons</h2>

                <!-- Laat ons een commentaar -->
                <h3>Laat ons een commentaar</h3>
                <form method="POST" action="{{ route('faq.store') }}">
                    @csrf
                    <input type="hidden" name="category" value="Vragen over ons">
                    <div class="mb-3">
                        <label for="question">Title</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer">Content</label>
                        <textarea name="answer" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

        <h2>After-service</h2>
        <ul>
            @foreach ($categories as $category)
                @if ($category->name === 'After-service')
                    @foreach ($category->questions as $question)
                        <li>
                            <strong>{{ $question->question }}</strong><br>
                            {{ $question->answer }}
                            @if ($question->response)
                                <div class="response">
                                    <strong>Response:</strong><br>
                                    {{ $question->response }}
                                </div>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach
        </ul>

        <h2>Vragen over ons</h2>
        <ul>
            @foreach ($categories as $category)
                @if ($category->name === 'Vragen over ons')
                    @foreach ($category->questions as $question)
                        <li>
                            <strong>{{ $question->question }}</strong><br>
                            {{ $question->answer }}
                            @if ($question->response)
                                <div class="response">
                                    <strong>Response:</strong><br>
                                    {{ $question->response }}
                                </div>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach
        </ul>
    </div>

@endsection
