<?php

include_once './models/auto-call/php/StringeeApi/StringeeCurlClient.php';


function sendCode($sdt, $code)
{
    $sdt = substr_replace($sdt, "", 0, 1);
    $code = str_split($code);
    $formatCode = implode(". ", $code);
    $keySid = 'SK.0.hYepSBPOSWuElZWJHLY6ini2h2nmpvL';
    $keySecret = 'ZVh4SWtUdVB1Yno5eUJIY0dOUGpaR01tS3RsdFc4T1I=';

    $curlClient = new StringeeCurlClient($keySid, $keySecret);
    $url = 'https://api.stringee.com/v1/call2/callout';

    $data = '{
    "from": {
        "type": "external",
        "number": "842871010667",
        "alias": "842871010667"
    },
    "to": [{
        "type": "external",
        "number": "84' . $sdt . '",
        "alias": "84' . $sdt . '"
    }],
    "answer_url": "https://example.com/answerurl",
    "actions": [{
        "action": "talk",
        "text": "Chào mừng bạn đã đến với Shoes shop đây là mã xác thực số điện thoại của bạn: ' . $formatCode . '",
        "loop": 2,
        "speed": -1,
    }]
}';

    $resJson = $curlClient->post($url, $data, 15);
    $status = json_decode($resJson->getStatusCode());

    $content = $resJson->getContent();
}

// echo '$status: ' . $status . '<br>';
// echo '$content: ' . $content . '<br>';
