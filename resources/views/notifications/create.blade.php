
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Upload Notification PDF</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('notifications.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter notification title" required>
                </div>

                <div class="mb-3">
                    <label for="pdf" class="form-label">Upload PDF</label>
                    <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf" required>
                    <small class="form-text text-muted">Only PDF files are allowed.</small>
                </div>

                <button type="submit" class="btn btn-success">Upload</button>
                <a href="{{ route('notifications.index') }}" class="btn btn-secondary">View Notifications</a>
            </form>
        </div>
    </div>
</div>
