@extends('layouts.app')

@section('content')

<div class="container mt-5">
        <div class="card">
            @if(Session::has('msg'))
               <p class="alert alert-success">{{ Session::get('msg') }}</p>
            @endif
            <div class="card-header">

                 <a href="{{ route('logout') }}" class="btn btn-danger my-4">Logout</a>



               {{ Auth::user()->name }}





            </div>
        </div>
    </div>

@endsection

