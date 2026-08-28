<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Details</title>

</head>

<body class="bg-light">

<div class="container my-5">

    <h1 class="text-success mb-4">Student {{ $student['id'] }}</h1>

    <div class="row">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-dark text-white p-3 d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Student Profile</span>
                    <span class="badge bg-danger fs-6">#{{ $student['id'] }}</span>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 fs-3 fw-bold" style="width: 55px; height: 55px;">
                            {{ strtoupper(substr($student['name'], 0, 1)) }}
                        </div>
                        <div>
                            <h4 class="card-title mb-0 text-capitalize">{{ $student['name'] }}</h4>
                            <small class="text-muted">ID: {{ $student['id'] }}</small>
                        </div>
                    </div>

                    <div class="p-3 bg-light rounded-3 mb-4 border">
                        <p class="mb-1 text-muted small">Email Address</p>
                        <p class="fw-bold mb-0 text-dark">{{ $student['email'] }}</p>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="/students" class="btn btn-outline-secondary flex-fill">Back to All</a>
                        <button class="btn btn-danger flex-fill">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>