<?php

?>



<?php //get_header(); 
$fbusca = isset($_GET['fbusca']) ? $_GET['fbusca'] : '';

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8"/>
        <title>Caminhos da Cultura</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="http://prceu.usp.br/_common/_assets/css/normalize.min.css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300,300italic,400italic,600italic,700italic,800italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300,300italic,400italic,600italic,700italic,800italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/themix.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/caminhos.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/fontawesome.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fonts/teatro4.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" media="all" />

<?php  
        $cor_principal = get_option("cor_principal");
        $cor_secundaria = get_option("cor_secundaria");
        $cor_fundo = get_option("cor_fundo");
        $cor_textos = get_option("cor_textos");
?>

<style type="text/css">
<?php if ( $cor_secundaria != "" ) : ?>

    body, .quadradodatahoje, .hide, .entry-header-hoje2, .entry-header .finalizado,.entry-header3 .finalizado,.quadradodatahoje, #site-navigation, .datanoticiahoje, .singlem, .numero, #site-navigation li, .evento .datanoticiahoje hr, .entry-header2 {
        background: <?php echo $cor_secundaria;?>;
        <?php //echo $cor_secundaria; ?>; 
    }
    .texto-secundario, .evento .datanoticiahoje, h2,#calendario li a:hover, .quadradodata, .info > h1, #content header, #proximos, #content a:hover, #content a:focus, .categoriamob {
        color: <?php echo $cor_secundaria ;?>;
    }
    .single article,.page article, blockquote ,.fb-like {
        border-color: <?php echo $cor_secundaria; ?>;
    }
    
    .site-title, h1, #filtros li .selecionado,.entry-header2 .finalizado  , #filtros li a:hover, .wp-caption-text, #content a, .event-date, .wp-caption-text,  #legenda, .nomefiltro, .nav-previous a {
        color: <?php echo $cor_principal; ?>;
    }
    .autor {
        border-color: <?php echo $cor_principal; ?>;
    }

    #filtros li, .page-template-search-php .topo, .search .topo, #calendario li, #searchbox, #nav-below, #search, .search, .search-results, .facebook, .evento, .faixa, #menu, #site-info, .hentry, .entry-header, .entry-header3 , hr, .entry-header-hoje {
        background: <?php echo $cor_principal; ?>;
    }
    #calendario li a:hover,#filtros li .selecionado,.entry-header2 .finalizado , .nav-previous, .nav-next, .page-template-search-php hr, #searchmenu hr, .search hr, #legenda, #site-navigation li a:hover, .datanoticiahoje hr , #primary, .evento hr,li #legenda, .dataslider-up hr, .evento .datanoticiahoje, .quadradodata, .twitter, .site-title, .event-date, .wp-caption-text, #filtros li a:active, #filtros li a:hover, #site-navigation li:first-of-type {
        background: <?php echo $cor_fundo; ?>;
    }
    #filtros li, input, .lupa , #search h2, .alert, .alert-warning, .finalizado, #searchbox h2, #primary2 h2,.sair, #searchmenu li a ,#content .sair a, #content .sair a:visited, .sair a, .resumo, #search, .fbusca, .evento a, .dataslider, .dataslider-up, .quadradodatahoje, #calendario li, #menu ul, #menu ul a, #site-info h1, #site-info, #primary li, #primary2 li, .categoria, #filtros li, #filtros li a, .datanoticiahoje, .event-title, .extras-lado, .endereco, .endereco a, .entry-header-up, .entry-header-up h1, #calendario li a, .entry-title, .next a, .prev a, .sem {
        color: <?php echo $cor_fundo; ?>;
    }
    body, .categorianormal, .subtitulo {
        color: <?php echo $cor_textos; ?>;
    }
    .event-info {
        border-color: <?php echo $cor_fundo; ?>;
    }
    
    
    @media (max-width: 767px) {
       
       body, .quadradodatahoje, #searchmenu, .quadradodatahoje, #site-info,#site-navigation,.datanoticiahoje, .single .evento, .numero, #menu {
            background: <?php echo $cor_secundaria; ?>; 
       }
       .texto-secundario, h2, .sem, .wp-caption-text, .quadradodata, .alert, .alert-warning,.info > h1, #proximos, #content a:hover, #content a:focus, #filtros {
            color: <?php echo $cor_secundaria; ?>;
       }
       
       .site-title, h1, #filtros li a:hover, #content a, .event-date, #legenda, .categoria, #content header, #menu {
            color: <?php echo $cor_principal; ?>;
       }
       #filtros li, #calendario li, .facebook, .evento, .faixa {
            background: <?php echo $cor_principal; ?>;
       }
       #primary, .entry-header2, #search, .search #content, .entry-header-hoje2, .quadradodata, .twitter, .site-title, .event-date, #filtros li a:active, #filtros li a:hover, #site-navigation li:first-of-type, .entry-header-hoje, .hentry, .entry-header,.entry-header3, #calendario li a:hover {
            background: <?php echo $cor_fundo; ?>;
       }
       #filtros li, .dataslider, .dataslider-up, .quadradodatahoje,.entry-header2 .finalizado, #calendario li, #menu ul, #menu ul a, #site-info h1, #site-info, #primary li, #filtros li, #filtros li a, .datanoticiahoje, .event-title, .extras-lado, .endereco, .endereco a, .entry-header-up, #calendario li a, .evento .categoria, .seta {
           color: <?php echo $cor_fundo; ?>;
       }
       body, .categorianormal, .search #primary2, #site-navigation a, .entry-title, .entry-header-up h1, li #legenda {
           color: <?php echo $cor_textos; ?>;
       }

       
    } 
    
    
    
