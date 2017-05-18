<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 04/04/2017
 * Time: 21:12
 */
//http://reliandev.localhost/api/v1.0/authorize/?response_type=code&client_id=a423891fc3b976d1765e&state=xyz
//put code into command below and send via cli
//curl -u a423891fc3b976d1765e:485032f79064191751f3b8f7f15ad829 http://reliantdev.localhost/api/v1.0/token -d "grant_type=client_credentials"
//curl -u a423891fc3b976d1765e:485032f79064191751f3b8f7f15ad829 http://reliantdev.localhost/api/v1.0/token -d "grant_type=authorization_code&code=5f9048087055fe30553034ad74ae3630f5c8a855"
//Refresh token is provided along with access token, access token last 60 minutes but refresh is valid for 14 days.
//curl -u a423891fc3b976d1765e:485032f79064191751f3b8f7f15ad829 http://reliantdev.localhost/api/v1.0/token -d 'grant_type=refresh_token&refresh_token=da23695cdfbf19c53bd72cf5c3704ffcd4de80b4'
// curl http://reliantdev.localhost/api/v1.0/tenancies -d "bear"
//curl -H "Authorization: Bearer da23695cdfbf19c53bd72cf5c3704ffcd4de80b4" http://reliantdev.localhost/api/v1.0/tenancies -d "member_id=Insured"

$expires = date('Y-m-d H:i:s', 4638902400);
$current_date = new DateTime();
$expire = $current_date->modify('+100 years')->format('Y-m-d H:i:s');


//curl -u a423891fc3b976d1765e:485032f79064191751f3b8f7f15ad829 http://reliantdev.localhost/api/v1.0/token -d "grant_type=client_credentials"
//curl -u 63b40be084fed795f52f:5f119364a8547f8d5a340bbc6aa5338e http://reliantdev.localhost/api/v1.0/token -d "grant_type=authorization_code&code=0263d119f4c251b88dab08eb3a9ce5bf87546058"



//$access_token = 'fa9a587ec38698ede135964394d7bf3350f85b46';
$access_token = '9d589ebb469e665fd5bfa1dd17559edd904b3944';
//$refresh_token = '4e3740f76be81fc0b54272f500d4b32678494347';
$refresh_token = '710ac00356665239967e2f60559e3b3b33688021';
//$bearer_token = 'Authorization: Bearer ad496b3186878e9242272f6078e5f7661257f58a';
//$bearer_token = 'Authorization: Bearer da23695cdfbf19c53bd72cf5c3704ffcd4de80b4';
//$bearer_token = 'Authorization: Bearer da23695cdfbf19c53bd72cf5c3704ffcd4de80b4';
//$bearer_token = 'da23695cdfbf19c53bd72cf5c3704ffcd4de80b4';
$bearer_token = '710ac00356665239967e2f60559e3b3b33688021';
$url = 'http://reliantdev.localhost/api/v1.0/tenancies';
$url_token = 'http://reliantdev.localhost/api/v1.0/token';
//clinet id / client secret
//$user_name = "a423891fc3b976d1765e";
$user_name = "63b40be084fed795f52f";
//$password = "485032f79064191751f3b8f7f15ad829";
$password = "5f119364a8547f8d5a340bbc6aa5338e";

$post_fields = array(
//    'access_token' => $access_token,
//    'token_type' => 'bearer',
'scheme_type' => 'Insured',
'member_id' => 460,
'branch_id' => 1,

'tenancy' => array(
    'property_id' => '444',
    'property_paon' => '1',
    'property_street' => 'Street',
    'property_locality' => 'Locality',
    'property_town' => 'Town',
    'property_administrative_area' => 'administrative_area',
    'property_postcode' => 'PL97BL',
    'tenancy_start_date' => '07/04/2017',
    'tenancy_expected_end_date' => '10/10/2017',
    'rent_amount' => '525.45',
    'deposit_amount' => '1250.50',
    'deposit_received_date' => '04/04/2017',

    'people' => array(

        //Tenant
        array(
            'person_id' => 1234,
            'person_classification' => 'Lead Tenant',
            'person_firstname' => 'LeeTT',
            'person_surname' => 'PerringTT',
            'person_email' => 'lee@ico3.com',
            'person_mobile' => '07722886420'
        ),
        //Landlord
        array(
            'person_id' => 123,
            'person_classification' => 'Primary Landlord',
            'person_firstname' => 'LeeLL',
            'person_surname' => 'PerringLL',
            'person_paon' => '1',
            'person_saon' => 'saon',
            'person_street' => 'Landlord Street',
            'person_locality' => 'Locality',
            'person_town' => 'Plymouth',
            'person_administrative_area' => 'AdministrativeArea',
            'person_postcode' => 'PL68BX',
            'person_country' => 'United Kingdom',
            'person_phone' => '01752519039',
            'person_fax' => '01752666111',
            'person_email' => 'lee@verticalplus.co.uk',

        ),

    )

),
);
$date = new DateTime();

