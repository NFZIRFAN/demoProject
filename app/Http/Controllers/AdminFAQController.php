<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class AdminFAQController extends Controller
{
    // ✅ Show all FAQs
    public function index()
    {
        $faqs = FAQ::all();
        return view('admin.faqList', compact('faqs'));
    }

    // ✅ Show Add FAQ form
    public function create()
    {
        return view('admin.addFAQ');
    }

    // ✅ Store new FAQ
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'keywords' => 'nullable|string|max:255',
        ]);

        FAQ::create($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ added successfully!');
    }

    // ✅ Show edit form
    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.editFAQ', compact('faq'));
    }

    // ✅ Update FAQ
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'keywords' => 'nullable|string|max:255',
        ]);

        $faq = FAQ::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully!');
    }

    // ✅ Delete FAQ
    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully!');
    }
}
