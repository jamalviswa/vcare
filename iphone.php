<!DOCTYPE html>
<html lang="en">
<style> 
.content{width:100%;height:100%;padding-top:40px;padding-right: 25px;padding-left: 25px;top:0;position:absolute;padding-bottom:30px}
.content p{width:100%;font-size:12px;color:#444;;padding:10px;line-height:24px;color:#fff;display:inline-block;padding:10px;margin:3px 0}.parsel{min-width:100%;height:100%;overflow-y:auto;overflow-x:hidden;position:absolute}.parel{min-width:65%;height:100%;overflow-y:auto;overflow-x:hidden;position:absolute}
.panel{-webkit-animation:slideOut .1s ease-in-out .1s backwards;-moz-animation:slideOut .1s ease-in-out .1s backwards;-o-animation:slideOut .1s ease-in-out .1s backwards;-ms-animation:slideOut .1s ease-in-out .1s backwards;animation:slideOut .1s ease-in-out .1s backwardsbackground-color:#f5f5f5;color:#444;min-width:100%;height:100%;overflow-y:auto;overflow-x:hidden;position:absolute;margin-top:-150%;opacity:0;z-index:2;-webkit-transition:opacity .1s ease-in-out;-moz-transition:opacity .1s ease-in-out;-o-transition:opacity .1s ease-in-out;-ms-transition:opacity .1s ease-in-out;transition:opacity .1s ease-in-out}.panel:target{opacity:1;margin-top:0}
.ladda-button{position:relative}.ladda-button .ladda-spinner{position:absolute;z-index:2;display:inline-block;width:32px;height:32px;top:50%;margin-top:0;opacity:0;pointer-events:none}.ladda-button .ladda-label{position:relative;z-index:3}.ladda-button .ladda-progress{position:absolute;width:0;height:100%;left:0;top:0;background:rgba(0,0,0,0.2);visibility:hidden;opacity:0;-webkit-transition:0.1s linear all !important;-moz-transition:0.1s linear all !important;-ms-transition:0.1s linear all !important;-o-transition:0.1s linear all !important;transition:0.1s linear all !important}.ladda-button[data-loading] .ladda-progress{opacity:1;visibility:visible}.ladda-button,.ladda-button .ladda-spinner,.ladda-button .ladda-label{-webkit-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;-moz-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;-ms-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;-o-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important}.ladda-button[data-style=zoom-in],.ladda-button[data-style=zoom-in] .ladda-spinner,.ladda-button[data-style=zoom-in] .ladda-label,.ladda-button[data-style=zoom-out],.ladda-button[data-style=zoom-out] .ladda-spinner,.ladda-button[data-style=zoom-out] .ladda-label{-webkit-transition:0.3s ease all !important;-moz-transition:0.3s ease all !important;-ms-transition:0.3s ease all !important;-o-transition:0.3s ease all !important;transition:0.3s ease all !important}.ladda-button[data-style=expand-right] .ladda-spinner{right:-6px}.ladda-button[data-style=expand-right][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-right][data-size="xs"] .ladda-spinner{right:-12px}.ladda-button[data-style=expand-right][data-loading]{padding-right:56px}.ladda-button[data-style=expand-right][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=expand-right][data-loading][data-size="s"],.ladda-button[data-style=expand-right][data-loading][data-size="xs"]{padding-right:40px}.ladda-button[data-style=expand-left] .ladda-spinner{left:26px}.ladda-button[data-style=expand-left][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-left][data-size="xs"] .ladda-spinner{left:4px}.ladda-button[data-style=expand-left][data-loading]{padding-left:56px}.ladda-button[data-style=expand-left][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=expand-left][data-loading][data-size="s"],.ladda-button[data-style=expand-left][data-loading][data-size="xs"]{padding-left:40px}.ladda-button[data-style=expand-up]{overflow:hidden}.ladda-button[data-style=expand-up] .ladda-spinner{top:-32px;left:50%;margin-left:0}.ladda-button[data-style=expand-up][data-loading]{padding-top:54px}.ladda-button[data-style=expand-up][data-loading] .ladda-spinner{opacity:1;top:26px;margin-top:0}.ladda-button[data-style=expand-up][data-loading][data-size="s"],.ladda-button[data-style=expand-up][data-loading][data-size="xs"]{padding-top:32px}.ladda-button[data-style=expand-up][data-loading][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-up][data-loading][data-size="xs"] .ladda-spinner{top:4px}.ladda-button[data-style=expand-down]{overflow:hidden}.ladda-button[data-style=expand-down] .ladda-spinner{top:62px;left:50%;margin-left:0}.ladda-button[data-style=expand-down][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-down][data-size="xs"] .ladda-spinner{top:40px}.ladda-button[data-style=expand-down][data-loading]{padding-bottom:54px}.ladda-button[data-style=expand-down][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=expand-down][data-loading][data-size="s"],.ladda-button[data-style=expand-down][data-loading][data-size="xs"]{padding-bottom:32px}.ladda-button[data-style=slide-left]{overflow:hidden}.ladda-button[data-style=slide-left] .ladda-label{position:relative}.ladda-button[data-style=slide-left] .ladda-spinner{left:100%;margin-left:0}.ladda-button[data-style=slide-left][data-loading] .ladda-label{opacity:0;left:-100%}.ladda-button[data-style=slide-left][data-loading] .ladda-spinner{opacity:1;left:50%}.ladda-button[data-style=slide-right]{overflow:hidden}.ladda-button[data-style=slide-right] .ladda-label{position:relative}.ladda-button[data-style=slide-right] .ladda-spinner{right:100%;margin-left:0;left:16px}.ladda-button[data-style=slide-right][data-loading] .ladda-label{opacity:0;left:100%}.ladda-button[data-style=slide-right][data-loading] .ladda-spinner{opacity:1;left:50%}.ladda-button[data-style=slide-up]{overflow:hidden}.ladda-button[data-style=slide-up] .ladda-label{position:relative}.ladda-button[data-style=slide-up] .ladda-spinner{left:50%;margin-left:0;margin-top:1em}.ladda-button[data-style=slide-up][data-loading] .ladda-label{opacity:0;top:-1em}.ladda-button[data-style=slide-up][data-loading] .ladda-spinner{opacity:1;margin-top:0}.ladda-button[data-style=slide-down]{overflow:hidden}.ladda-button[data-style=slide-down] .ladda-label{position:relative}.ladda-button[data-style=slide-down] .ladda-spinner{left:50%;margin-left:0;margin-top:-2em}.ladda-button[data-style=slide-down][data-loading] .ladda-label{opacity:0;top:1em}.ladda-button[data-style=slide-down][data-loading] .ladda-spinner{opacity:1;margin-top:0}.ladda-button[data-style=zoom-out]{overflow:hidden}.ladda-button[data-style=zoom-out] .ladda-spinner{left:50%;margin-left:32px;-webkit-transform:scale(2.5);-moz-transform:scale(2.5);-ms-transform:scale(2.5);-o-transform:scale(2.5);transform:scale(2.5)}.ladda-button[data-style=zoom-out] .ladda-label{position:relative;display:inline-block}.ladda-button[data-style=zoom-out][data-loading] .ladda-label{opacity:0;-webkit-transform:scale(0.5);-moz-transform:scale(0.5);-ms-transform:scale(0.5);-o-transform:scale(0.5);transform:scale(0.5)}.ladda-button[data-style=zoom-out][data-loading] .ladda-spinner{opacity:1;margin-left:0;-webkit-transform:none;-moz-transform:none;-ms-transform:none;-o-transform:none;transform:none}.ladda-button[data-style=zoom-in]{overflow:hidden}.ladda-button[data-style=zoom-in] .ladda-spinner{left:50%;margin-left:-16px;-webkit-transform:scale(0.2);-moz-transform:scale(0.2);-ms-transform:scale(0.2);-o-transform:scale(0.2);transform:scale(0.2)}.ladda-button[data-style=zoom-in] .ladda-label{position:relative;display:inline-block}.ladda-button[data-style=zoom-in][data-loading] .ladda-label{opacity:0;-webkit-transform:scale(2.2);-moz-transform:scale(2.2);-ms-transform:scale(2.2);-o-transform:scale(2.2);transform:scale(2.2)}.ladda-button[data-style=zoom-in][data-loading] .ladda-spinner{opacity:1;margin-left:0;-webkit-transform:none;-moz-transform:none;-ms-transform:none;-o-transform:none;transform:none}.ladda-button[data-style=contract]{overflow:hidden;width:100px}.ladda-button[data-style=contract] .ladda-spinner{left:50%;margin-left:0}.ladda-button[data-style=contract][data-loading]{border-radius:50%;width:52px}.ladda-button[data-style=contract][data-loading] .ladda-label{opacity:0}.ladda-button[data-style=contract][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=contract-overlay]{overflow:hidden;width:100px;box-shadow:0px 0px 0px px transparent}.ladda-button[data-style=contract-overlay] .ladda-spinner{left:50%;margin-left:0}.ladda-button[data-style=contract-overlay][data-loading]{border-radius:50%;width:52px;box-shadow:0px 0px 0px px rgba(0,0,0,0.8)}.ladda-button[data-style=contract-overlay][data-loading] .ladda-label{opacity:0}.ladda-button[data-style=contract-overlay][data-loading] .ladda-spinner{opacity:1}.ladda-button{background:#3ec525;border:0;padding:14px 18px;font-size:18px;cursor:pointer;color:#fff;border-radius:2px;border:1px solid transparent;-webkit-appearance:none;-webkit-font-smoothing:antialiased;-webkit-tap-highlight-color:transparent}.ladda-button:hover{border-color:rgba(0,0,0,0.07);background-color:#888}.ladda-button[data-color=green]{background:#2aca76}.ladda-button[data-color=green]:hover{background-color:#38d683}.ladda-button[data-color=blue]{background:#53b5e6}.ladda-button[data-color=blue]:hover{background-color:#69bfe9}.ladda-button[data-color=red]{background:#ea8557}.ladda-button[data-color=red]:hover{background-color:#ed956e}.ladda-button[data-color=puUSD e]{background:#9973C2}.ladda-button[data-color=puUSD e]:hover{background-color:#a685ca}.ladda-button[data-color=mint]{background:#16a085}.ladda-button[data-color=mint]:hover{background-color:#19b698}.ladda-button[disabled],.ladda-button[data-loading]{border-color:rgba(0,0,0,0.07)}.ladda-button[disabled],.ladda-button[disabled]:hover,.ladda-button[data-loading],.ladda-button[data-loading]:hover{cursor:default;background-color:#999}.ladda-button[data-size=xs]{padding:4px 8px}.ladda-button[data-size=xs] .ladda-label{font-size:0.7em}.ladda-button[data-size=s]{padding:6px 10px}.ladda-button[data-size=s] .ladda-label{font-size:0.9em}.ladda-button[data-size=l] .ladda-label{font-size:1.2em}.ladda-button[data-size=xl] .ladda-label{font-size:1.5em}
</style>
  <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trol - Edukasi dan Pengembangan diri</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="css/new-age.min.css" rel="stylesheet">

  </head>
  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top" style="color:#ffff;font-weight:bold"><img src="transparent.png" width="100px" style="padding-right:10px"/></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#download">Download</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#features">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <header class="masthead" style="background:url(img/wallpaper.png)no-repeat,#47c0e4;background-size: cover;">
      <div class="container h-100" style="background:url(img/bg-pattern.png);">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5">Buat Schedule di Trol, Wawancara Langsung dari aplikasi</h1>
              <a type="button" data-toggle="modal" data-target="#myModal" style="background:#6db101;border-radius:10%;" class="btn btn-outline btn-xl js-scroll-trigger">Login</a>
            </div>
          </div>
		  
		    <div style="color:#444" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><b>Persetujuan login Trol</b></h4>
        </div>
        <div class="modal-body">
          <p>
		  <h3>Aplikasi</h3>
Trol menyediakan Aplikasis berbasis Ios untuk pengguna dan mitra tutor yang bisa langsung di download dari link download berikut.<br><br>
<center><a class="badge-link" href="mitra/home.php#dashboard"><img style="max-width:200px;height:auto" height="auto"src="iphone.png" alt=""></a></center>
<br><br>
		  <h3>KEBIJAKAN PRIVASI</h3><br>
Untuk Login dari website anda bisa login dengan akun yang sudah terdaftar dalam sistem kami, kami memastikan bahwa pengguna layanan adalah akun asli, terdaftar secara resmi dengan data yang valid. Membutuhkan informasi lengkap anda seperti email dan password untuk login sebelum mulai menggunakan layanan.<br>
Kami di Aplikasi Trol menjaga privasi Anda dengan sangat serius. Kami percaya bahwa privasi elektronik sangat penting bagi keberhasilan berkelanjutan dari Internet. Kami percaya bahwa informasi ini hanya dan harus digunakan untuk membantu kami menyediakan layanan yang lebih baik. Itulah sebabnya kami telah menempatkan kebijakan untuk melindungi informasi pribadi Anda.
<br><br>
<h3>RINGKASAN KEBIJAKAN</h3>

Secara umum, Anda akan tetap sebagai anonim ketika Anda menggunakan Aplikasi kami dan mengakses informasi. Sebelum kami meminta Anda untuk mengisi informasi, kami akan menjelaskan bagaimana informasi ini akan digunakan. Kami tidak akan memberikan informasi pribadi Anda kepada perusahaan lain atau individu tanpa se-izin Anda.

Beberapa bagian dari Aplikasi kami memerlukan pendaftaran untuk mengaksesnya, walaupun biasanya semua yang diminta adalah berupa alamat e-mail dan beberapa informasi dasar tentang Anda.

Ada bagian di mana kami akan meminta informasi tambahan. Kami melakukan ini untuk dapat lebih memahami Tutor dan pakar terbaik, dan memberikan Anda palayanan yang kami percaya mungkin berharga bagi Anda. Beberapa contoh informasi Aplikasi kami butuhkan seperti nama, email, alamat rumah, dan info pribadi. Kami memberikan Anda kesempatan untuk memilih untuk tidak menerima materi informasi dari kami.
<br><br>
<h3>PERLINDUNGAN PRIVASI</h3>
Kami akan mengambil langkah yang tepat untuk melindungi privasi Anda. Setiap kali Anda memberikan informasi yang sensitif (misalnya, nomor kartu kredit untuk melakukan pembelian), kami akan mengambil langkah-langkah yang wajar untuk melindungi, seperti enkripsi nomor kartu Anda. Kami juga akan mengambil langkah-langkah keamanan yang wajar untuk melindungi informasi pribadi Anda dalam penyimpanan. Nomor kartu kredit hanya digunakan untuk proses pembayaran dan bukan disimpan untuk tujuan pemasaran. Kami tidak akan memberikan informasi pribadi Anda kepada perusahaan lain atau individu tanpa izin Anda. 
<br><br>
<h3>PENGGUNAAN COOKIE</h3>

Aplikasi ini menggunakan "cookies" untuk mengidentifikasi sesi pengguna pada Aplikasi dan dengan demikian menawarkan kontinuitas selama anggota bernavigasi di dalam Aplikasi. Cookie hanya digunakan pada Aplikasi untuk menyimpan data yang non-kritis. Cookies adalah potongan informasi dimana informasi tersebut ditransfer ke hard drive Smartphone Anda untuk tujuan menyimpan catatan.

Cookie memungkinkan Aplikasi untuk menjaga informasi pengguna di seluruh koneksi. Cookie berupa string kecil berupa karakter yang digunakan oleh banyak Aplikasi untuk mengirimkan data ke Smartphone Anda, dan dalam keadaan tertentu, mengembalikan informasi ke Aplikasi web. Cookie hanya berisi informasi yang direlakan oleh anggota, dan mereka tidak memiliki kemampuan infiltrasi hard drive pengguna dan mencuri informasi pribadi. Fungsi sederhana cookie adalah membantu pengguna bernavigasi di Aplikasi dengan dengan kendala sesedikit mungkin.

Aplikasi Trol mungkin menggunakan perusahaan iklan luar untuk menampilkan iklan di Aplikasi kami. Iklan ini mungkin mengandung cookies, yang tampaknya datang dari Aplikasi web, tetapi pada kenyataannya mereka datang dari mitra kami yang melayani iklan di Aplikasi. Aplikasi tertentu dapat menempatkan "cookie" pada Smartphone Anda untuk memberikan layanan personalisasi dan / atau mempertahankan identitas Anda di beberapa halaman dalam satu sesi.
<br><br>
<h3>KEAMANAN</h3>

Aplikasi ini memiliki langkah-langkah keamanan untuk melindungi kehilangan, penyalahgunaan dan perubahan informasi di dalam kendali kita. Langkah-langkah ini meliputi metode perlindungan data dasar dan kompleks, penyimpanan informasi tertentu secara offline dan pengamanan server database kami. Aplikasi ini memberikan pilihan bagi para pengguna untuk menghapus informasi mereka dari database kami untuk tidak menerima informasi kedepannya atau untuk tidak lagi menerima layanan kami.
<br><br><br>
</p>
        </div>
        <div class="modal-footer">
          <a href="https://profitgm.com/admin-Trol/index.php" onclick="javascript:showDiv();"><button type="button" class="btn btn-default">Setuju</button></a><br><br>
          <a ><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button></a>
        </div>
      </div>
    </div>
  </div>
  
          <div class="col-lg-5 my-auto" style="position: inherit;">
            <div class="device-container" style="margin-top: 270px;">
              <div class="device-mockup iphone6 portrait">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="satu.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="download bg-primary text-center" id="download" style="position:static">
	
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h2 class="section-heading">Temukan Tutor dan pakar terbaik</h2>
            <p>Temukan tutor Professional di Trol, buatlah schedule sekarang juga</p>
            <div class="badges">
              <a class="badge-link" href="home.php"><img style="max-width:200px;height:auto" height="auto" src="iphone.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="features" id="features">
      <div class="container">
        <div class="section-heading text-center">
          <h2>Semua bidang tersedia, Trol melengkapi</h2>
          <p class="text-muted">Anda semakin dipermudah dan praktis dalam menemukan solusi dari Trol</p>
          <hr>
        </div>
        <div class="row">
          <div class="col-lg-4 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6 portrait">
                <div class="device">
                  <div class="screen">
                    <img src="satu.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 my-auto">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <div class="feature-item">
                    <img src="log.png" width="100px" alt="">
                            <h3>Smart Pustaka</h3>
                    <p class="text-muted">Fitur Smart Pustaka Trol adalah fasilitas untuk mendapatkan materi sesuai minat dan keahlian</p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feature-item">
                    <img src="pengembangandiri.png" width="100px" alt="">
                    <h3>Pengembangan Diri</h3>
                    <p class="text-muted">Anda bisa mendapatkan pengetahuan baru dibidang anda, sehingga potensi anda berkembang</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="feature-item">
                    <img src="survei.png" width="100px" alt="">
                    <h3>Survei</h3>
                    <p class="text-muted">Professional di Trol akan membantu anda mendapatkan data survei sesuai permintaan</p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feature-item">
                    <img src="lowongan.png" width="100px" alt="">
                    <h3>Lowongan Kerja</h3>
                    <p class="text-muted">Fitur lowongan kerja untuk anda yang ingin mencoba berkarir sesuai bidang minat anda</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="cta">
      <div class="cta-content">
        <div class="container">
          <h3 style="color:#fff;">Ingin bergabung menjadi  Trol ?<br><small>menggunakan aplikasi yang terintegrasi.</small></h3>
          <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">Hubungi kami</a>
        </div>
      </div>
      <div class="overlay"></div>
    </section>
    <footer>
      <div class="container">
        <p>&copy; Trol <?php echo date('Y');?>. All Rights Reserved.</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#">Privacy</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Terms</a>
          </li>
          <li class="list-inline-item">
            <a href="#">FAQ</a>
          </li>
        </ul>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>

  </body>

</html>
