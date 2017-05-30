<?php

if (isset($_POST['submit'])) {
    $phoneNumber = $_POST['phoneNumber'] ?? '';

    checkPhoneNumber($phoneNumber);
}

function checkPhoneNumber($phoneNumber)
{
    try {
        if (trim($phoneNumber) == "") {
            throw new Exception('Error: Phone number not empty! <br/>');
        } elseif (!is_numeric($phoneNumber)) {
            throw new Exception('Error: Phone number must be numeric! <br/>');
        } elseif (strlen($phoneNumber) != 10 && strlen($phoneNumber) != 11) {
            throw new Exception('Error: Phone number must be have ten or eleven number! <br/>');
        } else {
            if(checkAvailablePhoneNumber($phoneNumber) == false) {
                throw new Exception('Error: Phone number is not formatted correctly! <br/>');
            } else {
                echo "Correctly!!!";
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function checkAvailablePhoneNumber($phoneNumber)
{
    $flag = false;
    $arrayPhoneNumber = array(
        '098', '097', '096', '0169', '0168', '0167', '0166', '0165', '0164', '0163',
        '0162', '091', '094', '0123', '0124', '0125', '0127', '0129', '090', '093',
        '0120', '0121', '0122', '0126', '0128'
    );

    if (strlen($phoneNumber) == 10) {
        $threeNumber = substr($phoneNumber, 0, 3);
        if (in_array($threeNumber, $arrayPhoneNumber)) {
            $flag = true;
        }
    } else {
        $fourNumber = substr($phoneNumber, 0, 4);
        if (in_array($fourNumber, $arrayPhoneNumber)) {
            $flag = true;
        }
    }

    return $flag;
}

?>
<form method="post">
    <input type="text" name="phoneNumber" value="<?php echo $_POST['phoneNumber'] ?? ''; ?>">
    <input type="submit" name="submit" value="Check">
</form>