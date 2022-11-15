@extends('layout.master')

@section('title')
    Lihat Mahasiswa
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-md-flex flex-row justify-content-between">
                <h5 class="card-title">Lihat Mahasiswa</h5>
                <div>
                    <a class="btn btn-secondary" href="{{ URL::previous() }}"> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <p><strong>Nomor Induk Mahasiswa:</strong> {{ $mahasiswa->npm }}</p>
                <p><strong>Mahasiswa Nama:</strong> {{ $mahasiswa->nama }}</p>
                @if ($mahasiswa->prodi)
                    <p><strong>Prodi:</strong>
                        <a class="text-decoration-none" href="{{ route('prodi.show', $mahasiswa->prodi->id) }}">
                            {{ $mahasiswa->prodi->nama }}
                        </a>
                    </p>
                @endif
                @if ($mahasiswa->prodi)
                    @if ($mahasiswa->prodi->fakultas)
                        <p><strong>Fakultas:</strong>
                            <a class="text-decoration-none"
                                href="{{ route('fakultas.show', $mahasiswa->prodi->fakultas->id) }}">
                                {{ $mahasiswa->prodi->fakultas->nama }}
                            </a>
                        </p>
                    @endif
                @endif
                <p><strong>Tahun Masuk:</strong> {{ $mahasiswa->thn_masuk }}</p>
                <p><strong>Tahun Keluar/Lulus:</strong> {{ $mahasiswa->thn_keluar }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $mahasiswa->tanggal_lahir }}</p>
                <p><strong>Jensi Kelamin:</strong> {{ $mahasiswa->jenis_kelamin }}</p>
                <p><strong>Alamat Lengkap:</strong> {{ $mahasiswa->alamat }}</p>
            </div>
        </div>
    </div>
@endsection
