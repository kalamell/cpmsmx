<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('member');?>">ข้อมูลสมาชิก</a></li>
			  <li class=""><a href="<?php echo site_url('member/student');?>">ข้อมูลนักเรียน</a></li>
			  <li class="active">เพิ่มนักเรียน</li>
			</ol>

			<?php echo form_open_multipart('member/save_student', array('id' => 'memberupdate'));?>		  

			<div class='row'>

				<div class='col-md-9'>
					<div class="panel panel-default">
					  <div class="panel-heading">ข้อมูลนักเรียน</div>
					  <div class="panel-body">
					  	<br><span style="color: red !important;">** สามารถอ่านได้จากเครื่องอ่านบัตรประชาชน</span>

					  	<div class="row">
							<div class="form-group col-md-12">
								<label for="idcard">เลขบัตรประชาชน</label>
							    <input type="text" class="form-control required" name="idcard" value=""  placeholder="">
							</div>

							<div class="form-group col-md-12">
								<label>คำนำหน้า</label>
								<div class='radio'>
									<label>
										<input type="radio" class='required' checked name="prefix" value="เด็กชาย"> เด็กชาย
									</label>
								
									<label>
										<input type="radio" name="prefix" value="เด็กหญิง"> เด็กหญิง
									</label>
								
									<label>
										<input type="radio" name="prefix" value="นาย"> นาย
									</label>
								
									<label>
										<input type="radio" name="prefix" value="นางสาว"> นางสาว
									</label>
								</div>
								
							</div>

							<div class="form-group col-md-6">
								<label for="name">ชื่อ</label>
							    <input type="text" class="form-control required" name="name" value=""  placeholder="">
							</div>


							<div class="form-group col-md-6">
								<label for="surname">นามสกุล</label>
							    <input type="text" class="form-control required" name="surname" value=""  placeholder="">
							</div>

							<div class="form-group col-md-12">
								<label for="term_id">ภาคเรียน</label>
							    <select name="term_id" class="form-control">
							    	<option value=""> ภาคเรียน </option>
							    	<?php foreach($term as $t):?>
							    		<option value="<?php echo $t->term_id;?>"><?php echo $t->term_name;?></option>
							    	<?php endforeach;?>
							    </select>
							</div>


							<div class="form-group col-md-12">
								<label for="year_id">ปีการศึกษา</label>
							    <select name="year_id" class="form-control">
							    	<option value=""> ปีการศึกษา </option>
							    	<?php foreach($years as $y):?>
							    		<option value="<?php echo $y->year_id;?>"><?php echo $y->year_name;?></option>
							    	<?php endforeach;?>
							    </select>
							</div>

							<div class="form-group col-md-12">
								<label for="birthdate">วันเกิด</label>
							    <input type="text" class="form-control date" name="birthdate" value=""  placeholder="">
							</div>

							<div class="form-group col-md-12">
								<label for="rmid">การศึกษาระดับชั้น</label>
							    <select name="rmid" class="form-control">
							    	<option value=""> การศึกษาระดับชั้น </option>
							    	<?php foreach($room_level as $rm):?>
							    		<option value="<?php echo $rm->rmid;?>"><?php echo $rm->rm_name;?></option>
							    	<?php endforeach;?>
							    </select>
							</div>

							<div class="form-group col-md-12">
								<label for="room_no">ห้อง</label>
							    <input type="text" class="form-control" name="room_no" value=""  placeholder="">
							</div>


							<div class="form-group col-md-12">
								<button type="submit" name="save" class="btn btn-info">บันทึก</button>
							</div>
							






						</div>
						
					  </div>
					</div>
				</div>

				<div class='col-md-3'>
					<div class="panel panel-default">
					  <div class="panel-heading">ภาพประจำตัวนักเรียน</div>
					  <div class="panel-body">
						<div class="form-group col-md-6">
							<label for="thumbnail">ภาพประจำตัวนักเรียน</label>
						    <input type="file" class="" name="thumbnail" value=""  placeholder="">
						</div>
						
					  </div>
					</div>
				</div>


			</div>

			<?php echo form_close();?>

			  
		</div>
	</div>
	
</div>