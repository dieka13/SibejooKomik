    <div class="row">
        <div  class="large-12 column">
        
          <h2>Latest Artwork</h2>
          
          <div class="row">
            <div id="gallery" class="large-12 collapse transitions-enabled large-centered clearfix">
            	<?php
				foreach($artwork as $a)
				{
					$url = explode('.',$a->url);
					echo '<div class="box artwork'.$a->ukuran_thumbnail.'"><img src="'.base_url('artwork/'.$url[0]."_".$a->ukuran_thumbnail.".".$url[1]).'" /></div>';
				}
				?>
            </div>
          </div>
          <div class="row">
            <div class="small-12 column">
                <div class="panel collapse clearfix">
                    <p class="left">Lihat semua karya kami</p>
                    <a class="button right radius has-icon"><i class="fi-thumbnails icon-lg icon-middle"></i> Gallery</a>
                </div>
            </div>
            
          </div>  
        </div>
      </div>
  </div>