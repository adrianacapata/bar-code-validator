<?php

require_once ('AbstractRule.php');

class n13Rule extends AbstractRule
{
    public function validateRule($barcode, $message=null)
    {
        unset($_SESSION['validationErrors']);
        $s = 0;

        for ($i = 0; $i < 12; $i++) {
            if ($i % 2 == 0) {
                $pos = 1;
            } else {
                $pos = 3;
            }
            $s = $s + $pos * $barcode[$i];
        }
        $check = substr($barcode, -1) ;

        if (! ($check == (10 - ($s % 10))%10)) {

            $_SESSION['validationErrors'] = 'The ' . $barcode . ' is not valid';
        }
        return true;
    }
}
