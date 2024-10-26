@extends('layouts.authorized')

@section('title', 'Edit Hospital')

@section('content')
<div class="container">
    <h3>Edit Hospital</h3>
    <form action="{{ route('hospitals.update', $hospital->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        @include('hospitals.partials.form', ['submitButtonText' => 'Update'])
    </form>
</div>
@endsection
