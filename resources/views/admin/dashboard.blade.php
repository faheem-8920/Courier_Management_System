@extends('admin.masterlayout')
@section('content')
<div class="container mt-5">
  <div class="card shadow-lg border-0 animate__animated animate__fadeInDown">
    <div class="card-body text-center p-5" style="background: linear-gradient(135deg, #6a11cb, #2575fc); border-radius: 15px; color: #fff;">
      <h1 class="fw-bold mb-3 animate__animated animate__fadeInUp">Welcome Back, Admin 👋</h1>
      <p class="fs-5 animate__animated animate__fadeInUp animate__delay-1s">
        Manage users, monitor activities, and control your system from one place.
      </p>
      <a href="/users" class="btn btn-light btn-lg mt-3 animate__animated animate__zoomIn animate__delay-2s">
        Go to Users
      </a>
    </div>
  </div>
</div>














            @endsection