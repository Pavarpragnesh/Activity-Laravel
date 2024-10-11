<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 ">
    <h2 class="text-center card-header bg-primary text-white">Notification List</h2>
    
    @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('notifications.create') }}" class="btn btn-success">Create Notification</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>PDF</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notifications as $notification)
                    <tr>
                        <td>{{ $notification->title }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $notification->path) }}" class="btn btn-success btn-sm" target="_blank">
                                View PDF
                            </a>
                        </td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm" >
                                Update
                            </a>
                            <a href="" class="btn btn-danger btn-sm" >
                                Delete
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>

    .table {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
        border-radius: 0.5rem; 
    }

    .table th, .table td {
        vertical-align: middle; 
    }

    .table th {
        font-size: 1.1rem; 
    }

    .alert {
        margin-bottom: 20px; 
    }
</style>
