<?php get_header(); ?>

<?php
    $data1 = esc_html(get_post_meta(get_the_ID(), 'data_inicio', true));
    $data_i = converteData($data1, '/', '-');

    $data2 = esc_html(get_post_meta(get_the_ID(), 'data_fim', true));
    $data_f = converteData($data2, '/', '-');  
  
    ?>

<body class="single-evento">
<div class="clip">
                        <?php if ($data_i) : ?>
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
                            echo the_post_thumbnail( 'large' );
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
                           <?php if ($data_i) : ?>
                               <?php if ( date("Ymd", strtotime($data_f)) < date("Ymd"))
                                    echo '<span class="finalizado">Evento Encerrado</span>'?>
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
                            </div> <?php endif; ?>
                            
                            <div class="info">
                                <span class="categorianormal">
<?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Carrossel') ) echo $category->cat_name . ' ';  ?></span>
                                <h2> <?php echo get_the_title(); ?></h2>
                                <!----a href="#evento"><div class="mais"><!----</div></a>--->
                            </div>
                        </header>
                        <?php the_content() ?>
                            <span class="autor">Texto escrito por <?php echo get_the_author(); ?></span>

                    </article>
                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
                    
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
                            <li><span class="icon"></span> <?php echo esc_html ( get_post_meta( get_the_ID( ), 'classificacao', true )) ?> </li>
                            <li><span class="icon">  </span><?php 
                                                    if ( get_post_meta( get_the_ID( ), 'preco', true ) ) 
                                                        echo 'R$' . esc_html( get_post_meta( get_the_ID( ), 'preco', true )) ; 
                                                    else 
                                                        echo 'Grátis';
                                                    ?></li>
                            <li><span class="icon">  </span> <a href="<?php echo esc_html( get_post_meta( get_the_ID( ), 'site_evento', true )) ?>">Saiba Mais</a> </li>
                        </ul>
                    </div><?php endwhile; ?>

                </header>
<?php $locais = get_post_meta($post -> ID, 'locais', true); ?>
<?php foreach ((array)$locais as $local) : ?> 
                  
