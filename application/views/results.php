<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="../assets/Images/icon.png">
	<link rel="stylesheet"
		  href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/css/ol.css"
		  type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
			integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
			crossorigin="anonymous"></script>

	<style>
		body {
			background-color: #f5f6fa;
		}

		.map {
			height: 500px;
			width: 100%;
		}

		input {
			margin: 15px;
			border-radius: 5px;
			border: 1px solid #576574;
			width: 70px;
			height: 30px;
			outline: transparent;
		}
	</style>
	<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/build/ol.js"></script>
	<title>AirQuality</title>
</head>
<body>
<div class="container">
	<h2><u><?php echo $city . ', ' . $country ?></u></h2>

	<label>Pollution (Air Quality Index):</label>
	<input id="1" type="text" name="1" readonly="readonly" value="<?php echo $aqi ?>"
		   style="text-align: center; background-color: <?php echo $color ?>">
	<a class="btn btn-primary btn-small" data-toggle="popover-hover"
	   data-img="https://www.epa.gov/sites/production/files/2014-09/aqiguidepm.png">?</a>
	<br/>
	<label>Temperature (°C):</label>
	<input id="2" type="text" name="2" readonly="readonly" value="<?php echo $temperature ?>"
		   style="text-align: center;">
	<br/>
	<label>Atmospheric Pressure (hPa):</label>
	<input id="3" type="text" name="3" readonly="readonly" value="<?php echo $pressure ?>" style="text-align: center;">
	<br/>
	<label>Humidity %:</label>
	<input id="4" type="text" name="4" readonly="readonly" value="<?php echo $humidity ?>" style="text-align: center;">
	<br/>
	<label>Wind Speed (km/h):</label>
	<input id="5" type="text" name="4" readonly="readonly" value="<?php echo $wind_speed ?>"
		   style="text-align: center;">

	<div id="map" class="map"></div>

	<script type="text/javascript">

        var lon = parseFloat('<?php echo $coordinates[0] ?>').toFixed(2);
        var lat = parseFloat('<?php echo $coordinates[1] ?>').toFixed(2);

        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([lon, lat]),
                zoom: 10
            })
        });


        $('[data-toggle="popover-hover"]').popover({
            html: true,
            trigger: 'hover',
            placement: 'right',
            content: function () {
                return '<img src="' + $(this).data('img') + '" />';
            }
        });
	</script>
</div>
</body>
</html>
