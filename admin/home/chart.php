<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	// theme: "light2",
	title:{
		text: "Doanh thu các ngày trong tháng 12 năm 2021"
	},
	axisX:{
		crosshair: {
			enabled: false,
			snapToDataPoint: true
		}
	},
	axisY:{
		title: "Doanh thu",
		includeZero: true,
		crosshair: {
			enabled: false,
			snapToDataPoint: true
		}
	},
	toolTip:{
		enabled: true
	},
	data: [{
		type: "area",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
</body>
</html>