<div class="vcard clearfix">
                    <table class="endereco">
                        <tr>

                            <td><span class="icon"></span>
                                
                            </td>
                            
                            <td>
                            <?php
                                $datadeinicio = $data1;
                                $datadetermino = $data2;
                            
                                if ( $local['inicio'])
                                    $datadeinicio = $local['inicio'];                                                            
                            
                            
                                if ( $local['fim']) 
                                    $datadetermino = $local['fim'];
                            
                                if ($datadeinicio && !strcmp( $datadeinicio, $datadetermino))
                                    echo $datadeinicio; 
                                else if ($datadeinicio && $datadetermino)
                                    echo 'De ' . $datadeinicio . ' até ' . $datadetermino;
                                else if ($datadeinicio)
                                    echo 'A partir de ' . $datadeinicio;
                                else if ($datadetermino)
                                    echo  'Até ' . $datadetermino;
                                else
                                    echo 'Evento permanente';
                                
                            ?>
                            </td>
                        </tr>
                        <?php if ( $local['semana1'] || $local['segunda_i'] || $local['segunda_f']) : ?>                            
                        
                        <tr>
                            <td><span class="icon"></span>
                            </td>
                            <?php if (!($datadeinicio && !strcmp( $datadeinicio, $datadetermino)) )   : ?>
                            <td>
                            <!-- dia da semana/horario---->
                            <span class="semana"> 
                            <?php
                                
                                if ($local['semana1']) {
                                    echo $local['semana1'];
                                } 
                                
                                else {
                                    echo 'Todos os dias';
                                }
                            ?> 
                            </span>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <?php endif; ?>
                            
                            <td>
                                <?php
                                if ($local['semana1']) {
                                    if ($local['segunda_i'] && $local['segunda_f']) {
                                        echo $local['segunda_i'];
                                        echo ' - ';
                                        echo $local['segunda_f'];
                                    }
                                    else if ($local['segunda_i']) {
                                        echo 'À partir das ';
                                        echo $local['segunda_i'];
                                    } 
                                    else if ($local['segunda_f']) {
                                        echo 'Até as ';
                                        echo $local['segunda_f'];
                                    } 
                                    else {
                                        echo 'O dia todo ';
                                    }
                                }
                                ?>
                                                       
                            </td>
                        </tr>
                        <!----------------------------google agenda----------------------------------------->
                            <?php $inicio = converteData($datadeinicio, '/', '-');
                            $fim = converteData($datadetermino, '/', '-');
                            $h_inicio = date("H:i" , strtotime($local['segunda_i']));
                            $h_fim = date("H:i" , strtotime($local['segunda_f']));
                            
                            $h_inicio2 = date("H:i" , strtotime($local['terca_i']));
                            $h_fim2 = date("H:i" , strtotime($local['terca_f']));
                            
                            $h_inicio3 = date("H:i" , strtotime($local['quarta_i']));
                            $h_fim3 = date("H:i" , strtotime($local['quarta_f']));
                            
                            $h_inicio4 = date("H:i" , strtotime($local['quinta_i']));
                            $h_fim4 = date("H:i" , strtotime($local['quinta_f']));
                            
                            
                            ?>
                            <tr>
                                <td></td>
                            <td><span class="agenda">
                                <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php
                                if (get_post_meta(get_the_ID(), 'nome', true))
                                    echo esc_html(get_post_meta(get_the_ID(), 'nome', true));
                                else
                                    echo get_the_title();?>&dates=<?php echo date("Ymd", strtotime($inicio)) ?>T<?php
                                if ($local['segunda_i'])
                                    echo date("His", strtotime($h_inicio));
                                else {
                                    echo '090000';
                                }
                        ?>/<?php echo date("Ymd", strtotime($fim)) ?>T<?php
                        if ($local['segunda_f'])
                            echo date("His", strtotime($h_fim));
                        else {
                            echo '220000';
                        }
                    ?>&details=Para+mais+detalhes,+acesse%3a+<?php 
                        if ($local['site'])
                            echo $local['site']; 
                        else
                            the_permalink()  
                        ?>&location=<?php
                        echo $local['nome_local'];
                        ?>,+<?php echo $local['endereco']; ?>&sf=true&output=xml#f">
                           + Google Agenda
                           </a></span>                           
                            </td>
                        </tr>
                        <!----------------------------fim google agenda----------------------------------------->
                        <?php endif; ?>
                        <!--horario2---------------------------------------------->
                        <?php if ( $local['semana2'] || $local['terca_i'] || $local['terca_f']) : ?>                            
                        
                        <tr>
                            <td>
                            </td>
                            <td>
                            <!-- dia da semana/horario---->
                            <?php
                                if (!$local['semana2']) {
                                    if ($local['terca_i'] && $local['terca_f']) {
                                        echo $local['terca_i'];
                                        echo ' - ';
                                        echo $local['terca_f'];
                                    }
                                    if ($local['terca_i'] && $local['terca_f'] == null) {
                                        echo 'À partir das ';
                                        echo $local['terca_i'];
                                    } else if ($local['terca_i'] == null && $local['terca_f']) {
                                        echo 'Até as ';
                                        echo $local['terca_f'];
                                    }
                                    /*else if ( $local['terca_i'] == null && $local['terca_f'] == null) {
                                     echo 'O dia todo';
                                     }     */
                                } else {
                                    echo '<span class="semana">'. $local['semana2'] . '</span>';                                    
                                }
                            ?> 
                            </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <?php
                                if ($local['semana2']) {
                                    if ($local['terca_i'] && $local['terca_f']) {
                                        echo $local['terca_i'];
                                        echo ' - ';
                                        echo $local['terca_f'];
                                    }
                                    if ($local['terca_i'] && $local['terca_f'] == null) {
                                        echo 'À partir das ';
                                        echo $local['terca_i'];
                                    } else if ($local['terca_i'] == null && $local['terca_f']) {
                                        echo 'Até as ';
                                        echo $local['terca_f'];
                                    } else if ($local['terca_i'] == null && $local['terca_f'] == null) {
                                        echo 'O dia todo ';
                                    }
                                }
                                ?>                    
                            </td>
                        </tr>
                        <?php endif; ?>
                        <!----------------------------google agenda----------------------------------------->
                         <?php if ($local['nome_local']) :?>    
                            <tr>
                                <td></td>
                            <td><span class="agenda">
                                <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php
                                if (get_post_meta(get_the_ID(), 'nome', true))
                                    echo esc_html(get_post_meta(get_the_ID(), 'nome', true));
                                else
                                    echo get_the_title();?>&dates=<?php echo date("Ymd", strtotime($inicio)) ?>T<?php
                                if ($local['terca_i'])
                                    echo date("His", strtotime($h_inicio2));
                                else {
                                    echo '090000';
                                }
                        ?>/<?php echo date("Ymd", strtotime($fim)) ?>T<?php
                        if ($local['terca_f'])
                            echo date("His", strtotime($h_fim2));
                        else {
                            echo '220000';
                        }
                    ?>&details=Para+mais+detalhes,+acesse%3a+<?php 
                        if ($local['site'])
                            echo $local['site']; 
                        else
                            the_permalink()  
                        ?>&location=<?php
                        echo $local['nome_local'];
                        ?>,+<?php echo $local['endereco']; ?>&sf=true&output=xml#f">
                           + Google Agenda
                           </a></span>                           
                            </td>
                        </tr>
                        <?php endif;?>
                        <!----------------------------fim google agenda----------------------------------------->
                        <!--horario2--------------------------------------------->
                        <!--horario3---------------------------------------------->
                        <?php if ( $local['semana3'] || $local['quarta_i'] || $local['quarta_f']) : ?>                            
                        
                        <tr>
                            <td>
                            </td>
                            <td>
                            <!-- dia da semana/horario---->
                            <?php
                                if (!$local['semana3']) {
                                    if ($local['quarta_i'] && $local['quarta_f']) {
                                        echo $local['quarta_i'];
                                        echo ' - ';
                                        echo $local['quarta_f'];
                                    }
                                    if ($local['quarta_i'] && $local['quarta_f'] == null) {
                                        echo 'À partir das ';
                                        echo $local['quarta_i'];
                                    } else if ($local['quarta_i'] == null && $local['quarta_f']) {
                                        echo 'Até as ';
                                        echo $local['quarta_f'];
                                    }
                                   
                                } else {
                                    echo '<span class="semana">'. $local['semana3'] . '</span>';   
                                }
                            ?> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <?php
                                if ($local['semana3']) {
                                    if ($local['quarta_i'] && $local['quarta_f']) {
                                        echo $local['quarta_i'];
                                        echo ' - ';
                                        echo $local['quarta_f'];
                                    }
                                    if ($local['quarta_i'] && $local['quarta_f'] == null) {
                                        echo 'À partir das ';
                                        echo $local['quarta_i'];
                                    } else if ($local['quarta_i'] == null && $local['quarta_f']) {
                                        echo 'Até as ';
                                        echo $local['quarta_f'];
                                    } else if ($local['quarta_i'] == null && $local['quarta_f'] == null) {
                                        echo 'O dia todo ';
                                    }
                                }
                                ?>                        
                            </td>
                        </tr>
                        <!----------------------------google agenda----------------------------------------->
                        
                            <tr>
                                <td></td>
                            <td><span class="agenda">
                                <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php
                                if (get_post_meta(get_the_ID(), 'nome', true))
                                    echo esc_html(get_post_meta(get_the_ID(), 'nome', true));
                                else
                                    echo get_the_title();?>&dates=<?php echo date("Ymd", strtotime($inicio)) ?>T<?php
                                if ($local['quarta_i'])
                                    echo date("His", strtotime($h_inicio3));
                                else {
                                    echo '090000';
                                }
                        ?>/<?php echo date("Ymd", strtotime($fim)) ?>T<?php
                        if ($local['quarta_f'])
                            echo date("His", strtotime($h_fim3));
                        else {
                            echo '220000';
                        }
                    ?>&details=Para+mais+detalhes,+acesse%3a+<?php 
                        if ($local['site'])
                            echo $local['site']; 
                        else
                            the_permalink()  
                        ?>&location=<?php
                        echo $local['nome_local'];
                        ?>,+<?php echo $local['endereco']; ?>&sf=true&output=xml#f">
                           + Google Agenda
                           </a></span>                           
                            </td>
                        </tr>
                        <!----------------------------fim google agenda----------------------------------------->
                        <?php endif; ?>
                        <!--horario3--------------------------------------------->
                         <!--horario4---------------------------------------------->
                        <?php if ( $local['semana4'] || $local['quinta_i'] || $local['quinta_f']) : ?>                            
                        
                        <tr>
                            <td>
                            </td>
                            <td>
                            <!-- dia da semana/horario---->
                            
                            <?php
                                if (!$local['semana4']) {
                                    if ($local['quinta_i'] && $local['quinta_f']) {
                                        echo $local['quinta_i'];
                                        echo ' - ';
                                        echo $local['quinta_f'];
                                    }
                                    if ($local['quinta_i'] && $local['quinta_f'] == null) {
                                        echo 'À partir das ';
                                        echo $local['quinta_i'];
                                    } else if ($local['quinta_i'] == null && $local['quinta_f']) {
                                        echo 'Até as ';
                                        echo $local['quinta_f'];
                                    }
                                    /*else if ( $local['quinta_i'] == null && $local['quinta_f'] == null) {
                                     echo 'O dia todo';
                                     }     */
                                } else {
                                
                                    echo '<span class="semana">'. $local['semana4'] . '</span>';                                    
                                
                                }
                            ?> 
                            
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <?php
                                if ($local['semana4']) {
                                    if ($local['quinta_i'] && $local['quinta_f']) {
                                        echo $local['quinta_i'];
                                        echo ' - ';
                                        echo $local['quinta_f'];
                                    }
                                    if ($local['quinta_i'] && $local['quinta_f'] == null) {
                                        echo 'À partir das ';
                                        echo $local['quinta_i'];
                                    } else if ($local['quinta_i'] == null && $local['quinta_f']) {
                                        echo 'Até as ';
                                        echo $local['quinta_f'];
                                    } else if ($local['quinta_i'] == null && $local['quinta_f'] == null) {
                                        echo 'O dia todo ';
                                    }
                                }
                                ?>                      
                            </td>
                        </tr>
                        <!----------------------------google agenda----------------------------------------->
                            
                           
                            <tr>
                                <td></td>
                            <td><span class="agenda">
                                <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php
                                if (get_post_meta(get_the_ID(), 'nome', true))
                                    echo esc_html(get_post_meta(get_the_ID(), 'nome', true));
                                else
                                    echo get_the_title();?>&dates=<?php echo date("Ymd", strtotime($inicio)) ?>T<?php
                                if ($local['quinta_i'])
                                    echo date("His", strtotime($h_inicio4));
                                else {
                                    echo '090000';
                                }
                        ?>/<?php echo date("Ymd", strtotime($fim)) ?>T<?php
                        if ($local['quinta_f'])
                            echo date("His", strtotime($h_fim4));
                        else {
                            echo '220000';
                        }
                    ?>&details=Para+mais+detalhes,+acesse%3a+<?php 
                        if ($local['site'])
                            echo $local['site']; 
                        else
                            the_permalink()  
                        ?>&location=<?php
                        echo $local['nome_local'];
                        ?>,+<?php echo $local['endereco']; ?>&sf=true&output=xml#f">
                           + Google Agenda
                           </a></span>                           
                            </td>
                        </tr>
                        <!----------------------------fim google agenda----------------------------------------->
                        <?php endif; ?>
                        <!--horario3--------------------------------------------->
                        
                        <?php if( $local['nome_local']) : ?>
                        <tr>
                            <td><span class="icon"></span></td>
                            <td><span class="fn"><strong><?php echo $local['nome_local']; ?></strong></span><br>
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
                                <span class="value"><?php echo $local['telefone']; ?></span>
                            </div></td>
                        </tr>
                        <tr>
                            <?php if ($local['site']) :?>
                            <td>
                                <span class="icon"></span
                            </td>
                            <td>
                            <div class="url">
                                <a href="<?php echo $local['site']; ?>" ><?php echo $local['site']; ?></a>
                            </div></td>
                            <?php endif;?>
                            </tr>
                            <?php if( $local['observacoes']) : ?>
                            <tr>
                                <td><span class="icon2"></span></td>                                
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
