<?php get_header(); ?>

<?php
    //$_site = get_post_meta( get_the_ID(), 'site_evento', true);
    $data1 = esc_html(get_post_meta(get_the_ID(), 'data_inicio', true));
    $data_i = converteData($data1, '/', '-');

    $data2 = esc_html(get_post_meta(get_the_ID(), 'data_fim', true));
    $data_f = converteData($data2, '/', '-');  
  
    ?>

<body class="single-evento">
<div class="clip">
                        <?php if ($data_i|| $data_f) : ?>
                            <div class="quadradodatahoje clearfix">
                                    <span class="dmes"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                    <span class="data"><?php echo date("j", strtotime($data_i)); ?></span>
                            </div>
                        <?php endif; ?>
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
                            echo the_post_thumbnail( 'padrao' );
                }
                else { echo '<img src="'; header_image(); echo '" />'; } 
                
 ?>

 

<a href="#evento"><div class="mais"><!--<!----></div></a>
                            </div>


            </header><!-- #masthead -->
                        

        <div id="main" class="site-main clearfix">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php $post = get_post(get_the_ID()); ?>
                            <?php $post_parent = get_post($post -> post_parent); ?>
            <div id="primary" class="content-area clearfix">
                <main id="content" class="clearfix">
                    <article>
                        <header class="topo clearfix">
                            <div class="datanoticiahoje">    
                                                            
                                <?php if ( ($data_i && !$data_f) || (!$data_i && $data_f) || $data_i === $data_f ) : ?>                                    
                                    <span class="singlemes"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_i)); ?></span>
                                <?php endif; ?>
                                <?php if ( ($data_i && $data_f) && $data_i != $data_f ) : ?>                            
                                    <div class="wrap"><span class="singlemes"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_i)); ?></span></div><hr>
                                    <div class="wrap"><span class="singlemes"><?php echo date_i18n("M", strtotime($data_f)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_f)); ?></span></div>
                                <?php endif; ?>                                
                            </div> <?php //endif; ?>
                            
                            <div class="info">
                                <span class="categorianormal">
<?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Destaques') ) echo $category->cat_name . ' ';  ?></span>
                                <h2> <?php echo get_the_title(); ?></h2>
                                <!----a href="#evento"><div class="mais"><!----</div></a>--->
                            </div>
                        </header>
                        <?php the_content() ?>
                            <span class="autor">Por <?php echo get_the_author(); ?>, publicado em <?php the_time( 'j \d\e F \d\e Y' ); ?></time></span>

                    </article>
                    <div class="fb-like" data-href="<?php get_permalink($post -> ID);?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
                    
                </main>

            </div><!-- Primary -->
            <div class="evento clearfix" id="evento">

                <header class="event-info clearfix">
                    <?php if ($data_i) : ?>
                    <div class="datanoticiahoje clearfix">
                     <?php if ( ($data_i && !$data_f) || (!$data_i && $data_f)  || $data_i === $data_f) : ?>                                     
                                    <span class="singlemes"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_i)); ?></span>
                                <?php endif; ?>
                                <?php if ( ($data_i && $data_f) && $data_i != $data_f ) : ?>                           
                                    <div class="wrap"><span class="singlemes"><?php echo date_i18n("M", strtotime($data_i)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_i)); ?></span></div><hr>
                                    <div class="wrap"><span class="singlemes"><?php echo date_i18n("M", strtotime($data_f)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_f)); ?></span></div>
                                <?php endif; ?>
                               
                                </div>
                                
                                <?php endif; ?>
                    <div class="event-name clearfix">
                        <span class="categoria"><?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Carrossel') ) echo $category->cat_name . ' ';  ?></span>
                        <h1 class="event-title"><?php if ($nome) echo esc_html( get_post_meta( get_the_ID( ), 'nome', true )); else echo get_the_title();  ?></h1>
                    </div>

                    <div class="extras-lado">
                        <ul>
                            <li><span class="icon2"></span> <?php echo esc_html ( get_post_meta( get_the_ID( ), 'classificacao', true )) ?> </li>
                            <li><span class="icon2">  </span><?php 
                                                    if ( get_post_meta( get_the_ID( ), 'preco', true ) ) 
                                                        echo 'R$' . esc_html( get_post_meta( get_the_ID( ), 'preco', true )) ; 
                                                    else 
                                                        echo 'Grátis';
                                                    ?></li>
                            <li><span class="icon2"> </span> <a href="<?php echo esc_html( get_post_meta( get_the_ID( ), 'site_evento', true )) ?>">Saiba Mais</a> </li>
                        </ul>
                    </div><?php endwhile; ?>

                </header>
