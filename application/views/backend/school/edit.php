<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class=""><a href="<?php echo site_url('backend/school');?>">โรงเรียน</a></li>
			  <li class="active"> แก้ไข้อมูลโรงเรียน</li>
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
			<?php echo form_open_multipart('', array('id' => ''));?>


			<?php echo save();?>

			<div class="col-md-12" style="margin-bottom: 20px;">
				<button class="btn btn-success" type="submit">บันทึกข้อมูล</button>
			</div>

			<div class="clearfix"></div>

			<input type="hidden" name="id" value="<?php echo $r->id;?>">
			<input type="hidden" name="tab" value="1">

			<div class='col-md-6'>
				<div class="panel panel-default">
				  <div class="panel-heading">ข้อมูลรหัสโรงเรียน</div>
				  <div class="panel-body">
					<div class="form-group col-md-6">
						<label for="school_id">รหัสโรงเรียน</label>
					    <input type="text" class="form-control" name="school_id" value="<?php echo $r->school_id;?>"  placeholder="">
					</div>


					
					
					<div class="form-group col-md-6">
						<label for="district_id">สพฐ / หน่วยงานอื่นๆ</label>
				    	<div class="radio">
				    		<label>
				    			<input type="radio" name="type_school" value="spt" <?php echo $r->type_school == 'spt' ? 'checked' : '';?>> สพฐ
				    		</label>				    		
				    	</div>

				    	<div class="radio">
				    		<label>
				    			<input type="radio" name="type_school" value="oth"  <?php echo $r->type_school == 'oth' ? 'checked' : '';?>> อื่นๆ
				    		</label>				    		
				    	</div>
					</div>

					 <div class="form-group col-md-12">
						<label for="school_name">ชื่อโรงเรียน (ภาษาไทย)</label>
					    <input type="text" class="form-control" name="school_name" value="<?php echo $r->school_name;?>" name="school_name" placeholder="">
					</div>

					<div class="form-group col-md-6">
						<label for="amphur_id">อำเภอ</label>
				    	<select name="amphur_id" id="amphur_id" class="form-control">
				    		<option value=""> อำเภอ </option>
				    		<?php foreach($amphur as $am):?>
				    			<option value="<?php echo $am->AMPHUR_ID;?>" <?php echo $am->AMPHUR_ID == $r->amphur_id ? 'selected':'';?>><?php echo $am->AMPHUR_NAME;?></option>
				    		<?php endforeach;?>

				    	</select>
					</div>

					<div class="form-group col-md-6">
						<label for="district_id">ตำบล</label>
				    	<select name="district_id" id="district_id" class="form-control">
				    		<option value=""> ตำบล </option>
				    		<?php foreach($district as $dt):?>
				    			<option value="<?php echo $dt->DISTRICT_ID;?>" <?php echo $dt->DISTRICT_ID == $r->district_id ? 'selected' : '';?>><?php echo $dt->DISTRICT_NAME;?></option>
				    		<?php endforeach;?>
				    	</select>
					</div>



					


					<!--<div class="form-group col-md-12">
						<label for="school_name_en">ชื่อโรงเรียน (ภาษาอังกฤษ)</label>
					    <input type="text" class="form-control" name="school_name_en" value="<?php echo $r->school_name_en;?>" name="school_name_en" placeholder="">
					 </div>-->
				  </div>
				</div>
			</div>


			<div class='col-md-6'>
				<div class="panel panel-default">
				  <div class="panel-heading">ข้อมูลสังกัด</div>
				  <div class="panel-body">
					 <div class="form-group col-md-6">
						<label for="username">หน่วยงาน</label>
					    <select name="area_type_id" class="form-control">
					    	<?php foreach($area_type as $at):?>
					    		<option value="<?php echo $at->area_type_id;?>" <?php echo $at->area_type_id == $r->area_type_id ? 'selected' : '';?>><?php echo $at->area_type_name;?></option>
					    	<?php endforeach;?>
					    </select>
					</div>

					<div class="form-group col-md-6">
						<label for="">กระทรวง</label>
					    <select class="form-control" name="m_id">
					    	<option value=""> - - - เลือกข้อมูล - - -</option>
					    	<?php foreach($ministry as $m):?>
					    		<option value="<?php echo $m->m_id;?>" <?php echo $r->m_id == $m->m_id ? 'selected' : $r->m_id==NULL && $m->m_id == '12' ? 'selected' : '';?>><?php echo $m->m_name;?></option>
					    	<?php endforeach;?>
						</select> 
					</div>

					
					 <div class="form-group col-md-6">
						<label for="username">เขตตรวจราชการ</label>
					    <select class="form-control" name="ins_id">
					    	<option value=""> - - - เลือกข้อมูล - - -</option>
					    	<?php foreach($inspect as $m):?>
					    		<option value="<?php echo $m->ins_id;?>" <?php echo $r->ins_id == $m->ins_id ? 'selected' : '';?>><?php echo $m->ins_name;?></option>
					    	<?php endforeach;?>
						</select>  
					</div>
				</div>
			</div>
		</div>


		<div class='clearfix'></div>

		


		<div class="col-md-12">
			<button class="btn btn-success" type="submit">บันทึกข้อมูล</button>
		</div>
		<?php echo form_close();?>

		

		</div>
	</div>
</div>