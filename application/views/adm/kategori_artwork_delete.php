
        <div class="row">
        	<div class="large-12 column clearfix">
            	<h2>Hapus Kategori</h2>
                
				<form action="<?php echo site_url('admin/kategori_artwork/do_delete') ?>"method="post" data-abide>
                    <div class="row">
                    	<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                   
                        <div class="large-12 columns">
                        <label>Nama Kategori
                            <?php 
                            $data = array(
                                          'name'        => 'nama_kategori',
                                          'id'          => 'nama_kategori',
                                          'maxlength'   => '80',
										  'disabled' => 'disabled'
                                        );
                            
                            echo form_input($data, $nama_kategori);
                            ?>
                        </label>
                        <small class="error">Nama harus diisi dengan karakter alfa-numerik(huruf dan angka saja)</small>
                        </div>
                        
                        <div class="large-12 columns">
                        <label>Keterangan
                            <?php 
							$data = array(
                                          'name'        => 'keterangan',
                                          'id'          => 'keterangan',
										  'disabled' => 'disabled'
                                        );
                            echo form_textarea($data, $keterangan );
                            ?>
                        </label>
                        <small class="error">Keterangan harus dipilih</small>
                        </div>
                        
                        <div class="large-12 columns">
                        	<p>Apakah anda yakin akan <b>menghapus</b> kategori ini ?</p>
                        	<?php
							$data = array(
                                          'name'    => 'submit',
                                          'id'      => 'submit',
                                          'class'   => 'button radius right alert',
                                        );
							echo form_submit($data, 'Hapus');
							?>
                        </div>
                        
                      </div>
                      
                      <?php
					  	$data = array(
								'id_kategori' => $id_kategori,
								'nama_kategori' => $nama_kategori
							);
						echo form_hidden($data)  
					  ?>
                </form>                
            </div>
        </div>
        
    </div>
  </div> 