
        <div class="row">
        	<div class="large-12 column clearfix">
            	<h2>Add Kategori Artwork</h2>
                
				<form action="<?php echo site_url('admin/kategori_artwork/do_add') ?>" method="post" data-abide>
                    <div class="row">
                    	<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                        
                    	<?php if("" !== validation_errors()  or NULL != $this->input->post('upload_error_message') ) { ?>
                    	<div data-alert class="alert-box alert"> 
                            <?php echo validation_errors() ?>
                            <?php echo $this->input->post('upload_error_message')?>
                            <a href="#" class="close">&times;</a> 
                        </div>
						<?php }?>
                        
                        <div class="large-12 columns">
                        <label>Nama Kategori
                            <?php 
                            $data = array(
                                          'name'        => 'nama_kategori',
                                          'id'          => 'nama_kategori',
                                          'maxlength'   => '80',
										  'required' => 'required'
                                        );
                            
                            echo form_input($data, $this->input->post('nama_kategori') );
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
                            echo form_textarea($data, $this->input->post('keterangan') );
                            ?>
                        </label>
                        <small class="error">Keterangan harus diisi</small>
                        </div>
                        
                        <div class="large-12 columns">
                        	<?php
							$data = array(
                                          'name'    => 'submit',
                                          'id'      => 'submit',
                                          'class'   => 'button radius right',
                                        );
							echo form_submit($data, 'Tambah');
							?>
                        </div>
                        
                    </div>
                      
                </form>                
            </div>
        </div>
        
    </div>
  </div> 