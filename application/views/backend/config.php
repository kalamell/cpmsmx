<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">ตั้งค่าข้อมูลเว็บไซต์</li>
			</ol>
		</div>

		
		<div class="col-md-3">
			<div class="panel panel-default">
			  <div class="panel-heading">เมนู</div>
			  <div class="panel-body">
			  	<?php $this->load->view('backend/menu');?>
			  </div>
			</div>
		</div>

		<div class='col-md-9'>
			<div class="panel panel-default">
			  <div class="panel-heading">ตั้งค่าข้อมูลเว็บไซต์</div>
			  <?php echo form_open('backend/config/update');?>
			  <input type="hidden" name="id" value="<?php echo $r->id;?>"/>
			  <div class="panel-body">

			  	<?php echo save();?>
			  
				 
				  <div class="form-group">
				  	<label>Footer</label>
				  	<textarea name="footer" class="form-control" rows="5"><?php echo $r->footer;?></textarea>
				  </div>


			  </div>

			  <div class="panel-footer">
			  	<button type="submit" name='save' class="btn btn-info">บันทึก</button>
			  </div>

			  <?php form_close();?>
			</div>
		</div>


		

	</div>
</div>

	
