<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #f1f8e9);
            margin: 0;
            padding: 20px;
            color: #2c3e50;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            background: #fff;
            padding: 40px 50px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }

        h2 {
            text-align: center;
            font-size: 26px;
            font-weight: 600;
            color: #16a085;
            margin-bottom: 35px;
        }

        .form-group {
            position: relative;
            margin-bottom: 28px;
        }

        .form-group input {
            width: 100%;
            padding: 16px 14px;
            border: 1.5px solid #ccc;
            border-radius: 10px;
            font-size: 15px;
            background: transparent;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #16a085;
            box-shadow: 0 0 6px rgba(22,160,133,0.2);
            outline: none;
        }

        .form-group label {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            background: #fff;
            padding: 0 6px;
            font-size: 14px;
            color: #7f8c8d;
            pointer-events: none;
            transition: 0.3s ease all;
        }

        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -8px;
            left: 12px;
            font-size: 12px;
            color: #16a085;
        }

        button {
            width: 100%;
            padding: 15px;
            background: #16a085;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: #138d75;
            transform: translateY(-2px);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            font-size: 15px;
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #21618c;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Update Admin</h2>

    <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <input type="text" id="name" name="name" value="{{ old('name', $admin->name) }}" placeholder=" " required>
            <label for="name">Full Name</label>
        </div>

        <div class="form-group">
            <input type="email" id="email" name="email" value="{{ old('email', $admin->email) }}" placeholder=" " required>
            <label for="email">Email</label>
        </div>

        <div class="form-group">
            <input type="password" id="password" name="password" placeholder=" ">
            <label for="password">Password (leave blank if not changing)</label>
        </div>

        <div class="form-group">
            <input type="text" id="ic_number" name="ic_number" value="{{ old('ic_number', $admin->ic_number) }}" placeholder=" " required>
            <label for="ic_number">IC Number</label>
        </div>

        <div class="form-group">
            <input type="text" id="address" name="address" value="{{ old('address', $admin->address) }}" placeholder=" " required>
            <label for="address">Address</label>
        </div>

        <button type="submit">Update Admin</button>
    </form>

    <a href="{{ route('admin.admins.index') }}" class="back-link">⬅ Back to Manage Admins</a>
</div>
</body>
</html>
