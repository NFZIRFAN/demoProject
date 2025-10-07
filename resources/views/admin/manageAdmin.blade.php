<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admins</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
            color: #2c3e50;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        h2 {
            margin-top: 0;
            font-size: 24px;
            font-weight: 600;
            color: #16a085;
            text-align: center;
            margin-bottom: 20px;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .toolbar .buttons {
            display: flex;
            gap: 10px;
        }

        .toolbar a {
            background: #16a085;
            color: #fff;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.3s ease;
        }
        .toolbar a:hover {
            background: #138d75;
        }

        .search-box {
            flex: 1;
            max-width: 300px;
            position: relative;
        }
        .search-box input {
            width: 100%;
            padding: 10px 12px 10px 36px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }
        .search-box input:focus {
            border-color: #16a085;
            outline: none;
        }
        .search-box::before {
            content: "🔍";
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: #888;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }
        th {
            background: #16a085;
            color: #fff;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .btn-delete {
            background: #e74c3c;
            color: #fff;
            padding: 6px 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 13px;
            transition: background 0.3s ease;
        }
        .btn-delete:hover {
            background: #c0392b;
        }

        .btn-edit {
            background: #3498db;
            color: #fff;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            transition: background 0.3s ease;
        }
        .btn-edit:hover {
            background: #2c80b4;
        }

        .alert {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Manage Admins</h2>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert" style="background:#f8d7da; color:#721c24;">{{ session('error') }}</div>
    @endif

    <div class="toolbar">
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Search by name or email...">
        </div>
        <div class="buttons">
            <a href="{{ route('admin.admins.create') }}">➕ Add Admin</a>
            <a href="{{ route('admin.dashboard') }}">⬅ Back</a>
        </div>
    </div>

    <table id="adminsTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>IC Number</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->ic_number }}</td>
                <td>{{ $admin->address }}</td>
                <td>
                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn-edit">✏️ Edit</a>
                    <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">🗑 Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script>
    // Live search filter
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#adminsTable tbody tr');
        rows.forEach(row => {
            const name = row.cells[1].innerText.toLowerCase();
            const email = row.cells[2].innerText.toLowerCase();
            row.style.display = (name.includes(filter) || email.includes(filter)) ? '' : 'none';
        });
    });
</script>
</body>
</html>
