<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"  class="no-js">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <title>
            <?php if (!include_slot('title')): ?>
                <?php echo $sf_response->getTitle() ?>
            <?php endif; ?>
        </title>
        <!--link rel="shortcut icon" href="/favicon.ico" /-->
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <?php include_stylesheets() ?>
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
         <![endif]-->
        
        <?php if(!include_slot('metas-galeria')):?>
        <meta property="og:title" content="Pagina Botica.com" />
        <meta property="og:type" content="album" />
        <meta property="og:url" content="Botica, notas, portafolio, proyectos" />
        <meta property="og:image" content="/images/logo.png" />
        <meta property="og:site_name" content="Botica.com" />
        <!--meta property="fb:admins" content="USER_ID1,USER_ID2"/-->
        <meta property="og:description" content="Botica, notas, portafolio, proyectos" />
        <?php endif;?>
        
    </head>
    <body class="home page page-id-5 page-template-default no-handheld webkit webkit-5">
        <span id="loadingin" style="display: none;"></span>
        <header id="page-header">
            <div class="logo">
                <a href="<?php echo url_for("@inicio")?>">
                    <img src="/images/menu/logo.png" alt="Botica" />
                </a>
            </div>
            <nav class="topnav" role="navigation">
                <ul>
                    <li class="page_item page-nosotros">
                        <a href="<?php echo url_for('nosotros')?>">
                            <span class="icon">&nbsp;</span>
                            <span class="link-text">Nosotros</span>
                        </a>
                    </li>
                    <li class="page_item page-servicios">
                        <a href="<?php echo url_for('servicios')?>">
                            <span class="icon">&nbsp;</span>
                            <span class="link-text">Servicios</span>
                        </a>
                    </li>
                    <li class="page_item page-portafolio">
                        <a href="<?php echo url_for('proyectos')?>">
                            <span class="icon">&nbsp;</span>
                            <span class="link-text">Portafolio</span>
                        </a>
                    </li>
                    <li class="page_item page-clientes">
                        <a href="<?php echo url_for('clientes')?>">
                            <span class="icon">&nbsp;</span>
                            <span class="link-text">Clientes</span>
                        </a>
                    </li>
                    <li class="page_item page-noticias">
                        <a href="<?php echo url_for('publicaciones')?>">
                            <span class="icon">&nbsp;</span>
                            <span class="link-text">Noticias</span>
                        </a>
                    </li>
                    <li class="page_item page-contacto">
                        <a href="<?php echo url_for('contacto')?>">
                            <span class="icon">&nbsp;</span>
                            <span class="link-text">Contacto</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <section role="main" id="content" style="display: block;">
            <?php echo $sf_content ?>
        </section>
        <footer class="row copyright">
            2013 &copy; All rights reserved, Botica
        </footer>
        <div id="background"></div>
        <?php include_javascripts() ?>
         
        <?php include_slot('background')?>
    </body>
</html>