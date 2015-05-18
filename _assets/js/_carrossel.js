	//Velocidade da rotação e contador
	//var speed = 4000;
	

	//Pega o valor da largura e calcular o valor da posição da esquerda
	var item_width = jQuery('#slides li').outerWidth();
	var left_value = item_width * (-1);

	//Coloca o último item antes do primeiro item, caso o usuário clique no botão de ANTERIOR
	jQuery('#slides li:first').before(jQuery('#slides li:last'));

	//Coloca o item atual na posição correta
	jQuery('#slides ul').css({
		'left' : left_value
	});
	
	rotate = function (){
		var left_indent = parseInt(jQuery('#slides ul').css('left')) - item_width;

		//Move o item
		jQuery('#slides ul').animate({
			'left' : left_indent
		}, 400, function() {

			//Move o último item e o coloca como o primeiro
			jQuery('#slides li:last').after(jQuery('#slides li:first'));
			//Coloca o item atual na posição correta
			jQuery('#slides ul').css({'left' : left_value });

		});
	}
	var run = setInterval(rotate(), 4000);
	//Se o usuário clica no botão ANTERIOR
		jQuery('#prev').click(function() {

			//Pega a posição da direita
			var left_indent = parseInt(jQuery('#slides ul').css('left')) + item_width;

			//Move o item
			jQuery('#slides ul').animate({
				'left' : left_indent
			}, 400, function() {

				//Move o último item e o coloca como o primeiro
				jQuery('#slides li:first').before(jQuery('#slides li:last'));

				//Coloca o item atual na posição correta
				jQuery('#slides ul').css({'left' : left_value});

			});

			//Cancela o comportamento do click
			return false;

		});
	//Se o usuário clica no botão PROXIMO
	jQuery('#next').click(function() {

		//Pega a posição da direita
		var left_indent = parseInt(jQuery('#slides ul').css('left')) - item_width;

		//Move o item
		jQuery('#slides ul').animate({
			'left' : left_indent
		}, 400, function() {

			//Move o último item e o coloca como o primeiro
			jQuery('#slides li:last').after(jQuery('#slides li:first'));
			//Coloca o item atual na posição correta
			jQuery('#slides ul').css({'left' : left_value });

		});

		//Cancela o comportamento do click
		return false;

	});

	//Se o usuário está com o mouse sob a imagem, para a rotacao, caso contrário, continua


/*	jQuery('#carrossel').hover(function() {
		clearInterval(run);
	}, function() {
		if (jQuery(window).width() > 768) {
			run = setInterval(function() {
				jQuery('#next').click();
			}, 4000);
		}
	});
	
	if (jQuery(window).width() > 768) {
		run = setInterval(function() {
			jQuery('#next').click();
		}, 4000);
	} else {
		clearInterval(run);
	}

	jQuery(window).resize(function() {
		if (jQuery(window).width() < 768) {
			clearInterval(run)			
		} else {
			run = setInterval(function() {
				jQuery('#next').click();
			}, 4000);
		}

	});
*/

jQuery('#carrossel').hover( function() {
    clearInterval(run);
    },function() {
         if (jQuery(window).width() > 768) {
            run = setInterval( function(){jQuery('#next').click();} , 4000);
         }
    });
        if ($(window).width() > 768) {
            run = setInterval( function(){jQuery('#next').click();} , 4000);
    }
    else{
          clearInterval(run);  
        }
	jQuery(window).resize(function() {
		if (jQuery(window).width() < 768) {
			clearInterval(run);			
		} else {
			run = setInterval(function() {
				jQuery('#next').click();
			}, 4000);
		}
    
});