<?php
error_reporting(0);
/** COPYRIGHT
@@ CREATOR : WAHYU ARIF P x IDSYSTEM404
@@ DDMMYY  : 02 Desember 2018
**/
function generateRandomStringDevice($length = 6) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomStringNo($length = 9) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomStringNoEmail($length = 5) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomStringPass($length = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function reff($reff, $pass)
{
    $randDevice     = generateRandomStringDevice();
    $randNo         = generateRandomStringNo();
    $rand           = generateRandomStringNoEmail();
    $pass           = generateRandomStringPass();
    $get            = file_get_contents("https://api.randomuser.me");
    $j              = json_decode($get, true);
    $getName        = $j['results'][0]['name']['first'];
    $getName2       = $j['results'][0]['name']['last'];
    $no             = '834' . $randNo;
    $device         = $randDevice . 'BD0F688E56BD83903351' . $randDevice;
    $ch             = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://appmoneylabs.com/webservices/signup.php?device_id=' . $device . '&name=' . $getName . '%20' . $getName2 . '&phone=' . $no . '&email=' . $getName . '' . $rand . '@gmail.com&password=' . $pass . '' . $rand . '&refferal_id=' . $reff . '');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    return $result;
}
print "Earn Money - Easy Cash App\n";
print "Creator : IDSYSTEM404\n";
echo "Refferal : ";
$reff = trim(fgets(STDIN));
echo "Jumlah : ";
$jum = trim(fgets(STDIN));
echo "Mulai Suntik Balance " . $reff . "\n\n";
for ($a = 0; $a < $jum; $a++) {
    $asw = json_decode(reff($reff, $a));
    $cuk = $asw->msg;
    echo "" . $cuk . "\n";
}
?>