<?php endif; ?>



</style>

        <?php wp_enqueue_script('jquery'); ?>
        <!-- begin wp_head( ) -->
        <?php wp_head(); ?>
        <!-- end wp_head( ) -->

    </head>

    <body class="search search-no-results logged-in admin-bar no-customize-support">
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
                «
            </div>
        </div>
        <div id="page" class="hfeed-site clearfix">

            <header id="masthead" class="site-header clearfix" role="banner">
                <a href= <?php echo home_url(); ?> > <h1 class="site-title">Caminhos <span class="texto-secundario">da Cultura</span>
                    <p class="subtitulo">Guia de cultura da Universidade de São Paulo</p></h1>
                </a>
                

                <nav id="menu">
                <a href= "#"> <h1 class="site-title">Caminhos <span class="texto-secundario">da Cultura</span>
                    <p class="subtitulo">Guia de cultura da Universidade de São Paulo</p></h1>
                </a> 
                <?php get_search_form();?>
                    <ul>
                        <a href="./quem-somos/"><li> Quem Somos </li></a><span class="min-hide">|</span><a href="./fale-conosco/"><li> Fale Conosco </li></a>
                    </ul>
                    <div id="calendario">
                        <ul>
                            <li><a href="#"><span class="face"></span></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>

                </nav>
<!---------------------------------------------------->

            </header><!-- #masthead -->


            <div id="main" class="site-main clearfix">
<div id="search" class="clearfix">
<div id="searchmenu">
 <div class="busca">
    
    <?php   get_search_form(); ?></div>
    
    <ul><h2>Categorias</h2>
       <li><a class="atividades-educativas" href="<?php echo get_home_url(); ?>/category/atividades-educativas/?s=<?php echo $_GET['s']; ?>">At. Educativas</a></li>
        <li><a class="cinema" href="<?php echo get_home_url(); ?>/category/cinema/?s=<?php echo $_GET['s']; ?>">Cinema</a></li>
        <li><a class="encontros" href="<?php echo get_home_url(); ?>/category/encontros/?s=<?php echo $_GET['s']; ?>">Encontros</a></li>
        <li><a class="exposicoes" href="<?php echo get_home_url(); ?>/category/exposicoes/?s=<?php echo $_GET['s']; ?>">Exposições</a></li>
        <li><a class="musica" href="<?php echo get_home_url(); ?>/category/musica/?s=<?php echo $_GET['s']; ?>">Música</a></li>
        <li><a class="teatro2" href="<?php echo get_home_url(); ?>/category/teatro/?s=<?php echo $_GET['s']; ?>">Teatro</a></li>
       

    </ul></div>
</div>

<div id="main" class="site-main clearfix">


                <div id="primary2" class="content-area clearfix">
                    <main id="content" class="clearfix">
                        <header class="topo clearfix">
                            <h2>Resultados</h2>
                                            <span class="sair"><a href="<?php echo home_url();?>"></a></span>
                        </header> 
                        
                 <section id="proximos" class="clearfix">
                            <div id="pai" class="clearfix">      
                
<?php    
   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  
   $loop = array( 
  'post_type' => 'evento', 'post', 'orderby' => 'name','order' => 'ASC', 'posts_per_page' => 30, 'category_name' => $categorias  );
   $loop = new WP_Query();    
    //  query_posts($loop);

if (  have_posts( ) ) : ?>
  
<?php while ( have_posts( ) ) : the_post( ); 
    $data1 = esc_html(get_post_meta(get_the_ID(), 'data_inicio', true));
    $data_i = converteData($data1, '/', '');
    $data2 = esc_html(get_post_meta(get_the_ID(), 'data_fim', true));
    $data_f = converteData($data2, '/', '');
    
    $preco = esc_html ( get_post_meta( get_the_ID( ), 'preco', true ));
    
