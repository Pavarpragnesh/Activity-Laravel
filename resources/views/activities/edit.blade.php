<!-- resources/views/activity/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Activity</title>
</head>
<body>
    <h1>Edit Activity</h1>
    <form action="{{ route('activities.update', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $activity->name }}" required>
        <label for="age">Age:</label>
        <input type="number" name="age" value="{{ $activity->age }}" required>
        <label for="mobile">Mobile:</label>
        <input type="tel" name="mobile" value="{{ $activity->mobile }}" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $activity->email }}" required>
        <label for="activity">Activity:</label>
        <input type="text" name="activity" value="{{ $activity->activity }}" required>
        <label for="address">Address:</label>
        <textarea name="address" required>{{ $activity->address }}</textarea>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('activities.index') }}">Back to Activities</a>
</body>
</html>
