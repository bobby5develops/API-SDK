<?php

// load the air-port-codes library
require_once('../air-port-codes-api.php');

// Setup request parameters to override the configparams set in apc class
$params = [
    'country' => 'US',
    'is_select_options' => true, // builds select options (<option value="LO">London</option)
    'selected' => 'NY', // preselect the country based on ISO
    // 'ip_address' => '72.229.28.185' // preselect the country based on this ip address
];

// initialize the apc object
$apc = new apc('states', $params);

// make the request
$apcResponseObj = $apc->request(); 
?>

<?php if ($apcResponseObj->status) : ?>
<select>
<?= $apcResponseObj->states; ?>
</select>
<?php else : ?>
<pre>
<?= $apcResponseObj->message; ?>
</pre>
<?php endif ?>