<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <x-navbar />
    <div class="container mt-4">
        <h2>Edit Category</h2>
        
        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="mt-3">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="descripyion" class="form-control @error('descripyion') is-invalid @enderror" rows="3" required>{{ old('descripyion', $category->descripyion) }}</textarea>
                @error('descripyion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Update Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>