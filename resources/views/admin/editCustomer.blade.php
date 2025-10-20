<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Customer</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; margin:0; padding:0; background:#f4f6f9; }
    .container { max-width:900px; margin:40px auto; padding:20px; background:#fff; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1); display:flex; gap:30px; flex-wrap:wrap; }
    .profile-section { flex:1; text-align:center; border-right:1px solid #ddd; padding-right:20px; }
    .profile-section img { width:180px; height:180px; object-fit:cover; border-radius:50%; border:3px solid #1abc9c; margin-bottom:15px; }
    .form-section { flex:2; }
    h1 { margin-bottom:20px; font-size:24px; font-weight:600; color:#2c3e50; }
    .form-group { margin-bottom:15px; }
    label { display:block; margin-bottom:5px; font-weight:600; color:#2c3e50; }
    input { width:100%; padding:10px; border-radius:6px; border:1px solid #ddd; font-size:14px; }
    .btn-save { background:#1abc9c; color:#fff; padding:10px 16px; border:none; border-radius:6px; font-size:14px; cursor:pointer; transition:0.3s; display:block; margin:20px auto 0; width:80%; }
    .btn-save:hover { background:#16a085; }
    .back-btn { display:block; margin-top:10px; font-size:14px; color:#3498db; text-decoration:none; }
    .back-btn:hover { text-decoration:underline; }
  </style>
</head>
<body>
  <div class="container">

    <!-- Form Section -->
    <div class="form-section">
      <h1>Edit Customer</h1>
      <form action="{{ route('admin.customers.update', $asd->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>First Name</label>
<input type="text" name="firstname" value="{{ old('firstname', $asd->firstname ?? '') }}" required>
        </div>

        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="lastname" value="{{ old('lastname', $asd->lastname ?? '') }}" required>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email', $asd->email ?? '') }}" required>
        </div>

        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="phonenumber" value="{{ old('phonenumber', $asd->phonenumber ?? '') }}" required>
        </div>

        <div class="form-group">
          <label>IC Number</label>
          <input type="text" name="icnumber" value="{{ old('icnumber', $asd->icnumber ?? '') }}" required>
        </div>

        <div class="form-group">
          <label>Address</label>
          <input type="text" name="address" value="{{ old('address', $asd->address ?? '') }}">
        </div>

        <div class="form-group">
          <label>Postcode</label>
          <input type="text" name="postcode" value="{{ old('postcode', $asd->postcode ?? '') }}">
        </div>

        <div class="form-group">
          <label>Relationship</label>
          <input type="text" name="relationship" value="{{ old('relationship', $asd->relationship ?? '') }}">
        </div>

        <div class="form-group">
          <label>Age</label>
          <input type="number" name="age" value="{{ old('age', $asd->age ?? '') }}">
        </div>

        <div class="form-group">
          <label>Occupation</label>
          <input type="text" name="occupation" value="{{ old('occupation', $asd->occupation) }}">
        </div>

        <button type="submit" class="btn-save">Save Changes</button>
      </form>

      <a href="{{ route('admin.customers.index') }}" class="back-btn">← Back to Customers</a>
    </div>

  </div>
</body>
</html>
