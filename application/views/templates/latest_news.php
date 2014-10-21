  <div class="row">
  	<div class="large-12 column">
    
        <h2>Latest Post</h2>
        
        <div class="row" data-equalizer>
			<?php foreach($posts as $p) { ?>
            <div class="large-4 columns">
            	
                <div class="panel clearfix" data-equalizer-watch>
                    <h3><?php echo $p->judul ?></h3>
    
                    <?php echo $p->isi ?>
                    
                    <div class="label radius left"><i class="fi-comments icon-2x icon-middle"></i> 2 Komentar</div>
                    <a class="button radius right tiny" href="<?php echo site_url('post/'.$p->id_post."/".url_title($p->judul, '-', TRUE)) ?>">Read More..</a>
                </div>
          	
            </div>
            <?php } ?>
        </div>
    </div>
  </div><!-- welcome-->