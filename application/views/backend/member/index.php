<div class='container-fluid'>
	<div class="row">

		<div class="col-md-12">
			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('backend');?>">Backend</a></li>
			  <li class="active">ข้อมูลผู้ใช้งาน</li>
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
			  <div class="panel-body">

			  	<p><a href="<?php echo site_url('backend/member/add');?>" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a></p>




			  	<table class="table table-bordered table-striped">
			  		<thead>
			  			<tr>
			  				<th>ชื่อ - นามสกุล</th>
			  				<th>Username</th>
			  				<th>ประเภทผู้ใช้งาน</th>
			  				<th>สถานะ</th>
			  				<th>&nbsp;</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<?php foreach($rs as $r):?>
			  				<tr>
			  					<td><?php echo $r->name.' '.$r->surname;?></td>
			  					<td><?php echo $r->username;?></td>
			  					<td><?php echo $r->status == 'staff' ? 'Admin' : 'ผู็ใช้งานทั่วไป';?></td>
			  					<td><label class=""><?php echo $r->active == 'Y' ? 'ใช้งาน' : 'ไม่ใช้งาน';?></label></td>
			  					<td width="120">
			  						<div class="btn-group">
			  							<a href="<?php echo site_url('backend/member/edit/'.$r->id);?>" class="btn btn-default btn-sm">แก้ไข</a>
			  							<a href="<?php echo site_url('backend/member/delete/'.$r->id);?>" onclick="javascript: return confirm('ต้องการลบข้อมูลหรือไม่ ?');" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
			  						</div>
			  					</td>
			  				</tr>
			  			<?php endforeach;?>
			  		</tbody>
			  	</table>
			  </div>
			</div>
		</div>


		

	</div>
</div>

	
