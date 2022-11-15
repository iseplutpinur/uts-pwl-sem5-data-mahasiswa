@extends('layout.master')

@section('title')
    Lihat Fakultas
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ubah Fakultas</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('fakultas.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fakultas Nama:</strong>
                        <input type="text" name="nama" value="{{ $fakultas->nama }}" class="form-control"
                            placeholder="Fakultas nama" readonly>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
