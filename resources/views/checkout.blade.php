<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout - Yah Nursery & Landscape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #ffffff; }

        .form-input {
            transition: all 0.2s;
            @apply border-gray-400 border-opacity-70 rounded-md shadow-none h-12 px-4 text-gray-800;
        }
        .form-input:focus {
            @apply border-green-700 ring-1 ring-green-700; 
        }
        .section-separator { @apply border-b border-gray-200 my-8; }
    </style>
</head>
<body>

<div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <header class="text-center mb-12">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-widest uppercase">Checkout</h1>
    </header>

    <div class="grid lg:grid-cols-5 gap-12 border-t border-gray-300 pt-8">

        <!-- Left (3/5): Form -->
        <div class="lg:col-span-3">
            <form action="{{ route('payment.process') }}" method="POST" class="space-y-6">
                @csrf
                <h3 class="text-lg font-bold text-gray-900 tracking-widest uppercase mb-4 pt-4">Contact</h3>
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input type="email" id="email" name="email" class="form-input w-full bg-gray-50 border-dashed cursor-not-allowed" value="{{ $customer->email ?? 'email@example.com' }}" readonly>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                        <input type="text" id="phone" name="phone" class="form-input w-full" placeholder="fill in your number" required>
                    </div>
                </div>

                <div class="section-separator"></div>

                <!-- Address Section -->
                <h3 class="text-lg font-bold text-gray-900 tracking-widest uppercase mb-6">Address</h3>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                        <input type="text" id="first_name" name="first_name" class="form-input w-full" placeholder="First Name" value="{{ $customer->firstname ?? '' }}" required>
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                        <input type="text" id="last_name" name="last_name" class="form-input w-full" placeholder="Last Name" value="{{ $customer->lastname ?? '' }}" required>
                    </div>
                </div>

                <div>
                    <label for="address_1" class="block text-sm font-medium text-gray-700 mb-2">Address 1 (Street Address) *</label>
                    <input type="text" id="address_1" name="address_1" class="form-input w-full" placeholder="please enter your street add" required>
                </div>

                <div>
                    <label for="address_2" class="block text-sm font-medium text-gray-700 mb-2">Address 2 </label>
                    <input type="text" id="address_2" name="address_2" class="form-input w-full" placeholder="Apartment or Suite (Optional)">
                </div>

                <div>
                    <label for="additional_info" class="block text-sm font-medium text-gray-700 mb-2">Additional Info</label>
                    <textarea id="additional_info" name="additional_info" rows="3" class="form-input w-full resize-none h-auto" placeholder="Notes for delivery..."></textarea>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                        <select id="state" name="state" class="form-input w-full" required>
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

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City/Town *</label>
                        <select id="city" name="city" class="form-input w-full" required>
                            <option value="" disabled selected>Select City</option>
                        </select>
                    </div>

                    <div>
                        <label for="zip" class="block text-sm font-medium text-gray-700 mb-2">ZIP/Postal Code *</label>
                        <input type="text" id="zip" name="zip" class="form-input w-full" placeholder="enter code" required>
                    </div>
                </div>

                <div class="section-separator"></div>

                <!-- Payment Method -->
                <h3 class="text-lg font-bold text-gray-900 tracking-widest uppercase mb-6">Payment Method</h3>
                <!-- Payment Options -->
<div class="space-y-3">

    <!-- Option 1: PayPal -->
    <label class="block">
        <input type="radio" name="payment_method" value="paypal" class="peer sr-only" checked>
        <div class="flex justify-between items-center p-4 border border-gray-200 rounded-lg cursor-pointer transition-all duration-300
                    peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:shadow
                    hover:border-green-600 hover:bg-green-50">
            <div class="flex items-center space-x-3">
                <span class="text-base font-semibold text-gray-800 peer-checked:text-green-700">PayPal</span>
            </div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-6" alt="PayPal Logo">
        </div>
    </label>

    <!-- Option 2: Online Banking -->
    <label class="block">
        <input type="radio" name="payment_method" value="online_banking" class="peer sr-only">
        <div class="flex justify-between items-center p-4 border border-gray-200 rounded-lg cursor-pointer transition-all duration-300
                    peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:shadow
                    hover:border-green-600 hover:bg-green-50">
            <div class="flex items-center space-x-3">
                <span class="text-base font-semibold text-gray-800 peer-checked:text-green-700">Online Banking</span>
            </div>
            <div class="flex space-x-1">
                <span class="inline-block w-6 h-4 bg-red-600 rounded-sm"></span>
                <span class="inline-block w-6 h-4 bg-blue-600 rounded-sm"></span>
                <span class="inline-block w-6 h-4 bg-yellow-600 rounded-sm"></span>
            </div>
        </div>
    </label>

    <!-- Option 3: GrabPay -->
    <label class="block">
        <input type="radio" name="payment_method" value="grabpay" class="peer sr-only">
        <div class="flex justify-between items-center p-4 border border-gray-200 rounded-lg cursor-pointer transition-all duration-300
                    peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:shadow
                    hover:border-green-600 hover:bg-green-50">
            <div class="flex items-center space-x-3">
                <span class="text-base font-semibold text-gray-800 peer-checked:text-green-700">GrabPay</span>
            </div>
            <span class="font-bold text-green-600 text-sm">GrabPay</span>
        </div>
    </label>

    <!-- Option 4: Credit/Debit Card -->
    <label class="block">
        <input type="radio" name="payment_method" value="credit_card" class="peer sr-only">
        <div class="flex justify-between items-center p-4 border border-gray-200 rounded-lg cursor-pointer transition-all duration-300
                    peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:shadow
                    hover:border-green-600 hover:bg-green-50">
            <div class="flex items-center space-x-3">
                <span class="text-base font-semibold text-gray-800 peer-checked:text-green-700">Credit/Debit Card</span>
            </div>
            <div class="flex space-x-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" class="h-5" alt="Visa">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-5" alt="Mastercard">
            </div>
        </div>
    </label>

