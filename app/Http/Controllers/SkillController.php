<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function allSkills()
    {
        $data = Skill::all();
        return view('admin.skills.all_skills', compact('data'));
    }

    public function addSkillPage()
    {

        return view('admin.skills.add_skills');
    }

    public function saveSkill(Request $request, $id = 0)
    {

        if ($id > 0) {
            Skill::findOrFail($id)->update([
                'skill' => $request->skill,
                'percentage' => $request->percentage,
            ]);
        } else {
            Skill::insert([
                'skill' => $request->skill,
                'percentage' => $request->percentage,
                'created_at' => date('Y-m-d')
            ]);
        }
        $notification = array(
            'message' => 'Skill Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.skills')->with($notification);
    }

    public function editSkill($id)
    {
        $data = Skill::findOrFail($id);
        return view('admin.skills.add_skills', compact('data'));
    }

    public function deleteSkill($id)
    {
        Skill::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Skill Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.skills')->with($notification);
    }
}