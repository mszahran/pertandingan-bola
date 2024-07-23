@extends('layouts.app')

@section('title', 'Edit Klub')

@section('content')
    <style>
        select.input-sm {
            line-height: 10px !important;
        }
    </style>
    <div class="row">
        <div class="col-xl-12">
            <form class="form theme-form" method="post" action="{{ $action }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">Klub Sepak Bola</div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label text-end">Nama KLub<span class="text-danger">*</span></label>
                            <div class="col-sm-5">
                                <input autocomplete="off" class="form-control @error('nama_klub') is-invalid @enderror" name="nama_klub" type="text" value="{{ old('nama_klub', $klub->nama_klub) }}" placeholder="Nama Klub" required autofocus>
                                @error('nama_klub')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label text-end">Nama Kota
                                KLub<span class="text-danger">*</span></label>
                            <div class="col-sm-5">
                                <input autocomplete="off" class="form-control @error('nama_kota') is-invalid @enderror" name="nama_kota" type="text" value="{{ old('nama_kota', $klub->kota_klub) }}" placeholder="Nama Kota Klub" required>
                                @error('nama_kota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route("klub.index") }}" class="btn btn-warning">kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
