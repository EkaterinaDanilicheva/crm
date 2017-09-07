<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    if (isset($_POST['phone'])) {$phone = $_POST['phone'];} else {$phone = false;}
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}
    if (isset($_POST['email'])) {$email = $_POST['email'];} else {$email = '';}
	

    $to = "svoiokna66@yandex.ru"; /*Укажите адрес, га который должно приходить письмо*/
    $sendfrom   = "svoiokna66@yandex.ru"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, настоящий, нужно для формирования заголовка письма*/
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "Заявка с сайта - {$formData}";
	$message = "{$formData}<br><b>Телефон:</b> {$phone}";
    $send = mail ($to, $subject, $message, $headers);
	
	//amoCRM
	$roistatVisitId = array_key_exists('roistat_visit', $_COOKIE) ? $_COOKIE['roistat_visit'] : "не определился";

	require_once('amocrm/class-amocrm.php');
	require_once('amocrm/inc-credentials.php');

	$amo = new AmoCRM(AMO_LOGIN, AMO_HASH, AMO_SUBDOMAIN);
	$site = 'svoiokna96.ru';
	$opt = 'http://svoiokna96.ru/opt.php';
	$postfix = '';
	if($_SERVER['HTTP_REFERER'] == $opt){
		$site = $site . '/opt';
		$postfix = 'оптовая';
	}
	$form_subject = 'Заявка '.$postfix.' ('.$formData.') с сайта '.$site;
	//						$name, $price, $status_id, $roistat, $type, $height, $width
	$lead_id = $amo->addLead($form_subject, 0.0, false, $roistatVisitId, 'Окно', false, false);
	if(!$name) {
		$name = 'Имя отсутствует';
	}

	$amo->addContact($name, $email, $phone, $lead_id);
	
    if ($send == 'true')
    {
    echo '<center><p class="success">Спасибо за отправку вашего сообщения!</p></center>';
    }
    else 
    {
    echo '<center><p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p></center>';
    }
} else {
    http_response_code(403);
    echo "Попробуйте еще раз";
}
?>