@extends('layout.master')

@section('title')
    Ubah Mahasiswa
@endsection

@section('content')
    <div class="container mt-4">
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header d-md-flex flex-row justify-content-between">
                <h5 class="card-title">Ubah Mahasiswa</h5>
                <div>
                    <a class="btn btn-secondary" href="{{ URL::previous() }}"> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data"
                    id="mainform">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="npm" class="col-sm-2 col-form-label">Nomor Pokok Mahasiswa</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control"
                                value="{{ old('npm') ?? $mahasiswa->npm }}"name="npm" id="npm" required
                                placeholder="Silahkan masukan Nomor Pokok Mahasiswa">
                        </div>
                    </div>
                    @error('npm')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <div class="row mb-3">
                        <label for="prodi_id" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <select class="form-control"
                                value="{{ old('prodi_id') ?? $mahasiswa->prodi_id }}"name="prodi_id" id="prodi_id"
                                required>
                                <option value="">Pilih Prodi</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}"
                                        {{ (old('prodi_id') ?? $mahasiswa->prodi_id) == $prodi->id ? 'selected' : '' }}>
                                        {{ $prodi->nama }}
                                        {{ $prodi->fakultas ? "| Fakultas {$prodi->fakultas->nama}" : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('prodi_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                value="{{ old('nama') ?? $mahasiswa->nama }}"name="nama" id="nama" required
                                placeholder="Silahkan masukan nama mahasiswa">
                        </div>
                    </div>
                    @error('nama')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <div class="row mb-3">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control"
                                value="{{ old('tanggal_lahir') ?? $mahasiswa->tanggal_lahir }}"name="tanggal_lahir"
                                id="tanggal_lahir" required>
                        </div>
                    </div>
                    @error('tanggal_lahir')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki"
                                    {{ (old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan"
                                    {{ (old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>
                    </div>
                    @error('jenis_kelamin')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror


                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                        <div class="col-sm-10">
                            <textarea type="number" class="form-control" name="alamat" id="alamat" required
                                placeholder="Silahkan masukan alamat mahasiswa">{{ old('alamat') ?? $mahasiswa->alamat }}</textarea>
                        </div>
                    </div>
                    @error('thn_masuk')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <div class="row mb-3">
                        <label for="thn_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
                        <div class="col-sm-10">
                            <input type="number" min="2000" max="{{ date('Y') }}" class="form-control"
                                value="{{ old('thn_masuk') ?? $mahasiswa->thn_masuk }}"name="thn_masuk" id="thn_masuk"
                                required placeholder="Silahkan masukan tahun masuk mahasiswa">
                        </div>
                    </div>
                    @error('thn_masuk')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <div class="row mb-3">
                        <label for="thn_keluar" class="col-sm-2 col-form-label">Tahun Keluar/Lulus</label>
                        <div class="col-sm-10">
                            <input type="number" min="2000" max="{{ date('Y') }}" class="form-control"
                                value="{{ old('thn_keluar') ?? $mahasiswa->thn_keluar }}"name="thn_keluar" id="thn_keluar"
                                placeholder="Silahkan masukan tahun Keluar/Lulus mahasiswa">
                        </div>
                    </div>
                    @error('thn_keluar')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary ml-3" form="mainform">Simpan</button>
            </div>
        </div>
    </div>
@endsection
