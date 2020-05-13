<?php
session_start();
error_reporting('E_ALL');
ini_set('display_errors',1);
if(isset($_GET['level'])){
if($_GET['level']==='one'){
	$_SESSION['level']='one';
}else{
	$_SESSION['level']='two';
}
}


$dataArrTwo = [
			['word'=>'Я ПЕС ЗУ-МА','img'=>'16.jpg','src'=>['16.jpg','17.jpg']],

	['word'=>'ЛЮБ-ЛЮ КУ-ШАТЬ КА-ШУ','img'=>'18.jpg','src'=>['19.jpg','18.jpg']],
		['word'=>'НО-ЛИК','img'=>'5.jpg','src'=>['5.jpg','6.jpg']],

		['word'=>'ИГ-РА-Ю В ФУТ-БОЛ','img'=>'20.jpg','src'=>['20.jpg','21.jpg']],
	['word'=>'ДРУ-ЖУ С СО-ВОЙ','img'=>'22.jpg','src'=>['23.jpg','22.jpg']],
		['word'=>'МНЕ ПЯТЬ ЛЕТ','img'=>'24.jpg','src'=>['24.jpg','25.jpg']],
			['word'=>'ВОЛК','img'=>'14.jpg','src'=>['14.jpg','15.jpg']],

	['word'=>'У-МЕЮ ПЛА-ВАТЬ','img'=>'26.jpg','src'=>['26.jpg','27.jpg']],
		['word'=>'ВО-РО-НА','img'=>'15.jpg','src'=>['15.jpg','14.jpg']],
			['word'=>'СИМ-КА','img'=>'6.jpg','src'=>['5.jpg','6.jpg']]


];

	$dataArrOne = [
			['word'=>'ЛЕВ','img'=>'8.jpg','src'=>['8.jpg','10.jpg']],

	['word'=>'ВОЛК','img'=>'14.jpg','src'=>['14.jpg','15.jpg']],

	['word'=>'ДОМ','img'=>'2.jpeg','src'=>['1.jpeg','2.jpeg']],
	['word'=>'КОТ','img'=>'7.jpg','src'=>['7.jpg','9.jpeg']],
	['word'=>'ВО-РО-НА','img'=>'15.jpg','src'=>['15.jpg','14.jpg']],
	['word'=>'ДУБ','img'=>'1.jpeg','src'=>['1.jpeg','2.jpeg']],
	['word'=>'МА-ША','img'=>'3.jpg','src'=>['3.jpg','4.png']],
	['word'=>'КИТ','img'=>'9.jpeg','src'=>['7.jpg','9.jpeg']],
	['word'=>'МИ-ША','img'=>'4.png','src'=>['3.jpg','4.png']],
	['word'=>'НО-ЛИК','img'=>'5.jpg','src'=>['5.jpg','6.jpg']],
	['word'=>'ЛИС','img'=>'10.jpg','src'=>['10.jpg','8.jpg']],
	['word'=>'СИМ-КА','img'=>'6.jpg','src'=>['5.jpg','6.jpg']]
];


function show($arr){

	$str .= '<div class="general"><div id="word"><p class="wordText">'.$arr['word'].'</p></div>';

foreach($arr['src'] as $item){
	$data_stat = '';
	if ($item == $arr['img']){
$data_stat = 'ok';		
	}
$str .= '<div class="image"><img src="'.$item.'" data-status="'.$data_stat.'"></div>';
}
$str .='</div>';
return $str;

}


	$dataArr = $dataArrOne;

if($_SESSION['level'] === 'two'){
	$dataArr = $dataArrTwo;

}



if(isset($_POST['number'])){

	echo show($dataArr[$_POST['number']]);


}
$count = count($dataArr)-1;
$content = show($dataArr[0]);


?>