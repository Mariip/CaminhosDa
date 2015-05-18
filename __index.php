<?php get_header(); ?>
 
<?php
/*function converteData($data, $se, $ss) {
        return implode($ss, array_reverse(explode($se, $data)));
    }*/

$filtros = isset($_GET['filtros']) ? $_GET['filtros'] : '';

?>

 <div id="carrossel">

                    <div id="slides">
                        <ul>
                            <?php       
    $cabecalho = array( 'post_type' => 'evento', 'meta_query' =>array(array('key' => 'data_fimc' ,'value' => date('Ymd'),'type' => 'date','compare' => '>='),),
    'orderby' => 'title', 'order' => 'DESC', 'posts_per_page' => 10, 'category_name' => 'destaques' 
    ); 
    $loop = new WP_Query( $cabecalho ); 

while ( $loop->have_posts( ) ) : $loop->the_post( ); 

    $data1 = esc_html(get_post_meta(get_the_ID(), 'data_inicio', true));
    $data_i = converteData($data1, '/', '');

    $data2 = esc_html(get_post_meta(get_the_ID(), 'data_fim', true));
    $data_f = converteData($data2, '/', '');
    
    $preco = esc_html ( get_post_meta( get_the_ID( ), 'preco', true ));


?>
                            <li><a href="<?php the_permalink(); ?>">
                                <div class="clip">
                                    <?php if($data_i) : ?>
                                    <?php //if ($data_i === date("Ymd") || $data_f === date("Ymd")) 
                                            echo '<div class="quadradodatahoje clearfix">';
                                            // else 
                                            // echo '<div class="quadradodata clearfix">';
                                            ?>
                                        <span class="dmes"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                        <span class="data"><?php echo date("j", strtotime($data_i)); ?></span>
                                    </div><?php endif; ?>
                                    <div id="legenda" class="fade" >
                                        <span class="categoriamob"><?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Destaques') ) echo $category->cat_name . ' '; ?>
                                            <br>
                                        </span><?php echo get_the_title(); ?>
                                    </div>
                <?php
                if (has_post_thumbnail() && is_mobile() )
                    echo get_the_post_thumbnail(  $post->ID, 'celular' );
                else if (has_post_thumbnail())
                    echo get_the_post_thumbnail(  $post->ID, 'large' );
                ?>
                                </div></a></li><?php endwhile; ?> 
                                
<?php       
    $cabecalho2 = array( 'post_type' => 'post', 'orderby' => 'title', 'order' => 'DESC', 'posts_per_page' => 10, 'category_name' => 'Destaques' 
    ); 
    $loop3 = new WP_Query( $cabecalho2 ); 
    while ( $loop3->have_posts( ) ) : $loop3->the_post( ); 