?>
    
                        <article id="post-<?php the_ID(); ?>" class="hentry clearfix">
                                                                        <?php if ($data_i) : ?>
                                                                            
                                    <?php if ($data_i === date("Ymd") || $data_f === date("Ymd")) 
                                            echo '<div class="quadradodatahoje clearfix">';
                                             else 
                                             echo '<div class="quadradodata clearfix">';
                                            ?>
                                        <span class="dmes"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                        <span class="data"><?php echo date("j", strtotime($data_i)); ?></span>
                                    </div>
                                    <?php endif; ?>

                <div class="imagem">                   
                <?php
                    echo get_the_post_thumbnail(  $post->ID, 'thumbnail' ); ?></div>                           
                    <?php
                if (has_post_thumbnail()) {                
                    if ( $data_f > date("Ymd") || !$data_f) 
                        echo '<header class="entry-header">';
                    else
                        echo '<header class="entry-header3"><span class="finalizado">Evento encerrado</span>';
                }    
                else {
                
                if ( $data_f > date("Ymd") || !$data_f)
                    echo '<header class="entry-header2">';
                else
                    echo '<header class="entry-header2"><span class="finalizado">Evento encerrado</span>';}
                
                    ?>
                                        <a href="<?php the_permalink(); ?>">
                                        <div class="entry-header-up">
                                            <span class="categoria"><?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Carrossel') ) echo $category->cat_name . ' ';  ?>
                                            </span><h1 class="entry-title"><?php echo get_the_title(); ?></h1>
                                        </div>
                                        <div class="entry-meta">
                                            <?php if ( esc_html ( get_post_meta( get_the_ID( ), 'classificacao', true ))) :?>
                                            <div class="dataslider-up">
                                                <?php if ($data_i || $data_f) : ?>
                                                <?php if ( ($data_i && !$data_f) || (!$data_i && $data_f)  || $data_i === $data_f) : ?> 
                                                    <span class="dmes-up"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                                    <span class="data-up"><?php echo date("j", strtotime($data_i)); ?></span>
                                                <?php endif; ?>
                                                <?php if ( ($data_i && $data_f) && $data_i != $data_f ) : ?>                           
                                                    <div class="wrap"><span class="dmes-up"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                                    <span class="data-up"><?php echo date("j", strtotime($data_i)); ?></span></div><hr>
                                                    <div class="wrap"><span class="dmes-up"><?php echo date_i18n("M", strtotime($data_f)); ?></span>
                                                    <span class="data-up"><?php echo date("j", strtotime($data_f)); ?></span></div>
                                                <?php endif; ?><?php endif; ?></div>
                                           
                                            <div class="extras">
                                                <ul>
                                                    <li><span class="icon"></span> <?php echo esc_html ( get_post_meta( get_the_ID( ), 'classificacao', true )) ?> </li>
                                                    <li><span class="icon"> </span><?php 
                                                    if ($preco) 
                                                        echo 'R$' . $preco; 
                                                    else 
                                                        echo 'Grátis';
                                                    ?></li>

                                                   <!-- <li><span class="icon"></span> CINUSP </li>-->
                                                </ul>
                                            </div>
                                            <?php endif; ?>
                                        </div><!---entry meta ---></a>

                                    </header>

                                </article><!-- #post-<?php the_ID(); ?> -->
<?php       endwhile; ?>

    
    </div>
    </section>

    <?php       if ($wp_query->found_posts > get_option( 'posts_per_page' ) ) : ?>

                        <footer id="footer-nav-pages">
                            <nav id="nav-below">
                                <!-- <h3 class="assistive-text">Navegação de Posts</h3> -->
<?php           if ($paged < $wp_query->max_num_pages) : ?>
                                <div class="nav-next"><?php next_posts_link( '>>' ); ?></div>
<?php           endif; ?>
<?php           if ($paged > 1) : ?>
                                <div class="nav-previous"><?php previous_posts_link( '<<' ); ?></div>
<?php           endif; ?>
                            </nav><!-- #nav-below -->
                        </footer><!-- #footer-nav-pages -->
<?php       endif; ?>


<?php   else: ?>
                        <article id="post-0" class="post no-results not-found">


                            <div class="entry-content">
                                <div class="alert alert-warning">
                                    <strong>Nenhum evento encontrado</strong> <p>Por favor, verifique os termos da sua pesquisa.</p>
                                </div>

                              
                            </div><!-- .entry-content -->
                        </article><!-- #post-0 -->
<?php   endif; 
   wp_reset_query( );
   wp_reset_postdata();
   ?>
    
        
    </div>
    </section>





                           
                         
                               </div> <!--------------------------------------------------filler-------------------------->
                    
                    
                </div><!-- Primary2 -->
</div></div>


            </div><!-- #main-->

</div><!-- #page -->

<?php get_footer(); ?>
 
