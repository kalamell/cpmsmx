<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ข้อมูลสมาชิก</li>
			</ol>
		</div>

		
		<div class="col-md-3">
			<div class="panel panel-default">
			  <div class="panel-heading">เมนู</div>
			  <div class="panel-body">
			  	<?php $this->load->view('member/menu');?>
			  </div>
			</div>
		</div>
		<div class='col-md-9'>
			<div class="panel panel-default">
			  <div class="panel-heading">ข้อมูลผู้ใช้งาน</div>
			  <div class="panel-body">

			  	<?php echo save();?>
			  	
			  	<?php echo form_open('member/update', array('id' => 'memberupdate'));?>

				  <div class="form-group col-md-12">
				    <label for="username">ชื่อผู้ใช้งาน</label>
				    <input type="text" class="form-control required" value="<?php echo $r->username;?>" readonly id="username" name="username" maxlength="13" minlength="13" placeholder="ชื่อผู้ใช้งาน">
				    <span class="help-block">ใช้หมายเลขบัตรประชาชน</span>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="password">รหัสผ่าน</label>
				    <input type="password" class="form-control" minlength="8" maxlength="20" id="password" name="password" placeholder="รหัสผ่าน">
				    <span class="help-block">รหัสผ่าน 8 หลัก</span>
				  </div>

				  <div class="form-group col-md-6">
				    <label for="confirm_password">ยืนยันรหัสผ่าน</label>
				    <input type="password" class="form-control " minlength="8" maxlength="20"  name="confirm_password" id="confirm_password" placeholder="รหัสผ่าน">
				    <span class="help-block">รหัสผ่าน 8 หลัก</span>
				  </div>

				 

				  <div class="form-group col-md-12">
				    <label for="name">ชื่อ</label>
				    <input type="text" class="form-control required" value="<?php echo $r->name;?>" id="name" name="name" placeholder="ชื่อผู้ใช้งาน">
				  </div>

				  <div class="form-group col-md-12">
				    <label for="surname">นามสกุล</label>
				    <input type="text" class="form-control required" value="<?php echo $r->surname;?>" id="surname" name="surname" placeholder="นามสกุล">
				  </div>

				  <div class="form-group col-md-12">
				    <label for="email">อีเมล์</label>
				    <input type="text" class="form-control required" value="<?php echo $r->email;?>" disabled="disabled" id="email" name="email" placeholder="อีเมล์">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="mobile">เบอร์โทรศัพท์</label>
				    <input type="text" class="form-control required" value="<?php echo $r->mobile;?>" id="mobile" maxlength="20" minlength="10" name="mobile" placeholder="">
				  </div>

				  <div class="form-group col-md-6">
				    <label for="telephone">เบอร์โทรศัพท์ที่ทำงาน</label>
				    <input type="text" class="form-control required" id="telephone" value="<?php echo $r->telephone;?>"   maxlength="20" minlength="9"  name="telephone" placeholder="">
				  </div>

				  <div class="form-group col-md-12">
				    <label class="" for="area">เขตพื้นที่การศึกษา</label>
				    <select class="form-control required" name="area" id="area" disabled="disabled">
				    	<option value="">- - - เขตพื้นที่การศึกษา - - -</option>
				    	<?php foreach($area as $a):?>
				    		<option value="<?php echo $a->f1;?>" <?php echo $a->f1 == $r->area ? 'selected' : '';?>><?php echo $a->f2;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>

				  <div class="form-group col-md-12">
				    <label class="" for="school">โรงเรียน</label>
				    <select class="form-control required" name="school" id="school" disabled="disabled">
				    	<option value="">- - - โรงเรียน - - -</option>
				    	<?php foreach($school as $s):?>
				    		<option value="<?php echo $s->f6;?>" <?php echo $s->f6 == $r->school ? 'selected' : '';?>><?php echo $s->f3;?></option>
				    	<?php endforeach;?>
				    </select>
				  </div>



				  
				  <div class='col-md-12'>
					  <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-user"></i> ปรับปรุงข้อมูล</button><br><br>
				  </div>

				<?php echo form_close();?>
			  </div>
			</div>
		</div>


		

	</div>
</div>

	