?>
                            <li><a href="<?php the_permalink(); ?>">
                                <div class="clip">
                                    <div id="legenda" class="fade">
                                        <span class="categoriamob"><?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Destaques') ) echo $category->cat_name . ' '; ?>
                                            <br>
                                        </span><?php echo get_the_title(); ?>
                                    </div>
                <?php
                if (has_post_thumbnail() && is_mobile() )
                    echo get_the_post_thumbnail(  $post->ID, 'celular' );
                else if (has_post_thumbnail())
                    echo get_the_post_thumbnail(  $post->ID, 'large' );
                ?>
                                </div></a></li><?php endwhile; ?> 
                                
                           

                        </ul>
                    </div>
                   
                    
                    
                    <div class="prev">
                        <a id="prev" href="#">&lt;&lt;</a>
                    </div>
                    <div class="next">
                        <a id="next" href="#">&gt;&gt;</a>
                    </div>
                </div>

            </header><!-- #masthead -->

  <?php 

    $cinema = array('category_name' => 'cinema',  'post_type' => 'evento',  'meta_query' =>array(array('key' => 'data_fimc' ,'value' => date('Ymd'),'type' => 'date','compare' => '>='),),);
    $ncinema = new WP_Query( $cinema );
    
    $educativas = array('category_name' => 'atividades-educativas','post_type' => 'evento','meta_query' =>array(array('key' => 'data_fimc' ,'value' => date('Ymd'),'type' => 'date','compare' => '>='),),);
    $neducativas = new WP_Query( $educativas );

    $encontros = array('category_name' => 'encontros','post_type' => 'evento','meta_query' =>array(array('key' => 'data_fimc' ,'value' => date('Ymd'),'type' => 'date','compare' => '>='),),);
    $nencontros = new WP_Query( $encontros );
        
    $exposicoes = array('category_name' => 'exposicoes','post_type' => 'evento','meta_query' =>array(array('key' => 'data_fimc' ,'value' => date('Ymd'),'type' => 'date','compare' => '>='),),);
    $nexposicoes = new WP_Query( $exposicoes );
        
    $musica = array('category_name' => 'musica','post_type' => 'evento','meta_query' =>array(array('key' => 'data_fimc' ,'value' => date('Ymd'),'type' => 'date','compare' => '>='),),);
    $nmusica = new WP_Query( $musica );
        
    $teatro = array('category_name' => 'teatro','post_type' => 'evento','meta_query' =>array(array('key' => 'data_fimc' ,'value' => date('Ymd'),'type' => 'date','compare' => '>='),),);
    $nteatro = new WP_Query( $teatro );
    
?>
            <div id="main" class="site-main clearfix">

                <div id="primary" class="content-area clearfix">
                    <main id="content" class="clearfix">
                        <header class="topo clearfix">
                            <h2>Agenda<span class="nomefiltro"></span></h2>
                            <nav id="filtros">
                                <ul>
                                    <li><a class="filtro atividades-educativas" data-filtro="atividades-educativas" href="#">  </a>
                                        <?php if ($neducativas->found_posts ) : ?>
                                        <div class="numero">                                            
                                                   <?php echo $neducativas->found_posts ; ?> 
                                        </div><?php  endif;?>
                                        </li><!--
                                    --><li><a class="filtro cinema" data-filtro="cinema" href="#">  </a>
                                        <?php if ($ncinema->found_posts ) : ?>
                                        <div class="numero"><?php echo $ncinema->found_posts ?> 
                                        </div><?php endif;?>
                                    </li><!--
                                    --><li><a class="filtro encontros" data-filtro="encontros" href="#">  </a>
                                        <?php if ($nencontros->found_posts ) : ?>
                                        <div class="numero"><?php echo $nencontros->found_posts; ?> 
                                        </div><?php endif;?>
                                    </li><!--
                                    --><li><a class="filtro exposicoes" data-filtro="exposicoes" href="#">  </a>
                                        <?php if ($nexposicoes->found_posts ) : ?>
                                        <div class="numero"><?php echo $nexposicoes->found_posts; ?>  
                                        </div><?php endif;?>
                                    </li><!--
                                    --><li><a class="filtro musica" data-filtro="musica" href="#">  </a>
                                        <?php if ($nmusica->found_posts ) : ?>
                                        <div class="numero"><?php echo $nmusica->found_posts; ?>
                                        </div><?php endif;?>
                                    </li><!--
                                    --><li><span class="filtro teatro"> <a class="filtro teatro2" data-filtro="teatro" href="#"> </a></span>
                                        <?php if ($nteatro->found_posts ) : ?>
                                        <div class="numero"><?php echo $nteatro->found_posts; ?> 
                                        </div><?php endif;?>
                                    </li>
                                   
                                </ul>
                            </nav>
                        </header>

   
<section id="hoje" class="hoje clearfix">
                        
                                <?php  
