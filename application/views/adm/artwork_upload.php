
        <div class="row">
        	<div class="large-12 column clearfix">
            	<h2>Upload Artwork</h2>
                
				<form action="<?php echo site_url('admin/artwork/do_manual_upload') ?>" enctype="multipart/form-data" method="post" data-abide>
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
                        <label>Judul
                            <?php 
                            $data = array(
                                          'name'        => 'judul',
                                          'id'          => 'judul',
                                          'maxlength'   => '80',
										  'required' => 'required'
                                        );
                            
                            echo form_input($data, $this->input->post('judul') );
                            ?>
                        </label>
                        <small class="error">Judul harus diisi dengan karakter alfa-numerik(huruf dan angka saja)</small>
                        </div>
                        
                        <div class="large-12 columns">
                        <label>Kategori
                            <?php 
							$req = 'required';
                            echo form_dropdown('kategori', $kategori, $this->input->post('kategori') , $req);
                            ?>
                        </label>
                        <small class="error">Kategori harus dipilih</small>
                        </div>
    
                        <div class="large-12 columns">
                            <label>Deskripsi
                                <?php
                                echo form_textarea('deskripsi', $this->input->post('deskripsi'));
                                ?>
                            </label>
                        </div>
                        
                        <div class="large-12 columns">
                            <label>Artwork
                                <?php
								$data = array(
                                          'name'       => 'artwork',
                                          'required'   => 'required'
                                        );
                                echo form_upload($data, $this->input->post('artwork'));
                                ?>
                            </label>
                        </div>
                        
                        <div class="large-12 columns">
                        	<?php
							$data = array(
                                          'name'    => 'submit',
                                          'id'      => 'submit',
                                          'class'   => 'button radius right',
                                        );
							echo form_submit($data, 'Upload');
							?>
                        </div>
                        
                    </div>
                      
                </form>                
            </div>
        </div>
        
    </div>
  </div> 