<?php
    $json_file = file_get_contents("../campos.csv");
    $array = array_map("str_getcsv", explode("\n", $json_file));
    $json = json_decode(json_encode($array));
    $keys = array_shift($json);
    foreach ($json as $campo){
        foreach ($campo as $key => $data){
            $tmp[$keys[$key]] =$data;
        }
        $campos[] = $tmp;
    }
echo "<pre>";
print_r(json_encode($campos));
echo "</pre>";
?>
