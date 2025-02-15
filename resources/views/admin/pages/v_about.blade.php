<!--awal konten dinamis-->
@extends('admin/v_admin')
@section('judulhalaman', 'Tentang Aplikasi')
@section('title','Tentang Aplikasi')
    
    <!--awal isi konten dinamis-->
    @section('konten')
        {{-- <img src="{{ asset('template') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        <img src="{{ asset('gambar/photoprofile.jpg') }}" class="img-circle elevation-2" width="160px" height="160px" class="text-center">
        <br>
        <br>
        Aplikasi dibuat oleh
        <p>
        <h2>Agus Suratna Permadi, S.Pd.</h2>
        <p>
        <a href="https://wa.me/6281395115155" target="_blank"><img src="{{ asset('gambar/whatsapp.png') }}" class="img-circle elevation-2" width="40px" height="40px" class="text-center"><b>     081395115155</b></a>
        <p>
        <a href="https://instagram.com/agustheletter" target="_blank"><img src="{{ asset('gambar/instagram.png') }}" class="img-circle elevation-2" width="40px" height="40px" class="text-center"><b>     agustheletter</b></a>
        <p>
        <a href="https://facebook.com/agustheletter" target="_blank"><img src="{{ asset('gambar/facebook.png') }}" class="img-circle elevation-2" width="40px" height="40px" class="text-center"><b>     agustheletter</b></a>
    
    @endsection
    <!--akhir isi konten dinamis-->

<!--akhir konten dinamis-->