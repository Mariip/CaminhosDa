<footer id="colophon" role="contentinfo">
    <div id="site-info">
        <a href="<?php echo home_url(); ?>">
        <ul>
            <li><h1><SPAN CLASS="fn">Caminhos da Cultura </SPAN></h1></li>
            <div class="adr">
                <li><span class="street-address"> Rua da Reitoria, 374 </span>-<span class="extended-address"> 2° andar</span></li>
                
                <li><span class="postal-code"> CEP 05508-050</span> - <span class="locality">São Paulo</span> - <span class="region">SP</span></li>
            </div>
            <li>
                <div class="tel">
                    <span class="value">tel.: (11) 2648-0503 </span>
                </div></li>
            <li> guiadecultura@usp.br </li>
        </ul>
        </a>
        <div id="marca">
            <a href="http://www.prceu.usp.br"><img src="http://prceu.usp.br/caminhosdacultura/wp-content/uploads/2014/10/prceucaminhos.png"></a>
        </div>
    </div><!-- #site-info-->

</footer>

</div><!-- #page -->
 <div id="searchbox">
     
                   
 	<div id="search" class="clearfix">
 	<div id="searchmenu">
     <div class="busca">
    
        <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="input-group">
                <input type="search" id="s" name="s" value="<?php echo $_GET['s']; ?>" class="form-control field" />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default submit">
                    <span class="lupa"></span>
                </button>
                </span>
            </div>
        <!-- .input-group -->
        </form>
    </div>
    
    <ul><h2>Categorias</h2>
       <li><a class="atividades-educativas" href="<?php echo get_home_url(); ?>/category/atividades-educativas/?s=<?php echo $_GET['s']; ?>">At. Educativas</a></li>
        <li><a class="cinema" href="<?php echo get_home_url(); ?>/category/cinema/?s=<?php echo $_GET['s']; ?>">Cinema</a></li>
        <li><a class="encontros" href="<?php echo get_home_url(); ?>/category/encontros/?s=<?php echo $_GET['s']; ?>">Encontros</a></li>
        <li><a class="exposicoes" href="<?php echo get_home_url(); ?>/category/exposicoes/?s=<?php echo $_GET['s']; ?>">Exposições</a></li>
        <li><a class="musica" href="<?php echo get_home_url(); ?>/category/musica/?s=<?php echo $_GET['s']; ?>">Música</a></li>
        <li><a class="teatro2" href="<?php echo get_home_url(); ?>/category/teatro/?s=<?php echo $_GET['s']; ?>">Teatro</a></li>
    </ul></div>
       

        
	</div>   
	        <header class="topo clearfix">
            <h2>Resultados</h2>
            <span class="sair"><a href="#"></a></span>
        </header>       
</div>

 	
 	
 	
 	
 	
 </div>
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/_assets/js/jquery.hammer-full.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/_assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/_assets/js/carrossel.js"></script>
<!---<script type="text/javascript" src="./_assets/js/scrolltop.js"></script>--->
<!---  <script type="text/javascript" src="./_assets/js/easing.min.js"></script>
<script type="text/javascript" src="./_assets/js/scrollsnap.js"></script>--->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/_assets/js/ajax.js"></script>
<!---<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/_assets/js/busca.js"></script>-->


<!-- begin wp_footer( ) -->
<?php wp_footer(); ?>
<!-- end wp_footer( ) -->
</body>

</html>