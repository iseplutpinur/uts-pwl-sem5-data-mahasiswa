@extends('layout.master')

@section('title')
    Data Prodi
@endsection

@section('content')
    <div class="container mt-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">{{ $message }}</div>
        @endif

        <div class="card">
            <div class="card-header d-md-flex flex-row justify-content-between">
                <h5 class="card-title">Data Prodi</h5>
                <div>
                    <a class="btn btn-success" href="{{ route('prodi.create') }}"> Tambah Prodi</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Fakultas</th>
                            <th>Jumlah Mahasiswa</th>
                            <th width="280px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodis as $prodi)
                            <tr>
                                <td>{{ $prodi->nama }}</td>
                                <td>
                                    <a class="text-decoration-none"
                                        href="{{ route('fakultas.show', $prodi->fakultas->id) }}">
                                        {{ $prodi->fakultas->nama }}
                                    </a>
                                </td>
                                <td>{{ $prodi->jml_mhs }}</td>
                                <td>
                                    <form action="{{ route('prodi.destroy', $prodi->id) }}" method="Post">
                                        <a class="btn btn-secondary btn-sm"
                                            href="{{ route('prodi.show', $prodi->id) }}">Lihat</a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('prodi.edit', $prodi->id) }}">Ubah</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm"onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $prodis->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
