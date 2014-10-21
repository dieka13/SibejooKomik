
        <div class="row">
        	<div class="large-12 column clearfix">
            	<h2>Delete Artwork</h2>
                
				<form action="<?php echo site_url('admin/artwork/do_delete') ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                    	<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                        <div class="large-4 columns">
                        	<a class="th"><img src="<?php echo base_url('artwork/'.$url) ?>" /></a>
                        </div>
                        <div class="large-8 columns">
                        	<div class="panel clearfix">
                            	<p>Anda yakin akan <b>menghapus</b> artwork ini ?</p>
                                <p>Judul : <?php echo $judul ?><br>
								Kategori : <?php echo $nama_kategori ?><br>
								Tanggal Upload : <?php echo $tanggal_upload ?></p>
                                <?php
								$data = array(
											  'name'    => 'submit',
											  'id'      => 'submit',
											  'class'   => 'button radius alert right',
											);
								echo form_submit($data, 'Hapus');
								?>
                            </div>
                        </div>
                    </div>
                    
                    <?php
					$hidden = array(
						'id_artwork' => $id_artwork,
						'judul' => $judul,
					); 
					echo form_hidden($hidden); 
					?>
                </form>                
            </div>
        </div>
        
    </div>
  </div> 