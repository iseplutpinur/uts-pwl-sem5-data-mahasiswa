@extends('layout.master')

@section('title')
    Ubah Fakultas
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
                <h5 class="card-title">Ubah Fakultas</h5>
                <div>
                    <a class="btn btn-secondary" href="{{ URL::previous() }}"> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST" enctype="multipart/form-data"
                    id="mainform">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Fakultas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{ $fakultas->nama }}"
                                id="nama" required placeholder="Silahkan masukan nama fakultas">
                        </div>
                        <div class="col-12">
                            @error('nama')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary ml-3" form="mainform">Simpan</button>
            </div>
        </div>
    </div>
@endsection
