@extends('home.include.parent');
@section('content')

    <div class="container card p-4">
        <div class="row">
            <h1>Wellcome {{ Auth::user()->name }} <i class="bi bi-emoji-wink"></i></h1>
            <hr>
            <div class="p-2">
                <h3 class="text-center p-2 text-uppercase "><strong>{{Auth::user()->name}} INFO <i class="bi bi-person-circle"></i></strong></h3>
            <ul class="list-group">
                <li class="list-group-item" aria-current="true">Username : <strong>{{Auth::user()->name}}</strong></li>
                <li class="list-group-item">Email : <strong>{{Auth::user()->email}}</strong> </li>
                <li class="list-group-item">Title : <strong>{{Auth::user()->role}}</strong></li>
              </ul>
            </div>
        </div>
    
    </div>
@endsection