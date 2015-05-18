<?php get_header(); ?>


<body class="single">
<div class="clip">
                            <div class="quadradodatahoje clearfix">
                                    <span class="dmes"><?php echo date("M", strtotime($data_i)); ?></span>
                                    <span class="data"><?php echo date("j", strtotime($data_i)); ?></span>
                                </div>
<?php

if (get_post(get_post_thumbnail_id()) -> post_excerpt) {
    echo '<div id="legenda"><span class="categoriamob">cinema<br></span>' .   get_post(get_post_thumbnail_id()) -> post_excerpt . '</div>';
}
?>
                <?php
                if (has_post_thumbnail())
                    the_post_thumbnail();
                else { echo '<img src="';
                    header_image();
                    echo '" />';
                }
 ?>

 


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
                                <?php if ( $data_f == null ) : ?>                                    
                                    <span class="singlemes"><?php echo date("M", strtotime($data_i)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_i)); ?></span>
                                <?php endif; ?>
                                <?php if ( $data_i && $data_f ) : ?>                            
                                    <div class="wrap"><span class="singlemes"><?php echo date("M", strtotime($data_i)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_i)); ?></span></div><hr>
                                    <div class="wrap"><span class="singlemes"><?php echo date("M", strtotime($data_f)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_f)); ?></span></div>
                                <?php endif; ?>
                            </div> 
                            
                            <div class="info">
                                <span class="categorianormal"><?php foreach((get_the_category()) as $category) if ( strcmp($category->cat_name, 'Carrossel') ) echo $category->cat_name . ' ';  ?></span></span>
                                <h2> <?php echo get_the_title(); ?></h2>
                            </div>
                        </header>
                        <?php the_content() ?>
                            <span class="autor">Texto escrito por <?php echo get_the_author(); ?></span>

                    </article>
                </main>

            </div><!-- Primary -->
          <!---  <div class="evento clearfix">

                <header class="event-info clearfix">
                    <!---                              <div class="event-date">
                    <span class="event-dsemana">SEG</span><span class="event-data">14</span>
                    </div>--->
          <!---          <div class="datanoticiahoje clearfix">
                     <?php if ( $data_f == null ) : ?>                                    
                                    <span class="singlemes"><?php echo date("M", strtotime($data_i)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_i)); ?></span>
                                <?php endif; ?>
                                <?php if ( $data_i && $data_f ) : ?>                            
                                    <div class="wrap"><span class="singlemes"><?php echo date("M", strtotime($data_i)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_i)); ?></span></div><hr>
                                    <div class="wrap"><span class="singlemes"><?php echo date("M", strtotime($data_f)); ?></span>
                                    <span class="singledata"><?php echo date("j", strtotime($data_f)); ?></span></div>
                                <?php endif; ?></div>
                    <div class="event-name clearfix">
                        <span class="categoria">Cinema</span><h1 class="event-title"><?php echo esc_html( get_post_meta( get_the_ID( ), 'nome', true )) ?></h1>
                    </div>

                    <div class="extras-lado">
                        <ul>
                            <li><span class="icon"></span> <?php echo esc_html ( get_post_meta( get_the_ID( ), 'classificacao', true )) ?> </li>
                            <li><span class="icon"> $ </span> R$<?php echo esc_html( get_post_meta( get_the_ID( ), 'preco', true )) ?></li>
                            <li><span class="icon"> + </span> <a href="<?php echo esc_html( get_post_meta( get_the_ID( ), 'site_evento', true )) ?>">Saiba Mais</a> </li>
                        </ul>
                    </div><?php endwhile; ?>

                </header>
