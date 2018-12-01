
var map;
function initMap() {
  // form
  // Selection of the attributes & login information -index.html
  infoWindow = new google.maps.InfoWindow({
    content:" "
  });
  var element = document.getElementById('map');
  var mapTypeIds = [];
  for (var type in google.maps.MapTypeId) {
    mapTypeIds.push(google.maps.MapTypeId[type]);
  }
  mapTypeIds.push("OSM")

  var map = new google.maps.Map(element,{
    center: new google.maps.LatLng(52.5170365, 13.3888599),
    zoom: 10,
    mapTypeId: "OSM",
    mapTypeControl: true,
    mapTypeControlOptions:{
      mapTypeIds: mapTypeIds,
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    }
  });
  map.mapTypes.set("OSM", new google.maps.ImageMapType({
    getTileUrl: function(coord, zoom){
      return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
    },
     tileSize: new google.maps.Size(256, 256),
     name: "Openstreetmap",
     maxZoom: 14
  }));

  //loading and styling the Berlin file -GeoJSON
  map.data.loadGeoJson('Berlin.geojson')
  map.data.setStyle(function(feature) {
    var color = null ;
    if (feature.getProperty('isColor')) {
      color = feature.getProperty('color');
    }
    return({
      fillColor: color,
      strokeColor:"#4d2a00",
      strokeOpacity:0.4,
      fillOpacity:0
    });
  })

  // Linking searchbox and the User Interfece element
  var input = document.getElementById('loc-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

  // Bias the searchbox results towards the maps viewport
  map.addListener('bounds_changed', function(){
  searchBox.setBounds(map.getBounds());
  });

  var markers =[];
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0){
      return;
    }
  // to clear older markers
  markers.forEach(function(marker) {
  marker.setMap(null);
  });
  markers=[];
  // For each place, place an icon , get the name and location
  var bounds = new google.maps.LatLngBounds();
  places.forEach(function(place) {
    if(!place.geometry){console.log("No Geometry");
  return;
  }
    var icon ={
      size: new google.maps.Size(30,71),
      origin:new google.maps.Point(0,0),
      anchor: new google.maps.Point(17,34),
      scaledSize: new google.maps.Size(30, 30)
    };
    // marker for each place
    markers.push(new google.maps.Marker({
    map:map,
    icon:icon,
    title:place.name,
    position:place.geometry.location
  }));
  //cluster Points
  //var clusterPnts = new MarkerClusterer(maps);

    if(place.geometry.viewport){
      //Viewport of Geocodes
    bounds.union(place.geometry.viewport);
  } else {
    bounds.extend(place.geometry.location);
  }
  });
  map.setCenter(bounds.getCenter());
  map.fitBounds(bounds);
});
  // styling
  // -------body
    $("body").css("background-image","url('Image/background1.jpg')");
  // -------hyperlinks
    $("a").on("mouseover", function() {
      $(this).css("color" , "#ff8c00");
    }).on("mouseout", function() {
      $(this).css("color" , "#ffe4c4");
    });
}
