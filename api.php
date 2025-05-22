<?php

require 'vendor/autoload.php';
$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://centralusdtapp18.epicorsaas.com/saas682/api/v2/odata/14281/BaqSvc/CCT_ECommLookup/Data', [
    'headers' => [
        'Authorization' => 'Basic RXRlcm5hbFdvcmtzOl5ZUGF2aTgzYk02eUI5',
        'x-api-key' => 'api_key',
        'accept' => 'application/json',
        'content-type' => 'application/json',
    ],
]);
$res = (json_decode($response->getBody(),true));
$result = $res["value"];
//print_r($result);

//Getting variables from Software
foreach ($result as $key => $value) {
    if ($value['ProdType_CodeDesc'] != "") {
        $system_type = $value['ProdType_CodeDesc'];
    }
    if ($value['Calculated_UseType'] != "") {
        $use_type = $value['Calculated_UseType'];
    }
    if ($value['Calculated_Size'] != "") {
        $size = $value['Calculated_Size'];
    }
    if ($value['Temps_CodeDesc'] != "") {
        $temperature_range = $value['Temps_CodeDesc'];
    }
    if ($value['Durations_CodeDesc'] != "") {
        $duration = $value['Durations_CodeDesc'];
    }
    if ($value['Brands_CodeDesc'] != "") {
        $brand_name = $value['Brands_CodeDesc'];
    }
    if ($value['Calculated_BC_ProductUrl'] != "") {
        $add_external_link_here = $value['Calculated_BC_ProductUrl'];
    }
    if ($value['Part_PartNum'] != "") {
        $part_model_number = $value['Part_PartNum'];
    }
    if ($value['Calculated_IDHeightIN'] != "") {
        $payload_dimensions_height_inches = $value['Calculated_IDHeightIN'];
    }
    if ($value['Calculated_IDHeightCM'] != "") {
        $payload_dimensions_height_centimeters = $value['Calculated_IDHeightCM'];
    }
    if ($value['Calculated_IDLengthIN'] != "") {
        $payload_dimensions_length_inches = $value['Calculated_IDLengthIN'];
    }
    if ($value['Calculated_IDLengthCM'] != "") {
        $payload_dimensions_length_centimeters = $value['Calculated_IDLengthCM'];
    }
    if ($value['Calculated_IDWidthIN'] != "") {
        $payload_dimensions_width_inches = $value['Calculated_IDWidthIN'];
    }
    if ($value['Calculated_IDWidthCM'] != "") {
        $payload_dimensions_width_centimeters = $value['Calculated_IDWidthCM'];
    }
    if ($value['Calculated_ODHeightIN'] != "") {
        $external_dimensions_height_inches = $value['Calculated_ODHeightIN'];
    }
    if ($value['Calculated_ODHeightCM'] != "") {
        $external_dimensions_height_centimeters = $value['Calculated_ODHeightCM'];
    }
    if ($value['Calculated_ODLengthIN'] != "") {
        $external_dimensions_length_inches = $value['Calculated_ODLengthIN'];
    }
    if ($value['Calculated_ODLengthCM'] != "") {
        $external_dimensions_length_centimeters = $value['Calculated_ODLengthCM'];
    }
    if ($value['Calculated_ODWidthIN'] != "") {
        $external_dimensions_width_inches = $value['Calculated_ODWidthIN'];
    }
    if ($value['Calculated_ODWidthCM'] != "") {
        $external_dimensions_width_centimeters = $value['Calculated_ODWidthCM'];
    }
    if ($value['Calculated_Volume'] != "") {
        $payload_volume = $value['Calculated_Volume'];
    }
    if ($value['Calculated_Weight'] != "") {
        $weight = $value['Calculated_Weight'];
    }
    if ($value['Temps_CodeDesc'] != "") {
        $response_temperatures = $value['Temps_CodeDesc'];
    }

    $response_time = $value['Part_RespTime_c'];


    $storage_temperature = $value['Part_StorageTemp_c'];

    if ($value['Part_LotShelfLife'] != "") {
        $shelf_life = $value['Part_LotShelfLife'];
    }
    if ($value['Sizes_CodeDesc'] != "") {
        $device_size = $value['Sizes_CodeDesc'];
    }
    if ($value['Calculated_ODHeightCM'] != "") {
        $external_dimensions_hxwxd = $value['Calculated_ODHeightCM'];
    }
    if ($value['Calculated_IDHeightCM'] != "") {
        $internal_dimensions_hxwxd = $value['Calculated_IDHeightCM'];
    }
    if ($value['Part_PartNum'] != "") {
        $path = $value['Part_PartNum'];
    }
    if ($value['Brands_CodeDesc'] != "") {
        $name = $value['Brands_CodeDesc'];
    }


//Sending to HubDB
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.hubapi.com/cms/v3/hubdb/tables/7146406/rows',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{ "values":{
        "system_types" : "' . $system_type . '",
        "use_type" : "' . $use_type . '",
        "size" : "' . $size . '",
        "temperature_range" : "' . $temperature_range . '",
        "duration" : "' . $duration . '",
        "brand_name" : "' . $brand_name . '",
        "add_external_link_here" : "' . $add_external_link_here . '",
        "part_model_number" : "' . $part_model_number . '",
        "payload_volume" : "' . $payload_volume . '",
        "weight" : "' . $weight . '",
        "response_temperatures" : "' . $response_temperatures . '",
        "response_time" : "' . $response_time . '",
        "storage_temperature" : "' . $storage_temperature . '",
        "shelf_life" : "' . $shelf_life . '",
        "device_size" : "' . $device_size . '",
        "temperature_profile" : "'.$temperature_range.'",
        "payload_dimensions_height_inches":"'.$payload_dimensions_height_inches.'",
        "payload_dimensions_height_centimeters":"'.$payload_dimensions_height_centimeters.'",
        "payload_dimensions_length_inches":"'.$payload_dimensions_length_inches.'",
        "payload_dimensions_length_centimeters":"'.$payload_dimensions_length_centimeters.'",
        "payload_dimensions_width_inches":"'.$payload_dimensions_width_inches.'",
        "payload_dimensions_width_centimeters":"'.$payload_dimensions_width_centimeters.'",
        "external_dimensions_height_inches":"'.$external_dimensions_height_inches.'",
        "external_dimensions_height_centimeters":"'.$external_dimensions_height_centimeters.'",
        "external_dimensions_length_inches":"'.$external_dimensions_length_inches.'",
        "external_dimensions_length_centimeters":"'.$external_dimensions_length_centimeters.'",
        "external_dimensions_width_inches":"'.$external_dimensions_width_inches.'",
        "external_dimensions_width_centimeters":"'.$external_dimensions_width_centimeters.'"
    },
    "path": "' . $path . '",
    "name": "' . $name . '"
}',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer token',
            'Content-Type: application/json'
        ),
    ));
    $result2 = json_decode(curl_exec($curl), true);
}
?>
<pre>
    <?php print_r($result2); ?>
</pre>