<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Profile</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>
                        @if($admin->profile)
                        <img src="{{ asset('storage/' . $admin->profile) }}" alt="Profile Image" class="img-fluid rounded" width="50">
                        @else
                        <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $admin->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
