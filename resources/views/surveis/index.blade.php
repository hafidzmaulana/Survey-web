@extends('adminlte::page')

@section('title', 'Daftar Survei')

@section('content_header')
    <h1 class="h4">Daftar Survei</h1>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('surveis.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Buat Survei
        </a>
        <input type="text" id="searchBox" class="form-control form-control-sm w-25" placeholder="Cari survei...">
    </div>

    <div class="card">
        <div class="card-body p-2">
            <table class="table table-hover table-sm" id="surveyTable">
                <thead class="table-light">
                    <tr>
                        <th style="width: 40%;">Nama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveis as $survei)
                        <tr>
                            <td>{{ $survei->nama }}</td>
                            <td>{{ $survei->tanggal_mulai }}</td>
                            <td>{{ $survei->tanggal_selesai }}</td>
                            <td>
                                <span class="badge {{ $survei->status == 'Selesai' ? 'bg-danger' : 'bg-success' }}">
                                    {{ $survei->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('surveis.edit', $survei->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('surveis.destroy', $survei->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script>
        document.getElementById('searchBox').addEventListener('keyup', function () {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("#surveyTable tbody tr");

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(value) ? "" : "none";
            });
        });
    </script>
@endsection
