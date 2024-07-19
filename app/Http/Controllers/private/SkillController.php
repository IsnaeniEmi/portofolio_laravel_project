<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkillModel;
use App\Models\FooterModel;

class SkillController extends Controller
{
    public function getById($id)
    {
        return SkillModel::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return SkillModel::paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_skill' => 'required|string|max:255',
            'tingkat_kemahiran' => 'required|string|max:255',
        ]);

        $skill = new SkillModel();
        $skill->nama_skill = $request->nama_skill;
        $skill->tingkat_kemahiran = $request->tingkat_kemahiran;
        $skill->save();

        return redirect()->route('admin_profile')->with('success', 'Data Skill berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $footer = FooterModel::first();
        $skill = $this->getById($id);

        return view('pages.private.update_skill', compact('skill', 'footer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_skill' => 'required|string|max:255',
            'tingkat_kemahiran' => 'required|string|max:255',
        ]);

        $skill = SkillModel::find($id);
        $skill->nama_skill = $request->nama_skill;
        $skill->tingkat_kemahiran = $request->tingkat_kemahiran;

        $skill->save();

        return redirect()->route('admin_profile')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        SkillModel::where('id', $id)->delete();

        return redirect()->route('admin_profile');
    }
}
