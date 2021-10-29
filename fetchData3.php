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
    $request2 = new Google_Service_Bigquery_QueryRequest();
    $str = '';
    $limit = 10;

    if (isset($_POST['page']) && $_POST['page'] != NULL) {
	    $page_no = $_POST['page'];
	}else{
	    $page_no = 1;
	}
    $offset = ($page_no-1) * $limit;
    $request->setQuery("SELECT * FROM [data.covid19_italy] order by date desc");
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
    $data = array(date('m/d/Y', $rows[0]['f'][0]['v']),$rows[0]['f'][9]['v'],$rows[0]['f'][10]['v'],$rows[0]['f'][11]['v'],$rows[0]['f'][12]['v']);
    for ($i=$offset; $i < $offset + $limit; $i++) { 
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
    $str .= '</tbody></table></div>';
    $totalRecord = count($rows);
    $totalPage = ceil($totalRecord/$limit);
    $str.="<ul class='pagination justify-content-center' style='margin:20px 0'>";
    for ($i=$page_no; $i <= $page_no; $i++) { 
        $j = $i-2;
        $k = $i-1;
        $m = $i+1;
        $n = $i+2;
        $last = $totalPage;
        if ($i == $page_no) {
        $active = "active";
        }else{
        $active = "";
        }
        if($i == 3 ){
            $str.="<li class='page-item'><a class='page-link' id='$j' href=''>$j</a></li>
            <li class='page-item'><a class='page-link' id='$k' href=''>$k</a></li>
            <li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>
            <li class='page-item'><a class='page-link' id='$m' href=''>$m</a></li>
            <li class='page-item'><a class='page-link' id='$n' href=''>$n</a></li>
            <li class='page-item disabled' ><a class='page-link' href=''tabindex='-1' aria-disabled='true' >...</a></li>
            <li class='page-item'><a class='page-link' id='$totalPage' href=''>$totalPage</a></li>
            "
            ;
        }
        else if($i == 2){
            $str.="
            <li class='page-item'><a class='page-link' id='$k' href=''>$k</a></li>
            <li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>
            <li class='page-item'><a class='page-link' id='$m' href=''>$m</a></li>
            <li class='page-item'><a class='page-link' id='$n' href=''>$n</a></li>
            <li class='page-item disabled' ><a class='page-link' href=''tabindex='-1' aria-disabled='true' >...</a></li>
            <li class='page-item'><a class='page-link' id='$totalPage' href=''>$totalPage</a></li>
                ";
        }
        else if($i == 1) {
            $str.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>
            <li class='page-item'><a class='page-link' id='$m' href=''>$m</a></li>
            <li class='page-item'><a class='page-link' id='$n' href=''>$n</a></li>
            <li class='page-item disabled' ><a class='page-link' href=''tabindex='-1' aria-disabled='true' >...</a></li>
            <li class='page-item'><a class='page-link' id='$totalPage' href=''>$totalPage</a></li>
            ";
        }
        else if ($i == $last){
            $str.="
            <li class='page-item'><a class='page-link' id='1' href=''>1</a></li>
            <li class='page-item disabled' ><a class='page-link' href=''tabindex='-1' aria-disabled='true' >...</a></li>
            <li class='page-item'><a class='page-link' id='$j' href=''>$j</a></li>
            <li class='page-item'><a class='page-link' id='$k' href=''>$k</a></li>
            <li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>
            ";
        }
        else if ($i == $last - 1){
            $str.="
            <li class='page-item'><a class='page-link' id='1' href=''>1</a></li>
            <li class='page-item disabled' ><a class='page-link' href=''tabindex='-1' aria-disabled='true' >...</a></li>
            <li class='page-item'><a class='page-link' id='$j' href=''>$j</a></li>
            <li class='page-item'><a class='page-link' id='$k' href=''>$k</a></li>
            <li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>
            <li class='page-item'><a class='page-link' id='$m' href=''>$m</a></li>
            ";
        }
        else if ($i == $last - 2){
            $str.="
            <li class='page-item'><a class='page-link' id='1' href=''>1</a></li>
            <li class='page-item disabled' ><a class='page-link' href=''tabindex='-1' aria-disabled='true' >...</a></li>
            <li class='page-item'><a class='page-link' id='$k' href=''>$k</a></li>
            <li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>
            <li class='page-item'><a class='page-link' id='$m' href=''>$m</a></li>
            <li class='page-item'><a class='page-link' id='$n' href=''>$n</a></li>
            ";
        }
        else{
            $str.="<li class='page-item' ><a class='page-link' id='1' href=''>1</a></li>
            <li class='page-item disabled' ><a class='page-link' href=''tabindex='-1' aria-disabled='true' >...</a></li>
            <li class='page-item'><a class='page-link' id='$j' href=''>$j</a></li>
            <li class='page-item'><a class='page-link' id='$k' href=''>$k</a></li>
            <li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>
            <li class='page-item'><a class='page-link' id='$m' href=''>$m</a></li>
            <li class='page-item'><a class='page-link' id='$n' href=''>$n</a></li>
            <li class='page-item disabled' ><a class='page-link' href=''tabindex='-1' aria-disabled='true' >...</a></li>
            <li class='page-item'><a class='page-link' id='$totalPage' href=''>$totalPage</a></li>
            "
            ;
        }
    }
    $str .= "</ul>";
    echo json_encode(array($str,$data));
?>