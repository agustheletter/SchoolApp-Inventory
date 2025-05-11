@extends('admin/v_admin')

@section('judulhalaman', 'Login Barang')
@section('title', 'Barang')

@section('konten')

<div class="d-flex justify-content-center align-items-center vh-50">

    <div class="text-center">
        <h2 class="mb-4">Login Sebagai</h2>
        <a href="{{ route('barang.index') }}" class="btn btn-primary mb-2 w-100">Admin</a>
        <a href="{{ route('barang.user') }}" class="btn btn-secondary w-100">User</a>
    </div>

</div>
@endsection