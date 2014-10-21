<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sibejoo Artwork</title>
    
    <!-- Foundation CSS Framework -->
    <link rel="stylesheet" href="<?php echo base_url('css/foundation.css')?>" />
	<link rel="stylesheet" href="<?php echo base_url('css/fonts.css')?>" />
    <!-- Foundation Icons -->
    <link rel="stylesheet" href="<?php echo base_url('css/foundation-icons.css')?>" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/main_baru.css')?>" />
    
    <script src="<?php echo base_url('js/vendor/modernizr.js')?>"></script>
  </head>
  <body>
  
  <div class="contain-to-grid sticky">
  	<nav class="top-bar" data-topbar data-options="sticky_on:large">
    
    	<ul class="title-area">
        	<li class="name"><h1><a>Sibejoo Artwork</a></h1></li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        
        <section class="top-bar-section">
        	<ul class="right">
            	<li class="divider"></li>
            	<li><a href="#">News</a></li>
                <li class="divider"></li>
            	<li class="has-dropdown">
                	<a href="#">Gallery</a>
                    <ul class="dropdown">
                    	<li><label>Kategori</label></li>
                        <?php if (isset($category))
						foreach ($category as $c) { ?>
                        <li><a href="<?php echo site_url('gallery/kategori/'.$c->nama_kategori) ?>"><?php echo $c->nama_kategori ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="divider"></li>
            </ul>
        </section>
        
    </nav>
  </div><!-- Topbar -->