<?php
require_once ('./QRValidator/Validator.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validator();

    if (isset($_POST['barcode'])) {
        $codeToCheck = $validator->check($_POST['barcode']);
    }

    if ($validator->hasError()) {
        echo $validator->hasError();
    } else {
        echo 'Bar Code is valid';
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label>
        <input type="text" name="barcode" value="<?php echo isset($codeToCheck) ? $codeToCheck : '';?>">
    </label>
    <input type="submit" value="Check Code">
</form>