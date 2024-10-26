@extends('layouts.authorized')

@section('title', 'Patients')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Patients</h3>
            <a href="{{ route('patients.create') }}" class="btn btn-primary">Add New Patient</a>
        </div>

        <div class="form-group mb-3">
            <label for="hospital_filter">Filter by Hospital</label>
            <select id="hospital_filter" class="form-control mt-2">
                <option value="">All Hospitals</option>
                @foreach ($hospitals as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                @endforeach
            </select>
        </div>

        <table class="table table-striped" id="patients_table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Hospital</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="patients-table-body">
                @include('patients.partials.list', ['patients' => $patients])
            </tbody>
        </table>
    </div>

    <script type="module">
        $(document).on('click', '.delete-patient', function(e) {
            e.preventDefault();
            var patientId = $(this).data('id');
            if (confirm('Are you sure you want to delete this patient?')) {
                $.ajax({
                    url: '/patients/' + patientId,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Patient deleted successfully!');
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        alert('Error deleting patient');
                    }
                });
            }
        });

        $('#hospital_filter').on('change', function() {
            var hospitalId = $(this).val();
            $.ajax({
                url: '/patients',
                type: 'GET',
                data: {
                    hospital_id: hospitalId
                },
                success: function(data) {
                    $('#patients-table-body').html(
                        data);
                },
                error: function(xhr) {
                    alert('Error fetching patients');
                }
            });
        });
    </script>
@endsection
