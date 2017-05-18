<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 17/05/2017
 * Time: 10:24
 */

include("functions.php");
session_start();
$_SESSION['access_token'] = "";
$_SESSION['refresh_token'] = "";
$_SESSION['bearer_token'] = "";
$_SESSION['user_name'] = "";
$_SESSION['password'] = "";


$username = isset($_POST['user_name']) ? $_POST['user_name'] : $_SESSION['user_name'];
$password = isset($_POST['password']) ? $_POST['password'] : $_SESSION['password'];
$bearer_token = isset($_POST['refresh_token']) ? $_POST['password'] : $_SESSION['password'];
$access_token = $_POST['access_token'];
$refresh_token = $_POST['refresh_token'];
$bearer_token = $refresh_token;
$_SESSION['user_name'] = $username;
$_SESSION['password'] = $password;
$_SESSION['bearer_token'] = $bearer_token;
$url = (isset($_POST['url']) ? $_POST['url'] : "http://reliantdev.localhost/api/v1.0/tenancies");


pre_r($_POST);



$member_details = array(
    'scheme_type' => (isset($_POST['scheme_type']) ? $_POST['scheme_type'] : 'Insured'),
    'member_id' => (isset($_POST['member_id']) ? $_POST['scheme_type'] : 460),
    'branch_id' => (isset($_POST['branch_id']) ? $_POST['scheme_type'] : 1),
);
$tenancy_details = array(
    'property_id' => (isset($_POST['property_id']) ? $_POST['property_id'] : '444'),
    'property_paon' => (isset($_POST['property_paon']) ? $_POST['property_paon'] : '1'),
    'property_street' => (isset($_POST['property_street']) ? $_POST['property_street'] : 'Street'),
    'property_locality' => (isset($_POST['property_locality']) ? $_POST['property_locality'] : 'Locality'),
    'property_town' => (isset($_POST['property_town']) ? $_POST['property_town'] : 'Town'),
    'property_administrative_area' => (isset($_POST['property_administrative_area']) ? $_POST['property_administrative_area'] : 'administrative_area'),
    'property_postcode' => isset($_POST['property_postcode']) ? $_POST['property_postcode'] :'PL97BL',
    'tenancy_start_date' => isset($_POST['tenancy_start_date']) ? $_POST['tenancy_start_date'] :'07/04/2017',
    'tenancy_expected_end_date' => isset($_POST['tenancy_expected_end_date']) ? $_POST['tenancy_expected_end_date'] :'10/10/2017',
    'rent_amount' => isset($_POST['rent_amount']) ? $_POST['rent_amount'] :'525.45',
    'deposit_amount' => isset($_POST['deposit_amount']) ? $_POST['deposit_amount'] :'1250.50',
    'deposit_received_date' => isset($_POST['deposit_received_date']) ? $_POST['deposit_received_date'] :'04/04/2017',
);

$people = array(
    array(
        'person_id' => isset($_POST['person'][0]['person_id']) ? $_POST['person'][0]['person_id'] :1234,
        'person_classification' => isset($_POST['person'][0]['person_classification']) ? $_POST['person'][0]['person_classification'] :'Lead Tenant',
        'person_firstname' => isset($_POST['person'][0]['person_firstname']) ? $_POST['person'][0]['person_firstname'] :'LeeTT',
        'person_surname' => isset($_POST['person'][0]['person_surname']) ? $_POST['person'][0]['person_surname'] :'PerringTT',
        'person_email' => isset($_POST['person'][0]['person_email']) ? $_POST['person'][0]['person_email'] :'lee@ico3.com',
        'person_mobile' => isset($_POST['person'][0]['person_mobile']) ? $_POST['person'][0]['person_mobile'] :'07722886420'
    ),
    array(
        'person_id' => isset($_POST['person'][1]['person_id']) ? $_POST['person'][1]['person_id'] :123,
        'person_classification' => isset($_POST['person'][1]['person_classification']) ? $_POST['person'][1]['person_classification'] :'Primary Landlord',
        'person_firstname' => isset($_POST['person'][1]['person_firstname']) ? $_POST['person'][1]['person_firstname'] :'LeeLL',
        'person_surname' => isset($_POST['person'][1]['person_surname']) ? $_POST['person'][1]['person_surname'] :'PerringLL',
        'person_paon' => isset($_POST['person'][1]['person_paon']) ? $_POST['person'][1]['person_paon'] :'1',
        'person_saon' => isset($_POST['person'][1]['person_saon']) ? $_POST['person'][1]['person_saon'] :'saon',
        'person_street' => isset($_POST['person'][1]['person_street']) ? $_POST['person'][1]['person_street'] :'Landlord Street',
        'person_locality' => isset($_POST['person'][1]['person_locality']) ? $_POST['person'][1]['person_locality'] :'Locality',
        'person_town' => isset($_POST['person'][1]['person_town']) ? $_POST['person'][1]['person_town'] :'Plymouth',
        'person_administrative_area' => isset($_POST['person'][1]['person_administrative_area']) ? $_POST['person'][1]['person_administrative_area'] :'AdministrativeArea',
        'person_postcode' =>isset($_POST['person'][1]['person_postcode']) ? $_POST['person'][1]['person_postcode'] :'PL68BX',
        'person_country' => isset($_POST['person'][1]['person_country']) ? $_POST['person'][1]['person_country'] :'United Kingdom',
        'person_phone' => isset($_POST['person'][1]['person_phone']) ? $_POST['person'][1]['person_phone'] :'01752519039',
        'person_fax' => isset($_POST['person'][1]['person_fax']) ? $_POST['person'][1]['person_fax'] :'01752666111',
        'person_email' => isset($_POST['person'][1]['person_email']) ? $_POST['person'][1]['person_email'] :'lee@verticalplus.co.uk',
    )

);




