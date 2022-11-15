@extends('layout.master')

@section('title')
    Tambah Prodi
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
                <h3 class="card-title">Tambah Prodi</h3>
                <div>
                    <a class="btn btn-secondary" href="{{ URL::previous() }}"> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('prodi.store') }}" method="POST" enctype="multipart/form-data" id="mainform">
                    @csrf
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama" required
                                placeholder="Silahkan masukan nama prodi">
                        </div>
                    </div>
                    @error('nama')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="row mb-3">
                        <label for="fakultas_id" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="fakultas_id" id="fakultas_id" required>
                                <option value="">Pilih Fakultas</option>
                                @foreach ($fakultass as $fakultas)
                                    <option value="{{ $fakultas->id }}">{{ $fakultas->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('fakultas_id')
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
