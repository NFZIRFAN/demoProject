<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    public function chat(Request $request)
{
    $question = strtolower($request->input('message'));

    $faq = FAQ::query()
        ->whereRaw('LOWER(question) LIKE ?', ["%{$question}%"])
        ->orWhereRaw('LOWER(keywords) LIKE ?', ["%{$question}%"])
        ->first();

    if ($faq) {
        return response()->json(['answer' => $faq->answer]);
    }

    return response()->json([
        'answer' => "Sorry, I couldn’t find an answer for that. Please contact our staff for more help 🌿."
    ]);
}


}
