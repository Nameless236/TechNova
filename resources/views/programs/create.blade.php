@extends('layouts.root')

@section('title', 'TechNova Labs - Programs')

@section('content')
    <div class="container">
        <h2>Create New Program</h2>
        @include('programs.form', ['program' => $program, 'action' => $action, 'method' => $method])
    </div>
@endsection
