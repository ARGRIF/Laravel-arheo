




var ctxD = document.getElementById("doughnutChart").getContext('2d');
var myLineChart = new Chart(ctxD, {
    type: 'doughnut',
    data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
            data: [300, 50, 100, 40, 120],
            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
    },
    options: {
        responsive: true
    }
});


function initMap() {

    var lat = 50.395757;
    var lng = 25.763518;

    var opt = {
        center: {lat: lat, lng: lng},
        zoom: 16,
        disableDefaultUI: true,
        mapTypeId: 'satellite',

    }
    var map = new google.maps.Map(document.getElementById("map"), opt);

    const triangleCoords = [
        { lat: lat + 0.0005, lng: lng },

        { lat: lat + 0.00025, lng: lng - 0.0007 },
        { lat: lat - 0.00025, lng: lng - 0.0007},


        { lat: lat - 0.0005, lng: lng },

        { lat: lat - 0.00025, lng: lng + 0.0007},
        { lat: lat + 0.00025, lng: lng + 0.0007 },

    ];

    // Construct the polygon.
    const bermudaTriangle = new google.maps.Polygon({
        paths: triangleCoords,
        strokeColor: "#FF0000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#FF0000",
        fillOpacity: 0.35,
        editable: true,
        draggable: true,
    });
    bermudaTriangle.setMap(map);


    var test = document.getElementById('test');

    test.onclick = function () {
        var polypath = bermudaTriangle.getPath();
        var encodeString = google.maps.geometry.encoding.encodePath(polypath);

        alert(encodeString);
    }


    var a = document.getElementById('save');

    a.onclick = function() {
        var polypath = bermudaTriangle.getPath();
        var encodeString = google.maps.geometry.encoding.encodePath(polypath);
        document.getElementById('location_area').value = encodeString;
    }

}




