<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $question = $request->message;

        // 1️⃣ Check FAQ database first
        $faq = FAQ::where('question', 'LIKE', "%{$question}%")->first();

        if ($faq) {
            return response()->json([
                'answer' => $faq->answer,
                'source' => 'faq'
            ]);
        }

        // 2️⃣ If not found → send to AI
        $aiAnswer = $this->askAI($question);

        return response()->json([
            'answer' => $aiAnswer,
            'source' => 'ai'
        ]);
    }

    private function askAI($question)
    {
        $response = Http::withToken(env('OPENAI_API_KEY'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a professional assistant for Yah Nursery & Landscape. Answer politely, clearly, and concisely. Focus on plants, gardening, orders, delivery, and nursery care.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $question
                    ]
                ],
                'temperature' => 0.4
            ]);

        return $response['choices'][0]['message']['content'] ?? 'Sorry, I could not process that right now.';
    }
}
