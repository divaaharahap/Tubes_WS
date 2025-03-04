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
    <link rel="stylesheet" href="negara.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <?php
    $result = "";
    if (isset($_GET['country'])) {
        $getCountry = $_GET['country'];
        $getCountry = str_replace(' ', '_', ucwords($getCountry));
        
            if ($getCountry == 'Indonesia') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Indonesia")'.
                '} ORDER BY ?label'
            );
            } else if ($getCountry == 'Malaysia') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Malaysia")'.
                '} ORDER BY ?label'
            );

            } else if ($getCountry == 'Singapore') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Singapore")'.
                '} ORDER BY ?label'
            );
        
            } else if ($getCountry == 'Thailand') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Thailand")'.
                '} ORDER BY ?label'
            );
        
            } else if ($getCountry == 'Filipina') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Filipina")'.
                '} ORDER BY ?label'
            );
        
            } else if ($getCountry == 'Vietnam') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Vietnam")'.
                '} ORDER BY ?label'
            );
        
            } else if ($getCountry == 'Kamboja') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Kamboja")'.
                '} ORDER BY ?label'
            );
        
            } else if ($getCountry == 'Laos') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Laos")'.
                '} ORDER BY ?label'
            );
        
            } else if ($getCountry == 'Timor Leste') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Timor Leste")'.
                '} ORDER BY ?label'
            );
        
            } else if ($getCountry == 'Myanmar') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Myanmar")'.
                '} ORDER BY ?label'
            );
        
            } else if ($getCountry == 'Brunei Darussalam') {
                $result = $sparql_jena->query('SELECT * WHERE {' .
                    '?city rdf:type city:asean;' .
                    'rdfs:label ?label;' .
                    'city:country ?Negara. '.

                    'FILTER (?Negara = "Brunei Darussalam")'.
                '} ORDER BY ?label'
            );
        } else {
            echo "
            <script type='text/javascript'>
            setTimeout(function () {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Negara $getCountry bukan bagian dari ASEAN.',
            });
        },10);
        window.setTimeout(function(){
            window.location.replace('index.php');
        }, 2000);
        </script>";
        }
        }
            
    ?>
    <?php
    if ($result) :
    ?>

      <div class="container mt-5 mb-5">
    <h1 class="title"><?= $getCountry ?></h1>
    <hr class="underline">

    
    <nav class="navbar navbar-light custom-navbar" style="max-width: 400px; margin: 0 auto;">
    <form class="form-inline" style="display: flex;">
    <input class="form-control mr-sm-2" type="search" name="detail" placeholder="Search your City" aria-label="Search">  
    </form>
    </nav>

          
        <table class="table mt-5" style="color: white;">
            <thead class="thead-dark">
                <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            foreach ($result as $kota) :
            ?>
            <tbody>
<tr>
                <td>
                <?= $kota->label ?></td>
                <td><form action="./detail.php" method="POST">        
                <input type="hidden" name="detail" value="<?= $kota->city?>">
                  <button class="btn btn-primary" type="submit  " id="button-addon2"> detail <br></button>
                </form>
                </td>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
          </table>
          
          <?php
          endif;
          ?>
</div>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
  <script src="newscript.js"></script>
</body>
</html>