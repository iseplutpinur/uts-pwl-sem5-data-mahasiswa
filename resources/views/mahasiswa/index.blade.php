@extends('layout.master')

@section('title')
    Data Mahasiswa
@endsection

@section('content')
    <div class="container mt-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">{{ $message }}</div>
        @endif

        <div class="card">
            <div class="card-header d-md-flex flex-row justify-content-between">
                <h5 class="card-title">Data Mahasiswa</h5>
                <div>
                    <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Tambah Mahasiswa</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama<br><small>NPM</small></th>
                            <th>Prodi<br><small>Fakultas</small></th>
                            <th>Tahun Masuk <br> <small>Tahun Keluar</small></th>
                            <th>Jenis Kelamin <br><small>Tanggal Lahir</small></th>
                            <th>Alamat</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswas as $mahasiswa)
                            <tr>
                                <td>{{ $mahasiswa->nama }} <br>
                                    <small><b>{{ $mahasiswa->npm }}</b></small>
                                </td>
                                <td>
                                    @if ($mahasiswa->prodi)
                                        <a class="text-decoration-none"
                                            href="{{ route('prodi.show', $mahasiswa->prodi->id) }}">
                                            {{ $mahasiswa->prodi->nama }}
                                        </a>
                                        @if ($mahasiswa->prodi->fakultas)
                                            <br>
                                            <small>
                                                <b>
                                                    <a class="text-decoration-none"
                                                        href="{{ route('fakultas.show', $mahasiswa->prodi->fakultas->id) }}">
                                                        Fakultas {{ $mahasiswa->prodi->fakultas->nama }}
                                                    </a>
                                                </b>
                                            </small>
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $mahasiswa->thn_masuk }} <br>
                                    <small><b>{{ $mahasiswa->thn_keluar }}</b></small>
                                </td>
                                <td>{{ $mahasiswa->jenis_kelamin }} <br>
                                    <small><b>{{ $mahasiswa->tanggal_lahir }}</b></small>
                                </td>
                                <td>{{ $mahasiswa->alamat }}</td>
                                <td>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="Post">
                                        <a class="btn btn-secondary btn-sm"
                                            href="{{ route('mahasiswa.show', $mahasiswa->id) }}">Lihat</a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Ubah</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $mahasiswas->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
