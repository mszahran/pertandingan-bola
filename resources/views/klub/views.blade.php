@extends('layouts.app')

@section('title', 'Klub')

@section('content')
    <style>
        select.input-sm {
            line-height: 10px !important;
        }
    </style>
    <div class="row">
        <div class="col-xl-12">
            <!-- Notifikasi menggunakan flash session data -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="pb-3">
                <a href="{{ route('klub.create') }}" class="btn btn-primary">Tambah</a>
                <a href="{{ route("home") }}" class="btn btn-warning">kembali</a>
            </div>
            <div class="card">
                <div class="card-header">Klub Sepak Bola</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped" id="table">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Klub</th>
                            <th class="text-center">Nama Kota</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no = 1)
                        @foreach($dataKlub AS $klub)
                            <tr>
                                <td class="text-center">{{ $no }}</td>
                                <td>{{ $klub->nama_klub }}</td>
                                <td>{{ $klub->kota_klub }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('klub.destroy', $klub->id) }}" method="POST">
                                        <a href="{{ route('klub.edit', $klub->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            @php($no++)
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endsection
