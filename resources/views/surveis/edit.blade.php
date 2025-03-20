@extends('adminlte::page')

@section('title', 'Edit Survei')

@section('content_header')
    <h1>Edit Survei</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('surveis.update', $survei->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Survei</label>
                    <input type="text" name="nama" class="form-control" value="{{ $survei->nama }}" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control">{{ $survei->deskripsi }}</textarea>
                </div>

                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" value="{{ $survei->tanggal_mulai }}" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" value="{{ $survei->tanggal_selesai }}" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('surveis.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
