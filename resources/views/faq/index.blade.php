@extends('layouts.app')
 
@section('content')
    <div class="container">
        <h1>FAQ</h1>
 
        <div class="row">
            <div class="col-md-6">
                <h2>After-service</h2>
                 
               
 
                <ul>
                    @foreach ($categories as $category)
                        @if ($category->name === 'After-service')
                            @foreach ($category->questions as $question)
                                
                            @endforeach
                        @endif
                    @endforeach
                </ul>
 
                
                <!-- Toevoegen van een nieuw vraag- en antwoordpaar voor After-service -->
                <h3>Nieuw vraag- en antwoordpaar</h3>
                <form method="POST" action="{{ route('faq.store') }}">
                    @csrf
                    <input type="hidden" name="category" value="After-service">
                    <div class="mb-3">
                        <label for="question">Vraag</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer">Antwoord</label>
                        <textarea name="answer" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
 
            <div class="col-md-6">
                <h2>Vragen over ons</h2>
 
                
                <ul>
                    @foreach ($categories as $category)
                        @if ($category->name === 'After-service')
                            @foreach ($category->questions as $question)
                                
                            @endforeach
                        @endif
                    @endforeach
                </ul>
 
                <!-- Toevoegen van een nieuw vraag- en antwoordpaar voor Vragen over ons -->
                <h3>Nieuw vraag- en antwoordpaar</h3>
                <form method="POST" action="{{ route('faq.store') }}">
                    @csrf
                    <input type="hidden" name="category" value="Vragen over ons">
                    <div class="mb-3">
                        <label for="question">Vraag</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer">Antwoord</label>
                        <textarea name="answer" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
 
    
@endsection