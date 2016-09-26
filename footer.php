
<footer>
  <div class="container-fluid" id="footer">
    <div class="col-lg-5 col-xs-12 footer_map">
      <div>
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
        <div class="google_map_container">
          <div id='gmap_canvas' class="google_map"></div><div><small><a href="http://www.embedgooglemaps.com">Google Maps carte sur votre site</a></small></div><div><small><a href="http://youtubeembedcode.com">Visit our website</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(48.895639,2.387655499999937),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(48.895639,2.387655499999937)});infowindow = new google.maps.InfoWindow({content:'<strong>Cité des sciences et de l\'industrie</strong><br>30 Avenue Corentin Cariou, 75019 Paris<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
      </div>
    </div>
    <div class="col-lg-7 col-xs-12">
      <h5>Plan d'accès</h5>
      <p><strong>Adresse : </strong>Cité des sciences et de l'industrie - 30, avenue Corentin-Cariou - 75019 Paris</p>
      <h5>Venir en transport en commun</h5>
      <p><strong>Métro : </strong>ligne 7, station Porte de la Villette</p>
      <p><strong>Autobus : </strong>lignes 139, 150, 152, station Porte de la Villette</p>
      <p><strong>Tramway : </strong>T3b (Porte de Vincennes - Porte de la Chapelle), station Porte de la Villette</p>
    </div>
  </div>
  <div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-offset-4 col-xs-4 footer_text">
        <div class="footer_link_container">
          <a class="footer_link" href="http://simplon.co/">Simplon.co</a>
          <span class="hidden-xs"> - </span>
          <a class="footer_link" href="http://capprio.fr/">Capprio</a>
          <span class="hidden-xs"> - </span>
          <a class="footer_link" href="#">Facebook</a>
          <span class="hidden-xs"> - </span>
          <a class="footer_link" href="#">Twitter</a>
        </div>
        <p style="text-align:center;">&copy; <?php echo date('Y');?></p>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
