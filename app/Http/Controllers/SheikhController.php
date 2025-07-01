<?php

namespace App\Http\Controllers;

use App\Http\Requests\SheikhCreateRequest;
use App\Http\Requests\SheikhUpdateRequest;
use App\Models\Group;
use App\Models\Sheikh;
use App\Models\SheikhGroup;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class SheikhController extends Controller
{
    /**
     * Display a listing of the sheikhs, optionally filtered by group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $groupId = $request->query('group_id');
        $groups = Group::all();
        $sheikhs = [];
        $currentGroup = null;

        if ($groupId) {
            $currentGroup = Group::findOrFail($groupId);
            $sheikhs = $currentGroup->sheikhs()->latest()->paginate(10);
        } else {
            $sheikhs = Sheikh::latest()->paginate(10);
        }

        return view('sheikhs.index', compact('sheikhs', 'groups', 'currentGroup'));
    }

    /**
     * Show the form for creating a new sheikh.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $groupId = $request->query('group_id');
        $groups = Group::all();

        if ($groupId) {
            $defaultGroup = Group::findOrFail($groupId);
            return view('sheikhs.create', compact('groups', 'defaultGroup'));
        }

        return view('sheikhs.create', compact('groups'));
    }

    /**
     * Store a newly created sheikh in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SheikhCreateRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? null,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'sex' => $request->sex
        ]);

        $sheikh = $user->sheikh()->create();

        if ($request->has('groups')) {
            foreach ($request->groups as $groupId) {
                SheikhGroup::create([
                    'sheikh_id' => $sheikh->id,
                    'group_id' => $groupId,
                ]);
            }
        }

        return redirect()->route('sheikhs.index', ['group_id' => $request->input('groups.0')])->with('success', 'تم إضافة الشيخ بنجاح.');
    }

    /**
     * Display the specified sheikh.
     *
     * @param  \App\Models\Sheikh  $sheikh
     * @return \Illuminate\View\View
     */
    public function show(Sheikh $sheikh)
    {
        return view('sheikhs.show', compact('sheikh'));
    }

    /**
     * Show the form for editing the specified sheikh.
     *
     * @param  \App\Models\Sheikh  $sheikh
     * @return \Illuminate\View\View
     */
    public function edit(Sheikh $sheikh)
    {
        $groups = Group::all();
        return view('sheikhs.edit', compact('sheikh', 'groups'));
    }

    /**
     * Update the specified sheikh in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sheikh  $sheikh
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SheikhUpdateRequest $request, Sheikh $sheikh)
    {
        $user = $sheikh->user;

        $user->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? null,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'sex' => $request->sex
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $sheikhGroups = $sheikh->groups;
$requestGroups = $request->groups ?? [];
if (empty($requestGroups)) {
    $requestGroups = [];
}
$groupsToDetach = $sheikhGroups->whereNotIn('id', $requestGroups);
$groupsToAttach = Group::whereIn('id', $requestGroups)->get();
        // Detach groups that are not in the request
        foreach ($groupsToAttach as $group) {
            if (!$sheikh->groups()->where('group_id', $group->id)->exists()) {
                SheikhGroup::create([
                    'sheikh_id' => $sheikh->id,
                    'group_id' => $group->id,
                ]);
            }
        }

        // Detach groups that are not in the request
        foreach ($groupsToDetach as $group) {
            SheikhGroup::where([
                'sheikh_id' => $sheikh->id,
                'group_id' => $group->id,
            ])->delete();
        }

        return redirect()->route('sheikhs.index', ['group_id' => $request->input('groups.0')])->with('success', 'تم تحديث بيانات الشيخ بنجاح.');
    }

    /**
     * Remove the specified sheikh from storage.
     *
     * @param  \App\Models\Sheikh  $sheikh
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Sheikh $sheikh)
    {
        $groupId = $sheikh->groups()->first()->id ?? null; // Get a group ID for redirect
        $sheikh->groups()->detach();
        $sheikh->delete();

        return redirect()->route('sheikhs.index', ['group_id' => $groupId])->with('success', 'تم حذف الشيخ بنجاح.');
    }
}
