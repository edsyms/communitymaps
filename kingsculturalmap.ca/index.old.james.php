<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>


.edPopupContent {
  overflow:scroll;
}  
/*
.olControlLayerSwitcher {
width: 300px!important;
}
*/
.olControlLayerSwitcher .layersDiv {
    /*background-color: #aaaaaa!important; */
  background-color: #959940!important;
  
}
/*
.olControlLayerSwitcher .maximizeDiv, .olControlLayerSwitcher .minimizeDiv {
  width: 36px;
    right: 0px;
    top: 5px;
}
*/

.olControlScaleLine {
  //background: purple;
  //padding: 10px;
  position: absolute!important;
  left: 250px!important;
  top: 0px!important;
  height: 20px!important;
}

div.olControlMousePosition {
  position: absolute;
  left: 550px;
  top: 580px;
  height: 15px;
  font-size: 6pt;
}

.olPopupContent { overflow: auto; padding: 20px; }
.olFramedCloudPopupContent { overflow: auto; padding: 10px; }

div.olControlNavToolbar {
  position: absolute;
  left: 25px;
  top: 150px;
  //height: 15px;
  //font-size: 8pt;
}

#container{ 
width: 100%;
background-color: rgb(0, 0, 0); 
position: relative;
}
 
#edDiv {
  position:absolute;
  background-color: #00248F;
  opacity: 0.75;
  top: 140px;
  left: 1286px;
  width: 22px;
  height: 144px;
}

.olControlNavToolbar {
    top:250px !important; 
  left: 12px !important;
}

.olLayerGoogleCopyright {
  display: none;
}

