<?php

    class Validate{

        public static $questions = ["Kolik hrbů má velbloud dvouhrbý?", "Kolik očí má kočka?"];
        public static $answers = ["dva", "dvě"];

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
            }

            return false;            
        }

        public static function validation($string){
            $changeString = strip_tags(trim($string));
            return str_replace(array("\r","\n"), array(" "," "), $changeString);
        }

    }

?>