<?php 
	session_start();
	require_once 'php/google-api-php-client/vendor/autoload.php';
?>
<?php
    $client = new Google_Client();
    $client->useApplicationDefaultCredentials();
    $client->addScope(Google_Service_Bigquery::BIGQUERY);
    $bigquery = new Google_Service_Bigquery($client);
    $projectId = 'abcsadq';
    $request = new Google_Service_Bigquery_QueryRequest();
    $str = '';
    if(!empty($_POST['date'])){
        $date = $_POST['date']. " 17:00:00 UTC";
        $request->setQuery("SELECT * FROM [data.covid19_italy] where date = '$date'");
        $all = false;
    }
    else{
        $request->setQuery("SELECT * FROM [data.covid19_italy] order by date desc LIMIT 10");
        $all = true;
    }
    $response = $bigquery->jobs->query($projectId, $request);
    $rows = $response->getRows();
    $str .= '<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col" class="text-center">Date</th>
            <th scope="col" class="text-center">Hospitalized Patients Symptoms</th>
            <th scope="col" class="text-center">Hospitalized Patients Intensive_care</th>
            <th scope="col" class="text-center">Total Hospitalized Patients</th>
            <th scope="col" class="text-center">Total Current Confirmed Cases</th>
        </tr>
    </thead>
    <tbody>';
    for ($i=0; $i < count($rows); $i++) { 
        $str .= "<tr>";
        for ($j=0; $j < count($rows[$i]['f']); $j++) { 
            if ($j == 0){
                $str .=  "<td class = 'date align-middle text-center'>". date('Y-m-d', $rows[$i]['f'][$j]['v']). "</td>";
            }
                else if ($j == 2){
                $str .=  "<td class = 'patients-symptoms align-middle text-center'>".number_format($rows[$i]['f'][$j]['v']). "</td>";
                }
                else if ($j == 3){
                $str .=  "<td class = 'patients-intensive-care align-middle text-center'>".number_format($rows[$i]['f'][$j]['v']). "</td>";
                }
                else if ($j == 4){
                $str .=  "<td class = 'hospitalized-patients align-middle text-center'>".number_format($rows[$i]['f'][$j]['v']). "</td>";
                }
                else if ($j == 6){
                $str .=  "<td class = 'totals align-middle text-center'>".number_format($rows[$i]['f'][$j]['v']). "</td>";
                }
        }

        $str .= "</tr>";
    }
    $str .= '</tbody></table>';
    echo(json_encode(array($str,$all)));
?>