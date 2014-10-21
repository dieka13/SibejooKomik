
        <div class="row">
        	<div class="large-12 column clearfix">
            	<h2>Edit Kategori</h2>
                
				<form action="<?php echo site_url('admin/kategori_artwork/do_edit') ?>" enctype="multipart/form-data" method="post" data-abide>
                    <div class="row">
                    	<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                   
                        <div class="large-12 columns">
                        <label>Nama Kategori
                            <?php 
                            $data = array(
                                          'name'        => 'nama_kategori',
                                          'id'          => 'nama_kategori',
                                          'maxlength'   => '80',
										  'required' => 'required'
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
										  'required' => 'required'
                                        );
                            echo form_textarea($data, $keterangan );
                            ?>
                        </label>
                        <small class="error">Keterangan harus dipilih</small>
                        </div>
                        
                        <div class="large-12 columns">
                        	<?php
							$data = array(
                                          'name'    => 'submit',
                                          'id'      => 'submit',
                                          'class'   => 'button radius right',
                                        );
							echo form_submit($data, 'Simpan');
							?>
                        </div>
                        
                      </div>
                      
                      <?php
					  	$data = array(
								'id_kategori' => $id_kategori
							);
						echo form_hidden($data)  
					  ?>
                </form>                
            </div>
        </div>
        
    </div>
  </div> 