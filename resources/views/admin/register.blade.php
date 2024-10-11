<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="text-center mb-4">Admin Registration</h2>

    <div class="card shadow-sm ">
        <div class="card-body">
            <form action="{{ route('admin.register') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="profile" class="form-label">Profile Picture:</label>
                    <input type="file" name="profile" id="profile" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <div class="text-center mt-3">
                <p>Already have an account? <a href="{{ route('admin.login') }}" class="text-decoration-none">Login here</a></p>
            </div>
        </div>
    </div>
</div>

<style>
    h2 {
        font-weight: bold;
        color: #007bff; /* Bootstrap primary color */
    }
</style>
