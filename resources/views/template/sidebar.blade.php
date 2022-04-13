
 <!-- menu profile quick info -->
 <div class="profile clearfix">
    <div class="profile_pic">
      <img src="assets/images/user.png" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>{{ Auth::user()->name }}</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />
  <!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a href="/home"><i class="fa fa-home"></i> Home</a>
        </li>
        <li><a><i class="fa fa-edit"></i> Perwalian <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="/dosen_wali">Data Dosen Wali</a></li>
            <li><a href="/perwalian">Perwalian</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-desktop"></i> Data Master <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            {{-- <li><a href="{{ route('register') }}" >Data User</a></li> --}}
            <li><a href="/dosen">Data Dosen</a></li>
            <li><a href="/mahasiswa">Data Mahasiswa</a></li>
          </ul>
        </li>
       
      </ul>
    </div>
   

  </div>
  <!-- /sidebar menu -->