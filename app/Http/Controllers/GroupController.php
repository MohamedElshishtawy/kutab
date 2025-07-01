<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Kutab;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the groups.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $kutabId = $request->query('kutab_id');
        $kutabs = Kutab::all();
        $groups = [];
        $currentKutab = null;

        if ($kutabId) {
            $currentKutab = Kutab::findOrFail($kutabId);
            $groups = $currentKutab->groups()->latest()->paginate(10);
        } else {
            $groups = Group::latest()->paginate(10);
        }

        return view('groups.index', compact('groups', 'kutabs', 'currentKutab'));
    }

    /**
     * Show the form for creating a new group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $kutabId = $request->query('kutab_id');
        $kutabs = Kutab::all();

        if ($kutabId) {
            $defaultKutab = Kutab::findOrFail($kutabId);
            return view('groups.create', compact('kutabs', 'defaultKutab'));
        }

        return view('groups.create', compact('kutabs'));
    }

    /**
     * Store a newly created group in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'kutab_id' => 'required|exists:kutabs,id',
            'name' => 'required|string|max:255',
            'for_sex' => 'required|boolean',
            'week_day_id' => 'nullable|exists:week_days,id',
            'hour' => 'nullable|integer|min:0|max:23',
            'minute' => 'nullable|integer|min:0|max:59',
        ]);

        Group::create($request->all());

        return redirect()->route('groups.index', ['kutab_id' => $request->kutab_id])->with('success', 'تم إنشاء المجموعة بنجاح.');
    }

    /**
     * Display the specified group.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\View\View
     */
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified group.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\View\View
     */
    public function edit(Group $group)
    {
        $kutabs = Kutab::all();
        return view('groups.edit', compact('group', 'kutabs'));
    }

    /**
     * Update the specified group in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'kutab_id' => 'required|exists:kutabs,id',
            'name' => 'required|string|max:255',
            'for_sex' => 'required|boolean',
            'week_day_id' => 'nullable|exists:week_days,id',
            'hour' => 'nullable|integer|min:0|max:23',
            'minute' => 'nullable|integer|min:0|max:59',
        ]);

        $group->update($request->all());

        return redirect()->route('groups.index', ['kutab_id' => $group->kutab_id])->with('success', 'تم تحديث بيانات المجموعة بنجاح.');
    }

    /**
     * Remove the specified group from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Group $group)
    {
        $kutabId = $group->kutab_id;
        $group->delete();

        return redirect()->route('groups.index', ['kutab_id' => $kutabId])->with('success', 'تم حذف المجموعة بنجاح.');
    }
}
