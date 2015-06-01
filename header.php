<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8"/>
        <title>Caminhos da Cultura</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="http://prceu.usp.br/_common/_assets/css/normalize.min.css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300,300italic,400italic,600italic,700italic,800italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/themix.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/caminhos.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/caminhos_v1.2/styles.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/fontawesome.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/flaticon.css" media="all" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/teatro4.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" media="all" />

         <?php echo $_POST['tamanho']; ?>
<?php  
        $cor_principal = get_option("cor_principal");
        $cor_secundaria = get_option("cor_secundaria");
        $cor_fundo = get_option("cor_fundo");
        $cor_textos = get_option("cor_textos");
        $cor_titulos = get_option("cor_titulos");
?>

<style type="text/css">
<?php if ( $cor_secundaria != "" ) : ?>

    body, .quadradodatahoje, #filtros li,.hide, .entry-header-hoje2,  #legenda, .entry-header .finalizado, .topo .finalizado,.entry-header3 .finalizado,.quadradodatahoje, #site-navigation, .datanoticiahoje, .singlem,  #site-navigation li, .evento .datanoticiahoje hr, .entry-header2 {
        background: <?php echo $cor_secundaria;?>;
        
    }
    .texto-secundario, .evento .datanoticiahoje, h2,#calendario li a:hover, .quadradodata, .info > h1, #content header, #proximos, #content a:hover, #content a:focus {
        color: <?php echo $cor_secundaria ;?>;
    }
    .single article,.page article, blockquote ,.fb-like {
        border-color: <?php echo $cor_secundaria; ?>;
    }
    #calendario li{
        box-shadow: 0 0 0pt 2pt <?php echo $cor_principal; ?>;
    }
    #filtros li{
        box-shadow: 0 0 0pt 2pt <?php echo $cor_secundaria; ?>;
    }
    .site-title, h1, #filtros li .selecionado,.entry-header2 .finalizado, #filtros li a:hover, .wp-caption-text, #content a, .event-date, .wp-caption-text,  .nav-previous a {
        color: <?php echo $cor_principal; ?>;
    }
    .autor {
        border-color: <?php echo $cor_principal; ?>;
    }

    .page-template-search-php .topo, .search .topo, #calendario li, #searchbox ,.numero, .topo h2, #nav-below, #search, .search, .search-results, .facebook, .evento, .faixa, #menu, #site-info, .hentry, .entry-header, .entry-header3 , hr, .entry-header-hoje {
        background: <?php echo $cor_principal; ?>;
    }
    #calendario li a:hover,#filtros li .selecionado,.entry-header2 .finalizado , .nav-previous, .nav-next, .page-template-search-php hr, #searchmenu hr, .search hr, #site-navigation li a:hover, .datanoticiahoje hr , #primary, .evento hr, .dataslider-up hr, .evento .datanoticiahoje, .quadradodata, .twitter, .site-title, .event-date, .wp-caption-text, #filtros li a:active, #filtros li a:hover, #site-navigation li:first-of-type {
        background: <?php echo $cor_fundo; ?>;
    }
    #filtros li, input, .lupa , #search h2, .alert, .alert-warning, .topo .finalizado,.finalizado, #searchbox h2, #primary2 h2,.sair, #searchmenu li a ,#content .sair a, #content .sair a:visited, .sair a, .resumo, #search, .fbusca, .evento a, .dataslider, .dataslider-up, .quadradodatahoje, #calendario li, #menu ul, #menu ul a, #site-info, #primary li, #primary2 li, .categoria, #filtros li, #filtros li a, .datanoticiahoje, .event-title, .extras-lado, .endereco, .endereco a,  #calendario li a, .entry-title, .next a, .prev a, .sem, .categoriamob , li #legenda{
        color: <?php echo $cor_fundo; ?>;
    }
    body, .categorianormal, .subtitulo {
        color: <?php echo $cor_textos; ?>;
    }
    .event-info, input {
        border-color: <?php echo $cor_fundo; ?>;
    }
    .evento .categoria, .evento .event-title, #menu ul a, .resumo, .lupa, #menu ul, .extras-lado, .evento a, .event-info, .endereco, .dataslider-up, 
    .evento hr, #site-info, #calendario li a, .datanoticiahoje, #site-info a,#site-info h1, .entry-header-up,.entry-meta, #primary li, .entry-header-up h1 {
        color: <?php echo $cor_titulos; ?>;
    }
    .datanoticiahoje hr, .entry-meta hr, .evento hr,.dataslider-up hr{
        background: <?php echo $cor_titulos; ?>;
    }
    .event-info{
        border-color: <?php echo $cor_titulos; ?>
    }
      /*--------------com fundo colorido ----------------------------*/
    #boxmateria {
        background: <?php echo $cor_principal;?>;
    }
    #boxmateria .categoria, #boxmateria h1, #boxmateria h2 ,#legenda{
        color: <?php echo $cor_titulos; ?>;
    }    
    #boxmateria .topo{
        border-color: <?php echo $cor_titulos; ?>;
    }
    #boxmateria .hentry{
        border-color: <?php echo $cor_titulos; ?>!important;
    }
    #boxmateria .nomefiltro {
        color: <?php echo $cor_secundaria; ?>;
    }
    #boxmateria hr{
        background: <?php echo $cor_titulos; ?>;
    }
        /*--------------fundo branco 2 ------------------*/
    #boxmateria {
        background: <?php echo $cor_fundo;?>;
    }
    #boxmateria h1 {
        color: <?php echo $cor_secundaria; ?>;
    }
    #boxmateria .categoria {
        color: <?php echo $cor_textos; ?>
    }
    #boxmateria .topo {
        border-color: <?php echo $cor_secundaria; ?>;
    }
    #boxmateria hr{
        background: <?php echo $cor_secundaria; ?>;
    }
    #boxmateria .hentry{
        border-color: <?php echo $cor_secundaria; ?>!important;
    }
    .nomefiltro, .nomefiltro2, #boxmateria h2  {
        color: <?php echo $cor_fundo; ?>;
    }
    /*--------------------com fundo branco-----------------------------*/
    #boxmateria{
        background: <?php echo $cor_fundo;?>;
    }
    #boxmateria .categoria {
        color: <?php echo $cor_textos; ?>
    }
    #boxmateria .topo ,#boxmateria hr{
        border-color: <?php echo $cor_secundaria; ?>;
    }
    #boxmateria hr{
        background: <?php echo $cor_secundaria; ?>;
    }

    #boxmateria .hentry{
        border-color: <?php echo $cor_principal; ?>!important;
    }
    #boxmateria .nomefiltro, #boxmateria h1 ,#boxmateria .nomefiltro2 {
        /*color: <?php echo $cor_secundaria; ?>;*/
    } 
       
    
    @media (max-width: 767px) {
       
    #boxmateria {
        background: <?php echo $cor_fundo;?>;
    }
    #boxmateria h2{
        color: <?php echo $cor_fundo; ?>
     }
    #boxmateria h1 {
        color: <?php echo $cor_textos; ?>
    }
    #boxmateria{
        border-color: <?php echo $cor_principal; ?>
    }
    #boxmateria .hentry{
        border-color: <?php echo $cor_secundaria; ?>!important;
    }
    #boxmateria .nomefiltro, #boxmateria .categoria {
        color: <?php echo $cor_secundaria; ?>;
    }
    
    /*-----------------------------*/
