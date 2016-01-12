<h1>TKB</h1>
<?php
    $json_file = file_get_contents("campos.json");
    $campos = json_decode($json_file);

    foreach($campos->data as $campo){
        var_dump($campo->numero);
        echo '<br />';
    }
?>