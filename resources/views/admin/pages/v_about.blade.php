@extends('admin/v_admin')
@section('judulhalaman', 'Tentang Aplikasi')
@section('title','Tentang Aplikasi')

@section('konten')

<style>
.avatar img {
    object-fit: cover;
    object-position: center; /* Atau 'top' jika ingin fokus ke wajah */
    width: 100%;
    height: 100%;
}
</style>
<div class="container py-4">

    <!-- Student Developers Row -->
    <div class="row justify-content-center g-4 mb-5">
        <!-- Muhammad Zufar -->
        <div class="col-md-5 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                <div class="card-body text-center p-4 d-flex flex-column">
                    <div class="avatar mb-3 mx-auto" style="width: 150px; height: 150px;">
                    <img src="{{ asset('profile/profile.JPG') }}" class="rounded-circle img-thumbnail w-100 h-100 object-fit-cover shadow" alt="Zufar">
                    </div>
                    <h3 class="h5 card-title fw-bold">Muhammad Zufar</h3>
                    <div class="mt-auto">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">Fullstack Web Developer</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Muhammad Rafi -->
        <div class="col-md-5 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                <div class="card-body text-center p-4 d-flex flex-column">
                    <div class="avatar mb-3 mx-auto" style="width: 150px; height: 150px;">
                        <img src="{{ asset('profile/profile.JPG') }}" class="rounded-circle img-thumbnail w-100 h-100 object-fit-cover shadow" alt="Zufar">
                    </div>
                    <h3 class="h5 card-title fw-bold">Muhammad Rafi</h3>
                    <div class="mt-auto">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">Fullstack Web Developer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mentor Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="d-flex flex-column flex-md-row align-items-center">
                        <div class="avatar mb-3 mb-md-0 me-md-4" style="width: 150px; height: 150px;">
                            <img src="{{ asset('gambar/photoprofile.jpg') }}" class="rounded-circle img-thumbnail w-100 h-100 object-fit-cover shadow" alt="Agus">
                        </div>
                        <div class="text-center text-md-start">
                            <h3 class="h4 fw-bold mb-1">Agus Suratna Permadi, S.Pd.</h3>
                            <p class="text-muted mb-3">Guru Pembimbing</p>
                            <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-2 mb-3">
                                <a href="https://wa.me/6281395115155" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3">
                                    <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                </a>
                                <a href="https://instagram.com/agustheletter" target="_blank" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                    <i class="bi bi-instagram me-1"></i> Instagram
                                </a>
                                <a href="https://facebook.com/agustheletter" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    <i class="bi bi-facebook me-1"></i> Facebook
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }
    .transition-all {
        transition: all 0.3s ease;
    }
    .avatar {
        overflow: hidden;
    }
</style>

@endsection