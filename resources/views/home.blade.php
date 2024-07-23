@extends('layouts.app')

@section('title', 'klasemen')

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
                <a href="{{ route('klub.index') }}" class="btn btn-primary">Tambah Klub</a>
                <a href="{{ route('skor.index') }}" class="btn btn-primary">Tambah Skor Pertandingan</a>
                <a href="{{ route('skor-multiple.index') }}" class="btn btn-primary">Tambah Multi Skor Pertandingan</a>
            </div>
            <div class="card">
                <div class="card-header">Klasemen Sepak Bola</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped" id="table">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Klub</th>
                            <th class="text-center">Ma</th>
                            <th class="text-center">Me</th>
                            <th class="text-center">S</th>
                            <th class="text-center">K</th>
                            <th class="text-center">GM</th>
                            <th class="text-center">GK</th>
                            <th class="text-center">Point</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no = 1)
                        @foreach($dataKlasemen AS $klasemen)
                            <tr>
                                <td class="text-center">{{ $no }}</td>
                                <td>{{ $klasemen->klub->nama_klub }}</td>
                                <td>{{ $klasemen->bertanding }}</td>
                                <td>{{ $klasemen->menang }}</td>
                                <td>{{ $klasemen->draw }}</td>
                                <td>{{ $klasemen->kalah }}</td>
                                <td>{{ $klasemen->jumlah_goal }}</td>
                                <td>{{ $klasemen->jumlah_kebobolan }}</td>
                                <td>{{ $klasemen->point }}</td>
                            </tr>
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
