<?php 
require_once (__DIR__.'/crest.php');
class Test extends CRest 
	{
		protected static function getSettingData()
		{
			$domain = $_REQUEST['DOMAIN'];
			$test = '21vekgroup.bitrix24.ru';
			$return = [];
			if(file_exists(__DIR__ . '/domain/'.$domain.'_settings.json'))
			{
				$return = static::expandData(file_get_contents(__DIR__ . '/domain/'.$domain.'_settings.json'));
				if(defined("C_REST_CLIENT_ID") && !empty(C_REST_CLIENT_ID))
				{
					$return['C_REST_CLIENT_ID'] = C_REST_CLIENT_ID;
				}
				if(defined("C_REST_CLIENT_SECRET") && !empty(C_REST_CLIENT_SECRET))
				{
					$return['C_REST_CLIENT_SECRET'] = C_REST_CLIENT_SECRET;
				}
			}
			return $return;
		}
        protected static function setSettingData($arSettings)
		{
			$domain = $_REQUEST['DOMAIN'];
			return  (boolean)file_put_contents(__DIR__ . '/domain/'.$domain.'_settings.json', static::wrapData($arSettings));
		}

	}
$placementOptions = isset($_REQUEST['PLACEMENT_OPTIONS']) ? json_decode($_REQUEST['PLACEMENT_OPTIONS'], true) : array();
if ($_REQUEST['PLACEMENT'] == 'CALL_CARD'):
    $value = htmlspecialchars($placementOptions['VALUE']);
    {
        $result = Test::call(
            'crm.lead.list',
            [
                'filter' => ['ID' => intVal($placementOptions['CRM_ENTITY_ID'])],
                'select' => ['ID', 'PHONE', 'HAS_PHONE', 'CONTACT_ID', 'COMPANY_ID']
            ]
        );
        if ($result['result'][0]['HAS_PHONE'] === 'Y')
        {
            $phone = trim($result['result'][0]['PHONE'][0]['VALUE']);
            $phone_def = substr($phone, 0, 4);
            $phone_def_2 = substr($phone, 0, 2);
            $phone_def_3 = substr($phone, 0, 3);
            $phone_code = substr($phone, 0, 7);
            $phone_code_6 = substr($phone, 0, 6);
            $phone_code_5 = substr($phone, 0, 5);
            $phone_code_4 = substr($phone, 0, 4);
            if($phone_def == '+375' || $phone_def_2 == '80'){
                date_default_timezone_set("Europe/Minsk");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Беларусь';

                if($phone_code == '+375291' || $phone_code == '+375293' || $phone_code == '+375296' || $phone_code == '+375299' || $phone_code_6 == '+37544' || $phone_code_5 == '80291' || $phone_code_5 == '80293' || $phone_code_5 == '80296' || $phone_code_5 == '80299' || $phone_code_4 == '8044'){
                    $operator = '«А1»';
                } elseif($phone_code == '+375292' || $phone_code == '+375295' || $phone_code == '+375297' || $phone_code == '+375298' || $phone_code_6 == '+37533' || $phone_code_5 == '80292' || $phone_code_5 == '80295' || $phone_code_5 == '80297' || $phone_code_5 == '80298' || $phone_code_4 == '8033'){
                    $operator = 'МТС';
                } elseif($phone_code_5 == '+37525' || $phone_code_4 == '8025'){
                    $operator = 'Lifecell';
                }  elseif($phone_code_5 == '+37524' || $phone_code_4 == '8024'){
                    $operator = 'Белтелеком (Максифон)';
                } else{
                    $operator = 'Оператор не установлен';
                }

                $img = '<img src="img/blr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def == '+380'){
                date_default_timezone_set("Europe/Kiev");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Украина';
                if($phone_code_6 == '+38039' || $phone_code_6 == '+38067' || $phone_code_6 == '+38068' || $phone_code_6 == '+38096' || $phone_code_6 == '+38097' || $phone_code_6 == '+38098'){
                    $operator = 'Киевстар';
                } elseif($phone_code_6 == '+38050' || $phone_code_6 == '+38066' || $phone_code_6 == '+38095' || $phone_code_6 == '+38099'){
                    $operator = 'Vodafone (ПАО "Мобильные ТелеСистемы")';
                } elseif($phone_code_6 == '+38063' || $phone_code_6 == '+38093'){
                    $operator = 'Lifecell';
                } elseif($phone_code_6 == '+38091'){
                    $operator = 'ТриМоб (Utel Украина)';
                } elseif($phone_code_6 == '+38092'){
                    $operator = 'PEOPLEnet Украина';
                } elseif($phone_code_6 == '+38094'){
                    $operator = 'Интертелеком Украина';
                } else{
                    $operator = 'Оператор не установлен';
                }
                $img = '<img src="img/ukr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def_3 == '+77'|| $phone_def_2 == '77'){
                $test = '<br>';
                $country = 'Казахстан';

                if($phone_code == '+772131' || $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Абай';
                } elseif ( $phone_code == '+771033') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Агадырь';
                } elseif ( $phone_code == '+772438') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Айтеке-Би';
                } elseif ( $phone_code == '+771143') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжаик';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжал';
                } elseif ( $phone_code == '+772344') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжар';
                } elseif ( $phone_code == '+771638' || $phone_code == '+772641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акколь';
                } elseif ( $phone_code == '+771839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акку';
                } elseif ( $phone_code == '+771231') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аккыстау';
                } elseif ( $phone_code == '+771133') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксай';
                } elseif ( $phone_code == '+771837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу';
                } elseif ( $phone_code == '+771031') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу-Аюлы';
                } elseif ( $phone_code == '+772346') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксуат';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актас';
                } elseif ( $phone_code_6 == '+77213' || $phone_code_6 == '+77292') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актау';
                } elseif ( $phone_code_6 == '+77132') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актобе';
                } elseif ( $phone_code == '+771037' || $phone_code == '+771841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актогай';
                } elseif ( $phone_code == '+772757') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акший';
                } elseif ( $phone_code == '+771337') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алга';
                } elseif ( $phone_code_6 == '+77272') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алматы';
                } elseif ( $phone_code == '+771440') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Амангельды';
                } elseif ( $phone_code == '+772433') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аральск';
                } elseif ( $phone_code == '+771430') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аркалык';
                } elseif ( $phone_code == '+771644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аршалы';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арыкбалык';
                } elseif ( $phone_code == '+772540') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арысь';
                } elseif ( $phone_code == '+772633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аса';
                } elseif ( $phone_code_6 == '+77172') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нур-Султан';
                } elseif ( $phone_code == '+771641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Астраханка';
                } elseif ( $phone_code == '+772542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Асык Ата';
                } elseif ( $phone_code == '+771030') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атасу';
                } elseif ( $phone_code == '+771643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атбасар';
                } elseif ( $phone_code_6 == '+77122') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атырау';
                } elseif ( $phone_code == '+771453') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аулиеколь';
                } elseif ( $phone_code == '+772237') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аягоз';
                } elseif ( $phone_code == '+772236') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бескарагай';
                } elseif ( $phone_code == '+771345') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байганин';
                } elseif ( $phone_code == '+733622') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байконур';
                } elseif ( $phone_code == '+772773') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баканас';
                } elseif ( $phone_code == '+771640') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балкашино';
                } elseif ( $phone_code == '+772838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балпык';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балхаш';
                } elseif ( $phone_code == '+772246') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баршатас';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Батамшинский';
                } elseif ( $phone_code == '+772635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бауыржан Момышулы';
                } elseif ( $phone_code == '+771840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баянаул';
                } elseif ( $phone_code == '+772932') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бейнеу';
                } elseif ( $phone_code == '+772531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксукент';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бишкуль';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Благовещенка';
                } elseif ( $phone_code == '+772338') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бозанбай';
                } elseif ( $phone_code == '+772341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Большенарымское';
                } elseif ( $phone_code == '+771630') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровое';
                } elseif ( $phone_code == '+771443') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровское';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бородулихинский район';
                } elseif ( $phone_code == '+771531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Булаево';
                } elseif ( $phone_code == '+771233') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ганюшкино';
                } elseif ( $phone_code == '+772347') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Калбатау';
                } elseif ( $phone_code == '+772331') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Глубокое';
                } elseif ( $phone_code == '+771131') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Дарьинское';
                } elseif ( $phone_code == '+771434') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Денисовка';
                } elseif ( $phone_code == '+771648') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Державинск';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джанибек';
                } elseif ( $phone_code == '+771134') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жымпиты';
                } elseif ( $phone_code == '+771141') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джангала';
                } elseif ( $phone_code == '+772147') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыбулак';
                } elseif ( $phone_code == '+771642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыколь';
                } elseif ( $phone_code == '+771633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ерейментау';
                } elseif ( $phone_code == '+772775') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есик';
                } elseif ( $phone_code == '+771647') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есиль';
                } elseif ( $phone_code == '+771040' || $phone_code == '+771043') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жайрем';
                } elseif ( $phone_code == '+771635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаксы';
                } elseif ( $phone_code == '+72431') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жалагаш';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Фурманово';
                } elseif ( $phone_code == '+772435') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанакорган';
                } elseif ( $phone_code == '+772934') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанаозен';
                } elseif ( $phone_code == '+772634') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанатас';
                } elseif ( $phone_code == '+772832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жансугуров';
                } elseif ( $phone_code == '+772831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаркент';
                } elseif ( $phone_code == '+771034') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезды';
                } elseif ( $phone_code_6 == '+77102') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезказган';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезкент';
                } elseif ( $phone_code == '+771831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Железинка';
                } elseif ( $phone_code == '+772534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жетысай';
                } elseif ( $phone_code == '+771435') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Житикара';
                } elseif ( $phone_code == '+772437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жосалы';
                } elseif ( $phone_code == '+772340') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зайсан';
                } elseif ( $phone_code == '+771455') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Затобольск';
                } elseif ( $phone_code == '+771632') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зеренда';
                } elseif ( $phone_code == '+772335') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зыряновск';
                } elseif ( $phone_code == '+771234') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Индерборский';
                } elseif ( $phone_code == '+771832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Иртышск';
                } elseif ( $phone_code == '+772837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кабанбай';
                } elseif ( $phone_code == '+771144') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казталовка';
                } elseif ( $phone_code == '+772539') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казыгурт';
                } elseif ( $phone_code == '+771437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Камысты';
                } elseif ( $phone_code == '+771333') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кандыагаш';
                } elseif ( $phone_code == '+772841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капал';
                } elseif ( $phone_code == '+772772') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капшагай';
                } elseif ( $phone_code == '+771441') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабалык';
                } elseif ( $phone_code == '+772836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабулак';
                } elseif ( $phone_code_6 == '+77212') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караганда';
                } elseif ( $phone_code == '+771032') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каражал';
                } elseif ( $phone_code == '+771454') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караменды';
                } elseif ( $phone_code == '+771452') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карасу';
                } elseif ( $phone_code == '+772644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратау';
                } elseif ( $phone_code == '+771145') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратобе';
                } elseif ( $phone_code == '+772252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караул';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каргалинское';
                } elseif ( $phone_code == '+772146') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каркаралинск';
                } elseif ( $phone_code == '+772771') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каскелен';
                } elseif ( $phone_code == '+772342') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Катон-Карагай';
                } elseif ( $phone_code == '+771456') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'п. Качар';
                } elseif ( $phone_code == '+771833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кашыр';
                } elseif ( $phone_code == '+772777') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кеген';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Келлеровка';
                } elseif ( $phone_code == '+772536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кентау';
                } elseif ( $phone_code == '+772144') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Киевка';
                } elseif ( $phone_code == '+771542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кишкеноколь';
                } elseif ( $phone_code == '+772842') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кугалы';
                } elseif ( $phone_code == '+772348') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокпекты';
                } elseif ( $phone_code == '+771838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кок-Тюбе';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокшетау';
                } elseif ( $phone_code == '+771637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Коргалжын';
                } elseif ( $phone_code == '+772636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Корнеевка';
                } elseif ( $phone_code_6 == '+77142') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Костанай';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Красный Яр';
                } elseif ( $phone_code == '+772631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кулан';
                } elseif ( $phone_code == '+771237') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кульсары';
                } elseif ( $phone_code == '+772251') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчатов';
                } elseif ( $phone_code == '+772339') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчум';
                } elseif ( $phone_code == '+772937') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курык';
                } elseif ( $phone_code_6 == '+77242' || $phone_code == '+772422') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кызылорда';
                } elseif ( $phone_code == '+772547') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленгер';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленинградское';
                } elseif ( $phone_code == '+772843') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лепсы';
                } elseif ( $phone_code == '+771433') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лисаковск';
                } elseif ( $phone_code == '+772239') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Маканчи';
                } elseif ( $phone_code == '+771239') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макат';
                } elseif ( $phone_code == '+771646') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макинск';
                } elseif ( $phone_code == '+771541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мамлютка';
                } elseif ( $phone_code == '+771331') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мартук';
                } elseif ( $phone_code == '+771236') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Махамбет';
                } elseif ( $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мерке';
                } elseif ( $phone_code == '+771238') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Миялы';
                } elseif ( $phone_code == '+772642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мойынкум';
                } elseif ( $phone_code == '+772148') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Молодежный';
                } elseif ( $phone_code == '+772541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мырзакент';
                } elseif ( $phone_code == '+772779') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нарынкол';
                } elseif ( $phone_code == '+772353') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новая Шульба';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новоишимское';
                } elseif ( $phone_code == '+771448') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Октябрьское';
                } elseif ( $phone_code == '+772149') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Осакаровка';
                } elseif ( $phone_code == '+772752') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Отеген-Батыр';
                } elseif ( $phone_code_6 == '+77182') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Павлодар';
                } elseif ( $phone_code == '+771130') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Переметное';
                } elseif ( $phone_code_6 == '+77152') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Петропавловск';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Пресновка';
                } elseif ( $phone_code == '+771039') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Приозёрск';
                } elseif ( $phone_code == '+772336') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Риддер';
                } elseif ( $phone_code == '+771431') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рудный';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рузаевка';
                } elseif ( $phone_code == '+771140') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сайхин';
                } elseif ( $phone_code == '+772333') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Самарское';
                } elseif ( $phone_code == '+772137') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарань';
                } elseif ( $phone_code == '+772839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарканд';
                } elseif ( $phone_code == '+772537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыагаш';
                } elseif ( $phone_code == '+772637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сары Кемер';
                } elseif ( $phone_code == '+771451') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыколь';
                } elseif ( $phone_code == '+772840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыозек';
                } elseif ( $phone_code == '+771063') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сатпаев';
                } elseif ( $phone_code == '+772639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саудакент';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саумалколь';
                } elseif ( $phone_code_6 == '+77222') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Семей';
                } elseif ( $phone_code == '+771534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сергеевка';
                } elseif ( $phone_code == '+772337') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Серебрянск';
                } elseif ( $phone_code == '+771532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Смирново';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Соколовка';
                } elseif ( $phone_code == '+771645') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степногорск';
                } elseif ( $phone_code == '+771639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степняк';
                } elseif ( $phone_code == '+772334') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Таврическое';
                } elseif ( $phone_code == '+771142') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайпак';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайынша';
                } elseif ( $phone_code == '+772774') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талгар';
                } elseif ( $phone_code_6 == '+77282') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талдыкорган';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талшик';
                } elseif ( $phone_code_6 == '+77262' || $phone_code == '+772622') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тараз';
                } elseif ( $phone_code == '+771436') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тарановское';
                } elseif ( $phone_code == '+771139') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каменка';
                } elseif ( $phone_code == '+772835') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Текели';
                } elseif ( $phone_code == '+772530') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темирлан';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темиртау';
                } elseif ( $phone_code == '+771230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тенгиз';
                } elseif ( $phone_code == '+772343') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теректы';
                } elseif ( $phone_code == '+772436') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теренозек';
                } elseif ( $phone_code == '+771537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тимирязево';
                } elseif ( $phone_code == '+72138') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'им. Габидена Мустафина';
                } elseif ( $phone_code == '+772638') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Толе би';
                } elseif ( $phone_code == '+772153') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Топар';
                } elseif ( $phone_code == '+771439') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тургай';
                } elseif ( $phone_code == '+772538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Турара Рыскулова';
                } elseif ( $phone_code == '+772533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Туркестан';
                } elseif ( $phone_code == '+771445') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Убаган';
                } elseif ( $phone_code == '+771444') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узунколь';
                } elseif ( $phone_code == '+772770') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узынагаш';
                } elseif ( $phone_code == '+771035') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Улытау';
                } elseif ( $phone_code == '+772154') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ботакара';
                } elseif ( $phone_code_6 == '+77112') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уральск';
                } elseif ( $phone_code == '+772230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уржар';
                } elseif ( $phone_code == '+771834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Успенка';
                } elseif ( $phone_code_6 == '+77232') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Усть-Каменогорск';
                } elseif ( $phone_code == '+772833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ушарал';
                } elseif ( $phone_code == '+772834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уштобе';
                } elseif ( $phone_code == '+771132' || $phone_code == '+771442') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Федоровка';
                } elseif ( $phone_code == '+772938') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Форт-Шевченко';
                } elseif ( $phone_code == '+771341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771336') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Хромтау';
                } elseif ( $phone_code == '+771136') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чапай';
                } elseif ( $phone_code == '+772776') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шелек';
                } elseif ( $phone_code == '+771137') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чингирлау';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чистополье';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чкалово';
                } elseif ( $phone_code == '+772778') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чунджа';
                } elseif ( $phone_code == '+771355') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шалкар';
                } elseif ( $phone_code == '+772345') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чарск';
                } elseif ( $phone_code == '+771836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щарбакты';
                } elseif ( $phone_code == '+772535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шардара';
                } elseif ( $phone_code == '+772544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаульдер';
                } elseif ( $phone_code == '+772156') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шахтинск';
                } elseif ( $phone_code == '+771038') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шашубай';
                } elseif ( $phone_code == '+772548') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаян';
                } elseif ( $phone_code == '+772332') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шемонаиха';
                } elseif ( $phone_code == '+772931') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шетпе';
                } elseif ( $phone_code == '+772432') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шиели';
                } elseif ( $phone_code == '+772546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чулаккурган';
                } elseif ( $phone_code == '+771631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шортанды';
                } elseif ( $phone_code == '+772643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шу';
                } elseif ( $phone_code == '+771346') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шубаркудук';
                } elseif ( $phone_code == '+772257') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шульбинск';
                } elseif ( $phone_code_6 == '+77252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шымкент';
                } elseif ( $phone_code == '+771636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щучинск';
                } elseif ( $phone_code_6 == '+77187') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Экибастуз';
                } elseif ( $phone_code == '+771334') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Эмба';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Явленка';
                } else {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                }
                $img = '<img src="img/kz.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out,$country]);
            } else{
                
                $phone_pref = substr($phone, 0, 1);
                $img = '<img src="img/ru.png" style="width: 20px; height: 20px">';
                if($phone_pref === '+'){
                        $phone_def_2_3 = substr($phone, 2, 3);
                        $phone_num = substr($phone, 5, 7);

                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_2_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    $operator = $valueData['org'];
                                    
                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }

                }  elseif($phone_pref === '8' || $phone_pref === '7') {
                        $phone_def_1_3 = substr($phone, 1, 3);
                        $phone_num = substr($phone, 4, 7);
                        
                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_1_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }
                }
                
            }
            
        }
        else{
            if(!empty($result['result'][0]['CONTACT_ID']))
            {
                $result = Test::call(
                    'crm.contact.list',
                    [
                        'filter' => ['ID' => intVal($result['result'][0]['CONTACT_ID'])],
                        'select' => ['ID', 'PHONE']
                    ]
                );
                
                $phone = trim($result['result'][0]['PHONE'][0]['VALUE']);
                $phone_def = substr($phone, 0, 4);
                $phone_def_2 = substr($phone, 0, 2);
                $phone_def_3 = substr($phone, 0, 3);
                $phone_code = substr($phone, 0, 7);
                $phone_code_6 = substr($phone, 0, 6);
                $phone_code_5 = substr($phone, 0, 5);
                $phone_code_4 = substr($phone, 0, 4);
                if($phone_def == '+375' || $phone_def_2 == '80'){
                    date_default_timezone_set("Europe/Minsk");
                    $time = time();
                    $time = date('H:i', $time);
                    $test = '<br>';
                    $region_out = 'Беларусь';

                    if($phone_code == '+375291' || $phone_code == '+375293' || $phone_code == '+375296' || $phone_code == '+375299' || $phone_code_6 == '+37544' || $phone_code_5 == '80291' || $phone_code_5 == '80293' || $phone_code_5 == '80296' || $phone_code_5 == '80299' || $phone_code_4 == '8044'){
                        $operator = '«А1»';
                    } elseif($phone_code == '+375292' || $phone_code == '+375295' || $phone_code == '+375297' || $phone_code == '+375298' || $phone_code_6 == '+37533' || $phone_code_5 == '80292' || $phone_code_5 == '80295' || $phone_code_5 == '80297' || $phone_code_5 == '80298' || $phone_code_4 == '8033'){
                        $operator = 'МТС';
                    } elseif($phone_code_5 == '+37525' || $phone_code_4 == '8025'){
                        $operator = 'Lifecell';
                    }  elseif($phone_code_5 == '+37524' || $phone_code_4 == '8024'){
                        $operator = 'Белтелеком (Максифон)';
                    } else{
                        $operator = 'Оператор не установлен';
                    }

                    $img = '<img src="img/blr.png" style="width: 20px; height: 20px">';
                    $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
                } elseif($phone_def == '+380'){
                    date_default_timezone_set("Europe/Kiev");
                    $time = time();
                    $time = date('H:i', $time);
                    $test = '<br>';
                    $region_out = 'Украина';
                    if($phone_code_6 == '+38039' || $phone_code_6 == '+38067' || $phone_code_6 == '+38068' || $phone_code_6 == '+38096' || $phone_code_6 == '+38097' || $phone_code_6 == '+38098'){
                        $operator = 'Киевстар';
                    } elseif($phone_code_6 == '+38050' || $phone_code_6 == '+38066' || $phone_code_6 == '+38095' || $phone_code_6 == '+38099'){
                        $operator = 'Vodafone (ПАО "Мобильные ТелеСистемы")';
                    } elseif($phone_code_6 == '+38063' || $phone_code_6 == '+38093'){
                        $operator = 'Lifecell';
                    } elseif($phone_code_6 == '+38091'){
                        $operator = 'ТриМоб (Utel Украина)';
                    } elseif($phone_code_6 == '+38092'){
                        $operator = 'PEOPLEnet Украина';
                    } elseif($phone_code_6 == '+38094'){
                        $operator = 'Интертелеком Украина';
                    } else{
                        $operator = 'Оператор не установлен';
                    }
                    $img = '<img src="img/ukr.png" style="width: 20px; height: 20px">';
                    $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
                } elseif($phone_def_3 == '+77'|| $phone_def_2 == '77'){
                    $test = '<br>';
                    $country = 'Казахстан';

                    if($phone_code == '+772131' || $phone_code == '+772532') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Абай';
                    } elseif ( $phone_code == '+771033') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Агадырь';
                    } elseif ( $phone_code == '+772438') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Айтеке-Би';
                    } elseif ( $phone_code == '+771143') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акжаик';
                    } elseif ( $phone_code == '+771036') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акжал';
                    } elseif ( $phone_code == '+772344') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акжар';
                    } elseif ( $phone_code == '+771638' || $phone_code == '+772641') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акколь';
                    } elseif ( $phone_code == '+771839') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акку';
                    } elseif ( $phone_code == '+771231') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аккыстау';
                    } elseif ( $phone_code == '+771133') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аксай';
                    } elseif ( $phone_code == '+771837') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аксу';
                    } elseif ( $phone_code == '+771031') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аксу-Аюлы';
                    } elseif ( $phone_code == '+772346') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аксуат';
                    } elseif ( $phone_code_6 == '+77213') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Актас';
                    } elseif ( $phone_code_6 == '+77213' || $phone_code_6 == '+77292') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Актау';
                    } elseif ( $phone_code_6 == '+77132') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Актобе';
                    } elseif ( $phone_code == '+771037' || $phone_code == '+771841') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Актогай';
                    } elseif ( $phone_code == '+772757') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акший';
                    } elseif ( $phone_code == '+771337') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Алга';
                    } elseif ( $phone_code_6 == '+77272') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Алматы';
                    } elseif ( $phone_code == '+771440') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Амангельды';
                    } elseif ( $phone_code == '+772433') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аральск';
                    } elseif ( $phone_code == '+771430') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аркалык';
                    } elseif ( $phone_code == '+771644') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аршалы';
                    } elseif ( $phone_code == '+771533') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Арыкбалык';
                    } elseif ( $phone_code == '+772540') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Арысь';
                    } elseif ( $phone_code == '+772633') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аса';
                    } elseif ( $phone_code_6 == '+77172') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Нур-Султан';
                    } elseif ( $phone_code == '+771641') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Астраханка';
                    } elseif ( $phone_code == '+772542') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Асык Ата';
                    } elseif ( $phone_code == '+771030') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Атасу';
                    } elseif ( $phone_code == '+771643') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Атбасар';
                    } elseif ( $phone_code_6 == '+77122') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Атырау';
                    } elseif ( $phone_code == '+771453') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аулиеколь';
                    } elseif ( $phone_code == '+772237') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аягоз';
                    } elseif ( $phone_code == '+772236') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бескарагай';
                    } elseif ( $phone_code == '+771345') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Байганин';
                    } elseif ( $phone_code == '+733622') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Байконур';
                    } elseif ( $phone_code == '+772773') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Баканас';
                    } elseif ( $phone_code == '+771640') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Балкашино';
                    } elseif ( $phone_code == '+772838') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Балпык';
                    } elseif ( $phone_code == '+771036') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Балхаш';
                    } elseif ( $phone_code == '+772246') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Баршатас';
                    } elseif ( $phone_code == '+771342') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Батамшинский';
                    } elseif ( $phone_code == '+772635') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бауыржан Момышулы';
                    } elseif ( $phone_code == '+771840') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Баянаул';
                    } elseif ( $phone_code == '+772932') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бейнеу';
                    } elseif ( $phone_code == '+772531') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аксукент';
                    } elseif ( $phone_code == '+771538') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бишкуль';
                    } elseif ( $phone_code == '+771544') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Благовещенка';
                    } elseif ( $phone_code == '+772338') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бозанбай';
                    } elseif ( $phone_code == '+772341') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Большенарымское';
                    } elseif ( $phone_code == '+771630') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Боровое';
                    } elseif ( $phone_code == '+771443') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Боровское';
                    } elseif ( $phone_code == '+772351') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бородулихинский район';
                    } elseif ( $phone_code == '+771531') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Булаево';
                    } elseif ( $phone_code == '+771233') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ганюшкино';
                    } elseif ( $phone_code == '+772347') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Калбатау';
                    } elseif ( $phone_code == '+772331') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Глубокое';
                    } elseif ( $phone_code == '+771131') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Дарьинское';
                    } elseif ( $phone_code == '+771434') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Денисовка';
                    } elseif ( $phone_code == '+771648') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Державинск';
                    } elseif ( $phone_code == '+771138') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Джанибек';
                    } elseif ( $phone_code == '+771134') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жымпиты';
                    } elseif ( $phone_code == '+771141') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Джангала';
                    } elseif ( $phone_code == '+772147') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Егиндыбулак';
                    } elseif ( $phone_code == '+771642') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Егиндыколь';
                    } elseif ( $phone_code == '+771633') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ерейментау';
                    } elseif ( $phone_code == '+772775') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Есик';
                    } elseif ( $phone_code == '+771647') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Есиль';
                    } elseif ( $phone_code == '+771040' || $phone_code == '+771043') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жайрем';
                    } elseif ( $phone_code == '+771635') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жаксы';
                    } elseif ( $phone_code == '+72431') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жалагаш';
                    } elseif ( $phone_code == '+771138') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Фурманово';
                    } elseif ( $phone_code == '+772435') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жанакорган';
                    } elseif ( $phone_code == '+772934') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жанаозен';
                    } elseif ( $phone_code == '+772634') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жанатас';
                    } elseif ( $phone_code == '+772832') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жансугуров';
                    } elseif ( $phone_code == '+772831') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жаркент';
                    } elseif ( $phone_code == '+771034') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жезды';
                    } elseif ( $phone_code_6 == '+77102') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жезказган';
                    } elseif ( $phone_code == '+772351') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жезкент';
                    } elseif ( $phone_code == '+771831') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Железинка';
                    } elseif ( $phone_code == '+772534') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жетысай';
                    } elseif ( $phone_code == '+771435') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Житикара';
                    } elseif ( $phone_code == '+772437') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жосалы';
                    } elseif ( $phone_code == '+772340') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Зайсан';
                    } elseif ( $phone_code == '+771455') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Затобольск';
                    } elseif ( $phone_code == '+771632') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Зеренда';
                    } elseif ( $phone_code == '+772335') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Зыряновск';
                    } elseif ( $phone_code == '+771234') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Индерборский';
                    } elseif ( $phone_code == '+771832') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Иртышск';
                    } elseif ( $phone_code == '+772837') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кабанбай';
                    } elseif ( $phone_code == '+771144') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Казталовка';
                    } elseif ( $phone_code == '+772539') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Казыгурт';
                    } elseif ( $phone_code == '+771437') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Камысты';
                    } elseif ( $phone_code == '+771333') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кандыагаш';
                    } elseif ( $phone_code == '+772841') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Капал';
                    } elseif ( $phone_code == '+772772') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Капшагай';
                    } elseif ( $phone_code == '+771441') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Карабалык';
                    } elseif ( $phone_code == '+772836') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Карабулак';
                    } elseif ( $phone_code_6 == '+77212') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Караганда';
                    } elseif ( $phone_code == '+771032') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каражал';
                    } elseif ( $phone_code == '+771454') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Караменды';
                    } elseif ( $phone_code == '+771452') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Карасу';
                    } elseif ( $phone_code == '+772644') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каратау';
                    } elseif ( $phone_code == '+771145') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каратобе';
                    } elseif ( $phone_code == '+772252') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Караул';
                    } elseif ( $phone_code == '+771342') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каргалинское';
                    } elseif ( $phone_code == '+772146') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каркаралинск';
                    } elseif ( $phone_code == '+772771') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каскелен';
                    } elseif ( $phone_code == '+772342') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Катон-Карагай';
                    } elseif ( $phone_code == '+771456') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'п. Качар';
                    } elseif ( $phone_code == '+771833') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кашыр';
                    } elseif ( $phone_code == '+772777') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кеген';
                    } elseif ( $phone_code == '+771536') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Келлеровка';
                    } elseif ( $phone_code == '+772536') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кентау';
                    } elseif ( $phone_code == '+772144') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Киевка';
                    } elseif ( $phone_code == '+771542') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кишкеноколь';
                    } elseif ( $phone_code == '+772842') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кугалы';
                    } elseif ( $phone_code == '+772348') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кокпекты';
                    } elseif ( $phone_code == '+771838') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кок-Тюбе';
                    } elseif ( $phone_code_6 == '+77162') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кокшетау';
                    } elseif ( $phone_code == '+771637') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Коргалжын';
                    } elseif ( $phone_code == '+772636') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кордай';
                    } elseif ( $phone_code == '+771543') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Корнеевка';
                    } elseif ( $phone_code_6 == '+77142') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Костанай';
                    } elseif ( $phone_code_6 == '+77162') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Красный Яр';
                    } elseif ( $phone_code == '+772631') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кулан';
                    } elseif ( $phone_code == '+771237') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кульсары';
                    } elseif ( $phone_code == '+772251') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Курчатов';
                    } elseif ( $phone_code == '+772339') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Курчум';
                    } elseif ( $phone_code == '+772937') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Курык';
                    } elseif ( $phone_code_6 == '+77242' || $phone_code == '+772422') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кызылорда';
                    } elseif ( $phone_code == '+772547') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ленгер';
                    } elseif ( $phone_code == '+771546') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ленинградское';
                    } elseif ( $phone_code == '+772843') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Лепсы';
                    } elseif ( $phone_code == '+771433') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Лисаковск';
                    } elseif ( $phone_code == '+772239') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Маканчи';
                    } elseif ( $phone_code == '+771239') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Макат';
                    } elseif ( $phone_code == '+771646') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Макинск';
                    } elseif ( $phone_code == '+771541') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Мамлютка';
                    } elseif ( $phone_code == '+771331') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Мартук';
                    } elseif ( $phone_code == '+771236') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Махамбет';
                    } elseif ( $phone_code == '+772532') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Мерке';
                    } elseif ( $phone_code == '+771238') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Миялы';
                    } elseif ( $phone_code == '+772642') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Мойынкум';
                    } elseif ( $phone_code == '+772148') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Молодежный';
                    } elseif ( $phone_code == '+772541') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Мырзакент';
                    } elseif ( $phone_code == '+772779') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Нарынкол';
                    } elseif ( $phone_code == '+772353') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Новая Шульба';
                    } elseif ( $phone_code == '+771535') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Новоишимское';
                    } elseif ( $phone_code == '+771448') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Октябрьское';
                    } elseif ( $phone_code == '+772149') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Осакаровка';
                    } elseif ( $phone_code == '+772752') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Отеген-Батыр';
                    } elseif ( $phone_code_6 == '+77182') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Павлодар';
                    } elseif ( $phone_code == '+771130') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Переметное';
                    } elseif ( $phone_code_6 == '+77152') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Петропавловск';
                    } elseif ( $phone_code == '+771544') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Пресновка';
                    } elseif ( $phone_code == '+771039') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Приозёрск';
                    } elseif ( $phone_code == '+772336') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Риддер';
                    } elseif ( $phone_code == '+771431') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Рудный';
                    } elseif ( $phone_code == '+771535') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Рузаевка';
                    } elseif ( $phone_code == '+771140') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сайхин';
                    } elseif ( $phone_code == '+772333') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Самарское';
                    } elseif ( $phone_code == '+772137') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сарань';
                    } elseif ( $phone_code == '+772839') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сарканд';
                    } elseif ( $phone_code == '+772537') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сарыагаш';
                    } elseif ( $phone_code == '+772637') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сары Кемер';
                    } elseif ( $phone_code == '+771451') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сарыколь';
                    } elseif ( $phone_code == '+772840') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сарыозек';
                    } elseif ( $phone_code == '+771063') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сатпаев';
                    } elseif ( $phone_code == '+772639') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Саудакент';
                    } elseif ( $phone_code == '+771533') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Саумалколь';
                    } elseif ( $phone_code_6 == '+77222') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Семей';
                    } elseif ( $phone_code == '+771534') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сергеевка';
                    } elseif ( $phone_code == '+772337') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Серебрянск';
                    } elseif ( $phone_code == '+771532') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Смирново';
                    } elseif ( $phone_code == '+771538') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Соколовка';
                    } elseif ( $phone_code == '+771645') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Степногорск';
                    } elseif ( $phone_code == '+771639') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Степняк';
                    } elseif ( $phone_code == '+772334') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Таврическое';
                    } elseif ( $phone_code == '+771142') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тайпак';
                    } elseif ( $phone_code == '+771536') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тайынша';
                    } elseif ( $phone_code == '+772774') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Талгар';
                    } elseif ( $phone_code_6 == '+77282') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Талдыкорган';
                    } elseif ( $phone_code == '+771546') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Талшик';
                    } elseif ( $phone_code_6 == '+77262' || $phone_code == '+772622') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тараз';
                    } elseif ( $phone_code == '+771436') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тарановское';
                    } elseif ( $phone_code == '+771139') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каменка';
                    } elseif ( $phone_code == '+772835') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Текели';
                    } elseif ( $phone_code == '+772530') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Темирлан';
                    } elseif ( $phone_code_6 == '+77213') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Темиртау';
                    } elseif ( $phone_code == '+771230') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тенгиз';
                    } elseif ( $phone_code == '+772343') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Теректы';
                    } elseif ( $phone_code == '+772436') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Теренозек';
                    } elseif ( $phone_code == '+771537') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тимирязево';
                    } elseif ( $phone_code == '+72138') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'им. Габидена Мустафина';
                    } elseif ( $phone_code == '+772638') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Толе би';
                    } elseif ( $phone_code == '+772153') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Топар';
                    } elseif ( $phone_code == '+771439') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тургай';
                    } elseif ( $phone_code == '+772538') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Турара Рыскулова';
                    } elseif ( $phone_code == '+772533') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Туркестан';
                    } elseif ( $phone_code == '+771445') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Убаган';
                    } elseif ( $phone_code == '+771444') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Узунколь';
                    } elseif ( $phone_code == '+772770') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Узынагаш';
                    } elseif ( $phone_code == '+771035') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Улытау';
                    } elseif ( $phone_code == '+772154') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ботакара';
                    } elseif ( $phone_code_6 == '+77112') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Уральск';
                    } elseif ( $phone_code == '+772230') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Уржар';
                    } elseif ( $phone_code == '+771834') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Успенка';
                    } elseif ( $phone_code_6 == '+77232') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Усть-Каменогорск';
                    } elseif ( $phone_code == '+772833') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ушарал';
                    } elseif ( $phone_code == '+772834') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Уштобе';
                    } elseif ( $phone_code == '+771132' || $phone_code == '+771442') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Федоровка';
                    } elseif ( $phone_code == '+772938') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Форт-Шевченко';
                    } elseif ( $phone_code == '+771341') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кордай';
                    } elseif ( $phone_code == '+771336') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Хромтау';
                    } elseif ( $phone_code == '+771136') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чапай';
                    } elseif ( $phone_code == '+772776') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шелек';
                    } elseif ( $phone_code == '+771137') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чингирлау';
                    } elseif ( $phone_code == '+771535') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чистополье';
                    } elseif ( $phone_code == '+771536') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чкалово';
                    } elseif ( $phone_code == '+772778') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чунджа';
                    } elseif ( $phone_code == '+771355') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шалкар';
                    } elseif ( $phone_code == '+772345') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чарск';
                    } elseif ( $phone_code == '+771836') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Щарбакты';
                    } elseif ( $phone_code == '+772535') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шардара';
                    } elseif ( $phone_code == '+772544') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шаульдер';
                    } elseif ( $phone_code == '+772156') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шахтинск';
                    } elseif ( $phone_code == '+771038') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шашубай';
                    } elseif ( $phone_code == '+772548') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шаян';
                    } elseif ( $phone_code == '+772332') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шемонаиха';
                    } elseif ( $phone_code == '+772931') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шетпе';
                    } elseif ( $phone_code == '+772432') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шиели';
                    } elseif ( $phone_code == '+772546') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чулаккурган';
                    } elseif ( $phone_code == '+771631') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шортанды';
                    } elseif ( $phone_code == '+772643') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шу';
                    } elseif ( $phone_code == '+771346') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шубаркудук';
                    } elseif ( $phone_code == '+772257') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шульбинск';
                    } elseif ( $phone_code_6 == '+77252') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шымкент';
                    } elseif ( $phone_code == '+771636') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Щучинск';
                    } elseif ( $phone_code_6 == '+77187') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Экибастуз';
                    } elseif ( $phone_code == '+771334') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Эмба';
                    } elseif ( $phone_code == '+771543') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Явленка';
                    } else {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                    }
                    $img = '<img src="img/kz.png" style="width: 20px; height: 20px">';
                    $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out,$country]);
                } else{
                
                    $phone_pref = substr($phone, 0, 1);
                    $img = '<img src="img/ru.png" style="width: 20px; height: 20px">';
                    if($phone_pref === '+'){
                            $phone_def_2_3 = substr($phone, 2, 3);
                            $phone_num = substr($phone, 5, 7);
    
                            $servername = "localhost";
                            $database = "cj68608_server";
                            $username = "cj68608_server";
                            $password = "48W4GxJA";
                            $db_table = "phone_region";
                            // Создаем соединение
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            // Проверяем соединение
                            $sql = "SELECT * FROM $db_table";
                            if (mysqli_query($conn, $sql)) {
                                $result_conn = "Данные получены";
                            } else {
                                $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            
                            if($result = $conn->query($sql)) {
                                foreach($result as $row) {
                                    $db_def = $row["def"];
                                    $db_phone_from = $row["phone_from"];
                                    $db_phone_to = $row["phone_to"];
                                    $db_operator = $row["operator"];
                                    $db_region = $row["region"];
                                    if($phone_def_2_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                        $region = explode("|", $db_region);
                                        if($region[2] != ''){
                                            $region_out = $region[2];
                                        } elseif ($region[1] != ''){
                                            $region_out = $region[1];
                                        } elseif ($region[0] != ''){
                                            $region_out = $region[0];
                                        } else {
                                            $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                        };
    
                                        $operator = $valueData['org'];
                                        
                                        if($region_out == 'Российская Федерация'){
                                            date_default_timezone_set("Europe/Moscow");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Калининградская обл.'){
                                            date_default_timezone_set("Europe/Kaliningrad");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                            date_default_timezone_set("Europe/Moscow");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                            date_default_timezone_set("Europe/Astrakhan");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                            date_default_timezone_set("Asia/Yekaterinburg");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Омская обл.'){
                                            date_default_timezone_set("Asia/Omsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                            date_default_timezone_set("Asia/Barnaul");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                            date_default_timezone_set("Asia/Irkutsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                            date_default_timezone_set("Asia/Yakutsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                            date_default_timezone_set("Asia/Vladivostok");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Сахалинская обл.'){
                                            date_default_timezone_set("Asia/Sakhalin");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                            date_default_timezone_set("Asia/Kamchatka");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        }
                                    }
                                }
                            } else {
                                $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                            }
    
                    }  elseif($phone_pref === '8' || $phone_pref === '7') {
                            $phone_def_1_3 = substr($phone, 1, 3);
                            $phone_num = substr($phone, 4, 7);
                            
                            $servername = "localhost";
                            $database = "cj68608_server";
                            $username = "cj68608_server";
                            $password = "48W4GxJA";
                            $db_table = "phone_region";
                            // Создаем соединение
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            // Проверяем соединение
                            $sql = "SELECT * FROM $db_table";
                            if (mysqli_query($conn, $sql)) {
                                $result_conn = "Данные получены";
                            } else {
                                $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            
                            if($result = $conn->query($sql)) {
                                foreach($result as $row) {
                                    $db_def = $row["def"];
                                    $db_phone_from = $row["phone_from"];
                                    $db_phone_to = $row["phone_to"];
                                    $db_operator = $row["operator"];
                                    $db_region = $row["region"];
                                    if($phone_def_1_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                        $region = explode("|", $db_region);
                                        if($region[2] != ''){
                                            $region_out = $region[2];
                                        } elseif ($region[1] != ''){
                                            $region_out = $region[1];
                                        } elseif ($region[0] != ''){
                                            $region_out = $region[0];
                                        } else {
                                            $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                        };
    
                                        if($region_out == 'Российская Федерация'){
                                            date_default_timezone_set("Europe/Moscow");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Калининградская обл.'){
                                            date_default_timezone_set("Europe/Kaliningrad");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                            date_default_timezone_set("Europe/Moscow");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                            date_default_timezone_set("Europe/Astrakhan");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                            date_default_timezone_set("Asia/Yekaterinburg");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Омская обл.'){
                                            date_default_timezone_set("Asia/Omsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                            date_default_timezone_set("Asia/Barnaul");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                            date_default_timezone_set("Asia/Irkutsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                            date_default_timezone_set("Asia/Yakutsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                            date_default_timezone_set("Asia/Vladivostok");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Сахалинская обл.'){
                                            date_default_timezone_set("Asia/Sakhalin");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                            date_default_timezone_set("Asia/Kamchatka");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        }
                                    }
                                }
                            } else {
                                $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                            }
                    }
                    
                }
                
            } elseif (!empty($result['result'][0]['COMPANY_ID']))
            {
                $result = Test::call(
                    'crm.company.list',
                    [
                        'filter' => ['ID' => intVal($result['result'][0]['COMPANY_ID'])],
                        'select' => ['ID', 'PHONE']
                    ]
                );
                
                $phone = trim($result['result'][0]['PHONE'][0]['VALUE']);
                $phone_def = substr($phone, 0, 4);
                $phone_def_2 = substr($phone, 0, 2);
                $phone_def_3 = substr($phone, 0, 3);
                $phone_code = substr($phone, 0, 7);
                $phone_code_6 = substr($phone, 0, 6);
                $phone_code_5 = substr($phone, 0, 5);
                $phone_code_4 = substr($phone, 0, 4);
                if($phone_def == '+375' || $phone_def_2 == '80'){
                    date_default_timezone_set("Europe/Minsk");
                    $time = time();
                    $time = date('H:i', $time);
                    $test = '<br>';
                    $region_out = 'Беларусь';

                    if($phone_code == '+375291' || $phone_code == '+375293' || $phone_code == '+375296' || $phone_code == '+375299' || $phone_code_6 == '+37544' || $phone_code_5 == '80291' || $phone_code_5 == '80293' || $phone_code_5 == '80296' || $phone_code_5 == '80299' || $phone_code_4 == '8044'){
                        $operator = '«А1»';
                    } elseif($phone_code == '+375292' || $phone_code == '+375295' || $phone_code == '+375297' || $phone_code == '+375298' || $phone_code_6 == '+37533' || $phone_code_5 == '80292' || $phone_code_5 == '80295' || $phone_code_5 == '80297' || $phone_code_5 == '80298' || $phone_code_4 == '8033'){
                        $operator = 'МТС';
                    } elseif($phone_code_5 == '+37525' || $phone_code_4 == '8025'){
                        $operator = 'Lifecell';
                    }  elseif($phone_code_5 == '+37524' || $phone_code_4 == '8024'){
                        $operator = 'Белтелеком (Максифон)';
                    } else{
                        $operator = 'Оператор не установлен';
                    }

                    $img = '<img src="img/blr.png" style="width: 20px; height: 20px">';
                    $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
                } elseif($phone_def == '+380'){
                    date_default_timezone_set("Europe/Kiev");
                    $time = time();
                    $time = date('H:i', $time);
                    $test = '<br>';
                    $region_out = 'Украина';
                    if($phone_code_6 == '+38039' || $phone_code_6 == '+38067' || $phone_code_6 == '+38068' || $phone_code_6 == '+38096' || $phone_code_6 == '+38097' || $phone_code_6 == '+38098'){
                        $operator = 'Киевстар';
                    } elseif($phone_code_6 == '+38050' || $phone_code_6 == '+38066' || $phone_code_6 == '+38095' || $phone_code_6 == '+38099'){
                        $operator = 'Vodafone (ПАО "Мобильные ТелеСистемы")';
                    } elseif($phone_code_6 == '+38063' || $phone_code_6 == '+38093'){
                        $operator = 'Lifecell';
                    } elseif($phone_code_6 == '+38091'){
                        $operator = 'ТриМоб (Utel Украина)';
                    } elseif($phone_code_6 == '+38092'){
                        $operator = 'PEOPLEnet Украина';
                    } elseif($phone_code_6 == '+38094'){
                        $operator = 'Интертелеком Украина';
                    } else{
                        $operator = 'Оператор не установлен';
                    }
                    $img = '<img src="img/ukr.png" style="width: 20px; height: 20px">';
                    $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
                } elseif($phone_def_3 == '+77'|| $phone_def_2 == '77'){
                    $test = '<br>';
                    $country = 'Казахстан';

                    if($phone_code == '+772131' || $phone_code == '+772532') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Абай';
                    } elseif ( $phone_code == '+771033') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Агадырь';
                    } elseif ( $phone_code == '+772438') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Айтеке-Би';
                    } elseif ( $phone_code == '+771143') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акжаик';
                    } elseif ( $phone_code == '+771036') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акжал';
                    } elseif ( $phone_code == '+772344') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акжар';
                    } elseif ( $phone_code == '+771638' || $phone_code == '+772641') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акколь';
                    } elseif ( $phone_code == '+771839') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акку';
                    } elseif ( $phone_code == '+771231') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аккыстау';
                    } elseif ( $phone_code == '+771133') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аксай';
                    } elseif ( $phone_code == '+771837') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аксу';
                    } elseif ( $phone_code == '+771031') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аксу-Аюлы';
                    } elseif ( $phone_code == '+772346') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аксуат';
                    } elseif ( $phone_code_6 == '+77213') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Актас';
                    } elseif ( $phone_code_6 == '+77213' || $phone_code_6 == '+77292') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Актау';
                    } elseif ( $phone_code_6 == '+77132') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Актобе';
                    } elseif ( $phone_code == '+771037' || $phone_code == '+771841') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Актогай';
                    } elseif ( $phone_code == '+772757') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Акший';
                    } elseif ( $phone_code == '+771337') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Алга';
                    } elseif ( $phone_code_6 == '+77272') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Алматы';
                    } elseif ( $phone_code == '+771440') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Амангельды';
                    } elseif ( $phone_code == '+772433') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аральск';
                    } elseif ( $phone_code == '+771430') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аркалык';
                    } elseif ( $phone_code == '+771644') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аршалы';
                    } elseif ( $phone_code == '+771533') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Арыкбалык';
                    } elseif ( $phone_code == '+772540') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Арысь';
                    } elseif ( $phone_code == '+772633') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аса';
                    } elseif ( $phone_code_6 == '+77172') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Нур-Султан';
                    } elseif ( $phone_code == '+771641') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Астраханка';
                    } elseif ( $phone_code == '+772542') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Асык Ата';
                    } elseif ( $phone_code == '+771030') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Атасу';
                    } elseif ( $phone_code == '+771643') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Атбасар';
                    } elseif ( $phone_code_6 == '+77122') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Атырау';
                    } elseif ( $phone_code == '+771453') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аулиеколь';
                    } elseif ( $phone_code == '+772237') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аягоз';
                    } elseif ( $phone_code == '+772236') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бескарагай';
                    } elseif ( $phone_code == '+771345') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Байганин';
                    } elseif ( $phone_code == '+733622') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Байконур';
                    } elseif ( $phone_code == '+772773') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Баканас';
                    } elseif ( $phone_code == '+771640') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Балкашино';
                    } elseif ( $phone_code == '+772838') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Балпык';
                    } elseif ( $phone_code == '+771036') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Балхаш';
                    } elseif ( $phone_code == '+772246') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Баршатас';
                    } elseif ( $phone_code == '+771342') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Батамшинский';
                    } elseif ( $phone_code == '+772635') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бауыржан Момышулы';
                    } elseif ( $phone_code == '+771840') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Баянаул';
                    } elseif ( $phone_code == '+772932') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бейнеу';
                    } elseif ( $phone_code == '+772531') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Аксукент';
                    } elseif ( $phone_code == '+771538') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бишкуль';
                    } elseif ( $phone_code == '+771544') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Благовещенка';
                    } elseif ( $phone_code == '+772338') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бозанбай';
                    } elseif ( $phone_code == '+772341') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Большенарымское';
                    } elseif ( $phone_code == '+771630') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Боровое';
                    } elseif ( $phone_code == '+771443') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Боровское';
                    } elseif ( $phone_code == '+772351') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Бородулихинский район';
                    } elseif ( $phone_code == '+771531') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Булаево';
                    } elseif ( $phone_code == '+771233') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ганюшкино';
                    } elseif ( $phone_code == '+772347') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Калбатау';
                    } elseif ( $phone_code == '+772331') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Глубокое';
                    } elseif ( $phone_code == '+771131') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Дарьинское';
                    } elseif ( $phone_code == '+771434') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Денисовка';
                    } elseif ( $phone_code == '+771648') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Державинск';
                    } elseif ( $phone_code == '+771138') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Джанибек';
                    } elseif ( $phone_code == '+771134') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жымпиты';
                    } elseif ( $phone_code == '+771141') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Джангала';
                    } elseif ( $phone_code == '+772147') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Егиндыбулак';
                    } elseif ( $phone_code == '+771642') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Егиндыколь';
                    } elseif ( $phone_code == '+771633') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ерейментау';
                    } elseif ( $phone_code == '+772775') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Есик';
                    } elseif ( $phone_code == '+771647') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Есиль';
                    } elseif ( $phone_code == '+771040' || $phone_code == '+771043') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жайрем';
                    } elseif ( $phone_code == '+771635') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жаксы';
                    } elseif ( $phone_code == '+72431') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жалагаш';
                    } elseif ( $phone_code == '+771138') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Фурманово';
                    } elseif ( $phone_code == '+772435') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жанакорган';
                    } elseif ( $phone_code == '+772934') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жанаозен';
                    } elseif ( $phone_code == '+772634') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жанатас';
                    } elseif ( $phone_code == '+772832') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жансугуров';
                    } elseif ( $phone_code == '+772831') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жаркент';
                    } elseif ( $phone_code == '+771034') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жезды';
                    } elseif ( $phone_code_6 == '+77102') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жезказган';
                    } elseif ( $phone_code == '+772351') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жезкент';
                    } elseif ( $phone_code == '+771831') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Железинка';
                    } elseif ( $phone_code == '+772534') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жетысай';
                    } elseif ( $phone_code == '+771435') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Житикара';
                    } elseif ( $phone_code == '+772437') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Жосалы';
                    } elseif ( $phone_code == '+772340') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Зайсан';
                    } elseif ( $phone_code == '+771455') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Затобольск';
                    } elseif ( $phone_code == '+771632') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Зеренда';
                    } elseif ( $phone_code == '+772335') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Зыряновск';
                    } elseif ( $phone_code == '+771234') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Индерборский';
                    } elseif ( $phone_code == '+771832') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Иртышск';
                    } elseif ( $phone_code == '+772837') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кабанбай';
                    } elseif ( $phone_code == '+771144') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Казталовка';
                    } elseif ( $phone_code == '+772539') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Казыгурт';
                    } elseif ( $phone_code == '+771437') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Камысты';
                    } elseif ( $phone_code == '+771333') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кандыагаш';
                    } elseif ( $phone_code == '+772841') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Капал';
                    } elseif ( $phone_code == '+772772') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Капшагай';
                    } elseif ( $phone_code == '+771441') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Карабалык';
                    } elseif ( $phone_code == '+772836') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Карабулак';
                    } elseif ( $phone_code_6 == '+77212') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Караганда';
                    } elseif ( $phone_code == '+771032') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каражал';
                    } elseif ( $phone_code == '+771454') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Караменды';
                    } elseif ( $phone_code == '+771452') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Карасу';
                    } elseif ( $phone_code == '+772644') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каратау';
                    } elseif ( $phone_code == '+771145') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каратобе';
                    } elseif ( $phone_code == '+772252') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Караул';
                    } elseif ( $phone_code == '+771342') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каргалинское';
                    } elseif ( $phone_code == '+772146') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каркаралинск';
                    } elseif ( $phone_code == '+772771') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каскелен';
                    } elseif ( $phone_code == '+772342') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Катон-Карагай';
                    } elseif ( $phone_code == '+771456') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'п. Качар';
                    } elseif ( $phone_code == '+771833') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кашыр';
                    } elseif ( $phone_code == '+772777') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кеген';
                    } elseif ( $phone_code == '+771536') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Келлеровка';
                    } elseif ( $phone_code == '+772536') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кентау';
                    } elseif ( $phone_code == '+772144') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Киевка';
                    } elseif ( $phone_code == '+771542') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кишкеноколь';
                    } elseif ( $phone_code == '+772842') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кугалы';
                    } elseif ( $phone_code == '+772348') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кокпекты';
                    } elseif ( $phone_code == '+771838') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кок-Тюбе';
                    } elseif ( $phone_code_6 == '+77162') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кокшетау';
                    } elseif ( $phone_code == '+771637') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Коргалжын';
                    } elseif ( $phone_code == '+772636') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кордай';
                    } elseif ( $phone_code == '+771543') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Корнеевка';
                    } elseif ( $phone_code_6 == '+77142') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Костанай';
                    } elseif ( $phone_code_6 == '+77162') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Красный Яр';
                    } elseif ( $phone_code == '+772631') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кулан';
                    } elseif ( $phone_code == '+771237') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кульсары';
                    } elseif ( $phone_code == '+772251') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Курчатов';
                    } elseif ( $phone_code == '+772339') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Курчум';
                    } elseif ( $phone_code == '+772937') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Курык';
                    } elseif ( $phone_code_6 == '+77242' || $phone_code == '+772422') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кызылорда';
                    } elseif ( $phone_code == '+772547') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ленгер';
                    } elseif ( $phone_code == '+771546') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ленинградское';
                    } elseif ( $phone_code == '+772843') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Лепсы';
                    } elseif ( $phone_code == '+771433') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Лисаковск';
                    } elseif ( $phone_code == '+772239') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Маканчи';
                    } elseif ( $phone_code == '+771239') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Макат';
                    } elseif ( $phone_code == '+771646') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Макинск';
                    } elseif ( $phone_code == '+771541') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Мамлютка';
                    } elseif ( $phone_code == '+771331') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Мартук';
                    } elseif ( $phone_code == '+771236') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Махамбет';
                    } elseif ( $phone_code == '+772532') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Мерке';
                    } elseif ( $phone_code == '+771238') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Миялы';
                    } elseif ( $phone_code == '+772642') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Мойынкум';
                    } elseif ( $phone_code == '+772148') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Молодежный';
                    } elseif ( $phone_code == '+772541') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Мырзакент';
                    } elseif ( $phone_code == '+772779') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Нарынкол';
                    } elseif ( $phone_code == '+772353') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Новая Шульба';
                    } elseif ( $phone_code == '+771535') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Новоишимское';
                    } elseif ( $phone_code == '+771448') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Октябрьское';
                    } elseif ( $phone_code == '+772149') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Осакаровка';
                    } elseif ( $phone_code == '+772752') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Отеген-Батыр';
                    } elseif ( $phone_code_6 == '+77182') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Павлодар';
                    } elseif ( $phone_code == '+771130') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Переметное';
                    } elseif ( $phone_code_6 == '+77152') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Петропавловск';
                    } elseif ( $phone_code == '+771544') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Пресновка';
                    } elseif ( $phone_code == '+771039') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Приозёрск';
                    } elseif ( $phone_code == '+772336') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Риддер';
                    } elseif ( $phone_code == '+771431') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Рудный';
                    } elseif ( $phone_code == '+771535') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Рузаевка';
                    } elseif ( $phone_code == '+771140') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сайхин';
                    } elseif ( $phone_code == '+772333') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Самарское';
                    } elseif ( $phone_code == '+772137') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сарань';
                    } elseif ( $phone_code == '+772839') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сарканд';
                    } elseif ( $phone_code == '+772537') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сарыагаш';
                    } elseif ( $phone_code == '+772637') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сары Кемер';
                    } elseif ( $phone_code == '+771451') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сарыколь';
                    } elseif ( $phone_code == '+772840') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сарыозек';
                    } elseif ( $phone_code == '+771063') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сатпаев';
                    } elseif ( $phone_code == '+772639') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Саудакент';
                    } elseif ( $phone_code == '+771533') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Саумалколь';
                    } elseif ( $phone_code_6 == '+77222') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Семей';
                    } elseif ( $phone_code == '+771534') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Сергеевка';
                    } elseif ( $phone_code == '+772337') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Серебрянск';
                    } elseif ( $phone_code == '+771532') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Смирново';
                    } elseif ( $phone_code == '+771538') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Соколовка';
                    } elseif ( $phone_code == '+771645') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Степногорск';
                    } elseif ( $phone_code == '+771639') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Степняк';
                    } elseif ( $phone_code == '+772334') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Таврическое';
                    } elseif ( $phone_code == '+771142') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тайпак';
                    } elseif ( $phone_code == '+771536') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тайынша';
                    } elseif ( $phone_code == '+772774') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Талгар';
                    } elseif ( $phone_code_6 == '+77282') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Талдыкорган';
                    } elseif ( $phone_code == '+771546') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Талшик';
                    } elseif ( $phone_code_6 == '+77262' || $phone_code == '+772622') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тараз';
                    } elseif ( $phone_code == '+771436') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тарановское';
                    } elseif ( $phone_code == '+771139') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Каменка';
                    } elseif ( $phone_code == '+772835') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Текели';
                    } elseif ( $phone_code == '+772530') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Темирлан';
                    } elseif ( $phone_code_6 == '+77213') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Темиртау';
                    } elseif ( $phone_code == '+771230') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тенгиз';
                    } elseif ( $phone_code == '+772343') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Теректы';
                    } elseif ( $phone_code == '+772436') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Теренозек';
                    } elseif ( $phone_code == '+771537') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тимирязево';
                    } elseif ( $phone_code == '+72138') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'им. Габидена Мустафина';
                    } elseif ( $phone_code == '+772638') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Толе би';
                    } elseif ( $phone_code == '+772153') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Топар';
                    } elseif ( $phone_code == '+771439') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Тургай';
                    } elseif ( $phone_code == '+772538') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Турара Рыскулова';
                    } elseif ( $phone_code == '+772533') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Туркестан';
                    } elseif ( $phone_code == '+771445') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Убаган';
                    } elseif ( $phone_code == '+771444') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Узунколь';
                    } elseif ( $phone_code == '+772770') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Узынагаш';
                    } elseif ( $phone_code == '+771035') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Улытау';
                    } elseif ( $phone_code == '+772154') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ботакара';
                    } elseif ( $phone_code_6 == '+77112') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Уральск';
                    } elseif ( $phone_code == '+772230') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Уржар';
                    } elseif ( $phone_code == '+771834') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Успенка';
                    } elseif ( $phone_code_6 == '+77232') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Усть-Каменогорск';
                    } elseif ( $phone_code == '+772833') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Ушарал';
                    } elseif ( $phone_code == '+772834') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Уштобе';
                    } elseif ( $phone_code == '+771132' || $phone_code == '+771442') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Федоровка';
                    } elseif ( $phone_code == '+772938') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Форт-Шевченко';
                    } elseif ( $phone_code == '+771341') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Кордай';
                    } elseif ( $phone_code == '+771336') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Хромтау';
                    } elseif ( $phone_code == '+771136') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чапай';
                    } elseif ( $phone_code == '+772776') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шелек';
                    } elseif ( $phone_code == '+771137') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чингирлау';
                    } elseif ( $phone_code == '+771535') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чистополье';
                    } elseif ( $phone_code == '+771536') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чкалово';
                    } elseif ( $phone_code == '+772778') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чунджа';
                    } elseif ( $phone_code == '+771355') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шалкар';
                    } elseif ( $phone_code == '+772345') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чарск';
                    } elseif ( $phone_code == '+771836') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Щарбакты';
                    } elseif ( $phone_code == '+772535') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шардара';
                    } elseif ( $phone_code == '+772544') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шаульдер';
                    } elseif ( $phone_code == '+772156') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шахтинск';
                    } elseif ( $phone_code == '+771038') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шашубай';
                    } elseif ( $phone_code == '+772548') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шаян';
                    } elseif ( $phone_code == '+772332') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шемонаиха';
                    } elseif ( $phone_code == '+772931') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шетпе';
                    } elseif ( $phone_code == '+772432') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шиели';
                    } elseif ( $phone_code == '+772546') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Чулаккурган';
                    } elseif ( $phone_code == '+771631') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шортанды';
                    } elseif ( $phone_code == '+772643') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шу';
                    } elseif ( $phone_code == '+771346') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шубаркудук';
                    } elseif ( $phone_code == '+772257') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шульбинск';
                    } elseif ( $phone_code_6 == '+77252') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Шымкент';
                    } elseif ( $phone_code == '+771636') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Щучинск';
                    } elseif ( $phone_code_6 == '+77187') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Экибастуз';
                    } elseif ( $phone_code == '+771334') {
                        date_default_timezone_set("Asia/Aqtau");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Эмба';
                    } elseif ( $phone_code == '+771543') {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                        $region_out = 'Явленка';
                    } else {
                        date_default_timezone_set("Asia/Almaty");
                        $time = time();
                        $time = date('H:i', $time);
                    }
                    $img = '<img src="img/kz.png" style="width: 20px; height: 20px">';
                    $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out,$country]);
                } else{
                
                    $phone_pref = substr($phone, 0, 1);
                    $img = '<img src="img/ru.png" style="width: 20px; height: 20px">';
                    if($phone_pref === '+'){
                            $phone_def_2_3 = substr($phone, 2, 3);
                            $phone_num = substr($phone, 5, 7);
    
                            $servername = "localhost";
                            $database = "cj68608_server";
                            $username = "cj68608_server";
                            $password = "48W4GxJA";
                            $db_table = "phone_region";
                            // Создаем соединение
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            // Проверяем соединение
                            $sql = "SELECT * FROM $db_table";
                            if (mysqli_query($conn, $sql)) {
                                $result_conn = "Данные получены";
                            } else {
                                $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            
                            if($result = $conn->query($sql)) {
                                foreach($result as $row) {
                                    $db_def = $row["def"];
                                    $db_phone_from = $row["phone_from"];
                                    $db_phone_to = $row["phone_to"];
                                    $db_operator = $row["operator"];
                                    $db_region = $row["region"];
                                    if($phone_def_2_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                        $region = explode("|", $db_region);
                                        if($region[2] != ''){
                                            $region_out = $region[2];
                                        } elseif ($region[1] != ''){
                                            $region_out = $region[1];
                                        } elseif ($region[0] != ''){
                                            $region_out = $region[0];
                                        } else {
                                            $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                        };
    
                                        $operator = $valueData['org'];
                                        
                                        if($region_out == 'Российская Федерация'){
                                            date_default_timezone_set("Europe/Moscow");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Калининградская обл.'){
                                            date_default_timezone_set("Europe/Kaliningrad");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                            date_default_timezone_set("Europe/Moscow");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                            date_default_timezone_set("Europe/Astrakhan");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                            date_default_timezone_set("Asia/Yekaterinburg");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Омская обл.'){
                                            date_default_timezone_set("Asia/Omsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                            date_default_timezone_set("Asia/Barnaul");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                            date_default_timezone_set("Asia/Irkutsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                            date_default_timezone_set("Asia/Yakutsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                            date_default_timezone_set("Asia/Vladivostok");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Сахалинская обл.'){
                                            date_default_timezone_set("Asia/Sakhalin");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                            date_default_timezone_set("Asia/Kamchatka");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        }
                                    }
                                }
                            } else {
                                $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                            }
    
                    }  elseif($phone_pref === '8' || $phone_pref === '7') {
                            $phone_def_1_3 = substr($phone, 1, 3);
                            $phone_num = substr($phone, 4, 7);
                            
                            $servername = "localhost";
                            $database = "cj68608_server";
                            $username = "cj68608_server";
                            $password = "48W4GxJA";
                            $db_table = "phone_region";
                            // Создаем соединение
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            // Проверяем соединение
                            $sql = "SELECT * FROM $db_table";
                            if (mysqli_query($conn, $sql)) {
                                $result_conn = "Данные получены";
                            } else {
                                $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            
                            if($result = $conn->query($sql)) {
                                foreach($result as $row) {
                                    $db_def = $row["def"];
                                    $db_phone_from = $row["phone_from"];
                                    $db_phone_to = $row["phone_to"];
                                    $db_operator = $row["operator"];
                                    $db_region = $row["region"];
                                    if($phone_def_1_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                        $region = explode("|", $db_region);
                                        if($region[2] != ''){
                                            $region_out = $region[2];
                                        } elseif ($region[1] != ''){
                                            $region_out = $region[1];
                                        } elseif ($region[0] != ''){
                                            $region_out = $region[0];
                                        } else {
                                            $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                        };
    
                                        if($region_out == 'Российская Федерация'){
                                            date_default_timezone_set("Europe/Moscow");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Калининградская обл.'){
                                            date_default_timezone_set("Europe/Kaliningrad");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                            date_default_timezone_set("Europe/Moscow");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                            date_default_timezone_set("Europe/Astrakhan");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                            date_default_timezone_set("Asia/Yekaterinburg");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Омская обл.'){
                                            date_default_timezone_set("Asia/Omsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                            date_default_timezone_set("Asia/Barnaul");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                            date_default_timezone_set("Asia/Irkutsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                            date_default_timezone_set("Asia/Yakutsk");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                            date_default_timezone_set("Asia/Vladivostok");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Сахалинская обл.'){
                                            date_default_timezone_set("Asia/Sakhalin");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                            date_default_timezone_set("Asia/Kamchatka");
                                            $time = time();
                                            $time = date('H:i', $time);
                                            $test = '<br>';
                                            $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                        }
                                    }
                                }
                            } else {
                                $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                            }
                    }
                    
                }
                
            }
        }
    } if ($placementOptions['CRM_ENTITY_TYPE'] == 'DEAL' && $placementOptions['CRM_ENTITY_ID'] > 0)
    {
        $result = Test::call(
            'crm.deal.list',
            [
                'filter' => ['ID' => intVal($placementOptions['CRM_ENTITY_ID'])],
                'select' => ['ID', 'COMPANY_ID','CONTACT_ID', 'PHONE']
            ]
        );
        
        if (!empty($result['result'][0]['PHONE'][0]['VALUE']))
        {
            $phone = trim($result['result'][0]['PHONE'][0]['VALUE']);
            $phone_def = substr($phone, 0, 4);
            $phone_def_2 = substr($phone, 0, 2);
            $phone_def_3 = substr($phone, 0, 3);
            $phone_code = substr($phone, 0, 7);
            $phone_code_6 = substr($phone, 0, 6);
            $phone_code_5 = substr($phone, 0, 5);
            $phone_code_4 = substr($phone, 0, 4);
            if($phone_def == '+375' || $phone_def_2 == '80'){
                date_default_timezone_set("Europe/Minsk");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Беларусь';

                if($phone_code == '+375291' || $phone_code == '+375293' || $phone_code == '+375296' || $phone_code == '+375299' || $phone_code_6 == '+37544' || $phone_code_5 == '80291' || $phone_code_5 == '80293' || $phone_code_5 == '80296' || $phone_code_5 == '80299' || $phone_code_4 == '8044'){
                    $operator = '«А1»';
                } elseif($phone_code == '+375292' || $phone_code == '+375295' || $phone_code == '+375297' || $phone_code == '+375298' || $phone_code_6 == '+37533' || $phone_code_5 == '80292' || $phone_code_5 == '80295' || $phone_code_5 == '80297' || $phone_code_5 == '80298' || $phone_code_4 == '8033'){
                    $operator = 'МТС';
                } elseif($phone_code_5 == '+37525' || $phone_code_4 == '8025'){
                    $operator = 'Lifecell';
                }  elseif($phone_code_5 == '+37524' || $phone_code_4 == '8024'){
                    $operator = 'Белтелеком (Максифон)';
                } else{
                    $operator = 'Оператор не установлен';
                }

                $img = '<img src="img/blr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def == '+380'){
                date_default_timezone_set("Europe/Kiev");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Украина';
                if($phone_code_6 == '+38039' || $phone_code_6 == '+38067' || $phone_code_6 == '+38068' || $phone_code_6 == '+38096' || $phone_code_6 == '+38097' || $phone_code_6 == '+38098'){
                    $operator = 'Киевстар';
                } elseif($phone_code_6 == '+38050' || $phone_code_6 == '+38066' || $phone_code_6 == '+38095' || $phone_code_6 == '+38099'){
                    $operator = 'Vodafone (ПАО "Мобильные ТелеСистемы")';
                } elseif($phone_code_6 == '+38063' || $phone_code_6 == '+38093'){
                    $operator = 'Lifecell';
                } elseif($phone_code_6 == '+38091'){
                    $operator = 'ТриМоб (Utel Украина)';
                } elseif($phone_code_6 == '+38092'){
                    $operator = 'PEOPLEnet Украина';
                } elseif($phone_code_6 == '+38094'){
                    $operator = 'Интертелеком Украина';
                } else{
                    $operator = 'Оператор не установлен';
                }
                $img = '<img src="img/ukr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def_3 == '+77'|| $phone_def_2 == '77'){
                $test = '<br>';
                $country = 'Казахстан';

                if($phone_code == '+772131' || $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Абай';
                } elseif ( $phone_code == '+771033') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Агадырь';
                } elseif ( $phone_code == '+772438') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Айтеке-Би';
                } elseif ( $phone_code == '+771143') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжаик';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжал';
                } elseif ( $phone_code == '+772344') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжар';
                } elseif ( $phone_code == '+771638' || $phone_code == '+772641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акколь';
                } elseif ( $phone_code == '+771839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акку';
                } elseif ( $phone_code == '+771231') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аккыстау';
                } elseif ( $phone_code == '+771133') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксай';
                } elseif ( $phone_code == '+771837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу';
                } elseif ( $phone_code == '+771031') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу-Аюлы';
                } elseif ( $phone_code == '+772346') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксуат';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актас';
                } elseif ( $phone_code_6 == '+77213' || $phone_code_6 == '+77292') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актау';
                } elseif ( $phone_code_6 == '+77132') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актобе';
                } elseif ( $phone_code == '+771037' || $phone_code == '+771841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актогай';
                } elseif ( $phone_code == '+772757') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акший';
                } elseif ( $phone_code == '+771337') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алга';
                } elseif ( $phone_code_6 == '+77272') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алматы';
                } elseif ( $phone_code == '+771440') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Амангельды';
                } elseif ( $phone_code == '+772433') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аральск';
                } elseif ( $phone_code == '+771430') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аркалык';
                } elseif ( $phone_code == '+771644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аршалы';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арыкбалык';
                } elseif ( $phone_code == '+772540') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арысь';
                } elseif ( $phone_code == '+772633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аса';
                } elseif ( $phone_code_6 == '+77172') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нур-Султан';
                } elseif ( $phone_code == '+771641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Астраханка';
                } elseif ( $phone_code == '+772542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Асык Ата';
                } elseif ( $phone_code == '+771030') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атасу';
                } elseif ( $phone_code == '+771643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атбасар';
                } elseif ( $phone_code_6 == '+77122') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атырау';
                } elseif ( $phone_code == '+771453') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аулиеколь';
                } elseif ( $phone_code == '+772237') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аягоз';
                } elseif ( $phone_code == '+772236') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бескарагай';
                } elseif ( $phone_code == '+771345') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байганин';
                } elseif ( $phone_code == '+733622') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байконур';
                } elseif ( $phone_code == '+772773') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баканас';
                } elseif ( $phone_code == '+771640') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балкашино';
                } elseif ( $phone_code == '+772838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балпык';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балхаш';
                } elseif ( $phone_code == '+772246') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баршатас';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Батамшинский';
                } elseif ( $phone_code == '+772635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бауыржан Момышулы';
                } elseif ( $phone_code == '+771840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баянаул';
                } elseif ( $phone_code == '+772932') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бейнеу';
                } elseif ( $phone_code == '+772531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксукент';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бишкуль';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Благовещенка';
                } elseif ( $phone_code == '+772338') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бозанбай';
                } elseif ( $phone_code == '+772341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Большенарымское';
                } elseif ( $phone_code == '+771630') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровое';
                } elseif ( $phone_code == '+771443') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровское';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бородулихинский район';
                } elseif ( $phone_code == '+771531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Булаево';
                } elseif ( $phone_code == '+771233') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ганюшкино';
                } elseif ( $phone_code == '+772347') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Калбатау';
                } elseif ( $phone_code == '+772331') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Глубокое';
                } elseif ( $phone_code == '+771131') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Дарьинское';
                } elseif ( $phone_code == '+771434') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Денисовка';
                } elseif ( $phone_code == '+771648') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Державинск';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джанибек';
                } elseif ( $phone_code == '+771134') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жымпиты';
                } elseif ( $phone_code == '+771141') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джангала';
                } elseif ( $phone_code == '+772147') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыбулак';
                } elseif ( $phone_code == '+771642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыколь';
                } elseif ( $phone_code == '+771633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ерейментау';
                } elseif ( $phone_code == '+772775') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есик';
                } elseif ( $phone_code == '+771647') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есиль';
                } elseif ( $phone_code == '+771040' || $phone_code == '+771043') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жайрем';
                } elseif ( $phone_code == '+771635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаксы';
                } elseif ( $phone_code == '+72431') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жалагаш';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Фурманово';
                } elseif ( $phone_code == '+772435') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанакорган';
                } elseif ( $phone_code == '+772934') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанаозен';
                } elseif ( $phone_code == '+772634') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанатас';
                } elseif ( $phone_code == '+772832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жансугуров';
                } elseif ( $phone_code == '+772831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаркент';
                } elseif ( $phone_code == '+771034') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезды';
                } elseif ( $phone_code_6 == '+77102') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезказган';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезкент';
                } elseif ( $phone_code == '+771831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Железинка';
                } elseif ( $phone_code == '+772534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жетысай';
                } elseif ( $phone_code == '+771435') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Житикара';
                } elseif ( $phone_code == '+772437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жосалы';
                } elseif ( $phone_code == '+772340') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зайсан';
                } elseif ( $phone_code == '+771455') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Затобольск';
                } elseif ( $phone_code == '+771632') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зеренда';
                } elseif ( $phone_code == '+772335') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зыряновск';
                } elseif ( $phone_code == '+771234') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Индерборский';
                } elseif ( $phone_code == '+771832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Иртышск';
                } elseif ( $phone_code == '+772837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кабанбай';
                } elseif ( $phone_code == '+771144') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казталовка';
                } elseif ( $phone_code == '+772539') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казыгурт';
                } elseif ( $phone_code == '+771437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Камысты';
                } elseif ( $phone_code == '+771333') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кандыагаш';
                } elseif ( $phone_code == '+772841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капал';
                } elseif ( $phone_code == '+772772') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капшагай';
                } elseif ( $phone_code == '+771441') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабалык';
                } elseif ( $phone_code == '+772836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабулак';
                } elseif ( $phone_code_6 == '+77212') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караганда';
                } elseif ( $phone_code == '+771032') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каражал';
                } elseif ( $phone_code == '+771454') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караменды';
                } elseif ( $phone_code == '+771452') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карасу';
                } elseif ( $phone_code == '+772644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратау';
                } elseif ( $phone_code == '+771145') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратобе';
                } elseif ( $phone_code == '+772252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караул';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каргалинское';
                } elseif ( $phone_code == '+772146') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каркаралинск';
                } elseif ( $phone_code == '+772771') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каскелен';
                } elseif ( $phone_code == '+772342') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Катон-Карагай';
                } elseif ( $phone_code == '+771456') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'п. Качар';
                } elseif ( $phone_code == '+771833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кашыр';
                } elseif ( $phone_code == '+772777') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кеген';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Келлеровка';
                } elseif ( $phone_code == '+772536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кентау';
                } elseif ( $phone_code == '+772144') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Киевка';
                } elseif ( $phone_code == '+771542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кишкеноколь';
                } elseif ( $phone_code == '+772842') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кугалы';
                } elseif ( $phone_code == '+772348') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокпекты';
                } elseif ( $phone_code == '+771838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кок-Тюбе';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокшетау';
                } elseif ( $phone_code == '+771637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Коргалжын';
                } elseif ( $phone_code == '+772636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Корнеевка';
                } elseif ( $phone_code_6 == '+77142') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Костанай';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Красный Яр';
                } elseif ( $phone_code == '+772631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кулан';
                } elseif ( $phone_code == '+771237') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кульсары';
                } elseif ( $phone_code == '+772251') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчатов';
                } elseif ( $phone_code == '+772339') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчум';
                } elseif ( $phone_code == '+772937') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курык';
                } elseif ( $phone_code_6 == '+77242' || $phone_code == '+772422') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кызылорда';
                } elseif ( $phone_code == '+772547') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленгер';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленинградское';
                } elseif ( $phone_code == '+772843') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лепсы';
                } elseif ( $phone_code == '+771433') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лисаковск';
                } elseif ( $phone_code == '+772239') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Маканчи';
                } elseif ( $phone_code == '+771239') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макат';
                } elseif ( $phone_code == '+771646') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макинск';
                } elseif ( $phone_code == '+771541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мамлютка';
                } elseif ( $phone_code == '+771331') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мартук';
                } elseif ( $phone_code == '+771236') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Махамбет';
                } elseif ( $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мерке';
                } elseif ( $phone_code == '+771238') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Миялы';
                } elseif ( $phone_code == '+772642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мойынкум';
                } elseif ( $phone_code == '+772148') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Молодежный';
                } elseif ( $phone_code == '+772541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мырзакент';
                } elseif ( $phone_code == '+772779') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нарынкол';
                } elseif ( $phone_code == '+772353') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новая Шульба';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новоишимское';
                } elseif ( $phone_code == '+771448') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Октябрьское';
                } elseif ( $phone_code == '+772149') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Осакаровка';
                } elseif ( $phone_code == '+772752') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Отеген-Батыр';
                } elseif ( $phone_code_6 == '+77182') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Павлодар';
                } elseif ( $phone_code == '+771130') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Переметное';
                } elseif ( $phone_code_6 == '+77152') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Петропавловск';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Пресновка';
                } elseif ( $phone_code == '+771039') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Приозёрск';
                } elseif ( $phone_code == '+772336') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Риддер';
                } elseif ( $phone_code == '+771431') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рудный';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рузаевка';
                } elseif ( $phone_code == '+771140') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сайхин';
                } elseif ( $phone_code == '+772333') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Самарское';
                } elseif ( $phone_code == '+772137') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарань';
                } elseif ( $phone_code == '+772839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарканд';
                } elseif ( $phone_code == '+772537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыагаш';
                } elseif ( $phone_code == '+772637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сары Кемер';
                } elseif ( $phone_code == '+771451') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыколь';
                } elseif ( $phone_code == '+772840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыозек';
                } elseif ( $phone_code == '+771063') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сатпаев';
                } elseif ( $phone_code == '+772639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саудакент';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саумалколь';
                } elseif ( $phone_code_6 == '+77222') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Семей';
                } elseif ( $phone_code == '+771534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сергеевка';
                } elseif ( $phone_code == '+772337') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Серебрянск';
                } elseif ( $phone_code == '+771532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Смирново';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Соколовка';
                } elseif ( $phone_code == '+771645') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степногорск';
                } elseif ( $phone_code == '+771639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степняк';
                } elseif ( $phone_code == '+772334') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Таврическое';
                } elseif ( $phone_code == '+771142') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайпак';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайынша';
                } elseif ( $phone_code == '+772774') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талгар';
                } elseif ( $phone_code_6 == '+77282') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талдыкорган';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талшик';
                } elseif ( $phone_code_6 == '+77262' || $phone_code == '+772622') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тараз';
                } elseif ( $phone_code == '+771436') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тарановское';
                } elseif ( $phone_code == '+771139') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каменка';
                } elseif ( $phone_code == '+772835') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Текели';
                } elseif ( $phone_code == '+772530') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темирлан';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темиртау';
                } elseif ( $phone_code == '+771230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тенгиз';
                } elseif ( $phone_code == '+772343') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теректы';
                } elseif ( $phone_code == '+772436') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теренозек';
                } elseif ( $phone_code == '+771537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тимирязево';
                } elseif ( $phone_code == '+72138') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'им. Габидена Мустафина';
                } elseif ( $phone_code == '+772638') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Толе би';
                } elseif ( $phone_code == '+772153') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Топар';
                } elseif ( $phone_code == '+771439') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тургай';
                } elseif ( $phone_code == '+772538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Турара Рыскулова';
                } elseif ( $phone_code == '+772533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Туркестан';
                } elseif ( $phone_code == '+771445') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Убаган';
                } elseif ( $phone_code == '+771444') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узунколь';
                } elseif ( $phone_code == '+772770') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узынагаш';
                } elseif ( $phone_code == '+771035') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Улытау';
                } elseif ( $phone_code == '+772154') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ботакара';
                } elseif ( $phone_code_6 == '+77112') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уральск';
                } elseif ( $phone_code == '+772230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уржар';
                } elseif ( $phone_code == '+771834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Успенка';
                } elseif ( $phone_code_6 == '+77232') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Усть-Каменогорск';
                } elseif ( $phone_code == '+772833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ушарал';
                } elseif ( $phone_code == '+772834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уштобе';
                } elseif ( $phone_code == '+771132' || $phone_code == '+771442') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Федоровка';
                } elseif ( $phone_code == '+772938') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Форт-Шевченко';
                } elseif ( $phone_code == '+771341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771336') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Хромтау';
                } elseif ( $phone_code == '+771136') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чапай';
                } elseif ( $phone_code == '+772776') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шелек';
                } elseif ( $phone_code == '+771137') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чингирлау';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чистополье';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чкалово';
                } elseif ( $phone_code == '+772778') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чунджа';
                } elseif ( $phone_code == '+771355') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шалкар';
                } elseif ( $phone_code == '+772345') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чарск';
                } elseif ( $phone_code == '+771836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щарбакты';
                } elseif ( $phone_code == '+772535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шардара';
                } elseif ( $phone_code == '+772544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаульдер';
                } elseif ( $phone_code == '+772156') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шахтинск';
                } elseif ( $phone_code == '+771038') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шашубай';
                } elseif ( $phone_code == '+772548') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаян';
                } elseif ( $phone_code == '+772332') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шемонаиха';
                } elseif ( $phone_code == '+772931') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шетпе';
                } elseif ( $phone_code == '+772432') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шиели';
                } elseif ( $phone_code == '+772546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чулаккурган';
                } elseif ( $phone_code == '+771631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шортанды';
                } elseif ( $phone_code == '+772643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шу';
                } elseif ( $phone_code == '+771346') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шубаркудук';
                } elseif ( $phone_code == '+772257') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шульбинск';
                } elseif ( $phone_code_6 == '+77252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шымкент';
                } elseif ( $phone_code == '+771636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щучинск';
                } elseif ( $phone_code_6 == '+77187') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Экибастуз';
                } elseif ( $phone_code == '+771334') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Эмба';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Явленка';
                } else {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                }
                $img = '<img src="img/kz.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out,$country]);
            } else{
                
                $phone_pref = substr($phone, 0, 1);
                $img = '<img src="img/ru.png" style="width: 20px; height: 20px">';
                if($phone_pref === '+'){
                        $phone_def_2_3 = substr($phone, 2, 3);
                        $phone_num = substr($phone, 5, 7);

                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_2_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    $operator = $valueData['org'];
                                    
                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }

                }  elseif($phone_pref === '8' || $phone_pref === '7') {
                        $phone_def_1_3 = substr($phone, 1, 3);
                        $phone_num = substr($phone, 4, 7);
                        
                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_1_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }
                }
                
            }
            
        }
        elseif(!empty($result['result'][0]['CONTACT_ID']))
        {
            $result = Test::call(
                'crm.contact.list',
                [
                    'filter' => ['ID' => intVal($result['result'][0]['CONTACT_ID'])],
                    'select' => ['ID', 'PHONE']
                ]
            );
            
            $phone = trim($result['result'][0]['PHONE'][0]['VALUE']);
            $phone_def = substr($phone, 0, 4);
            $phone_def_2 = substr($phone, 0, 2);
            $phone_def_3 = substr($phone, 0, 3);
            $phone_code = substr($phone, 0, 7);
            $phone_code_6 = substr($phone, 0, 6);
            $phone_code_5 = substr($phone, 0, 5);
            $phone_code_4 = substr($phone, 0, 4);
            if($phone_def == '+375' || $phone_def_2 == '80'){
                date_default_timezone_set("Europe/Minsk");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Беларусь';

                if($phone_code == '+375291' || $phone_code == '+375293' || $phone_code == '+375296' || $phone_code == '+375299' || $phone_code_6 == '+37544' || $phone_code_5 == '80291' || $phone_code_5 == '80293' || $phone_code_5 == '80296' || $phone_code_5 == '80299' || $phone_code_4 == '8044'){
                    $operator = '«А1»';
                } elseif($phone_code == '+375292' || $phone_code == '+375295' || $phone_code == '+375297' || $phone_code == '+375298' || $phone_code_6 == '+37533' || $phone_code_5 == '80292' || $phone_code_5 == '80295' || $phone_code_5 == '80297' || $phone_code_5 == '80298' || $phone_code_4 == '8033'){
                    $operator = 'МТС';
                } elseif($phone_code_5 == '+37525' || $phone_code_4 == '8025'){
                    $operator = 'Lifecell';
                }  elseif($phone_code_5 == '+37524' || $phone_code_4 == '8024'){
                    $operator = 'Белтелеком (Максифон)';
                } else{
                    $operator = 'Оператор не установлен';
                }

                $img = '<img src="img/blr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def == '+380'){
                date_default_timezone_set("Europe/Kiev");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Украина';
                if($phone_code_6 == '+38039' || $phone_code_6 == '+38067' || $phone_code_6 == '+38068' || $phone_code_6 == '+38096' || $phone_code_6 == '+38097' || $phone_code_6 == '+38098'){
                    $operator = 'Киевстар';
                } elseif($phone_code_6 == '+38050' || $phone_code_6 == '+38066' || $phone_code_6 == '+38095' || $phone_code_6 == '+38099'){
                    $operator = 'Vodafone (ПАО "Мобильные ТелеСистемы")';
                } elseif($phone_code_6 == '+38063' || $phone_code_6 == '+38093'){
                    $operator = 'Lifecell';
                } elseif($phone_code_6 == '+38091'){
                    $operator = 'ТриМоб (Utel Украина)';
                } elseif($phone_code_6 == '+38092'){
                    $operator = 'PEOPLEnet Украина';
                } elseif($phone_code_6 == '+38094'){
                    $operator = 'Интертелеком Украина';
                } else{
                    $operator = 'Оператор не установлен';
                }
                $img = '<img src="img/ukr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def_3 == '+77'|| $phone_def_2 == '77'){
                $test = '<br>';
                $country = 'Казахстан';

                if($phone_code == '+772131' || $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Абай';
                } elseif ( $phone_code == '+771033') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Агадырь';
                } elseif ( $phone_code == '+772438') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Айтеке-Би';
                } elseif ( $phone_code == '+771143') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжаик';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжал';
                } elseif ( $phone_code == '+772344') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжар';
                } elseif ( $phone_code == '+771638' || $phone_code == '+772641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акколь';
                } elseif ( $phone_code == '+771839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акку';
                } elseif ( $phone_code == '+771231') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аккыстау';
                } elseif ( $phone_code == '+771133') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксай';
                } elseif ( $phone_code == '+771837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу';
                } elseif ( $phone_code == '+771031') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу-Аюлы';
                } elseif ( $phone_code == '+772346') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксуат';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актас';
                } elseif ( $phone_code_6 == '+77213' || $phone_code_6 == '+77292') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актау';
                } elseif ( $phone_code_6 == '+77132') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актобе';
                } elseif ( $phone_code == '+771037' || $phone_code == '+771841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актогай';
                } elseif ( $phone_code == '+772757') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акший';
                } elseif ( $phone_code == '+771337') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алга';
                } elseif ( $phone_code_6 == '+77272') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алматы';
                } elseif ( $phone_code == '+771440') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Амангельды';
                } elseif ( $phone_code == '+772433') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аральск';
                } elseif ( $phone_code == '+771430') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аркалык';
                } elseif ( $phone_code == '+771644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аршалы';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арыкбалык';
                } elseif ( $phone_code == '+772540') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арысь';
                } elseif ( $phone_code == '+772633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аса';
                } elseif ( $phone_code_6 == '+77172') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нур-Султан';
                } elseif ( $phone_code == '+771641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Астраханка';
                } elseif ( $phone_code == '+772542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Асык Ата';
                } elseif ( $phone_code == '+771030') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атасу';
                } elseif ( $phone_code == '+771643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атбасар';
                } elseif ( $phone_code_6 == '+77122') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атырау';
                } elseif ( $phone_code == '+771453') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аулиеколь';
                } elseif ( $phone_code == '+772237') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аягоз';
                } elseif ( $phone_code == '+772236') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бескарагай';
                } elseif ( $phone_code == '+771345') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байганин';
                } elseif ( $phone_code == '+733622') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байконур';
                } elseif ( $phone_code == '+772773') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баканас';
                } elseif ( $phone_code == '+771640') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балкашино';
                } elseif ( $phone_code == '+772838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балпык';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балхаш';
                } elseif ( $phone_code == '+772246') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баршатас';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Батамшинский';
                } elseif ( $phone_code == '+772635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бауыржан Момышулы';
                } elseif ( $phone_code == '+771840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баянаул';
                } elseif ( $phone_code == '+772932') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бейнеу';
                } elseif ( $phone_code == '+772531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксукент';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бишкуль';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Благовещенка';
                } elseif ( $phone_code == '+772338') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бозанбай';
                } elseif ( $phone_code == '+772341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Большенарымское';
                } elseif ( $phone_code == '+771630') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровое';
                } elseif ( $phone_code == '+771443') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровское';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бородулихинский район';
                } elseif ( $phone_code == '+771531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Булаево';
                } elseif ( $phone_code == '+771233') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ганюшкино';
                } elseif ( $phone_code == '+772347') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Калбатау';
                } elseif ( $phone_code == '+772331') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Глубокое';
                } elseif ( $phone_code == '+771131') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Дарьинское';
                } elseif ( $phone_code == '+771434') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Денисовка';
                } elseif ( $phone_code == '+771648') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Державинск';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джанибек';
                } elseif ( $phone_code == '+771134') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жымпиты';
                } elseif ( $phone_code == '+771141') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джангала';
                } elseif ( $phone_code == '+772147') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыбулак';
                } elseif ( $phone_code == '+771642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыколь';
                } elseif ( $phone_code == '+771633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ерейментау';
                } elseif ( $phone_code == '+772775') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есик';
                } elseif ( $phone_code == '+771647') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есиль';
                } elseif ( $phone_code == '+771040' || $phone_code == '+771043') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жайрем';
                } elseif ( $phone_code == '+771635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаксы';
                } elseif ( $phone_code == '+72431') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жалагаш';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Фурманово';
                } elseif ( $phone_code == '+772435') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанакорган';
                } elseif ( $phone_code == '+772934') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанаозен';
                } elseif ( $phone_code == '+772634') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанатас';
                } elseif ( $phone_code == '+772832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жансугуров';
                } elseif ( $phone_code == '+772831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаркент';
                } elseif ( $phone_code == '+771034') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезды';
                } elseif ( $phone_code_6 == '+77102') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезказган';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезкент';
                } elseif ( $phone_code == '+771831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Железинка';
                } elseif ( $phone_code == '+772534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жетысай';
                } elseif ( $phone_code == '+771435') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Житикара';
                } elseif ( $phone_code == '+772437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жосалы';
                } elseif ( $phone_code == '+772340') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зайсан';
                } elseif ( $phone_code == '+771455') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Затобольск';
                } elseif ( $phone_code == '+771632') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зеренда';
                } elseif ( $phone_code == '+772335') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зыряновск';
                } elseif ( $phone_code == '+771234') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Индерборский';
                } elseif ( $phone_code == '+771832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Иртышск';
                } elseif ( $phone_code == '+772837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кабанбай';
                } elseif ( $phone_code == '+771144') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казталовка';
                } elseif ( $phone_code == '+772539') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казыгурт';
                } elseif ( $phone_code == '+771437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Камысты';
                } elseif ( $phone_code == '+771333') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кандыагаш';
                } elseif ( $phone_code == '+772841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капал';
                } elseif ( $phone_code == '+772772') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капшагай';
                } elseif ( $phone_code == '+771441') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабалык';
                } elseif ( $phone_code == '+772836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабулак';
                } elseif ( $phone_code_6 == '+77212') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караганда';
                } elseif ( $phone_code == '+771032') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каражал';
                } elseif ( $phone_code == '+771454') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караменды';
                } elseif ( $phone_code == '+771452') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карасу';
                } elseif ( $phone_code == '+772644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратау';
                } elseif ( $phone_code == '+771145') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратобе';
                } elseif ( $phone_code == '+772252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караул';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каргалинское';
                } elseif ( $phone_code == '+772146') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каркаралинск';
                } elseif ( $phone_code == '+772771') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каскелен';
                } elseif ( $phone_code == '+772342') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Катон-Карагай';
                } elseif ( $phone_code == '+771456') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'п. Качар';
                } elseif ( $phone_code == '+771833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кашыр';
                } elseif ( $phone_code == '+772777') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кеген';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Келлеровка';
                } elseif ( $phone_code == '+772536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кентау';
                } elseif ( $phone_code == '+772144') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Киевка';
                } elseif ( $phone_code == '+771542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кишкеноколь';
                } elseif ( $phone_code == '+772842') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кугалы';
                } elseif ( $phone_code == '+772348') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокпекты';
                } elseif ( $phone_code == '+771838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кок-Тюбе';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокшетау';
                } elseif ( $phone_code == '+771637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Коргалжын';
                } elseif ( $phone_code == '+772636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Корнеевка';
                } elseif ( $phone_code_6 == '+77142') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Костанай';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Красный Яр';
                } elseif ( $phone_code == '+772631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кулан';
                } elseif ( $phone_code == '+771237') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кульсары';
                } elseif ( $phone_code == '+772251') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчатов';
                } elseif ( $phone_code == '+772339') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчум';
                } elseif ( $phone_code == '+772937') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курык';
                } elseif ( $phone_code_6 == '+77242' || $phone_code == '+772422') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кызылорда';
                } elseif ( $phone_code == '+772547') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленгер';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленинградское';
                } elseif ( $phone_code == '+772843') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лепсы';
                } elseif ( $phone_code == '+771433') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лисаковск';
                } elseif ( $phone_code == '+772239') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Маканчи';
                } elseif ( $phone_code == '+771239') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макат';
                } elseif ( $phone_code == '+771646') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макинск';
                } elseif ( $phone_code == '+771541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мамлютка';
                } elseif ( $phone_code == '+771331') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мартук';
                } elseif ( $phone_code == '+771236') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Махамбет';
                } elseif ( $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мерке';
                } elseif ( $phone_code == '+771238') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Миялы';
                } elseif ( $phone_code == '+772642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мойынкум';
                } elseif ( $phone_code == '+772148') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Молодежный';
                } elseif ( $phone_code == '+772541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мырзакент';
                } elseif ( $phone_code == '+772779') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нарынкол';
                } elseif ( $phone_code == '+772353') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новая Шульба';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новоишимское';
                } elseif ( $phone_code == '+771448') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Октябрьское';
                } elseif ( $phone_code == '+772149') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Осакаровка';
                } elseif ( $phone_code == '+772752') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Отеген-Батыр';
                } elseif ( $phone_code_6 == '+77182') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Павлодар';
                } elseif ( $phone_code == '+771130') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Переметное';
                } elseif ( $phone_code_6 == '+77152') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Петропавловск';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Пресновка';
                } elseif ( $phone_code == '+771039') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Приозёрск';
                } elseif ( $phone_code == '+772336') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Риддер';
                } elseif ( $phone_code == '+771431') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рудный';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рузаевка';
                } elseif ( $phone_code == '+771140') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сайхин';
                } elseif ( $phone_code == '+772333') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Самарское';
                } elseif ( $phone_code == '+772137') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарань';
                } elseif ( $phone_code == '+772839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарканд';
                } elseif ( $phone_code == '+772537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыагаш';
                } elseif ( $phone_code == '+772637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сары Кемер';
                } elseif ( $phone_code == '+771451') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыколь';
                } elseif ( $phone_code == '+772840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыозек';
                } elseif ( $phone_code == '+771063') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сатпаев';
                } elseif ( $phone_code == '+772639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саудакент';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саумалколь';
                } elseif ( $phone_code_6 == '+77222') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Семей';
                } elseif ( $phone_code == '+771534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сергеевка';
                } elseif ( $phone_code == '+772337') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Серебрянск';
                } elseif ( $phone_code == '+771532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Смирново';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Соколовка';
                } elseif ( $phone_code == '+771645') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степногорск';
                } elseif ( $phone_code == '+771639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степняк';
                } elseif ( $phone_code == '+772334') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Таврическое';
                } elseif ( $phone_code == '+771142') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайпак';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайынша';
                } elseif ( $phone_code == '+772774') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талгар';
                } elseif ( $phone_code_6 == '+77282') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талдыкорган';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талшик';
                } elseif ( $phone_code_6 == '+77262' || $phone_code == '+772622') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тараз';
                } elseif ( $phone_code == '+771436') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тарановское';
                } elseif ( $phone_code == '+771139') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каменка';
                } elseif ( $phone_code == '+772835') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Текели';
                } elseif ( $phone_code == '+772530') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темирлан';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темиртау';
                } elseif ( $phone_code == '+771230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тенгиз';
                } elseif ( $phone_code == '+772343') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теректы';
                } elseif ( $phone_code == '+772436') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теренозек';
                } elseif ( $phone_code == '+771537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тимирязево';
                } elseif ( $phone_code == '+72138') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'им. Габидена Мустафина';
                } elseif ( $phone_code == '+772638') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Толе би';
                } elseif ( $phone_code == '+772153') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Топар';
                } elseif ( $phone_code == '+771439') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тургай';
                } elseif ( $phone_code == '+772538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Турара Рыскулова';
                } elseif ( $phone_code == '+772533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Туркестан';
                } elseif ( $phone_code == '+771445') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Убаган';
                } elseif ( $phone_code == '+771444') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узунколь';
                } elseif ( $phone_code == '+772770') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узынагаш';
                } elseif ( $phone_code == '+771035') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Улытау';
                } elseif ( $phone_code == '+772154') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ботакара';
                } elseif ( $phone_code_6 == '+77112') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уральск';
                } elseif ( $phone_code == '+772230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уржар';
                } elseif ( $phone_code == '+771834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Успенка';
                } elseif ( $phone_code_6 == '+77232') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Усть-Каменогорск';
                } elseif ( $phone_code == '+772833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ушарал';
                } elseif ( $phone_code == '+772834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уштобе';
                } elseif ( $phone_code == '+771132' || $phone_code == '+771442') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Федоровка';
                } elseif ( $phone_code == '+772938') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Форт-Шевченко';
                } elseif ( $phone_code == '+771341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771336') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Хромтау';
                } elseif ( $phone_code == '+771136') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чапай';
                } elseif ( $phone_code == '+772776') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шелек';
                } elseif ( $phone_code == '+771137') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чингирлау';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чистополье';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чкалово';
                } elseif ( $phone_code == '+772778') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чунджа';
                } elseif ( $phone_code == '+771355') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шалкар';
                } elseif ( $phone_code == '+772345') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чарск';
                } elseif ( $phone_code == '+771836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щарбакты';
                } elseif ( $phone_code == '+772535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шардара';
                } elseif ( $phone_code == '+772544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаульдер';
                } elseif ( $phone_code == '+772156') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шахтинск';
                } elseif ( $phone_code == '+771038') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шашубай';
                } elseif ( $phone_code == '+772548') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаян';
                } elseif ( $phone_code == '+772332') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шемонаиха';
                } elseif ( $phone_code == '+772931') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шетпе';
                } elseif ( $phone_code == '+772432') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шиели';
                } elseif ( $phone_code == '+772546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чулаккурган';
                } elseif ( $phone_code == '+771631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шортанды';
                } elseif ( $phone_code == '+772643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шу';
                } elseif ( $phone_code == '+771346') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шубаркудук';
                } elseif ( $phone_code == '+772257') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шульбинск';
                } elseif ( $phone_code_6 == '+77252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шымкент';
                } elseif ( $phone_code == '+771636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щучинск';
                } elseif ( $phone_code_6 == '+77187') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Экибастуз';
                } elseif ( $phone_code == '+771334') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Эмба';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Явленка';
                } else {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                }
                $img = '<img src="img/kz.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out,$country]);
            } else{
                
                $phone_pref = substr($phone, 0, 1);
                $img = '<img src="img/ru.png" style="width: 20px; height: 20px">';
                if($phone_pref === '+'){
                        $phone_def_2_3 = substr($phone, 2, 3);
                        $phone_num = substr($phone, 5, 7);

                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_2_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    $operator = $valueData['org'];
                                    
                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }

                }  elseif($phone_pref === '8' || $phone_pref === '7') {
                        $phone_def_1_3 = substr($phone, 1, 3);
                        $phone_num = substr($phone, 4, 7);
                        
                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_1_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }
                }
                
            }
            
        } elseif (!empty($result['result'][0]['COMPANY_ID'])){
            $result = Test::call(
                'crm.company.list',
                [
                    'filter' => ['ID' => intVal($result['result'][0]['COMPANY_ID'])],
                    'select' => ['ID', 'PHONE']
                ]
            );
            
            $phone = trim($result['result'][0]['PHONE'][0]['VALUE']);
            $phone_def = substr($phone, 0, 4);
            $phone_def_2 = substr($phone, 0, 2);
            $phone_def_3 = substr($phone, 0, 3);
            $phone_code = substr($phone, 0, 7);
            $phone_code_6 = substr($phone, 0, 6);
            $phone_code_5 = substr($phone, 0, 5);
            $phone_code_4 = substr($phone, 0, 4);
            if($phone_def == '+375' || $phone_def_2 == '80'){
                date_default_timezone_set("Europe/Minsk");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Беларусь';

                if($phone_code == '+375291' || $phone_code == '+375293' || $phone_code == '+375296' || $phone_code == '+375299' || $phone_code_6 == '+37544' || $phone_code_5 == '80291' || $phone_code_5 == '80293' || $phone_code_5 == '80296' || $phone_code_5 == '80299' || $phone_code_4 == '8044'){
                    $operator = '«А1»';
                } elseif($phone_code == '+375292' || $phone_code == '+375295' || $phone_code == '+375297' || $phone_code == '+375298' || $phone_code_6 == '+37533' || $phone_code_5 == '80292' || $phone_code_5 == '80295' || $phone_code_5 == '80297' || $phone_code_5 == '80298' || $phone_code_4 == '8033'){
                    $operator = 'МТС';
                } elseif($phone_code_5 == '+37525' || $phone_code_4 == '8025'){
                    $operator = 'Lifecell';
                }  elseif($phone_code_5 == '+37524' || $phone_code_4 == '8024'){
                    $operator = 'Белтелеком (Максифон)';
                } else{
                    $operator = 'Оператор не установлен';
                }

                $img = '<img src="img/blr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def == '+380'){
                date_default_timezone_set("Europe/Kiev");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Украина';
                if($phone_code_6 == '+38039' || $phone_code_6 == '+38067' || $phone_code_6 == '+38068' || $phone_code_6 == '+38096' || $phone_code_6 == '+38097' || $phone_code_6 == '+38098'){
                    $operator = 'Киевстар';
                } elseif($phone_code_6 == '+38050' || $phone_code_6 == '+38066' || $phone_code_6 == '+38095' || $phone_code_6 == '+38099'){
                    $operator = 'Vodafone (ПАО "Мобильные ТелеСистемы")';
                } elseif($phone_code_6 == '+38063' || $phone_code_6 == '+38093'){
                    $operator = 'Lifecell';
                } elseif($phone_code_6 == '+38091'){
                    $operator = 'ТриМоб (Utel Украина)';
                } elseif($phone_code_6 == '+38092'){
                    $operator = 'PEOPLEnet Украина';
                } elseif($phone_code_6 == '+38094'){
                    $operator = 'Интертелеком Украина';
                } else{
                    $operator = 'Оператор не установлен';
                }
                $img = '<img src="img/ukr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def_3 == '+77'|| $phone_def_2 == '77'){
                $test = '<br>';
                $country = 'Казахстан';

                if($phone_code == '+772131' || $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Абай';
                } elseif ( $phone_code == '+771033') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Агадырь';
                } elseif ( $phone_code == '+772438') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Айтеке-Би';
                } elseif ( $phone_code == '+771143') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжаик';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжал';
                } elseif ( $phone_code == '+772344') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжар';
                } elseif ( $phone_code == '+771638' || $phone_code == '+772641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акколь';
                } elseif ( $phone_code == '+771839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акку';
                } elseif ( $phone_code == '+771231') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аккыстау';
                } elseif ( $phone_code == '+771133') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксай';
                } elseif ( $phone_code == '+771837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу';
                } elseif ( $phone_code == '+771031') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу-Аюлы';
                } elseif ( $phone_code == '+772346') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксуат';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актас';
                } elseif ( $phone_code_6 == '+77213' || $phone_code_6 == '+77292') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актау';
                } elseif ( $phone_code_6 == '+77132') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актобе';
                } elseif ( $phone_code == '+771037' || $phone_code == '+771841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актогай';
                } elseif ( $phone_code == '+772757') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акший';
                } elseif ( $phone_code == '+771337') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алга';
                } elseif ( $phone_code_6 == '+77272') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алматы';
                } elseif ( $phone_code == '+771440') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Амангельды';
                } elseif ( $phone_code == '+772433') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аральск';
                } elseif ( $phone_code == '+771430') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аркалык';
                } elseif ( $phone_code == '+771644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аршалы';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арыкбалык';
                } elseif ( $phone_code == '+772540') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арысь';
                } elseif ( $phone_code == '+772633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аса';
                } elseif ( $phone_code_6 == '+77172') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нур-Султан';
                } elseif ( $phone_code == '+771641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Астраханка';
                } elseif ( $phone_code == '+772542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Асык Ата';
                } elseif ( $phone_code == '+771030') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атасу';
                } elseif ( $phone_code == '+771643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атбасар';
                } elseif ( $phone_code_6 == '+77122') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атырау';
                } elseif ( $phone_code == '+771453') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аулиеколь';
                } elseif ( $phone_code == '+772237') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аягоз';
                } elseif ( $phone_code == '+772236') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бескарагай';
                } elseif ( $phone_code == '+771345') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байганин';
                } elseif ( $phone_code == '+733622') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байконур';
                } elseif ( $phone_code == '+772773') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баканас';
                } elseif ( $phone_code == '+771640') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балкашино';
                } elseif ( $phone_code == '+772838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балпык';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балхаш';
                } elseif ( $phone_code == '+772246') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баршатас';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Батамшинский';
                } elseif ( $phone_code == '+772635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бауыржан Момышулы';
                } elseif ( $phone_code == '+771840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баянаул';
                } elseif ( $phone_code == '+772932') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бейнеу';
                } elseif ( $phone_code == '+772531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксукент';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бишкуль';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Благовещенка';
                } elseif ( $phone_code == '+772338') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бозанбай';
                } elseif ( $phone_code == '+772341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Большенарымское';
                } elseif ( $phone_code == '+771630') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровое';
                } elseif ( $phone_code == '+771443') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровское';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бородулихинский район';
                } elseif ( $phone_code == '+771531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Булаево';
                } elseif ( $phone_code == '+771233') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ганюшкино';
                } elseif ( $phone_code == '+772347') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Калбатау';
                } elseif ( $phone_code == '+772331') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Глубокое';
                } elseif ( $phone_code == '+771131') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Дарьинское';
                } elseif ( $phone_code == '+771434') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Денисовка';
                } elseif ( $phone_code == '+771648') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Державинск';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джанибек';
                } elseif ( $phone_code == '+771134') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жымпиты';
                } elseif ( $phone_code == '+771141') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джангала';
                } elseif ( $phone_code == '+772147') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыбулак';
                } elseif ( $phone_code == '+771642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыколь';
                } elseif ( $phone_code == '+771633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ерейментау';
                } elseif ( $phone_code == '+772775') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есик';
                } elseif ( $phone_code == '+771647') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есиль';
                } elseif ( $phone_code == '+771040' || $phone_code == '+771043') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жайрем';
                } elseif ( $phone_code == '+771635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаксы';
                } elseif ( $phone_code == '+72431') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жалагаш';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Фурманово';
                } elseif ( $phone_code == '+772435') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанакорган';
                } elseif ( $phone_code == '+772934') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанаозен';
                } elseif ( $phone_code == '+772634') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанатас';
                } elseif ( $phone_code == '+772832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жансугуров';
                } elseif ( $phone_code == '+772831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаркент';
                } elseif ( $phone_code == '+771034') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезды';
                } elseif ( $phone_code_6 == '+77102') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезказган';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезкент';
                } elseif ( $phone_code == '+771831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Железинка';
                } elseif ( $phone_code == '+772534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жетысай';
                } elseif ( $phone_code == '+771435') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Житикара';
                } elseif ( $phone_code == '+772437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жосалы';
                } elseif ( $phone_code == '+772340') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зайсан';
                } elseif ( $phone_code == '+771455') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Затобольск';
                } elseif ( $phone_code == '+771632') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зеренда';
                } elseif ( $phone_code == '+772335') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зыряновск';
                } elseif ( $phone_code == '+771234') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Индерборский';
                } elseif ( $phone_code == '+771832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Иртышск';
                } elseif ( $phone_code == '+772837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кабанбай';
                } elseif ( $phone_code == '+771144') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казталовка';
                } elseif ( $phone_code == '+772539') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казыгурт';
                } elseif ( $phone_code == '+771437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Камысты';
                } elseif ( $phone_code == '+771333') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кандыагаш';
                } elseif ( $phone_code == '+772841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капал';
                } elseif ( $phone_code == '+772772') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капшагай';
                } elseif ( $phone_code == '+771441') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабалык';
                } elseif ( $phone_code == '+772836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабулак';
                } elseif ( $phone_code_6 == '+77212') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караганда';
                } elseif ( $phone_code == '+771032') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каражал';
                } elseif ( $phone_code == '+771454') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караменды';
                } elseif ( $phone_code == '+771452') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карасу';
                } elseif ( $phone_code == '+772644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратау';
                } elseif ( $phone_code == '+771145') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратобе';
                } elseif ( $phone_code == '+772252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караул';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каргалинское';
                } elseif ( $phone_code == '+772146') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каркаралинск';
                } elseif ( $phone_code == '+772771') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каскелен';
                } elseif ( $phone_code == '+772342') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Катон-Карагай';
                } elseif ( $phone_code == '+771456') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'п. Качар';
                } elseif ( $phone_code == '+771833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кашыр';
                } elseif ( $phone_code == '+772777') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кеген';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Келлеровка';
                } elseif ( $phone_code == '+772536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кентау';
                } elseif ( $phone_code == '+772144') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Киевка';
                } elseif ( $phone_code == '+771542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кишкеноколь';
                } elseif ( $phone_code == '+772842') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кугалы';
                } elseif ( $phone_code == '+772348') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокпекты';
                } elseif ( $phone_code == '+771838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кок-Тюбе';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокшетау';
                } elseif ( $phone_code == '+771637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Коргалжын';
                } elseif ( $phone_code == '+772636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Корнеевка';
                } elseif ( $phone_code_6 == '+77142') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Костанай';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Красный Яр';
                } elseif ( $phone_code == '+772631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кулан';
                } elseif ( $phone_code == '+771237') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кульсары';
                } elseif ( $phone_code == '+772251') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчатов';
                } elseif ( $phone_code == '+772339') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчум';
                } elseif ( $phone_code == '+772937') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курык';
                } elseif ( $phone_code_6 == '+77242' || $phone_code == '+772422') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кызылорда';
                } elseif ( $phone_code == '+772547') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленгер';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленинградское';
                } elseif ( $phone_code == '+772843') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лепсы';
                } elseif ( $phone_code == '+771433') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лисаковск';
                } elseif ( $phone_code == '+772239') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Маканчи';
                } elseif ( $phone_code == '+771239') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макат';
                } elseif ( $phone_code == '+771646') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макинск';
                } elseif ( $phone_code == '+771541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мамлютка';
                } elseif ( $phone_code == '+771331') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мартук';
                } elseif ( $phone_code == '+771236') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Махамбет';
                } elseif ( $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мерке';
                } elseif ( $phone_code == '+771238') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Миялы';
                } elseif ( $phone_code == '+772642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мойынкум';
                } elseif ( $phone_code == '+772148') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Молодежный';
                } elseif ( $phone_code == '+772541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мырзакент';
                } elseif ( $phone_code == '+772779') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нарынкол';
                } elseif ( $phone_code == '+772353') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новая Шульба';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новоишимское';
                } elseif ( $phone_code == '+771448') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Октябрьское';
                } elseif ( $phone_code == '+772149') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Осакаровка';
                } elseif ( $phone_code == '+772752') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Отеген-Батыр';
                } elseif ( $phone_code_6 == '+77182') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Павлодар';
                } elseif ( $phone_code == '+771130') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Переметное';
                } elseif ( $phone_code_6 == '+77152') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Петропавловск';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Пресновка';
                } elseif ( $phone_code == '+771039') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Приозёрск';
                } elseif ( $phone_code == '+772336') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Риддер';
                } elseif ( $phone_code == '+771431') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рудный';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рузаевка';
                } elseif ( $phone_code == '+771140') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сайхин';
                } elseif ( $phone_code == '+772333') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Самарское';
                } elseif ( $phone_code == '+772137') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарань';
                } elseif ( $phone_code == '+772839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарканд';
                } elseif ( $phone_code == '+772537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыагаш';
                } elseif ( $phone_code == '+772637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сары Кемер';
                } elseif ( $phone_code == '+771451') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыколь';
                } elseif ( $phone_code == '+772840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыозек';
                } elseif ( $phone_code == '+771063') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сатпаев';
                } elseif ( $phone_code == '+772639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саудакент';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саумалколь';
                } elseif ( $phone_code_6 == '+77222') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Семей';
                } elseif ( $phone_code == '+771534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сергеевка';
                } elseif ( $phone_code == '+772337') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Серебрянск';
                } elseif ( $phone_code == '+771532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Смирново';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Соколовка';
                } elseif ( $phone_code == '+771645') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степногорск';
                } elseif ( $phone_code == '+771639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степняк';
                } elseif ( $phone_code == '+772334') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Таврическое';
                } elseif ( $phone_code == '+771142') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайпак';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайынша';
                } elseif ( $phone_code == '+772774') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талгар';
                } elseif ( $phone_code_6 == '+77282') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талдыкорган';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талшик';
                } elseif ( $phone_code_6 == '+77262' || $phone_code == '+772622') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тараз';
                } elseif ( $phone_code == '+771436') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тарановское';
                } elseif ( $phone_code == '+771139') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каменка';
                } elseif ( $phone_code == '+772835') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Текели';
                } elseif ( $phone_code == '+772530') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темирлан';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темиртау';
                } elseif ( $phone_code == '+771230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тенгиз';
                } elseif ( $phone_code == '+772343') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теректы';
                } elseif ( $phone_code == '+772436') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теренозек';
                } elseif ( $phone_code == '+771537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тимирязево';
                } elseif ( $phone_code == '+72138') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'им. Габидена Мустафина';
                } elseif ( $phone_code == '+772638') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Толе би';
                } elseif ( $phone_code == '+772153') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Топар';
                } elseif ( $phone_code == '+771439') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тургай';
                } elseif ( $phone_code == '+772538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Турара Рыскулова';
                } elseif ( $phone_code == '+772533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Туркестан';
                } elseif ( $phone_code == '+771445') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Убаган';
                } elseif ( $phone_code == '+771444') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узунколь';
                } elseif ( $phone_code == '+772770') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узынагаш';
                } elseif ( $phone_code == '+771035') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Улытау';
                } elseif ( $phone_code == '+772154') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ботакара';
                } elseif ( $phone_code_6 == '+77112') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уральск';
                } elseif ( $phone_code == '+772230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уржар';
                } elseif ( $phone_code == '+771834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Успенка';
                } elseif ( $phone_code_6 == '+77232') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Усть-Каменогорск';
                } elseif ( $phone_code == '+772833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ушарал';
                } elseif ( $phone_code == '+772834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уштобе';
                } elseif ( $phone_code == '+771132' || $phone_code == '+771442') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Федоровка';
                } elseif ( $phone_code == '+772938') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Форт-Шевченко';
                } elseif ( $phone_code == '+771341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771336') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Хромтау';
                } elseif ( $phone_code == '+771136') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чапай';
                } elseif ( $phone_code == '+772776') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шелек';
                } elseif ( $phone_code == '+771137') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чингирлау';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чистополье';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чкалово';
                } elseif ( $phone_code == '+772778') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чунджа';
                } elseif ( $phone_code == '+771355') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шалкар';
                } elseif ( $phone_code == '+772345') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чарск';
                } elseif ( $phone_code == '+771836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щарбакты';
                } elseif ( $phone_code == '+772535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шардара';
                } elseif ( $phone_code == '+772544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаульдер';
                } elseif ( $phone_code == '+772156') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шахтинск';
                } elseif ( $phone_code == '+771038') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шашубай';
                } elseif ( $phone_code == '+772548') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаян';
                } elseif ( $phone_code == '+772332') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шемонаиха';
                } elseif ( $phone_code == '+772931') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шетпе';
                } elseif ( $phone_code == '+772432') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шиели';
                } elseif ( $phone_code == '+772546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чулаккурган';
                } elseif ( $phone_code == '+771631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шортанды';
                } elseif ( $phone_code == '+772643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шу';
                } elseif ( $phone_code == '+771346') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шубаркудук';
                } elseif ( $phone_code == '+772257') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шульбинск';
                } elseif ( $phone_code_6 == '+77252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шымкент';
                } elseif ( $phone_code == '+771636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щучинск';
                } elseif ( $phone_code_6 == '+77187') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Экибастуз';
                } elseif ( $phone_code == '+771334') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Эмба';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Явленка';
                } else {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                }
                $img = '<img src="img/kz.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out,$country]);
            } else{
                
                $phone_pref = substr($phone, 0, 1);
                $img = '<img src="img/ru.png" style="width: 20px; height: 20px">';
                if($phone_pref === '+'){
                        $phone_def_2_3 = substr($phone, 2, 3);
                        $phone_num = substr($phone, 5, 7);

                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_2_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    $operator = $valueData['org'];
                                    
                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }

                }  elseif($phone_pref === '8' || $phone_pref === '7') {
                        $phone_def_1_3 = substr($phone, 1, 3);
                        $phone_num = substr($phone, 4, 7);
                        
                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_1_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }
                }
                
            }
            
        }
    } if ($placementOptions['CRM_ENTITY_TYPE'] == 'CONTACT' && $placementOptions['CRM_ENTITY_ID'] > 0)
    {
        $result = Test::call(
            'crm.contact.list',
            [
                'filter' => ['ID' => intVal($placementOptions['CRM_ENTITY_ID'])],
                'select' => ['ID', 'PHONE']
            ]
        );
        if (!empty($result['result'][0]['PHONE'][0]['VALUE']))
        {
            $phone = trim($result['result'][0]['PHONE'][0]['VALUE']);
            $phone_def = substr($phone, 0, 4);
            $phone_def_2 = substr($phone, 0, 2);
            $phone_def_3 = substr($phone, 0, 3);
            $phone_code = substr($phone, 0, 7);
            $phone_code_6 = substr($phone, 0, 6);
            $phone_code_5 = substr($phone, 0, 5);
            $phone_code_4 = substr($phone, 0, 4);
            if($phone_def == '+375' || $phone_def_2 == '80'){
                date_default_timezone_set("Europe/Minsk");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Беларусь';

                if($phone_code == '+375291' || $phone_code == '+375293' || $phone_code == '+375296' || $phone_code == '+375299' || $phone_code_6 == '+37544' || $phone_code_5 == '80291' || $phone_code_5 == '80293' || $phone_code_5 == '80296' || $phone_code_5 == '80299' || $phone_code_4 == '8044'){
                    $operator = '«А1»';
                } elseif($phone_code == '+375292' || $phone_code == '+375295' || $phone_code == '+375297' || $phone_code == '+375298' || $phone_code_6 == '+37533' || $phone_code_5 == '80292' || $phone_code_5 == '80295' || $phone_code_5 == '80297' || $phone_code_5 == '80298' || $phone_code_4 == '8033'){
                    $operator = 'МТС';
                } elseif($phone_code_5 == '+37525' || $phone_code_4 == '8025'){
                    $operator = 'Lifecell';
                }  elseif($phone_code_5 == '+37524' || $phone_code_4 == '8024'){
                    $operator = 'Белтелеком (Максифон)';
                } else{
                    $operator = 'Оператор не установлен';
                }

                $img = '<img src="img/blr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def == '+380'){
                date_default_timezone_set("Europe/Kiev");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Украина';
                if($phone_code_6 == '+38039' || $phone_code_6 == '+38067' || $phone_code_6 == '+38068' || $phone_code_6 == '+38096' || $phone_code_6 == '+38097' || $phone_code_6 == '+38098'){
                    $operator = 'Киевстар';
                } elseif($phone_code_6 == '+38050' || $phone_code_6 == '+38066' || $phone_code_6 == '+38095' || $phone_code_6 == '+38099'){
                    $operator = 'Vodafone (ПАО "Мобильные ТелеСистемы")';
                } elseif($phone_code_6 == '+38063' || $phone_code_6 == '+38093'){
                    $operator = 'Lifecell';
                } elseif($phone_code_6 == '+38091'){
                    $operator = 'ТриМоб (Utel Украина)';
                } elseif($phone_code_6 == '+38092'){
                    $operator = 'PEOPLEnet Украина';
                } elseif($phone_code_6 == '+38094'){
                    $operator = 'Интертелеком Украина';
                } else{
                    $operator = 'Оператор не установлен';
                }
                $img = '<img src="img/ukr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def_3 == '+77'|| $phone_def_2 == '77'){
                $test = '<br>';
                $country = 'Казахстан';

                if($phone_code == '+772131' || $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Абай';
                } elseif ( $phone_code == '+771033') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Агадырь';
                } elseif ( $phone_code == '+772438') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Айтеке-Би';
                } elseif ( $phone_code == '+771143') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжаик';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжал';
                } elseif ( $phone_code == '+772344') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжар';
                } elseif ( $phone_code == '+771638' || $phone_code == '+772641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акколь';
                } elseif ( $phone_code == '+771839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акку';
                } elseif ( $phone_code == '+771231') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аккыстау';
                } elseif ( $phone_code == '+771133') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксай';
                } elseif ( $phone_code == '+771837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу';
                } elseif ( $phone_code == '+771031') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу-Аюлы';
                } elseif ( $phone_code == '+772346') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксуат';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актас';
                } elseif ( $phone_code_6 == '+77213' || $phone_code_6 == '+77292') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актау';
                } elseif ( $phone_code_6 == '+77132') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актобе';
                } elseif ( $phone_code == '+771037' || $phone_code == '+771841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актогай';
                } elseif ( $phone_code == '+772757') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акший';
                } elseif ( $phone_code == '+771337') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алга';
                } elseif ( $phone_code_6 == '+77272') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алматы';
                } elseif ( $phone_code == '+771440') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Амангельды';
                } elseif ( $phone_code == '+772433') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аральск';
                } elseif ( $phone_code == '+771430') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аркалык';
                } elseif ( $phone_code == '+771644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аршалы';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арыкбалык';
                } elseif ( $phone_code == '+772540') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арысь';
                } elseif ( $phone_code == '+772633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аса';
                } elseif ( $phone_code_6 == '+77172') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нур-Султан';
                } elseif ( $phone_code == '+771641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Астраханка';
                } elseif ( $phone_code == '+772542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Асык Ата';
                } elseif ( $phone_code == '+771030') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атасу';
                } elseif ( $phone_code == '+771643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атбасар';
                } elseif ( $phone_code_6 == '+77122') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атырау';
                } elseif ( $phone_code == '+771453') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аулиеколь';
                } elseif ( $phone_code == '+772237') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аягоз';
                } elseif ( $phone_code == '+772236') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бескарагай';
                } elseif ( $phone_code == '+771345') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байганин';
                } elseif ( $phone_code == '+733622') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байконур';
                } elseif ( $phone_code == '+772773') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баканас';
                } elseif ( $phone_code == '+771640') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балкашино';
                } elseif ( $phone_code == '+772838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балпык';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балхаш';
                } elseif ( $phone_code == '+772246') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баршатас';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Батамшинский';
                } elseif ( $phone_code == '+772635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бауыржан Момышулы';
                } elseif ( $phone_code == '+771840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баянаул';
                } elseif ( $phone_code == '+772932') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бейнеу';
                } elseif ( $phone_code == '+772531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксукент';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бишкуль';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Благовещенка';
                } elseif ( $phone_code == '+772338') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бозанбай';
                } elseif ( $phone_code == '+772341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Большенарымское';
                } elseif ( $phone_code == '+771630') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровое';
                } elseif ( $phone_code == '+771443') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровское';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бородулихинский район';
                } elseif ( $phone_code == '+771531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Булаево';
                } elseif ( $phone_code == '+771233') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ганюшкино';
                } elseif ( $phone_code == '+772347') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Калбатау';
                } elseif ( $phone_code == '+772331') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Глубокое';
                } elseif ( $phone_code == '+771131') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Дарьинское';
                } elseif ( $phone_code == '+771434') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Денисовка';
                } elseif ( $phone_code == '+771648') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Державинск';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джанибек';
                } elseif ( $phone_code == '+771134') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жымпиты';
                } elseif ( $phone_code == '+771141') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джангала';
                } elseif ( $phone_code == '+772147') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыбулак';
                } elseif ( $phone_code == '+771642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыколь';
                } elseif ( $phone_code == '+771633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ерейментау';
                } elseif ( $phone_code == '+772775') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есик';
                } elseif ( $phone_code == '+771647') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есиль';
                } elseif ( $phone_code == '+771040' || $phone_code == '+771043') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жайрем';
                } elseif ( $phone_code == '+771635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаксы';
                } elseif ( $phone_code == '+72431') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жалагаш';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Фурманово';
                } elseif ( $phone_code == '+772435') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанакорган';
                } elseif ( $phone_code == '+772934') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанаозен';
                } elseif ( $phone_code == '+772634') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанатас';
                } elseif ( $phone_code == '+772832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жансугуров';
                } elseif ( $phone_code == '+772831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаркент';
                } elseif ( $phone_code == '+771034') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезды';
                } elseif ( $phone_code_6 == '+77102') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезказган';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезкент';
                } elseif ( $phone_code == '+771831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Железинка';
                } elseif ( $phone_code == '+772534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жетысай';
                } elseif ( $phone_code == '+771435') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Житикара';
                } elseif ( $phone_code == '+772437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жосалы';
                } elseif ( $phone_code == '+772340') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зайсан';
                } elseif ( $phone_code == '+771455') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Затобольск';
                } elseif ( $phone_code == '+771632') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зеренда';
                } elseif ( $phone_code == '+772335') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зыряновск';
                } elseif ( $phone_code == '+771234') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Индерборский';
                } elseif ( $phone_code == '+771832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Иртышск';
                } elseif ( $phone_code == '+772837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кабанбай';
                } elseif ( $phone_code == '+771144') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казталовка';
                } elseif ( $phone_code == '+772539') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казыгурт';
                } elseif ( $phone_code == '+771437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Камысты';
                } elseif ( $phone_code == '+771333') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кандыагаш';
                } elseif ( $phone_code == '+772841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капал';
                } elseif ( $phone_code == '+772772') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капшагай';
                } elseif ( $phone_code == '+771441') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабалык';
                } elseif ( $phone_code == '+772836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабулак';
                } elseif ( $phone_code_6 == '+77212') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караганда';
                } elseif ( $phone_code == '+771032') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каражал';
                } elseif ( $phone_code == '+771454') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караменды';
                } elseif ( $phone_code == '+771452') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карасу';
                } elseif ( $phone_code == '+772644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратау';
                } elseif ( $phone_code == '+771145') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратобе';
                } elseif ( $phone_code == '+772252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караул';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каргалинское';
                } elseif ( $phone_code == '+772146') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каркаралинск';
                } elseif ( $phone_code == '+772771') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каскелен';
                } elseif ( $phone_code == '+772342') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Катон-Карагай';
                } elseif ( $phone_code == '+771456') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'п. Качар';
                } elseif ( $phone_code == '+771833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кашыр';
                } elseif ( $phone_code == '+772777') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кеген';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Келлеровка';
                } elseif ( $phone_code == '+772536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кентау';
                } elseif ( $phone_code == '+772144') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Киевка';
                } elseif ( $phone_code == '+771542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кишкеноколь';
                } elseif ( $phone_code == '+772842') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кугалы';
                } elseif ( $phone_code == '+772348') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокпекты';
                } elseif ( $phone_code == '+771838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кок-Тюбе';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокшетау';
                } elseif ( $phone_code == '+771637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Коргалжын';
                } elseif ( $phone_code == '+772636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Корнеевка';
                } elseif ( $phone_code_6 == '+77142') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Костанай';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Красный Яр';
                } elseif ( $phone_code == '+772631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кулан';
                } elseif ( $phone_code == '+771237') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кульсары';
                } elseif ( $phone_code == '+772251') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчатов';
                } elseif ( $phone_code == '+772339') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчум';
                } elseif ( $phone_code == '+772937') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курык';
                } elseif ( $phone_code_6 == '+77242' || $phone_code == '+772422') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кызылорда';
                } elseif ( $phone_code == '+772547') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленгер';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленинградское';
                } elseif ( $phone_code == '+772843') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лепсы';
                } elseif ( $phone_code == '+771433') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лисаковск';
                } elseif ( $phone_code == '+772239') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Маканчи';
                } elseif ( $phone_code == '+771239') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макат';
                } elseif ( $phone_code == '+771646') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макинск';
                } elseif ( $phone_code == '+771541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мамлютка';
                } elseif ( $phone_code == '+771331') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мартук';
                } elseif ( $phone_code == '+771236') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Махамбет';
                } elseif ( $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мерке';
                } elseif ( $phone_code == '+771238') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Миялы';
                } elseif ( $phone_code == '+772642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мойынкум';
                } elseif ( $phone_code == '+772148') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Молодежный';
                } elseif ( $phone_code == '+772541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мырзакент';
                } elseif ( $phone_code == '+772779') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нарынкол';
                } elseif ( $phone_code == '+772353') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новая Шульба';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новоишимское';
                } elseif ( $phone_code == '+771448') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Октябрьское';
                } elseif ( $phone_code == '+772149') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Осакаровка';
                } elseif ( $phone_code == '+772752') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Отеген-Батыр';
                } elseif ( $phone_code_6 == '+77182') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Павлодар';
                } elseif ( $phone_code == '+771130') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Переметное';
                } elseif ( $phone_code_6 == '+77152') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Петропавловск';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Пресновка';
                } elseif ( $phone_code == '+771039') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Приозёрск';
                } elseif ( $phone_code == '+772336') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Риддер';
                } elseif ( $phone_code == '+771431') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рудный';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рузаевка';
                } elseif ( $phone_code == '+771140') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сайхин';
                } elseif ( $phone_code == '+772333') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Самарское';
                } elseif ( $phone_code == '+772137') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарань';
                } elseif ( $phone_code == '+772839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарканд';
                } elseif ( $phone_code == '+772537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыагаш';
                } elseif ( $phone_code == '+772637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сары Кемер';
                } elseif ( $phone_code == '+771451') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыколь';
                } elseif ( $phone_code == '+772840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыозек';
                } elseif ( $phone_code == '+771063') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сатпаев';
                } elseif ( $phone_code == '+772639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саудакент';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саумалколь';
                } elseif ( $phone_code_6 == '+77222') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Семей';
                } elseif ( $phone_code == '+771534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сергеевка';
                } elseif ( $phone_code == '+772337') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Серебрянск';
                } elseif ( $phone_code == '+771532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Смирново';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Соколовка';
                } elseif ( $phone_code == '+771645') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степногорск';
                } elseif ( $phone_code == '+771639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степняк';
                } elseif ( $phone_code == '+772334') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Таврическое';
                } elseif ( $phone_code == '+771142') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайпак';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайынша';
                } elseif ( $phone_code == '+772774') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талгар';
                } elseif ( $phone_code_6 == '+77282') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талдыкорган';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талшик';
                } elseif ( $phone_code_6 == '+77262' || $phone_code == '+772622') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тараз';
                } elseif ( $phone_code == '+771436') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тарановское';
                } elseif ( $phone_code == '+771139') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каменка';
                } elseif ( $phone_code == '+772835') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Текели';
                } elseif ( $phone_code == '+772530') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темирлан';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темиртау';
                } elseif ( $phone_code == '+771230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тенгиз';
                } elseif ( $phone_code == '+772343') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теректы';
                } elseif ( $phone_code == '+772436') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теренозек';
                } elseif ( $phone_code == '+771537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тимирязево';
                } elseif ( $phone_code == '+72138') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'им. Габидена Мустафина';
                } elseif ( $phone_code == '+772638') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Толе би';
                } elseif ( $phone_code == '+772153') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Топар';
                } elseif ( $phone_code == '+771439') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тургай';
                } elseif ( $phone_code == '+772538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Турара Рыскулова';
                } elseif ( $phone_code == '+772533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Туркестан';
                } elseif ( $phone_code == '+771445') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Убаган';
                } elseif ( $phone_code == '+771444') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узунколь';
                } elseif ( $phone_code == '+772770') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узынагаш';
                } elseif ( $phone_code == '+771035') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Улытау';
                } elseif ( $phone_code == '+772154') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ботакара';
                } elseif ( $phone_code_6 == '+77112') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уральск';
                } elseif ( $phone_code == '+772230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уржар';
                } elseif ( $phone_code == '+771834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Успенка';
                } elseif ( $phone_code_6 == '+77232') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Усть-Каменогорск';
                } elseif ( $phone_code == '+772833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ушарал';
                } elseif ( $phone_code == '+772834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уштобе';
                } elseif ( $phone_code == '+771132' || $phone_code == '+771442') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Федоровка';
                } elseif ( $phone_code == '+772938') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Форт-Шевченко';
                } elseif ( $phone_code == '+771341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771336') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Хромтау';
                } elseif ( $phone_code == '+771136') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чапай';
                } elseif ( $phone_code == '+772776') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шелек';
                } elseif ( $phone_code == '+771137') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чингирлау';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чистополье';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чкалово';
                } elseif ( $phone_code == '+772778') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чунджа';
                } elseif ( $phone_code == '+771355') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шалкар';
                } elseif ( $phone_code == '+772345') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чарск';
                } elseif ( $phone_code == '+771836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щарбакты';
                } elseif ( $phone_code == '+772535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шардара';
                } elseif ( $phone_code == '+772544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаульдер';
                } elseif ( $phone_code == '+772156') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шахтинск';
                } elseif ( $phone_code == '+771038') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шашубай';
                } elseif ( $phone_code == '+772548') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаян';
                } elseif ( $phone_code == '+772332') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шемонаиха';
                } elseif ( $phone_code == '+772931') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шетпе';
                } elseif ( $phone_code == '+772432') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шиели';
                } elseif ( $phone_code == '+772546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чулаккурган';
                } elseif ( $phone_code == '+771631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шортанды';
                } elseif ( $phone_code == '+772643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шу';
                } elseif ( $phone_code == '+771346') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шубаркудук';
                } elseif ( $phone_code == '+772257') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шульбинск';
                } elseif ( $phone_code_6 == '+77252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шымкент';
                } elseif ( $phone_code == '+771636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щучинск';
                } elseif ( $phone_code_6 == '+77187') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Экибастуз';
                } elseif ( $phone_code == '+771334') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Эмба';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Явленка';
                } else {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                }
                $img = '<img src="img/kz.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out,$country]);
            } else{
                
                $phone_pref = substr($phone, 0, 1);
                $img = '<img src="img/ru.png" style="width: 20px; height: 20px">';
                if($phone_pref === '+'){
                        $phone_def_2_3 = substr($phone, 2, 3);
                        $phone_num = substr($phone, 5, 7);

                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_2_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    $operator = $valueData['org'];
                                    
                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }

                }  elseif($phone_pref === '8' || $phone_pref === '7') {
                        $phone_def_1_3 = substr($phone, 1, 3);
                        $phone_num = substr($phone, 4, 7);
                        
                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_1_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }
                }
                
            }
            
        }
        else
        {
            $value = 'Не указан номер';
        }
    } if ($placementOptions['CRM_ENTITY_TYPE'] == 'COMPANY' && $placementOptions['CRM_ENTITY_ID'] > 0)
    {
        $result = Test::call(
            'crm.company.list',
            [
                'filter' => ['ID' => intVal($placementOptions['CRM_ENTITY_ID'])],
                'select' => ['ID', 'PHONE']
            ]
        );
        if (!empty($result['result'][0]['PHONE'][0]['VALUE']))
        {
            $phone = trim($result['result'][0]['PHONE'][0]['VALUE']);
            $phone_def = substr($phone, 0, 4);
            $phone_def_2 = substr($phone, 0, 2);
            $phone_def_3 = substr($phone, 0, 3);
            $phone_code = substr($phone, 0, 7);
            $phone_code_6 = substr($phone, 0, 6);
            $phone_code_5 = substr($phone, 0, 5);
            $phone_code_4 = substr($phone, 0, 4);
            if($phone_def == '+375' || $phone_def_2 == '80'){
                date_default_timezone_set("Europe/Minsk");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Беларусь';

                if($phone_code == '+375291' || $phone_code == '+375293' || $phone_code == '+375296' || $phone_code == '+375299' || $phone_code_6 == '+37544' || $phone_code_5 == '80291' || $phone_code_5 == '80293' || $phone_code_5 == '80296' || $phone_code_5 == '80299' || $phone_code_4 == '8044'){
                    $operator = '«А1»';
                } elseif($phone_code == '+375292' || $phone_code == '+375295' || $phone_code == '+375297' || $phone_code == '+375298' || $phone_code_6 == '+37533' || $phone_code_5 == '80292' || $phone_code_5 == '80295' || $phone_code_5 == '80297' || $phone_code_5 == '80298' || $phone_code_4 == '8033'){
                    $operator = 'МТС';
                } elseif($phone_code_5 == '+37525' || $phone_code_4 == '8025'){
                    $operator = 'Lifecell';
                }  elseif($phone_code_5 == '+37524' || $phone_code_4 == '8024'){
                    $operator = 'Белтелеком (Максифон)';
                } else{
                    $operator = 'Оператор не установлен';
                }

                $img = '<img src="img/blr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def == '+380'){
                date_default_timezone_set("Europe/Kiev");
                $time = time();
                $time = date('H:i', $time);
                $test = '<br>';
                $region_out = 'Украина';
                if($phone_code_6 == '+38039' || $phone_code_6 == '+38067' || $phone_code_6 == '+38068' || $phone_code_6 == '+38096' || $phone_code_6 == '+38097' || $phone_code_6 == '+38098'){
                    $operator = 'Киевстар';
                } elseif($phone_code_6 == '+38050' || $phone_code_6 == '+38066' || $phone_code_6 == '+38095' || $phone_code_6 == '+38099'){
                    $operator = 'Vodafone (ПАО "Мобильные ТелеСистемы")';
                } elseif($phone_code_6 == '+38063' || $phone_code_6 == '+38093'){
                    $operator = 'Lifecell';
                } elseif($phone_code_6 == '+38091'){
                    $operator = 'ТриМоб (Utel Украина)';
                } elseif($phone_code_6 == '+38092'){
                    $operator = 'PEOPLEnet Украина';
                } elseif($phone_code_6 == '+38094'){
                    $operator = 'Интертелеком Украина';
                } else{
                    $operator = 'Оператор не установлен';
                }
                $img = '<img src="img/ukr.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out]);
            } elseif($phone_def_3 == '+77'|| $phone_def_2 == '77'){
                $test = '<br>';
                $country = 'Казахстан';

                if($phone_code == '+772131' || $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Абай';
                } elseif ( $phone_code == '+771033') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Агадырь';
                } elseif ( $phone_code == '+772438') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Айтеке-Би';
                } elseif ( $phone_code == '+771143') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжаик';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжал';
                } elseif ( $phone_code == '+772344') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акжар';
                } elseif ( $phone_code == '+771638' || $phone_code == '+772641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акколь';
                } elseif ( $phone_code == '+771839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акку';
                } elseif ( $phone_code == '+771231') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аккыстау';
                } elseif ( $phone_code == '+771133') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксай';
                } elseif ( $phone_code == '+771837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу';
                } elseif ( $phone_code == '+771031') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксу-Аюлы';
                } elseif ( $phone_code == '+772346') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксуат';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актас';
                } elseif ( $phone_code_6 == '+77213' || $phone_code_6 == '+77292') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актау';
                } elseif ( $phone_code_6 == '+77132') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актобе';
                } elseif ( $phone_code == '+771037' || $phone_code == '+771841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Актогай';
                } elseif ( $phone_code == '+772757') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Акший';
                } elseif ( $phone_code == '+771337') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алга';
                } elseif ( $phone_code_6 == '+77272') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Алматы';
                } elseif ( $phone_code == '+771440') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Амангельды';
                } elseif ( $phone_code == '+772433') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аральск';
                } elseif ( $phone_code == '+771430') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аркалык';
                } elseif ( $phone_code == '+771644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аршалы';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арыкбалык';
                } elseif ( $phone_code == '+772540') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Арысь';
                } elseif ( $phone_code == '+772633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аса';
                } elseif ( $phone_code_6 == '+77172') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нур-Султан';
                } elseif ( $phone_code == '+771641') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Астраханка';
                } elseif ( $phone_code == '+772542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Асык Ата';
                } elseif ( $phone_code == '+771030') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атасу';
                } elseif ( $phone_code == '+771643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атбасар';
                } elseif ( $phone_code_6 == '+77122') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Атырау';
                } elseif ( $phone_code == '+771453') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аулиеколь';
                } elseif ( $phone_code == '+772237') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аягоз';
                } elseif ( $phone_code == '+772236') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бескарагай';
                } elseif ( $phone_code == '+771345') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байганин';
                } elseif ( $phone_code == '+733622') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Байконур';
                } elseif ( $phone_code == '+772773') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баканас';
                } elseif ( $phone_code == '+771640') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балкашино';
                } elseif ( $phone_code == '+772838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балпык';
                } elseif ( $phone_code == '+771036') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Балхаш';
                } elseif ( $phone_code == '+772246') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баршатас';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Батамшинский';
                } elseif ( $phone_code == '+772635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бауыржан Момышулы';
                } elseif ( $phone_code == '+771840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Баянаул';
                } elseif ( $phone_code == '+772932') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бейнеу';
                } elseif ( $phone_code == '+772531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Аксукент';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бишкуль';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Благовещенка';
                } elseif ( $phone_code == '+772338') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бозанбай';
                } elseif ( $phone_code == '+772341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Большенарымское';
                } elseif ( $phone_code == '+771630') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровое';
                } elseif ( $phone_code == '+771443') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Боровское';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Бородулихинский район';
                } elseif ( $phone_code == '+771531') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Булаево';
                } elseif ( $phone_code == '+771233') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ганюшкино';
                } elseif ( $phone_code == '+772347') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Калбатау';
                } elseif ( $phone_code == '+772331') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Глубокое';
                } elseif ( $phone_code == '+771131') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Дарьинское';
                } elseif ( $phone_code == '+771434') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Денисовка';
                } elseif ( $phone_code == '+771648') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Державинск';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джанибек';
                } elseif ( $phone_code == '+771134') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жымпиты';
                } elseif ( $phone_code == '+771141') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Джангала';
                } elseif ( $phone_code == '+772147') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыбулак';
                } elseif ( $phone_code == '+771642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Егиндыколь';
                } elseif ( $phone_code == '+771633') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ерейментау';
                } elseif ( $phone_code == '+772775') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есик';
                } elseif ( $phone_code == '+771647') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Есиль';
                } elseif ( $phone_code == '+771040' || $phone_code == '+771043') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жайрем';
                } elseif ( $phone_code == '+771635') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаксы';
                } elseif ( $phone_code == '+72431') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жалагаш';
                } elseif ( $phone_code == '+771138') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Фурманово';
                } elseif ( $phone_code == '+772435') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанакорган';
                } elseif ( $phone_code == '+772934') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанаозен';
                } elseif ( $phone_code == '+772634') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жанатас';
                } elseif ( $phone_code == '+772832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жансугуров';
                } elseif ( $phone_code == '+772831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жаркент';
                } elseif ( $phone_code == '+771034') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезды';
                } elseif ( $phone_code_6 == '+77102') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезказган';
                } elseif ( $phone_code == '+772351') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жезкент';
                } elseif ( $phone_code == '+771831') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Железинка';
                } elseif ( $phone_code == '+772534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жетысай';
                } elseif ( $phone_code == '+771435') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Житикара';
                } elseif ( $phone_code == '+772437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Жосалы';
                } elseif ( $phone_code == '+772340') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зайсан';
                } elseif ( $phone_code == '+771455') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Затобольск';
                } elseif ( $phone_code == '+771632') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зеренда';
                } elseif ( $phone_code == '+772335') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Зыряновск';
                } elseif ( $phone_code == '+771234') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Индерборский';
                } elseif ( $phone_code == '+771832') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Иртышск';
                } elseif ( $phone_code == '+772837') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кабанбай';
                } elseif ( $phone_code == '+771144') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казталовка';
                } elseif ( $phone_code == '+772539') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Казыгурт';
                } elseif ( $phone_code == '+771437') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Камысты';
                } elseif ( $phone_code == '+771333') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кандыагаш';
                } elseif ( $phone_code == '+772841') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капал';
                } elseif ( $phone_code == '+772772') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Капшагай';
                } elseif ( $phone_code == '+771441') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабалык';
                } elseif ( $phone_code == '+772836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карабулак';
                } elseif ( $phone_code_6 == '+77212') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караганда';
                } elseif ( $phone_code == '+771032') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каражал';
                } elseif ( $phone_code == '+771454') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караменды';
                } elseif ( $phone_code == '+771452') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Карасу';
                } elseif ( $phone_code == '+772644') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратау';
                } elseif ( $phone_code == '+771145') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каратобе';
                } elseif ( $phone_code == '+772252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Караул';
                } elseif ( $phone_code == '+771342') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каргалинское';
                } elseif ( $phone_code == '+772146') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каркаралинск';
                } elseif ( $phone_code == '+772771') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каскелен';
                } elseif ( $phone_code == '+772342') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Катон-Карагай';
                } elseif ( $phone_code == '+771456') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'п. Качар';
                } elseif ( $phone_code == '+771833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кашыр';
                } elseif ( $phone_code == '+772777') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кеген';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Келлеровка';
                } elseif ( $phone_code == '+772536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кентау';
                } elseif ( $phone_code == '+772144') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Киевка';
                } elseif ( $phone_code == '+771542') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кишкеноколь';
                } elseif ( $phone_code == '+772842') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кугалы';
                } elseif ( $phone_code == '+772348') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокпекты';
                } elseif ( $phone_code == '+771838') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кок-Тюбе';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кокшетау';
                } elseif ( $phone_code == '+771637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Коргалжын';
                } elseif ( $phone_code == '+772636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Корнеевка';
                } elseif ( $phone_code_6 == '+77142') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Костанай';
                } elseif ( $phone_code_6 == '+77162') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Красный Яр';
                } elseif ( $phone_code == '+772631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кулан';
                } elseif ( $phone_code == '+771237') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кульсары';
                } elseif ( $phone_code == '+772251') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчатов';
                } elseif ( $phone_code == '+772339') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курчум';
                } elseif ( $phone_code == '+772937') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Курык';
                } elseif ( $phone_code_6 == '+77242' || $phone_code == '+772422') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кызылорда';
                } elseif ( $phone_code == '+772547') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленгер';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ленинградское';
                } elseif ( $phone_code == '+772843') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лепсы';
                } elseif ( $phone_code == '+771433') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Лисаковск';
                } elseif ( $phone_code == '+772239') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Маканчи';
                } elseif ( $phone_code == '+771239') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макат';
                } elseif ( $phone_code == '+771646') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Макинск';
                } elseif ( $phone_code == '+771541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мамлютка';
                } elseif ( $phone_code == '+771331') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мартук';
                } elseif ( $phone_code == '+771236') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Махамбет';
                } elseif ( $phone_code == '+772532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мерке';
                } elseif ( $phone_code == '+771238') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Миялы';
                } elseif ( $phone_code == '+772642') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мойынкум';
                } elseif ( $phone_code == '+772148') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Молодежный';
                } elseif ( $phone_code == '+772541') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Мырзакент';
                } elseif ( $phone_code == '+772779') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Нарынкол';
                } elseif ( $phone_code == '+772353') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новая Шульба';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Новоишимское';
                } elseif ( $phone_code == '+771448') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Октябрьское';
                } elseif ( $phone_code == '+772149') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Осакаровка';
                } elseif ( $phone_code == '+772752') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Отеген-Батыр';
                } elseif ( $phone_code_6 == '+77182') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Павлодар';
                } elseif ( $phone_code == '+771130') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Переметное';
                } elseif ( $phone_code_6 == '+77152') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Петропавловск';
                } elseif ( $phone_code == '+771544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Пресновка';
                } elseif ( $phone_code == '+771039') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Приозёрск';
                } elseif ( $phone_code == '+772336') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Риддер';
                } elseif ( $phone_code == '+771431') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рудный';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Рузаевка';
                } elseif ( $phone_code == '+771140') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сайхин';
                } elseif ( $phone_code == '+772333') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Самарское';
                } elseif ( $phone_code == '+772137') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарань';
                } elseif ( $phone_code == '+772839') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарканд';
                } elseif ( $phone_code == '+772537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыагаш';
                } elseif ( $phone_code == '+772637') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сары Кемер';
                } elseif ( $phone_code == '+771451') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыколь';
                } elseif ( $phone_code == '+772840') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сарыозек';
                } elseif ( $phone_code == '+771063') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сатпаев';
                } elseif ( $phone_code == '+772639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саудакент';
                } elseif ( $phone_code == '+771533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Саумалколь';
                } elseif ( $phone_code_6 == '+77222') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Семей';
                } elseif ( $phone_code == '+771534') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Сергеевка';
                } elseif ( $phone_code == '+772337') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Серебрянск';
                } elseif ( $phone_code == '+771532') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Смирново';
                } elseif ( $phone_code == '+771538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Соколовка';
                } elseif ( $phone_code == '+771645') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степногорск';
                } elseif ( $phone_code == '+771639') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Степняк';
                } elseif ( $phone_code == '+772334') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Таврическое';
                } elseif ( $phone_code == '+771142') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайпак';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тайынша';
                } elseif ( $phone_code == '+772774') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талгар';
                } elseif ( $phone_code_6 == '+77282') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талдыкорган';
                } elseif ( $phone_code == '+771546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Талшик';
                } elseif ( $phone_code_6 == '+77262' || $phone_code == '+772622') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тараз';
                } elseif ( $phone_code == '+771436') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тарановское';
                } elseif ( $phone_code == '+771139') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Каменка';
                } elseif ( $phone_code == '+772835') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Текели';
                } elseif ( $phone_code == '+772530') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темирлан';
                } elseif ( $phone_code_6 == '+77213') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Темиртау';
                } elseif ( $phone_code == '+771230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тенгиз';
                } elseif ( $phone_code == '+772343') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теректы';
                } elseif ( $phone_code == '+772436') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Теренозек';
                } elseif ( $phone_code == '+771537') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тимирязево';
                } elseif ( $phone_code == '+72138') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'им. Габидена Мустафина';
                } elseif ( $phone_code == '+772638') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Толе би';
                } elseif ( $phone_code == '+772153') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Топар';
                } elseif ( $phone_code == '+771439') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Тургай';
                } elseif ( $phone_code == '+772538') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Турара Рыскулова';
                } elseif ( $phone_code == '+772533') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Туркестан';
                } elseif ( $phone_code == '+771445') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Убаган';
                } elseif ( $phone_code == '+771444') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узунколь';
                } elseif ( $phone_code == '+772770') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Узынагаш';
                } elseif ( $phone_code == '+771035') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Улытау';
                } elseif ( $phone_code == '+772154') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ботакара';
                } elseif ( $phone_code_6 == '+77112') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уральск';
                } elseif ( $phone_code == '+772230') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уржар';
                } elseif ( $phone_code == '+771834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Успенка';
                } elseif ( $phone_code_6 == '+77232') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Усть-Каменогорск';
                } elseif ( $phone_code == '+772833') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Ушарал';
                } elseif ( $phone_code == '+772834') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Уштобе';
                } elseif ( $phone_code == '+771132' || $phone_code == '+771442') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Федоровка';
                } elseif ( $phone_code == '+772938') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Форт-Шевченко';
                } elseif ( $phone_code == '+771341') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Кордай';
                } elseif ( $phone_code == '+771336') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Хромтау';
                } elseif ( $phone_code == '+771136') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чапай';
                } elseif ( $phone_code == '+772776') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шелек';
                } elseif ( $phone_code == '+771137') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чингирлау';
                } elseif ( $phone_code == '+771535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чистополье';
                } elseif ( $phone_code == '+771536') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чкалово';
                } elseif ( $phone_code == '+772778') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чунджа';
                } elseif ( $phone_code == '+771355') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шалкар';
                } elseif ( $phone_code == '+772345') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чарск';
                } elseif ( $phone_code == '+771836') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щарбакты';
                } elseif ( $phone_code == '+772535') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шардара';
                } elseif ( $phone_code == '+772544') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаульдер';
                } elseif ( $phone_code == '+772156') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шахтинск';
                } elseif ( $phone_code == '+771038') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шашубай';
                } elseif ( $phone_code == '+772548') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шаян';
                } elseif ( $phone_code == '+772332') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шемонаиха';
                } elseif ( $phone_code == '+772931') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шетпе';
                } elseif ( $phone_code == '+772432') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шиели';
                } elseif ( $phone_code == '+772546') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Чулаккурган';
                } elseif ( $phone_code == '+771631') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шортанды';
                } elseif ( $phone_code == '+772643') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шу';
                } elseif ( $phone_code == '+771346') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шубаркудук';
                } elseif ( $phone_code == '+772257') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шульбинск';
                } elseif ( $phone_code_6 == '+77252') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Шымкент';
                } elseif ( $phone_code == '+771636') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Щучинск';
                } elseif ( $phone_code_6 == '+77187') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Экибастуз';
                } elseif ( $phone_code == '+771334') {
                    date_default_timezone_set("Asia/Aqtau");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Эмба';
                } elseif ( $phone_code == '+771543') {
                    date_default_timezone_set("Asia/Almaty");
                    $time = time();
                    $time = date('H:i', $time);
                    $region_out = 'Явленка';
                }
                $img = '<img src="img/kz.png" style="width: 20px; height: 20px">';
                $value = implode(' ', [$time,$test,$operator,$test,$img,$region_out,$country]);
            } else{
                
                $phone_pref = substr($phone, 0, 1);
                $img = '<img src="img/ru.png" style="width: 20px; height: 20px">';
                if($phone_pref === '+'){
                        $phone_def_2_3 = substr($phone, 2, 3);
                        $phone_num = substr($phone, 5, 7);

                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_2_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    $operator = $valueData['org'];
                                    
                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }

                }  elseif($phone_pref === '8' || $phone_pref === '7') {
                        $phone_def_1_3 = substr($phone, 1, 3);
                        $phone_num = substr($phone, 4, 7);
                        
                        $servername = "localhost";
                        $database = "cj68608_server";
                        $username = "cj68608_server";
                        $password = "48W4GxJA";
                        $db_table = "phone_region";
                        // Создаем соединение
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Проверяем соединение
                        $sql = "SELECT * FROM $db_table";
                        if (mysqli_query($conn, $sql)) {
                            $result_conn = "Данные получены";
                        } else {
                            $result_conn = "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        
                        if($result = $conn->query($sql)) {
                            foreach($result as $row) {
                                $db_def = $row["def"];
                                $db_phone_from = $row["phone_from"];
                                $db_phone_to = $row["phone_to"];
                                $db_operator = $row["operator"];
                                $db_region = $row["region"];
                                if($phone_def_1_3 == $db_def && $phone_num >= $db_phone_from && $phone_num <= $db_phone_to){
                                    $region = explode("|", $db_region);
                                    if($region[2] != ''){
                                        $region_out = $region[2];
                                    } elseif ($region[1] != ''){
                                        $region_out = $region[1];
                                    } elseif ($region[0] != ''){
                                        $region_out = $region[0];
                                    } else {
                                        $value = 'Номер не определен, либо отсутствует. Если номер есть, то напишите его нам в поддержку и мы исправим проблему.';
                                    };

                                    if($region_out == 'Российская Федерация'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Калининградская обл.'){
                                        date_default_timezone_set("Europe/Kaliningrad");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'г. Москва' || $region_out == 'г. Москва и Московская область' || $region_out == 'г. Санкт-Петербург' || $region_out == 'г. Санкт-Петербург и Ленинградская область' || $region_out == 'Севастополь' || $region_out == 'Архангельская обл.' || $region_out == 'Белгородская обл.' || $region_out == 'Брянская обл.' || $region_out == 'Владимирская обл.' || $region_out == 'Волгоградская обл.' || $region_out == 'Вологодская обл.' || $region_out == 'Воронежская обл.' || $region_out == 'Ивановская обл.' || $region_out == 'Кабардино-Балкария' || $region_out == 'Калужская обл.' || $region_out == 'Карачаево-Черкесия' || $region_out == 'Кировская обл.' || $region_out == 'Костромская обл.' || $region_out == 'Краснодарский край' || $region_out == 'Курская обл.' || $region_out == 'Ленинградская обл.' || $region_out == 'Липецкая обл.' || $region_out == 'Московская обл.' || $region_out == 'Мурманская обл.' || $region_out == 'Ненецкий автономный округ' || $region_out == 'Нижегородская обл.' || $region_out == 'Новгородская обл.' || $region_out == 'Орловская обл.' || $region_out == 'Пензенская обл.' || $region_out == 'Псковская обл.' || $region_out == 'Республика Адыгея' || $region_out == 'Республика Дагестан' || $region_out == 'Республика Ингушетия' || $region_out == 'Республика Калмыкия' || $region_out == 'Республика Карелия' || $region_out == 'Республика Коми' || $region_out == 'Республика Крым' || $region_out == 'Республика Марий Эл' || $region_out == 'Республика Мордовия' || $region_out == 'Республика Северная Осетия' || $region_out == 'Республика Татарстан' || $region_out == 'Ростовская обл.' || $region_out == 'Рязанская обл.' || $region_out == 'Саратовская обл.' || $region_out == 'Смоленская обл.' || $region_out == 'Ставропольский край' || $region_out == 'Тамбовская обл.' || $region_out == 'Тверская обл.' || $region_out == 'Тульская обл.' || $region_out == 'Чеченская Республика' || $region_out == 'Чувашская Республика' || $region_out == 'Ярославская обл.'){
                                        date_default_timezone_set("Europe/Moscow");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Астраханская обл.' || $region_out == 'Самарская обл.' || $region_out == 'Удмуртская республика' || $region_out == 'Ульяновская обл.'){
                                        date_default_timezone_set("Europe/Astrakhan");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Курганская обл.' || $region_out == 'Оренбургская обл.' || $region_out == 'Пермская обл.' || $region_out == 'Пермский край' || $region_out == 'Республика Башкортостан' || $region_out == 'Свердловская обл.' || $region_out == 'Тюменская обл.' || $region_out == 'Ханты-Мансийский автономный округ' || $region_out == 'Челябинская обл.' || $region_out == 'Ямало-Ненецкий автономный округ'){
                                        date_default_timezone_set("Asia/Yekaterinburg");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Омская обл.'){
                                        date_default_timezone_set("Asia/Omsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Алтайский край' || $region_out == 'г. Барнаул|Алтайский край' || $region_out == 'Красноярский край' || $region_out == 'Кемеровская обл.' || $region_out == 'Новосибирская обл.' || $region_out == 'Республика Алтай' || $region_out == 'Республика Тыва' || $region_out == 'Республика Хакасия' || $region_out == 'Томская обл.'){
                                        date_default_timezone_set("Asia/Barnaul");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Иркутская обл.' || $region_out == 'Республика Бурятия'){
                                        date_default_timezone_set("Asia/Irkutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Республика Саха-Якутия' || $region_out == 'Амурская обл.' || $region_out == 'Забайкальский край'){
                                        date_default_timezone_set("Asia/Yakutsk");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Еврейская автономная обл.' || $region_out == 'Приморский край' || $region_out == 'Хабаровский край' || $region_out == 'Магаданская обл.'){
                                        date_default_timezone_set("Asia/Vladivostok");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Сахалинская обл.'){
                                        date_default_timezone_set("Asia/Sakhalin");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    } if($region_out == 'Камчатский край' || $region_out == 'Чукотский автономный округ'){
                                        date_default_timezone_set("Asia/Kamchatka");
                                        $time = time();
                                        $time = date('H:i', $time);
                                        $test = '<br>';
                                        $value = implode(' ', [$time,$test,$db_operator,$test,$img,$region_out]);
                                    }
                                }
                            }
                        } else {
                            $value = "Номер не определен. Напишите номер в поддержку и мы исправим проблему.";
                        }
                }
                
            }
            
        }
        else
        {
            $value = 'Не указан номер';
        }
    }
?>
<!DOCTYPE html>
    <html>
        <head>
            <script src="//api.bitrix24.com/api/v1/dev/"></script>
        </head>
        <body style="margin: 0; padding: 0; background-color: <?=$placementOptions['MODE'] === 'edit' ? '#fff'
            : '#f9fafb'?>;">
            <?
            if ($placementOptions['MODE'] === 'edit'): ?>
                <input type="text" style="width: 90%;" value='<?=$value?>' onkeyup="setValue(this.value)">
                <script>
                    function setValue(value)
                    {
                        BX24.placement.call('setValue', value);
                    }
                    
                    BX24.placement.call('setValue', '<?=$value?>');
                </script>

            <? else: ?>
                <?=$value?>
            <? endif;
            ?>
        </body>
    </html>
<? endif;?>