<?php

    class Validate{

        public static $questions = ["Napiš slovy, kolik má velbloud dvouhrbý hrbů?", "Napiš slovy, kolik má opice hlav?"];
        public static $answers = ["dva", "jednu"];

        public static function random($questions, $answers){           
            $index = 0;

            if(sizeof($questions) == sizeof($answers)){
                $index = rand(0, sizeof($questions) - 1);
            };

            return $index;
        }

        public static function compare($response, $index, $questions, $answers){
            if(sizeof($questions) == sizeof($answers) && $index < sizeof($questions)){
                return $response == $answers[$index];
            }else{
                return false;
            }
        }

        public static function validation($string){
            $changeString = strip_tags(trim($string));
            return str_replace(array("\r","\n"), array(" "," "), $changeString);
        }

    }

?>