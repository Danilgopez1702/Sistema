<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="mymap">

    </div>
    <p>21.903208334500235, -102.27299367326344</p>
    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, error, options);
        } else {
            alert("Puedes Obtener Geo");
        }
        var options = {
            EnableHighAccuracy: true,
            Timeout: 500,
            MaximunAge: 0
        }

        function success(geolocationPosition) {
            let coords = geolocationPosition.coords;
            document.getElementById("mymap").innerHTML = "Latitud" + coords.latitude + "<br>" + "Longitud" + coords.longitude;
        }

        function error(err) {
            document.getElementByid("mymap").innerHTML = err.message;
        }
    </script>
</body>

</html>