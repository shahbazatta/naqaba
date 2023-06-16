<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>API - Documentation</title>
    <meta name="description" content="">
    <meta name="author" content="ticlekiwi">

    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/hightlightjs-dark.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,300&family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style.css" media="all">
    <script>
        hljs.initHighlightingOnLoad();
    </script>
</head>

<body class="one-content-column-version">
<div class="left-menu">
    <div class="content-logo">
        <div class="logo">
            <img alt="platform by Emily van den Heever from the Noun Project" title="platform by Emily van den Heever from the Noun Project" src="images/toplogo.png" height="70" />
            <span>Naqaba GPS Tracker API Documentation</span>
        </div>
        <button class="burger-menu-icon" id="button-menu-mobile">
            <svg width="34" height="34" viewBox="0 0 100 100"><path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"></path><path class="line line2" d="M 20,50 H 80"></path><path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"></path></svg>
        </button>
    </div>
    <div class="mobile-menu-closer"></div>
    <div class="content-menu">
        <div class="content-infos">
            <div class="info"><b>Version:</b> 1.0</div>
            <div class="info"><b>Last Updated:</b> 15th June, 2023</div>
            
        </div>
        
        <div class="headingList"><span>  APIs Lists</span></div>
        
        
    
    
        
        <ul>
            <li class="scroll-to-link active" data-target="live-loc-api">
                <a>1. All AVL Live Locations</a>
            </li>
            <li class="scroll-to-link" data-target="live-loc-x-minutes-api">
                <a>2. All AVL Live Locations in x minutes</a>
            </li>
            <li class="scroll-to-link" data-target="loc-not-synced-x-minutes">
                <a>3. All AVL Data Not Received in x Minutes</a>
            </li>
            
            <li class="scroll-to-link" data-target="loc-time-error-x-minutes">
                <a>4. All AVL Data Time Error</a>
            </li>
            
            <li class="scroll-to-link" data-target="geo-live-devices">
                <a>5. Live Devices on Geofence Area</a>
            </li>
            
            <li class="scroll-to-link" data-target="geo-bus-status">
                <a>6. Bus is availble on given locations</a><!-- 21 -->
            </li>
            
            <li class="scroll-to-link" data-target="geo-bus-time-period">
                <a>7. Return the list of buses available in a given geofence and time period</a><!-- 13 -->
            </li>
            
            <li class="scroll-to-link" data-target="geo-dur-time-period">
                <a>8. Return the duration of the bus stay in a given geofence and time period</a><!-- 10 -->
            </li>
            
            <li class="scroll-to-link" data-target="trips-count-avl">
                <a>9. Trip counts for specific Device</a>
            </li>
            
            <li class="scroll-to-link" data-target="all-trips-count">
                <a>10. All Trip Counts</a>
            </li>
            
            <li class="scroll-to-link" data-target="loc_history_avl">
                <a>11. Bus Location History</a><!--(API 14)  -->
            </li>
            
            <!--<li class="scroll-to-link" data-target="all-trips-countABA">
                <a>12. All Round Trips (A-B-A)(API 4)</a>
            </li>-->
            
            <li class="scroll-to-link" data-target="all-imeis">
                <a>12. Two AVL Reading Time difference - List of IMEIs</a><!-- (API 33(i)) -->
            </li>
            
            <li class="scroll-to-link" data-target="getDelayBetweenReadingsTimePeriod">
                <a>13. Two AVL Reading Time difference</a><!-- (API 33(ii))-->
            </li>
            
            <li class="scroll-to-link" data-target="Spatial1">
                <a>14. Total Round Trip Count </a><!-- (Spatial1) -->
            </li>
            
            <li class="scroll-to-link" data-target="Spatial2">
                <a>15. Average time of consecutive bus leaving </a><!-- (Spatial2) -->
            </li>
            
            <li class="scroll-to-link" data-target="Spatial3">
                <a>16. All Round trips (A-B-A) with total time </a><!-- (Spatial3) -->
            </li>
            
            <li class="scroll-to-link" data-target="Spatial4">
                <a>17. List of all buses completed at least 1 round </a><!-- (Spatial4) -->
            </li>
            
            <li class="scroll-to-link" data-target="Spatial5A">
                <a>18. Average time of the round trip (A-B-A)  </a><!-- (SpatialA-5) -->
            </li>
            
            <li class="scroll-to-link" data-target="Spatial5B">
                <a>19. Average time of the trip (A-B and B-A)  </a><!-- (SpatialB-5) -->
            </li>
            
            <li class="scroll-to-link" data-target="xxxx">
                <a>20. Pending...... </a><!-- (Status24) -->
            </li>
            <li class="scroll-to-link" data-target="xxxx">
                <a>21. Pending...... </a><!-- (Status24) -->
            </li>
            
            <li class="scroll-to-link" data-target="Status24">
                <a>22. List of Unknown IMEIs and port number </a><!-- (Status24) -->
            </li>
            
            <li class="scroll-to-link" data-target="Spatial3B">
                <a>23. All Round trips (A-B-A) with total time </a><!-- (Status24) -->
            </li>
            
            
        </ul>
    </div>
</div>


<div class="content-page">
    <div class="content">
        <div w3-include-html="includes/api_1.html"></div>
        <div w3-include-html="includes/api_2.html"></div>
        <div w3-include-html="includes/api_3.html"></div>
        <div w3-include-html="includes/api_4.html"></div>
        <div w3-include-html="includes/api_5.html"></div>
        <div w3-include-html="includes/api_6.html"></div>
        <div w3-include-html="includes/api_7.html"></div>
        <div w3-include-html="includes/api_8.html"></div>
        <div w3-include-html="includes/api_9.html"></div>
        <div w3-include-html="includes/api_10.html"></div>
        <div w3-include-html="includes/api_11.html"></div>
        <!--<div w3-include-html="includes/api_12.html"></div>-->
        <div w3-include-html="includes/api_13.html"></div>
        <div w3-include-html="includes/api_14.html"></div>
        <div w3-include-html="includes/api_15.html"></div>
        <div w3-include-html="includes/api_16.html"></div>
        <div w3-include-html="includes/api_17.html"></div>
        <div w3-include-html="includes/api_18.html"></div>
        <div w3-include-html="includes/api_19.html"></div>
        <div w3-include-html="includes/api_20.html"></div>
        <div w3-include-html="includes/api_21.html"></div>
        <div w3-include-html="includes/api_22.html"></div>
    </div>
</div>

<script src="js/script.js"></script>
<script>
function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /* Loop through a collection of all HTML elements: */
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      /* Make an HTTP request using the attribute value as the file name: */
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          /* Remove the attribute, and call this function once more: */
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      }
      xhttp.open("GET", file, true);
      xhttp.send();
      /* Exit the function: */
      return;
    }
  }
}
includeHTML();
</script>
</body>
</html>