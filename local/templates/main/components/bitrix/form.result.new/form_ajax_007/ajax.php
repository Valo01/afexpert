<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

// подключаем модуль веб-форм
CModule::IncludeModule("form");
CModule::IncludeModule("iblock");
header('Content-type: application/json;charset=utf-8');

function sendToRoistat($data){
	$roistatData = array(
			'roistat' => isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : 'nocookie',
			'key'     => 'YjExYzcyNGU2NzRiNjQ0ZDJjZmMyMjA4YmZiZjBjODA6MjYyNTI4',
      		'title'   => 'С сайта af.expert: Опросной лист',
			'name'    => $data['name'] ?? '', // Имя клиента 
			'email'   => $data['mail'] ?? '', // Email клиента 
			'phone'   => $data['phone'] ?? '', // Номер телефона клиента 
			'is_need_callback' => '0', // После создания в Roistat заявки, Roistat инициирует обратный звонок на номер клиента, если значение параметра рано 1 и в Ловце лидов включен индикатор обратного звонка. 
			'callback_phone' => '', // Переопределяет номер, указанный в настройках обратного звонка. 
			'sync'    => '0', // 
			'is_need_check_order_in_processing' => '1', // Включение проверки заявок на дубли     'is_need_check_order_in_processing_append' => '1', // Если создана дублирующая заявка, в нее будет добавлен комментарий об этом 
			'fields'  => array(
					'CRM_refferer' => $data['page'] ?? '',
          			'CRM_company' => $data['company'] ?? '',
			)
	);

	file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?" . http_build_query($roistatData));
}

// Проверка Капчи google
/*function checkRecap() {
	  $recaptcha_key = '6Le2zB4pAAAAADsWPYQZOsYppEZNPai6HlsHiMhL';
	  $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
	  $recaptcha_params = array(
		'secret' => $recaptcha_key,
		'response' => $_POST['recap_response'],
		'remoteip' => $_SERVER['REMOTE_ADDR'],
	  );

	  $ch = curl_init($recaptcha_url);
	  curl_setopt($ch, CURLOPT_POST, 1);
	  curl_setopt($ch, CURLOPT_POSTFIELDS, $recaptcha_params);
	  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	  curl_setopt($ch, CURLOPT_HEADER, 0);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 
	  $response = curl_exec($ch);
	  if (!empty($response)) {
		$decoded_response = json_decode($response);
	  }
	  $recaptcha_success = false;
	  if ($decoded_response && $decoded_response->score > 0) {
		$recaptcha_success = $decoded_response->score;
	  } else { }
	  if($recaptcha_success > 0.5) return $recaptcha_success;
	  return 0;
}
$recap = checkRecap(); 
if(!$recap){
	echo json_encode(['success' => false, 'errors' =>'<span><h1>Не пройдена проверка Google reCAPTCHA</h1></span>']);
}*/

if(isset($_POST['anti'])){
		if($_POST['anti']!=''){
			echo json_encode(['success' => false, 'errors' =>'Не пройдена проверка reCAPTCHA']);
		}else{
			//success//
		}
	}else{
		echo json_encode(['success' => false, 'errors' =>'Не пройдена проверка reCAPTCHA']);
}

// проверка валидности отправки формы
/*elseif*/ if (check_bitrix_sessid()) {
    // метод проверяет введенные значения на обязательность
    $formErrors = CForm::Check($_POST['WEB_FORM_ID'], $_REQUEST, false, "Y", 'Y');
  
    // если не все обязательные поля заполнены
    if (count($formErrors)) {
        echo json_encode(['success' => false, 'errors' => $formErrors]);
    } 
    // в случае успеха, возвращаем ID нового результата, в противном случае false
    elseif ($RESULT_ID = CFormResult::Add($_POST['WEB_FORM_ID'], $_REQUEST)) {
        // отправляем все события как в компоненте веб форм
        CFormCRM::onResultAdded($_POST['WEB_FORM_ID'], $RESULT_ID);
        CFormResult::SetEvent($RESULT_ID);
        CFormResult::Mail($RESULT_ID);
        // говорим что успешно заявку получили

		sendToRoistat([
			'name' => $_POST['form_text_39'], 
			'company' => $_POST['form_text_42'],
			'phone' => $_POST['form_text_40'],
			'mail' => $_POST['form_text_41'],
			'page' => $_SERVER['HTTP_REFERER'],
		]);

        echo json_encode([
			'success' => true, 
			'roistat'=> [
				'name' => $_POST['form_text_39'], 
				'company' => $_POST['form_text_42'],
				'phone' => $_POST['form_text_40'],
				'mail' => $_POST['form_text_41'],
				'page' => $_SERVER['HTTP_REFERER'],
			],
			'errors' => "<span class=\"modal__after-sending-title\">Ваша заявка отправлена</span>
		<span class=\"modal__after-sending-text\">Мы получили вашу заявку, наш менеджер свяжется с вами в ближайшее время</span>"]);
    } else {
        echo json_encode(['success' => false, 'errors' =>'<span>'. $GLOBALS["strError"].'</span>']);
    }
} else {
    echo json_encode(['success' => false, 'errors' => ['sessid' => '<span>Не верная сессия. Попробуйте обновить страницу</span>']]);
}
// файл ниже подключать обязательно, там закрытие соединения с базой данных
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php';
