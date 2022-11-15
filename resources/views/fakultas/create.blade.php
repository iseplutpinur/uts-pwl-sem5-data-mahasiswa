@extends('layout.master')

@section('title')
    Tambah Fakultas
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Tambah Fakultas</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('fakultas.index') }}"> Kembali</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('fakultas.store') }}" method="POST" enctype="multipart/form-data">
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
                <button type="submit" class="btn btn-primary ml-3">Simpan</button>
            </div>
        </form>
    </div>
@endsection
