<!doctype html>
<html lang="PT-BR">
<head>
    <meta charset="utf-8" />

    <title>Ombro Amigo</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />


    <!--     Fonts and icons     -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.material.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
    <!-- FIM FONTS -->


    <!-- Carregando JAVASCRIPT -->
    <?= $this->Html->script('jquery-3.2.1.js') ?>
     <?= $this->Html->script('materialize.js') ?>
     <?= $this->Html->script('select2/select2.min.js') ?>
     <?= $this->Html->script('select2/i18n/pt-BR.js');?>
     <?= $this->Html->script('App/CommonJS.js') ?>
     <?= $this->Html->script('bootstrap.min.js') ?>
     <?= $this->Html->script('material.min.js') ?>
     <?= $this->Html->script('nouislider.min.js') ?>
     <?= $this->Html->script('bootstrap-datepicker.js') ?>
     <?= $this->Html->script('material-kit.js') ?>
     <?= $this->Html->script('jquery.form.js') ?>
        
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.material.min.js"></script>
        
    <!-- ChartJs -->
    <?= $this->Html->script('ChartJs/Chart.bundle.min.js') ?>
    <?= $this->Html->script('ChartJs/Chart.min.js') ?>

    

    <!-- Jquery-validation-1.16.0 -->
    <?= $this->Html->script('Validate/jquery.validate.min.js') ?>

    <!-- Fim carregamento JAVASCRIPT -->

    <!-- Carregamento CSS -->
    <?= $this->Html->css('select2-materialize.css') ?>
    <?= $this->Html->css('App/ombroamigoestilos.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('material-kit.css') ?>
    <?= $this->Html->css('demo.css') ?>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <!-- Fim CSS -->
    
    
</head>

    <body class="index-page">
        <!-- Navbar -->
        <nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">

            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/">
                        <div class="logo-container">
                            <div class="">
                                <?= $this->Html->image('logo.png',array('alt' => 'Creative Tim Logo', 'title' => '<b>OMBRO-AMIGO</b><br /> Software social', 'data-placement' => 'bottom', 'data-html' => 'true', 'rel' => 'tooltip'))?>
                            </div>
                            <div class="brand">
                                Ombro Amigo
                            </div>


                        </div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navigation-index">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <?= $this->Html->link(
                                     'Entrar',
                                    ['controller' => 'users', 'action' => 'login'], array('class' => '', 'data-toggle' => 'modal')
                                ); ?>
                        </li>
                        <li>

                            <?= $this->Html->link(
                                     'Registrar-se',
                                    ['controller' => 'users', 'action' => 'add'], array('class' => '', 'data-toggle' => 'modal')
                                ); ?>

                           
                        
                        </li>
                        <li>
                            <a rel="tooltip" title="Siga-nos no Twitter" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a rel="tooltip" title="Curta nossa página no Facebook" data-placement="bottom" href="#m" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a rel="tooltip" title="Siga-nos no Instagram" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="wrapper">
            <div class="header header-filter" style="background-image: url(<?=$this->Url->image('bg2.jpeg')?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="brand">
                                <h1><B></B></h1>
                                <h2>O que você tem para doar hoje?</h2>
                                <button class="btn btn-primary btn-round btn-lg">FAZER DOAÇÃO</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="main main-raised">
                <div class="section section-basic">
                    <div class="container">
                        <div class="title">
                            
                        </div>
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>

                    </div>
                </div>
            </div>

                
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    HOME
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                   SOBRE
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                   TESTE
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    CONTATO
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; 2017, OMBRO-AMIGO<i class="material-icons">favorite</i> Software Social.
                    </div>
                </div>
            </footer>
        </div>

        <script type="text/javascript">

            $(document).ready(function(){
                // the body of this function is in assets/material-kit.js
                // materialKit.initSliders();
                window_width = $(window).width();

                if (window_width >= 992){
                    big_image = $('.wrapper > .header');

                    $(window).on('scroll', materialKitDemo.checkScrollForParallax);
                }

            });

        </script>
    </body>
</html>

