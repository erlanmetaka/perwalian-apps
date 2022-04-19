@extends('template.app')


@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="x_panel"  style="height: 100%;">
      <div class="x_title">
        <h2>Aplikasi Perwalian STMIK</h2>
        <div class="clearfix"></div>
      </div>
      <div class="card text-center">
        <div class="card-body" style="height:800px;">
          
            <img src="{{ asset('assets/images/logo-title.png') }}" alt="..." style="float: left;padding-top:200px">          
            <h5 class="card-title" style="padding-top:200px">Selamat Datang {{ Auth::user()->name; }}</h5>
            <p class="card-text" style="font-size: 14px;">Aplikasi Perwalian STMIK adalah sistem informasi untuk perwalian dengan mahasiswa perwalian secara online </p>
            <a href="#" class="btn btn-primary">Perwalian</a>
         
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection