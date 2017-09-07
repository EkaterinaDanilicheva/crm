$(document).ready(function(){
		$("#owl-demo").owlCarousel({
			navigation : true,
			pagination: false,
			slideSpeed : 500,			
			singleItem : true
		});
		fontSize();
		headerHeight();
		sliderItem();				
	});

	$(window).resize(function(){
		fontSize();
		headerHeight();
		sliderItem();		
	});

	function fontSize() {
		var windowWidth = $(window).width();
		var koef;		
		if (windowWidth <= 1065 && windowWidth >= 600) {
			koef = 4/465*(1065 - windowWidth); 			
			$('body').css('font-size', 14-koef);						
		} else {
			if (windowWidth <= 600) {
				koef = 4;
				$('body').css('font-size', 14-koef);
			}
			if (windowWidth >= 1066) {
				koef = 0;
				$('body').css('font-size', 14-koef);
			}
		}		
	}
	function headerHeight() {
		var windowWidth = $(window).width();
		if (windowWidth >=768) {
			var headerContent = $('.header-overlay .main__container').height() + 70;
			var headerVideo   = $('.heder-video').height() + 40;
			if (headerContent <= headerVideo) {
				$('#header, .heder-video').css('height', headerContent + 70);
			} else {		
				$('#header, .heder-video').css('height', headerContent);
			}
		}
	}
	function sliderItem() {
		var itemHeight = $('#owl-demo .item').height();
		$('.fifth-screen .fifth-slider #owl-demo').css('max-height', itemHeight);		
	}