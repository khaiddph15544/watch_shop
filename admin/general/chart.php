<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['cate_name', 'quantity'],
                <?php
                foreach ($list as $thong_ke) {
                    echo "['$thong_ke[cate_name]', $thong_ke[quantity]],";
                }
                ?>
            ]);
            var options = {
                title: 'TỶ LỆ HÀNG HÓA',
                is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="piechart_3d" style="width: 900px; height: 500px; fill: whitesmoke;"></div>
</body>

</html>