.olLayerGooglePoweredBy {
visibility:hidden;
}


  
#edDiv img{ 
  display:block;
}
 #map{
 /*width:100%;
 /*height:1024px; 
 position:absolute;
 }

.helpRot { 
      display:block; 
      position:absolute;
      text-align:center;  
      left:16px; 
      top:400px;
      -webkit-transform: rotate(-90deg); 
      -webkit-transform-origin: 30% 100%; 
      -moz-transform: rotate(-90deg);
      -moz-transform-origin: 30% 100%;      
      }
  </style>
  <!--[if IE]>
  <style>
    .helpRok {
      filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
      right:-15px; top:5px;
    }
  </style>
  
  

<head>
<title>Kings County Cultural Map</title>


<meta name="description" content="The Kings County Cultural Mapping project identifies cultural assets in Kings County, Nova Scotia and displays both tangible resources (resources that have a physical presence) and intangible resources (the stories and traditions that contribute to defining a region’s unique identity and sense of place), on an accessible and interactive map to be used by the community.">
<meta name="keywords" content="culture, map, Kings County, Nova Scotia, cultural assets" >

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
td img {display: block;}body {
  margin-left: 0px;
  margin-top: 0px;
}


</style>

<!--Ed's Scripts -->
  
 <script type='text/javascript' src=  
'http://code.jquery.com/jquery-1.5.2.js'></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
 
      <script type='text/javascript' src="http://www.openlayers.org/api/OpenLayers.js"></script>
      <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css">  
  
 
<script type="text/javascript">
function toggle2(showHideDiv, switchTextDiv) {
  var ele = document.getElementById(showHideDiv);
  var text = document.getElementById(switchTextDiv);
  if(ele.style.display == "block") {
        ele.style.display = "none";
    text.innerHTML = "<b>Show Help</b>";
    }
  else {
    ele.style.display = "block";
    text.innerHTML = "<b>Hide Help</b>";
  }
}
</script>
<link rel="stylesheet" href="../theme/default/style.css" type="text/css" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
<script type='text/javascript' src="http://www.openlayers.org/api/OpenLayers.js"></script>
<script type="text/javascript" src="http://maps.stamen.com/js/tile.stamen.js"></script>

<!-- THE Mapping Script-->

<script type="text/javascript">//<![CDATA[ 

OpenLayers.ImgPath = "AV_Cultural/img/";

var map, selectsControls
var MERCATOR = new OpenLayers.Projection('EPSG:900913');
$(window).load(function(){

  var options = {
    projection: new OpenLayers.Projection("EPSG:900913"),
    //maxResolution: 53.6875
    //center: new OpenLayers.LonLat(-7193000, 5629000),
    //zoom: 2
  };
  map = new OpenLayers.Map('map', options);
  olmapnik = new OpenLayers.Layer.OSM("Open Street Map", "http://tile.openstreetmap.org/${z}/${x}/${y}.png");
//  map.addLayer(olmapnik);
//  map.setBaseLayer(olmapnik);
  
// replace "toner" here with "terrain" or "watercolor"

  var layer = new OpenLayers.Layer.Stamen("watercolor",{
  numZoomLevels: 24}
  );
  layer.setName("Open Street Map; Watercolour");
//  map.addLayer(layer);
//  map.setBaseLayer(layer);
   
  var g_sat = new OpenLayers.Layer.Google(
  "Google Satellite",{
  type: google.maps.MapTypeId.SATELLITE,
  numZoomLevels: 24});
  //map.addLayer(g_sat);

  var g_maps = new OpenLayers.Layer.Google(
  "Google Street Map",
  {numZoomLevels: 24 ,
  displayInLayerSwitcher:false})
  map.addLayer(g_maps);
  
  var ls= new OpenLayers.Control.LayerSwitcher(); 
  map.addControl(ls); 
  ls.maximizeControl(); 
  map.addControl(new OpenLayers.Control.MousePosition());
  map.addControl(new OpenLayers.Control.Scale());
  //map.addControl(new OpenLayers.Control.OverviewMap());
  //map.addControl(new OpenLayers.Control.PanZoom());
  
  var sln = new OpenLayers.Control.ScaleLine()
  map.addControl(sln);

var defCntyStyle = new OpenLayers.Style();

var template = {strokeWidth: 2, strokeColor: "#ee9900",strokeOpacity: 0.7};

var ruleCnty = new OpenLayers.Rule({
"minScaleDenominator": 1000000,
"maxScaleDenominator": 100000,
"symbolizer": template})
defCntyStyle.addRules([ ruleCnty ]);

var styleKontiky = new OpenLayers.StyleMap({'default': defCntyStyle});
  
  var County_Shape_Final = new OpenLayers.Layer.Vector("County Lines",
    {
    stylemap:styleKontiky,
    //style: {strokeWidth: 2, strokeColor: "#ee9900",strokeOpacity: 0.7},//minScale:5000000, 
    //maxScale: 50000, 
    //numZoomLevels: 6,
    displayInLayerSwitcher:false,
    visibility:false,
    protocol: new OpenLayers.Protocol.HTTP({
                    url: "AV_Cultural/gml/County_Shape_Final.GML",
                    format: new OpenLayers.Format.GML()
                }),
                strategies: [new OpenLayers.Strategy.Fixed()]
            });
      
  map.addLayer(County_Shape_Final);
  //minScale:5000, maxScale: 500000,
  
  var vectorLayer = new OpenLayers.Layer.Vector("Simple Geometry", {
    styleMap: new OpenLayers.StyleMap({'default':{
      strokeColor: "#00FF00",
      strokeOpacity: 1,
      strokeWidth: 3,
      fillColor: "#FF5500",
      fillOpacity: 1,
      pointRadius: 0,
      pointerEvents: "visiblePainted",
      // label with \n linebreaks
      label : "${name}",
      
      fontColor: "${favColor}",
      fontSize: "24px",
      fontFamily: "Palatino Linotype",
      fontWeight: "bold",
      labelAlign: "${align}",
      labelXOffset: "${xOffset}",
      labelYOffset: "${yOffset}",
      labelOutlineColor: "white",
      labelOutlineWidth: 3
    }}), displayInLayerSwitcher:false
  });
  
  // create a point feature
  var point = new OpenLayers.Geometry.Point(-7200000, 5603000);
  var pointFeature = new OpenLayers.Feature.Vector(point);
  pointFeature.attributes = {
  
    name: "Kings County",
    favColor: '#BE7A00',
    align: "cm"
  };
      
  map.addLayer(vectorLayer);
  vectorLayer.addFeatures([pointFeature]);
  
  
    // create a story feature
      var vectorStoryLayer = new OpenLayers.Layer.Vector("<img src='AV_Cultural/png/CulturalStory.png' height='19px'/>&nbsp;Stories", {
    styleMap: new OpenLayers.StyleMap({'default':{
      strokeColor: "#00FF00",
      strokeOpacity: 1,
      strokeWidth: 3,
      fillColor: "#FF5500",
      fillOpacity: 1,
      pointRadius: 11,
      externalGraphic: "${img}",
      pointerEvents: "visiblePainted",
      // label with \n linebreaks
      //label : "${name}",
      
      fontColor: "${favColor}",
      fontSize: "8px",
      fontFamily: "Palatino Linotype",
      fontWeight: "bold",
      labelAlign: "${align}",
      labelXOffset: "${xOffset}",
      labelYOffset: "${yOffset}",
      labelOutlineColor: "white",
      labelOutlineWidth: 3
    }}), displayInLayerSwitcher:true
  });
/*
01 Unearthing our creative histories - https://vimeo.com/42977709 - locate anywhere in Kentville
02 Raisin Drop Cookies - https://vimeo.com/42351990 - locate close to Kingstec campus
03 I, the apple - https://vimeo.com/42981176 - also locate at Dempsey Corner Orchards
04 Staying young... - https://vimeo.com/42400813 - locate at Festival Theatre
05 Finding inclusivity through creativity - https://vimeo.com/47043449 - locate at Alexander Society for Special Needs 
06 Art is a way - https://vimeo.com/43485163 - locate next to Uncommon Common Art (Grand Pre)
07 The walk across Fundy Bay - https://vimeo.com/44732418 - locate in the graveyard next to Wolfville's clock park

ox8  Perserving WARTIME Memories - https://vimeo.com/52021900 - locate at the Greenwood Military Aviation Museum
ox9  FEEDING Curiosity and Appetites - https://vimeo.com/50154728 - locate in Kentville's Centre Square (same location as Kentville's Farmers Market)
ox10 Life as a PETTING zoo - https://vimeo.com/49941829 - locate at Dempsey Corner Orchards
ox11 When an ARTISAN creates, he does it with passion - https://vimeo.com/49847451 - locate at Marie et Guy's French Bakery in Kingston (should be in the cultural database)
ox12 A community of invisible THREADS - https://vimeo.com/49839113 - locate at Gaspereau Valley Fibres 
ox13 ACROSS for a song - https://vimeo.com/47259218 - locate in Bay of Fundy
ox14 The trip down the RIVER... - https://vimeo.com/47025999 - locate anywhere on the Gaspereau River

*/
  
  // Dig Story #1    
  var unEarthing = new OpenLayers.Geometry.Point(-7179600, 5633920);
  var unEarthingFeature = new OpenLayers.Feature.Vector(unEarthing);
  unEarthingFeature.attributes = {
  
    name: "Unearthing our creative histories",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>Scratching The Surface</h2></br><p style=\"font:14px Georgia,serif;\">Walter D'Arcy Ryan (Kentville, Nova Scotia, Canada, April 17, 1870 – Schenectady, New York, USA, March 14, 1934) was an influential early lighting engineer who worked for General Electric as director of its Illuminating Engineering Laboratory. He pioneered skyscraper illumination, designed the Scintillator colored searchlights display, and was responsible for the lighting of the Panama-Pacific International Exposition in San Francisco and the Century of Progress Exposition in Chicago, in addition to the first complete illumination of Niagara Falls.</br></p><a href=\"http://en.wikipedia.org/wiki/Walter_D%27Arcy_Ryan\" style=\"text-align:right\" target=\"new\">Wikipedia</a>",
    video: "<iframe src=\"http://player.vimeo.com/video/42977709\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/42977709\">Scratching the Surface</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };
  
  // Dig Story #2  
  var raisin = new OpenLayers.Geometry.Point(-7178200, 5635000);
  var raisinFeature = new OpenLayers.Feature.Vector(raisin);
  raisinFeature.attributes = {
  
    name: "Raisin Drop Cookies",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>Raisin Drop Cookies</h2></br><p style=\"font:14px Georgia,serif;\">Sue offers a heart felt account of how a favorite family cookie recipe helped to strengthen her relationship with her grandmother and overcome adversity in her life.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/42351990\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/42351990\">Raisin Drop Cookies</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };  
  
  // Dig Story #3  
  var apple = new OpenLayers.Geometry.Point(-7217400, 5631005);
  var appleFeature = new OpenLayers.Feature.Vector(apple);
  appleFeature.attributes = {
  
    name: "I, The Apple",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>I, the Apple</h2></br><p style=\"font:14px Georgia,serif;\"></p>",
    video: "<iframe src=\"http://player.vimeo.com/video/42981176\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/42981176\">I, the Apple</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };  
  
  // Dig Story #4
  var stayYoung = new OpenLayers.Geometry.Point(-7164850, 5635950);
  var stayYoungFeature = new OpenLayers.Feature.Vector(stayYoung);
  stayYoungFeature.attributes = {
  
    name: "Staying Young",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>Staying Young</h2></br><p style=\"font:14px Georgia,serif;\">The Women of Wolfville began in 2001 when two moms challenged each other to mount a production of The Vagina Monologues. The group joined a world-wide movement to stop violence against women with our 2002 production. Since then, they have picked a new theme every year. They like to perform to sold out houses and raise a lot of money for good causes, they work with local authors (both professionals and amateurs) to create a collective production reflecting on our theme.  One of their founding members, <bold>Mary Ganong</bold> (still young at 94) shares some amazing wisdom on how to stay young through life.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/42400813\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/42400813\">Staying Young</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };

  // Dig Story #5
  var inclusive = new OpenLayers.Geometry.Point(-7171000, 5647000);
  var inclusiveFeature = new OpenLayers.Feature.Vector(inclusive);
  inclusiveFeature.attributes = {
  
    name: "Inclusiveness in creativity",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>Inclusiveness in creativity</h2></br><p style=\"font:14px Georgia,serif;\">Kathleen Purdy, founder of the <a href=\"http://www.alexandersociety.org/\" target=\"new\">Alexander Society for Special Needs</a>, talks about her personal journey that led her to the formation of the creative arts program.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/47043449\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/47043449\">Inclusiveness in creativity</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };  
  // Dig Story #6
  var artIsAWay = new OpenLayers.Geometry.Point(-7159600, 5642440);
  var artIsAWayFeature = new OpenLayers.Feature.Vector(artIsAWay);
  artIsAWayFeature.attributes = {
  
    name: "Art Is A Way",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>Art Is A Way</h2></br><p style=\"font:14px Georgia,serif;\">Nicole Evans is a writer, actress, and chocolatier. Her chocolate career has now branched out into consulting, but she still designs and makes chocolates.  When “outed” in 2005, Nicole Evans along with colleagues Terry Drahos and Pat Farrell - Wolfville’s trio of mysterious twig sculptors - recommended to the Alliance of Kings Artists that they look at installing public art. Here she shares some reflections on the power and profound need for public art.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/43485163\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/43485163\">Art Is A Way</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };
  
  // Dig Story #7
  var jeremy = new OpenLayers.Geometry.Point(-7165000, 5635900);
  var jeremyFeature = new OpenLayers.Feature.Vector(jeremy);
  jeremyFeature.attributes = {
  
    name: "Jeremy",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>The Walk Across Fundy Bay</h2></br><p style=\"font:14px Georgia,serif;\">",
    video: "<iframe src=\"http://player.vimeo.com/video/44732418\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/44732418\">The Walk Across Fundy Bay</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };  

  //Dig Story #8
  var warTime = new OpenLayers.Geometry.Point(-7227900, 5617860);
  var warTimeFeature = new OpenLayers.Feature.Vector(warTime);
  warTimeFeature.attributes = {
  
    name: "Perserving Wartime Memories",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>Perserving Wartime Memories</h2></br><p style=\"font:14px Georgia,serif;\">A WWII veteran with a sharp memory, Frank Honey is like a living museum. He sheds light on the value of storytelling as he explains his connection to the Greenwood Aviation Museum and how he preserves his memories of the war.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/52021900\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/52021900\">Perserving Wartime Memories</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };
  
  //Dig Story #9 FEEDING Curiosity and Appetites - https://vimeo.com/50154728
  var feeding = new OpenLayers.Geometry.Point(-7179620, 5633750);
  var feedingFeature = new OpenLayers.Feature.Vector(feeding);
  feedingFeature.attributes = {
  
    name: "Feeding Curiosity and Appetites",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>Feeding Curiosity and Appetites</h2></br><p style=\"font:14px Georgia,serif;\">Michelle describes how the mid-week Farmers Market in Kentville came into existence. Themes of collaboration, re-imagining environments, and engaging with community emerge in her personal narrative.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/50154728\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/50154728\">Feeding Curiosity and Appetites</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };
  
  //Dig Story #10 Life as a PETTING zoo - https://vimeo.com/49941829
  var petting = new OpenLayers.Geometry.Point(-7217140, 5631135);
  var pettingFeature = new OpenLayers.Feature.Vector(petting);
  pettingFeature.attributes = {
  
    name: "Life as a petting zoo",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>Life as a petting zoo</h2></br><p style=\"font:14px Georgia,serif;\">Ever wonder what goes on in the minds of farm animals? Over the years the folks at Dempsey Corner Orchards have come up with distinct personalities and voices for their petting zoo animals. They introduce us to some of the more memorable characters in this whimsical parody</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/49941829\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/49941829\">Life as a petting zoo</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };
  
  //Dig Story #11 When an ARTISAN creates, he does it with passion - https://vimeo.com/49847451
  var artisan = new OpenLayers.Geometry.Point(-7230300, 5619535);
  var artisanFeature = new OpenLayers.Feature.Vector(artisan);
  artisanFeature.attributes = {
  
    name: "When an artisan creates, he does it with passion",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>When an artisan creates, he does it with passion</h2></br><p style=\"font:14px Georgia,serif;\">A recent immigrant to Kings County, Marie describes what it’s like to find a place in rural Nova Scotia. She makes her foray into her new community by selling French artisanal bread and pastries at a bakery in Kingston and as a vendor at local Farmer’s Markets.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/49847451\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/49847451\">When an artisan creates, he does it with passion</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };
  
  //Dig Story #12 A community of invisible THREADS - https://vimeo.com/49839113 - locate at Gaspereau Valley Fibres
  var threads = new OpenLayers.Geometry.Point(-7161670, 5632690);
  var threadsFeature = new OpenLayers.Feature.Vector(threads);
  threadsFeature.attributes = {
  
    name: "A community of invisible threads",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>A community of invisible threads</h2></br><p style=\"font:14px Georgia,serif;\">Dale, an avid hobby knitter, explains the significance of the relationships developed in a knitter’s circle at Gaspereau Fibers, and the excitement surrounding the Back-to-Back Challenge - where participants shear a sheep, spin the wool, and knit a sweater in the fastest time possible.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/49839113\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/49839113\">A community of invisible threads</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };
  
  //Dig Story #13 ACROSS for a song - https://vimeo.com/47259218 - locate in Bay of Fundy
  var across = new OpenLayers.Geometry.Point(-7160000, 5653000);
  var acrossFeature = new OpenLayers.Feature.Vector(across);
  acrossFeature.attributes = {
  
    name: "Across for a song",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>Across for a song</h2></br><p style=\"font:14px Georgia,serif;\">Jude illustrates the barter tradition by recalling the time he exchanged a boat ride for a song on his way to perform at the Deep Roots Music Festival in Wolfville.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/47259218\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/47259218\">Across for a song</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };
  
  //Dig Story #14 The trip down the RIVER... - https://vimeo.com/47025999 - locate anywhere on the Gaspereau River
  var river = new OpenLayers.Geometry.Point(-7159180, 5633636);
  var riverFeature = new OpenLayers.Feature.Vector(river);
  riverFeature.attributes = {
  
    name: "The trip down the river",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>The trip down the river</h2></br><p style=\"font:14px Georgia,serif;\">At 18, Kendra left Kings County for the excitement and promise of Boston. She shares how after a number of years, a trip back to Kings County and a tubing trip down the Gaspereau River led her to value her rural upbringing and thus return home.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/47025999\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/47025999\">The trip down the river</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };  
  
    //Dig Story #15 Grow with Art.. - https://vimeo.com/55786704 - locate anywhere on the Gaspereau River
  var river = new OpenLayers.Geometry.Point(-7178122, 5635176);
  var riverFeature = new OpenLayers.Feature.Vector(river);
  riverFeature.attributes = {
  
    name: "What I Learned at Grow With Art",
    img:"AV_Cultural/png/CulturalStory.png",
    desc:"<h2>What I Learned at Grow With Art</h2></br><p style=\"font:14px Georgia,serif;\">12 year-old Davlyn talks about how her appreciation of art is nurtured by her involvement with Grow With Art, an art program run by community volunteers. The program teaches her that like people, no two pieces of art are the same, and should be appreciated for their differences and uniqueness.</p>",
    video: "<iframe src=\"http://player.vimeo.com/video/55786704\" width=\"500\" height=\"281\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href=\"http://vimeo.com/55786704\">What I Learned at Grow With Art</a> from <a href=\"http://vimeo.com/user11344116\">Kings County</a> on <a href=\"http://vimeo.com\">Vimeo</a>.</p>"
  };
  vectorStoryLayer.addFeatures([unEarthingFeature,raisinFeature,stayYoungFeature,artIsAWayFeature,appleFeature,inclusiveFeature,jeremyFeature,warTimeFeature,feedingFeature,pettingFeature,artisanFeature,threadsFeature,acrossFeature,riverFeature]);
  
map.addLayer(vectorStoryLayer);
  
  
  
// Sytlemap for Cultural Facilities
  
 var vector_styleMap = new OpenLayers.StyleMap({'default': new     OpenLayers.Style({
           pointRadius: "${radius}",
           externalGraphic:'AV_Cultural/png/CulturalFacility3.png',
           //externalGraphic: "${F23}",
           fillOpacity: 1.0,
           label: "${num_points}",
           labelAlign: "cc",
           fontSize:"12px",
           fontFamily: "Arial",
           fontColor:"black",
           fontWeight:"bold"
         },{
           context: {
          num_points: 
             function(feature){
             if(typeof(feature.attributes.count) != "undefined"){
             return feature.attributes.count; }
             else {return ""}},
          radius: function(feature) {
             var pix = 11;
             if(feature.cluster)
               if(feature.attributes.count > 14)
             {pix = 25}
             else
             {
             pix = Math.max(feature.attributes.count*2, 13);
             }
             return pix;
           },  
           }
         }
         )
 })
 
 
 
 
 
  //Add CulturalFacility Layer
  

var clstrStrategyCF = new OpenLayers.Strategy.Cluster({distance: 45, threshold: 3});
             
  CulturalFacility = new OpenLayers.Layer.Vector("<img src='AV_Cultural/png/CulturalFacility3.png' height='19px'/>&nbsp;Cultural Facility", {
        styleMap: vector_styleMap,
        visibility: true,
                protocol: new OpenLayers.Protocol.HTTP({
        url: "AV_Cultural/gml/CulturalFacility05.GML",
                    format: new OpenLayers.Format.GML()
                }),
                strategies: [new OpenLayers.Strategy.Fixed(),clstrStrategyCF]
            });
  
  map.addLayer(CulturalFacility);
  
// Sytlemap for Cultural Heritage
  
 var cultHeri_styleMap = new OpenLayers.StyleMap({'default': new     OpenLayers.Style({
           pointRadius: "${radius}",
           externalGraphic:'AV_Cultural/png/CulturalHeritage.png',
           //externalGraphic: "${F23}",
           label: "${num_points}",
           labelAlign: "cc",
           fontSize:"12px",
           fontFamily: "Palatino Linotype",
           fontColor:"black",
           fontWeight:"normal"
         },{
           context: {
          num_points: 
             function(feature){
             if(typeof(feature.attributes.count) != "undefined"){
             return feature.attributes.count; }
             else {return ""}},
          radius: function(feature) {
             var pix = 12;
             if(feature.cluster)
            if(feature.attributes.count > 14)
             {pix = 22}
             else
             {
             pix = Math.max(feature.attributes.count*1.4, 13) + 2;}
             return pix;
           },  
           }
         }
         )
 })
   
//ADD CulturalHeritage
  var clstrStrategyCH = new OpenLayers.Strategy.Cluster({distance: 45, threshold: 3});
  
  var CulturalHeritage = new OpenLayers.Layer.Vector("<img src='AV_Cultural/png/CulturalHeritage.png' height='19px'/>&nbsp;Cultural Heritage", {
        styleMap: cultHeri_styleMap,
        visibility: true,
                protocol: new OpenLayers.Protocol.HTTP({
                    url: "AV_Cultural/gml/CulturalHeritage05.GML",
          format: new OpenLayers.Format.GML()
                }),
                strategies: [new OpenLayers.Strategy.Fixed(),clstrStrategyCH]
            });
  

  map.addLayer(CulturalHeritage);
  
  // Stylemap for Cultural Industry
  
 var cultInd_styleMap = new OpenLayers.StyleMap({'default': new     OpenLayers.Style({
           pointRadius: "${radius}",
           externalGraphic:'AV_Cultural/png/CulturalIndustry.png',
           //externalGraphic: "${F23}",
           label: "${num_points}",
           labelAlign: "cc",
           fontSize:"12px",
           fontFamily: "Arial",
           fontColor:"black",
           fontWeight:"bold"
         },{
           context: {
          num_points: 
             function(feature){
             if(typeof(feature.attributes.count) != "undefined"){
             return feature.attributes.count; }
             else {return ""}},
          radius: function(feature) {
             var pix = 13;
             if(feature.cluster)
            if(feature.attributes.count > 14)
             {pix = 25}
             else
             {             
             pix = Math.max(feature.attributes.count*1.75, 15) + 2;}
             return pix;
           },  
           }
         }
         )
 })
  //ADD CulturalIndustry
  var clstrStrategyCI = new OpenLayers.Strategy.Cluster({distance: 45, threshold: 2});
  
  var CulturalIndustry = new OpenLayers.Layer.Vector( "<img src='AV_Cultural/png/CulturalIndustry.png' height='19px'/>&nbsp;Cultural Industry", {
        styleMap: cultInd_styleMap,
        visibility: true,
                protocol: new OpenLayers.Protocol.HTTP({
                    url: "AV_Cultural/gml/CulturalIndustry05.GML",
                    format: new OpenLayers.Format.GML()
                }),
                strategies: [new OpenLayers.Strategy.Fixed(),clstrStrategyCI]
            });
      
  map.addLayer(CulturalIndustry);  
  
// Stylemap for Cultural Organizations
  
 var cultOrg_styleMap = new OpenLayers.StyleMap({'default': new     OpenLayers.Style({
           pointRadius: "${radius}",
           externalGraphic:'AV_Cultural/png/CulturalOrganizations.png',
           //externalGraphic: "${F23}",
           fillOpacity: 1.0,
           label: "${num_points}",
           labelAlign: "cc",
           fontSize:"12px",
           fontFamily: "Palatino Linotype",
           fontColor:"black",
           fontWeight:"normal"
         },{
           context: {
          num_points: 
             function(feature){
             if(typeof(feature.attributes.count) != "undefined"){
             return feature.attributes.count; }
             else {return ""}},
          radius: function(feature) {
             var pix = 12;
             if(feature.cluster)
               if(feature.attributes.count > 14)
             {pix = 22}
             else
             {
             pix = Math.max(feature.attributes.count*1.4, 13) + 2;}
             return pix;
           },  
           }
         }
         )
 })

 //Add CulturalOrganizations
 
   var clstrStrategyCO = new OpenLayers.Strategy.Cluster({distance: 45, threshold: 3});
 
  var CulturalOrganizations = new OpenLayers.Layer.Vector("<img src='AV_Cultural/png/CulturalOrganizations.png' height='19px'/>&nbsp;Cultural Organizations", {
        styleMap: cultOrg_styleMap,
        visibility: true,
                protocol: new OpenLayers.Protocol.HTTP({
                    url: "AV_Cultural/gml/CulturalOrganizations05.GML",
                    format: new OpenLayers.Format.GML()
                }),
                strategies: [new OpenLayers.Strategy.Fixed(),clstrStrategyCO]
            });
  
  map.addLayer(CulturalOrganizations);

// Stylemap for Festivals & Events
  
 var cultFE_styleMap = new OpenLayers.StyleMap({'default': new     OpenLayers.Style({
           pointRadius: "${radius}",
           externalGraphic:'AV_Cultural/png/FestivalsandEvents.png',
           //externalGraphic: "${F23}",
           fillOpacity: 1.0,
           label: "${num_points}",
           labelAlign: "cc",
           fontSize:"12px",
           fontFamily: "Palatino Linotype",
           fontColor:"black",
           fontWeight:"normal"
         },{
           context: {
          num_points: 
             function(feature){
             if(typeof(feature.attributes.count) != "undefined"){
             return feature.attributes.count; }
             else {return ""}},
          radius: function(feature) {
             var pix = 9;
             if(feature.cluster)
            if(feature.attributes.count > 14)
             {pix = 22}
             else
             {             
             pix = Math.max(feature.attributes.count*1.4, 9) + 2;}
             return pix;
           },  
           }
         }
         )
 })  
//Add FestivalsandEvents
  
   var clstrStrategyFE = new OpenLayers.Strategy.Cluster({distance: 45, threshold: 3});

  var FestivalsandEvents = new OpenLayers.Layer.Vector("<img src='AV_Cultural/png/FestivalsandEvents.png' height='19px'/>&nbsp;Festivals & Events", {
        styleMap: cultFE_styleMap,
        visibility: true,
                protocol: new OpenLayers.Protocol.HTTP({
                    url: "AV_Cultural/gml/FestivalsandEvents05.GML",
                    format: new OpenLayers.Format.GML()
                }),
                strategies: [new OpenLayers.Strategy.Fixed(),clstrStrategyFE]
            });

  map.addLayer(FestivalsandEvents);

  // Stylemap for Natural Heritage
  
 var cultNH_styleMap = new OpenLayers.StyleMap({'default': new     OpenLayers.Style({
           pointRadius: "${radius}",
           externalGraphic:'AV_Cultural/png/NaturalHeritage.png',
           //externalGraphic: "${F23}",
           fillOpacity: 1.0,
           label: "${num_points}",
           labelAlign: "cc",
           fontSize:"12px",
           fontFamily: "Palatino Linotype",
           fontColor:"black",
           fontWeight:"normal"
         },{
           context: {
          num_points: 
             function(feature){
             if(typeof(feature.attributes.count) != "undefined"){
             return feature.attributes.count; }
             else {return ""}},
          radius: function(feature) {
             var pix = 12;
             if(feature.cluster)
            if(feature.attributes.count > 14)
             {pix = 22}
             else
             {             
             pix = Math.max(feature.attributes.count*1.4, 13) + 2;}
             return pix;
           },  
           }
         }
         )
 })  
  //Add NaturalHeritage

   var clstrStrategyNH = new OpenLayers.Strategy.Cluster({distance: 45, threshold: 3});
  
  var NaturalHeritage = new OpenLayers.Layer.Vector("<img src='AV_Cultural/png/NaturalHeritage.png' height='19px'/>&nbsp;Natural Heritage", {
        styleMap: cultNH_styleMap,
        visibility: true,
                protocol: new OpenLayers.Protocol.HTTP({
                    url: "AV_Cultural/gml/NaturalHeritage05.GML",
                    format: new OpenLayers.Format.GML()
                }),
                strategies: [new OpenLayers.Strategy.Fixed(),clstrStrategyNH]
            });

  map.addLayer(NaturalHeritage);
  

//map.addLayer(vectorStoryLayer);

  // Html popup with jQuery tabs

  function prepareSheet(feature) {
    var div = $("<div>");
    var content = $("<div id='popupConTabs' style='font-size:9px;'>");
    var titles = $("<ul>" + 
                        "<li><a href='#tab-1'>General Info</a></li>" + 
                        "<li><a href='#tab-2'>Location Info</a></li>" + 
                        "<li><a href='#tab-3'>Description</a></li>" +
                    "</ul>");
    content.append(titles);
  

    // Tab 1
    var p1 = $("<div id='tab-1'>");
    p1.append($("<table style=\"vertical-align:top;\"><tr><td rowspan=\"7\"><img src="+feature.attributes.F23+" alt=\"Culture Rocks!\" width=\"32\" height=\"37\" /></td></tr><tr><td><b>Organization:</p></b></td><td><i>"+feature.attributes.Organizati+"</i></td></tr><tr><td><b>Type:</b></td><td><i>"+feature.attributes.Criteria+"</i></td></tr><tr><td><b>Discipline:</b></td><td><i>"+feature.attributes.Discipline+"</i></td></tr><tr><td><b>Website:</b></td><td><i><a href="+feature.attributes.Website+" target=\"_blank\">"+feature.attributes.Website+"</a></i></td></tr><tr><td><b>Email:</b></td><td><i>"+feature.attributes.Email+"</i></td></tr><tr><td><b>Phone:</b></td><td><i>"+feature.attributes.PhoneNum+"</i></td></tr></table>"));
    content.append(p1);

  //<p style=\"font: 12px Georgia,serif;\">
  
    // Tab 2
    var p2 = $("<div id='tab-2'>");
    p2.append($("<table><tr><td><b>Street Address:</b></td><td><i>"+feature.attributes.StreetAddr+"</i></td></tr><tr><td><b>Town:</b></td><td><i>"+feature.attributes.Town+"</i></td></tr><tr><td><b>Postal Code:</b></td><td><i>"+feature.attributes.PostalCode+"</i></td></tr></table>"));
    content.append(p2);

  // Tab 3
    var p3 = $("<div id='tab-3'>");
    p3.append($("<table><tr><td><i>"+feature.attributes.Descriptio+"</i></td></tr></table>"));
    content.append(p3);
    div.append(content);
    return div.html();
}



  function prepareStory(feature) {
    var div = $("<div>");
    var content = $("<div id='popupConTabs' style='font-size:9px;'>");
    var titles = $("<ul>" + 
                        "<li><a href='#tab-1'>Digital Story</a></li>" + 
                        "<li><a href='#tab-2'>Synopsis</a></li>" + 
                        //"<li><a href='#tab-3'>Description</a></li>" +
                    "</ul>");
    content.append(titles);
  

    // Tab 1
    var p1 = $("<div id='tab-1'>");
  /*
  p1.append($("<p>hi</p>"));
  content.append(p1);
  */
  
    p1.append($(feature.attributes.video));
    content.append(p1);
  
  //<p style=\"font: 12px Georgia,serif;\">
  
    // Tab 2
    var p2 = $("<div id='tab-2'>");
    p2.append($(feature.attributes.desc));
    content.append(p2);
  /*
  // Tab 3
    var p3 = $("<div id='tab-3'>");
    p3.append($("<table><tr><td><i>"+feature.attributes.Descriptio+"</i></td></tr></table>"));
    content.append(p3);
  */
    div.append(content);
    return div.html();
  
}


// Show the popup for the selected feature
var popup;
function onFeatureSelect(feature){
        selectedFeature = feature;
    if (!feature.cluster) {//added
        html = prepareSheet(feature);
    }//added
    else
    {
    html = "<img src=\"AV_Cultural/png/error1.png\"/><p> You must zoom in further to select a feature </p>"
    }
        popup = new OpenLayers.Popup.FramedCloud(
            "Info", 
            feature.geometry.getBounds().getCenterLonLat(), 
            null, html, null, true, function() {
                selectControl.unselect(selectedFeature);
        });
    popup.minSize = new OpenLayers.Size(360, 0);
        popup.maxSize = new OpenLayers.Size(380, 220);
        feature.popup = popup;
        map.addPopup(popup);
        $("#popupConTabs").tabs(); /* << Creating Tabs */
    }

  
function onFeatureSelectStory(feature){
        selectedFeature = feature;
    if (!feature.cluster) {//added
        html = prepareStory(feature);
    }//added
    else
    {
    html = "<img src=\"AV_Cultural/png/error1.png\"/><p> You must zoom in further to select a feature </p>"
    }
        popup = new OpenLayers.Popup.FramedCloud(
            "Info", 
            feature.geometry.getBounds().getCenterLonLat(), 
            null, html, null, true, function() {
                selectControl.unselect(selectedFeature);
        });
    popup.minSize = new OpenLayers.Size(640, 401);
        popup.maxSize = new OpenLayers.Size(680, 401);
        feature.popup = popup;
        map.addPopup(popup);
        $("#popupConTabs").tabs(); /* << Creating Tabs */
    }
  
function onFeatureUnselect(feature) {
        //feature = e.feature;
        map.removePopup(feature.popup);
        feature.popup.destroy();
        feature.popup = null;
    }
  
  selectControl = new OpenLayers.Control.SelectFeature(
    [vectorStoryLayer,CulturalFacility, CulturalHeritage, CulturalIndustry, CulturalOrganizations, FestivalsandEvents, NaturalHeritage ],
    {
      clickout: true, toggle: false, 
      multiple: false, hover: false, box:false,
      toggleKey: "ctrlKey", // ctrl key removes from selection
      multipleKey: "shiftKey" // shift key adds to selection
    }
  );
  map.addControl(selectControl);
  selectControl.activate();
  
//START QUERY
  //evt is part of an event handler in javascript.  Usually e, or evt or whatever is passed into a function as a paramter and if it doesn't exist (or isn't passed) it is defined at function execution.

  vectorStoryLayer.events.on({
    "featureselected": function(e) {
      onFeatureSelectStory(e.feature);
    },
    "featureunselected": function(e) {
      onFeatureUnselect(e.feature);
    }
  });
  
  CulturalFacility.events.on({
    "featureselected": function(e) {
      onFeatureSelect(e.feature);
    },
    "featureunselected": function(e) {
      onFeatureUnselect(e.feature);
    }
  });
  
  CulturalHeritage.events.on({
  "featureselected": function(e) {
      onFeatureSelect(e.feature);
    },
    "featureunselected": function(e) {
      onFeatureUnselect(e.feature);
    }
  });
  
  CulturalIndustry.events.on({
  "featureselected": function(e) {
      onFeatureSelect(e.feature);
    },
    "featureunselected": function(e) {
      onFeatureUnselect(e.feature);
    }
  });
  
  CulturalOrganizations.events.on({
  "featureselected": function(e) {
      onFeatureSelect(e.feature);
    },
    "featureunselected": function(e) {
      onFeatureUnselect(e.feature);
    }
  });
  
  FestivalsandEvents.events.on({
  "featureselected": function(e) {
      onFeatureSelect(e.feature);
    },
    "featureunselected": function(e) {
      onFeatureUnselect(e.feature);
    }
  });
  
  NaturalHeritage.events.on({
  "featureselected": function(e) {
      onFeatureSelect(e.feature);
    },
    "featureunselected": function(e) {
      onFeatureUnselect(e.feature);
    }
  });  
  
  //add a new navigation tool to the map for panning and zooming
var panel = new OpenLayers.Control.NavToolbar({zoomBoxEnabled:true});
map.addControls([panel]);

panel.controls[0].events.on({
"activate": function() {selectControl.activate();
},
"deactivate": function() {selectControl.deactivate();
}
});
  
  
  extent = new OpenLayers.Bounds(-65.000,44.483122,-63.90,45.204911).transform(new OpenLayers.Projection("EPSG:4326"), new OpenLayers.Projection("EPSG:900913"));
  rextent = new OpenLayers.Bounds(-65.30,44.25,-63.70,45.40).transform(new OpenLayers.Projection("EPSG:4326"), new OpenLayers.Projection("EPSG:900913"));
  map.zoomToExtent(extent);
  //map.maxExtent(extent);
  map.setOptions({restrictedExtent: rextent});
  

  
});//]]> 
</script>

<!-- The Mapping Script End-->


<!--Fireworks CS3 Dreamweaver CS3 target.  Created Tue Jan 15 10:59:46 GMT-0400 (Atlantic Standard Time) 2013-->


      
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<style type="text/css">
<!--
body {
  margin-left: 0px;
  margin-top: 0px;
}
-->
</style>
</head>
<body background="background2.jpg" onload="onLoadPage();">
  
<script type="text/javascript">
  
  function onLoadPage() {
    resizeIframe();
    MM_preloadImages('images/mnu_home_on.png','images/mnu_about_on.png','images/mnu_community_on.png','images/mnu_criteria_on.png','images/mnu_contact_on.png','images/mnu_submit_on.png');
  }
    
  $(window).resize(function() {
    resizeIframe();
  });
    
  function resizeIframe()
  {
     var viewportHeight = $(window).height();
     var frame = document.getElementById('mapframe');
     frame.height = viewportHeight-300;
  }
    
</script>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
   <td><img name="Banner" src="images/Banner.png" width="1000" height="219" border="0" id="Banner" alt="" /></td>
  </tr>
  
  <tr>
   <td>
   <?php $menu = 'home'; include 'menu.php'; ?>
   </td>
  </tr>
     
   <tr>
   <td height="600px" valign="top" bgcolor="#FFFFFF" id="mak" border="0" style='margin:0px; border:0px; padding:0px'>
<br>     
   <iframe id='mapframe' width="980" height="720" frameborder="0" style='margin: 0 auto; display:block; border:0px; padding:0px' scrolling="no" marginheight="0" marginwidth="0" src="https://cogsnscc.maps.arcgis.com/apps/OnePane/basicviewer/index.html?appid=cee8e4da89b4459eb96cb1aa7ef2ad23">
   <p>Your browser does not support iframes.</p> 
   </iframe>
   </td>
   </tr>
     <!--<tr>
       <td bgcolor="#FFFFFF">
       <p>&nbsp;</p>
       <table width="80%" border="2" align="center" cellpadding="3" cellspacing="0" bordercolor="#86391b">
         <tr >
           <td>
             <div class="style1"><p align="justify"><strong>How to explore this map:</strong> Use the tools in the upper left corner of the map to zoom or move around. Filter data by selecting or unselecting categories on the upper right corner of the map. Click on the coloured markers on the map to access more information or view digital stories. If you have a new cultural asset to submit or would like to make changes to an existing asset, click <q>submit</q> at the top right corner.</p>
</div>           </td>
         </tr>
       </table>
       <p><em>Background  by local Artist, Bob Hainstock</em></p></td>
     </tr>

   </table></td>-->
  
  <tr>
   <td valign="top" bgcolor="#FFFFFF">
     <br>
     <table width="80%" border="2" align="center" cellpadding="3" cellspacing="0" bordercolor="#86391b"><tr ><td>
             <div class="style1"><p align="justify">The Kings County Cultural Map represents culture in the area on an interactive, open-sourced, and community-driven map. The map includes places, groups, businesses, and stories that connect us to our geographic region.
               </p></div>          
       </td></tr></table>
    </td>
     </tr>
  
  <tr>
   <td bgcolor="#FFFFFF">
   <?php include 'footer.php'; ?> 
  </td>
  </tr>
</table>
<br>
<br>     
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-864094-9']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>  
</body>
</html>
