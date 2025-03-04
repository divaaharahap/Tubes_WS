<?php
// Load required libraries
require_once realpath(__DIR__ . '/.') . "/vendor/autoload.php";
require_once __DIR__ . "/html_tag_helpers.php";

// Set RDF namespaces
\EasyRdf\RdfNamespace::set('dbc', 'http://dbpedia.org/resource/Category:');
\EasyRdf\RdfNamespace::set('dbo', 'http://dbpedia.org/ontology/');
\EasyRdf\RdfNamespace::set('dbpedia', 'http://dbpedia.org/property/');
\EasyRdf\RdfNamespace::set('dbr', 'http://dbpedia.org/resource/');
\EasyRdf\RdfNamespace::set('city', 'http://example.org/schema/city');
\EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
\EasyRdf\RdfNamespace::set('dbp', 'http://dbpedia.org/property/');
\EasyRdf\RdfNamespace::set('geo', 'http://www.w3.org/2003/01/geo/wgs84_pos#');

// Create SPARQL clients
$sparql = new \EasyRdf\Sparql\Client('http://dbpedia.org/sparql');
$sparql_jena = new \EasyRdf\Sparql\Client('http://localhost:3030/tubes_ws/sparql');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityScape 2.0 | Kelompok 2</title>
    <link rel="shortcut icon" href="img/logo2.png" type="image/png/jpg">
    <link rel="stylesheet" href="kota.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
<?php
$result = "";
$detail = "";

    $detail = $_POST['detail'];
    $detail = str_replace(' ', '_', ucwords($detail));
    $detail = str_replace(',', '%2C', $detail);
    $detail = trim(substr($detail, 25), "/");
    // if (preg_match('/[,()!@#$%^&]/', $detail)) {
    //     $detail = null;
    // }
    

$query = 'SELECT DISTINCT * WHERE {
    {
        dbr:'.$detail.' rdf:type dbo:Place;
        dbo:country ?negara;
        rdfs:label ?label;
        dbo:abstract ?abstract.
        FILTER langMatches(lang(?abstract), "EN") .
        FILTER langMatches(lang(?label), "EN") .
        OPTIONAL { dbr:'.$detail.' geo:lat ?lat }.
        OPTIONAL { dbr:'.$detail.' geo:long ?long }.
        OPTIONAL { dbr:'.$detail.' dbo:foundingDate ?foundingDate }.
        OPTIONAL { dbr:'.$detail.' dbo:motto ?motto }.
        OPTIONAL { dbr:'.$detail.' foaf:isPrimaryTopicOf ?wiki }.
        OPTIONAL { 
            { dbr:' . $detail . ' dbo:populationTotal ?populasi } 
            UNION
            { dbr:' . $detail . ' dbp:populationTotal ?populasi }
        } .
        OPTIONAL { 
            { dbr:'.$detail.' dbp:areaTotalKm ?totalArea } 
            UNION
            { dbr:'.$detail.' dbo:areaTotalKm ?totalArea }
        } .
    }
}
        LIMIT 1';


$result=$sparql->query($query);
?>
    <div class="container" id="cityDetailsContainer">
    <h1 class="title">City Details</h1>
    <hr class="underline">

    <?php
    if (empty($result)) {
        echo "<p>Data tidak ditemukan untuk kota ini.</p>";
    } else {
        foreach ($result as $hasil) {
            if (!empty($hasil->wiki)) {
                \EasyRdf\RdfNamespace::setDefault('og');
                $wiki = \EasyRdf\Graph::newAndLoad($hasil->wiki);
                $foto_url = $wiki->image;
            } else {
                echo "Gambar tidak tersedia";
            }
    ?>

    <div class="row">
        <div class="col-8" id="details">
            <h5>Nama Kota</h5>
            <p><?= $hasil->label ?></p>
            <h5>Negara</h5>
            <p><?= substr($hasil->negara, 28) ?></p>
            <h5>Abstrak</h5>
            <p><?= $hasil->abstract ?></p>
            
        </div>

        <div class="col-4">
            <img class="img-fluid" src="<?= isset($foto_url) ? $foto_url : 'path_to_placeholder_image' ?>" style="margin-bottom: 40px;">
            <h5>Motto</h5>
            <p><?php
                if (property_exists($hasil, 'motto')) {
                    echo $hasil->motto;
                } else {
                    echo "Motto tidak tersedia";
                }
                ?></p>
            <h5>Tanggal Berdiri</h5>
            <p><?php
                if (property_exists($hasil, 'foundingDate')) {
                    echo $hasil->foundingDate;
                } else {
                    echo "Tanggal Berdiri tidak tersedia";
                }
                ?></p>
             <h5>Jumlah Populasi</h5>
            <p>
                <?php
                if (property_exists($hasil, 'populasi')) {
                    echo $hasil->populasi;
                } else {
                    echo "Data populasi tidak tersedia";
                }
                ?>
            </p>
            <h5>Luas Area (km)</h5>
            <p>
                <?php
                if (property_exists($hasil, 'totalArea')) {
                    echo $hasil->totalArea;
                } else {
                    echo "Data luas area tidak tersedia";
                }
                ?>
            </p>
        </div>
    </div>

    <?php
        }
    }
    ?>

    <div id="map">
        <?php if (!empty($hasil->lat) && !empty($hasil->long)) { ?>
            <iframe width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=
            <?= $hasil->lat ?>,<?= $hasil->long ?>&hl=en&z=14&amp;output=embed"></iframe>
        <?php } else { ?>
            <p>Data lokasi tidak tersedia untuk kota ini.</p>
        <?php } ?>
    </div>
</div>

    
    <script src="script.js"></script>
</body>

</html>