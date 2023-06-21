@extends('layouts.app')

@section('content')

<h1>Usersbeheer</h1>
<hr>
<table>
    <thead>
        <tr>
            
            <th>Naam</th>
            <th>Email</th>
            <th>Adminbeheer</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    
                    <a class="nav-link text-primary" href="{{ route('admin.users.show', $user->id) }}">Usersprofile</a>

                  @if ($user->is_admin)
                    <form id="demote-form-{{ $user->id }}" action="{{ route('admin.users.demote', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="_method" value="POST">
                        <button type="submit" class="btn btn-primary">Beeindig admin</button>
                        <hr>
                    </form>
                    @else
                    <form id="promote-form-{{ $user->id }}" action="{{ route('admin.users.promote', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Bevorder tot admin</button>
                        <hr>
                    </form>
                 @endif
                
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection