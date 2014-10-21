 <div id="about">
      <div class="row">
      	<div class="large-4 columns">
        	<h3>About Sibejoo</h3>
        </div>
        <div class="large-4 columns">
            <h3>Share Like dan Follow Kami</h3>
            <i class="fi-social-facebook icon-3x"></i>
           	<i class="fi-social-twitter icon-3x"></i>
           	<i class="fi-social-youtube icon-3x"></i>   	
        </div>
        
        <div class="large-4 columns">
            <h3>Live Beta Portal Sibejoo</h3>
            <p>Kalo ilmu bisa gratis, belajar bisa fun, gak diatur waktu dan capek pun gak perlu.. alesan males, apalagi?</p>
        </div>
      </div>
  </div>
  
  <footer>
  	<div class="row">
    	<div class="medium-12 column clearfix">
            <ul class="inline-list right">
            	<li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="https://www.facebook.com/pages/Sibejoo/239504716124473">Facebook</a></li>
                <li><a href="https://twitter.com/sibejoo">Twitter</a></li>
                <li><a href="http://www.youtube.com/user/sibejoo">You Tube</a></li>
            </ul>
        </div>
    </div>
  </footer>
  
  <script src="<?php echo base_url('js/vendor/jquery.js')?>"></script>
  <script src="<?php echo base_url('js/foundation.min.js')?>"></script>
  <script>
  	$(document).foundation();
  </script>
  
  <script src="<?php echo base_url('js/jquery.masonry.js')?>"></script>
  <script src="<?php echo base_url('js/imagesloaded.js')?>"></script>
  <script>
      var $containter = $('#gallery');
      $containter.imagesLoaded( function(){
          $containter.masonry({
            itemSelector: '.box',
            isAnimated: !Modernizr.csstransitions,
			gutter: 20,
			isFitWidth: true,
			columnWidth: 300,
       });	
  });
  </script>

  </body>
</html>