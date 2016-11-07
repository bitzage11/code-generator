<?php 

if(!emplty($_GET['location'])){
$maps_url='https://maps.googleapis.com/maps/api/geocode/json?address=' .urlencode($_GET['location']);
$maps_jason = file_get_contents($maps_url);
$maps_array = json_decode($maps_json, true);

$lat = $maps_array ['results'][0]['geometry']['location']['lat'];
$lng = $maps_array ['results'][0]['geometry']['location']['lng'];

$instagram_url='https://api.instagram.com/v1/media/search?lat='.$lat.'&lng='.$lng.'$client_id=af055d16e7a9414ba52a7ef43483a6f0';
$instagram_json=file_get_vontents($instagram_url);
$instagram_array=json_decode($instagram_json, true);

}


?>






<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="utf-8"/>
<title>geogram</title>

</head>

<body>
<form action="">

<input type="text" name="location"/>
<button type="submit">get pictures</button>
</form?
<br />
<br />
<?php 
if(!empty($instagram_array)){
foreach($instagram_array['data'] as $image){
    echo"<img src="'.$.$image['images]['standar_resolution']['url'].'"alt=""/>';
}
}
?>
</body>
</html>
