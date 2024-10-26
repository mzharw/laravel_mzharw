<div class="form-group mb-3">
    <label for="name">Hospital Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $hospital->name ?? '') }}"
        required>
</div>

<div class="form-group mb-3">
    <label for="address">Address</label>
    <textarea name="address" id="address" class="form-control" required>{{ old('address', $hospital->address ?? '') }}</textarea>
</div>

<div class="form-group mb-3">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control"
        value="{{ old('email', $hospital->email ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control"
        value="{{ old('phone', $hospital->phone ?? '') }}" required>
</div>

<div class="form-group float-end">
    <a href="{{ route('hospitals.index') }}" class="btn">Back</a>
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>
