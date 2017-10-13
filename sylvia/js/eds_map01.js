
var map = L.map('map',{scrollWheelZoom: false}).setView([45, -65], 2)

map.once('focus', function() { map.scrollWheelZoom.enable(); });


		
L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; National Geographic, Esri, DeLorme, NAVTEQ, UNEP-WCMC, USGS, NASA, ESA, METI, NRCAN, GEBCO, NOAA, iPC',
	maxZoom: 16
}).addTo(map);


	var geocoder = new google.maps.Geocoder();

	function googleGeocoding(text, callResponse)
	{
		geocoder.geocode({address: text}, callResponse);
	}

 
 L.cartoDB('https://sylviadagnonedixon7.cartodb.com/api/v2/sql?q=SELECT * FROM communityassets_sylvia&api_key=ba97537aba9eef18a6a238a51e88f386f6c0e3cb', {
		 pointToLayer: function (feature, latlng) {
          return L.marker(latlng);},
		onEachFeature: function (feature, layer) {
				layer.bindPopup(feature.properties.img_link  + 'Location: ' + feature.properties.comm_asset + ', ' + feature.properties.comm_name + ', ' + feature.properties.comm_ps + ', ' +feature.properties.comm_country + '<br>' + 'Description: ' + feature.properties.description + '<br>' + feature.properties.link1);
	
        }
 }).addTo(map);
 
		var popup = L.popup();

		function onMapClick(e) {
			popup
				.setLatLng(e.latlng)
				.setContent("You clicked the map at " + e.latlng.toString())
				.openOn(map);
		}
		
		map.on('click', onMapClick);

		function formatJSON(rawjson)
	{
		var json = {},
			key, loc, disp = [];

		for(var i in rawjson)
		{
			key = rawjson[i].formatted_address;
			
			loc = L.latLng( rawjson[i].geometry.location.lat(), rawjson[i].geometry.location.lng() );
			
			json[ key ]= loc;	//key,value format
		}

		return json;
	}
		
			map.addControl( new L.Control.Search({
			sourceData: googleGeocoding,
			formatData: formatJSON,
			markerLocation: false,
			autoType: false,
			autoCollapse: true,
			minLength: 2,
			zoom: 10
		}) );
	
document.getElementById('map-navigation1').onclick = function(abc) {
        var pos = abc.target.getAttribute('data-position');
        var zoom = abc.target.getAttribute('data-zoom');
        if (pos && zoom) {
            var locat = pos.split(',');
            var zoo = parseInt(zoom);
            map.setView(locat, zoo, {animation: true});
            return false;
        }
    }

document.getElementById('map-navigation2').onclick = function(abc) {
        var pos = abc.target.getAttribute('data-position');
        var zoom = abc.target.getAttribute('data-zoom');
        if (pos && zoom) {
            var locat = pos.split(',');
            var zoo = parseInt(zoom);
            map.setView(locat, zoo, {animation: true});
            return false;
        }
    }	
	
document.getElementById('map-navigation3').onclick = function(abc) {
        var pos = abc.target.getAttribute('data-position');
        var zoom = abc.target.getAttribute('data-zoom');
        if (pos && zoom) {
            var locat = pos.split(',');
            var zoo = parseInt(zoom);
            map.setView(locat, zoo, {animation: true});
            return false;
        }
    }

document.getElementById('map-navigation4').onclick = function(abc) {
        var pos = abc.target.getAttribute('data-position');
        var zoom = abc.target.getAttribute('data-zoom');
        if (pos && zoom) {
            var locat = pos.split(',');
            var zoo = parseInt(zoom);
            map.setView(locat, zoo, {animation: true});
            return false;
        }
    }
	
document.getElementById('map-navigation5').onclick = function(abc) {
        var pos = abc.target.getAttribute('data-position');
        var zoom = abc.target.getAttribute('data-zoom');
        if (pos && zoom) {
            var locat = pos.split(',');
            var zoo = parseInt(zoom);
            map.setView(locat, zoo, {animation: true});
            return false;
        }
    }

document.getElementById('map-navigation6').onclick = function(abc) {
        var pos = abc.target.getAttribute('data-position');
        var zoom = abc.target.getAttribute('data-zoom');
        if (pos && zoom) {
            var locat = pos.split(',');
            var zoo = parseInt(zoom);
            map.setView(locat, zoo, {animation: true});
            return false;
        }
    }
	
document.getElementById('map-navigation7').onclick = function(abc) {
        var pos = abc.target.getAttribute('data-position');
        var zoom = abc.target.getAttribute('data-zoom');
        if (pos && zoom) {
            var locat = pos.split(',');
            var zoo = parseInt(zoom);
            map.setView(locat, zoo, {animation: true});
            return false;
        }
    }

document.getElementById('map-navigation8').onclick = function(abc) {
        var pos = abc.target.getAttribute('data-position');
        var zoom = abc.target.getAttribute('data-zoom');
        if (pos && zoom) {
            var locat = pos.split(',');
            var zoo = parseInt(zoom);
            map.setView(locat, zoo, {animation: true});
            return false;
        }
    }

document.getElementById('map-navigation9').onclick = function(abc) {
        var pos = abc.target.getAttribute('data-position');
        var zoom = abc.target.getAttribute('data-zoom');
        if (pos && zoom) {
            var locat = pos.split(',');
            var zoo = parseInt(zoom);
            map.setView(locat, zoo, {animation: true});
            return false;
        }
    }

document.getElementById('map-navigation10').onclick = function(abc) {
        var pos = abc.target.getAttribute('data-position');
        var zoom = abc.target.getAttribute('data-zoom');
        if (pos && zoom) {
            var locat = pos.split(',');
            var zoo = parseInt(zoom);
            map.setView(locat, zoo, {animation: true});
            return false;
        }
    }
	
