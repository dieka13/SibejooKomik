
  <script src="<?php echo base_url("js/vendor/jquery.js"); ?>"></script>
  <script src="<?php echo base_url("js/foundation.min.js"); ?>"></script>
  <script>
  	$(document).foundation();
  </script>
  
  <?php if(isset($editor) && $editor == TRUE) {?>
  <!-- CKEDitor -->
  <script src="<?php echo base_url("js/ckeditor/ckeditor.js"); ?>"></script>
  <script src="<?php echo base_url("js/ckeditor/adapters/jquery.js"); ?>"></script>
  <script>
  	var roxyFileman = "<?php echo base_url('fileman/index.php') ?>";
	
  	$( document ).ready( function() {
		$( '#isi' ).ckeditor({filebrowserBrowseUrl:roxyFileman,
                                filebrowserImageBrowseUrl:roxyFileman+'?type=image',
                                removeDialogTabs: 'link:upload;image:upload',
						
								});
	} );
  </script>
  <?php }?>

  </body>
</html>