<?php $locais = get_post_meta($post -> ID, 'locais', true); ?>
<?php foreach ((array)$locais as $local) : ?> 
                  
<div class="vcard clearfix">
                    <table class="endereco">
                        <tr>

                            <td><span class="icon2"></span>
                                
                            </td>
                            
                            <td>
                            <?php
                                $datadeinicio = $data1;
                                $datadetermino = $data2;
                            
                                if ( $local['inicio'])
                                    $datadeinicio = $local['inicio'];                                                            
                            
                            
                                if ( $local['fim']) {
                                    $datadetermino = $local['fim'];
                                }
                            
                                if ($datadeinicio && !strcmp( $datadeinicio, $datadetermino)) {
                                    echo $datadeinicio; 
                                } elseif ($datadeinicio && $datadetermino) {
                                    echo 'De ' . $datadeinicio . ' até ' . $datadetermino;
                                } elseif ($datadeinicio) {
                                    echo 'A partir de ' . $datadeinicio;
                                } elseif ($datadetermino) {
                                    echo  'Até ' . $datadetermino;
                                } else {
                                    echo 'Evento permanente';
                                }

                                $_site = $local['website'];
                                
                            ?>
                            </td>
                        </tr>
                        <?php
                            foreach ($local['horarios'] as $times) {
                                if ( !empty($times) & isset($times['dias']) ) {
                                    echo '<tr><td><span class="icon2"></span></td><td>';
                                    echo '<span class="semana">';

                                    $temp_day = array();
                                    //if ( !empty($meta_locais[$i]['horarios'][$j]['dias']) ) {
                                    foreach ($times['dias'] as $day => $value) {
                                        $temp_day[] = $day;
                                    }
                                    $temp_weekday = false;
                                    $temp_weekend = false;
                                    $temp_tot = count($temp_day);
                                    for ($n = 0; $n < $temp_tot; $n++) { 
                                        switch ($temp_day[$n]) {
                                            case 'seg':
                                                $temp_day[$n] = 'Segunda';
                                                $temp_weekday = true;
                                                $temp_weekend = false;
                                                break;
                                            case 'ter':
                                                $temp_day[$n] = 'Terça';
                                                $temp_weekday = true;
                                                $temp_weekend = false;
                                                break;
                                            case 'qua':
                                                $temp_day[$n] = 'Quarta';
                                                $temp_weekday = true;
                                                $temp_weekend = false;
                                                break;
                                            case 'qui':
                                                $temp_day[$n] = 'Quinta';
                                                $temp_weekday = true;
                                                $temp_weekend = false;
                                                break;
                                            case 'sex':
                                                $temp_day[$n] = 'Sexta';
                                                $temp_weekday = true;
                                                $temp_weekend = false;
                                                break;
                                            case 'sab':
                                                $temp_day[$n] = 'Sábado';
                                                $temp_weekday = false;
                                                $temp_weekend = true;
                                                break;
                                            case 'dom':
                                                $temp_day[$n] = 'Domingo';
                                                $temp_weekday = false;
                                                $temp_weekend = true;
                                                break;
                                        }
                                    }
                                    $temp_nomore = false;
                                    if ($temp_tot == 7 || $temp_tot == 0) {
                                        echo 'Todos os dias';
                                        $temp_nomore = true;
                                    } elseif ($temp_tot == 5 & $temp_weekday & !$temp_weekend) {
                                        echo 'De Segunda a Sexta';
                                        $temp_nomore = true;
                                    } elseif ($temp_tot == 2 & $temp_weekend & !$temp_weekday) {
                                        echo 'Aos finais de semana';
                                        $temp_nomore = true;
                                    }
                                    if (!$temp_nomore) {
                                        if ($temp_tot > 1) {
                                            for ($n = 0; $n < $temp_tot; $n++) {
                                                if ( !( $n == $temp_tot-1 || $n == $temp_tot-2 ) ) {
                                                    echo $temp_day[$n] . ', ';
                                                } elseif ($n == $temp_tot - 2) {
                                                    echo $temp_day[$n] . ' ';
                                                } elseif ($n == $temp_tot - 1) {
                                                    echo 'e ' . $temp_day[$n];
                                                }
                                            }
                                        } else {
                                            echo $temp_day[0];
                                        }
                                    }
                                    echo '</span>';
                                    echo '</td></tr><tr><td></td><td>';
                                    if ( !empty($times['hora_i']) & !empty($times['hora_f']) ) {
                                        echo $times['hora_i'] . ' - ' . $times['hora_f'];
                                    } elseif (!empty($times['hora_i']) & empty($times['hora_f']) ) {
                                        if ( strrpos($times['hora_i'], '01:') !== false || strrpos($times['hora_i'], '00:') !== false ) {
                                            echo 'A partir da ' . $times['hora_i'];;
                                        } else {   
                                            echo 'A partir das ' . $times['hora_i'];
                                        }
                                    } elseif (empty($times['hora_i']) & !empty($times['hora_f']) ) {
                                        if ( strrpos($times['hora_f'], '01:') !== false || strrpos($times['hora_f'], '00:') !== false ) {
                                            echo 'Até a ' . $times['hora_f'];;
                                        } else {   
                                            echo 'Até as ' . $times['hora_f'];
                                        }
                                    } else {
                                        echo 'O dia todo';
                                    }
                                    echo '</td></tr>';
                                    //}
                                }

                            }
                        ?>
                        <!--google agenda-->
                            <?php
                                $inicio = converteData($datadeinicio, '/', '-');
                                $fim = converteData($datadetermino, '/', '-');
                                $h_inicio = date("H:i" , strtotime($times['hora_i']));
                                $h_fim = date("H:i" , strtotime($times['hora_f']));
                            ?>
                            <tr>
                                <td></td>
                            <td><span class="agenda">
                                <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php
                                if (get_post_meta(get_the_ID(), 'nome', true))
                                    echo esc_html(get_post_meta(get_the_ID(), 'nome', true));
                                else
                                    echo get_the_title();?>&dates=<?php echo date("Ymd", strtotime($inicio)) ?>T<?php
                                if ($times['hora_i']) {
                                    echo date("His", strtotime($h_inicio));
                                }
                                else {
                                    echo '090000';
                                }
                        ?>/<?php echo date("Ymd", strtotime($fim)) ?>T<?php
                        if ($times['hora_f'])
                            echo date("His", strtotime($h_fim));
                        else {
                            echo '220000';
                        }
                    ?>&details=Para+mais+detalhes,+acesse%3a+<?php 
                        if ($_site)
                            echo $_site;
                        else
                            the_permalink()
                        ?>&location=<?php
                        echo $local['local'];
                        ?>,+<?php echo $local['endereco']; ?>&sf=true&output=xml#f">
                           + Google Agenda
                           </a></span>                           
                            </td>
                        </tr>
                        
                        
                        <?php if( $local['local']) : ?>
                        <tr>
                            <td><span class="icon2"></span></td>
                            <td><span class="fn"><strong><?php echo $local['local']; ?></strong></span><br>
                            </td>
                        </tr><?php endif; ?>
                        <div class="adr">
                        <tr>
                            <td></td>
                            <td>
                                <?php echo $local['endereco']; ?>
                            </td></tr><tr>
                            <td></td><td>
                                <?php if ($local['cidade'])
                                    echo $local['cidade']; 
                                 else
                                    echo 'São Paulo'; ?> – SP
                                
                            </td></tr><tr>
                                <?php if ($local['cep']) : ?>
                            <td></td><td>
                                CEP: <?php echo $local['cep']; ?>
                            </td>
                            
                        </tr><?php endif;?></div>
                        <tr>
                            <td>
                            </td>
                            <td>
                            <div class="tel">
                                <span class="value"><?php echo $local['telefone_1']; ?></span>
                            </div></td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                            <div class="tel">
                                <span class="value"><?php echo $local['telefone_2']; ?></span>
                            </div></td>
                        </tr>
                        <tr>
                            <?php if ($_site) : ?>
                            <td>
                                <span class="icon2"></span>
                            </td>
                            <td>
                            <div class="url">
                                <a href="<?php if ( strpos($_site, "//") === false ) echo "//" . $_site; else echo $_site; ?>" ><?php echo $_site; ?></a>
                            </div></td>
                            <?php endif;?>
                            </tr>
                            <?php if( $local['observacoes']) : ?>
                            <tr>
                                <td><span class="icon2"></span></td>                                
                            <td>
                            <?php echo $local['observacoes']; ?>
                            </td>
                        </tr><?php endif; ?>


                    </table>
                </div><!-- .vcard -->
                <hr>


                <?php endforeach; ?>   
                   <div class="irtopo"><a href="#"><span class="icon2"></span></a></div>       
            </div>
            
            <div id="calendario">
                <ul>
                    <li><a href="#" id="caixa"></a></li>
                    <li><a href="https://www.facebook.com/caminhosdaculturausp"><span class="face"></span></a></li>
                    <li><a href="https://twitter.com/caminhosusp"></a></li>
                </ul>
            </div>

        </div><!-- #main-->

        <?php get_footer(); ?>
