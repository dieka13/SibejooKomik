
        <div class="row">
        	<div class="large-12 column">
            	<h2>Manage Komik</h2>
                
                <?php if (isset($alert)) { ?>
				<div class="alert-box <?php echo $alert_class ?>" data-alert>
                	<?php echo $alert ?>
                    <a href="#" class="close">&times;</a>
                </div>                
                <?php } ?>
                
            	<table class="full-width">
                	<thead>
                    	<th>id</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Upload</th>
                        <th>Jumlah Halaman</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
			<?php foreach($komik as $a) { ?><tr>
                        <td><?php echo $a->id_komik; ?></td>
                        <td><?php echo $a->judul; ?></td>
                        <td><?php echo $a->deskripsi; ?></td>
                        <td><?php echo $a->tanggal_upload ?></td>
                        <td><?php echo $a->jumlah_halaman ?></td>
                        <td>
                        	<a href="<?php echo site_url('admin/komik/view/'.$a->id_komik); ?>"><i class="fi-photo icon-3x"></i></a>
                        	<a href="<?php echo site_url('admin/komik/edit/'.$a->id_komik); ?>"><i class="fi-page-edit icon-3x"></i></a>		
                        	<a href="<?php echo site_url('admin/komik/delete/'.$a->id_komik); ?>"><i class="fi-page-delete icon-3x"></i></a>
                        </td>
                    </tr><?php } ;?>
                    
                    </tbody>
                </table>
				<a class="button radius right has-icon" href="<?php echo site_url('admin/komik/upload') ?>"><i class="fi-plus icon-lg icon-middle"></i>	Upload Komik</a>
            </div>
        </div>
        
    </div>
  </div> 