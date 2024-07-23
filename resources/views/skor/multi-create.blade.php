@extends('layouts.app')

@section('title', 'Tambah Skor')

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
                <div class="card">
                    <div class="card-header">Skor Sepak Bola</div>
                    <div class="card-body">
                        <div id="formSkor">
                            <div class="mb-3 row skor-item">
                                <div class="col-xl-6">
                                    <label class="col-sm-3 col-form-label text-end">Klub 1<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="klub_1[]" class="form-control @error('klub_1.*') is-invalid @enderror">
                                            <option value="">Pilih Klub</option>
                                            @foreach($dataKlub as $klub)
                                                <option value="{{ $klub->id }}">{{ $klub->nama_klub }}</option>
                                            @endforeach
                                        </select>
                                        @error('klub_1.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label class="col-sm-3 col-form-label text-end">Klub 2<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="klub_2[]" class="form-control @error('klub_2.*') is-invalid @enderror">
                                            <option value="">Pilih Klub</option>
                                            @foreach($dataKlub as $klub)
                                                <option value="{{ $klub->id }}">{{ $klub->nama_klub }}</option>
                                            @endforeach
                                        </select>
                                        @error('klub_2.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row skor-item">
                                <div class="col-xl-6">
                                    <label class="col-sm-3 col-form-label text-end">Skor 1<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input autocomplete="off" class="form-control @error('skor_1.*') is-invalid @enderror" name="skor_1[]" type="text" value="{{ old('skor_1.*') }}" placeholder="Skor 1" required autofocus>
                                        @error('skor_1.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label class="col-sm-3 col-form-label text-end">Skor 2<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input autocomplete="off" class="form-control @error('skor_2.*') is-invalid @enderror" name="skor_2[]" type="text" value="{{ old('skor_2.*') }}" placeholder="Skor 2" required>
                                        @error('skor_2.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="button" class="btn btn-primary" id="addSkor">Tambah</button>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#addSkor').click(function () {
                var newSkorForm = `
            <div class="mb-3 row skor-item">
                <div class="col-xl-6">
                    <label class="col-sm-3 col-form-label text-end">Klub 1<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select name="klub_1[]" class="form-control @error('klub_1.*') is-invalid @enderror">
                            <option value="">Pilih Klub</option>
                            @foreach($dataKlub as $klub)
                <option value="{{ $klub->id }}">{{ $klub->nama_klub }}</option>
                            @endforeach
                </select>
@error('klub_1.*')
                <div class="invalid-feedback">
{{ $message }}
                </div>
@enderror
                </div>
            </div>
            <div class="col-xl-6">
                <label class="col-sm-3 col-form-label text-end">Klub 2<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <select name="klub_2[]" class="form-control @error('klub_2.*') is-invalid @enderror">
                            <option value="">Pilih Klub</option>
                            @foreach($dataKlub as $klub)
                <option value="{{ $klub->id }}">{{ $klub->nama_klub }}</option>
                            @endforeach
                </select>
@error('klub_2.*')
                <div class="invalid-feedback">
{{ $message }}
                </div>
@enderror
                </div>
            </div>
        </div>
        <div class="mb-3 row skor-item">
            <div class="col-xl-6">
                <label class="col-sm-3 col-form-label text-end">Skor 1<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input autocomplete="off" class="form-control @error('skor_1.*') is-invalid @enderror" name="skor_1[]" type="text" value="{{ old('skor_1.*') }}" placeholder="Skor 1" required autofocus>
                        @error('skor_1.*')
                <div class="invalid-feedback">
{{ $message }}
                </div>
@enderror
                </div>
            </div>
            <div class="col-xl-6">
                <label class="col-sm-3 col-form-label text-end">Skor 2<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input autocomplete="off" class="form-control @error('skor_2.*') is-invalid @enderror" name="skor_2[]" type="text" value="{{ old('skor_2.*') }}" placeholder="Skor 2" required>
                        @error('skor_2.*')
                <div class="invalid-feedback">
{{ $message }}
                </div>
@enderror
                </div>
            </div>
        </div>
`;

                $('#formSkor').append(newSkorForm);
            });
        });
    </script>
@endsection
