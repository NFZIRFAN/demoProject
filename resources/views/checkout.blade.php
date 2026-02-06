<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout - Yah Nursery & Landscape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { 
            font-family: 'Inter', sans-serif; 
            /* Subtle, clean background */
            background-color: #fcfcfd; 
        }

        /* Enhanced Form Input Styling */
        .form-input {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            /* Increased rounding, slight shadow for depth */
            @apply border-gray-300 rounded-xl shadow-sm h-12 px-4 text-gray-800 text-base appearance-none placeholder-gray-400;
        }
        .form-input:focus {
            /* Stronger, branded focus ring */
            @apply border-green-600 ring-2 ring-green-300 outline-none shadow-md;
        }
        /* New Heading Style for Sections */
        .section-heading { 
            @apply text-2xl font-bold text-gray-900 mb-6 pt-4 tracking-tight; 
        }
        .section-separator { @apply border-b border-gray-100 my-8; }

        /* Custom styling for the primary payment button */
        .primary-button {
             @apply w-full bg-green-700 hover:bg-green-600 text-white py-4 rounded-xl font-extrabold text-lg transition duration-300 shadow-lg hover:shadow-xl transform hover:scale-[1.01];
        }
        /* Custom styling for the secondary button */
        .secondary-button {
             @apply w-full border border-gray-300 bg-white text-gray-800 hover:bg-gray-100 py-4 rounded-xl font-semibold text-lg transition duration-300 mt-4;
        }
    </style>
</head>
<body>

<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    
    <!-- Top Bar / Header with Logo Placeholder and Title -->
    <header class="mb-12 border-b border-gray-200 pb-8">
        <div class="flex justify-between items-center">
            <!-- Logo/Brand Placeholder -->
            <!-- 🌿 Fancy Logo Text -->
<a href="#" class="text-4xl font-extrabold tracking-wide" 
   style="font-family: 'Playfair Display', serif; color: #3D4127; letter-spacing: 1.5px;">
    YAH NURSERY <span style="color:#636B2F;">& LANDSCAPE</span>
