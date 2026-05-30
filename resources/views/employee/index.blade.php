<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    @if(session('success'))
    <script>
        window.onload = function() {
            alert("✅ {{ session('success') }}");
        }
    </script>
    @endif

    <h2 class="text-center mb-4">Employees Record</h2>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->username }}</td>
                <td>{{ $employee->email }}</td>
                <td>
                    {{-- Edit Button --}}
                    <a href="{{ route('employee.edit', $employee->id) }}" 
                       class="btn btn-sm btn-warning">Edit</a>

                    {{-- Delete Button --}}
                    <form action="{{ route('employee.destroy', $employee->id) }}" 
                          method="POST" 
                          style="display:inline-block"
                          onsubmit="return confirm('Sure delete karna hai?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>