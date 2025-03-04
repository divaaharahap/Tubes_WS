<?php


require_once realpath(__DIR__ . '/.') . "/vendor/autoload.php";
require_once __DIR__ . "/html_tag_helpers.php";

// Setup some additional prefixes for DBpedia
\EasyRdf\RdfNamespace::set('dbc', 'http://dbpedia.org/resource/Category:');
\EasyRdf\RdfNamespace::set('dbo', 'http://dbpedia.org/ontology/');
\EasyRdf\RdfNamespace::set('dbpedia', 'http://dbpedia.org/property/');
\EasyRdf\RdfNamespace::set('dbr', 'http://dbpedia.org/resource/');
\EasyRdf\RdfNamespace::set('city', 'http://example.org/schema/city');
\EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
\EasyRdf\RdfNamespace::set('dbp', 'http://dbpedia.org/property/');




$sparql = new \EasyRdf\Sparql\Client('http://dbpedia.org/sparql');
$sparql_jena = new \EasyRdf\Sparql\Client('http://localhost:3030/tubes_ws/sparql'); 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CityScape 2.0 | Kelompok 2 </title>
    <link rel="shortcut icon" href="img/logo2.png" type="image/png/jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="alo.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</head>
<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top" id="mainNav">
        <div class="container">
        <a class="navbar-brand" id="navbar-brand" href="./index.php";>
        <img src="img/logo2.png" width="90" height="60" class="d-inline-block align-top"> CityScape 2.0 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav mx-auto ">
            <a class="nav-link" href="#search" id="navbar-custom"><i class="fa fa-search"></i> Search</a>
            <a class="nav-link" href="#about_us" id="navbar-custom">About Us</a>
            <a class="nav-link" href="#news" id="navbar-custom">News</a>
          </div>
        </div>
        </div>
    </nav>
  </header>

    <div id="search">
    <div class="jumbotron jumbotron-fluid">
      <div class=" container container-search">
            <h1 class="display-4"> <br> Discover <span class="font-weight-bold">ASEAN Cities</span> with Ease</h1>
            <p class="lead">Find your perfect City in ASEAN and <br> Create your own life in Southeast Asia's diverse cityscapes.</p>

            <div class="input-group" style="max-width:400px; margin:0 auto; display: flex; justify-content: center;">
            <form action="./kotabykota.php" method="get" style="display: flex;">
              <input type="text" name="country" class="form-control" placeholder="Search your country in here..." 
              aria-label="Search your city in here..." aria-describedly="button-addon2">
              <div class="input-group-append">
                  <button class="btn btn-primary" type="submit  " id="button-addon2"> <i class="fa fa-search"></i></button>
            </div>
            </form>
          </div>
      </div>
    </div>
    </div>


    <div class="topkota">
      <div class="slide"> 
        <div class="item" style="background-image: url(img/kualalumpur.jpg);">
            <div class="content">
                <div class="judul">List Kota by Populasi</div>
                <div class="name">Kuala Lumpur</div>
                <div class="des">Malaysia</div>
                <div class="populasi"><i class="fas fa-user-friends">   8.455.029</i></div>
            </div>
        </div>
        <div class="item" style="background-image: url(img/jakatadiff.jpg);">
            <div class="content">
                <div class="judul">List Kota by Populasi</div>
                <div class="name">Jakarta</div>
                <div class="des">Indonesia</div>
                <div class="populasi"><i class="fas fa-user-friends">   31.240.709</i></div>
            </div>
        </div>
        <div class="item" style="background-image: url(img/hominchi2.jpg);">
            <div class="content">
                <div class="judul">List Kota by Populasi</div>
                <div class="name">Ho Chi Minh</div>
                <div class="des">Vietnam</div>
                <div class="populasi"><i class="fas fa-user-friends">   21.281.639</i></div>
            </div>
        </div>
        <div class="item" style="background-image: url(img/Hanoi_Panorama_-_NKS.jpg);">
            <div class="content">
                <div class="judul">List Kota by Populasi</div>
                <div class="name">Hanoi</div>
                <div class="des">Vietnam</div>
                <div class="populasi"><i class="fas fa-user-friends">   19.980.000</i></div>
            </div>
        </div>
        <div class="item" style="background-image: url(img/manilafix.jpg);">
            <div class="content">
                <div class="judul">List Kota by Populasi</div>
                <div class="name">Manila</div>
                <div class="des">Filipina</div>
                <div class="populasi"><i class="fas fa-user-friends">   13.484.462</i></div>
            </div>
        </div>
        <div class="item" style="background-image: url(img/bangkok.jpg);">
            <div class="content">
                <div class="judul">List Kota by Populasi</div>
                <div class="name">Bangkok</div>
                <div class="des">Thailand</div>
                <div class="populasi"><i class="fas fa-user-friends">   10.696.258</i></div>
            </div>
        </div>
       

    </div>

    <div class="button-slider">
        <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
        <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
    </div>

    <div class="team" id="about_us">
        <div class="center">
            <h1>About Us</h1>
        </div>

        <div class="team-content">
            <div class="box">
                <img src="img_kelompok/dipa.jpg" alt="">
                <h3>Diva Anggreini Harahap</h3>
                <h5>221402094</h5>
            </div>

            <div class="box">
                <img src="img_kelompok/Fotoku.jpg" alt="">
                <h3>Gylbert Chrismiguel Sitorus</h3>
                <h5>221402025</h5>
            </div>

            <div class="box">
                <img src="img_kelompok/dila.jpg" alt="">
                <h3>Fadillah Emilia Nasution</h3>
                <h5>221402034</h5>
            </div>

            <div class="box">
                <img src="img_kelompok/cici.jpg" alt="">
                <h3>Ceycylia Dear Amizafatel</h3>
                <h5>221402059</h5>
            </div>

            <div class="box">
                <img src="img_kelompok/kipa.JPG" alt="">
                <h3>Sakifa Indira Putri</h3>
                <h5>221402130</h5>
            </div>
        </div>
    </div>

    <div class="news" id="news">
        <div class="row">
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="img/news 1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Menhub: ASEAN Komitmen Tingkatkan Ekosistem Kendaraan Listrik</h5>
                        <a href="https://tribratanews.polri.go.id/blog/nasional-3/menhub-asean-komitmen-tingkatkan-ekosistem-kendaraan-listrik-66020" 
                        class="btn btn-primary" target="_blank">Read More</a>
                    </div>
                </div>
            </div>
        
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="img/news2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Negara ASEAN Bentuk AWGIPC untuk Jaga Kekayaan Intelektual</h5>
                            <a href="https://lombok.tribunnews.com/2023/11/10/negara-asean-bentuk-awgipc-untuk-jaga-kekayaan-intelektual." class="btn btn-primary" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="img/news3.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">ASEAN Youth Fellowship Kumpulkan 40 Pemimpin Muda ASEAN.</h5>
                            <a href="https://www.gatra.com/news-585030-pendidikan-asean-youth-fellowship-kumpulkan-40-pemimpin-muda-asean.html" class="btn btn-primary" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <br><br><br>

            <div class="row">
                <div class="col-md-4 ">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="img/news3fix.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bertambah Banyak, Ini 7 Negara Asia Pendukung Israel dengan Mayoritas dari ASEAN</h5>
                            <a href="https://www.viva.co.id/berita/dunia/1655830-bertambah-banyak-ini-7-negara-asia-pendukung-israel-dengan-mayoritas-dari-asean" class="btn btn-primary" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-4 ">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="img/news4" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">ASEAN More Stable Than EU, Mercosur: Business Group</h5>
                            <a href="https://jakartaglobe.id/business/asean-more-stable-than-eu-mercosur-business-group" class="btn btn-primary" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="img/news5" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Lakukan Studi Lanskap Infrastruktur Riset di ASEAN, EU-ASEAN Kunjungi BRIN</h5>
                            <a href="https://www.brin.go.id/news/116617/lakukan-studi-lanskap-infrastruktur-riset-di-asean-eu-asean-kunjungi-brin" class="btn btn-primary" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         

    <footer>
    <div class="footer-content">
        <h3>CityScapes 2.0</h3>
        <p>"Cityscapes ASEAN: Terangi Keindahan Kota-kota ASEAN, Jejakkan Langkah Anda di Setiap Siluetnya."</p>
        <ul class="sosmed">
            <li> <a href=""><i class="fa fa-facebook"></i></a></li>
            <li> <a href=""><i class="fa fa-twitter"></i></a></li>
            <li> <a href=""><i class="fa fa-google-plus"></i></a></li>
            <li> <a href=""><i class="fa fa-youtube"></i></a></li>
            <li> <a href=""><i class="fa fa-linkedin-square"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>copyright &copy;2023 CityScapes2.0 designed by <span>Kelompok 2</span></p>
    </div>
    </footer>
    <script src="script.js"></script>

</body>
</html>