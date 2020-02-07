<?php

require_once ('AbstractRule.php');

class n13Rule extends AbstractRule
{
    public function validateRule($qrCode, $message=null)
    {
        unset($_SESSION['validationErrors']);
        $s = 0;

        for ($i = 0; $i < 12; $i++) {
            if ($i % 2 == 0) {
                $pos = 1;
            } else {
                $pos = 3;
            }
            $s = $s + $pos * $qrCode[$i];
        }
        $check = substr($qrCode, -1) ;

        if (! ($check == (10 - ($s % 10))%10)) {

            $_SESSION['validationErrors'] = $message;
        }
        return true;
    }
}
