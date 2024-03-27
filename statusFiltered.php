<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Website</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
    <main>
        <nav>
            <a href="index.php">First page</a>
        </nav>    

        <a href="status.php">Back to non-filtered</a>

        <div>
            <?php

                $leads = json_decode(getStatuses(), true);
                $data = $leads['data'];
                $data = array_reverse($data);

                echo '<table class="status-table">
                        <tr>
                            <th class="status-table-column">ID</th>
                            <th class="status-table-column">email</th>
                            <th class="status-table-column">status</th>
                            <th class="status-table-column">ftd</th>
                        </tr>';

                foreach($data as $lead) {
                    echo "<tr><td class='status-table-row'>{$lead['id']}</td>
                              <td class='status-table-row'>{$lead['email']}</td>
                              <td class='status-table-row'>{$lead['status']}</td>
                              <td class='status-table-row'>{$lead['ftd']}</td></tr>";
                }

                echo "</table>";
            ?>
        </div> 



    </main>
  </body>
</html>


<?php

function getStatuses(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
     CURLOPT_URL => 'https://crm.belmar.pro/api/v1/getstatuses',
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'POST',
     CURLOPT_POSTFIELDS =>'{
       "date_from" : "2022-12-01 00:00:00",  // default -30days, max -60days
       "date_to" : "2022-12-31 23:59:59",    // default now
       "page" : 0,     // default 0
       "limit" : 100   // default 100, max 500
     }',
     CURLOPT_HTTPHEADER => array(
       'Content-Type: application/json',
       'token: ba67df6a-a17c-476f-8e95-bcdb75ed3958'
     ),
   ));
  
   $response = curl_exec($curl);
  
   curl_close($curl);
   return $response;

}

?>