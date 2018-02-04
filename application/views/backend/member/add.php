<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class=""><a href="<?php echo site_url('backend/member');?>">ข้อมูลผู้ใช้งาน</a></li>
			  <li class="active">เพิ่มข้อมูล</li>
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
			  <div class="panel-heading">ข้อมูลผู้ใช้งาน</div>
			  <?php echo form_open_multipart('backend/member/dosave');?>
			  <div class="panel-body">
			  
				  <div class="form-group">
				  	<label>ชื่อ</label>
				  	<input type="text" name="name" class="form-control" value="">
				  </div>

				  <div class="form-group">
				  	<label>นามสกุล</label>
				  	<input type="text" name="surname" class="form-control" value="">
				  </div>

				  <div class="form-group">
				  	<label>Username</label>
				  	<input type="text" name="username" class="form-control" value="">
				  </div>

				  <div class="form-group">
				  	<label>Password</label>
				  	<input type="text" name="password" class="form-control" value="">
				  </div>


				  <div class="form-group">
				  	<label>สถานะ</label>
				  	<div class="radio">
				  		<label id="">
					  		<input type="radio" name="active" value="Y"> ใช้งาน
					  	</label>
				  	</div>

				  	<div class="radio">
				  		<label>
				  			<input type="radio" name="active" value="N"> ไม่ใช้งาน
				  		</label>
				  	</div>
				  </div>


				  <div class="form-group">
				  	<label>การใช้งาน</label>
				  	<div class="radio">
				  		<label id="">
					  		<input type="radio" name="status" value="staff"> Admin
					  	</label>
				  	</div>

				  	<div class="radio">
				  		<label>
				  			<input type="radio" name="status" value="member"> ผู้ใช้งานทั่วไป
				  		</label>
				  	</div>
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

	
