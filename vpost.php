<?php

// модель
$fv = [
	[txt => "Первый вопрос", answ => ["Калининград", "Кёнигсберг", "Чкаловск"], ra => "Калининград"],
	[txt => "Второй вопрос", answ => ["Калининград1", "Кёнигсберг1", "Чкаловск1"],  ra => "Калининград1"],
	[txt => "Третий вопрос", answ => ["Калининград2", "Кёнигсберг2", "Чкаловск2"], ra => "Калининград2"],
	[txt => "Четвертый вопрос", answ => ["Калининград3", "Кёнигсберг3", "Чкаловск3"], ra => "Калининград3"],
	[txt => "Пятый вопрос", answ => ["Калининград4", "Кёнигсберг4", "Чкаловск4"], ra => "Калининград4"]
];

file_put_contents('data.json', json_encode($fv, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE ));
 
// результат
$result = 0;

// получение данных из POST
$data = array();
$json = file_get_contents('php://input'); // read JSON from raw POST data
if (!empty($json)) {
    $data = json_decode($json, true); // decode
}

// если в заголовке есть data отдаем массив, в ином случае перебираем полученные данные и отдаем результат
if ($json == "data") {
		echo json_encode($fv);
	} else {
		 foreach ($fv as $key => $value) {
		 	
		 	if ($fv[$key]['ra'] == $data[$key]) $result++;
		 }
		 echo $result;
	}