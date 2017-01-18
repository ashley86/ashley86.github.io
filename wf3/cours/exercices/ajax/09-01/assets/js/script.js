var marker;
var map;
var markerIcon = 'http://image.flaticon.com/icons/png/32/188/188170.png';

function initMap() {

    var myLatLng = {lat: 48.837159, lng: 2.335112};
    var locations = [
        ['Bondi Beach', -33.890542, 151.274856, 4],
        ['Coogee Beach', -33.923036, 151.259052, 'plouf'],
        ['Cronulla Beach', -34.028249, 151.157507, 3],
        ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
        ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: myLatLng,
        streetViewControl: false,
        mapTypeControl: false
    });


    var noPoi = [
        {
            featureType: "poi",
            stylers: [
                { visibility: "off" }
            ]
        }
    ];

    map.setOptions({styles: noPoi});


    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            //position: myLatLng,
            map: map,
            icon: markerIcon,
            animation: google.maps.Animation.DROP,
            indiceId: locations[i][3]
        });

        google.maps.event.addListener(marker, 'click',
            (
                function(marker, i)
                {
                    //return function() {
                    //    infowindow.setContent(locations[i][0]);
                    //    infowindow.open(map, marker);
                    //}
                    markerClick(i);

                }
            )//(marker, i)
        );
    }

    //marker = new google.maps.Marker({
    //    position: myLatLng,
    //    map: map,
    //    title: 'Hello World!',
    //    icon: markerIcon,
    //    animation: google.maps.Animation.DROP,
    //    indiceId: 'toto'
    //});

    //marker.addListener('click', markerClick);











    //var map = new google.maps.Map(document.getElementById('map'), {
    //    zoom: 10,
    //    center: new google.maps.LatLng(-33.92, 151.25),
    //    mapTypeId: google.maps.MapTypeId.ROADMAP
    //});
    //
    //var infowindow = new google.maps.InfoWindow();
    //
    //var marker, i;














}

function markerClick() {

    // Zoom
    map.setZoom(16);
    map.setCenter(marker.getPosition());

    // Animate
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }

    console.log('sdfdsf'+marker.indiceId);
}