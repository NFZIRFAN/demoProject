<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<style>
 body {
      font-family: 'Poppins', sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
      overflow-x: hidden; /* ✅ stop left-right scrolling */

    }

  /* ======= NAVBAR ======= */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: linear-gradient(90deg, rgb(67, 50, 42), rgb(37, 65, 38));
      padding: 12px 40px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      position: sticky;
      top: 0;
      width: 100%;
      box-sizing: border-box;
      z-index: 1000;
    }

    .nav-left {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo-text {
      font-size: 20px;
      font-weight: 700;
      color: #fff;
      text-decoration: none;
      letter-spacing: 0.5px;
      transition: color 0.3s ease;
    }

    .logo-text:hover {
      color: #c8e6c9;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 25px;
      margin: 0;
      padding: 0;
    }

    .nav-links li a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      font-size: 15px;
      position: relative;
      transition: all 0.3s ease;
      padding: 5px 0;
    }

    .nav-links li a:hover {
      color: #c8e6c9;
    }

    /* Highlight for active page */
    .nav-links li a.active {
      color: #c8e6c9;
      font-weight: 600;
    }
    .nav-links li a.active::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 100%;
      height: 2px;
      background: #c8e6c9;
      border-radius: 2px;
      animation: slideIn 0.4s ease;
    }

    @keyframes slideIn {
      from { width: 0; }
      to { width: 100%; }
    }

/* === HEADER BANNER === */
header {
  background: linear-gradient(135deg, rgb(34, 92, 34), rgb(60, 155, 60));
  padding: 20px 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: white;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}
header h1 {
  margin: 0;
  font-size: 22px;
  font-weight: 700;
  letter-spacing: 1px;
}
header .logo {
  display: flex;
  align-items: center;
  gap: 10px;
}
header .logo img {
  height: 40px;
  width: 40px;
  border-radius: 50%;
  background: white;
  object-fit: cover;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}
header nav a {
  margin-left: 20px;
  color: white;
  font-weight: 500;
  text-decoration: none;
  transition: 0.3s;
}
header nav a:hover {
  text-decoration: underline;
}

/* === MAIN WRAPPER === */
.edit-wrapper {
  max-width: 1100px;
  margin: 40px auto;
  background: #fff;
  border-radius: 16px;
  padding: 40px;
  display: flex;
  gap: 40px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

/* === HEADINGS === */
h2 {
  color:rgb(25, 74, 1);
  font-size: 26px;
  font-weight: 700;
  margin-bottom: 20px;
  grid-column: span 2;
}

/* === FORM SECTION === */
.form-section { flex: 1.2; }
.form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 18px;
}
.form-group { display: flex; flex-direction: column; }
.form-group label {
  font-weight: 600;
  margin-bottom: 6px;
  color:rgb(25, 74, 1);
  font-size: 13px;
}
.form-group input {
  padding: 12px;
  border-radius: 8px;
  border: 1px solid #d1d9e6;
  background: #fafbfc;
  transition: 0.2s;
}
.form-group input:focus {
  border-color:rgb(25, 74, 1);
  box-shadow: 0 0 0 2px rgba(128, 0, 0, 0.2);
  outline: none;
  background: #fff;
}

