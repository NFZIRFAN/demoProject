<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->order_number }} - Yah Nursery & Landscape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --olive-dark: #3D4127;
            --olive-primary: #636B2F;
            --olive-light: #F0F2E5;
            --olive-soft: #BAC095;
            --text-color: #3D4127;
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #ffffff; 
            color: var(--text-color); 
        }
        .title-font { font-family: 'Playfair Display', serif; }
        .invoice-container { 
            max-width: 1000px; 
            margin: 40px auto; 
            background: #ffffff; 
            border-radius: 1.5rem;
            overflow: hidden; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }
        .header { background-color: var(--olive-primary); color: #FFFFFF; padding: 2rem; }
        .footer { background-color: var(--olive-dark); color: var(--olive-soft); padding: 1.5rem; }
        .invoice-title-large { font-size: 3rem; font-weight: 900; color: var(--olive-light); line-height: 1; }
        .invoice-table th { background-color: var(--olive-soft); color: var(--olive-dark); font-weight: 700; border-top: 1px solid #dcdcdc; }
        .invoice-table tbody tr:nth-child(even) { background-color: var(--olive-light); }
        .invoice-table tbody tr:hover { background-color: #e9ebd8; transition: background-color 0.2s; }
        .summary-total-bar { background-color: var(--olive-dark); color: white; }
        .btn-dashboard { 
            background-color: var(--olive-primary); 
            color: white; 
            font-weight: 700; 
            padding: 0.75rem 1.5rem; 
            border-radius: 0.75rem; 
            transition: 0.3s; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .btn-dashboard:hover { 
            background-color: var(--olive-dark); 
            box-shadow: 0 6px 8px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>

<div class="invoice-container">

    <!-- Header -->
    <header class="header flex flex-col md:flex-row justify-between items-start">
        <div>
            <h1 class="text-4xl title-font font-extrabold tracking-tight">YAH NURSERY & LANDSCAPE SDN BHD</h1>
            <p class="text-sm mt-1 font-medium">Sdn Bhd (Co. Reg: 123456-M)</p>
            <div class="mt-4 text-sm opacity-90">
                <p>Kebun Bunga, Jalan Pangsun Tiga 27/12c, Sek 27, Taman Bunga Negara, 40000 Shah Alam, Selangor</p>
                <p>Email: <a href="mailto:sales@yahnursery.com" class="underline hover:text-white">yahnursery@gmail.com</a> | Tel: +6012-2374 6878</p>
            </div>
        </div>
        
        <div class="text-right mt-6 md:mt-0">
            <p class="text-base font-medium title-font text-white opacity-80">RECEIPT</p>
            <p class="text-base font-small title-font text-white opacity-80">No. tracking</p>
            <p class="invoice-title-small mt-2 font-semibold text-white-900">#{{ $order->order_number }}</p>

            <button 
                class="mt-2 bg-[#D4DE95] hover:bg-[#BAC095] text-black font-semibold py-1 px-3 text-sm rounded-md transition duration-300"
                onclick="trackOrderGDX('{{ $order->order_number }}')">
                Track Order
            </button>

            <p class="text-sm mt-2 font-medium">Issue Date: {{ date('F j, Y', strtotime($order->created_at)) }}</p>
        </div>

        <script>
        function trackOrderGDX(orderNumber) {
            const newWindow = window.open('https://gdexpress.com/', '_blank');
            if (!newWindow) { alert('Please allow popups.'); return; }
            navigator.clipboard.writeText(orderNumber).then(() => {
                showToast(`Tracking number ${orderNumber} copied!`);
            }).catch(() => { alert('Failed to copy: ' + orderNumber); });
        }
        function showToast(message) {
            const toast = document.createElement('div');
            toast.textContent = message;
            toast.style.position = 'fixed';
            toast.style.bottom = '20px';
            toast.style.right = '20px';
            toast.style.backgroundColor = 'rgba(87, 114, 53, 0.9)';
            toast.style.color = 'white';
            toast.style.padding = '10px 16px';
            toast.style.borderRadius = '8px';
            toast.style.fontWeight = '500';
            toast.style.fontSize = '14px';
            toast.style.zIndex = '9999';
            document.body.appendChild(toast);
            setTimeout(() => { toast.remove(); }, 3000);
        }
        </script>
    </header>

    <!-- Billing, Shipping, Payment -->
    <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-gray-200">
        <div class="p-8 space-y-4 bg-white">
            <h3 class="text-xs font-semibold uppercase text-gray-500 tracking-widest">Billed To</h3>
            <p class="font-semibold text-lg text-gray-800 title-font">{{ $order->first_name }} {{ $order->last_name }}</p>
            <p class="text-sm">{{ $order->email }}</p>
            <p class="text-sm">{{ $order->phone }}</p>
        </div>
        <div class="p-8 space-y-4 bg-white">
            <h3 class="text-xs font-semibold uppercase text-gray-500 tracking-widest">Ship To</h3>
            <p class="font-medium text-gray-800">{{ $order->address_1 }}{{ $order->address_2 ? ', '.$order->address_2 : '' }}</p>
            <p class="text-sm">{{ $order->zip }} {{ $order->city }}, {{ $order->state }}</p>
        </div>
        <div class="p-8 space-y-4 bg-white flex flex-col justify-center items-start">
            <h3 class="text-xs font-semibold uppercase text-gray-500 tracking-widest">Payment Method</h3>
            <p class="text-lg font-bold text-olive-dark">{{ ucfirst($order->payment_method) }}</p>
            @php
                $statusClass = [
                    'Completed' => 'bg-green-100 text-green-700',
                    'Pending' => 'bg-yellow-100 text-yellow-700',
                    'Cancelled' => 'bg-red-100 text-red-700',
                ][$order->status] ?? 'bg-gray-100 text-gray-700';
            @endphp
            <span class="status-badge {{ $statusClass }}">Status: {{ $order->status }}</span>
        </div>
    </div>

    <!-- Order Items -->
    <div class="p-8 pt-0">
        <h2 class="title-font text-xl font-bold mb-4 mt-4 text-olive-primary">Purchased Items</h2>
        <div class="overflow-x-auto border border-gray-200 rounded-xl shadow-md">
            <table class="min-w-full invoice-table text-sm border-separate border-spacing-0">
                <thead>
                    <tr class="bg-[#BAC095]">
                        <th class="py-4 px-4 text-left rounded-tl-xl w-12">No</th>
                        <th class="py-4 px-4 text-left">Item</th>
                        <th class="py-4 px-4 text-center w-24">Quantity</th>
                        <th class="py-4 px-4 text-right hidden sm:table-cell w-36">Unit Price (RM)</th>
                        <th class="py-4 px-4 text-right w-36 rounded-tr-xl">Total (RM)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr class="border-b">
                            <td class="py-3 px-4 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 font-medium text-[#3D4127]">{{ $item->plant_name }}</td>
                            <td class="py-3 px-4 text-center text-gray-700">{{ $item->quantity }}</td>
                            <td class="py-3 px-4 text-right hidden sm:table-cell text-gray-700">{{ number_format($item->price, 2) }}</td>
                            <td class="py-3 px-4 text-right font-semibold text-[#636B2F]">{{ number_format($item->quantity * $item->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Summary, Notes & CTA -->
    <div class="p-8 grid grid-cols-1 md:grid-cols-3 gap-8 border-t border-gray-200">
        <div class="md:col-span-2 space-y-6">
            <div class="terms-card bg-olive-light p-5 rounded-xl border border-olive-soft">
                <h3 class="font-bold uppercase text-sm mb-3 text-olive-dark tracking-wider">Conditions & Policy</h3>
                <ul class="text-xs text-gray-700 space-y-1 list-disc list-inside">
                    <li>Payment is due upon receipt unless otherwise specified.</li>
                    <li>All plants sold in <strong>"as-is"</strong> condition; health guaranteed only on delivery.</li>
                    <li>Returns are not accepted; refunds for damaged/incorrect items reported <strong>within 4 hours</strong> of receipt.</li>
                    <li>Liability shall not exceed the amount paid for the goods in this invoice.</li>
                    <li>Governing Law: Malaysia.</li>
                </ul>
            </div>
            @if($order->additional_info)
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <h4 class="text-xs font-semibold uppercase text-gray-500 tracking-wider mb-1">Additional Notes</h4>
                    <p class="text-sm italic text-gray-600">{{ $order->additional_info }}</p>
                </div>
            @endif
            <button onclick="location.href='{{ route('orders.history', $order->id) }}'" class="btn-dashboard mt-4">View Orders</button>
            <button onclick="location.href='{{ route('customer.dashboard', $order->id) }}'" class="btn-dashboard mt-4">Go to Customer Dashboard</button>
        </div>

        <div class="md:col-span-1 flex flex-col items-end w-full">
            <div class="space-y-3 w-full max-w-xs text-right">
                @php
                    $subtotal = $order->total - $order->shipping_fee;
                @endphp
                <div class="flex justify-between w-full text-base border-b border-dashed pb-2">
                    <span>Subtotal:</span>
                    <span class="font-semibold text-olive-dark">RM {{ number_format($subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between w-full text-base border-b border-dashed pb-2">
                    <span>Shipping Fee:</span>
                    <span class="font-semibold text-olive-dark">RM {{ number_format($order->shipping_fee, 2) }}</span>
                </div>
                <div class="summary-total-bar p-4 rounded-xl flex justify-between w-full items-center mt-4 shadow-lg">
                    <span class="text-lg font-extrabold title-font">TOTAL PRICE</span>
                    <span class="text-2xl font-extrabold title-font">RM {{ number_format($order->total, 2) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center rounded-b-xl">
        <p class="text-sm font-medium">Thank you for supporting sustainable landscape development with Yah Nursery & Landscape Sdn Bhd.</p>
        <p class="text-xs mt-1">&copy; {{ date('Y') }} All rights reserved.</p>
    </footer>

</div>

</body>
</html>
