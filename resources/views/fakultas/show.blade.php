@extends('layout.master')

@section('title')
    Lihat Fakultas
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-md-flex flex-row justify-content-between">
                <h5 class="card-title">Lihat Fakultas</h5>
                <div>
                    <a class="btn btn-secondary" href="{{ URL::previous() }}"> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <p><strong>Nama Fakultas:</strong> {{ $fakultas->nama }}</p>
                <p><strong>Jumlah Mahasiswa:</strong> {{ $fakultas->jml_mhs }}</p>
            </div>
        </div>
        <br>
        <div class="row">
            @if ($mahasiswas)
                <div class="col-lg-6">
                    <div class="card mb-1">
                        <div class="card-header fw-bold">
                            Mahasiswa Fakultas {{ $fakultas->nama }}
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($mahasiswas as $mahasiswa)
                                <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="text-decoration-none">
                                    <li class="list-group-item">{{ $mahasiswa->nama }}
                                        <br>
                                        <small>{{ $mahasiswa->npm }} | {{ $mahasiswa->prodi->nama }}</small>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    {!! $mahasiswas->appends(array_except(Request::query(), 'mahasiswa'))->links('pagination::bootstrap-5') !!}
                </div>
            @endif
            @if ($prodis)
                <div class="col-lg-6">
                    <div class="card mb-1">
                        <div class="card-header fw-bold">
                            Prodi Fakultas {{ $fakultas->nama }}
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($prodis as $prodi)
                                <a href="{{ route('prodi.show', $prodi->id) }}" class="text-decoration-none">
                                    <li class="list-group-item">{{ $prodi->nama }} <br>
                                        <small>{{ $prodi->jml_mhs }} Mahasiswa</small>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    {!! $prodis->appends(array_except(Request::query(), 'prodi'))->links('pagination::bootstrap-5') !!}
                </div>
            @endif
            <div class="col-lg-6"></div>
        </div>
    </div>
@endsection
