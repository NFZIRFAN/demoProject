<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Poppins', sans-serif; }
        .container { margin-top: 40px; }
        .card { border-radius: 15px; }
        .table th { background: #1abc9c; color: white; }
        img { border-radius: 8px; }
        .search-box {
            max-width: 400px;
            border-radius: 50px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .search-box input {
            border: none;
            border-radius: 50px;
            padding-left: 20px;
        }
        .search-box input:focus {
            box-shadow: none;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">🌱 Plant Inventory</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                ⬅ Back to Dashboard
            </a>
            <a href="{{ route('admin.plants.create') }}" class="btn btn-success">
                ➕ Add New Plant
            </a>
        </div>
    </div>

    <!-- Live Search Bar -->
    <div class="mb-4">
        <div class="input-group search-box">
            <input type="text" id="plantSearch" class="form-control" placeholder="🔍 Search plants by name...">
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <!-- Table Section -->
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover align-middle" id="plantTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price (RM)</th>
                    <th>Stock</th>
                    <th>Reorder Level</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($plants as $index => $plant)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($plant->image)
                                <img src="{{ asset('storage/' . $plant->image) }}"
                                     alt="{{ $plant->name }}"
                                     width="60" height="60">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td class="plant-name"><strong>{{ $plant->name }}</strong></td>
                        <td>{{ $plant->category }}</td>
                        <td class="text-success fw-bold">RM {{ number_format($plant->price, 2) }}</td>
                        <td>
                            <span class="badge bg-{{ $plant->stock_quantity <= $plant->reorder_level ? 'danger' : 'primary' }}">
                                {{ $plant->stock_quantity }}
                            </span>
                        </td>
                        <td>{{ $plant->reorder_level }}</td>
                        <td>
                            <a href="{{ route('admin.plants.edit', $plant->id) }}" class="btn btn-sm btn-primary">
                                ✏ Edit
                            </a>
                            <form action="{{ route('admin.plants.destroy', $plant->id) }}"
                                  method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this plant?')">
                                    🗑 Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No plants available.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Live Search Script -->
<script>
    document.getElementById("plantSearch").addEventListener("keyup", function () {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#plantTable tbody tr");

        rows.forEach(function (row) {
            let plantName = row.querySelector(".plant-name").textContent.toLowerCase();
            row.style.display = plantName.includes(value) ? "" : "none";
        });
    });
</script>
</body>
</html>