$url = 'http://reliantdev.localhost/api/v1.0/branches';
$post_fields = array(
//    'access_token' => $access_token,
//    'token_type' => 'bearer',
'scheme_type' => 'Insured',
'member_id' => 9586,
'branch_id' => 2212212,
'branch' => array(
    'branch_id' => 2212212,
    'name' => 'Lees Test Branch-'.$date->format('d-m H:i:s'),
    'paon' => 'Paon',
    'saon' => 'Saon',
    'street' => 'streets',
    'locality' => 'locality',
    'town' => 'Towning',
    'administrative_area' => 'Admin area',
    'postcode' => 'PL9 7BL',
    'phone' => '07722886420',
    'fax' => '07722886611',
    'email' => 'branch@ico3.com',
    'contact_name' => 'Mr Branch Contact',
)
);




$data_json = json_encode($post_fields);

$response = send_request($url,$bearer_token, $data_json);



if($response) {
    if($response->error == 'invalid_token') {

        $refresh_data = array(
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token,
            'client_id' => $user_name,
            'client_secret' => $password
        );
        $refresh_data = json_encode($refresh_data);

        $response = send_request($url_token,$bearer_token, $refresh_data, $user_name, $password);
        echo "Response with username and password instead to get new access token\n";
        var_dump($response);
        if($response) {
            if($response->access_token) {
                $response = send_request($url,$response->access_token, $data_json,"","", true);
                echo "Response with new bearer to tenancy\n";
                var_dump($response);
            }
        }


    }
}


function send_request($url = "", $bearer_token = "", $data_json = "", $user_name = "", $password = "",  $dump_output = false) {
    if($bearer_token != "") {
        $full_bearer_code = 'Authorization: Bearer '.$bearer_token;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', $bearer_token));


    if($bearer_token != "") {
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $full_bearer_code));
    }else {
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    }

//    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    if($user_name != "" && $password != "") {
//        curl_setopt($ch, CURLOPT_USERPWD, $user_name . ":" . $password);
    }
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    pre_r($data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HEADERFUNCTION, "HandleHeaderLine");
    $response  = curl_exec($ch);
    var_dump($response);
    if($dump_output == true) {
        var_dump($response);

    }
    $response = json_decode($response);
    $errors = curl_error($ch);
    curl_close($ch);
    pre_r($errors);
    pre_r($response);
    return $response;
}

function HandleHeaderLine( $curl, $header_line ) {
//    echo "<br>Headers: ".$header_line; // or do whatever
    return strlen($header_line);
}


//
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
////curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', $bearer_token));
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $bearer_token));
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$response  = curl_exec($ch);
//pre_r($response);
//$response = json_decode($response);
//curl_close($ch);
//pre_r($response);
//exit("RESPONSE SENT");


//$data = json_encode($post_fields);
//pre_r($data);
//$ch = curl_init($url);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//$result = curl_exec($ch);
//
//curl_close($ch);
//pre_r($result);


// member_id: 1111,
// branch_id: 2222,
// api_key: "ABCDE-12345-FGHIJ-67890-KLMNO",
// scheme_type: "Insured",
// tenancy: {
//    property_id: 4444,
//property_paon: "1",
//property_saon: "",
//property_street: "Test Street",
//….
//people: [{
//        person_id: 5555,
//		person_classification: "Lead Tenant",
//person_title: "Mrs",
//person_firstname: "Lead",
//		person_surame: "Tenant",
//		is_business: "N",
//		...
//		person_correspondence_country: "United Kingdom"
//	},{
//        person_id: 5556,
//person_classification: "Joint Tenant",
//		...
//	},{
//        person_id: 3333,
//person_classification: "Primary Landlord",
//		person_title: "Miss", "person_firstname": "Primary",
//		person_surame: "Landlord",
//		is_business: "N",
//		…
//		person_correspondence_country: "United Kingdom"
//	}]
// }
//}
