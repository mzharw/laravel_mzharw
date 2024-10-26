@foreach ($patients as $patient)
    <tr id="patient-{{ $patient->id }}">
        <td>{{ $patient->name }}</td>
        <td>{{ $patient->address }}</td>
        <td>{{ $patient->phone }}</td>
        <td>{{ $patient->hospital->name }}</td>
        <td>
            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <button type="submit" class="btn btn-sm btn-danger delete-patient"
                data-id="{{ $patient->id }}">Delete</button>
        </td>
    </tr>
@endforeach
