<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="col-md-6">
            <h2 class="text-center mt-5">Register</h2>
            <form id="registerForm" action="{{ route('postRegister') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="ho_ten" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="so_dien_thoai" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai">
                </div>
                <div class="mb-3">
                    <label for="gioi_tinh" class="form-label">Gender</label>
                    <select class="form-control" id="gioi_tinh" name="gioi_tinh">
                        <option value="">Select Gender</option>
                        <option value="0">Female</option>
                        <option value="1">Male</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dia_chi" class="form-label">Address</label>
                    <textarea class="form-control" id="dia_chi" name="dia_chi"></textarea>
                </div>
                <div class="mb-3">
                    <label for="ngay_sinh" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}">Already have an account? Login</a>
                </div>
            </form>
            
            
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
