@extends('layout.master')

@section('title')
    Tambah Fakultas
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
                <h3 class="card-title">Tambah Fakultas</h3>
                <div>
                    <a class="btn btn-secondary" href="{{ route('fakultas.index') }}"> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('fakultas.store') }}" method="POST" enctype="multipart/form-data" id="mainform">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Fakultas Nama:</strong>
                                <input type="text" name="nama" class="form-control" placeholder="Fakultas Nama">
                                @error('nama')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
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
