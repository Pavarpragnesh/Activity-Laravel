<!-- resources/views/activity/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Activity</title>
</head>
<body>
    <h1>Create Activity</h1>
    <form action="{{ route('activities.add') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="age">Age:</label>
        <input type="number" name="age" required>
        <label for="mobile">Mobile:</label>
        <input type="tel" name="mobile" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="activity">Activity:</label>
        <input type="text" name="activity" required>
        <label for="address">Address:</label>
        <textarea name="address" required></textarea>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('activities.index') }}">Back to Activities</a>
</body>
</html>
