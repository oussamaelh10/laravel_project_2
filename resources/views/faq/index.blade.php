@extends('layouts.app')

@section('content')
    <h1>FAQ</h1>

    @foreach($categories as $category)
        <h2>{{ $category->name }}</h2>

        <ul>
            @foreach($items as $item)
                @if($item->category_id === $category->id)
                    <li>
                        <h3>{{ $item->question }}</h3>
                        <p>{{ $item->answer }}</p>
                    </li>
                @endif
            @endforeach
        </ul>
    @endforeach
@endsection
