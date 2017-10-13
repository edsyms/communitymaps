<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>

#container{ 
width: 100%;
background-color: rgb(0, 0, 0); 
position: relative;
}
</style>
 <script type='text/javascript' src='http://code.jquery.com/jquery-1.5.2.js'></script>  
  

<head>
<title>Kings County Cultural Map</title>

<meta name="description" content="The Kings County Cultural Mapping project identifies cultural assets in Kings County, Nova Scotia and displays both tangible resources (resources that have a physical presence) and intangible resources (the stories and traditions that contribute to defining a region’s unique identity and sense of place), on an accessible and interactive map to be used by the community.">
<meta name="keywords" content="culture, map, Kings County, Nova Scotia, cultural assets" >

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
  margin-left: 0px;
  margin-top: 0px;
}


</style>
 
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
     if(frame.height<550)
        frame.height = 550;
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
   <iframe id='mapframe' width="980" height="720" frameborder="0" style='margin: 10px; display:block; border:0px; padding:0px' scrolling="no" marginheight="0" marginwidth="0" src="https://cogsnscc.maps.arcgis.com/apps/OnePane/basicviewer/index.html?appid=cee8e4da89b4459eb96cb1aa7ef2ad23">
   <p>Your browser does not support iframes.</p> 
   </iframe>
   </td>
   </tr>
  
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
