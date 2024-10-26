@extends('layouts.authorized')

@section('title', 'Edit Patient')

@section('content')
<div class="container">
    <h3>Edit Patient</h3>
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('patients.partials.form', ['submitButtonText' => 'Update'])
    </form>
</div>
@endsection
