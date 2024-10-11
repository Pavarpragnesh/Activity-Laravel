<!-- resources/views/users/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .table {
            margin-top: 2rem;
        }

        .table th {
            background-color: #343a40;
            color: white;
            text-align: center;
            font-weight: 600;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .no-users {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">All Registered Users</h2>

        @if ($users->isEmpty())
            <p class="text-center no-users">No users found!</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        
                        <th>Registered At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user->email }}</td>
                            
                            <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                            <td><button type="button" class="btn btn-primary">View</button>
                                <button type="button" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
