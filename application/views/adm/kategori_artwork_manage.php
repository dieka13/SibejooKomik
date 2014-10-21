
        <div class="row">
        	<div class="large-12 column">
            	<h2>Manage Kategori</h2>
                
                <?php if (isset($alert)) { ?>
				<div class="alert-box <?php echo $alert_class ?>" data-alert>
                	<?php echo $alert ?>
                    <a href="#" class="close">&times;</a>
                </div>                
                <?php } ?>
                
            	<table class="full-width">
                	<thead>
                    	<th>Nama</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
					<?php foreach($kategori_artwork as $a) { ?><tr>
                        <td><?php echo $a->nama_kategori; ?></td>
                        <td><?php echo $a->keterangan ?></td>
                        <td>
                        	<a href="<?php echo site_url('admin/kategori_artwork/view/'.$a->id_kategori); ?>"><i class="fi-list-thumbnails icon-3x"></i></a>
                        	<a href="<?php echo site_url('admin/kategori_artwork/edit/'.$a->id_kategori); ?>"><i class="fi-page-edit icon-3x"></i></a>		
                        	<a href="<?php echo site_url('admin/kategori_artwork/delete/'.$a->id_kategori); ?>"><i class="fi-page-delete icon-3x"></i></a>
                        </td>
                    </tr><?php } ;?>
                    
                    </tbody>
                </table>
				<a class="button radius right has-icon" href="<?php echo site_url('admin/kategori_artwork/add') ?>"><i class="fi-plus icon-lg icon-middle"></i>	Tambah Kategori</a>
            </div>
        </div>
        
    </div>
  </div> 