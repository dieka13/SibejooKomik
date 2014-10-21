
        <div class="row">
        	<div class="large-12 column">
            	<h2>Manage Post</h2>
                
                <?php if (isset($alert)) { ?>
				<div class="alert-box <?php echo $alert_class ?>" data-alert>
                	<?php echo $alert ?>
                    <a href="#" class="close">&times;</a>
                </div>                
                <?php } ?>
                
            	<table class="full-width">
                	<thead>
                    	<th>Judul</th>
                        <th>Tanggal Posting</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
					<?php foreach($post as $a) { ?><tr>
                        <td><?php echo $a->judul ?></td>
                        <td><?php echo $a->tanggal_posting ?></td>
                        <td>
                        	<a href="<?php echo site_url('post/'.$a->id_post."-".url_title($a->judul,'-',TRUE)) ?>"><i class="fi-eye icon-3x"></i></a>
                        	<a href="<?php echo site_url('admin/post/edit/'.$a->id_post); ?>"><i class="fi-page-edit icon-3x"></i></a>		
                        	<a href="<?php echo site_url('admin/post/delete/'.$a->id_post); ?>"><i class="fi-page-delete icon-3x"></i></a>
                        </td>
                    </tr><?php } ;?>
                    
                    </tbody>
                </table>
				<a class="button radius right has-icon" href="<?php echo site_url('admin/post/add') ?>"><i class="fi-plus icon-lg icon-middle"></i>	Tambah Postingan</a>
            </div>
        </div>
        
    </div>
  </div> 