@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-2" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mt-5">
        <div class="card-header">
            Kecamatan
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kecamatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('employee.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="nama Pegawai">
                                    @error('name')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="placeofbirth" class="form-label">Tenpat Lahir</label>
                                    <select name="placeofbirth" id="placeofbirth" class="form-control">
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="dateofbirth" class="form-label">Nama Pegawai</label>
                                    <input type="date" class="form-control" id="dateofbirth" name="dateofbirth">
                                    @error('dateofbirth')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="religion" class="form-label">Agama</label>
                                    <select name="religion" id="religion" class="form-control">
                                        @foreach ($religions as $religion)
                                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('religion')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control">
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                    @error('address')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ward" class="form-label">Kelurahan</label>
                                    <select name="ward" id="ward" class="form-control">
                                        @foreach ($wards as $ward)
                                            <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('ward')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="district" class="form-label">Kecamatan</label>
                                    <select name="district" id="district" class="form-control">
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="province" class="form-label">Provinsi</label>
                                    <select name="province" id="province" class="form-control">
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kelurahan</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Provinsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->province->name }}</td>
                            <td>{{ date('d F Y', strtotime($employee->dateofbirth)) }}</td>
                            <td>{{ $employee->gender->name }}</td>
                            <td>{{ $employee->religion->name }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->ward->name }}</td>
                            <td>{{ $employee->district->name }}</td>
                            <td>{{ $employee->province->name }}</td>
                            <td>
                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete-{{ $i }}">Delete</a>
                                <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#edit-{{ $i }}">Update</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="delete-{{ $i }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            Hapus Pegawai {{ $employee->name }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="edit-{{ $i }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama Pegawai</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : $employee->name }}">
                                                @error('name')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="placeofbirth" class="form-label">Tenpat Lahir</label>
                                                <select name="placeofbirth" id="placeofbirth" class="form-control">
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}" {{ $employee->province_id == $province->id ? 'selected' : ''}}>{{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('province')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="dateofbirth" class="form-label">Nama Pegawai</label>
                                                <input type="date" class="form-control" id="dateofbirth"
                                                    name="dateofbirth" value="{{ old('dateofbirth') ? old('dateofbirth') : $employee->dateofbirth }}">
                                                @error('dateofbirth')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="religion" class="form-label">Agama</label>
                                                <select name="religion" id="religion" class="form-control">
                                                    @foreach ($religions as $religion)
                                                        <option value="{{ $religion->id }}" {{ $employee->religion_id == $religion->id ? 'selected' : ''}}>{{ $religion->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('religion')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    @foreach ($genders as $gender)
                                                        <option value="{{ $gender->id }}" {{ $employee->gender_id == $gender->id ? 'selected' : ''}}>{{ $gender->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('gender')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Alamat</label>
                                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') ? old('address') : $employee->address }}">
                                                @error('address')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="ward" class="form-label">Kelurahan</label>
                                                <select name="ward" id="ward" class="form-control">
                                                    @foreach ($wards as $ward)
                                                        <option value="{{ $ward->id }}" {{ $employee->ward_id == $ward->id ? 'selected' : ''}}>{{ $ward->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('ward')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="district" class="form-label">Kecamatan</label>
                                                <select name="district" id="district" class="form-control">
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}" {{ $employee->district_id == $district->id ? 'selected' : ''}}>{{ $district->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('district')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="province" class="form-label">Provinsi</label>
                                                <select name="province" id="province" class="form-control">
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}" {{ $employee->province_id == $province->id ? 'selected' : ''}}>{{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('province')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
