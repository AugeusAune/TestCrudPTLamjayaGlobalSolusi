<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Status;
use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function index(Ward $wards, Status $statuses, District $districts)
    {

        $data = [
            'title' => 'Kelurahan',
            'wards' => $wards->all(),
            'statuses' => $statuses->all(),
            'districts' => $districts->all()
        ];
        return view('kelurahan', $data);
    }

    public function store(Request $request, Ward $wards)
    {
        $request->validate([
            'name' => ['required'],
            'status' => ['required'],
            'district' => ['required']
        ]);

        $wards->create([
            'code' => 'KL-' . $wards->count() + 1,
            'name' => $request->name,
            'status_id' => $request->status,
            'district_id' => $request->district
        ]);

        return back()->with('success', 'Sukses Menambah Kecamatan');
    }

    public function destroy(Ward $wards)
    {
        $wards->delete();
        return back()->with('success', 'Sukses Hapus Provinsi');
    }


    public function update(Request $request, Ward $wards)
    {
        $request->validate([
            'name' => ['required'],
            'status' => ['required'],
            'district' => ['required']
        ]);

        $wards->update([
            'name' => $request->name,
            'status_id' => $request->status,
            'district_id' => $request->district

        ]);

        return back()->with('success', 'Sukses Mengupdate Provinsi');
    }

}
