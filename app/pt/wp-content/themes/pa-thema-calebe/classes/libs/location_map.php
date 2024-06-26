<?php  $zooming_factor = 13;
/* map for submit page */
 ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.5&sensor=false&libraries=places"></script>
<script type="text/javascript">
/* <![CDATA[ */
var map;
var latlng;
var geocoder;
var address;
var lat;
var lng;
var centerChangedLast;
var reverseGeocodedLast;
var currentReverseGeocodeResponse;
<?php
	$maptype = 'ROADMAP';
?>
var CITY_MAP_CENTER_LAT = 40.714623;	
var CITY_MAP_CENTER_LNG = -74.006605;	
var CITY_MAP_ZOOMING_FACT = 13;
  function initialize() {
    var latlng = new google.maps.LatLng(CITY_MAP_CENTER_LAT,CITY_MAP_CENTER_LNG);
    var myOptions = {
      zoom: CITY_MAP_ZOOMING_FACT,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.<?php echo $maptype;?>
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    geocoder = new google.maps.Geocoder();
	google.maps.event.addListener(map, 'zoom_changed', function() {
			
		});
	setupEvents();
   // centerChanged();
  }

  function setupEvents() {
    reverseGeocodedLast = new Date();
    centerChangedLast = new Date();
	
    setInterval(function() {
      if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
        if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
          reverseGeocode();
      }
    }, 1000);
google.maps.event.addListener(map, 'zoom_changed', function() {
			//document.getElementById("zooming_factor").value = map.getZoom();
		});
	}

  function getCenterLatLngText() {
    return '(' + map.getCenter().lat() +', '+ map.getCenter().lng() +')';
  }

  function centerChanged() {
    centerChangedLast = new Date();
    var latlng = getCenterLatLngText();
    //document.getElementById('latlng').innerHTML = latlng;
    document.getElementById('address').innerHTML = '';
    currentReverseGeocodeResponse = null;
  }

  function reverseGeocode() {
    reverseGeocodedLast = new Date();
    geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
  }

  function reverseGeocodeResult(results, status) {
    currentReverseGeocodeResponse = results;
    if(status == 'OK') {
      if(results.length == 0) {
        document.getElementById('address').innerHTML = 'None';
      } else {
        document.getElementById('address').innerHTML = results[0].formatted_address;
      }
    } else {
      document.getElementById('address').innerHTML = 'Error';
    }
  }


  function geocode() {
    var address = ''; 
    address += document.getElementById("instituicao_endereco").value + ' ';
    address += document.getElementById("instituicao_complemento").value + ', ';
    address += document.getElementById("instituicao_cidade").value + ' - ';
    address += document.getElementById("instituicao_estado").value + ' - ';
    address += document.getElementById("instituicao_cep").value;

    if(address) {
		  geocoder.geocode({'address': address, 'partialmatch': true }, geocodeResult);
    }
  }

  function geocodeResult(results, status) {
    if (status == 'OK' && results.length > 0) {
      map.fitBounds(results[0].geometry.viewport);
      map.setZoom(<?php echo $zooming_factor;?>);
      addMarkerAtCenter();
    } else {
      //alert("Geocode was not successful for the following reason: " + status);
    }
	
}
  var markerForInstituicoes = false;
  function addMarkerAtCenter() {
    if(markerForInstituicoes !== false) {
      markerForInstituicoes.setMap(null);
    }
    markerForInstituicoes = new google.maps.Marker({
      position: map.getCenter(),
      draggable: true,
      map: map
    });
	
	updateMarkerAddress('Dragging...');
	updateMarkerPosition(markerForInstituicoes.getPosition());
	geocodePosition(markerForInstituicoes.getPosition());

	google.maps.event.addListener(markerForInstituicoes, 'dragstart', function() {
    	updateMarkerAddress('Dragging...');
    });
	
    google.maps.event.addListener(markerForInstituicoes, 'drag', function() {
    	updateMarkerPosition(markerForInstituicoes.getPosition());
    });
	
    google.maps.event.addListener(markerForInstituicoes, 'dragend', function() {
    	geocodePosition(markerForInstituicoes.getPosition());
   });



    var text = 'Lat/Lng: ' + getCenterLatLngText();
    if(currentReverseGeocodeResponse) {
      var addr = '';
      if(currentReverseGeocodeResponse.size == 0) {
        addr = 'None';
      } else {
        addr = currentReverseGeocodeResponse[0].formatted_address;
      }
      text = text + '<br>' + 'address: <br>' + addr;
    }

    var infowindow = new google.maps.InfoWindow({ content: text });

    google.maps.event.addListener(markerForInstituicoes, 'click', function() {
      infowindow.open(map,markerForInstituicoes);
    });
  }
  
  function updateMarkerAddress(str)
   {
	 //document.getElementById('address').value = str;
   }
   
  function updateMarkerStatus(str)
   {
  	 document.getElementById('markerStatus').innerHTML = str;
   }
   
  function updateMarkerPosition(latLng)
   {
	 document.getElementById('instituicao_map').value = latLng.lat() + ', ' + latLng.lng();
  }
 
	var geocoder = new google.maps.Geocoder();

	function geocodePosition(pos) {
	  geocoder.geocode({
		latLng: pos
	  }, function(responses) {
		if (responses && responses.length > 0) {
		  updateMarkerAddress(responses[0].formatted_address);
		} else {
		  updateMarkerAddress('Cannot determine address at this location.');
		}
	  });
	}

  function changeMap()
   {
    var coordsStr = document.getElementById('instituicao_map').value;
    if(!coordsStr) {
      coordsStr = ' , ';
    }
    var coords = coordsStr.split(',');
		var newlatlng = coords[0];
		var newlong = coords[1];
		var latlng = new google.maps.LatLng(newlatlng,newlong);
		var map = new google.maps.Map(document.getElementById('map_canvas'), {
		zoom: CITY_MAP_ZOOMING_FACT,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.<?php echo $maptype;?>
	  });
	
		var marker = new google.maps.Marker({
      position: latlng,
      title: 'Point A',
      map: map,
      draggable: true
	  });
		
    updateMarkerAddress('Dragging...');
    updateMarkerPosition(marker.getPosition());
    geocodePosition(marker.getPosition());

    google.maps.event.addListener(marker, 'dragstart', function() {
    	updateMarkerAddress('Dragging...');
    });
	
    google.maps.event.addListener(marker, 'drag', function() {
    	//updateMarkerStatus('Dragging...');
    	updateMarkerPosition(marker.getPosition());
    });
	
    google.maps.event.addListener(marker, 'dragend', function() {
    	//updateMarkerStatus('Drag ended');
    	geocodePosition(marker.getPosition());
   });
	
   }
	
	
google.maps.event.addDomListener(window, 'load', initialize);
<?php if(isset($_REQUEST['pid']) || isset($_REQUEST['post']) || isset($_REQUEST['backandedit'])|| isset($_REQUEST['renew'])):?>
	google.maps.event.addDomListener(window, 'load', changeMap);
<?php else: ?>
	google.maps.event.addDomListener(window, 'load', geocode);
<?php endif; ?>

function check_validation_map()
{
	jQuery("#geo_latitude_error").removeClass("message_error2");
	jQuery("#geo_latitude_error").text("");
	jQuery("#geo_longitude_error").removeClass("message_error2");
	jQuery("#geo_longitude_error").text("");
}
/* ]]> */
</script>
<!--input type="button" class="b_submit" value="<?php _e('Buscar no mapa','pa-thena-deptos');?>" onclick="geocode();initialize();" /-->
<div id="map_canvas" style="float:right; height:300px; margin-right:36px; position:relative; width:410px;"  class="form_row clearfix"></div>