<?php


class AmoCRM {

    private $user = array();
    private $base_url;
    private $auth_url;

    public function __construct($user_login, $user_hash, $subdomain){
        $this->user = array(
            'USER_LOGIN'=> $user_login,
            'USER_HASH'=> $user_hash
        );


        $this->base_url = 'https://'.$subdomain.'.amocrm.ru/private/api/v2/json/';
        $this->auth_url = 'https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';


        $this->auth();
    }

    private function checkCurlResponse($code)
    {

        $code=(int)$code;
        $errors=array(
            301=>'Moved permanently',
            400=>'Bad request',
            401=>'Unauthorized',
            403=>'Forbidden',
            404=>'Not found',
            500=>'Internal server error',
            502=>'Bad gateway',
            503=>'Service unavailable'
        );
        try
        {
            #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
            if($code!=200 && $code!=204)
                throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
        }
        catch(Exception $E)
        {
            die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
        }


    }

    private function auth() {

        $link = $this->auth_url;

        $curl=curl_init();
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
        curl_setopt($curl,CURLOPT_URL,$link);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($this->user));
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
        $out=curl_exec($curl);
        $response_code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $this->checkCurlResponse($response_code);

        $response=json_decode($out,true);
        return $response['response'];

    }

    private function get($url) {

        $link= $this->base_url . $url;
        $curl=curl_init();
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
        curl_setopt($curl,CURLOPT_URL,$link);
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
        $out=curl_exec($curl);
        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $this->checkCurlResponse($code);

        $out=json_decode($out,true);
        return $out['response'];

    }

    private function post($url, $postfields = NULL) {

        $link= $this->base_url . $url;
        $curl=curl_init();
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
        curl_setopt($curl,CURLOPT_URL,$link);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($postfields));
        curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
        $out=curl_exec($curl);
        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
//        $this->checkCurlResponse($code);

        $out=json_decode($out,true);
        return $out['response'];

    }
	
	public function getAccountsCurrent(){

        return $this->get('accounts/current');

    }

    public function addLead($name, $price, $status_id, $roistat, $type, $height, $width){
		
		

        $leads['request']['leads']['add']=array(
            array(
                'name'=>$name,
                'price'=>$price,
                'custom_fields'=>array()
            )
        );
		
		if($status_id) {
			$leads['request']['leads']['add'][0]['status_id'] = $status_id;
		}
			
		$leads['request']['leads']['add'][0]['custom_fields'] = array();
		
		if ($type){ 
            $leads['request']['leads']['add'][0]['custom_fields'][] = 
                array(
                    'id'=>1771184,
                    'values'=> array (array('value' => $type))

                );
		}
        if ($roistat){ 
            $leads['request']['leads']['add'][0]['custom_fields'][] = 
                array(
                    'id'=>1761278,
                    'values'=> array (array('value' => $roistat))

                );
            

        }
		if ($height){ 
            $leads['request']['leads']['add'][0]['custom_fields'][] =
                array(
                    'id'=>1771182,
                    'values'=> array (array('value' => $height))

                );
            

        }
		if ($width){ 
            $leads['request']['leads']['add'][0]['custom_fields'][] = 
                array(
                    'id'=>1771180,
                    'values'=> array (array('value' => $width))

                );
            

        }

        $response = $this->post('leads/set', ($leads));

        return isset($response['leads']['add'][0]['id']) ? $response['leads']['add'][0]['id'] : null;


    }

    public function getCustomFieldsMap(){

        $fields = array();
        $account = $this->getAccountsCurrent()['account'];
        if(isset($account['custom_fields'],$account['custom_fields']['contacts'])){
            foreach ($account['custom_fields']['contacts'] as $contact) {
                $fields['contacts'][$contact['name']] = $contact['id'];
            }
            foreach ($account['custom_fields']['leads'] as $contact) {
                $fields['leads'][$contact['name']] = $contact['id'];
            }
            foreach ($account['custom_fields']['companies'] as $contact) {
                $fields['companies'][$contact['name']] = $contact['id'];
            }
            foreach ($account['custom_fields']['customers'] as $contact) {
                $fields['customers'][$contact['name']] = $contact['id'];
            }
        }

        return $fields;

    }

    public function addContact($name, $email, $phone, $lead_id){

        if($this->auth()) {
			
			
			$custom_fields = $this->getCustomFieldsMap()['contacts'];
			
			if($phone){
				$phone = $this->preparePhoneToSearch_RF($phone);
				$f_contact = $this->getContactByPhone($phone);
				$phone = '+7' . $phone;
			} else {
				$phone = '';
			}
			
			
            
            

            if(is_array($f_contact)){
                array_push($f_contact['linked_leads_id'], $lead_id);
                $contact=array(
                    'id'=>$f_contact['id'],
                    'name'=>$f_contact['name'],
                    'last_modified'=> time(),
                    'linked_leads_id'=> $f_contact['linked_leads_id']
                );

                $contacts['request']['contacts']['update']= array($contact);
            } else {


                $contact=array(
                    'name'=>$name,
                    'linked_leads_id'=>array( #Список с айдишниками сделок контакта
                        $lead_id
                    ),
                    'custom_fields'=>array(
                        array(
                            'id'=>$custom_fields['Email'],
                            'values'=>array(
                                array(
                                    'value'=>$email,
                                    'enum'=>'WORK'
                                )
                            )
                        ),
                        array(
                            'id'=>$custom_fields['Телефон'],
                            'values'=>array(
                                array(
                                    'value'=> $phone,
                                    'enum'=>'WORK'
                                )
                            )
                        )
                    )
                );

                $contacts['request']['contacts']['add']= array($contact);
            }


            $response = $this->post('contacts/set', $contacts);

            return isset($response['contacts']['add'][0]['id']) ? $response['contacts']['add'][0]['id'] : null;

        }

    }
	
	 public function getContactByPhone($phone){

        $res = $this->get('contacts/list?query='.$phone);

        if($res) {
            return array(
                'id' => $res['contacts'][0]['id'],
                'name' => $res['contacts'][0]['name'],
                'linked_leads_id' => $res['contacts'][0]['linked_leads_id']
                );
        } else {
            return false;
        }



    }
	
	function preparePhoneToSearch_RF($phone){
		
		$phone = str_replace("(","",$phone);
		$phone = str_replace(")","",$phone);
		$phone = str_replace("_","",$phone);
		$phone = str_replace("-","",$phone);
		$phone = str_replace(" ","",$phone);
		$phone = str_replace(".","",$phone);
		$phone = str_replace("+","",$phone);
		
		if(strlen($phone) > 10){
			$formated = $phone{1}.$phone{2}.$phone{3}.$phone{4}.$phone{5}.$phone{6}.$phone{7}.$phone{8}.$phone{9}.$phone{10};
		} else {
			$formated = $phone{0}.$phone{1}.$phone{2}.$phone{3}.$phone{4}.$phone{5}.$phone{6}.$phone{7}.$phone{8}.$phone{9};
		}

		return $formated;
	}

}