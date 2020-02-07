<?php

require_once ('AbstractRule.php');

class n10Rule extends AbstractRule
{
    public function validateRule($qrCode, $message=null)
    {
        unset($_SESSION['validationErrors']);
        $s = 0;
        for ($i = 0; $i < 9; $i++) {
            $pos = $i+1;
            $s = $s + $pos * $qrCode[$i];
        }

        $check = substr($qrCode, -1);
        if ($s % 11 == 10 && $check === 'X') {

            return $qrCode;
        }
        if ($s % 11 == $check) {

            return $qrCode;
        }
        $_SESSION["validationErrors"] = $message;

        return true;
    }
}
