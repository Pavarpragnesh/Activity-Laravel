<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        table {
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Activities</h1>
        <a href="{{ route('activities.create') }}" class="btn btn-primary mb-3">Add New Activity</a>
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Activity</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $activity->id }}</td>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->age }}</td>
                        <td>{{ $activity->mobile }}</td> <!-- Fixed the typo here from 'mobille' to 'mobile' -->
                        <td>{{ $activity->email }}</td>
                        <td>{{ $activity->activity }}</td>
                        <td>{{ $activity->address }}</td>
                        <td>
                            <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return redirect()->route('activities.index')->with('success', 'Activity added successfully.');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
