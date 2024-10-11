<!-- resources/views/activity/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }

        strong {
            color: #333;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background: #5cb85c;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        a:hover {
            background: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Activity Details</h1>
        <p><strong>ID:</strong> {{ $activity->id }}</p>
        <p><strong>Name:</strong> {{ $activity->name }}</p>
        <p><strong>Age:</strong> {{ $activity->age }}</p>
        <p><strong>Mobile:</strong> {{ $activity->mobile }}</p>
        <p><strong>Email:</strong> {{ $activity->email }}</p>
        <p><strong>Activity:</strong> {{ $activity->activity }}</p>
        <p><strong>Address:</strong> {{ $activity->address }}</p>
        <a href="{{ route('activities.index') }}">Back to Activities</a>
    </div>
</body>
</html>
