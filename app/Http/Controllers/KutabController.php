<?php

namespace App\Http\Controllers;

use App\Models\Kutab;
use Illuminate\Http\Request;

class KutabController extends Controller
{
    /**
     * Display a listing of the kutabs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $superSheikh = auth()->user()->superSheikh;
        $kutabs = $superSheikh->kutabs;
        return view('kutabs.index', compact('kutabs'));
    }

    /**
     * Show the form for creating a new kutab.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('kutabs.create');
    }

    /**
     * Store a newly created kutab in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Kutab::create([
            'name' => $request->name,
            'super_sheikh_id' => auth()->user()->superSheikh->id
        ]);

        return redirect()->route('kutab.index')->with('success', 'تم إنشاء الكُتَّاب بنجاح.');
    }

    /**
     * Display the specified kutab.
     *
     * @param  \App\Models\Kutab  $kutab
     * @return \Illuminate\View\View
     */
    public function show(Kutab $kutab)
    {
        return view('kutabs.show', compact('kutab'));
    }

    /**
     * Show the form for editing the specified kutab.
     *
     * @param  \App\Models\Kutab  $kutab
     * @return \Illuminate\View\View
     */
    public function edit(Kutab $kutab)
    {
        return view('kutabs.edit', compact('kutab'));
    }

    /**
     * Update the specified kutab in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kutab  $kutab
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Kutab $kutab)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $kutab->update($request->all());

        return redirect()->route('kutab.index')->with('success', 'تم تحديث بيانات الكُتَّاب بنجاح.');
    }

    /**
     * Remove the specified kutab from storage.
     *
     * @param  \App\Models\Kutab  $kutab
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Kutab $kutab)
    {
        $kutab->delete();

        return redirect()->route('kutab.index')->with('success', 'تم حذف الكُتَّاب بنجاح.');
    }
}
