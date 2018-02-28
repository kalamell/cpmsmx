<div class="form-group">
	<label>ชื่อเว็บไซต์</label>
	<input type="text" name="title" value="<?php echo $r->title;?>" class="form-control">
</div>
<div class="form-group">
	<label>Footer</label>
  	<textarea name="footer" class="form-control" rows="5"><?php echo $r->footer;?></textarea>
</div>
<div class="form-group">
	<label>Logo</label>
	<?php 
	if ($r->logo !=''):?>
	<img src="<?php echo base_url();?>upload/<?php echo $r->logo;?>" class='img-responsive' style='width: 100px;'><br>
	<?php endif;?>
	<input type="file" name="logo" class="form-control">
</div>
