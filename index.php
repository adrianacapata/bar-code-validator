<?php
require_once ('./QRValidator/Validator.php'); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new Validator();

    if (isset($_POST["qr"])) {
        $codeToCheck = $validator->check($_POST["qr"]);
    }

    if ($validator->hasError()) {
        echo $validator->hasError();
    } else {
        echo "QR Code is valid";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"> 
    <input type="text" name="qr" value="<?php echo isset($codeToCheck) ? $codeToCheck : '';?>">
    <input type="submit" value="Check Code">
</form>