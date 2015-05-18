<?php
/*
Template Name: Search Page
*/
?>



<?php get_header(); 
$fbusca = isset($_GET['fbusca']) ? $_GET['fbusca'] : '';

?>


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
        <li><a class="todas" href="<?php echo get_home_url(); ?>/?s=<?php echo $_GET['s']; ?>">Todas as categorias</a></li>
    </ul>
    </div>
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
                                            <span class="categoria"><?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Destaques') ) echo $category->cat_name . ' ';  ?>
                                            </span>
                                            <h1 class="entry-title">
                                                <?php
                                                    $displaytitle = "";
                                                    $wholetitle = get_the_title();
                                                    if ( strlen( $wholetitle ) >= 60  ) {
                                                        for ($i=0; $i < 65; $i++) { 
                                                            $displaytitle = $displaytitle . $wholetitle[$i];
                                                        }
                                                        $displaytitle = $displaytitle . '...';
                                                    } else {
                                                        $displaytitle = $wholetitle;
                                                    }
                                                    echo $displaytitle;
                                                ?>
                                            </h1>
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
 
