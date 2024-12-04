<form class="programForm" action="{{ $action }}" method="post" enctype="multipart/form-data" id="programForm">
    @csrf
    @method($method)

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $program->title) }}" maxlength="35">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $program->description) }}</textarea>
    </div>

    @if(!empty($program->id))
        <div class="mb-3">
            <label for="current-image" class="form-label">Current Image</label>
            <img src="{{ asset('storage/' . $program->imagePath) }}" class="img-fluid current-edited-image" id="current-image" alt="{{ $program->title }}">
        </div>
        <div class="mb-3">
            <input type="checkbox" id="change-image" name="change_image">
            <label for="image" class="form-label">Change Image</label>
            <input type="file" class="form-control" id="image" name="image" disabled>
            <small id="file-path-display" class="form-text text-muted"></small>
        </div>
    @else
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
    @endif

    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('programs.index') }}'">Cancel</button>
</form>



