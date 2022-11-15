@extends('layout.master')

@section('title')
    Lihat Prodi
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-md-flex flex-row justify-content-between">
                <h5 class="card-title">Lihat Prodi</h5>
                <div>
                    <a class="btn btn-secondary" href="{{ URL::previous() }}"> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <p><strong>Nama Prodi:</strong> {{ $prodi->nama }}</p>
                <p><strong>Fakultas:</strong>
                    @if ($prodi->fakultas)
                        <a class="text-decoration-none" href="{{ route('fakultas.show', $prodi->fakultas->id) }}">
                            {{ $prodi->fakultas->nama }}
                        </a>
                    @endif
                </p>
                <p><strong>Jumlah Mahasiswa:</strong> {{ $prodi->jml_mhs }}</p>
            </div>
        </div>
        <br>
        <div class="row">
            @if ($mahasiswas)
                <div class="col-lg-6">
                    <div class="card mb-1">
                        <div class="card-header fw-bold">
                            Mahasiswa Prodi {{ $prodi->nama }}
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($mahasiswas as $mahasiswa)
                                <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="text-decoration-none">
                                    <li class="list-group-item">{{ $mahasiswa->nama }}
                                        <br>
                                        <small>{{ $mahasiswa->npm }}</small>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    {!! $mahasiswas->links('pagination::bootstrap-5') !!}
                </div>
            @endif
            <div class="col-lg-6"></div>
        </div>
    </div>
@endsection
