<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Status;
use Illuminate\Http\Request;

class ProvincesController extends Controller
{
    
    public function index(Province $provinces, Status $statuses) {

        $data = [
            'title' => 'Provinsi',
            'provinces' => $provinces->all(),
            'statuses' => $statuses->all()
        ];
        return view('provinsi', $data);
    }

    public function store(Request $request, Province $province) {
        $request->validate([
            'name' => ['required'],
            'status' => ['required']
        ]);

        $province->create([
            'code' => 'P-' . $province->count() + 1,
            'name' => $request->name,
            'status_id' => $request->status
        ]);

        return back()->with('success', 'Sukses Menambah Provinsi');
    }

    public function destroy(Province $provinces) {
        $provinces->delete();
        return back()->with('success', 'Sukses Hapus Provinsi');
    }


    public function update(Request $request, Province $provinces)
    {
        $request->validate([
            'name' => ['required'],
            'status' => ['required']
        ]);

        $provinces->update([
            'name' => $request->name,
            'status_id' => $request->status
        ]);

        return back()->with('success', 'Sukses Mengupdate Provinsi');
    }

    


}
