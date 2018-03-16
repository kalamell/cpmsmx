<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class=""><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">โรงเรียน</li>
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
			  <div class="panel-heading">โรงเรียน</div>
			  <div class="panel-body">

			  	<?php echo form_open_multipart('backend/school/import', array('class' => 'form-inline'));?>
			  		<div class="form-group">
			  			<label>อัพโหลดไฟล์ .csv</label>
			  			<input type="file" name="file" cl>
			  		</div>
			  		<button type="submit" class="btn btn-info btn-sm">อัพโหลด</button>
			  	<?php echo form_close();?> <br><br>
			  	<p><a href="<?php echo site_url('backend/school/add');?>" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a></p>

			  	<?php echo save();?>

			  	<table class="table table-bordered table-striped">
			  		<thead>
			  			<tr>
			  				<th>รหัสโรงเรียน</th>
			  				<th>โรงเรียน</th>
			  				<th>สังกัด</th>
			  				<th>สพฐ/อื่นๆ</th>
			  				<th>หน่วยงาน</th>
			  				<th>สังกัด</th>			  				
			  				<th>&nbsp;</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php foreach($rs as $r):?>

			  				
			  				<tr>
			  					<td><?php echo $r->school_id;?></td>
			  					<td><?php echo $r->school_name;?></td>
			  					<td><?php echo $r->org_type_name;?></td>
			  					<td><?php echo $r->type_school;?></td>
			  					<td><?php echo $r->area_type_name;?></td>
			  					<td><?php echo $r->type_school == 'spt' ? 'สพฐ' : 'อื่นๆ';?></td>
			  					<td width="120">
			  						<div class="btn-group">
			  							<a href="<?php echo site_url('backend/school/edit/'.$r->id);?>" class="btn btn-default btn-sm">แก้ไข</a>
			  							<a href="<?php echo site_url('backend/school/delete/'.$r->id);?>" class="btn btn-default btn-sm" onclick="javascript:return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');"><i class="fa fa-trash"></i></a>
			  						</div>
			  					</td>
			  				</tr>
			  			<?php endforeach;?>
			  		</tbody>
			  	</table>

			  	<?php echo $this->pagination->create_links();?>
			  </div>
			</div>
		</div>
	</div>
</div>