</div>


                <button type="submit" class="w-full bg-gray-900 hover:bg-gray-700 text-white py-4 mt-6 rounded-md font-bold text-lg transition duration-300">
                    Confirm & Pay 
                </button>
               <button onclick="location.href='{{ route('customer.dashboard') }}'" class="w-full bg-gray-900 hover:bg-gray-700 text-white py-4 mt-6 rounded-md font-bold text-lg transition duration-300">
                <i class="fa fa-arrow-left"></i> Back to Dashboard
                 </button>
            </form>

        </div>

        <!-- Right (2/5): Order Summary -->
        <div class="lg:col-span-2">
            <div class="bg-gray-50 p-6 sm:p-8 rounded-lg border border-gray-200 shadow-sm h-fit sticky top-12">
                <div class="flex justify-between items-center mb-6 border-b border-gray-300 pb-4">
                    <h3 class="text-lg font-bold text-gray-900 tracking-widest uppercase">Your Cart</h3>
                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-gray-900 uppercase underline">Edit</a>
                </div>
    
                <ul class="space-y-4 mb-6">
                    @foreach ($cartItems as $item)
                        <li class="flex justify-between items-start border-b border-gray-100 pb-3 last:border-b-0 last:pb-0">
                            <div class="text-sm text-gray-700">
                                <span class="font-medium text-gray-900">{{ $item->plant->name }}</span>
                                <span class="text-xs text-gray-500 block">Qty: x{{ $item->quantity }}</span>
                            </div>
                            <span class="font-semibold text-gray-800 text-sm">RM {{ number_format($item->plant->price * $item->quantity, 2) }}</span>
                        </li>
                    @endforeach
                </ul>
                
                <div class="space-y-2 pt-4 border-t border-gray-300">
                    <div class="flex justify-between text-base text-gray-600">
                        <span>Subtotal</span>
                        <span id="subtotal_display" class="font-medium text-gray-800">RM {{ number_format($subtotal ?? 0, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-base text-gray-600">
                        <span>Shipping</span>
                        <span id="shipping_fee" class="font-medium text-gray-900">FREE</span>
                    </div>
                    
                    <div class="flex justify-between pt-4 text-xl font-extrabold text-gray-900 border-t border-gray-300 mt-4">
                        <span>Total</span>
                        <span id="total_display">RM {{ number_format($subtotal ?? 0, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="mt-16 border-t border-gray-200 py-8 text-center bg-gray-50">
    <div class="max-w-7xl mx-auto text-sm text-gray-500">
        Secure Payment Powered by Yah Nursery. <a href="mailto:support@yahnursery.com" class="text-gray-700 hover:text-green-700 font-medium">Contact Us</a>.
    </div>
</footer>

<script>
    const stateSelect = document.getElementById('state');
    const citySelect = document.getElementById('city');
    const zipInput = document.getElementById('zip');
    const shippingEl = document.getElementById('shipping_fee');
    const totalEl = document.getElementById('total_display');
    const subtotalEl = parseFloat("{{ $subtotal ?? 0 }}");
    const checkoutTotal = document.getElementById('checkout_total');

    <!-- Inside the <script> tag -->
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

        // Update shipping and total
        shippingEl.textContent = `RM ${fee.toFixed(2)}`;
        const newTotal = subtotalEl + fee;
        totalEl.textContent = `RM ${newTotal.toFixed(2)}`;
        checkoutTotal.textContent = newTotal.toFixed(2);

        // Reset ZIP
        zipInput.value = '';
    });

    citySelect.addEventListener('change', function(){
        const selectedState = stateSelect.value;
        const city = this.value;
        if(addressData[selectedState] && addressData[selectedState][city]){
            zipInput.value = addressData[selectedState][city];
        }
    });
</script>

</body>
</html>
