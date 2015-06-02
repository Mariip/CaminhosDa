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
                        <span class="categoria">Informações</span>
                        <h1 class="event-title"><?php if ($nome) echo esc_html( get_post_meta( get_the_ID( ), 'nome', true )); else echo get_the_title();  ?></h1>
                    </div>

                    <div class="extras-lado">
                   
                    </div><?php endwhile; ?>

                </header>
<?php $locais = get_post_meta($post -> ID, 'locais', true); ?>
<?php foreach ((array)$locais as $local) : ?> 
                  
<div class="vcard clearfix">
                    <table class="endereco">
                         
                        
                        <tr>
                            <td><span class="icon2"></span>
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
                      
                        <?php endif; ?>
                        <!--horario3-->
                        <div class="adr">
                        <tr>
                            <td><span class="icon2"></span></td>
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
                                <span class="icon2"></span>
                            </td>
                            <td>
                            <div class="url">
                                <a href="<?php echo $local['site']; ?>" ><?php echo $local['site']; ?></a>
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
                    
                   <!----script> 
jQuery(document).ready(function(){
    jQuery("address").each(function(){                         
        var embed ="<iframe width='450' height='250' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( jQuery(this).text() ) +"&amp;output=embed'></iframe>";
        jQuery(this).html(embed);             
});
    });</script----->
                </div><!-- .vcard -->
                <!------address><?php echo $local['endereco']; ?></address---->
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
