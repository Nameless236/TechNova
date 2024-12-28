@extends('layouts.app')

@section('title', 'Edit Program')

@section('content')
    <div class="container">
        <h2>Edit Program</h2>
        @include('programs.form', ['program' => $program, 'action' => $action, 'method' => $method])
    </div>
@endsection
