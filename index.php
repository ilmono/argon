<!DOCTYPE html>
<html lang="en">
<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Campos AR-GON</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/cards.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" enco>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Menu de Navegacion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div id="wraper-logo">
                    <a href="#page-top">
                        <img id="logo-1" class="logo" src="img/argon-logo.png">
                        <img id="logo-2" class="logo" src="img/argon-logo-2.png">
                    </a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">¿Quienes Somos?</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#products">Productos</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Novedades</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contactenos</a>
                    </li>
                    <li class="page-scroll">
                        <a href="pedidos.php">Pedidos ON-Line</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/mapa.png" alt="">
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>¿Quienes Somos?</h2>
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <p>
                        Fabricamos desde 1972 todo tipo de conjuntos de bobinas de campos para la industria automotriz, ferroviaria, naval, aérea, auto elevadoras, Grupos electrógenos industriales, bombas petroleras, maquinas viales, rampas móviles, equipo de aire acondicionado, maquinas agrícolas, marinas, rampas de ómnibus, malacates, generadores de viento, con muestra en 24Hs.
                    </p>
                    <p>
                        Desde 1976, fabricamos bobinas de campos para la empresa Indiel. En este momento somos fabricantes exclusivos de los campos que se colocan en los motores de arranque que se exportan a Brasil, China y EE. UU.
                    </p>
                    <p>
                        También exportamos a Brasil, Chile, Uruguay y Paraguay.
                    </p>
                    <p>
                        Nuestras bobinas están homologadas por Bosh Brasil.
                    </p>
                    <p>
                        Campos AR-GON se destaca por utilizar materia prima de la mejor calidad, cobre cátodo O, 99 pureza, aislantes que soportan los 200° C y -40° C.
                    </p>
                    <p>
                        Flexibles siliconado y espaguetis de vidrio con silicona.
                    </p>
                    <p>
                        Nuestra fábrica está equipada para una producción de 16000 bobinas mensuales.
                    </p>
                    <p>
                        Respaldan nuestro producto más de 300 firmas compradoras.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Productos Section -->
    <section id="products">
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

            $json_file = file_get_contents("json/campos.json");
            $arrayProductsCampos = json_decode($json_file);
            $tmp = makeArrayKeys($arrayProductsCampos);
            $campos = $tmp['products'];
            $camposFilter = $tmp['keys'];

            $json_file = file_get_contents("json/carbones.json");
            $arrayProductsCarbones = json_decode($json_file);
            $tmp = makeArrayKeys($arrayProductsCarbones);
            $carbones = $tmp['products'];
            $carbonesFilter = $tmp['keys'];

        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Productos</h2>
                    <br />
                </div>
                <div>
                    <div class="container-catalogos">
                        <a href="catalogos/campos.pdf" target="_blank"><spam class="glyphicon glyphicon-download-alt"></spam> Catalogo Campos</a> | 
                        <a href="catalogos/escobillas.pdf" target="_blank"><spam class="glyphicon glyphicon-download-alt"></spam> Catalogo Escobillas</a>
                    </div>
                    <div class="p-search">
                        Buscar por Numero: 
                        <input type="text" id="search-point">
                        <button class="filter-now glyphicon glyphicon-search buton-search"></button>
                    </div>
                </div>
            </div>
            <div class="button-group filter-button-group">
                <label><input class="btn-filtros" type="radio" name="filter" data-filter="*"> Ver todos </label>
                <label><input class="btn-filtros" type="radio" name="filter" data-filter=".carbon"> Escobillas </label>
                <label><input class="btn-filtros" type="radio" name="filter" data-filter=".campo"> Campos </label>
                <input type="hidden" id="type-filter">

                <div id="campo-filter">
                    <div id ="wrapper-filter-carbones" class="wrapper-filter">
                        <?php foreach($camposFilter as $filters){ ?>
                            <div class="groupfilters">
                                <?php foreach($filters as $key => $filter){ ?>
                                    <input class="chk-filtros" type="checkbox" name="vehicle" data-filter="<?php echo $key; ?>" value="<?php echo $key; ?>"><?php echo strtoupper($filter); ?><br />
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div id ="wrapper-filter-escobillas" class="wrapper-filter">
                        <?php foreach($carbonesFilter as $filters){ ?>
                            <div class="groupfilters">
                                <?php foreach($filters as $key => $filter){ ?>
                                    <input class="chk-filtros" type="checkbox" name="vehicle" data-filter="<?php echo $key; ?>" value="<?php echo $key; ?>"><?php echo strtoupper($filter); ?><br />
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>
            <div id="cards-wrapper">
                <div class="row grid">
                    <?php foreach($campos as $campo){ ?>
                        <div class="card grid-item element-item campo <?php echo $campo->filter . ' '. $campo->numero ?>">
                            <div class="card-number">N&deg; AR&#8226;GON: <?php echo $campo->numero ?></div>
                            <div class="img-wrapper">
                                <img src="img/cards/campos/<?php echo $campo->img ?>.png" alt="Just Background">
                            </div>
                            <p class="detail"><?php echo $campo->descripcion ?></p>
                            <p class="detail-campos"><?php echo $campo->campos ?></p>
                            <p class="detail-equipo">Eq: <?php echo strtoupper($campo->equipo) ?></p>
                        </div>
                    <?php } ?>
                    <?php foreach($carbones as $carbon){ ?>
                        <div class="card grid-item element-item carbon <?php echo $carbon->filter . ' ' . str_replace(' ', '-', $carbon->letra) ?>">
                            <div class="card-number">N&deg; AR&#8226;GON: <?php echo $carbon->letra ?></div>
                            <div class="img-wrapper">
                                <img src="img/cards/escobillas/<?php echo $carbon->img ?>.png" alt="Just Background">
                            </div>
                            <p class="detail"><?php echo $carbon->descripcion ?></p>
                            <p class="detail-campos">
                                Voltaje: <?php echo $carbon->voltaje ?> Volts <br /> 
                                Medidas: <?php echo $carbon->medidas ?><br /> 
                                Cantidad: <?php echo $carbon->cantidad ?>
                            </p>
                            <p class="detail-equipo">Eq: <?php echo strtoupper($carbon->equipo) ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Novedades Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Novedades</h2>
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <p>
                        Nos llena de satisfacción presentar nuestra nueva máquina bobinadora totalmente automática, con tecnología de última generación.
                    </p>
                    <p>
                        Esto nos hace, ser primeros en producción, con mayor seguridad en la calidad y mejor entrega de nuestros productos.
                        contamos con más de quinientos ochenta modelos de bobinas de campos de todo el mundo. Lo que nos convierte en  la única fábrica que cuenta con este servicio.
                    </p>
                    <p>
                        El apoyo y confianza de nuestros clientes, vuelve con mejor servicio.
                    </p>
                </div>
                <div class="row video-wrapper">
                    <video src="video.mp4" width="500" controls></video>
                </div>
                <hr style="width: 70%;" />
                <div class="col-lg-8 col-lg-offset-2">
                    <p>
                        Estimados Clientes, es de nuestro agrado presentarles el catálogo de carbones de nuestra fabricación.
                    </p>
                    <p>
                        Nuestro producto esta elaborado con tecnología de última generación , y materias primas importadas con la mayor calidad internacional.
                    </p>
                    <p>
                        Nos es grato anunciar que a raíz de vuestra inestimable colaboración y esencial apoyo, estamos desarrollando nuevas líneas de carbones que en breve agregaremos a nuestros catálogos.
                    </p>
                    
                </div>
                <div class="row video-wrapper">
                    <img style="width: 450px;" src="img/SAM_0175.JPG">
                </div>
                <hr style="width: 70%;" />
                <div class="col-lg-8 col-lg-offset-2">
                    <p><b>
                        IMPORTANTE
                    </b></p>
                    <p>
                        Entrando en nuestro cátalogo de productos podrán bajar e imprimir nuestros catálogos además podrán realizar su pedido de compra por ese medio haciendo mas ágil y segura nuestra atención.
                    </p>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contactenos</h2>
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" id="name" required data-validation-required-message="Por favor ingrese su Nombre.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Por favor ingrese su Email.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Telefono</label>
                                <input type="tel" class="form-control" placeholder="Telefono" id="phone" required data-validation-required-message="Por favor ingrese su Telefono.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mensaje</label>
                                <textarea rows="5" class="form-control" placeholder="Mensaje" id="message" required data-validation-required-message="Por favor ingreseun Mensaje."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-12">
                        <h3>Ubicacion y Telefonos</h3>
                        <p>Juncal 951, Aldo Bonzi, CP: 1770, Buenos Aires Argentina.</p>
                        <p>Telefonos: (5411) 4442-1145 / 4462-5499.</p>
                        <p>Email: camposargon@hotmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; 
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
    <script src="js/isotope-docs.min.js"></script>

</body>
</html>