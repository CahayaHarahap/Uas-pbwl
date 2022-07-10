@extends('layouts.dashboard')

@section('content')
<div class="container" style="padding-top: 40px; padding-bottom:40px; min-height: 600px">
    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <div class="card-title"><h5>Data Pengguna</h5></div>
                <a href="{{ route('user.create') }}">
                    <button class="btn btn-sm btn-success">Tambah</button>
                </a>
                <p></p>
                <table class="table table-striped">
                    <tr>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @if ($item->role == 0) 
                                <span class="badge bg-primary">
                                    Admin
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    Pelanggan
                                </span>
                            @endif
                        </td>
                        <td>
                            @if ($item->user_aktif == 0) 
                                <span class="badge bg-secondary">
                                    Tidak Aktif
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    Aktif
                                </span>
                            @endif
                        </td>
                        <td style="width: 25%">
                            <a href="{{ route('user.edit', $item->id) }}">
                                <button class="btn btn-sm btn-warning">Edit</button>
                            </a>
                            <form method="POST" style="display: inline" action="{{ route('user') }}">
                                @csrf @method('POST')
                                <input type="text" name="id" value="{{ $item->id }}" style="display:none">
                                <button class="btn btn-sm btn-danger" name="hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </p>
        </div>
    </div>
</div>
@endsection