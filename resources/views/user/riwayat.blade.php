<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="/img/Logo-only.png">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="bootstrap-5.1.1-dist\css\bootstrap.min.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="bootstrap-5.1.1-dist\js\bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/riwayat.css" />
   <link rel="stylesheet" href="/css/nav.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
      integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>{{ $title }}</title>
  </head>
  <body>
    <nav>
      <div id="logo">
        <img src="/img/navbar-logo.png" alt="" height="68px" width="68px" />
        <h1 class="new">MILEA</h1>
      </div>
      <ul id="pages">
        <li>
          <a href="/beranda" class="selected">Beranda</a>
        </li>
        <li>
          <a href="/daftar-kegiatan" >Pelatihan</a>
        </li>
        <li>
          <a href="/kelasku" >Kelasku</a>
        </li>
      </ul>
      <img
        src="/img/navbar-toggle-black.png"
        alt=""
        id="toogle-white"
        width="50px"
        height="50px"
        class="dropdown-toggle"
      />
      <img
        src="/img/navbar-toggle-black.png"
        alt=""
        id="toogle-black"
        width="50px"
        height="50px"
        class="dropdown-toggle"
      />
      <ul id="dropdown">
        <img id="addition" src="/img/dropdown-addition.png" alt="" />
        <ul id="pages-dropdown">
          <li>
            <a href="/beranda">
              <span class="material-icons-round">home</span>
              <p>Beranda</p>
            </a>
          </li>
          <li>
            <a href="/daftar-kegiatan">
              <span class="material-icons-round">list</span>
              <p>Pelatihan</p>
            </a>
          </li>
          <li>
        </ul>
        <a href="/data-profil">
          <img src="../../assets/navbar-profile.png" alt="" width="19px" height="19px" />
          <span class="material-icons-round">account_box</span>
          <li>Profil</li>
        </a>
        <a href="/riwayat">
          <img src="../../assets/navbar-history.png" alt="" width="19px" height="19px" />
          <span class="material-icons-round selected">history</span>
          <li>Riwayat</li>
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="route('logout')" id="sign-out" onclick="event.preventDefault();
          this.closest('form').submit();">
            <img src="/img/navbar-signout.png" alt="" width="19px" height="19px" />
            <span class="material-icons-round">logout</span>
          <li>Keluar</li>
        </a></form>
      </ul>
  </nav>

    <div class="main-content">
      <div class="container">
        <?php $i = 0 ?>
        
        <h2>Riwayat Pelatihan</h2>
        @if($count==0)
        <div class="alert alert-danger" role="alert">
          Anda belum mendaftar pelatihan, pilih pelatihan <a href="/daftar-kegiatan" style="text-decoration: underline">disini</a>
        </div>
        @else
        <table class="table table-responsive table-borderless">
          <thead>
            <tr style="color: white;">
              <th scope="col">No</th>
              <th scope="col">Nama Pelatihan</th>
              <th scope="col">Waktu Pelaksanaan</th>
              <th scope="col">Tempat Pelaksanaan</th>
              <th scope="col">Status</th>
              <th scope="col">Catatan</th>
            </tr>
          </thead>
          <?php $i=0;?>
          <tbody>
            
            @foreach($riwayat_user as $riwayat)
            <tr>
              <td scope="row"><?= $riwayat_user->firstItem() + $i++ ?></td>
              <td>{{ $riwayat->title}}</td>
              <td>{{ tgl_indo($riwayat->open_ws) }} - {{ tgl_indo($riwayat->close_ws) }}</td>
              <td>{{ $riwayat->place }}</td>
              <td>{{ $riwayat->status_p}}</td>
              <td><button type="button" class="btn btn-sm btn-outline-secondary" data-placement="top" data-toggle="popover" title="Catatan" data-content="{{ $riwayat->message }}">Catatan</button></td>
            </tr>
            @endforeach
            @endif
            {{-- @else
            <tr>
              <div class="alert alert-danger" role="alert">
                Anda belum mendaftar pelatihan, pilih pelatihan <a href="/daftar-kegiatan" style="text-decoration: underline">disini</a>
              </div>
            </tr> --}}
              
              
            </tbody>
        </table>
        <div class="d-flex justify-content-center" id="links"> {{ $riwayat_user->links() }} </div>
      </div>
    </div>

    <!-- Footer -->
        <footer>
      <div class="row">
        <div class="col">
          <p><b>Tentang Kami</b></p>
          <p>RSUD Siti Fatimah merupakan Rumah Sakit Umum Daerah milik Provinsi Sumatera Selatan. Rumah Sakit milik pemerintah daerah terbesar di Indonesia ini berdiri di atas lahan seluas 4,1 Hektar dengan area bangunan seluas 52,952,11 m2.<br> <br> Lahir sebagai bukti dari keseriusan pemerintah daerah untuk meningkatkan derajat kesehatan masyarakat khususnya di wilayah Provinsi Sumatera Selatan (Sumsel).</p>
        </div>
        <div class="col px-sm-5" style="min-width: 200px; margin-bottom:15px">
          <p class=""><b>Navigasi</b></p>
            <a href="">Beranda</a>
            <br><br>
            <a href="">Pelatihan</a>
            <br><br>
            <a href="">Profil</a>
            <br><br>
            <a href="">Riwayat</a>
            <br><br>
            <a href="">Kelasku</a>
        </div>
        <div class="col">
          <p><b>Hubungi Kami</b></p>
          <div class="col">
            <div class="row flex-nowrap">
              <div class="col flex-grow-0 p-0">
                <img src="../../assets/footer-icons/Phone.png" alt="" style="min-width:21px">
              </div>
              <div class="col">
                <a href="">+628117117929</a>
              </div>
            </div>
            <br>
            <div class="row flex-nowrap">
              <div class="col flex-grow-0 p-0">
                <img src="../../assets/footer-icons/Gmail.png" alt="" style="min-width:18px">
              </div>
              <div class="col">
                <a href="">
                    sdm.rsudsumsel@gmail.com
                </a>
              </div>
            </div>
            <br>
            <div class="row flex-nowrap">
              <div class="col flex-grow-0 p-0">
                <img src="../../assets/footer-icons/Location.png" alt="" style="min-width:18px">
              </div>
              <div class="col">
                <a href="">
                    Jl. Kol. H. Burlian, Suka Bangun, Kec. Sukarami, Kota Palembang, Sumatera Selatan 30151
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr style="background-color:white">
      <div class="row" style="margin-top: 15px">
        <div class="col">
          <p class="text-center">IT Team RSUD SF Kampus Merdeka 2021</p>
        </div>
      </div>
    </footer>

    <script src="/js/utility.js"></script>
    <script>

$(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>

    <script src="utility.js"></script>
    <?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tahun
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tanggal
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
@include('sweetalert::alert')
  </body>
</html>
