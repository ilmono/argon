<link href="../css/cards.css" rel="stylesheet">
<?php
    /*$json_file = file_get_contents("../carbones.csv");
    $array = array_map("str_getcsv", explode("\n", $json_file));
    $json = json_decode(json_encode($array));
    $keys = array_shift($json);
    foreach ($json as $campo){
        foreach ($campo as $key => $data){
            $tmp[$keys[$key]] =$data;
        }
        $campos[] = $tmp;
    }*/
    $json_file = file_get_contents("../json/campos.json");
    $campos = json_decode($json_file);
    /*echo "<pre>";
        print_r($campos[0]);
    echo "</pre>";*/
?>

<div class="cards-wrapper">
    <?php foreach($campos as $campo){ ?>
    <div class="card">
        <div class="card-number">N&deg; AR&#8226;GON: <?php echo $campo->numero ?></div>
        <div class="img-wrapper">
            <img src="https://d13yacurqjgara.cloudfront.net/users/2733/screenshots/741958/dribbble-foxes.jpg" alt="Just Background">
        </div>
        <p class="detail"><?php echo $campo->descripcion ?></p>
        <p class=""><?php echo $campo->campos ?></p>
        <p class=""><?php echo $campo->equipo ?></p>
    </div>
    <?php } ?>
</div>