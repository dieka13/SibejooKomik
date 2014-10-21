
        <div class="row">
        	<div class="large-12 column clearfix">
            	<h2>Edit Artwork</h2>
                
				<form action="<?php echo site_url('admin/artwork/do_edit') ?>" enctype="multipart/form-data" method="post" data-abide>
                    <div class="row">
                    	<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                   
                        <div class="large-12 columns">
                        <label>Judul
                            <?php 
                            $data = array(
                                          'name'        => 'judul',
                                          'id'          => 'judul',
                                          'maxlength'   => '80',
										  'required' => 'required'
                                        );
                            
                            echo form_input($data, $judul);
                            ?>
                        </label>
                        <small class="error">Judul harus diisi dengan karakter alfa-numerik(huruf dan angka saja)</small>
                        </div>
                        
                        <div class="large-12 columns">
                        <label>Kategori
                            <?php
							$req = 'required';
                            echo form_dropdown('kategori', $kategori, $id_kategori, $req);
                            ?>
                        </label>
                        <small class="error">Kategori harus dipilih</small>
                        </div>
    
                        <div class="large-12 columns">
                            <label>Deskripsi
                                <?php
                                echo form_textarea('deskripsi', $deskripsi);
                                ?>
                            </label>
                        </div>
                        
                        <div class="large-12 columns">
                            <label for="">Ukuran Thumbnail
                                <?php
								foreach ($thumbnail_enum as $u => $v)
								{
									$data = array(
										'name' => 'ukuran_thumbnail',	
                                          'id' => $v,
                                    );
									echo form_radio($data, $v, ($v == $ukuran_thumbnail));
									echo '<label for="'.$v.'">'.$u.'</label>';
								}
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
							echo form_submit($data, 'Simpan');
							?>
                        </div>
                       		<?php 
							$data = array(
								'id_artwork' => $id_artwork,
								'judul_lama' => $judul,
								'url' => $url
							);
							echo form_hidden($data) 
							?>
                    </div>
                      
                </form>                
            </div>
        </div>
        
    </div>
  </div> 