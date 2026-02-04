<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ Chatbot | Yah Nursery & Landscape</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* ===== Scrollbar for chat only ===== */
    #chat-box::-webkit-scrollbar, #faq-list::-webkit-scrollbar {
      width: 6px;
    }
    #chat-box::-webkit-scrollbar-thumb, #faq-list::-webkit-scrollbar-thumb {
      background-color: #064e3b;
      border-radius: 10px;
    }
    #chat-box::-webkit-scrollbar-track, #faq-list::-webkit-scrollbar-track {
      background: #d1fae5;
      border-radius: 10px;
    }

    .bot-icon {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      object-fit: cover;
    }

    @keyframes slideUp {
      from { transform: translateY(20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    /* Show only 3 FAQ questions then scroll */
    .faq-scroll {
      max-height: 150px; 
      overflow-y: auto;
      scrollbar-width: thin;
      scrollbar-color: #064e3b #e6f4f1;
    }

    .faq-scroll::-webkit-scrollbar {
      width: 6px;
    }

    .faq-scroll::-webkit-scrollbar-thumb {
      background-color: #064e3b;
      border-radius: 8px;
    }

    .faq-scroll::-webkit-scrollbar-track {
      background: #e6f4f1;
    }

    /* Bot Icon Bounce */
    @keyframes bot-bounce {
      0%, 100% { transform: translateY(0); }
      25% { transform: translateY(-5px); }
      50% { transform: translateY(-10px); }
      75% { transform: translateY(-5px); }
    }

    .bot-lively {
      animation: bot-bounce 2s infinite ease-in-out;
      transition: transform 0.2s;
    }

    .bot-lively:hover {
      transform: scale(1.1);
    }

    /* Floating Text Animation */
    @keyframes text-bounce {
      0%, 100% { transform: translateY(0); opacity: 1; }
      50% { transform: translateY(-5px); opacity: 0.8; }
    }

    .lively-text {
      animation: text-bounce 1.5s infinite ease-in-out;
      display: inline-block;
      white-space: nowrap;
      text-align: center;
      transition: opacity 0.3s, transform 0.3s;
    }

    /* Show text when hovering bot */
    #chat-toggle:hover .lively-text {
      opacity: 1;
    }

    /* ===== Compact Sun/Moon Toggle ===== */
    .toggle-switch {
      width: 16px;
      height: 8px;
      border-radius: 9999px;
    }
    .dark .faq-section-title {
    color: #bbf7d0 !important; /* Light green tone in dark mode */
  }
  #chat-container {
  backdrop-filter: blur(18px);
  background: rgba(255, 255, 255, 0.92);
  border-radius: 24px;
  border: 1px solid rgba(212, 175, 55, 0.25);
  box-shadow:
    0 25px 50px rgba(0,0,0,0.25),
    inset 0 0 0 1px rgba(255,255,255,0.3);
}
.faq-section {
  background: linear-gradient(135deg, #f8f9f6, #eef1e6);
  border-radius: 18px;
  border: 1px solid rgba(96,108,56,0.35);
  transition: all 0.35s ease;
}

.faq-section:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 30px rgba(0,0,0,0.12);
}
.faq-question {
  background: linear-gradient(135deg, #a3b18a, #b5c99a);
  color: #1f2a24;
  border-radius: 14px;
  font-weight: 500;
}

.faq-question:hover {
  background: linear-gradient(135deg, #d4af37, #c9a227);
  color: #1f2a24;
}

  </style>
</head>
<body>

<!-- Floating Chatbot Button -->
<div id="chat-toggle" class="fixed bottom-6 right-6 z-[1000] flex flex-col items-center cursor-pointer">
  <img src="{{ asset('storage/image/bot1.png') }}" alt="Chatbot" class="w-14 h-14 rounded-full bot-lively">
<span class="bot-text lively-text mt-1 text-sm font-semibold text-white bg-[#636B2F] px-2 py-1 rounded-full shadow-lg opacity-0 pointer-events-none">
  Ask Me!
</span>
</div>

<!-- Chatbot Container -->
<div id="chat-container" class="fixed bottom-20 right-6 w-80 bg-white rounded-2xl shadow-xl hidden flex-col overflow-hidden border border-[#064e3b] animate-[slideUp_0.3s_ease] z-[999]">

  <!-- Header -->
  <div id="chat-header" class="bg-[#064e3b] text-white p-3 flex justify-between items-center rounded-t-2xl">
    <h2 class="text-sm font-semibold">Yah Nursery Chat</h2>
    <div class="flex items-center space-x-2">

      <!-- Sun/Moon Toggle -->
      <label class="relative inline-flex items-center cursor-pointer">
        <input id="toggle" class="sr-only peer" type="checkbox" />
        <div
          class="w-16 h-8 rounded-full bg-gray-200 overflow-hidden relative
                 before:flex before:items-center before:justify-center before:content-['☀️'] before:absolute before:h-7 before:w-7 before:top-1/2 before:bg-white before:rounded-full before:left-0.5 before:-translate-y-1/2 before:transition-all before:duration-500 peer-checked:before:opacity-0 peer-checked:before:rotate-90 peer-checked:before:-translate-y-full
                 after:flex after:items-center after:justify-center after:content-['🌑'] after:absolute after:bg-[#1d1d1d] after:rounded-full after:top-[2px] after:right-0.5 after:translate-y-full after:w-7 after:h-7 after:opacity-0 after:transition-all after:duration-500 peer-checked:after:opacity-100 peer-checked:after:rotate-180 peer-checked:after:translate-y-0
                 shadow-md shadow-gray-400 peer-checked:shadow-md peer-checked:shadow-gray-700 peer-checked:bg-[#383838]">
        </div>
      </label>

      <!-- Clear & Close Buttons -->
      <button id="clear-chat" class="text-white hover:text-gray-200">Clear</button>
      <button id="close-chat" class="text-white hover:text-gray-200">✖</button>
    </div>
  </div>

  <!-- Chat Messages -->
  <div id="chat-box" class="p-3 h-80 overflow-y-auto bg-[#e6f4f1] space-y-2 text-sm text-gray-800"></div>

  <!-- Search -->
<div id="faq-search-container" class="p-3 border-t border-[#064e3b] bg-white">
  <input
    id="faq-search"
    type="text"
    placeholder="Please ask anything…"
    class="w-full border border-gray-300 rounded-full px-4 py-2 text-sm
           focus:outline-none focus:ring-2 focus:ring-[#064e3b]
           placeholder:text-gray-400 placeholder:italic"
  >
</div>


  <!-- FAQ Buttons -->
 <!-- FAQ Buttons (Categorized by Section) -->
<div id="faq-list" class="p-3 border-t border-[#064e3b] bg-white dark:bg-[#1f2937] space-y-4 faq-scroll transition-colors duration-300">

  @php
    // Group FAQs by their section (category)
    $faqsGrouped = \App\Models\FAQ::all()->groupBy('section');
  @endphp

  @foreach($faqsGrouped as $section => $faqs)
    <!-- Section Container -->
    <div class="faq-section border border-[#4b6043] dark:border-[#a3b18a] rounded-xl overflow-hidden transition-all duration-300 bg-[#f5f9f3] dark:bg-[#283618] hover:shadow-md">

      <!-- Section Header (title bar) -->
      <div class="bg-[#d8e2c4] dark:bg-[#606c38] px-4 py-2">
        <h3 class="faq-section-title text-[#283618] dark:text-[#fefae0] font-semibold text-base transition-colors duration-300">
          {{ $section }}
        </h3>
      </div>

      <!-- Question Buttons under each Section -->
      <div class="space-y-2 p-3">
        @foreach($faqs as $faq)
          <button class="faq-question flex justify-start items-center text-left text-[#283618] dark:text-[#fefae0] bg-[#b5c99a] dark:bg-[#606c38] hover:bg-[#a3b18a] dark:hover:bg-[#718355] px-3 py-2 rounded-lg w-full text-sm font-medium transition duration-200">
            {{ $faq->question }}
          </button>
        @endforeach
      </div>

    </div>
  @endforeach

</div>

</div>

<script>
const chatToggle = document.getElementById('chat-toggle');
const chatContainer = document.getElementById('chat-container');
const closeChat = document.getElementById('close-chat');
const clearChat = document.getElementById('clear-chat');
const chatBox = document.getElementById('chat-box');
const faqSearch = document.getElementById('faq-search');
const faqList = document.getElementById('faq-list');
const toggle = document.getElementById('toggle');
const botIcon = "{{ asset('storage/image/bot1.png') }}";
const userProfile = "{{ asset('storage/image/userchatbot.png') }}";

// Check if greeted before
let hasGreeted = localStorage.getItem('hasGreeted') === 'true';

// Add greeting function
function addGreeting() {
  // Check if greeting already exists
  const greetingExists = [...chatBox.querySelectorAll('span')].some(
    el => el.dataset.type === 'bot' && el.innerText.includes("Hi there")
  );

  if (!greetingExists) {
    addMessage("👋 Hi there! Do you have any problem or question I can help with?", "bot");
    localStorage.setItem('hasGreeted', 'true');
  }
}

// Clear Chat Button
clearChat.addEventListener('click', () => {
  // Remove all messages except greeting
  chatBox.innerHTML = '';
  addGreeting(); // ensure greeting is there but not duplicated
});



// Open/Close Chat
chatToggle.addEventListener('click', () => {
  chatContainer.classList.toggle('hidden');
  if (!chatContainer.classList.contains('hidden')) {
    faqSearch.focus();
    addGreeting();
  }
});
closeChat.addEventListener('click', () => chatContainer.classList.add('hidden'));

// Clear Chat Button
clearChat.addEventListener('click', () => {
  chatBox.innerHTML = ''; // remove all messages
  addGreeting(); // re-add greeting
});

// Theme toggle switch
toggle.addEventListener('change', () => applyTheme(toggle.checked));

function applyTheme(isDark) {
  if (isDark) {
    chatContainer.className = 'fixed bottom-20 right-6 w-80 bg-gray-900 rounded-2xl shadow-xl flex-col overflow-hidden border border-gray-700 animate-[slideUp_0.3s_ease] z-[999]';
    chatBox.className = 'p-3 h-80 overflow-y-auto bg-gray-800 space-y-2 text-sm text-gray-100';
    faqSearch.parentElement.className = 'p-3 border-t border-gray-700 bg-gray-900';
    faqList.className = 'p-3 border-t border-gray-700 bg-gray-900 space-y-2 faq-scroll';
  } else {
    chatContainer.className = 'fixed bottom-20 right-6 w-80 bg-white rounded-2xl shadow-xl flex-col overflow-hidden border border-[#064e3b] animate-[slideUp_0.3s_ease] z-[999]';
    chatBox.className = 'p-3 h-80 overflow-y-auto bg-[#e6f4f1] space-y-2 text-sm text-gray-800';
    faqSearch.parentElement.className = 'p-3 border-t border-[#064e3b] bg-white';
    faqList.className = 'p-3 border-t border-[#064e3b] bg-white space-y-2 faq-scroll';
  }

  document.querySelectorAll('#chat-box span').forEach(bubble => {
    if (bubble.dataset.type === 'user') {
      bubble.className = 'px-3 py-2 rounded-2xl inline-block mb-1 bg-green-600 text-white';
    } else {
      bubble.className = isDark
        ? 'px-3 py-2 rounded-2xl inline-block mb-1 bg-gray-700 text-white'
        : 'px-3 py-2 rounded-2xl inline-block mb-1 bg-gray-200 text-gray-800';
    }
  });
}

// Fetch answer from DB only
async function fetchAnswer(question) {
  addMessage(question, 'user');
  const loadingDiv = document.createElement('div');
  loadingDiv.className = 'flex justify-start items-start space-x-2';
  loadingDiv.innerHTML = `<img src="${botIcon}" class="bot-icon"><span class="px-3 py-2 rounded-2xl inline-block mb-1 italic text-gray-500" data-type="bot">Typing...</span>`;
  chatBox.appendChild(loadingDiv);
  chatBox.scrollTop = chatBox.scrollHeight;

  try {
    const res = await fetch('/faq/chat', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      body: JSON.stringify({ message: question })
    });
    const data = await res.json();
    loadingDiv.remove();
    addMessage(data.answer || "Sorry, I couldn’t find an answer for that.", 'bot');
  } catch (e) {
    loadingDiv.remove();
    addMessage("Error retrieving answer.", 'bot');
  }
}

// Add messages dynamically
function addMessage(text, type='user') {
  const div = document.createElement('div');
  div.className = type==='user' ? 'flex justify-end items-start space-x-2' : 'flex justify-start items-start space-x-2';
  const icon = `<img src="${type==='user' ? userProfile : botIcon}" class="${type==='user' ? 'w-6 h-6 rounded-full' : 'bot-icon'}">`;
  const isDark = toggle.checked;
  const bubbleColor = type==='user'
    ? 'bg-green-600 text-white'
    : (isDark ? 'bg-gray-700 text-white' : 'bg-gray-200 text-gray-800');

  div.innerHTML = type==='user'
    ? `<span class="px-3 py-2 rounded-2xl inline-block mb-1 ${bubbleColor}" data-type="user">${text}</span>${icon}`
    : `${icon}<span class="px-3 py-2 rounded-2xl inline-block mb-1 ${bubbleColor}" data-type="bot">${text}</span>`;

  chatBox.appendChild(div);
  chatBox.scrollTop = chatBox.scrollHeight;
}

// FAQ Click
faqList.addEventListener('click', e => {
  if (!e.target.classList.contains('faq-question')) return;
  fetchAnswer(e.target.innerText.trim());
});

// Search
faqSearch.addEventListener('keyup', e => {
  if (e.key === 'Enter' && faqSearch.value.trim()) fetchAnswer(faqSearch.value.trim());
  const query = faqSearch.value.toLowerCase();
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.style.display = btn.innerText.toLowerCase().includes(query) ? 'flex' : 'none';
  });
});
</script>

</body>
</html>