if(!empty($_POST)) {





}






//
//$tenant_details = array(
//    'person_id' => 1234,
//    'person_classification' => 'Lead Tenant',
//    'person_firstname' => 'LeeTT',
//    'person_surname' => 'PerringTT',
//    'person_email' => 'lee@ico3.com',
//    'person_mobile' => '07722886420'
//);
//
//$landlord_details = array(
//    'person_id' => 123,
//    'person_classification' => 'Primary Landlord',
//    'person_firstname' => 'LeeLL',
//    'person_surname' => 'PerringLL',
//    'person_paon' => '1',
//    'person_saon' => 'saon',
//    'person_street' => 'Landlord Street',
//    'person_locality' => 'Locality',
//    'person_town' => 'Plymouth',
//    'person_administrative_area' => 'AdministrativeArea',
//    'person_postcode' => 'PL68BX',
//    'person_country' => 'United Kingdom',
//    'person_phone' => '01752519039',
//    'person_fax' => '01752666111',
//    'person_email' => 'lee@verticalplus.co.uk',
//);

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="/js/jquery/jquery-1.11.0.min.js"></script>
    <script src="/js/jquery/jquery-ui-1.10.4.min.js"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
</head>
<body>

<div class=" container-fluid">
<div class="row">

    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Developer Login
            </div>
            <div class="panel-body">
                <form method="post" class="form-inline">
                    <label>Username:</label><input type="text" class="form-control" name="user_name" value="<?=$_SESSION['user_name']?>"/>
                    <label>Password:</label><input type="text"  class="form-control"  name="password" value="<?=$_SESSION['password']?>"/>
                    <label>Access Token:</label><input type="text" class="form-control"  name="access_token" value="<?=$_SESSION['access_token']?>"/>
                    <label>Refresh Token:</label><input type="text" class="form-control"  name="refresh_token" value="<?=$_SESSION['refresh_token']?>"/>
                    <input type="submit" value="Submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
    </div>


    <!--Member-->
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tenancy Detail
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="col-xs-12">
                    <?php
                    echo '<h3>Member details</h3>';
                    foreach($member_details as $key => $value) {
                        echo '<label>'.$key.'</label><input class="form-control" type="text" name="'.$key.'" value="'.$value.'">';
                    }
                    echo '</div>';
                    echo '<div class="col-xs-6">';
                    echo '<h3>Tenancy details</h3>';
                    foreach($tenancy_details as $key => $value) {
                        echo '<label>'.$key.'</label><input class="form-control" type="text" name="'.$key.'" value="'.$value.'">';
                    }
                    echo '</div>';
                    echo '<div class="col-xs-6">';
                    echo '<h3>People details</h3>';
                    foreach($people as $id => $person) {
                        echo '<h3>'.($id == 1 ? "Landlord": "Tenant") .'</h3>';
                        foreach($person as $key => $value) {
                            echo '<label>'.($id == 1 ? "Landlord": "Tenant") .'-'. $key.'</label><input class="form-control" type="text" name="person['.$id.']['.$key.']" value="'.$value.'">';
                        }
                    }
                    echo '</div>';
                    ?>
                    <br />
                        <label>URL Destination:</label><input type="text" name="url" value="<?=$url?>" class="form-control"/>
                        <br/>
                    <input type="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
    </div>


</div>
</div>
</body>
</html>