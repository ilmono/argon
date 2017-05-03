<title>Campos ARGON - Catalogo Escobillas</title>
<link href="../css/catalogo-escobillas.css" rel="stylesheet">
<?php
function makeArrayKeys($arrayProducts){
    $arraytmpEquipos = array();
    $arrayEquipos = array();
    $arrayProduct = array();
    $stringSearh = array(' ', 'ñ', 'Ñ', 'á', 'é', 'í', 'ó', 'ú', 'ü');
    $stringReplace = array('', 'n', 'n', 'a', 'e', 'i', 'o', 'u', 'u');
    foreach($arrayProducts as $key => $product){
        $tmp = str_replace($stringSearh,$stringReplace,strtolower($product->equipo));
        if($product->equipo != ''){
            $arraytmpEquipos[$tmp] = $product->equipo;
            $arrayProduct[$key] = $product;
            $arrayProduct[$key]->filter = $tmp;

        }
    }

    $totalColumns = 6;
    $column = 1;
    foreach($arraytmpEquipos as $key => $equipo){
        $arrayEquipos[$column][$key] = $equipo;
        $column++;
        if($column > $totalColumns){
            $column = 1;
        }
    }
    return array('keys' => $arrayEquipos, 'products' => $arrayProduct);
}

$json_file = file_get_contents("../json/escobillas-catalogo.json");
$arrayProductsCarbones = json_decode($json_file);
$tmp = makeArrayKeys($arrayProductsCarbones);
$carbones = $tmp['products'];
$carbonesFilter = $tmp['keys'];

?>
<body>
    <div class="logo">
        <img class="img" src="../img/argon-logo-2.png" alt="Just Background">
    </div>
    <table>
    <?php foreach($carbones as $carbon){ ?>
        <tr>
            <td class="col-1">
                <div class="nombre" style="background-color: #93c47d;"><?php echo $carbon->letra ?></div>
                <span class="etiqueta">Medidas:</span> <span><?php echo $carbon->medidas ?></span><br />
                <span class="etiqueta">Voltaje:</span> <span><?php echo $carbon->voltaje ?> Volts</span><br />
                <span class="etiqueta">Equipo:</span> <span><?php echo strtoupper($carbon->equipo) ?></span><br />
                <span class="etiqueta">Cantidad:</span> <span><?php echo $carbon->cantidad ?></span><br />
            </td>
            <td class="col-2"><img class="img" src="../img/escobillas-catalogo/<?php echo $carbon->img ?>.png" alt="Just Background"></td>
            <td class="col-3"><span><?php echo $carbon->descripcion ?></span></td>
        </tr>
    <?php } ?>
    </table>
    
</body>