/*    #boxmateria {
        background: <?php echo $cor_principal;?>;
/*    }
/*    #boxmateria .categoria, #boxmateria h1, #boxmateria h2 {
/*        color: <?php echo $cor_titulos; ?>;
 /*   }    
   /* #boxmateria .topo{
        border-color: <?php echo $cor_titulos; ?>;
/*    }
/*    #boxmateria .hentry{
        background:0;
        border-color: <?php echo $cor_titulos; ?>!important;
/*    }
/*    #boxmateria .nomefiltro {
        color: <?php echo $cor_secundaria; ?>;
/*    }
    #boxmateria hr{
        background: <?php echo $cor_titulos; ?>;
/*    }
    /*---------------------------------------------*/

  
       body, .quadradodatahoje, #searchmenu, .quadradodatahoje, #site-info,.entry-header2 .finalizado ,#site-navigation,.datanoticiahoje, .single .evento, .numero, #menu {
            background: <?php echo $cor_secundaria; ?>; 
       }
       .texto-secundario, h2, .sem, .wp-caption-text, .quadradodata,.mais, .alert, .alert-warning,.info > h1, #proximos, #content a:hover, #content a:focus, #filtros {
            color: <?php echo $cor_secundaria; ?>;
       }
       
       .site-title, h1, #filtros li a:hover, #content a, .event-date, #legenda, .categoria, #content header, #menu {
            color: <?php echo $cor_principal; ?>;
       }
       #filtros li, #calendario li, .facebook, .evento, .faixa {
            background: <?php echo $cor_principal; ?>;
       }
       
       #primary, .entry-header2, #search, .search #content, .entry-header-hoje2, .quadradodata, .twitter, .site-title, .event-date, #filtros li a:active, #filtros li a:hover, #site-navigation li:first-of-type, 
       .entry-header-hoje, .hentry, .entry-header,.entry-header3, #calendario li a:hover {
            background: <?php echo $cor_fundo; ?>;
       }
       #filtros li, .dataslider, .dataslider-up, .quadradodatahoje,.entry-header2 .finalizado, #calendario li, #menu ul, #menu ul a, #primary li, #filtros li, #filtros li a, 
       .datanoticiahoje, .event-title, .extras-lado, .endereco, .endereco a, .entry-header-up, #calendario li a, .evento .categoria, .seta {
           color: <?php echo $cor_fundo; ?>;
       }
       body, .categorianormal, .search #primary2, #site-navigation a, .entry-title, .entry-header-up h1 {
           color: <?php echo $cor_textos; ?>;
       }
       .evento .categoria, .evento .event-title, #menu ul a,.resumo,#menu ul,#site-info h1, .extras-lado, .evento a, .event-info, .endereco, .dataslider-up, .evento hr, #site-info,#site-info a, #site-info h1, #calendario li a, 
       .datanoticiahoje, .entry-header-up,.entry-meta, #primary li,/*.entry-header-up h1*/ {
          color: <?php echo $cor_titulos; ?>;
       }
       .datanoticiahoje hr, .entry-meta hr,.evento hr, .dataslider-up hr {
           background: <?php echo $cor_titulos; ?>;
       }
    } 
    
    
    
