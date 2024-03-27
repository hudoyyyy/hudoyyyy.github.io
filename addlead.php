<?php
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://crm.belmar.pro/api/v1/addlead',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "firstName" : "{$_POST[firstName]}",                 // require
            "lastName" : "{$_POST[lastName]}",                  // require
            "phone" : "{$_POST[phone]}",                     // require
            "email" : "{$_POST[email]}",                     // require
            "countryCode" : "RU",               // require ISO 3166 Alpha-2 (example )
            "box_id" : "28",                    // require (get from your manager)
            "offer_id" : "3",                  // require (get from your manager)
            "landingUrl" : "{$_SERVER[HTTP_REFERER])}",                // require
            "ip" : "{$_SERVER[REMOTE_ADDR]}",                        // require
            "password" : "qwerty12",
            "language" : "ru",
            "clickId" : "",
            "quizAnswers" : "",
            "custom1" : "",
            "custom2" : "",
            "custom3" : ""
          }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'token: ba67df6a-a17c-476f-8e95-bcdb75ed3958'
          ),
        ));
       
        $response = curl_exec($curl);
    
        curl_close($curl);
        echo $response; 
?>