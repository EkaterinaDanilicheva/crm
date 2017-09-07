<?php
// amocrm
$method = $_SERVER['REQUEST_METHOD'];

if ( $method === 'GET' ) {
	if ($_GET["phone"] || $_GET["email"]){
		
		$form_subject = trim($_GET["submit"]);
		$phone = trim($_GET["phone"]);
		$email = trim($_GET["email"]);
		
		$form_subject = 'Заявка ('.$form_subject.') с сайта svoiokna96.ru';

		$roistatVisitId = array_key_exists('roistat_visit', $_COOKIE) ? $_COOKIE['roistat_visit'] : "не определился";

		require_once('amocrm/class-amocrm.php');
		require_once('amocrm/inc-credentials.php');

		$amo = new AmoCRM(AMO_LOGIN, AMO_HASH, AMO_SUBDOMAIN);
		//($name, $price, $status_id, $roistat, $type, $height, $width){
		$lead_id = $amo->addLead($form_subject, 0.0, false, $roistatVisitId, 'Окно', false, false);
		if(!$name) {
			$name = 'Имя отсутствует';
		}
		if(!$phone) {
			$phone = '';
		}
		if(!$email) {
			$email = '';
		}
		$amo->addContact($name, $email, $phone, $lead_id);
		
		header('Location: '.$_SERVER['PHP_SELF']);		
	
	}
	
}
?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Пластиковые окна Екатеринбург. Производство, продажа и установка металлопластиковых окон в Екатеринбурге и Свердловской области. Качественно изготовим и установим за 5 дней!">
	<meta name="google-site-verification" content="-XuR2n5i3oWXTpGlDyU0HFdbQaki271N0cozzKvgGi0" />
	<meta name="yandex-verification" content="c3efe0a1b8d6c877" />
    <title>Свои Окна - пластиковые окна в Екатеринбурге.</title>   
	<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
	<!-- HTML56 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-97188399-1', 'auto');
 ga('require', 'displayfeatures');
 ga('send', 'pageview');

 /* Accurate bounce rate by time */
 if (!document.referrer ||
 document.referrer.split('/')[2].indexOf(location.hostname) != 0)
 setTimeout(function(){
 ga('send', 'event', 'Новый посетитель', location.pathname);
 }, 15000);</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter44125749 = new Ya.Metrika({
                    id:44125749,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44125749" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
    <script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
    var js = d.createElement(s); js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '56e633c8b439abf3027b86022e59d964');
</script>
	<header id="header">
		<div class="heder-video">
			<video autoplay loop>
	    		<source src="assets/oknav.mp4" type="video/mp4">
	   			<source src="assets/oknav.webm" type="video/webm">
	  		</video>
	  	</div>
	  	<div class="header-overlay">
			<div class="main__container">
				<section class="header-top">
					<div class="header-logo"><a href="#"><img src="img/header-logo.png" alt="Пластиковые окна Екатеринбург" title="Пластиковые окна Екатеринбург"></a></div>
					<div >
						<h1 class="header-slogan">ПЛАСТИКОВЫЕ ОКНА В ЕКАТЕРИНБУГЕ</h1>
					</div>
					<div class="header-btn"><a href="opt.html">ПЕРЕЙТИ В ОПТ</a></div>
					<div class="header-tel"><a href="#"><span class="podmenaroistatpyshma">+7(343)351-74-28</span></a></div>		
				</section>
				<section class="header-middle clearfix">
					<img src="img/middle-logo.png" alt="Логотип Наши Окна" title="Логотип">
					<h2>МЫ ПРОИЗВОДИТЕЛИ, ПОТОМУ У НАС <br>
						<span>САМЫЕ НИЗКИЕ ЦЕНЫ НА ПЛАСТИКОВЫЕ ОКНА,</span><br>
						БЕЗ ПОСРЕДНИКОВ.
					</h2>
				</section>
				<section class="header-bottom">
					<p>ЗАПИШИТЕСЬ НА БЕСПЛАТНЫЙ ЗАМЕР СЕЙЧАС И УЖЕ ЧЕРЕЗ 5 ДНЕЙ МЫ УСТАНОВИМ ВАМ ОКНО</p>
					<div class="header-bottom-form">
						<form id="form">
							<div class="input-text"><input type="text" name="phone" placeholder="Ваш номер телефона" required></div>
							<div class="input-submit"><input type="submit" class="tossing" name="submit" value="Перезвонить мне" onclick="yaCounter44125749.reachGoal('CALL');ga('send', {hitType: 'event', eventCategory: 'CALL', eventAction: 'CALL'});return true;"></div>
							<input type="hidden" name="formData" value="Перезвонить мне">
						</form>
					</div>
				</section>
			</div>
		</div>
	</header>
	<section class="fourth-screen">

		<div class="main__container">			
			<h2>КОМПЛЕКТАЦИЯ ОКНА</h2>
			<div class="okno">
				<img src="img/okno.png" alt="Фотография окна" title="Пример окна">
				<div class="cost">
					<p class="title">ЦЕНА</p>
					<p class="text">ОТ <span>5200</span> РУБ</p>
				</div>			
				<div class="okno-text first-okno">
					<div class="title">СТЕКЛОПАКЕТ:</div>
					<div class="text">
						Однокамерный, двухкамерный, одно стекло, тонированные,<br>
						Бронирование, бронь А1, А2, А3,
					</div>
				</div>
				<div class="okno-text second-okno">
					<div class="title">ОТКОСЫ:</div>
					<div class="text">Сэндвич 10мм</div>
				</div>
				<div class="okno-text third-okno">
					<div class="title">ПРОФИЛЬ:</div>
					<div class="text">3 камерный, 5 камерный. Ламинированный, крашенный.</div>
				</div>
				<div class="okno-text fourth-okno">
					<div class="title">ПОДОКОННИК:</div>
					<div class="text">Стандарт, danke</div>
				</div>
			</div>
			<div class="pdf-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal3">СКАЧАТЬ ПРЕЗЕНТАЦИЮ</a></div>
		</div>
	</section>	
	<section class="third-screen">
		<div class="main__container">
			<h3>ПОСМОТРИТЕ ВИДЕО</h3>
			<h2>О НАШЕМ<br>ПРОИЗВОДСТВЕ</h2>
			<div class="video">				
				<iframe width="745" height="415" src="https://www.youtube.com/embed/5syVJRScY-o?rel=0&amp;controls=0&amp;showinfo=0" allowfullscreen=""></iframe>
			</div>
					<div class="main__container">
			<section class="header-bottom">
				<p>получить бесплатную консультацию</p>
				<div class="header-bottom-form">
					<form id="form">
						<div class="input-text"><input type="text" name="phone" placeholder="Ваш номер телефона" required></div>
						<div class="input-submit"><input type="submit" class="tossing" name="submit" value="Получить консультацию"  onclick="yaCounter44125749.reachGoal('KONSL');ga('send', {hitType: 'event', eventCategory: 'KONSL', eventAction: 'KONSL'});return true;"></div>
						<input type="hidden" name="formData" value="Бесплатная консультация">
					</form>
				</div>
			</section>
		</div>
		</div>
	</section>
	<section class="second-screen">
		<div class="main__container">
			<div class="second-screen-man clearfix">
				<div class="items">
					<div class="item">
						<p class="big-text">С 2008</p>
						<p class="middle-text">года на рынке</p>
						<p class="small-text">пластиковых окон</p>
					</div>
					<div class="item">
						<p class="small-text">БОЛЕЕ</p>
						<p class="big-text">100 ОКОН</p>
						<p class="middle-text">ПРОИЗВОДИМ В СУТКИ</p>
					</div>
					<div class="item">
						<p class="small-text">БОЛЕЕ</p>
						<p class="big-text">10000</p>
						<p class="middle-text">УСПЕШНЫХ ПРОЕКТОВ</p>
					</div>
					<div class="item">
						<p class="small-text">ГАРАНТИЯ</p>
						<p class="big-text">20000</p>
						<p class="middle-text">ОТКРЫВАНИЙ ВАШЕГО ОКНА</p>
					</div>
					<div class="item">
						<p class="title">ДИРЕКТОР КОМПАНИИ СВОИ ОКНА</p>
						<p class="name">СУХАНОВ АЛЕКСАНДР ЕВГЕНЬЕВИЧ</p>
					</div>
				</div>
				<img src="img/man.png" alt="Фото директора" title="Директор Суханов Александр">
			</div>
			<div class="second-screen-text first-text">
				<p class="big-text">С 2008</p>
				<p class="middle-text">года на рынке</p>
				<p class="small-text">пластиковых окон</p>
			</div>
			<div class="second-screen-text second-text">
				<p class="small-text">БОЛЕЕ</p>
				<p class="big-text">100 ОКОН</p>
				<p class="middle-text">ПРОИЗВОДИМ<br>В СУТКИ</p>				
			</div>
			<div class="second-screen-text third-text">
				<p class="small-text">БОЛЕЕ</p>
				<p class="big-text">10000</p>
				<p class="middle-text">УСПЕШНЫХ<br>ПРОЕКТОВ</p>				
			</div>
			<div class="second-screen-text fourth-text">
				<p class="small-text">ГАРАНТИЯ</p>
				<p class="big-text">20000</p>
				<p class="middle-text">ОТКРЫВАНИЙ<br>ВАШЕГО ОКНА</p>				
			</div>
			<div class="fifth-text">
				<p class="title">ДИРЕКТОР КОМПАНИИ СВОИ ОКНА</p>
				<p class="name">СУХАНОВ АЛЕКСАНДР ЕВГЕНЬЕВИЧ</p>
			</div>
		</div>
	</section>	
	<section class="fifth-screen">
		<div class="main__container">
			<h3>НАША КОМАНДА</h3>			
			<h2>ЛЮДИ, КОТОРЫЕ ДЕЛАЮТ ОКНА</h2>
		</div>
		<section class="fifth-slider">
			<div class="main__container">
				<div id="owl-demo" class="owl-carousel">
					<div class="item">
						<div class="photo">
							<img src="img/slide1.png" alt="Специалист по тендерам" title="Тумайкина Александра">
						</div>
						<div class="description">
							<div class="post">СПЕЦИАЛИСТ ПО ТЕНДЕРАМ</div>
							<div class="name">ТУМАЙКИНА АЛЕКСАНДРА</div>
							<div class="slide-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal">Начать работать с профи</a></div>
						</div>
					</div>
					<div class="item">
						<div class="photo">
							<img src="img/slide2.png" alt="Менеджер по работе с клиентами" title="Загидулина Евагения Андреевна">
						</div>
						<div class="description">
							<div class="post">МЕНЕДЖЕР ПО РАБОТЕ С КЛИЕНТАМИ</div>
							<div class="name">ЗАГИДУЛИНА ЕВГЕНИЯ АНДРЕЕВНА</div>
							<div class="slide-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal">Начать работать с профи</a></div>
						</div>
					</div>
					<div class="item">
						<div class="photo">
							<img src="img/slide3.png" alt="Инженер конструктор" title="Ермакова Мария Борисовна">
						</div>
						<div class="description">
							<div class="post">ИНЖЕНЕР КОНСТРУКТОР</div>
							<div class="name">ЕРМАКОВА МАРИЯ БОРИСОВНА</div>
							<div class="slide-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal">Начать работать с профи</a></div>
						</div>
					</div>
					<div class="item">
						<div class="photo">
							<img src="img/slide4.png" alt="Начальник цеха сборки" title="Усманов Константин Юрьевич">
						</div>
						<div class="description">
							<div class="post">НАЧАЛЬНИК ЦЕХА СБОРКИ</div>
							<div class="name">УСМАНОВ КОНСТАНТИН ЮРЬЕВИЧ</div>
							<div class="slide-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal">Начать работать с профи</a></div>
						</div>
					</div>
					<div class="item">
						<div class="photo">
							<img src="img/slide5.png" alt="Руководитель отдела продаж" title="Пахомова Татьяна Александровна">
						</div>
						<div class="description">
							<div class="post">РУКОВОДИТЕЛЬ ОТДЕЛА ПРОДАЖ</div>
							<div class="name">ПАХОМОВА ТАТЬЯНА АЛЕКСАНДРОВНА</div>
							<div class="slide-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal">Начать работать с профи</a></div>
						</div>
					</div>
					<div class="item">
						<div class="photo">
							<img src="img/slide6.png" alt="Начальник монтажного участка" title="Бондаренко Дмитрий Сергеевич">
						</div>
						<div class="description">
							<div class="post">НАЧАЛЬНИК МОНТАЖНОГО УЧАСТКА</div>
							<div class="name">БОНДАРЕНКО ДМИТРИЙ СЕРГЕЕВИЧ</div>
							<div class="slide-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal">Начать работать с профи</a></div>
						</div>
					</div>
					<div class="item">
						<div class="photo">
							<img src="img/slide7.png" alt="Директор" title="Суханов Александр Евгеньевич">
						</div>
						<div class="description">
							<div class="post">ДИРЕКТОР</div>
							<div class="name">СУХАНОВ АЛЕКСАНДР ЕВГЕНЬЕВИЧ</div>
							<div class="slide-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal">Начать работать с профи</a></div>
						</div>
					</div>
					<div class="item">
						<div class="photo">
							<img src="img/slide8.png" alt="Менеджер по работе с клиентами" title="Тупоногова Наталья Валентиновна">
						</div>
						<div class="description">
							<div class="post">МЕНЕДЖЕР ПО РАБОТЕ С КЛИЕНТАМИ</div>
							<div class="name">ТУПОНОГОВА НАТАЛЬЯ ВАЛЕНТИНОВНА</div>
							<div class="slide-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal">Начать работать с профи</a></div>
						</div>
					</div>					
				</div>
			</div>
		</section>
	</section>
	<section class="sixth-screen">
		<div class="main__container">
			<h3>ОТЗЫВЫ</h3>
			<h2>ЧТО О НАС ГОВОРЯТ</h2>
			<div class="reviews">
				<div class="item clearfix">
					<div class="description">
						<div class="title">ОТЗЫВ</div>
						<p>								
							Мое знакомство с компанией <span>«Свои окна»</span> началось в 2007 году, когда я приобрел квартиру на вторичном рынке в г.Верхняя Пышма.
						</p>
						<p>
							Предстоял полный капитальный ремонт, который нужно было выполнить в кратчайшие сроки. Брат посоветовал компанию «<b>Свои окна</b>», которая уже работала в г.Верхняя Пышма и зарекомендовала себя с хорошей стороны. Консультации, замеры, изготовление и установка <b>пластиковых окон</b> и балкона были <span>выполнены специалистами быстро</span>, и что наиболее важно, с отличным качеством. За время эксплуатации, механизмы открытия окон ни разу не подвели, да и сами окна в значительной степени участвовали в создании общего ощущения уютного и комфортного проживания. Когда в 2011 году уже в новой квартире возник вопрос внесения конструктивного изменения по <b>замене окна</b> на окно с балконной дверью, долго не задумывался, подумал «Если работают, то никого искать не буду, они сделают так как нужно», отыскал телефон и позвонил. Был рад, что фирма не только работает, но и значительно выросла, как на производственном, так и на профессиональном уровне, и сохранила специалистов, которые работали со мной в 2007 году. Приехали быстро, обсудили все вопросы, сняли замеры и быстро изготовили. Как я и ожидал, не подвели. Бонусом, монтажники компании «Свои окна» выполнили работу по расширению оконного проема для установки балконной двери, в который эту дверь и установили. Пользуюсь каждый день, нареканий нет, вспоминаю только добрыми словами, желаю коллективу всего наилучшего.
						</p>
						<p>
							p.s. Кстати, стоимость <b>пластиковых окон</b> и работ по установке предложенная  компанией «Свои окна», в сравнении с предложениями аналогичных компаний, была очень даже хорошая. Рекомендую.
						</p>						
					</div>	
					<div class="photo">
						<img src="img/item1.png" alt="Пластиковые окна для ПФК Торг Строй" title="ПФК Торг Строй">
					</div>				
				</div>
				<section class="header-bottom">
					<p>записаться на бесплатный замер</p>
					<div class="header-bottom-form">
						<form id="form">
							<div class="input-text"><input type="text" name="phone" placeholder="Ваш номер телефона" required></div>
							<div class="input-submit"><input type="submit" class="tossing" name="submit" value="Записаться на бесплатный замер"  onclick="yaCounter44125749.reachGoal('ZAMER');ga('send', {hitType: 'event', eventCategory: 'ZAMER', eventAction: 'ZAMER'});return true;"></div>
							<input type="hidden" name="formData" value="Бесплатный замер">
						</form>
					</div>
				</section>
				<div class="item clearfix">
					<div class="photo">
						<img src="img/item2.png" alt="Пластиковые окна для Спец Авто Трейд" title="Спец Авто Трейд">
					</div>
					<div class="description">
						<div class="title">ОТЗЫВ</div>
						<p>								
							Наша компания <span>"СпецАвтоТрейд"</span> сотрудничает с фирмой <span>ООО "СВОИ ОКНА"</span> уже на протяжении 4-х лет.
						</p>
						<p>	
							<p>За это время мы застеклили несколько крупных строительных объектов. Надежные <b>пластиковые окна</b>, качеством работы <span>остались довольны</span>, монтажные бригады сработали профессионально и в сроки, цена приятно удивила! Рекомендуем сотрудничать с компанией ООО "СВОИ ОКНА".</p>
						</p>						
					</div>										
				</div>
			</div>
			<div class="blue-btn"><a href="#" data-toggle="modal" data-target="#myModal2">Скачать прайс</a></div>
		</div>
	</section>
	<section class="seventh-screen">
		<div class="main__container">
			<h3>АДРЕС, КОНТАКТЫ, КАРТА</h3>
			<h2>ГДЕ МЫ НАХОДИМСЯ</h2>
		</div>
	<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=BryMv44D0hm4zF0CDBY6tDmGjUoHxC2n&width=100%&height=500&lang=ru_RU&sourceType=constructor&scroll=false"></script>		
	</section>
	<footer id="footer">
		<div class="main__container">
			<div class="footer-logo"><a href="#"><img src="img/header-logo.png" alt="Логотип" title="Логотип в футере"></a></div>
			<div class="footer-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal4">Вызвать замерщика</a></div>
			<div class="footer-tel"><a href="#"><span class="podmenaroistatpyshma">+7(343)351-74-28</span></a></div>
		</div>
	</footer>	
	<div class="modal fade callback-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Оставить заявку</h4>
				</div>
				<div class="modal-body">
					<form id="form2">
						<div class="input-text"><input type="text" name="phone" placeholder="Ваш номер телефона" required></div>
						<div class="input-submit"><input type="submit" name="submit" value="Начать работать с профи"  onclick="yaCounter44125749.reachGoal('CALL');ga('send', {hitType: 'event', eventCategory: 'CALL', eventAction: 'CALL'});return true;"></div>
						<input type="hidden" name="formData" value="Начать работать с профи">
					</form>
				</div>				
			</div>
		</div>
	</div>
	<div class="modal fade callback-modal" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Оставить заявку</h4>
				</div>
				<div class="modal-body">
					<form id="form2">
						<div class="input-text"><input type="text" name="phone" placeholder="Ваш номер телефона" required></div>
						<div class="input-submit"><input type="submit" name="submit" value="Вызвать замерщика"  onclick="yaCounter44125749.reachGoal('ZAMER');ga('send', {hitType: 'event', eventCategory: 'ZAMER', eventAction: 'ZAMER'});return true;"></div>
						<input type="hidden" name="formData" value="Вызвать замерщика">
					</form>
				</div>				
			</div>
		</div>
	</div>
	<div class="modal fade callback-modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Скачать прайс</h4>
				</div>
				<div class="modal-body">
					<form id="form3">
						<div class="input-text"><input type="text" name="email" placeholder="Ваш e-mail" required></div>
						<div class="input-submit"><input type="submit" name="submit" value="Скачать прайс" onclick="yaCounter44125749.reachGoal('DOWNLOAD');ga('send', {hitType: 'event', eventCategory: 'DOWNLOAD', eventAction: 'DOWNLOAD'});return true;"></div>	
						<input type="hidden" name="formData" value="Скачать прайс">						
					</form>					
				</div>				
			</div>
		</div>
	</div>
	<div class="modal fade callback-modal" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Скачать презентацию</h4>
				</div>
				<div class="modal-body">
					<form id="form4">
						<div class="input-text"><input type="text" name="email" placeholder="Ваш e-mail" required></div>
						<div class="input-submit"><input type="submit" name="submit" value="Скачать презентацию" onclick="yaCounter44125749.reachGoal('DOWNLOAD');ga('send', {hitType: 'event', eventCategory: 'DOWNLOAD', eventAction: 'DOWNLOAD'});return true;"></div>
					<input type="hidden" name="formData" value="Скачать презентацию">						
					</form>					
				</div>				
			</div>
		</div>
	</div>
<link rel="stylesheet" property="stylesheet" href="css/main.min.css">	
<script src="js/all-scripts.min.js" defer></script>
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=AZnDqLdLtcYtJ69dCTDvmU8bK8Z4F*Dmr9t/f9wUiMIpVts0hrAlDVtpGBR*qlbO*/3ZrYTozF/yFXkxN6l8o56OIe6UkycGkd7o6C5mIz4OOvehbyhMYmKAGbTmDueirnMlZoX6Uxc4jIBmCqW7q2puMpEuRnV8zGh2y5*DTmU-&pixel_id=1000083552';</script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1321853791191597'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1321853791191597&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
<!-- Top100 (Kraken) Counter -->
<script>
    (function (w, d, c) {
    (w[c] = w[c] || []).push(function() {
        var options = {
            project: 4469175
        };
        try {
            w.top100Counter = new top100(options);
        } catch(e) { }
    });
    var n = d.getElementsByTagName("script")[0],
    s = d.createElement("script"),
    f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src =
    (d.location.protocol == "https:" ? "https:" : "http:") +
    "//st.top100.ru/top100/top100.js";

    if (w.opera == "[object Opera]") {
    d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(window, document, "_top100q");
</script>
<noscript>
  <img src="//counter.rambler.ru/top100.cnt?pid=4469175" alt="Топ-100" />
</noscript>
<!-- END Top100 (Kraken) Counter -->
<!-- <link rel="stylesheet" href="//cdn.callbackhunter.com/widget2/tracker.css"> -->
<script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code=442bb98342d4c7b584c2d3343bce7f58" charset="UTF-8"></script>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'zfPeXUd9br';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
<!-- BEGIN JIVOSITE INTEGRATION WITH ROISTAT -->
<script>
(function(w, d, s, h) {
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = "/static/marketplace/JivoSite/script.js";
    var js = d.createElement(s); js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com');
</script>
<!-- END JIVOSITE INTEGRATION WITH ROISTAT -->
<!-- Ловим динамическую форму roistat и цепляем события - "" и "reachGoal" -->
<script>
$('body').on('click', '.roistat-lh-submit', function(event) {
	
	var r_name = $('#roistat-lh-name-input').val();
	var r_phone = $('#roistat-lh-phone-input').val();
	
	if(r_phone != ""){
		
		yaCounter44125749.reachGoal('SKIDKA');
		ga('send', {hitType: 'event', eventCategory: 'SKIDKA', eventAction: 'SKIDKA'});
		
	}
	
	

});
</script

</body>
</html>