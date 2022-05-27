<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Employee;
use App\Models\Gender;
use App\Models\Province;
use App\Models\Religion;
use App\Models\Ward;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Employee $employees, Religion $religions, Gender $genders, Province $provinces, District $districts, Ward $wards) {
        $data = [
            'title' => 'Pegawai',
            'employees' => $employees->with('province', 'ward', 'district', 'gender', 'religion')->get(),
            'religions' => $religions->all(),
            'genders' => $genders->all(),
            'provinces' => $provinces->all(),
            'districts' => $districts->all(),
            'wards' => $wards->all(),
        ];
        return view('index', $data);
    }

    public function store(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => ['required'],
            'placeofbirth' => ['required'],
            'dateofbirth' => ['required'],
            'religion' => ['required'],
            'gender' => ['required'],
            'address' => ['required'],
            'ward' => ['required'],
            'district' => ['required'],
            'province' => ['required'],
        ]);

        $employee->create([
            'name' => $request->name,
            'placeofbirth' => $request->placeofbirth,
            'dateofbirth' => $request->dateofbirth,
            'religion_id' => $request->religion,
            'gender_id' => $request->gender,
            'address' => $request->address,
            'ward_id' => $request->ward,
            'district_id' => $request->district,
            'province_id' => $request->province,
        ]);

        return back()->with('success', 'Sukses Menambah Pegawai');
    }

    public function destroy(Employee $employees)
    {
        $employees->delete();
        return back()->with('success', 'Sukses Hapus Provinsi');
    }

    public function update(Request $request, Employee $employees)
    {
        $request->validate([
            'name' => ['required'],
            'placeofbirth' => ['required'],
            'dateofbirth' => ['required'],
            'religion' => ['required'],
            'gender' => ['required'],
            'address' => ['required'],
            'ward' => ['required'],
            'district' => ['required'],
            'province' => ['required'],
        ]);

        $employees->update([
            'name' => $request->name,
            'placeofbirth' => $request->placeofbirth,
            'dateofbirth' => $request->dateofbirth,
            'religion_id' => $request->religion,
            'gender_id' => $request->gender,
            'address' => $request->address,
            'ward_id' => $request->ward,
            'district_id' => $request->district,
            'province_id' => $request->province,
        ]);

        return back()->with('success', 'Sukses Mengupdate Pegawai');
    }

}
