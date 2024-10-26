@extends('layouts.authorized')

@section('title', 'Add New Hospital')

@section('content')
    <div class="container">
        <h3>Add New Hospital</h3>
        <form action="{{ route('hospitals.store') }}" method="POST" class="mt-4">
            @csrf
            @include('hospitals.partials.form', ['submitButtonText' => 'Create'])
        </form>
    </div>
@endsection
