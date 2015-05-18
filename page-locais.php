<?php get_header(); ?>
 

<body class="single">
<div class="clip">

<?php

if (get_post(get_post_thumbnail_id()) -> post_excerpt) {
    echo '<div id="legenda"><span class="categoriamob">' . $category = get_the_category();
    echo $category[0] -> cat_name . '<br></span>' .    get_post(get_post_thumbnail_id()) -> post_excerpt . '</div>';
}

?>
                <?php
                if (has_post_thumbnail()){
                    
                        if ( is_mobile() )
                            echo the_post_thumbnail( 'celular' );
                        else if (has_post_thumbnail())
                            echo the_post_thumbnail( 'large' );
                }
                else { echo '<img src="'; header_image(); echo '" />'; } 
                
 ?>
                            </div>


            </header><!-- #masthead -->


            <div id="main" class="site-main clearfix">

                <div id="primary" class="content-area clearfix">
                    <main id="content" class="clearfix">
                        <header class="topo clearfix">
                            <h2>Espaços culturais<span class="nomefiltro"></span></h2>
                          
                        </header>

   
 <section id="proximos" class="clearfix">
     <div id="pai" class="clearfix">
         
                        
<?php  
wp_reset_query( );    

    $mypost = array( 
    'post_type' => 'local',    
    'orderby' => 'title',
    'order' => 'ASC', 
    'posts_per_page' => 30 ,
   /* 'category_name' => 'local'*/ ); 

    $loop = new WP_Query( $mypost ); 

    while ( $loop->have_posts( ) ) : $loop->the_post( );
    
?>
                                <article id="post-<?php the_ID(); ?>" class="hentry clearfix">
                                    <?php if ($data_i) : ?>
                                    <div class="quadradodata clearfix">
                                        <span class="dmes"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                        <span class="data"><?php echo date("j", strtotime($data_i)); ?></span>
                                    </div>
                                    <?php endif; ?>
                <div class="imagem">                   
                <?php
                    echo get_the_post_thumbnail(  $post->ID, 'thumbnail' ); ?></div>                           
                    <?php
                if (has_post_thumbnail()) 
                echo '<header class="entry-header">';
                else 
                echo '<header class="entry-header2">';
                    ?>
                                        <a href="<?php the_permalink(); ?>">
                                        <div class="entry-header-up">
                                            <span class="categoria"><?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Carrossel') ) echo $category->cat_name . ' '; ?>
                                            </span><h1 class="entry-title"><?php echo get_the_title(); ?></h1>
                                        </div>
                                        <div class="entry-meta">
                                          
                                            <div class="extras">
                                                
                                                
                                                <ul><?php $locais = get_post_meta($post -> ID, 'locais', true); ?>
                                                    <?php foreach ((array)$locais as $local) : ?>
                                                        <?php if ($local['semana1'] ) 
                                                        echo '<li><span class="icon"></span> ' . $local['semana1'] .' </li>';
                                                    if ($local['segunda_i'] ) echo '<li><span class="icon">  </span>' .  $local['segunda_i'] .' - ' . $local['segunda_f'] .'</li>';
                                                    ?>
                                                    <?php endforeach;?>
                                                   <!-- <li><span class="icon"></span> CINUSP </li>-->
                                                </ul>
                                                
                                            </div>
                                        </div><!---entry meta ---></a>

                                    </header>

                                </article><?php endwhile;?>
                            </div>
                                </section>
                    </main>
                </div><!-- Primary -->
                <div id="calendario">
                    <ul>
                        <li><a href="#" id="caixa" ></a></li>
                        <li><a href="https://www.facebook.com/caminhosdaculturausp"><span class="face"></span></a></li>
                        <li><a href="https://twitter.com/caminhosusp"></a></li>
                    </ul>
                </div>


              
            </div><!-- #main-->


<?php get_footer(); ?> 
