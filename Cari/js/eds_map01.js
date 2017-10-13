
var map = L.map('map',{scrollWheelZoom: false}).setView([45, -65], 2)

map.once('focus', function() { map.scrollWheelZoom.enable(); });

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6IjZjNmRjNzk3ZmE2MTcwOTEwMGY0MzU3YjUzOWFmNWZhIn0.Y8bhBaUMqFiPrDRW9hieoQ', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.streets'
		}).addTo(map);
		

L.cartoDB('https://carimack.cartodb.com/api/v2/sql?q=SELECT * FROM communityassets_cari&api_key=66536da5dd900e1268db3970d7cbe009351e2d12', {
		 pointToLayer: function (feature, latlng) {
          return L.marker(latlng);},
		onEachFeature: function (feature, layer) {
				layer.bindPopup(feature.properties.comm_asset + '<br>' + feature.properties.description);
	
        }
 }).addTo(map);
;

/* L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6IjZjNmRjNzk3ZmE2MTcwOTEwMGY0MzU3YjUzOWFmNWZhIn0.Y8bhBaUMqFiPrDRW9hieoQ', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.streets'
		}).addTo(map); */
		
/*L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; National Geographic, Esri, DeLorme, NAVTEQ, UNEP-WCMC, USGS, NASA, ESA, METI, NRCAN, GEBCO, NOAA, iPC',
	maxZoom: 16
}).addTo(map);
*/

 L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, Tiles courtesy of <a href="http://hot.openstreetmap.org/" target="_blank">Humanitarian OpenStreetMap Team</a>'
}).addTo(map); 

/*
L.cartoDB('https://edsymons.cartodb.com/api/v2/sql?q=SELECT * FROM communityassets_ed&api_key=a41726eddf99ed06127b6651ec6dc6a8137bdae6', {
		 pointToLayer: function (feature, latlng) {
          return L.marker(latlng);},
		onEachFeature: function (feature, layer) {
				layer.bindPopup(feature.properties.comm_asset + '<br>' + feature.properties.description);
	
        }
 }).addTo(map);
*/

	var geocoder = new google.maps.Geocoder();

	function googleGeocoding(text, callResponse)
	{
		geocoder.geocode({address: text}, callResponse);
	}
/* L.cartoDB('https://edsymons.cartodb.com/api/v2/sql?q=SELECT * FROM resil2015a WHERE domain = \'Work\'&api_key=a41726eddf99ed06127b6651ec6dc6a8137bdae6', {
		 pointToLayer: function (feature, latlng) {
          return L.marker(latlng);},
		onEachFeature: function (feature, layer) {
				layer.bindPopup(feature.properties.link_img + '<b>'+feature.properties.do_comm_asset+ '</b><br><br>'+feature.properties.description_brf + feature.properties.link02 +'<br><em>('+ feature.properties.domain_sub+')</em>');
	
        }
 }).addTo(map); */
 L.cartoDB('https://carimack.cartodb.com/api/v2/sql?q=SELECT * FROM communityassets_cari&api_key=66536da5dd900e1268db3970d7cbe009351e2d12', {
		 pointToLayer: function (feature, latlng) {
          return L.marker(latlng);},
		onEachFeature: function (feature, layer) {
				layer.bindPopup(feature.properties.comm_asset + '<br>' + feature.properties.description + feature.properties.link1);
	
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
	
