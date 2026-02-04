<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-body: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        body { 
            background-color: var(--bg-body); 
            font-family: 'Inter', sans-serif; 
            color: var(--text-main);
            transition: background-color 0.3s ease, color 0.3s ease;
            padding-bottom: 50px;
        }

        /* Dark Mode overrides */
        body.dark-theme {
            --bg-body: #0f172a;
            --card-bg: #1e293b;
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --border-color: #334155;
        }

        .container { 
            margin-top: 60px; 
            max-width: 900px; 
        }

        .page-header {
            margin-bottom: 2.5rem;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
            margin-bottom: 1rem;
        }
        .btn-back:hover { color: var(--primary-color); }

        /* Category Header */
        .category-label {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            margin-bottom: 1rem;
            margin-top: 2.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .category-label::after {
            content: "";
            height: 1px;
            background: var(--border-color);
            flex-grow: 1;
        }

        /* Card Styling */
        .settings-card { 
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px; 
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .setting-row {
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-color);
        }
        .setting-row:last-child { border-bottom: none; }

        .setting-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .icon-box {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(79, 70, 229, 0.08);
            color: var(--primary-color);
            flex-shrink: 0;
        }

        .setting-title { 
            font-size: 15px; 
            font-weight: 600; 
            display: block;
        }

        .setting-description {
            font-size: 13px;
            color: var(--text-muted);
            margin: 0;
        }

        /* Form Controls */
        .form-check-input {
            width: 2.4em;
            height: 1.2em;
            cursor: pointer;
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-select-sm, .form-control-sm {
            border-radius: 6px;
            border-color: var(--border-color);
            background-color: var(--card-bg);
            color: var(--text-main);
            width: 150px;
        }

        .btn-action {
            padding: 6px 14px;
            font-weight: 500;
            border-radius: 8px;
            font-size: 13px;
            transition: all 0.2s;
        }

        .badge-beta {
            background: #fef3c7;
            color: #92400e;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 4px;
            margin-left: 5px;
            vertical-align: middle;
        }
    </style>
</head>
<body id="mainBody">
<div class="container">
    <!-- Header -->
    <div class="page-header">
        <a href="{{ route('admin.dashboard') }}" class="btn-back">
            <i data-lucide="arrow-left" size="16"></i> Back to Dashboard
        </a>
        <div class="d-flex justify-content-between align-items-end">
            <div>
                <h2 class="fw-bold m-0">Settings</h2>
                <p class="text-muted m-0">Configure site-wide parameters and security protocols.</p>
            </div>
            <button class="btn btn-primary btn-action px-4">Save Changes</button>
        </div>
    </div>

    <!-- APPEARANCE & BRANDING -->
    <div class="category-label">Appearance & Branding</div>
    <div class="settings-card">
        <div class="setting-row">
            <div class="setting-info">
                <div class="icon-box"><i data-lucide="palette" size="20"></i></div>
                <div>
                    <span class="setting-title">Interface Theme</span>
                    <p class="setting-description">Switch between light and dark visual styles.</p>
                </div>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="darkModeSwitch">
            </div>
        </div>
        <div class="setting-row">
            <div class="setting-info">
                <div class="icon-box"><i data-lucide="layout" size="20"></i></div>
                <div>
                    <span class="setting-title">Sidebar Layout</span>
                    <p class="setting-description">Default state of the navigation menu.</p>
                </div>
            </div>
            <select class="form-select form-select-sm">
                <option>Expanded</option>
                <option>Collapsed</option>
            </select>
        </div>
    </div>

    <!-- SITE OPERATIONS -->
    <div class="category-label">Site Operations</div>
    <div class="settings-card">
        <div class="setting-row">
            <div class="setting-info">
                <div class="icon-box" style="background: rgba(239, 68, 68, 0.08); color: #ef4444;"><i data-lucide="wrench" size="20"></i></div>
                <div>
                    <span class="setting-title">Maintenance Mode</span>
                    <p class="setting-description">Disable public access while performing updates.</p>
                </div>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="maintenanceMode">
            </div>
        </div>
        <div class="setting-row">
            <div class="setting-info">
                <div class="icon-box" style="background: rgba(16, 185, 129, 0.08); color: #10b981;"><i data-lucide="database" size="20"></i></div>
                <div>
                    <span class="setting-title">Auto-Backups</span>
                    <p class="setting-description">Daily snapshot of the system database.</p>
                </div>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" checked>
            </div>
        </div>
    </div>

    <!-- SECURITY & AUTH -->
    <div class="category-label">Security & Access</div>
    <div class="settings-card">
        <div class="setting-row">
            <div class="setting-info">
                <div class="icon-box" style="background: rgba(245, 158, 11, 0.08); color: #d97706;"><i data-lucide="lock" size="20"></i></div>
                <div>
                    <span class="setting-title">Admin Password</span>
                    <p class="setting-description">Last changed 3 months ago.</p>
                </div>
            </div>
            <button class="btn btn-outline-secondary btn-action">Update</button>
        </div>
        <div class="setting-row">
            <div class="setting-info">
                <div class="icon-box" style="background: rgba(79, 70, 229, 0.08); color: #4f46e5;"><i data-lucide="shield-check" size="20"></i></div>
                <div>
                    <span class="setting-title">Two-Factor Auth <span class="badge-beta">PRO</span></span>
                    <p class="setting-description">Add an extra layer of security to your login.</p>
                </div>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox">
            </div>
        </div>
    </div>

    <!-- NOTIFICATIONS -->
    <div class="category-label">Notifications</div>
    <div class="settings-card">
        <div class="setting-row">
            <div class="setting-info">
                <div class="icon-box" style="background: rgba(6, 182, 212, 0.08); color: #0891b2;"><i data-lucide="mail" size="20"></i></div>
                <div>
                    <span class="setting-title">Email Alerts</span>
                    <p class="setting-description">Receive reports for critical system errors.</p>
                </div>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
            </div>
        </div>
        <div class="setting-row">
            <div class="setting-info">
                <div class="icon-box" style="background: rgba(139, 92, 246, 0.08); color: #7c3aed;"><i data-lucide="slack" size="20"></i></div>
                <div>
                    <span class="setting-title">Slack Integration</span>
                    <p class="setting-description">Push audit logs to your company workspace.</p>
                </div>
            </div>
            <button class="btn btn-outline-primary btn-action">Connect</button>
        </div>
    </div>

    <div class="text-center mt-5">
        <p class="text-muted small">Logged in as <strong>Super Admin</strong> • Last Login: Today at 2:14 PM</p>
    </div>
</div>

<script>
    // Initialize Icons
    lucide.createIcons();

    // Dark Mode Toggle Logic
    const switchToggle = document.getElementById('darkModeSwitch');
    const body = document.getElementById('mainBody');

    // Persist preference (Optional logic)
    switchToggle.addEventListener('change', function() {
        if (this.checked) {
            body.classList.add('dark-theme');
        } else {
            body.classList.remove('dark-theme');
        }
    });
</script>
</body>
</html>