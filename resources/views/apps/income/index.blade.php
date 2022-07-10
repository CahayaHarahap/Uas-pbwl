@extends('layouts.dashboard')

@section('content')
<div class="container" style="padding-top: 40px;min-height: 550px">
    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <div class="card-title">
                    <h5>Data Pemasukan</h5>
                </div>
                <a href="{{ route('income.create') }}">
                    <button class="btn btn-sm btn-success">Tambah</button>
                </a>
                <p></p>
                <table class="table table-stripped">
                    <tr>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($income as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ number_format($item->total) }}</td>                        
                        <td style="width: 25%">
                        <a href="{{ route('income.edit', $item->id) }}">
                            <button class="btn btn-sm btn-warning">Edit</button>
                        </a>
                        <form method="POST" style="display: inline" action="{{ route('income') }}">
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