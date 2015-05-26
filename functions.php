<?php

$args = array(
    'header-text' => false,
    'uploads' => true
);

add_theme_support('post-thumbnails');
add_theme_support('custom-header', $args);

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8");

function converteData($data, $se, $ss) {
    return implode($ss, array_reverse(explode($se, $data)));
}

function the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    
    $resumo = '';
    
    if (mb_strlen($excerpt) > $charlength) {
        $subex = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut = -( mb_strlen($exwords[count($exwords) - 1]));
        if ($excut < 0) {
            $resumo .= mb_substr($subex, 0, $excut);
        } else {
            $resumo .=  $subex;
        }
        $resumo .=  '(...)';
        
        return $resumo;
    } else {
        return $excerpt;
    }
}


add_action('wp_head','get_ajaxurl');
function get_ajaxurl() {
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
}



function filtrar() {
    
    $filtros = isset($_POST['filtros']) ? $_POST['filtros'] : '';

    //$number_of_posts1 = (have_posts()) ? sizeof($wp_query -> loop) : 0;
    
    //if ($number_of_posts1 == '0') $html ='';
    //else {
    
       
        
    $html = '<section id="hoje" class="hoje clearfix">';
    
    wp_reset_query();

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
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'posts_per_page' => 30,
        'category_name' => $filtros
    );
    $loop = new WP_Query($mypost); ?>

    <section id="hoje">
        <?php while ($loop -> have_posts()) : $loop -> the_post();
    
            // get post meta values
            $preco = esc_html(get_post_meta(get_the_ID(), 'preco', true));
            $data1 = esc_html(get_post_meta(get_the_ID(), 'data_inicio', true));
            $data2 = esc_html(get_post_meta(get_the_ID(), 'data_fim', true));
            $data_i = converteData($data1, '/', '-');
            $data_f = converteData($data2, '/', '-');
            $iniciot = date('Ymd', strtotime($data_i));
            $fimt = date('Ymd', strtotime($data_i));

            // html of the loop
            ?>
            <div id="pai" class="clearfix">
                <a href="<?php the_permalink(); ?> ">
                    <article id="post-<?php echo $post->ID ?>" class="hentry-first clearfix">
                        <?php
                        if ($data_i) {
                            ?>
                            <div class="quadradodatahoje clearfix">
                                <span class="dmes"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                <span class="data"><?php echo date("j", strtotime($data_i)); ?></span>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="imagem">
                            <img src="<?php if ( has_post_thumbnail() ) echo wp_get_attachment_url(get_post_thumbnail_id()); // get_header_image()); ?>" />
                        </div>
                        <?php if (has_post_thumbnail()) { ?><header class="entry-header-hoje"><?php } else { ?><header class="entry-header-hoje2"><?php } ?>
                            <div class="entry-header-up">
                                <span class="categoria">
                                    <?php foreach ( get_the_category() as $category) {
                                        if ( strcmp($category->cat_name, 'Destaques') ) {
                                            echo $category->cat_name . ' ';
                                        }
                                    } ?>
                                </span>
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </div>
                            <div class="entry-meta-hoje">
                                <div class="resumo">
                                    <?php echo the_excerpt_max_charlength(260); ?>
                                </div>
                                <div class="dataslider-up">
                                    <?php if ( ($data_i && !$data_f) || (!$data_i && $data_f ) || $data_i === $data_f) { ?>
                                        <span class="dmes-up"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                        <span class="data-up"><?php echo date("j", strtotime($data_i)); ?></span>';
                                    <?php } ?>
                                    <?php if ( ($data_i && $data_f) && $data_i != $data_f ) { ?>
                                        <div class="wrap">
                                            <span class="dmes-up"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                            <span class="data-up"><?php echo date("j", strtotime($data_i)); ?></span>
                                        </div>
                                        <hr>
                                        <div class="wrap">
                                            <span class="dmes-up"><?php echo date_i18n("M", strtotime($data_f)); ?></span>
                                            <span class="data-up"><?php echo date("j", strtotime($data_f)); ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="extras">
                                    <ul>
                                        <li>
                                            <span class="icon"></span>
                                            <?php echo esc_html(get_post_meta(get_the_ID(), 'classificacao', true)); ?>
                                        </li>
                                        <li>
                                            <span class="icon"></span>
                                            <?php if ($preco) { ?>
                                                R$ <?php echo $preco; ?>
                                            <?php } else { ?>
                                                Grátis
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </header>
                    </article>
                </a>
            </div> <?php 
            if ( have_posts() ) {
                $number_of_posts = sizeof($wp_query->loop);
            } else {
                $number_of_posts = 0;
            }
            if ($number_of_posts < 1) { ?><hr><?php }
        endwhile; ?>
    </section>
    
    <?php
        /*
        $html .= '<div id="pai" class="clearfix">';
        $html .= '<a href="' . get_permalink() . '">';
        $html .= '<article id="post-' . get_the_ID() . '" class="hentry-first clearfix">';
        if ($data_i) {
            $html .= '<div class="quadradodatahoje clearfix">';
            $html .= '<span class="dmes">' . date_i18n("M", strtotime($data_i)) . '</span>';
            $html .= '<span class="data">' . date("j", strtotime($data_i)) . '</span></div>';
        }
        $html .= '<div class="imagem">';
        $html .= '<img src="' . (has_post_thumbnail() ? wp_get_attachment_url(get_post_thumbnail_id()) : get_header_image()) . '" />';
        $html .= '</div>';
        if (has_post_thumbnail()) {
            $html .= '<header class="entry-header-hoje">';
        } else {
            $html .= '<header class="entry-header-hoje2">';
        }
        $html .= '<div class="entry-header-up"><span class="categoria">';
        
        foreach ( get_the_category() as $category) {
            if ( strcmp($category->cat_name, 'Destaques') ) {
                $html .= $category->cat_name . ' ';
            }
        }

        $html .= '</span><h1 class="entry-title">' . get_the_title() . '</h1></div><div class="entry-meta-hoje">';
        $html .= '<div class="resumo">'. the_excerpt_max_charlength(260) ;
        $html .= '</div><div class="dataslider-up">';
        if ( ($data_i && !$data_f) || (!$data_i && $data_f ) || $data_i === $data_f) {
            $html .= '<span class="dmes-up">' . date_i18n("M", strtotime($data_i)) . '</span>' . '</span><span class="data-up">' . date("j", strtotime($data_i)) . '</span>';
        }
        if ( ($data_i && $data_f) && $data_i != $data_f ) {
            $html .= '<div class="wrap"><span class="dmes-up">' . date_i18n("M", strtotime($data_i)) . '</span>';
            $html .= '<span class="data-up">' . date("j", strtotime($data_i)) . '</span></div><hr>';
            $html .= '<div class="wrap"><span class="dmes-up">' . date_i18n("M", strtotime($data_f)) . '</span>';
            $html .= '<span class="data-up">' . date("j", strtotime($data_f)) . '</span></div></div>';
        }
        $html .= '<div class="extras"><ul><li><span class="icon"> </span>' . esc_html(get_post_meta(get_the_ID(), 'classificacao', true)) . '</li>';
        $html .= '<li><span class="icon"> </span>';
        if ($preco) {
            $html .= 'R$' . $preco;
        } else {
            $html .= 'Grátis';
        }
        $html .= '</li></ul></div></div></header>';

        $html .= '</article></a></div>';
            
        $number_of_posts = (have_posts()) ? sizeof($wp_query->loop) : 0;
        if ($number_of_posts < '1') {
            $html .='<hr>';
        } 
        $html .= '<section id="proximos" class="clearfix">';
        $html .= '<div id="pai" class="clearfix">';
        */
    ?> 
    <?php endwhile; ?>
    </section>
    <section id="proximos" class="clearfix">
        <div id="pai" class="clearfix">
            <?php wp_reset_query(); ?>
            <?php
                if (!$filtros) {
                    $mypost = array( 
                        'post_type' => 'evento',
                        'meta_query' =>
                            array(
                                'relation' => 'AND',
                                array(
                                    'key' => 'data_fimc' ,
                                    'value' => array($data_fimc,(date('Ymd'))),
                                    'type' => 'date',
                                    'compare' => 'NOT BETWEEN'
                                ),
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
                        'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => 30 ,'category_name' => $filtros
                    );
                } else {
                    $categorias = str_replace(' ', ', ', $filtros);
                    $mypost = array( 
                        'post_type' => 'evento',
                        'meta_query' =>
                            array('relation' => 'AND',
                                array(
                                    'key' => 'data_fimc',
                                    'value' => array($data_fimc,(date('Ymd'))),
                                    'type' => 'date',
                                    'compare' => 'NOT BETWEEN'
                                ),
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
                        'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => 30 ,'category_name' => $filtros
                    );
                }

                $loop = new WP_Query($mypost);
                while ($loop -> have_posts()) : $loop -> the_post();

                    $preco = esc_html(get_post_meta(get_the_ID(), 'preco', true));
                    $data1 = esc_html(get_post_meta(get_the_ID(), 'data_inicio', true));
                    $data2 = esc_html(get_post_meta(get_the_ID(), 'data_fim', true));
                    $data_i = converteData($data1, '/', '');
                    $data_f = converteData($data2, '/', '');
                    $iniciot = date('Ymd', strtotime($data_i));
                    $fimt = date('Ymd', strtotime($data_i));
            		
                    if ($data_i != date("Ymd") && $data_f != date("Ymd") ) { ?>

        $html .= '<article id="post-' . get_the_ID() . '"class="hentry clearfix">';
        if ($data_i) {
            $html .= '<div class="quadradodata clearfix">';
            $html .= '<span class="dmes">' . date_i18n("M", strtotime($data_i)) . '</span>';
            $html .= '<span class="data">' . date("j", strtotime($data_i)) . '</span></div>';
        }
        $html .= '<div class="imagem">';
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail'); 
            $html .= '<img src="' . $thumb[0] . '" /></div>';
        if (has_post_thumbnail())
            $html .= '<header class="entry-header">';
        else
            $html .= '<header class="entry-header2">';
        $html .= '<a href="' . get_permalink() . '"><div class="entry-header-up">';
        $html .= '<span class="categoria">';
        foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Destaques') ) $html .= $category->cat_name . ' ';
        $html .= '</span><h1 class="entry-title">' ;
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
        $html .= $displaytitle;
                                              
                                            
        $html .='</h1></div><div class="entry-meta"><div class="dataslider-up">';
        if (($data_i && !$data_f) || (!$data_i && $data_f) || $data_i === $data_f)
            $html .= '<span class="dmes-up">' . date_i18n("M", strtotime($data_i)) . '</span><span class="data-up">' . date("j", strtotime($data_i)) . '</span>';
        else if (($data_i && $data_f) && $data_i != $data_f) {
            $html .= '<div class="wrap"><span class="dmes-up">' . date_i18n("M", strtotime($data_i)) . '</span>';
            $html .= '<span class="data-up">' . date("j", strtotime($data_i)) . '</span></div><hr>';
            $html .= '<div class="wrap"><span class="dmes-up">' . date_i18n("M", strtotime($data_f)) . '</span>';
            $html .= '<span class="data-up">' . date("j", strtotime($data_f)) . '</span></div>';
        }
        $html .= '</div><div class="extras"><ul><li><span class="icon"> </span>' . esc_html(get_post_meta(get_the_ID(), 'classificacao', true)) . '</li>';
        $html .= '<li><span class="icon"> </span>';
        $html .= $preco ? 'R$' . $preco : 'Grátis';
        $html .= '</li></ul></div></div></a>';
        $html .= '</header></article>';
        }
    endwhile;
    wp_reset_query();

    $number_of_posts = (have_posts()) ? sizeof($wp_query -> loop) : 0;
    
    if ($number_of_posts < '20') {

        $mypost2 = array(
            'post_type' => array('evento'),
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => 30,
            'category_name' => 'permanente'
        );
        $loop2 = new WP_Query($mypost2);
        
        while ($loop2 -> have_posts()) : $loop2 -> the_post();
       /* $cat_name = get_cat_name();
        if( $cat_name ===  $category ){ */
        

            $html .= '<article id="post-' . get_the_ID() . '"class="hentry clearfix">';
            if ($data_inicio) {
                $html .= '<div class="quadradodata clearfix">';
                $html .= '<span class="dmes">' . date_i18n("M", strtotime($data_i)) . '</span>';
                $html .= '<span class="data">' . date("j", strtotime($data_i)) . '</span></div>';
            }
            $html .= '<div class="imagem">';
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail'); 
            $html .= '<img src="' . $thumb[0] . '" /></div>';
            if (has_post_thumbnail())
                $html .= '<header class="entry-header">';
            else
                $html .= '<header class="entry-header2">';
            $html .= '<a href="' . get_permalink() . '"><div class="entry-header-up">';
            $html .= '<span class="categoria">';
            foreach((get_the_category()) as $category) if ( $category->cat_name == 'Evento Permanente') $html .=  'Divulgação ';
            
            
            
              $html .= '</span><h1 class="entry-title">' ;
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
            $html .= $displaytitle;
            
            $html .= '</h1></div><div class="entry-meta">';
            $html .= '<div class="extras"><ul><li><span class="icon"> </span>' . esc_html(get_post_meta(get_the_ID(), 'classificacao', true)) . '</li>';
            $html .= '<li><span class="icon"> </span>';
            $html .= $preco ? 'R$' . $preco : 'Grátis';
            $html .= '</li></ul></div></div></a>';
            $html .= '</header></article>';

//}
        endwhile;
    }

    $html .= '</div></section></a>';

    die($html);

}

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('post','evento'); // replace cpt to your custom post type
    $query->set('post_type',$post_type);
    return $query;
    }
}


add_action('wp_ajax_nopriv_filtrar', 'filtrar');
add_action('wp_ajax_filtrar', 'filtrar');

add_image_size( 'celular', 768, 768, true);
add_image_size( 'padrao', 850, 470,true);


/*
add_action( 'pre_get_posts',  'set_posts_per_page'  );


function set_posts_per_page( $query ) {

  global $wp_the_query;

  if ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_search() ) ) {
    $query->set( 'posts_per_page', 30 );
  }
  elseif ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_archive() ) ) {
    $query->set( 'posts_per_page', 30 );
  }
  // Etc..

  return $query;
}*/