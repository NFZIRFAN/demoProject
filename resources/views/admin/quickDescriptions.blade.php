<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Quick Descriptions | Yah Nursery Admin</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

<script>
tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                serif: ['Playfair Display', 'serif'],
            },
            colors: {
                brand: {50:'#ecfdf5',100:'#d1fae5',500:'#10b981',600:'#059669',800:'#065f46',900:'#064e3b'},
                leaf: "#059669",
                primaryBtn: "#2F8F2F",
            }
        }
    }
}
</script>

<style>
body {
    background-color: #f8fafc;
    background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
    background-size: 24px 24px;
}

/* Toast */
#toast {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 999999;
    display: none;
    background: white;
    color: #2F8F2F;
    padding: 14px 20px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 500;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    opacity: 0;
    transform: translateY(-10px);
    transition: opacity 0.3s ease, transform 0.3s ease;
}
#toast.show {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

/* Buttons */
.btn-primary {
    background-color: #2F8F2F;
    color: white;
    transition: all 0.3s ease;
    padding: 0.75rem 1.5rem;
    font-size: 16px;
    font-weight: 600;
    border-radius: 0.5rem;
}
.btn-primary:hover {
    background: linear-gradient(135deg, #2F8F2F, #72C74B);
    box-shadow: 0 4px 15px rgba(46, 140, 46, 0.4);
}

.btn-icon {
    background-color: #2F8F2F;
    color: white;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
}
.btn-icon:hover {
    background: linear-gradient(135deg, #2F8F2F, #72C74B);
    box-shadow: 0 4px 15px rgba(46, 140, 46, 0.4);
}

/* Scrollbar */
.custom-scrollbar::-webkit-scrollbar { width: 6px; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
.custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

/* Quick-desc animation */
.quick-desc-input {
    transition: all 0.35s cubic-bezier(0.4,0,0.2,1);
    max-height: 100px;
    opacity: 1;
    transform: scale(1);
}
.quick-desc-input.removing {
    opacity: 0;
    transform: scale(0.95) translateY(-10px);
    max-height: 0 !important;
    margin: 0 !important;
    padding: 0 !important;
    overflow: hidden;
}
</style>
</head>

<body class="min-h-screen flex flex-col text-slate-600">

<!-- Toast -->
<div id="toast"></div>

<!-- Navbar -->
<nav class="w-full bg-white border-b border-slate-200 h-16 flex-shrink-0 flex items-center justify-between px-6 lg:px-12 shadow-sm">
    <div class="flex items-center gap-2">
        <span class="text-brand-600 text-2xl">🌿</span>
        <span class="font-serif font-bold text-xl text-slate-800 tracking-tight">Yah Nursery</span>
    </div>
    <div class="text-sm font-medium text-slate-500">Admin Dashboard</div>
</nav>

<main class="flex-grow flex flex-col pt-6 pb-2 px-4 sm:px-6 lg:px-8">
<div class="w-full h-full flex flex-col">

<!-- Header -->
<div class="flex-shrink-0 mb-6 flex items-end justify-between border-b border-slate-200 pb-4">
    <div>
        <h1 class="text-2xl md:text-3xl font-serif font-bold text-slate-900">Manage Quick Descriptions</h1>
        <p class="text-slate-500 text-sm mt-1">All categories are shown below — scroll down for descriptions.</p>
    </div>

    <!-- Back Button -->
    <a href="{{ route('admin.plants.index') }}">
        <button type="button" class="btn-primary shadow-md flex items-center gap-2">
            <i class="fa-solid fa-circle-arrow-left"></i> Back to Inventory
        </button>
    </a>
</div>

<!-- 4-COLUMN GRID -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

@foreach($categories as $category)
@php
    $plant = \App\Models\Plant::where('category', $category)->first();
    $quickDescriptions = $plant && $plant->quick_descriptions ? $plant->quick_descriptions : [];
@endphp

<!-- CARD -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col relative h-[420px]">

    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-500 to-teal-400 rounded-t-lg"></div>

    <form action="{{ url('admin/manage-quick-description/' . $category . '/update') }}" method="POST" class="flex flex-col h-full">
        @csrf

        <div class="p-6 border-b border-slate-100 bg-white flex justify-between items-center">
            <h2 class="text-xl font-serif font-bold text-slate-800">{{ $category }}</h2>
            <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 bg-slate-50 px-2 py-1 rounded border border-slate-100">{{ count($quickDescriptions) }} Items</span>
        </div>

        <!-- Scrollable Quick Descriptions -->
        <div id="descContainer-{{ $category }}" class="flex-1 overflow-y-auto p-4 space-y-3 custom-scrollbar bg-slate-50 rounded-b-lg">
            @foreach($quickDescriptions as $desc)
            <div class="quick-desc-input-wrapper quick-desc-input flex items-center gap-3">
                <input type="text" name="quick_descriptions[]" value="{{ $desc }}" class="w-full pl-3 pr-4 py-3 bg-white border border-slate-200 rounded-lg text-sm font-medium text-slate-700">
                <button type="button" onclick="removeField(this)" class="btn-icon rounded-lg shadow-sm">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
            @endforeach
        </div>

        <!-- Footer Buttons -->
        <div class="p-4 border-t border-slate-200 bg-white flex flex-row gap-3 justify-between">
            <button type="button" onclick="addNewDescription('{{ $category }}')" class="flex-1 btn-primary rounded-lg font-semibold shadow-md text-lg">
                <i class="fa-solid fa-plus mr-2"></i> Add
            </button>
            <button type="submit" class="flex-1 btn-primary rounded-lg font-semibold shadow-md text-lg">
                Save
            </button>
        </div>
    </form>
</div>
@endforeach

</div>
</div>
</main>

<footer class="border-t border-slate-200 bg-white py-4 text-center text-slate-400 text-xs">
&copy; {{ date('Y') }} Yah Nursery Administration.
</footer>

<script>
function showToast(message) {
    const toast = document.getElementById("toast");
    toast.textContent = message;
    toast.classList.add("show");
    setTimeout(() => { toast.classList.remove("show"); }, 2500);
}

function addNewDescription(category) {
    const container = document.getElementById('descContainer-' + category);
    const wrapper = document.createElement('div');
    wrapper.className = 'quick-desc-input-wrapper quick-desc-input flex items-center gap-3';

    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'quick_descriptions[]';
    input.placeholder = 'e.g., Requires indirect sunlight';
    input.className = 'w-full pl-3 pr-4 py-3 bg-white border border-slate-200 rounded-lg text-sm';

    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'btn-icon rounded-lg shadow-sm';
    button.innerHTML = '<i class="fa-solid fa-trash"></i>';
    button.onclick = function () { removeField(button); };

    wrapper.appendChild(input);
    wrapper.appendChild(button);
    container.appendChild(wrapper);
    container.scrollTop = container.scrollHeight;

    showToast("New description added!");
}

function removeField(button) {
    const wrapper = button.parentElement;
    const container = wrapper.parentElement;
    const inputs = container.querySelectorAll('.quick-desc-input');

    if (inputs.length === 1) { showToast("Cannot delete the last field!"); return; }

    wrapper.classList.add('removing');
    setTimeout(() => { wrapper.remove(); showToast("Description removed"); }, 350);
}
</script>
</body>
</html>
