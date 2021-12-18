<?php 
	namespace Classes;


	class Funcion{

		public function normalize($string){
    		$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
			ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    		$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
			bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    		$string = utf8_decode($string);
    		$string = strtr($string, utf8_decode($originales), $modificadas);
    		$string = strtolower($string);
    		$string = str_replace(" ", "_", $string);
    		return utf8_encode($string);
		}

		public function remove_accents_marks($string){
			$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
			ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    		$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
			bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    		$string = utf8_decode($string);
    		$string = strtr($string, utf8_decode($originales), $modificadas);
    		return utf8_encode($string);
		}


		public function findReplaceURL($text){
			$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			$reg_ExYT = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/";


      		if(preg_match($reg_ExYT, $text, $idv)){
      			$com = preg_replace($reg_ExYT, "<br><iframe src=https://www.youtube.com/embed/".$idv[7]." frameborder=0></iframe><br>", $text);
				return array($com, "true");
			}
			else{
      			return preg_replace($reg_exUrl, "<a href=$0>$0</a> ", $text);	
			}

		}


		function findHashTags($text){
			$reg_exHash = "/#+([a-zA-Z0-9_]+)/";  
			
					  preg_match_all($reg_exHash, $text, $matches,  PREG_PATTERN_ORDER);
			$strhas = implode(",", $matches[0]);
      		$strurl = preg_replace($reg_exHash, '<a href="/comentarios/destacar/$1">$0</a>', $text);  

      		return array($strurl, $strhas);
		}


		public function alfa_months($arg){

			$arg = explode("-", $arg);
			$mes = $arg[1];

			switch ($mes) {
				case '01':
					$return = "Ene";
					break;
				case '02':
					$return = "Feb";
					break;
				case '03':
					$return = "Mar";
					break;
				case '04':
					$return = "Abr";
					break;
				case '05':
					$return = "May";
					break;
				case '06':
					$return = "Jun";
					break;
				case '07':
					$return = "Jul";
					break;
				case '08':
					$return = "Ago";
					break;
				case '09':
					$return = "Sep";
					break;
				case '10':
					$return = "Oct";
					break;
				case '11':
					$return = "Nov";
					break;
				case '12':
					$return = "Dic";
					break;
			}
			$return = $arg[2]."-".$return."-".$arg[0]; 
			return $return;
		}
	}


 ?>