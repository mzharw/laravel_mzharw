<div class="form-group mb-3">
    <label for="name">Patient Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $patient->name ?? '') }}"
        required>
</div>

<div class="form-group mb-3">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control"
        value="{{ old('phone', $patient->phone ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label for="address">Address</label>
    <textarea name="address" id="address" class="form-control" required>{{ old('address', $patient->address ?? '') }}</textarea>
</div>

<div class="form-group mb-3">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control"
        value="{{ old('phone', $patient->phone ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label for="hospital_id">Hospital</label>
    <select id="hospital" class="form-control mt-2" name="hospital_id" required>
        @foreach ($hospitals as $hospital)
            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group float-end">
    <a href="{{ route('hospitals.index') }}" class="btn">Back</a>
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>