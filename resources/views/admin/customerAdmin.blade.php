<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customers - Admin Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f6f9;
    }
    .container {
      max-width: 1300px;
      margin: 40px auto;
      padding: 25px;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    }
    h1 {
      margin-bottom: 20px;
      font-size: 26px;
      font-weight: 600;
      color: #2c3e50;
      border-left: 5px solid #1abc9c;
      padding-left: 10px;
    }
    .back-btn {
      display: inline-block;
      margin-bottom: 20px;
      padding: 8px 18px;
      background: #1abc9c;
      color: #fff;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      transition: background 0.3s ease;
    }
    .back-btn:hover {
      background: #16a085;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      border-radius: 10px;
      overflow: hidden;
    }
    table th, table td {
      padding: 12px 14px;
      text-align: left;
      font-size: 14px;
    }
    table th {
      background: #1abc9c;
      color: #fff;
      font-weight: 600;
    }
    table tr {
      transition: background 0.2s ease;
    }
    table tr:nth-child(even) {
      background: #f9f9f9;
    }
    table tr:hover {
      background: #f1fdf9;
    }
    .btn-edit, .btn-delete {
      display: inline-block;
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s;
    }
    .btn-edit {
      background: #3498db;
      color: #fff;
      margin-right: 5px;
    }
    .btn-edit:hover {
      background: #2980b9;
    }
    .btn-delete {
      background: #e74c3c;
      color: #fff;
      border: none;
      cursor: pointer;
    }
    .btn-delete:hover {
      background: #c0392b;
    }
    .alert-success {
      padding: 10px 15px;
      background: #eafaf1;
      color: #2e7d32;
      border-left: 5px solid #1abc9c;
      margin-bottom: 20px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="{{ route('admin.dashboard') }}" class="back-btn">← Back to Dashboard</a>
    <h1>Registered Customers</h1>

    @if(session('success'))
      <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>IC Number</th>
          <th>Address</th>
          <th>Postcode</th>
          <th>Relationship</th>
          <th>Age</th>
          <th>Occupation</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($customers as $index => $customer)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $customer->firstname }}</td>
            <td>{{ $customer->lastname }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phonenumber }}</td>
            <td>{{ $customer->icnumber }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->postcode }}</td>
            <td>{{ $customer->relationship }}</td>
            <td>{{ $customer->age }}</td>
            <td>{{ $customer->occupation }}</td>
            <td>
                <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn-edit">Edit</a>
              <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" onclick="return confirm('Delete this customer?')">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="12" style="text-align:center; font-weight:500; color:#888;">No customers found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</body>
</html>
