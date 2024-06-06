<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        return view('Admin.FAQ.index', compact('faqs'));
    }

    public function create()
    {
        return view('Admin.FAQ.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        FAQ::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('faq.index')
            ->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(FAQ $faq)
    {
        return view('Admin.FAQ.edit', compact('faq'));
    }

    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'pertanyaan' => 'required|unique:faqs,pertanyaan,' . $faq->id,
            'jawaban' => 'required|unique:faqs,jawaban,' . $faq->id,
        ]);

        $faq->update($request->all());

        return redirect()->route('faq.index')
            ->with('success', 'FAQ berhasil diperbarui.');
    }


    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return redirect()->route('faq.index')
            ->with('success', 'FAQ berhasil dihapus.');
    }

    public function showFAQs()
    {
        $faqs = FAQ::all();
        return view('Pasien.FAQ.show', compact('faqs'));
    }
}