wp_reset_query( );

    

    $mypost = array( 
    'post_type' => 'evento',
    'meta_query' => array( 
    'relation' => 'OR',
        array(
            'key' => 'data_inicioc' ,
            'value' => date('Ymd'),
            'type' => 'date',
            'compare' => '='
        ),
        array(
            'key' => 'data_fimc' ,
            'value' => date('Ymd'),
            'type' => 'date',
            'compare' => '='
        ),
),
   'orderby' => 'meta_value','order' => 'ASC', 'posts_per_page' => 30 ,'category_name' => $categorias ); 

    $loop = new WP_Query( $mypost ); 

    while ( $loop->have_posts( ) ) : $loop->the_post( ); 
    
    $data1 = esc_html(get_post_meta(get_the_ID(), 'data_inicio', true));
    $data_i = converteData($data1, '/', '');

    $data2 = esc_html(get_post_meta(get_the_ID(), 'data_fim', true));
    $data_f = converteData($data2, '/', '');    
        
    $preco = esc_html ( get_post_meta( get_the_ID( ), 'preco', true ));

    
?>


                            <div id="pai" class="clearfix">
                            <a href="<?php the_permalink(); ?>">
                                <article id="post-<?php the_ID(); ?>" class="hentry-first clearfix">
                                    <?php if($data_i) : ?>
                                    <div class="quadradodatahoje clearfix">
                                        <span class="dmes"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                        <span class="data"><?php echo date("j", strtotime($data_i)); ?></span>
                                    </div><?php endif; ?>
                                    
                                          <div class="imagem">                   
                                                        <?php
                                                        if (has_post_thumbnail())
                                                            echo get_the_post_thumbnail(  $post->ID, 'large' );                                                       
                                                        else { echo '<img src="';
                                                            header_image();
                                                            echo '" />';
                                                        }
                                         ?></div>
                       
                    <?php
                if (has_post_thumbnail()) 
                echo '<header class="entry-header-hoje">';
                else 
                echo '<header class="entry-header-hoje2">';
                    ?>
                                    
                                        <div class="entry-header-up">
                                            <span class="categoria"><?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Destaques') ) echo $category->cat_name . ' '; ?>
                                                
                                            </span><h1 class="entry-title"><?php echo get_the_title(); ?></h1>
                                        </div>

                                        <div class="entry-meta-hoje">
                                            <div class="resumo">
                                                <?php echo the_excerpt_max_charlength(260); ?>

                                            </div>
                                            <div class="extras">
                                                <ul>
                                                    <li><span class="icon"></span> <?php echo esc_html ( get_post_meta( get_the_ID( ), 'classificacao', true )) ?> </li>
                                                    <li><span class="icon">  </span><?php 
                                                    if ( get_post_meta( get_the_ID( ), 'preco', true ) ) 
                                                        echo 'R$' . esc_html( get_post_meta( get_the_ID( ), 'preco', true )) ; 
                                                    else 
                                                        echo 'Grátis';
                                                    ?>
                                                        </li>
                                                </ul>
                                            </div>
                                              <div class="dataslider-up">
                                              <?php if ( ($data_i && !$data_f) || (!$data_i && $data_f)  || $data_i === $data_f) : ?> 
                                                    <span class="dmes-up"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                                    <span class="data-up"><?php echo date("j", strtotime($data_i)); ?></span>
                                                <?php endif; ?>
                                                <?php if ( ($data_i && $data_f) && $data_i != $data_f ) : ?>                           
                                                    <div class="wrap"><span class="dmes-up"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                                    <span class="data-up"><?php echo date("j", strtotime($data_i)); ?></span></div><hr>
                                                    <div class="wrap"><span class="dmes-up"><?php echo date_i18n("M", strtotime($data_f)); ?></span>
                                                    <span class="data-up"><?php echo date("j", strtotime($data_f)); ?></span></div>
                                                <?php endif; ?></div>
                                           
                                          
                                        </div>
                                    </header>
                                    
                                </article></a>
                            </div>
      <?php /*$number_of_posts = (have_posts()) ? sizeof($wp_query->loop) : 0;
  if( $number_of_posts < '1') echo '<hr>';*/ ?>                  
                        <?php endwhile; ?></section>

                        
                        <section id="proximos" class="clearfix">
                            <div id="pai" class="clearfix">
                                 
