
        <div class="row">
        	<div class="large-12 column clearfix">
            	<h2>Postingan Baru</h2>
                
				<form action="<?php echo site_url('admin/post/do_add') ?>" method="post" data-abide>
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
                        <small class="error">Nama harus diisi dengan karakter alfa-numerik(huruf dan angka saja)</small>
                        </div>
                        
                        <div class="large-12 columns">
                        <label>Isi
                            <?php 
							$data = array(
                                          'name'        => 'isi',
                                          'id'          => 'isi',
										  'required' => 'required'
                                        );
                            echo form_textarea($data, $this->input->post('isi') );
                            ?>
                        </label>
                        <small class="error">Harus ada isi</small>
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