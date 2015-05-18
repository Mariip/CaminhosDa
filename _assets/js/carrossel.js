//Velocidade da rotação e contador

//Pega o valor da largura e calcular o valor da posição da esquerda
var item_width = jQuery('#slides li').outerWidth();
var left_value = item_width * (-1);
var run;
var interval = {
	clear: function() { clearInterval(run) },
	set: function() { run = setInterval( function() { nextslide(); }, 5000 ) }
};



//Move o último item e o coloca como o primeiro
jQuery('#slides li:first').before(jQuery('#slides li:last'));

function prevslide() {
	//Pega a posição da direita
	var left_indent = parseInt(jQuery('#slides ul').css('left')) + item_width;

	//Move o item
	jQuery('#slides ul').stop(true, true).animate(
		{ 'left' : left_indent },
		400,
		function() {
			//Move o último item e o coloca como o primeiro
			var first = jQuery('#slides li:first');
			var last = jQuery('#slides li:last');
			last.insertBefore(first);
			//Coloca o item atual na posição correta
			jQuery('#slides ul').css({'left' : left_value});
		}
	);

	//Cancela o comportamento do click
	return false;
}

function nextslide() {
	//Pega a posição da direita
	var left_indent = parseInt(jQuery('#slides ul').css('left')) - item_width;

	//Move o item
	jQuery('#slides ul').stop(true, true).animate(
		{ 'left' : left_indent },
		400,
		function() {
			//Move o último item e o coloca como o primeiro
			var first = jQuery('#slides li:first');
			var last = jQuery('#slides li:last');
			first.insertAfter(last);
			//Coloca o item atual na posição correta
			jQuery('#slides ul').css({'left' : left_value });
		}
	);

	//Cancela o comportamento do click
	return false;
}

//Se o usuário clica no botão ANTERIOR
jQuery('#prev').click(function() {
	prevslide();
});

//Se o usuário clica no botão PROXIMO
jQuery('#next').click(function() {
	nextslide();
});

//Se o usuário está com o mouse sob a imagem, para a rotacao, caso contrário, continua

jQuery('#carrossel').hover (
	//on mouse
	function() {
		console.log('hover on');
		interval.clear();
    },
    //off mouse
    function() {
    	console.log('hover off');
        if (jQuery(window).width() > 768) {
        	interval.clear();
        	interval.set();
        } else {
        	interval.clear();
        }
	}
);

jQuery(window).resize(function() {
	console.log('resize');
	if (jQuery(window).width() < 768) {
		interval.clear();
	} else {
		interval.clear();
		interval.set();
	}
});

