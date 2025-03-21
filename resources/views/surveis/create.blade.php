@extends('adminlte::page')

@section('title', 'Buat Survei')

@section('content_header')
    <h1 class="text-Left">Buat Survei Baru</h1>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('surveis.store') }}" method="POST">
            @csrf
            <div class="mb-3 form-floating">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Survei" required>
                <label for="nama">Nama Survei</label>
            </div>

            <div class="mb-3 form-floating">
                <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi"></textarea>
                <label for="deskripsi">Deskripsi</label>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3 form-floating">
                    <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai" required>
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                </div>
                <div class="col-md-6 mb-3 form-floating">
                    <input type="date" name="tanggal_selesai" class="form-control" id="tanggal_selesai" required>
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                </div>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-success">Simpan Survei</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('tambah-pertanyaan').addEventListener('click', function() {
        let container = document.getElementById('pertanyaan-container');
        let div = document.createElement('div');
        div.classList.add('input-group', 'mb-2');
        div.innerHTML = `<input type="text" name="pertanyaan[]" class="form-control" required placeholder="Tulis pertanyaan...">
                        <button type="button" class="btn btn-danger remove-btn">Hapus</button>`;
        container.appendChild(div);
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-btn')) {
            event.target.parentElement.remove();
        }
    });
</script>
@endsection
