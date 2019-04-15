<?php

class Numbergen
{
    public function generatesNumbers($myArray, $maxNumElement) {
        $myArray = range(0, $maxNumElement);
        foreach ($myArray as &$val) {
            $val = mt_rand(0, 20);
        }
        return $myArray;
    }

    public function mixNumbers($myArray) {

        for($i=0; $i < count($myArray); $i++) {

            for($j=$i+1; $j < count($myArray); $j++) {

                if($myArray[$i] > $myArray[$j]) {

                    $temp = $myArray[$j];
                    $myArray[$j] = $myArray[$i];
                    $myArray[$i] = $temp;
                }
            }
        }

        return $myArray;

    }

    public function printNumbers($myArray) {
        foreach ($myArray as &$val) {
            echo "$val\n";
        }
    }

    public  function clearArray($myArray) {
        return $myArray = [];
    }
}
$ourArray = [];
$numbergen = new Numbergen();
$ourArray = $numbergen->generatesNumbers($ourArray,18);
$numbergen->printNumbers($ourArray);
$ourArray = $numbergen->mixNumbers($ourArray);
echo "<br/>";
$numbergen->printNumbers($ourArray);
