<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Edit Employee</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" 
                                   name="username" 
                                   class="form-control" 
                                   value="{{ $employee->username }}" 
                                   required>
                            @error('username') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" 
                                   name="email" 
                                   class="form-control" 
                                   value="{{ $employee->email }}" 
                                   required>
                            @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Password <small class="text-muted">(khali choro agar change nahi karna)</small></label>
                            <input type="password" 
                                   name="password" 
                                   class="form-control" 
                                   placeholder="New password">
                        </div>

                        <button type="submit" class="btn btn-success w-100">Update</button>
                        <a href="/admin" class="btn btn-secondary w-100 mt-2">Back</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>