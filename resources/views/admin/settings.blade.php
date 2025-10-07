<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Poppins', sans-serif; }
        .container { margin-top: 40px; max-width: 900px; }
        .card { border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .card-header { background: #343a40; color: white; border-radius: 15px 15px 0 0; }
        .section-title { font-size: 18px; font-weight: 600; margin-bottom: 15px; }
    </style>
</head>
<body>
<div class="container">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">⚙️ Admin Settings</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">⬅ Back to Dashboard</a>
    </div>

    <!-- Settings Card -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">System Preferences</h5>
        </div>
        <div class="card-body">
            
            <!-- Dark Mode Toggle -->
            <div class="mb-4">
                <h6 class="section-title">Appearance</h6>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                    <label class="form-check-label" for="darkModeSwitch">Enable Dark Mode</label>
                </div>
            </div>

            <!-- Example: Change Admin Password -->
            <div class="mb-4">
                <h6 class="section-title">Security</h6>
                <a href="#" class="btn btn-sm btn-warning">Change Password</a>
            </div>

            <!-- Example: Notifications -->
            <div class="mb-4">
                <h6 class="section-title">Notifications</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                    <label class="form-check-label" for="emailNotifications">Enable Email Notifications</label>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Simple Dark Mode Toggle
    const switchToggle = document.getElementById('darkModeSwitch');
    switchToggle.addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('bg-dark', 'text-white');
        } else {
            document.body.classList.remove('bg-dark', 'text-white');
        }
    });
</script>
</body>
</html>
