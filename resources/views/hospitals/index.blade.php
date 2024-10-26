@extends('layouts.authorized')

@section('title', 'Hospitals')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Hospitals</h3>
            <a href="{{ route('hospitals.create') }}" class="btn btn-primary">Add New Hospital</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitals as $hospital)
                    <tr>
                        <td>{{ $hospital->name }}</td>
                        <td>{{ $hospital->address }}</td>
                        <td>{{ $hospital->email }}</td>
                        <td>{{ $hospital->phone }}</td>
                        <td>
                            <a href="{{ route('hospitals.edit', $hospital->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="submit" class="btn btn-sm btn-danger delete-hospital"
                                data-id="{{ $hospital->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="module">
        $(document).on('click', '.delete-hospital', function(e) {
            e.preventDefault();
            var hospitalId = $(this).data('id');
            if (confirm('Are you sure you want to delete this hospital?')) {
                $.ajax({
                    url: '/hospitals/' + hospitalId,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Hospital deleted successfully!');
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        alert('Error deleting hospital');
                    }
                });
            }
        });
    </script>
@endsection
