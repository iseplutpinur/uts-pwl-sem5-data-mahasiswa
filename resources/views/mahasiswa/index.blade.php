@extends('layout.master')

@section('title')
    Data Mahasiswa
@endsection

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <h2>Data Mahasiswa</h2>
            <div>
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Tambah mahasiswa</a>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
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
                                <a class="text-decoration-none" href="{{ route('prodi.show', $mahasiswa->prodi->id) }}">
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
                                <a class="btn btn-primary" href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $mahasiswas->links('pagination::bootstrap-5') !!}
    </div>
@endsection
