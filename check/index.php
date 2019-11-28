<?php
class toclient{
	public $error_status = true;
	public $error_messeg = 'Unknown error.';
	public $array_result = [];
	
	public function getData(){
		return json_encode(
			[
				'error'=>[
					$this->error_status,
					$this->error_messeg
				],
				'data'=>$this->array_result
			]
		);
	}
	public function getLegend($v){
		if(   0 <= ord($v) && ord($v) <=   8 ) { return "Unknown"; }
		if(  11 <= ord($v) && ord($v) <=  12 ) { return "Unknown"; }
		if(  14 <= ord($v) && ord($v) <=  31 ) { return "Unknown"; }
		if( 127 <= ord($v) && ord($v) <= 255 ) { return "Unknown"; }
		switch($v){
			case "a": return "alpha"; break;
			case "b": return "bravo"; break;
			case "c": return "charlie"; break;
			case "d": return "delta"; break;
			case "e": return "echo"; break;
			case "f": return "foxtrot"; break;
			case "g": return "golf"; break;
			case "h": return "hotel"; break;
			case "i": return "india"; break;
			case "j": return "juliet "; break;
			case "k": return "kilo"; break;
			case "l": return "lima"; break;
			case "m": return "mike"; break;
			case "n": return "november"; break;
			case "o": return "oscar"; break;
			case "p": return "papa"; break;
			case "q": return "quebec"; break;
			case "r": return "romeo"; break;
			case "s": return "sierra"; break;
			case "t": return "tango"; break;
			case "u": return "uniform"; break;
			case "v": return "victor"; break;
			case "w": return "whiskey"; break;
			case "x": return "x-ray"; break;
			case "y": return "yankee"; break;
			case "z": return "zulu"; break;
			case "A": return "APPLE"; break;
			case "B": return "BRINGA"; break;
			case "C": return "CHIBA"; break;
			case "D": return "DENMARK"; break;
			case "E": return "EMC"; break;
			case "F": return "FRANCE"; break;
			case "G": return "GHANA"; break;
			case "H": return "HITACHI"; break;
			case "I": return "INDIA"; break;
			case "J": return "JAPAN"; break;
			case "K": return "KOREA"; break;
			case "L": return "LONDON"; break;
			case "M": return "MEXICO"; break;
			case "N": return "NORWAY"; break;
			case "O": return "OSAKA"; break;
			case "P": return "PIMS"; break;
			case "Q": return "QATAR"; break;
			case "R": return "RUSSIAN"; break;
			case "S": return "SPAIN"; break;
			case "T": return "TOKYO"; break;
			case "U": return "UNISYS"; break;
			case "V": return "VENEZUELA"; break;
			case "W": return "WASHINGTON"; break;
			case "X": return "X'MAS"; break;
			case "Y": return "YAHOO"; break;
			case "Z": return "ZIMBABWE"; break;
			case "0": return "Zero"; break;
			case "1": return "One"; break;
			case "2": return "Two"; break;
			case "3": return "Three"; break;
			case "4": return "Four"; break;
			case "5": return "Five"; break;
			case "6": return "Six"; break;
			case "7": return "Seven"; break;
			case "8": return "Eight"; break;
			case "9": return "Nine"; break;
			case "/": return "Front Slash"; break;
			case ":": return "Colon"; break;
			case ";": return "Semi Colon"; break;
			case "!": return "Exclamation mark"; break;
			case "?": return "Question mark"; break;
			case "|": return "Pipe"; break;
			case "@": return "at sign"; break;
			case "_": return "Underscore"; break;
			case "-": return "Hyphen"; break;
			case "+": return "Plus"; break;
			case "\\": return "Back Slash"; break;
			case "\"": return "Double Quotation"; break;
			case "'": return "Single Quotation"; break;
			case " ": return "Space"; break;
			case "\t": return "Tab sign"; break;
			case "\r": return "Carriage return"; break;
			case "\n": return "Line Feed"; break;
			default : return $v;
		}
	}
}
header('Content-Type: text/plain; charset=utf-8');
header('Content-Type: application/json; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
header('Content-Disposition: attachment; filename=' . microtime(true) . '.txt');

mb_internal_encoding("UTF8");

if( $_SERVER['REQUEST_METHOD'] != 'POST' ){
	header('Location: ../');
	exit();
}

$resultdata = new toclient();

if( ! isset($_POST['textdata']) ){
	$resultdata->error_status = true;
	$resultdata->error_messeg = 'Please input the charcter';

	echo $resultdata->getData();
	exit();
}

$resultdata->array_result = str_split( mb_convert_kana($_POST['textdata'],'as') );



foreach( $resultdata->array_result as $key => $val ){
	$resultdata->array_result[$key] = [$val,$resultdata->getLegend($val)];
}


$resultdata->error_status = false;
$resultdata->error_messeg = 'Procedure has been complete.';

echo $resultdata->getData();
exit();
