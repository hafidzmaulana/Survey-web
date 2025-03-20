@extends('adminlte::page')

@section('title', 'Buat Survei')

@section('content_header')
    <h1>Buat Survei Baru</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('surveis.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Survei</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" required>
                </div>

                <h4>Pertanyaan:</h4>
                <div id="pertanyaan-container">
                    <div class="input-group mb-2">
                        <input type="text" name="pertanyaan[]" class="form-control" required placeholder="Tulis pertanyaan...">
                        <button type="button" class="btn btn-danger remove-btn">Hapus</button>
                    </div>
                </div>

                <button type="button" class="btn btn-primary" id="tambah-pertanyaan">+ Tambah Pertanyaan</button>

                <br><br>
                <button type="submit" class="btn btn-success">Simpan Survei</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('tambah-pertanyaan').addEventListener('click', function() {
            let container = document.getElementById('pertanyaan-container');
            let div = document.createElement('div');
            div.classList.add('input-group', 'mb-2');
            div.innerHTML = `<input type="text" name="pertanyaan[]" class="form-control" required>
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