</a>

            <h1 class="text-2xl font-extrabold text-gray-900 tracking-wider uppercase hidden sm:block">Secure Checkout</h1>
        </div>
    </header>
    
    <!-- Error Handling Section -->
    @if ($errors->any())
    <div class="bg-red-50 border border-red-400 text-red-700 px-6 py-4 rounded-xl mb-8 shadow-md">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-3 text-red-500"></i>
            <h4 class="font-bold">Please correct the following errors:</h4>
        </div>
        <ul class="list-disc list-inside mt-2 ml-4 space-y-1">
            @foreach ($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Main Checkout Grid -->
    <div class="grid lg:grid-cols-5 gap-16">

        <!-- Left (3/5): Form -->
        <div class="lg:col-span-3"> 
            
            <!-- Start of the main form -->
            <form method="POST" action="{{ route('checkout.store') }}">
                @csrf

                
                <!-- 1. Contact Section -->
                <h2 class="section-heading">
                    <i class="fas fa-envelope text-black-600 mr-2"></i>
                    CONTACT INFORMATION                
                </h2>
                <br>
               <div class="space-y-6">

    <!-- Email (Read-only) -->
    <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
            Email Address
            <span class="text-xs text-gray-500 font-normal">(Account Email)</span>
        </label>

        <div class="relative">
            <input 
                type="email"
                id="email"
                name="email"
                value="{{ $customer->email ?? 'email@example.com' }}"
                readonly
                class="w-full rounded-lg border border-dashed border-gray-300 bg-gray-100 
                       px-4 py-3 text-gray-600 cursor-not-allowed
                       focus:outline-none focus:ring-0"
            >

            <!-- Lock Icon -->
            <i class="fas fa-lock absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
        </div>

        <p class="mt-1 text-xs text-gray-500">
            This email is linked to your account and cannot be changed.
        </p>
    </div>

    <!-- Phone Number -->
    <div>
        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
            Phone Number <span class="text-red-500">*</span>
        </label>

        <div class="relative">
            <input 
                type="text"
                id="phone"
                name="phone"
                placeholder="e.g. +60 12-345 6789"
                required
                class="w-full rounded-lg border border-gray-300 px-4 py-3
                       focus:border-green-600 focus:ring-2 focus:ring-green-100
                       transition"
            >

            <!-- Phone Icon -->
            <i class="fas fa-phone absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
        </div>
    </div>

</div>

                <br>

                <div class="section-separator"></div>

                <!-- 2. Address Section -->
                <h2 class="section-heading">
                    <i class="fas fa-truck text-black-600 mr-2"></i>
                    SHIPPING ADDRESS
                </h2>
                <br>
               <div class="space-y-8">

    <!-- Name -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                First Name <span class="text-red-500">*</span>
            </label>
            <input 
                type="text"
                id="first_name"
                name="first_name"
                value="{{ $customer->first_name ?? '' }}"
                required
                class="w-full rounded-lg border border-gray-300 px-4 py-3
                       focus:border-green-600 focus:ring-2 focus:ring-green-100 transition"
            >
        </div>

        <div>
            <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">
                Last Name <span class="text-red-500">*</span>
            </label>
            <input 
                type="text"
                id="last_name"
                name="last_name"
                value="{{ $customer->last_name ?? '' }}"
                required
                class="w-full rounded-lg border border-gray-300 px-4 py-3
                       focus:border-green-600 focus:ring-2 focus:ring-green-100 transition"
            >
        </div>
    </div>

    <!-- Address Line 1 -->
    <div>
        <label for="address_1" class="block text-sm font-semibold text-gray-700 mb-2">
            Address Line 1 <span class="text-red-500">*</span>
            <span class="text-xs text-gray-500 font-normal">(Street Address)</span>
        </label>
        <input 
            type="text"
            id="address_1"
            name="address_1"
            placeholder="Street number and name"
            required
            class="w-full rounded-lg border border-gray-300 px-4 py-3
                   focus:border-green-600 focus:ring-2 focus:ring-green-100 transition"
        >
    </div>

    <!-- Address Line 2 -->
    <div>
        <label for="address_2" class="block text-sm font-semibold text-gray-700 mb-2">
            Address Line 2
            <span class="text-xs text-gray-500 font-normal">(Optional)</span>
        </label>
        <input 
            type="text"
            id="address_2"
            name="address_2"
            placeholder="Apartment, suite, unit, etc."
            class="w-full rounded-lg border border-gray-300 px-4 py-3
                   focus:border-green-600 focus:ring-2 focus:ring-green-100 transition"
        >
    </div>

    <!-- State, City, ZIP -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

        <!-- State -->
        <div>
            <label for="state" class="block text-sm font-semibold text-gray-700 mb-2">
                State <span class="text-red-500">*</span>
            </label>
            <select 
                id="state"
                name="state"
                required
                class="w-full rounded-lg border border-gray-300 px-4 py-3 cursor-pointer
                       focus:border-green-600 focus:ring-2 focus:ring-green-100 transition"
            >
                <option value="" disabled selected>Select State</option>
                <option value="Johor" data-fee="10">Johor</option>
                <option value="Kedah" data-fee="8">Kedah</option>
                <option value="Kelantan" data-fee="12">Kelantan</option>
                <option value="Malacca" data-fee="10">Malacca</option>
                <option value="Negeri Sembilan" data-fee="10">Negeri Sembilan</option>
                <option value="Pahang" data-fee="11">Pahang</option>
                <option value="Penang" data-fee="9">Penang</option>
                <option value="Perak" data-fee="9">Perak</option>
                <option value="Perlis" data-fee="8">Perlis</option>
                <option value="Sabah" data-fee="15">Sabah</option>
                <option value="Sarawak" data-fee="15">Sarawak</option>
                <option value="Selangor" data-fee="10">Selangor</option>
                <option value="Terengganu" data-fee="12">Terengganu</option>
                <option value="Kuala Lumpur" data-fee="10">Kuala Lumpur</option>
                <option value="Labuan" data-fee="12">Labuan</option>
                <option value="Putrajaya" data-fee="10">Putrajaya</option>
            </select>
        </div>

        <!-- City -->
        <div>
            <label for="city" class="block text-sm font-semibold text-gray-700 mb-2">
                City / Town <span class="text-red-500">*</span>
            </label>
            <select 
                id="city"
                name="city"
                required
                class="w-full rounded-lg border border-gray-300 px-4 py-3 cursor-pointer
                       focus:border-green-600 focus:ring-2 focus:ring-green-100 transition"
            >
                <option value="" disabled selected>Select City</option>
            </select>
        </div>

        <!-- ZIP -->
        <div>
            <label for="zip" class="block text-sm font-semibold text-gray-700 mb-2">
                ZIP / Postal Code <span class="text-red-500">*</span>
            </label>
            <input 
                type="text"
                id="zip"
                name="zip"
                placeholder="Auto-filled"
                readonly
                required
                class="w-full rounded-lg border border-dashed border-gray-300 bg-gray-100
                       px-4 py-3 text-gray-600 cursor-not-allowed"
            >
        </div>
    </div>

    <!-- Order Notes -->
    <div>
        <label for="additional_info" class="block text-sm font-semibold text-gray-700 mb-2">
            Order Notes / Delivery Instructions
        </label>
        <textarea 
            id="additional_info"
            name="additional_info"
            rows="3"
            placeholder="e.g. Leave package at the front gate..."
            class="w-full rounded-lg border border-gray-300 px-4 py-3 resize-none
                   focus:border-green-600 focus:ring-2 focus:ring-green-100 transition"
        ></textarea>
    </div>

</div>

                <br>
                <div class="section-separator"></div>

                <!-- 3. Payment Method -->
                <h2 class="section-heading">
                    <i class="fas fa-credit-card text-black-600 mr-2"></i>
                    PAYMENT (Click payment method below)
                </h2>
                <br>

              <div class="space-y-6">

    <!-- Payment Method -->
    <label class="block">
        <input 
            type="radio" 
            name="payment_method" 
            value="online_banking" 
            class="peer sr-only"
            required
        >

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4
                    p-5 border border-gray-200 rounded-2xl cursor-pointer
                    transition-all duration-300 shadow-sm
                    hover:border-green-600 hover:bg-green-50/60
                    peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:shadow-lg">

            <!-- Left: Icon + Text -->
            <div class="flex items-center space-x-4">
                <div class="w-11 h-11 flex items-center justify-center rounded-full
                            bg-green-100 text-green-700">
                    <i class="fas fa-university text-lg"></i>
                </div>

                <div>
                    <p class="text-base font-semibold text-gray-800">
                        ToyyibPay Online Banking (FPX)
                    </p>
                    <p class="text-sm text-gray-500">
                        Pay securely using Malaysian online banking
                    </p>
                </div>
            </div>

            <!-- Right: ToyyibPay Logo -->
            <div class="flex justify-center sm:justify-end">
                <img 
                    src="{{ asset('storage/image/toyyibpay.png') }}" 
                    alt="ToyyibPay"
                    class="h-16 md:h-24 object-contain drop-shadow-md"
                />
            </div>

        </div>
    </label>

</div>


              <!-- Final Action Buttons -->
<div class="pt-8 space-y-4">

    <!-- Hidden inputs for total and shipping -->
    <input type="hidden" name="total" id="checkout_total_input" value="{{ number_format($subtotal ?? 0, 2, '.', '') }}">
    <input type="hidden" name="shipping_fee" id="checkout_shipping_fee" value="0">

    <!-- Primary Confirm Pay Button -->
    <button type="submit" 
class="w-full bg-gradient-to-r from-[#636B2F] to-[#BAC095] text-white py-4 rounded-2xl font-[Playfair_Display] font-extrabold text-lg shadow-[0_4px_15px_rgba(99,107,47,0.4)] hover:shadow-[0_6px_20px_rgba(99,107,47,0.5)] hover:from-[#BAC095] hover:to-[#636B2F] transition-all duration-500 transform hover:scale-105 flex items-center justify-center space-x-2"
style="letter-spacing:0.5px;">
  <i class="fas fa-lock text-white"></i>
  <span>CONFIRM YOUR PAYMENT </span>
</button>
<div class="alert alert-info mt-3">
    🔹 After completing the payment on ToyyibPay, please click the 
    <strong>"Return to Merchant"</strong> button to go back to your dashboard.
</div>



    <!-- Row for Back + Terms + Policy -->
    <div class="flex flex-wrap sm:flex-nowrap gap-4 mt-4">
        <!-- Back Button -->
        <button type="button" onclick="location.href='{{ route('customer.dashboard') }}'" class="flex-1 border border-gray-300 bg-white text-gray-800 hover:bg-gray-100 py-4 rounded-2xl font-playfair font-semibold text-lg shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-center space-x-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Dashboard</span>
        </button>

        <!-- Terms & Conditions Button -->
        <a href="#" class="flex-1 border border-gray-300 bg-white text-gray-800 hover:bg-gray-100 py-4 rounded-2xl font-playfair font-semibold text-lg shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-center space-x-2">
            <i class="fas fa-file-contract"></i>
            <span>Terms & Conditions</span>
        </a>
        <!-- Privacy Policy Button -->
        <a href="#" class="flex-1 border border-gray-300 bg-white text-gray-800 hover:bg-gray-100 py-4 rounded-2xl font-playfair font-semibold text-lg shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-center space-x-2">
            <i class="fas fa-shield-alt"></i>
            <span>Privacy Policy</span>
        </a>
    </div>

</div>

            </form>

        </div>
        
       <!-- Right (2/5): Order Summary -->
<div class="lg:col-span-2">
    <!-- Order Summary Card: Darker background, stronger shadow, sticky position -->
    <div class="bg-white p-6 sm:p-8 rounded-xl border border-gray-200 shadow-xl h-fit sticky top-6 flex flex-col">
        
        <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
            <h3 class="text-xl font-bold text-gray-900 tracking-wide uppercase">
                Order Summary
            </h3>
            <a href="#" class="text-sm font-medium text-green-700 hover:text-green-900 uppercase underline">
                Edit Cart
            </a>
        </div>
        
        <!-- Cart Items List -->
        <ul class="space-y-4 mb-6 max-h-80 overflow-y-auto pr-2">
            @foreach ($cartItems as $item)
                <li class="flex justify-between items-start border-b border-gray-100 pb-3 last:border-b-0 last:pb-0">
                    <div class="text-sm text-gray-700">
                        <span class="font-semibold text-gray-900 block">{{ $item->plant->name }}</span>
                        <span class="text-xs text-gray-500">Quantity: x{{ $item->quantity }}</span>
                    </div>
                    <span class="font-semibold text-gray-800 text-sm">RM {{ number_format($item->plant->price * $item->quantity, 2) }}</span>
                </li>
            @endforeach
        </ul>
        
        <!-- Summary Totals -->
        <div class="space-y-3 pt-4 border-t border-gray-200">
            <div class="flex justify-between text-base text-gray-600">
                <span>Subtotal</span>
                <span id="subtotal_display" class="font-medium text-gray-800">RM {{ number_format($subtotal ?? 0, 2) }}</span>
            </div>
            <div class="flex justify-between text-base text-gray-600">
                <span>Shipping Fee</span>
                <span id="shipping_fee" class="font-semibold text-gray-900 text-green-700">RM 0.00</span> 
            </div>
            
            <div class="flex justify-between pt-4 text-2xl font-extrabold text-gray-900 border-t border-gray-300 mt-4">
                <span>Order Total</span>
                <span id="total_display">RM {{ number_format($subtotal ?? 0, 2) }}</span> 
            </div>
        </div>

        <!-- Terms & Policies Professional Text -->
        <div class="mt-6 pt-4 border-t border-gray-200 text-gray-700 text-sm space-y-4">
            <h4 class="text-base font-bold text-gray-900 uppercase">Terms & Conditions</h4>
            <p>
                By placing this order, you agree to our <a href="#" class="text-green-700 hover:text-green-900 underline">Terms & Conditions</a>. 
                These terms cover all aspects of your purchase, including product selection, payment obligations, and delivery expectations. 
            </p>
            <p>
                Please ensure that your contact and shipping information is accurate. Yah Nursery & Landscape is not responsible for delays or lost items due to incorrect or incomplete details provided at checkout. 
            </p>
            <p>
                All orders are subject to product availability. In rare cases of stock shortage, our customer service team will contact you promptly to provide alternatives, issue a partial shipment, or process a refund. 
            </p>
            <p>
                Returns and exchanges are handled in accordance with our policy. Please review the return conditions carefully, as some plants and live items may be exempt due to their nature. 
            </p>
            
            <h4 class="text-base font-bold text-gray-900 uppercase">Privacy Policy</h4>
            <p>
                We are committed to protecting your privacy. Your personal information will only be used to process your orders, communicate important updates, and enhance your shopping experience. 
            </p>
            <p>
                Your data is stored securely and will never be shared with third parties for marketing purposes without your explicit consent. You can review our complete <a href="#" class="text-green-700 hover:text-green-900 underline">Privacy Policy</a> for more details on how we manage and protect your information.
            </p>
            <p>
                By completing this checkout, you consent to the collection, processing, and storage of your information as described in our policies. You have the right to request access, correction, or deletion of your data at any time.
            </p>
            <p>
                We may use your order history to improve product recommendations and offer personalized promotions, always in accordance with your preferences and privacy settings.
            </p>
        </div>

    </div>
</div>


    </div>
</div>

<!-- Footer with better visual separation -->
<footer class="mt-20 border-t border-gray-100 py-6 text-center bg-gray-50 shadow-inner">
    <div class="max-w-7xl mx-auto text-sm text-gray-500">
        <p class="mb-1">
            <i class="fas fa-lock text-green-600 mr-1"></i> Secure Payment | <span class="font-medium">Yah Nursery & Landscape</span>.
        </p>
        <p>Need help? <a href="mailto:support@yahnursery.com" class="text-gray-700 hover:text-green-700 font-medium underline">Contact Support</a>.</p>
    </div>
</footer>

<!-- The script is untouched as requested, only added ID to the input for total update -->
<script>
    const stateSelect = document.getElementById('state');
    const citySelect = document.getElementById('city');
    const zipInput = document.getElementById('zip');
    const shippingEl = document.getElementById('shipping_fee');
    const totalEl = document.getElementById('total_display');
    const subtotalEl = parseFloat("{{ $subtotal ?? 0 }}");
    const checkoutTotalDisplay = document.getElementById('checkout_total');
    const checkoutTotalInput = document.getElementById('checkout_total_input'); // New element to update hidden input

    const addressData = {
        "Johor": { "Johor Bahru": "80000", "Kluang": "86000", "Muar": "84000", "Batu Pahat": "83000", "Segamat": "85000", "Pontian": "82000", "Tangkak": "84600", "Ledang": "84400" },
        "Kedah": { "Alor Setar": "05000", "Sungai Petani": "08000", "Kulim": "09000", "Langkawi": "07000", "Baling": "09000", "Padang Terap": "06000", "Kubang Pasu": "06000", "Pokok Sena": "07300" },
        "Kelantan": { "Kota Bharu": "15000", "Pasir Mas": "17000", "Tanah Merah": "17500", "Machang": "18500", "Tumpat": "16200", "Bachok": "16300", "Kuala Krai": "18000", "Gua Musang": "18300" },
        "Malacca": { "Malacca City": "75000", "Alor Gajah": "78000", "Jasin": "77300", "Masjid Tanah": "78000", "Durian Tunggal": "75400" },
        "Negeri Sembilan": { "Seremban": "70000", "Port Dickson": "71000", "Bahau": "72000", "Nilai": "71800", "Jempol": "72100", "Kuala Pilah": "72000", "Tampin": "73000" },
        "Pahang": { "Kuantan": "25000", "Temerloh": "28000", "Bentong": "28700", "Raub": "27600", "Jerantut": "27000", "Cameron Highlands": "39000", "Maran": "26500", "Lipis": "27200" },
        "Penang": { "George Town": "10000", "Bayan Lepas": "11900", "Butterworth": "12000", "Bukit Mertajam": "14000", "Nibong Tebal": "14300", "Balik Pulau": "11000" },
        "Perak": { "Ipoh": "30000", "Taiping": "34000", "Teluk Intan": "36000", "Sitiawan": "32200", "Bidor": "35000", "Kampar": "31900", "Parit Buntar": "34200", "Grik": "33000" },
        "Perlis": { "Kangar": "01000", "Arau": "02600", "Padang Besar": "02100", "Kuala Perlis": "02000" },
        "Sabah": { "Kota Kinabalu": "88000", "Sandakan": "90000", "Tawau": "91000", "Keningau": "89000", "Beaufort": "89700", "Semporna": "91300", "Lahad Datu": "91100", "Tambunan": "89100" },
        "Sarawak": { "Kuching": "93000", "Miri": "98000", "Sibu": "96000", "Bintulu": "97000", "Sarikei": "96100", "Limbang": "98700", "Mukah": "96300", "Kapit": "96400" },
        "Selangor": { "Shah Alam": "40000", "Petaling Jaya": "46000", "Subang Jaya": "47500", "Klang": "41000", "Kajang": "43000", "Puchong": "47100", "Selayang": "68100", "Banting": "42700" , "Hulu Selangor": "42800" },
        "Terengganu": { "Kuala Terengganu": "20000", "Dungun": "21000", "Kemaman": "24000", "Hulu Terengganu": "22000", "Besut": "22200", "Setiu": "22200", "Marang": "21600" },
        "Kuala Lumpur": { "Kuala Lumpur": "50000" },
        "Labuan": { "Labuan": "87000" },
        "Putrajaya": { "Putrajaya": "62000" }
    };


    stateSelect.addEventListener('change', function() {
    const selectedState = this.value;
    const fee = parseFloat(this.selectedOptions[0].dataset.fee) || 0;

    // Populate cities dropdown
    citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';
    if(addressData[selectedState]){
        for (const city in addressData[selectedState]){
            const option = document.createElement('option');
            option.value = city;
            option.textContent = city;
            citySelect.appendChild(option);
        }
    }

    // Update shipping and total on screen
    shippingEl.textContent = `RM ${fee.toFixed(2)}`;
    const newTotal = subtotalEl + fee;
    totalEl.textContent = `RM ${newTotal.toFixed(2)}`;

    // Update hidden inputs for form submission
    checkoutTotalInput.value = newTotal.toFixed(2);
    document.getElementById('checkout_shipping_fee').value = fee;

    // Reset ZIP code
    zipInput.value = '';
});


    citySelect.addEventListener('change', function(){
        const selectedState = stateSelect.value;
        const city = this.value;
        if(addressData[selectedState] && addressData[selectedState][city]){
            // Auto-fill ZIP code
            zipInput.value = addressData[selectedState][city];
        }
    });
</script>

</body>
</html>