<?php   
   wp_reset_query( );

   
  
   if( !$filtros ) {
 
        $mypost = array( 
            'post_type' => 'evento',
             'meta_query' =>array('relation' => 'AND',
                array(
                    'key' => 'data_fimc' ,
                    'value' => array($data_fimc,(date('Ymd'))),
                    'type' => 'date',
                    'compare' => 'NOT BETWEEN'
                ),
                /*array(
                    'key' => 'data_inicioc' ,
                    'value' => array($data_inicioc,(date('Ymd'))),
                    'type' => 'date',
                    'compare' => 'NOT BETWEEN'
                ),*/
                    array('relation' => 'OR',              
                    array(
                        'key' => 'data_fimc' ,
                        'value' => date('Ymd'),
                        'type' => 'date',
                        'compare' => '>'
                    ),
                    array(
                        'key' => 'data_inicioc' ,
                        'value' => date('Ymd'),
                        'type' => 'date',
                        'compare' => '>'
                    ),  
                ),
                
),
   'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => 30 ,'category_name' => $categorias ); 
  
   }  
   
   else {
       $categorias = str_replace(' ', ', ', $filtros);
           $mypost = array( 
            'post_type' => 'evento',
           'meta_query' =>array('relation' => 'AND',
                array(
                    'key' => 'data_fimc' ,
                    'value' => array($data_fimc,(date('Ymd'))),
                    'type' => 'date',
                    'compare' => 'NOT BETWEEN'
                ),
               /* array(
                    'key' => 'data_inicioc' ,
                    'value' => array($data_inicioc,(date('Ymd'))),
                    'type' => 'date',
                    'compare' => 'NOT BETWEEN'
                ),*/
                array('relation' => 'OR',              
                    array(
                        'key' => 'data_fimc' ,
                        'value' => date('Ymd'),
                        'type' => 'date',
                        'compare' => '>'
                    ),
                    array(
                        'key' => 'data_inicioc' ,
                        'value' => date('Ymd'),
                        'type' => 'date',
                        'compare' => '>'
                    ),  
                ),
                
),
   'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => 30 ,'category_name' => $categorias); 
   
}


   
   
   
    $loop = new WP_Query( $mypost ); 
    

     

while ( $loop->have_posts( ) ) : $loop->the_post( ); 


    $data1 = esc_html(get_post_meta(get_the_ID(), 'data_inicio', true));
    $data_i = converteData($data1, '/', '');

    $data2 = esc_html(get_post_meta(get_the_ID(), 'data_fim', true));
    $data_f = converteData($data2, '/', '');
    
    $preco = esc_html ( get_post_meta( get_the_ID( ), 'preco', true ));

?>
<?php if ($data_i != date("Ymd") && $data_f != date("Ymd") ) : ?>
                           
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
                                            <span class="categoria"><?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Destaques') ) echo $category->cat_name . ' '; ?>
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
                                            <div class="dataslider-up">
                                                <?php if ( ($data_i && !$data_f) || (!$data_i && $data_f)  || $data_i === $data_f) : ?> 
                                                    <span class="dmes-up"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                                    <span class="data-up"><?php echo date("j", strtotime($data_i)); ?></span>
                                                <?php endif; ?>
                                                <?php if ( ($data_i && $data_f) && $data_i != $data_f ) : ?>                           
                                                    <div class="wrap"><span class="dmes-up"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                                    <span class="data-up"><?php echo date("j", strtotime($data_i)); ?></span></div><hr>
                                                    <div class="wrap"><span class="dmes-up"><?php echo date_i18n("M", strtotime($data_f)); ?></span>
                                                    <span class="data-up"><?php echo date("j", strtotime($data_f)); ?></span></div>
                                                <?php endif; ?></div>
                                            <div class="extras">
                                                <ul>
                                                    <li><span class="icon"></span> <?php echo esc_html ( get_post_meta( get_the_ID( ), 'classificacao', true )) ?> </li>
                                                    <li><span class="icon"> </span><?php 
                                                    if ( get_post_meta( get_the_ID( ), 'preco', true ) ) 
                                                        echo 'R$' . esc_html( get_post_meta( get_the_ID( ), 'preco', true )) ; 
                                                    else 
                                                        echo 'Grátis';
                                                    ?></li>
                                                   <!-- <li><span class="icon"></span> CINUSP </li>-->
                                                </ul>
                                            </div>
                                        </div><!--entry meta --></a>

                                    </header>

                                </article><?php endif;?><?php endwhile;?>
                                
                                <?php
  $number_of_posts = (have_posts()) ? sizeof($wp_query->loop) : 0;
  if( $number_of_posts < '20') : ?>
                                <?php
   wp_reset_query( );

   

     $mypost2 = array( 'post_type' => array('evento'), 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 30, 'category_name' => 'permanente' ); 
        
 $loop2 = new WP_Query( $mypost2 );   
while ( $loop2->have_posts( ) ) : $loop2->the_post( ); ?>
                           
                                <article id="post-<?php the_ID(); ?>" class="hentry clearfix">
                                                                        <?php if ($data_inicio) : ?>
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
                                            <span class="categoria"><?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Evento Permanente') ) echo $category->cat_name . ' '; ?>
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
                                            <!--<div class="dataslider-up">
                                                <span class="dmes-up">Permanente</span>
                                                
                                            </div>-->
                                            <div class="extras">
                                                <ul>
                                                    <li><span class="icon"></span> <?php echo esc_html ( get_post_meta( get_the_ID( ), 'classificacao', true )) ?> </li>
                                                    <li><span class="icon">  </span><?php 
                                                    if ( get_post_meta( get_the_ID( ), 'preco', true ) ) 
                                                        echo 'R$' . esc_html( get_post_meta( get_the_ID( ), 'preco', true )) ; 
                                                    else 
                                                        echo 'Grátis';
                                                    ?></li>
                                                   <!-- <li><span class="icon"></span> CINUSP </li>-->
                                                </ul>
                                            </div>
                                        </div><!---entry meta ---></a>

                                    </header>

                                </article><?php endwhile;?><?php endif;?>
                               <?php wp_reset_query( ); ?>
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
<!---------------------------materias aqui---------------------------->
               
 <div id="materia" class="materias clearfix">

                <div id="boxmateria" class="content-area clearfix">
                    <main id="content" class="clearfix">
                        
                        <header class="topo clearfix">
                            <h2>Matérias<span class="nomefiltro2"></span></h2>
                            
                        </header>
                        <section id="materias">
<?php
        wp_reset_query( );
        $mypost3 = array( 'post_type' => array('post', 'evento'), 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 5, 'category_name' => 'materias' ); 
        $loop3 = new WP_Query( $mypost3 );   
        while ( $loop3->have_posts( ) ) : $loop3->the_post( ); ?>   
                        
                  <article id="post-<?php the_ID(); ?>" class="hentry clearfix">
                                      
                       <a href="<?php the_permalink(); ?>">                                       
                        <span class="categoria"><?php foreach((get_the_category()) as $category) if ( $category->cat_name!= 'Matérias' && $category->cat_name!= 'Destaques'){ echo $category->cat_name . ' ';}?>

                        </span><h1 class="entry-title"><?php echo get_the_title(); ?></h1></a>
                        
                   </article>
                   
                   
                   <?php endwhile;?>
                   </section>
                   <hr/>
                                        
                        
                        
                        </main></div></div>
                            

<!---------------------------/materias aqui---------------------------->




                <!----------div class="twitter">
<a class="twitter-timeline" href="https://twitter.com/caminhosusp" data-widget-id="481485938158088192">Tweets de @caminhosusp</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


                </div>
                --->
                <div class="facebook">
                    <div id="fb-root"></div>
<div id="fb-root"></div>


<div class="fb-like-box" data-href="https://www.facebook.com/Caminhosdaculturausp" data-width="240" data-height="315" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>                    <!-- facebook plugin-->
                </div>

            </div><!-- #main-->


<?php get_footer(); ?> 
