<?php
// amocrm
$method = $_SERVER['REQUEST_METHOD'];

if ( $method === 'GET' ) {
	if ($_GET["phone"] || $_GET["email"]){
		
		$form_subject = trim($_GET["formData"]);
		$phone = trim($_GET["phone"]);
		$email = trim($_GET["email"]);
		
		$site = 'svoiokna96.ru';
		$opt = 'http://svoiokna96.ru/opt.php';
		$postfix = '';
		if($_SERVER['HTTP_REFERER'] == $opt){
			$site = $site . '/opt';
			$postfix = 'оптовая';
		}
		$form_subject = 'Заявка '.$postfix.' ('.$form_subject.') с сайта '.$site;

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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
	<meta name="description" content="Предлагаем сотрудничество оптовикам и диллерам.">
	<meta name="google-site-verification" content="-XuR2n5i3oWXTpGlDyU0HFdbQaki271N0cozzKvgGi0" />
	<meta name="yandex-verification" content="c3efe0a1b8d6c877" />
    <title>Свои Окна - металлопластиковые окна для диллеров и оптовиков</title>    
	<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
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
	<section class="opt-page-content">
		<div class="main__container">
			<section class="header-top">
				<div class="header-logo"><a href="index.html"><img src="img/header-logo2.png" alt="Логотип" title="Логотип Свои Окна"></a></div>
				<div class="header-slogan">
					ПРОИЗВОДСТВО ПЛАСТИКОВЫХ<br>
					ОКОН В СВЕРДЛОВСКОЙ ОБЛАСТИ
				</div>				
				<div class="header-tel"><a href="#"><span class="podmenaroistatpyshma">+7 (343) 226-08-11</span></a></div>			
			</section>
			<h2>ПРЕДЛОЖЕНИЕ<br>ДЛЯ ОПТОВЫХ ПОКУПАТЕЛЕЙ</h2>
			<div class="opt-video">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/WGopu2LdSwY?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen=""></iframe>
			</div>
			<section class="header-bottom">
				<p>ОСТАВЬТЕ ЗАЯВКУ СЕЙЧАС И УЖЕ ЧЕРЕЗ 5 ДНЕЙ МЫ ИЗГОТОВИМ И УСТАНОВИМ ВАМ ОКНО</p>
				<div class="header-bottom-form">
					<form id="form">
						<div class="input-text"><input type="text" name="phone" placeholder="Телефон" required></div>
						<div class="input-submit"><input type="submit" name="submit" value="Оставить заявку" onclick="yaCounter44125749.reachGoal('CALL');ga('send', {hitType: 'event', eventCategory: 'CALL', eventAction: 'CALL'});return true;"></div>
						<input type="hidden" name="formData" value="Перезвонить мне">
					</form>
				</div>
			</section>
		</div>
	</section>
	<footer id="footer">
		<div class="main__container">
			<div class="footer-logo"><a href="index.html"><img src="img/header-logo.png" alt="Логотип" title="Логотип Свои Окна"></a></div>
			<div class="footer-btn blue-btn"><a href="#" data-toggle="modal" data-target="#myModal">Оставить заявку</a></div>
			<div class="footer-tel"><a href="#"><span class="podmenaroistatpyshma">+7 (343) 226-08-11</span></a></div>
		</div>
	</footer>
	<!-- Modal -->
	<div class="modal fade callback-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Оставить заявку</h4>
				</div>
				<div class="modal-body">
					<form id="form2">
						<div class="input-text"><input type="text" name="phone" placeholder="Телефон" required></div>
						<div class="input-submit"><input type="submit" name="submit" value="Оставить заявку"  onclick="yaCounter44125749.reachGoal('CALL');ga('send', {hitType: 'event', eventCategory: 'CALL', eventAction: 'CALL'});return true;"></div>
						<input type="hidden" name="formData" value="Перезвонить мне. Низ">
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

<noscript><div><img src="https://mc.yandex.ru/watch/28634366" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- <link rel="stylesheet" href="//cdn.callbackhunter.com/widget2/tracker.css"> -->
<script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code=442bb98342d4c7b584c2d3343bce7f58" charset="UTF-8"></script>
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