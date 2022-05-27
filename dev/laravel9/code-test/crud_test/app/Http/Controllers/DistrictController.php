<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Status;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(District $districts, Status $statuses)
    {

        $data = [
            'title' => 'Kecamatan',
            'districts' => $districts->all(),
            'statuses' => $statuses->all()
        ];
        return view('kecamatan', $data);
    }

    public function store(Request $request, District $district)
    {
        $request->validate([
            'name' => ['required'],
            'status' => ['required']
        ]);

        $district->create([
            'code' => 'KC-' . $district->count() + 1,
            'name' => $request->name,
            'status_id' => $request->status
        ]);

        return back()->with('success', 'Sukses Menambah Kecamatan');
    }


    public function destroy(District $districts)
    {
        $districts->delete();
        return back()->with('success', 'Sukses Hapus Kecamatan');
    }

    public function update(Request $request, District $districts)
    {
        $request->validate([
            'name' => ['required'],
            'status' => ['required']
        ]);

        $districts->update([
            'name' => $request->name,
            'status_id' => $request->status
        ]);

        return back()->with('success', 'Sukses Mengupdate Kecamatan');
    }

}
