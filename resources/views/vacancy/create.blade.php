<x-layout-Openhiring>


@section('content')
    <div class="container">
        <h1>Create a New Vacancy</h1>
        <form action="{{ route('vacancies.store') }}" method="POST">
            @csrf
            <!-- Job Title -->
            <div class="form-group">
                <label for="title">Job Title</label>
                <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    placeholder="Enter job title"
                    value="{{ old('title') }}"
                    required
                >
                @error('title')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Job Description -->
            <div class="form-group">
                <label for="description">Job Description</label>
                <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Enter job description"
                    required>{{ old('description') }}</textarea>
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Job Type -->
            <div class="form-group">
                <label for="job_type">Job Type</label>
                <select class="form-control" id="job_type" name="job_type" required>
                    <option value="" disabled selected>Select job type</option>
                    <option value="full_time" {{ old('job_type') == 'full_time' ? 'selected' : '' }}>Full Time</option>
                    <option value="part_time" {{ old('job_type') == 'part_time' ? 'selected' : '' }}>Part Time</option>
                    <option value="contract" {{ old('job_type') == 'contract' ? 'selected' : '' }}>Contract</option>
                </select>
                @error('job_type')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Salary -->
            <div class="form-group">
                <label for="salary">Salary</label>
                <input
                    type="number"
                    class="form-control"
                    id="salary"
                    name="salary"
                    placeholder="Enter salary amount"
                    value="{{ old('salary') }}"
                    required
                >
                @error('salary')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Location -->
            <div class="form-group">
                <label for="location">Location</label>
                <input
                    type="text"
                    class="form-control"
                    id="location"
                    name="location"
                    placeholder="Enter job location"
                    value="{{ old('location') }}"
                    required
                >
                @error('location')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Vacancy</button>
            </div>
        </form>
    </div>
@endsection
</x-layout-Openhiring>