<?php endif; ?>



</style>





        <?php wp_enqueue_script('jquery'); ?>
        <!-- begin wp_head( ) -->
        <?php wp_head(); ?>
        <!-- end wp_head( ) -->

    </head>

    <body <?php body_class() ?>>
      <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '327105904109780',
          xfbml      : true,
          version    : 'v2.0'
        });
      };


(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=327105904109780&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <div class="faixa">
            <div class="seta">
                « »
            </div>
        </div>
        <div id="page" class="hfeed-site clearfix">

            <header id="masthead" class="site-header clearfix" role="banner">
                <a href= "<?php echo home_url(); ?>" >
                    <h1 class="site-title"><?php include "/_assets/images/caminhoscult.svg.php"; ?></h1>
                    <!--h1 class="site-title fade">Caminhos <span class="texto-secundario">da Cultura</span></h1-->
                </a>
                

                <nav id="menu">
                <a href= "<?php echo home_url(); ?> "> 
                    <h1 class="site-title"><?php include "/_assets/images/caminhoscult.svg.php"; ?></h1>                    
                </a> 
                <?php //get_search_form();?>
                
                    <ul>
                        <a href="./locais/"><li> Espaços culturais </li></a><span class="min-hide">|</span><a href="./quem-somos/"><li> Quem Somos </li></a><span class="min-hide">|</span><a href="./fale-conosco/"><li> Fale Conosco </li></a>
                    </ul>
                    <div id="calendario">
                        <ul>
                            <li><a href="#" id="caixa2" ></a></li><li><a href="https://www.facebook.com/caminhosdaculturausp"><span class="face"></span></a></li><li><a href="https://twitter.com/caminhosusp"></a></li>
                        </ul>
                    </div>

                </nav>