<?php $locais = get_post_meta($post -> ID, 'locais', true); ?>
<?php foreach ((array)$locais as $local) : ?>               
<div class="vcard">

                    <table class="endereco">
                        <tr>

                            <td><span class="icon"></span>
                            </td>
                            <!-- adicionar no plugin inicio/fim de cada local--->
         <!---                   <td><strong> De <?php echo $local['inicio']; ?> até <?php echo $local['fim']; ?> </strong>
                            </td>
                        </tr>
                       <?php if ( $local['semana1'] || $local['segunda_i'] || $local['segunda_f']) : ?>                            
                        
                        <tr>
                            <td><span class="icon"></span>
                            </td>
                            <td>
                            <!-- dia da semana/horario---->
         <!---                   <span class="semana"> 
                            <?php                             
                            if ( $local['semana1'] == null ) {
                                    if ( $local['segunda_i'] && $local['segunda_f']) {
                                        echo $local['segunda_i'];
                                        echo ' - ';
                                        echo $local['segunda_f']; 
                                    }
                                    if ( $local['segunda_i'] && $local['segunda_f'] == null ) {
                                        echo 'À partir das ';    
                                        echo $local['segunda_i'];
                                    }
                                    else if ( $local['segunda_i'] == null && $local['segunda_f'] ) {
                                        echo 'Até as ';    
                                        echo $local['segunda_f'];
                                    }
                                    /*else if ( $local['segunda_i'] == null && $local['segunda_f'] == null) {
                                        echo 'O dia todo'; 
                                    }     */                               
                            }
                            else {
                                echo $local['semana1']; 
                            }
                            
                            ?> 
                            </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <?php if ( $local['semana1'] )  {
                                    if ( $local['segunda_i'] && $local['segunda_f']) {
                                        echo $local['segunda_i'];
                                        echo ' - ';
                                        echo $local['segunda_f']; 
                                    }
                                    if ( $local['segunda_i'] && $local['segunda_f'] == null ) {
                                        echo 'À partir das ';    
                                        echo $local['segunda_i'];
                                    }
                                    else if ( $local['segunda_i'] == null && $local['segunda_f'] ) {
                                        echo 'Até as ';    
                                        echo $local['segunda_f'];
                                    }
                                    else if ( $local['segunda_i'] == null && $local['segunda_f'] == null) {
                                        echo 'O dia todo '; 
                                    }
                                }
                                ?>
                                                       
                            </td>
                        
                        <?php endif; ?>
                        <!--horario2---------------------------------------------->
        <!---                <?php if ( $local['semana2'] || $local['terca_i'] || $local['terca_f']) : ?>                            
                        
                        <tr>
                            <td>
                            </td>
                            <td>
                            <!-- dia da semana/horario---->
          <!---                  <span class="semana"> 
                            <?php                             
                            if ( $local['semana2'] == null ) {
                                    if ( $local['terca_i'] && $local['terca_f']) {
                                        echo $local['terca_i'];
                                        echo ' - ';
                                        echo $local['terca_f']; 
                                    }
                                    if ( $local['terca_i'] && $local['terca_f'] == null ) {
                                        echo 'À partir das ';    
                                        echo $local['terca_i'];
                                    }
                                    else if ( $local['terca_i'] == null && $local['terca_f'] ) {
                                        echo 'Até as ';    
                                        echo $local['terca_f'];
                                    }
                                    /*else if ( $local['terca_i'] == null && $local['terca_f'] == null) {
                                        echo 'O dia todo'; 
                                    }     */                               
                            }
                            else {
                                echo $local['semana1']; 
                            }
                            
                            ?> 
                            </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <?php if ( $local['semana2'] )  {
                                    if ( $local['terca_i'] && $local['terca_f']) {
                                        echo $local['terca_i'];
                                        echo ' - ';
                                        echo $local['terca_f']; 
                                    }
                                    if ( $local['terca_i'] && $local['terca_f'] == null ) {
                                        echo 'À partir das ';    
                                        echo $local['terca_i'];
                                    }
                                    else if ( $local['terca_i'] == null && $local['terca_f'] ) {
                                        echo 'Até as ';    
                                        echo $local['terca_f'];
                                    }
                                    else if ( $local['terca_i'] == null && $local['terca_f'] == null) {
                                        echo 'O dia todo '; 
                                    }
                                }
                                ?>                    
                            </td>
                        
                        <?php endif; ?>
                        <!--horario2--------------------------------------------->
                        <!--horario3---------------------------------------------->
         <!---               <?php if ( $local['semana3'] || $local['quarta_i'] || $local['quarta_f']) : ?>                            
                        
                        <tr>
                            <td>
                            </td>
                            <td>
                            <!-- dia da semana/horario---->
        <!---                    <span class="semana"> 
                            <?php                             
                            if ( $local['semana3'] == null ) {
                                    if ( $local['quarta_i'] && $local['quarta_f']) {
                                        echo $local['quarta_i'];
                                        echo ' - ';
                                        echo $local['quarta_f']; 
                                    }
                                    if ( $local['quarta_i'] && $local['quarta_f'] == null ) {
                                        echo 'À partir das ';    
                                        echo $local['quarta_i'];
                                    }
                                    else if ( $local['quarta_i'] == null && $local['quarta_f'] ) {
                                        echo 'Até as ';    
                                        echo $local['quarta_f'];
                                    }
                                    /*else if ( $local['quarta_i'] == null && $local['quarta_f'] == null) {
                                        echo 'O dia todo'; 
                                    }     */                               
                            }
                            else {
                                echo $local['semana1']; 
                            }
                            
                            ?> 
                            </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <?php if ( $local['semana3'] )  {
                                    if ( $local['quarta_i'] && $local['quarta_f']) {
                                        echo $local['quarta_i'];
                                        echo ' - ';
                                        echo $local['quarta_f']; 
                                    }
                                    if ( $local['quarta_i'] && $local['quarta_f'] == null ) {
                                        echo 'À partir das ';    
                                        echo $local['quarta_i'];
                                    }
                                    else if ( $local['quarta_i'] == null && $local['quarta_f'] ) {
                                        echo 'Até as ';    
                                        echo $local['quarta_f'];
                                    }
                                    else if ( $local['quarta_i'] == null && $local['quarta_f'] == null) {
                                        echo 'O dia todo '; 
                                    }
                                }
                                ?>                        
                            </td>
                        
                        <?php endif; ?>
                        <!--horario3--------------------------------------------->
                         <!--horario4---------------------------------------------->
     <!---                   <?php if ( $local['semana4'] || $local['quinta_i'] || $local['quinta_f']) : ?>                            
                        
                        <tr>
                            <td>
                            </td>
                            <td>
                            <!-- dia da semana/horario---->
      <!---                      <span class="semana"> 
                            <?php                             
                            if ( $local['semana4'] == null ) {
                                    if ( $local['quinta_i'] && $local['quinta_f']) {
                                        echo $local['quinta_i'];
                                        echo ' - ';
                                        echo $local['quinta_f']; 
                                    }
                                    if ( $local['quinta_i'] && $local['quinta_f'] == null ) {
                                        echo 'À partir das ';    
                                        echo $local['quinta_i'];
                                    }
                                    else if ( $local['quinta_i'] == null && $local['quinta_f'] ) {
                                        echo 'Até as ';    
                                        echo $local['quinta_f'];
                                    }
                                    /*else if ( $local['quinta_i'] == null && $local['quinta_f'] == null) {
                                        echo 'O dia todo'; 
                                    }     */                               
                            }
                            else {
                                echo $local['semana4']; 
                            }
                            
                            ?> 
                            </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <?php if ( $local['semana4'] )  {
                                    if ( $local['quinta_i'] && $local['quinta_f']) {
                                        echo $local['quinta_i'];
                                        echo ' - ';
                                        echo $local['quinta_f']; 
                                    }
                                    if ( $local['quinta_i'] && $local['quinta_f'] == null ) {
                                        echo 'À partir das ';    
                                        echo $local['quinta_i'];
                                    }
                                    else if ( $local['quinta_i'] == null && $local['quinta_f'] ) {
                                        echo 'Até as ';    
                                        echo $local['quinta_f'];
                                    }
                                    else if ( $local['quinta_i'] == null && $local['quinta_f'] == null) {
                                        echo 'O dia todo '; 
                                    }
                                }
                                ?>                      
                            </td>
                        
                        <?php endif; ?>
                        <!--horario3--------------------------------------------->
                        
                        
    <!---                    <tr>
                            <td><span class="icon"></span></td>
                            <td><span class="fn"><strong><?php echo $local['nome_local']; ?></strong></span><br>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><div class="adr">
                                <?php echo $local['endereco']; ?>
                            </div></td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                            <div class="tel">
                                <span class="value"><?php echo $local['telefone']; ?></span>
                            </div></td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                            <div class="url">
                                <a href="<?php echo $local['site']; ?>" ><?php echo $local['site']; ?></a>
                            </div></td>
                            </tr>
                            <?php if( $local['observacoes']) : ?>
                            <tr>
                                <td><span class="icon"></span></td>                                
                            <td>
                            <?php echo $local['observacoes']; ?>
                            </td>
                        </tr><?php endif; ?>

                    </table>
                </div><!-- .vcard -->
     <!---           <hr>


                <?php endforeach; ?>   
                             
        </div> -->
            <div id="calendario">
                <ul>
                    <li><a href="#"></a></li>
                    <!---     <li><a href="#"></a></li>--->
                    <li><a href="#"><span class="face"></span></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>

        </div><!-- #main-->

        <?php get_footer(); ?>
