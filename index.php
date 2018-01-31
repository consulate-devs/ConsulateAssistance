<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$sso = $json->result->parameters->ssoname;
    $lcSso = strtolower($sso);
    $allSsos = array("PCC","PCC","pcc sso","Consulnet","Consulnet","GTM","GTM","go to meeting","gtm sso","go to meeting sso","iCims","iCims","I sims","i sims sso","Simple LTC","SimpleLTC","Simple ltc","Simple ltc sso","PeopleNet","PeopleNet","People net","People Net SSO","Team TSI","TeamTSI","Team TSI","Team TSI SSO","TSI","ServiceNow","ServiceNow","Service Now","Service Now SSO","Tangoe","Tangoe","Tangoe SSO","Omniview","Omniview","Omniview SSO","Power DMS","PowerDMS","Power DMS","Power DMS SSO");

    if(in_array($lcSso, array_map("strtolower", $allSsos))){
        $speech = "$sso is off the hook.";
//        $speech = "yes";
    }
    else{
        $speech = "$sso is not off the hook.";
//        $speech = "no";
        
    }
//	switch ($sso) {
//		case 'pcc':
//			$speech = "PCC is off the hook." + count($allSssos);
//			break;
//
//		case 'consulnet':
//			$speech = "Consulnet is off the hook";
//			break;
//
//		case 'anything':
//			$speech = "Anything off the hook.";
//			break;
//		
//		default:
//			$speech = "Sorry, that's not off the hook.";
//			break;
//	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>