@extends('layout.master')

@section('title')
    Data Fakultas
@endsection

@section('content')
    <div class="container mt-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">{{ $message }}</div>
        @endif

        <div class="card">
            <div class="card-header d-md-flex flex-row justify-content-between">
                <h3 class="card-title">Data Fakultas</h3>
                <div>
                    <a class="btn btn-success" href="{{ route('fakultas.create') }}"> Tambah Fakultas</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jumlah Mahasiswa</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fakultass as $fakultas)
                            <tr>
                                <td>{{ $fakultas->nama }}</td>
                                <td>{{ $fakultas->jml_mhs }}</td>
                                <td>
                                    <form action="{{ route('fakultas.destroy', $fakultas->id) }}" method="Post">
                                        <a class="btn btn-secondary btn-sm"
                                            href="{{ route('fakultas.show', $fakultas->id) }}">Lihat</a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('fakultas.edit', $fakultas->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm"onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $fakultass->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
