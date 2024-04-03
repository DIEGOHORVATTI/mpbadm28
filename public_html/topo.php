<header class="header-six">
    <!-- Start top bar -->
    <div class="topbar-area topbar-area-6 fix hidden-xs">
        <div class="container">
            <div class="row">
                <div class=" col-md-8 col-sm-6">
                    <div class="topbar-left">
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope"></i> contato@mpbadmjudicial.com.br</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i> (65) 3365-4103</a></li>                                   
                        </ul>  
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                <!-- 
                  <div class="top-social">
                    <span class="share-link">Redes Sociais:</span>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                    </ul> 
                  </div>
                -->
                </div>
            </div>
        </div>
    </div>

    <!-- header-area start -->
    <div id="sticker" class="header-area header-area-6 hidden-xs">
        <div class="container">
            <div class="row">
                <!-- logo start -->
                <div class="col-md-3 col-sm-3">
                    <div class="logo">
                        <!-- Brand -->
                        <a class="navbar-brand page-scroll sticky-logo" href="index.php">
                            <img src="arquivos/img/logo/logo3.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- logo end -->
                <div class="col-md-9 col-sm-9">
                    <div class="header-right-link">
                        <div class="slice-btn"><span class="icon icon-menu"></span></div>
                    </div>

                    <!-- mainmenu start -->
                    <nav class="navbar navbar-default">
                        <div class="collapse navbar-collapse" id="navbar-example">
                            <div class="main-menu">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="quem-somos.php">SOBRE</a></li>
                                    <!--<li><a href="equipe.php">EQUIPE</a></li>-->
                                    <li><a href="cadastro.php">CADASTRO</a></li>                                            
                                    <li><a href="falencias.php">FAL&Ecirc;NCIAS</a></li>
                                    <li><a href="recuperacoes-judiciais.php">RECUPERA&Ccedil;&Atilde;O JUDICIAL</a></li>
                                    <li><a href="logar.php">ENVIAR DOCUMENTOS</a></li>                                             
                                    <li><a href="noticias.php">NOT&Iacute;CIAS</a></li>                                                                           
                                    <li><a href="contato.php">CONTATO</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- mainmenu end -->
                </div>
            </div>
        </div>
    </div>

    <!-- mobile-menu-area start -->
    <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-right-link">
                        <div class="slice-btn"><span class="icon icon-menu"></span></div>
                    </div>
                    <div class="mobile-menu">
                        <div class="logo">
                            <a href="index.php"><img src="arquivos/img/logo/logo.png" alt="" /></a>
                        </div>
                        <nav id="dropdown">
                            <ul>
                                    <li><a href="quem-somos.php">SOBRE</a></li>
                                    <!--<li><a href="equipe.php">EQUIPE</a></li>-->
                                    <li><a href="cadastro.php">CADASTRO</a></li>                                            
                                    <li><a href="falencias.php">FAL&Ecirc;NCIAS</a></li>
                                    <li><a href="recuperacoes-judiciais.php">RECUPERA&Ccedil;&Atilde;O JUDICIAL</a></li>
                                    <li><a href="logar.php">ENVIAR DOCUMENTOS</a></li>                                             
                                    <li><a href="noticias.php">NOT&Iacute;CIAS</a></li>                                                                           
                                    <li><a href="contato.php">CONTATO</a></li>                                                                     
                            </ul>
                        </nav>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area end -->       
</header>

<div class="layer-drop"></div>

<div class="appointment-wrapper">
    <div class="appoint-box">
        <div class="cross-icon"><span class="icon icon-cross"></span></div>
        <div class="title">
            <h2>Entre em Contato</h2>
            <div class="separator"></div>
        </div>
        <div class="contact-icon">
            <div class="single-contact">
                <a href="#"><i class="fa fa-map"></i><span>Rua Mistral, N&ordm; 09, ED. The Point, Sala 407<br />Despraiado - Cuiab&aacute;/MT - CEP: 78048-222</span></a>
                <a href="#"><i class="fa fa-phone"></i><span>(65) 3365-4103</span></a>
                <a href="#"><i class="fa fa-envelope"></i><span>contato@mpbadmjudicial.com.br</span></a>   
            </div>
            <!-- <div class="quote-icons">
                <h5>Redes Sociais</h5>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                </ul>
            </div>-->
        </div>
        <div class="row form-row">
            <form id="contactForm" method="POST" action="contact.php" class="contact-form">
                <div class="col-md-12 inner-column col-sm-12 col-xs-12">
                    <input type="text" id="name" class="form-control" placeholder="Nome" required data-error="Digite seu nome">
                    <div class="help-block with-errors"></div>
                    <input type="email" class="email form-control" id="email" placeholder="E-Mail" required data-error="Digite seu email">
                    <div class="help-block with-errors"></div>
                    <input type="text" id="msg_subject" class="form-control" placeholder="Assunto" required data-error="Digite o Assunto">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="col-md-12 inner-column col-sm-12 col-xs-12">
                    <textarea id="message" rows="7" placeholder="Mensagem" class="form-control" required data-error="Digite sua mensagem"></textarea>
                    <div class="help-block with-errors"></div>
                    <button type="submit" id="submit" class="quote-btn">Enviar</button>
                    <div id="msgSubmit" class="h3 hidden"></div> 
                    <div class="clearfix"></div>
                </div>   
            </form>
        </div>
    </div>
</div>
