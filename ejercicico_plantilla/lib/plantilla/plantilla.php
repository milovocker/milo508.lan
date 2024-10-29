<?php


    class Plantilla
    {

        static function header($titulo, $opciones = array())
        {
            $menu = '';
            if(!$opciones['ocultad_menu'])
            {
                $menu = self::menu();
            }

            return "
            
                    <!DOCTYPE html>
                    <html lang=\"en\">

                    <head>
                    <meta charset=\"utf-8\">
                    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">
                    <title>Milo 508-Zonzamas</title>
                    <meta name=\"description\" content=\"\">
                    <meta name=\"keywords\" content=\"\">

                    <!-- Favicons -->
                    <link href=\"assets/img/logo_icon.png\" rel=\"icon\">
                    <link href=\"assets/img/apple-touch-icon.png\" rel=\"apple-touch-icon\">

                    <!-- Fonts -->
                    <link href=\"https://fonts.googleapis.com\" rel=\"preconnect\">
                    <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\" crossorigin>
                    <link href=\"https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap\" rel=\"stylesheet\">

                    <!-- Vendor CSS Files -->
                    <link href=\"assets/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
                    <link href=\"assets/vendor/bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">
                    <link href=\"assets/vendor/aos/aos.css\" rel=\"stylesheet\">
                    <link href=\"assets/vendor/glightbox/css/glightbox.min.css\" rel=\"stylesheet\">
                    <link href=\"assets/vendor/swiper/swiper-bundle.min.css\" rel=\"stylesheet\">

                    <!-- Main CSS File -->
                    <link href=\"assets/css/main.css\" rel=\"stylesheet\">

                    <!-- =======================================================
                    * Template Name: QuickStart
                    * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
                    * Updated: Aug 07 2024 with Bootstrap v5.3.3
                    * Author: BootstrapMade.com
                    * License: https://bootstrapmade.com/license/
                    ======================================================== -->
                    </head>

                    <body class=\"index-page\">

            " .$menu;
        }


        static function menu()
        {
            return "
                      <header id=\"header\" class=\"header d-flex align-items-center fixed-top\">
                        <div class=\"container-fluid container-xl position-relative d-flex align-items-center\">

                        <a href=\"index.html\" class=\"logo d-flex align-items-center me-auto\">
                            <img src=\"assets/img/logo.png\" alt=\"\">
                            <h1 class=\"sitename\">Milo 508-Zonzamas</h1>
                        </a>

                        <nav id=\"navmenu\" class=\"navmenu\">
                            <ul>
                            <li><a href=\"index.php\" class=\"active\">Home</a></li>
                            <li><a href=\"biblioteca.php\">Biblioteca</a></li>
                            <li><a href=\"usuarios.php\">Usuarios</a></li>

                            <li><a href=\"#\">Contacto</a></li>
                            </ul>
                            <i class=\"mobile-nav-toggle d-xl-none bi bi-list\"></i>
                        </nav>

                        <a class=\"btn-getstarted\" href=\"index.php\">Comencemos</a>

                        </div>
                    </header>
            " ;
        }

        static function footer()
        {
            return "
            <footer id=\"footer\" class=\"footer position-relative light-background\">

                <img src=\"/assets/img/logo.png\" alt=\"\">

                <div class=\"container footer-top\">
                <div class=\"row gy-4\">
                    <div class=\"col-lg-4 col-md-6 footer-about\">
                    <a href=\"index.html\" class=\"logo d-flex align-items-center\">
                        <span class=\"sitename\">CIFP Zonzamas</span>
                    </a>
                    <div class=\"footer-contact pt-3\">
                        <p>Calle Dr. Barraquer, 6, 35500 Arrecife, Las Palmas</p>
                        <p class=\"mt-3\"><strong>Teléfono:</strong> <span>928 81 31 14</span></p>
                        <p><strong>Email:</strong> <span>cifpzonzamas@example.com</span></p>
                    </div>
                    <div class=\"social-links d-flex mt-4\">
                        <a href=\"https://www.facebook.com/cifp.zonzamas.3/?locale=es_ES\"><i class=\"bi bi-facebook\"></i></a>
                        <a href=\"https://www.instagram.com/cifp_zonzamas/?hl=es\"><i class=\"bi bi-instagram\"></i></a>
                    </div>
                    </div>

                    <div class=\"col-lg-2 col-md-3 footer-links\">
                    <h4>Enlaces útiles</h4>
                    <ul>
                        <li><a href=\"index.php\">Home</a></li>
                        <li><a href=\"#\">Sobre nosotros</a></li>
                    </ul>
                    </div>

                    <div class=\"col-lg-2 col-md-3 footer-links\">
                    <h4>Servicios</h4>
                    <ul>
                        <li><a href=\"#\">Web Design</a></li>
                        <li><a href=\"#\">Web Development</a></li>
                    </ul>
                    </div>

                </div>
                </div>

                <div class=\"container copyright text-center mt-4\">
                <p>© <span>Copyright</span> <strong class=\"px-1 sitename\">QuickStart</strong><span>All Rights Reserved</span></p>
                <div class=\"credits\">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you've purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                    Designed by <a href=\"https://bootstrapmade.com/\">BootstrapMade</a> Dist<a href=\"https://themewagon.com\">ThemeWagon
                </div>
                </div>

            </footer>
            ";
        }
    }