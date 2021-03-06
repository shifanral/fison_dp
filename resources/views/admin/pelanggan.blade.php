@extends('admin.master')
@section('title')
    Data Pelanggan
@endsection
@section('content')
    <table class="table table-light" id="tabel">
        <thead class="thead-light">
            <tr>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Email</th>
            </tr>
        </thead>
        @foreach ($customers as $customer)
        <tbody>
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->email }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection