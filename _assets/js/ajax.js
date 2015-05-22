    var filtrosSelecionados = '';
    var filtros = {};
    
    filtros['atividades-educativas'] = false;
    filtros['cinema'] = false;
    filtros['teatro'] = false;
    filtros['musica'] = false;
    filtros['encontros'] = false;
    filtros['exposicoes'] = false;
    
     	 jQuery('.atividades-educativas').mouseover(function() {
	     	 jQuery( '.nomefiltro' ).text( 'At. Educativas' )
	     });
	     jQuery('.cinema').mouseover(function() {
	     	 jQuery( '.nomefiltro' ).text( 'Cinema' )
	     });
	     jQuery('.encontros').mouseover(function() {
	     	 jQuery( '.nomefiltro' ).text( 'Encontros' );
	     });
	     jQuery('.musica').mouseover(function() {
	     	 jQuery( '.nomefiltro' ).text( 'Música' );
	     });
	     jQuery('.exposicoes').mouseover(function() {
	     	 jQuery( '.nomefiltro' ).text( 'Exposições' );
	     });
	     jQuery('.teatro').mouseover(function() {
	     	 jQuery( '.nomefiltro' ).text( 'Teatro' );
	     });	     
		 jQuery('.atividades-educativas').mouseleave(function() {
	     	 jQuery( '.nomefiltro' ).text( '' )
	     });
	     jQuery('.cinema').mouseleave(function() {
	     	 jQuery( '.nomefiltro' ).text( '' )
	     });
	     jQuery('.encontros').mouseleave(function() {
	     	 jQuery( '.nomefiltro' ).text( '' );
	     });
	     jQuery('.musica').mouseleave(function() {
	     	 jQuery( '.nomefiltro' ).text( '' );
	     });
	     jQuery('.exposicoes').mouseleave(function() {
	     	 jQuery( '.nomefiltro' ).text( '' );
	     });
	     jQuery('.teatro').mouseleave(function() {
	     	 jQuery( '.nomefiltro' ).text( '' );
	     });
	     
	     
	     
	jQuery('.filtro').click(function( event ) {
	    event.preventDefault();
	    
	    filtros[jQuery( this ).data( 'filtro' )] = !filtros[jQuery( this ).data( 'filtro' )];
	    
	     if(filtros[jQuery( this ).data( 'filtro' )]) {
	       jQuery( this ).addClass('selecionado');
	       }
	       
	     else
	       jQuery( this ).removeClass('selecionado');
	      	       
	        
	     filtrosSelecionados = '';
	     
	     if ( filtros['atividades-educativas'] )
	         filtrosSelecionados += 'atividades-educativas'; 
                   
	     if ( filtros['cinema'] )
	         if (filtros)
	           filtrosSelecionados += ',cinema';	           
	         else
	           filtrosSelecionados += 'cinema';	           
	     if ( filtros['encontros'] )
             if (filtros)
               filtrosSelecionados += ',encontros';
             else
               filtrosSelecionados += 'encontros';
        if ( filtros['musica'] )
             if (filtros)
               filtrosSelecionados += ',musica';
             else
               filtrosSelecionados += 'musica';
        if ( filtros['teatro'] )
             if (filtros)
               filtrosSelecionados += ',teatro';
             else
               filtrosSelecionados += 'teatro';
        if ( filtros['exposicoes'] )
             if (filtros)
               filtrosSelecionados += ',exposicoes';
             else
               filtrosSelecionados += 'exposicoes';
               
	    	
		jQuery.ajax({
			type : 'POST',
			url : ajaxurl,
			data : {
				action : 'filtrar',
				filtros : filtrosSelecionados
			},
			success : function(data, textStatus, XMLHttpRequest) {
				jQuery('#hoje').remove();
				jQuery('#proximos').remove();
				jQuery('#content').append(data);

				jQuery(".hentry").mouseenter(function() {
					if (jQuery(window).width() > 768) {
						jQuery(this).children(".entry-header").stop(true, true).animate({
							top : '0px',
							height : '100%'
						});
					}
				});
				jQuery(".hentry").mouseleave(function() {
					if (jQuery(window).width() > 768) {
						jQuery(this).children(".entry-header").stop(true, true).delay(500).animate({
							top : '140px',
							height : '102px'
						});
					}
				});

				jQuery(".hentry-first").mouseenter(function() {
					if (jQuery(window).width() > 768) {
						jQuery(this).children(".entry-header-hoje").stop(true, true).animate({
							top : '0px',
							height : '100%'
						});
					}
				});
				jQuery(".hentry-first").mouseleave(function() {
					if (jQuery(window).width() > 768) {
						jQuery(this).children(".entry-header-hoje").stop(true, true).delay(500).animate({
							top : '165px',
							height : '77px'
						});
					}
				});
			},
			error : function(MLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	}); 