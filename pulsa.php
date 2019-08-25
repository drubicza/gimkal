<?php
function fn_reff($i, $s_ref, $s_key)
{
    $s_prefix[0]  = "0817";
    $s_prefix[1]  = "0818";
    $s_prefix[2]  = "0819";
    $s_prefix[3]  = "0859";
    $s_prefix[4]  = "0877";
    $s_prefix[5]  = "0878";
    $s_prefix[6]  = "0896";
    $s_prefix[7]  = "0897";
    $s_prefix[8]  = "0898";
    $s_prefix[9]  = "0899";
    $s_prefix[10] = "0811";
    $s_prefix[11] = "0812";
    $s_prefix[12] = "0813";
    $s_prefix[13] = "0821";
    $s_prefix[14] = "0822";
    $s_prefix[15] = "0823";
    $s_prefix[16] = "0852";
    $s_prefix[17] = "0851";
    $s_prefix[18] = "0855";
    $s_prefix[19] = "0856";
    $s_prefix[20] = "0857";
    $s_prefix[21] = "0858";
    $s_prefix[22] = "0814";
    $s_prefix[23] = "0815";
    $s_prefix[24] = "0816";

    $s_phone = $s_prefix[rand(0, 24)];
    $s_rname = file_get_contents("https://api.randomuser.me");
    $s_uname = json_decode($s_rname,true);
    $s_frst  = $s_uname["results"][0]["name"]["first"];
    $s_last  = $s_uname["results"][0]["name"]["last"];
    $i_rnd1  = "133830458".rand(0,999999);
    $i_numb  = "012345678910";
    $i_temp  = "";

    for ($i = 0; $i < 6; $i++) {
        $i_temp .= $i_numb[mt_rand(0, strlen($i_numb)-1)];
    }

    $i_rnd2 = rand(0,9999);
    $s_data = "USERNAME=".$s_last."".$i_rnd2."&NoHP=".$s_phone."14".$i_temp."&IMEI=".$i_rnd1."&SKOR=200&UPLINE=".$s_ref."";
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,"http://gimkal.000webhostapp.com/REFERAL.php");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$s_data);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");

    $a_hdr   = array();
    $a_hdr[] = "Content-Type: application/x-www-form-urlencoded";
    $a_hdr[] = "User-Agent: Dalvik/2.1.0 (Linux; U; Android 8.1.0; Redmi 6 MIUI/V10.3.3.0.OCGMIXM)";
    $a_hdr[] = "Host: gimkal.000webhostapp.com";

    curl_setopt($ch,CURLOPT_HTTPHEADER,$a_hdr);
    $c_res = curl_exec($ch);
    return $c_res;
}

print "Thanks To : Muhammad Ikhsan Aprilyadi\n\nReff : ";
$s_iref = trim(fgets(STDIN));
echo "Key : ";
$s_ikey = trim(fgets(STDIN));

if ($s_ikey == "nabila") {
    for($i = 0; $i < 20; $i++) {
        $s_result = fn_reff($i, $s_iref, $s_ikey);
        echo "".$s_result."\n";
    }
}
?>
