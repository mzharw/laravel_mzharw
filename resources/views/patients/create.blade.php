@extends('layouts.authorized')

@section('title', 'Add New Patient')

@section('content')
    <div class="container">
        <h3>Add New Patient</h3>
        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            @include('patients.partials.form', ['submitButtonText' => 'Create'])
        </form>
    </div>
@endsection
