<?php get_header(); ?>

<body class="page">
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
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php $post = get_post(get_the_ID()); ?>
                            <?php $post_parent = get_post($post->post_parent); ?>
            <div id="primary" class="content-area clearfix">
                <main id="content" class="clearfix">
                    <article>
                        <header class="topo clearfix">

                            <div class="info">
                                <span class="categorianormal">
                                    <?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Carrossel') ) echo $category->cat_name . ' ';  ?></span>
                                <h2> <?php echo get_the_title(); ?></h2>
                            </div>
                        </header>
                        <?php the_content() ?>

                    </article><?php endwhile;?>
                </main>

            </div><!-- Primary -->
           <div id="calendario">
                <ul>
                    <li><a href="#" id="caixa"></a></li>
                    <li><a href="https://www.facebook.com/caminhosdaculturausp"><span class="face"></span></a></li>
                    <li><a href="https://twitter.com/caminhosusp"></a></li>
                </ul>
            </div>

        </div><!-- #main-->

        <?php get_footer(); ?>