/* === BUTTONS === */
.btn-container {
  grid-column: span 2;
  display: flex;
  justify-content: center;
  gap: 12px;
  margin-top: 20px;
}
.btn {
  padding: 10px 20px;
  border: none;
  border-radius: 20px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s;
}
.btn-save {
  background: linear-gradient(135deg,rgb(35, 90, 26),rgb(55, 188, 51));
  color: #fff;
}
.btn-save:hover {
  background: linear-gradient(135deg,rgb(144, 206, 150),rgb(41, 121, 36));
  transform: translateY(-2px);
}
.btn-back {
  background: linear-gradient(135deg, #424242, #616161);
  color: #fff;
  text-decoration: none;
  display: inline-block;
  text-align: center;
}
.btn-back:hover {
  background: linear-gradient(135deg, #212121, #424242);
  transform: translateY(-2px);
}

/* === PREVIEW SECTION === */
.preview-section {
  flex: 0.8;
  display: flex;
  flex-direction: column;
  gap: 35px;
  align-items: center;
  background: rgb(233, 227, 227);
  padding: 25px;
  border-radius: 16px;
}
.preview-box {
  text-align: center;
  background: #fff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  width: 100%;
  max-width: 350px;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.preview-box label {
  font-weight: 600;
  margin-bottom: 8px;
  font-size: 14px;
  color:rgb(44, 74, 10);
}

/* Upload & Crop buttons */
.upload-btn {
  padding: 8px 16px;
  border-radius: 18px;
  background: linear-gradient(135deg,rgb(35, 90, 26),rgb(55, 188, 51));
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
}
.upload-btn:hover {
  background: linear-gradient(135deg,rgb(102, 188, 49),rgb(62, 178, 72));
}
.btn-crop {
  padding: 5px 20px;
  border-radius: 18px;
  font-size: 13px;
  border: none;
  cursor: pointer;
  background: linear-gradient(135deg, #ff9800, #f57c00);
  color: #fff;
  font-weight: 600;
  margin-top: 6px;
}
.btn-crop:hover {
  background: linear-gradient(135deg, #ef6c00, #e65100);
  transform: translateY(-2px);
}

/* === IMAGE PREVIEW === */
.profile-preview {
  width: 160px;
  height: 160px;
  border-radius: 50%;
  border: 4px solid #fff;
  object-fit: cover;
  background: #fff;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  display: block;
  margin-bottom: 10px;
}
.header-preview {
  width: 320px;
  height: 160px;
  border-radius: 12px;
  border: 4px solid #fff;
  object-fit: cover;
  background: #fff;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  display: block;
  margin-bottom: 10px;
}

 #cropModal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(0,0,0,0.6);
    align-items: center;
    justify-content: center;
    padding: 24px;
  }
  #cropModal.show { display: flex; }

  .crop-modal-inner {
    background: #fff;
    border-radius: 12px;
    width: min(1100px, 95vw);
    max-width: 1100px;
    max-height: calc(100vh - 48px);
    overflow: auto;
    box-shadow: 0 18px 48px rgba(0,0,0,0.35);
    padding: 18px;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .crop-modal-header {
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:12px;
  }
  .crop-modal-header h3 { margin:0; color:#1b5e20; font-size:18px; }
  .crop-close-btn {
    background:transparent;
    border:0;
    font-size:22px;
    cursor:pointer;
    color:#666;
  }

  .crop-stage {
    display:flex;
    align-items:center;
    justify-content:center;
    width:100%;
    min-height: 260px;
    /* allow space for tall header crops while keeping modal within viewport */
  }

  #cropImage {
    max-width: 100%;
    max-height: calc(100vh - 220px); /* keeps the image inside viewport */
    width: auto;
    height: auto;
    display: block;
    border-radius: 8px;
    background: #f7fafb;
  }

  .crop-actions {
    display:flex;
    gap:10px;
    justify-content:center;
    margin-top:6px;
  }

  .crop-actions button {
    padding: 10px 16px;
    border-radius: 8px;
    border: 0;
    cursor: pointer;
    font-weight: 600;
  }
  .btn-crop-confirm { background:#2e7d32; color:#fff; }
  .btn-crop-cancel  { background:#999; color:#fff; }

/* === FOOTER === */
footer { 
  background: #fff; 
  color: #333; 
  margin-top: auto; 
  box-shadow: 0 -2px 6px rgba(0,0,0,0.05); 
}
footer .bottom-bar { 
  background: linear-gradient(90deg,rgb(67, 50, 42),rgb(37, 65, 38)); /* Green gradient */
  color: white; 
  text-align: center; 
  padding: 8px; 
  font-size: 14px; 
  width: 100%; 
}
.crop-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 12px;
  }

  .crop-actions button {
    padding: 10px 22px;
    border-radius: 30px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    color: #fff;
    transition: all 0.25s ease;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
  }

  .btn-crop-confirm {
    background: linear-gradient(135deg, #2e7d32, #43a047);
  }
  .btn-crop-confirm:hover {
    background: linear-gradient(135deg, #43a047, #66bb6a);
    transform: translateY(-2px);
  }

  .btn-crop-reset {
    background: linear-gradient(135deg, #fbc02d, #f57f17);
  }
  .btn-crop-reset:hover {
    background: linear-gradient(135deg, #fdd835, #ffa000);
    transform: translateY(-2px);
  }

  .btn-crop-cancel {
    background: linear-gradient(135deg, #9e9e9e, #616161);
  }
  .btn-crop-cancel:hover {
    background: linear-gradient(135deg, #757575, #424242);
    transform: translateY(-2px);
  }


</style>
</head>
<body>

<!-- ===== Navbar ===== -->
<nav class="navbar">
  <div class="nav-left">
    <a href="{{ route('customer.dashboard') }}" class="logo-text">🌿 YAH NURSERY</a>
  </div>
  <ul class="nav-links">
    <li><a href="{{ route('customer.dashboard') }}" class="{{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">Dashboard</a></li>
    <li><a href="{{ route('customer.profile') }}" class="{{ request()->routeIs('customer.profile') ? 'active' : '' }}">My Profile</a></li>
    <li><a href="{{ route('customer.profile.edit') }}" class="{{ request()->routeIs('customer.profile.edit') ? 'active' : '' }}">Edit Profile</a></li>
<li>
      <a href="{{ route('cart.view') }}" 
         class="{{ request()->routeIs('cart.view') ? 'active' : '' }}">
         Cart
      </a>
    </li>    <li><a href="{{ route('customer.logout') }}">Logout</a></li>
  </ul>
</nav>

<!-- MAIN CONTENT -->
<div class="edit-wrapper">
  <!-- FORM -->
  <div class="form-section">
    <h2>EDIT PROFILE</h2>
    <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-grid">
        <div class="form-group"><label>First Name</label><input type="text" name="firstname" value="{{ $customer->firstname }}" required></div>
        <div class="form-group"><label>Last Name</label><input type="text" name="lastname" value="{{ $customer->lastname }}" required></div>
        <div class="form-group"><label>Email</label><input type="email" name="email" value="{{ $customer->email }}" required></div>
        <div class="form-group"><label>Phone</label><input type="text" name="phonenumber" value="{{ $customer->phonenumber }}"></div>
        <div class="form-group"><label>IC Number</label><input type="text" name="icnumber" value="{{ $customer->icnumber }}"></div>
        <div class="form-group"><label>Address</label><input type="text" name="address" value="{{ $customer->address }}"></div>
        <div class="form-group"><label>Postcode</label><input type="text" name="postcode" value="{{ $customer->postcode }}"></div>
        <div class="form-group"><label>Relationship</label><input type="text" name="relationship" value="{{ $customer->relationship }}"></div>
        <div class="form-group"><label>Age</label><input type="number" name="age" value="{{ $customer->age }}"></div>
        <div class="form-group"><label>Occupation</label><input type="text" name="occupation" value="{{ $customer->occupation }}"></div>

        <!-- Hidden File Inputs -->
        <div style="display:none;">
          <input type="file" name="profile_picture" id="profileInput" accept="*/*">
          <input type="file" name="header_photo" id="headerInput" accept="*/*">
        </div>

        <div class="btn-container">
          <button type="submit" class="btn btn-save">Save</button>
          <a href="{{ route('customer.profile') }}" class="btn btn-back">Back</a>
        </div>
      </div>
    </form>
  </div>

  <!-- IMAGE PREVIEW -->
  <div class="preview-section">
    <div class="preview-box">
      <label>Profile Picture</label>
      <img id="profilePreview" src="{{ $customer->profile_picture ? asset('storage/'.$customer->profile_picture) : '' }}" class="profile-preview" style="{{ $customer->profile_picture?'':'display:none;' }}">
      <label class="upload-btn" for="profileInput">Upload</label>
      <button class="btn-crop" onclick="startCrop('profile')">✂ Crop</button>
    </div>

    <div class="preview-box">
      <label>Header Photo</label>
      <img id="headerPreview" src="{{ $customer->header_photo ? asset('storage/'.$customer->header_photo) : '' }}" class="header-preview" style="{{ $customer->header_photo?'':'display:none;' }}">
      <label class="upload-btn" for="headerInput">Upload</label>
      <button class="btn-crop" onclick="startCrop('header')">✂ Crop</button>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="bottom-bar">
    © 2025 Yah Nursery & Landscape. All Rights Reserved.
  </div>
</footer>

<!-- ===== Crop Modal ===== -->
<div id="cropModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="cropTitle">
  <div class="crop-modal-inner">
    <div class="crop-modal-header">
      <h3 id="cropTitle">✂ Crop Image</h3>
      <button class="crop-close-btn" id="cropCloseBtn" aria-label="Close crop modal">×</button>
    </div>

    <div class="crop-stage">
      <img id="cropImage" alt="Crop preview">
    </div>

    <div class="crop-actions">
      <button id="cropConfirm" class="btn-crop-confirm">💾 Save Crop</button>
      <button id="cropReset" class="btn-crop-reset">🔁 Reset</button>
      <button id="cropCancel" class="btn-crop-cancel">✖ Cancel</button>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  let cropper = null;
  let currentType = ''; 
  let originalImageDataURL = null;

  const profileInput = document.getElementById('profileInput');
  const headerInput  = document.getElementById('headerInput');
  const profilePreview = document.getElementById('profilePreview');
  const headerPreview  = document.getElementById('headerPreview');

  const modal = document.getElementById('cropModal');
  const cropImage = document.getElementById('cropImage');
  const cropConfirm = document.getElementById('cropConfirm');
  const cropCancel = document.getElementById('cropCancel');
  const cropCloseBtn = document.getElementById('cropCloseBtn');
  const cropReset = document.getElementById('cropReset');

  function showModal() {
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
  }

  function hideModal() {
    modal.classList.remove('show');
    document.body.style.overflow = '';
  }

  function readFileAsDataURL(file) {
    return new Promise((resolve, reject) => {
      const fr = new FileReader();
      fr.onload = () => resolve(fr.result);
      fr.onerror = reject;
      fr.readAsDataURL(file);
    });
  }

  function openModalWithSrc(src) {
    if (!src) return alert('No image found to crop.');
    if (cropper) { cropper.destroy(); cropper = null; }
    cropImage.src = src;
    showModal();

    cropImage.onload = () => {
      cropper = new Cropper(cropImage, {
        aspectRatio: currentType === 'profile' ? 1 : 16 / 9,
        viewMode: 1,
        autoCropArea: 1,
        background: false,
        responsive: true,
      });
    };
  }

  window.startCrop = async function (type) {
    currentType = type;
    const preview = type === 'profile' ? profilePreview : headerPreview;
    const input = type === 'profile' ? profileInput : headerInput;

    if (preview && preview.src) {
      originalImageDataURL = preview.src;
      openModalWithSrc(preview.src);
      return;
    }
    if (input && input.files && input.files[0]) {
      const dataURL = await readFileAsDataURL(input.files[0]);
      originalImageDataURL = dataURL;
      openModalWithSrc(dataURL);
      return;
    }
    alert('Please upload an image first.');
  };

  profileInput?.addEventListener('change', async function () {
    currentType = 'profile';
    if (!this.files[0]) return;
    const dataURL = await readFileAsDataURL(this.files[0]);
    originalImageDataURL = dataURL;
    openModalWithSrc(dataURL);
  });

  headerInput?.addEventListener('change', async function () {
    currentType = 'header';
    if (!this.files[0]) return;
    const dataURL = await readFileAsDataURL(this.files[0]);
    originalImageDataURL = dataURL;
    openModalWithSrc(dataURL);
  });

  cropConfirm.addEventListener('click', function () {
    if (!cropper) return alert('Cropper not ready.');

    const outWidth = currentType === 'profile' ? 800 : 1600;
    const outHeight = currentType === 'profile' ? 800 : Math.round(outWidth * 9 / 16);

    const canvas = cropper.getCroppedCanvas({ width: outWidth, height: outHeight });
    const dataURL = canvas.toDataURL('image/jpeg', 0.9);

    if (currentType === 'profile') {
      profilePreview.src = dataURL;
      profilePreview.style.display = 'block';
      dataURLtoFile(dataURL, 'profile.jpg', profileInput);
    } else {
      headerPreview.src = dataURL;
      headerPreview.style.display = 'block';
      dataURLtoFile(dataURL, 'header.jpg', headerInput);
    }

    closeAndDestroy();
  });

  // ✅ Reset back to original image
  window.resetImage = function (type) {
    if (!originalImageDataURL) return alert('No original image to reset.');
    const preview = type === 'profile' ? profilePreview : headerPreview;
    const input = type === 'profile' ? profileInput : headerInput;

    preview.src = originalImageDataURL;
    preview.style.display = 'block';
    dataURLtoFile(originalImageDataURL, `${type}.jpg`, input);
  };

  // ✅ Remove image entirely
  window.removeImage = function (type) {
    const preview = type === 'profile' ? profilePreview : headerPreview;
    const input = type === 'profile' ? profileInput : headerInput;

    preview.src = '';
    preview.style.display = 'none';

    // clear file input
    const dt = new DataTransfer();
    input.files = dt.files;

    // clear stored original
    originalImageDataURL = null;
  };

  cropReset.addEventListener('click', function () {
    if (!originalImageDataURL) return alert('No original image to reset.');
    cropper.replace(originalImageDataURL);
  });

  function closeAndDestroy() {
    hideModal();
    if (cropper) { cropper.destroy(); cropper = null; }
    cropImage.src = '';
  }

  cropCancel.addEventListener('click', closeAndDestroy);
  cropCloseBtn.addEventListener('click', closeAndDestroy);

  window.addEventListener('keydown', e => {
    if (e.key === 'Escape' && modal.classList.contains('show')) closeAndDestroy();
  });

  function dataURLtoFile(dataurl, filename, fileInput) {
    const arr = dataurl.split(',');
    const mime = arr[0].match(/:(.*?);/)[1];
    const bstr = atob(arr[1]);
    let n = bstr.length;
    const u8arr = new Uint8Array(n);
    while (n--) u8arr[n] = bstr.charCodeAt(n);
    const file = new File([u8arr], filename, { type: mime });
    const dt = new DataTransfer();
    dt.items.add(file);
    fileInput.files = dt.files;
  }
});
</script>



</body>
</html>
