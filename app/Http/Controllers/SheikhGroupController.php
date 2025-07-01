<?php

namespace App\Http\Controllers;

use App\Models\Sheikh;
use App\Models\Group;
use App\Models\SheikhGroup;
use Illuminate\Http\Request;

class SheikhGroupController extends Controller
{
    /**
     * Remove the sheikh from the specified group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'sheikh_id' => 'required|exists:sheikhs,id',
            'group_id' => 'required|exists:groups,id',
        ]);

        $sheikh = Sheikh::findOrFail($request->sheikh_id);
        $sheikhGroup = SheikhGroup::where('sheikh_id', $sheikh->id)
            ->where('group_id', $request->group_id)
            ->first();

        if (!$sheikhGroup) {
            return redirect()->back()->with('error', 'الشيخ غير موجود في هذه المجموعة.');
        }

        $sheikhGroup->delete();

        return redirect()->back()->with('success', 'تمت إزالة الشيخ من المجموعة بنجاح.');
    }
}
