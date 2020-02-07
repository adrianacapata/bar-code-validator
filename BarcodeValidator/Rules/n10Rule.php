<?php

require_once ('AbstractRule.php');

class n10Rule extends AbstractRule
{
    public function validateRule($barcode, $message = null)
    {
        unset($_SESSION['validationErrors']);
        $s = 0;
        for ($i = 0; $i < 9; $i++) {
            $pos = $i+1;
            $s = $s + $pos * $barcode[$i];
        }

        $check = substr($barcode, -1);
        if ($s % 11 == 10 && $check === 'X') {

            return $barcode;
        }
        if ($s % 11 === $check) {

            return $barcode;
        }
        $_SESSION['validationErrors'] = 'The ' . $barcode . ' is not valid';

        return true;
    }
}
