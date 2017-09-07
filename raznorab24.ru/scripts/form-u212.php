<?php 
/* 	
If you see this text in your browser, PHP is not configured correctly on this hosting provider. 
Contact your hosting provider regarding PHP configuration for your site.

PHP file generated by Adobe Muse CC 2017.0.1.363
*/

require_once('form_process.php');

$form = array(
	'subject' => 'Отправка Заявка',
	'heading' => 'Отправка новой формы',
	'success_redirect' => '',
	'resources' => array(
		'checkbox_checked' => 'Отмечено',
		'checkbox_unchecked' => 'Флажок не установлен',
		'submitted_from' => 'Формы, отправленные с веб-сайта: %s',
		'submitted_by' => 'IP-адрес посетителя: %s',
		'too_many_submissions' => 'Недопустимо высокое количество отправок с этого IP-адреса за последнее время',
		'failed_to_send_email' => 'Не удалось отправить сообщение эл. почты',
		'invalid_reCAPTCHA_private_key' => 'Недействительный закрытый ключ reCAPTCHA.',
		'invalid_reCAPTCHA2_private_key' => 'Недействительный закрытый ключ reCAPTCHA 2.0.',
		'invalid_reCAPTCHA2_server_response' => 'Недействительный ответ сервера reCAPTCHA 2.0.',
		'invalid_field_type' => 'Неизвестный тип поля \'%s\'.',
		'invalid_form_config' => 'Недопустимая конфигурация поля \"%s\".',
		'unknown_method' => 'Неизвестный метод запроса сервера'
	),
	'email' => array(
		'from' => 'sale@raznorab24.ru',
		'to' => 'sale@raznorab24.ru'
	),
	'fields' => array(
		'custom_U220' => array(
			'order' => 1,
			'type' => 'string',
			'label' => 'Пользовательский текст:',
			'required' => true,
			'errors' => array(
				'required' => 'Поле \'Пользовательский текст:\' не может быть пустым.'
			)
		),
		'custom_U214' => array(
			'order' => 2,
			'type' => 'string',
			'label' => 'Пользовательский текст:',
			'required' => true,
			'errors' => array(
				'required' => 'Поле \'Пользовательский текст:\' не может быть пустым.'
			)
		)
	)
);

process_form($form);

////////////////////////////////////
$keyList = array_keys($form['fields']);

$roistatData = array(
    'roistat' => isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : null,
    'key'     => 'NDA0NDQ6NDU3OTM6NzM3YzIzZTQ1ZTBlZDY1ZDJhOWY1ZTE2ZWU2OTBmMzU=', // Замените SECRET_KEY на секретный ключ из пункта меню Настройки -> Интеграция со сделками в нижней части экрана и строчке Ключ для интеграций
    'title'   => 'Название сделки {visit}',
    'name'    => $_POST[$keyList[0]],
    'phone'   => $_POST[$keyList[1]],
    'fields'  => array(
    // Массив дополнительных полей, если нужны, или просто пустой массив. Более подробно про работу доп. полей можно посмотреть в видео в начале статьи
    // Примеры использования:
        "price" => 50000, // Поле бюджет в amoCRM
		"responsible_user_id" => 1494331, // Ответственный по сделке
    )
);
  
file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?" . http_build_query($roistatData));
?>
