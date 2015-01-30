  <div class="row full-width collapse" data-equalizer>

  	<div class="large-2 columns backdrop" data-equalizer-watch>
    	<ul id="admin-menu" class="side-nav">
        
            <li class="heading section"><span class="fi-wrench icon-lg icon-middle"></span> Admin Page</li>
            <li <?php if($module == "admin page" && $action == "home") {?>class="active"<?php } ?>><a href="<?php echo site_url('admin') ?>">Home</a></li>
            
            <li class="heading section"><span class="fi-book icon-lg icon-middle"></span> Komik</li>
            <li <?php if($module == "komik" && $action == "manage") {?>class="active"<?php } ?>><a href="<?php echo site_url('admin/komik/') ?>">Manage Komik</a></li> 
            <li <?php if($module == "komik" && $action == "upload") {?>class="active"<?php } ?>><a href="<?php echo site_url('admin/komik/upload/') ?>">Upload Komik</a></li>
            
            <li class="heading section"><span class="fi-photo icon-lg icon-middle"></span> Artwork</li>
            <li <?php if($module == "artwork" && $action == "manage") {?>class="active"<?php } ?>><a href="<?php echo site_url('admin/artwork/') ?>">Manage Artwork</a></li> 
            <li <?php if($module == "artwork" && $action == "upload") {?>class="active"<?php } ?>><a href="<?php echo site_url('admin/artwork/upload/') ?>">Upload Artwork</a></li>
            
            <li class="heading"><span class="fi-page-copy icon-lg icon-middle"></span>	Kategori Artwork</li>
            <li <?php if($module == "kategori_artwork" && $action == "manage") {?>class="active"<?php } ?>><a href="<?php echo site_url('admin/kategori_artwork/') ?>">Manage Kategori</a></li>
            <li <?php if($module == "kategori_artwork" && $action == "add") {?>class="active"<?php } ?>><a href="<?php echo site_url('admin/kategori_artwork/add/') ?>">Add Kategori</a></li>
             
            <li class="heading"><span class="fi-pencil icon-lg icon-middle"></span>	Post</li>
            <li <?php if($module == "post" && $action == "manage") {?>class="active"<?php } ?>><a href="<?php echo site_url('admin/post/') ?>">Manage Post</a></li> 
            <li <?php if($module == "post" && $action == "add") {?>class="active"<?php } ?>><a href="<?php echo site_url('admin/post/add') ?>">New Post</a></li>
            
            <li class="heading"><span class="fi-folder icon-lg icon-middle"></span>	File Manager</li>
            <li <?php if($module == "file manager" && $action == "") {?>class="active"<?php } ?>><a href="<?php echo site_url('admin/file_manager/') ?>">Manage File</a></li>
            
            <li class="heading"><span class="fi-torsos-all icon-lg icon-middle"></span>	Member</li>
            <li><a href="#">Manage Member</a></li> 
            <li><a href="#">Add Member</a></li>
            
            <li class="heading"><span class="fi-widget icon-lg icon-middle"></span>	Other</li>
            <li><a href="#">Change Site Info</a></li> 
            <li><a href="#">Account Setting</a></li>
        </ul>
    </div>
    
    <div class="large-10 columns" data-equalizer-watch>
    	<ul class="breadcrumbs full-width">
        	<li class="unavailable">Admin</li>
            <?php if( isset($module) ) { ?><li><a href="#"> <?php echo $module ?></a></li> <?php } ?>
            <?php if( (isset($action)) && $action !="" ) { ?><li class="current"> <?php echo $action ?></li> <?php } ?>
        </ul>