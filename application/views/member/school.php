<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li><a href="<?php echo site_url('member');?>">ข้อมูลสมาชิก</a></li>
			  <li class="active">ปรับปรุงข้อมูลพื้นฐานโรงเรียน</li>
			</ol>

			<h2 class="page-header">ปรับปรุงข้อมูลพื้นฐานโรงเรียน</h2>

			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">ข้อมูลพื้นฐาน 1</a></li>
			    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">ข้อมูลพื้นฐาน 2</a></li>
			    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">ข้อมูลพื้นฐาน 3</a></li>
			    <li role="presentation"><a href="#computer" aria-controls="computer" role="tab" data-toggle="tab">ข้อมูลคอมพิวเตอร์</a></li>
			    <li role="presentation"><a href="#eng" aria-controls="eng" role="tab" data-toggle="tab">ข้อมูลไฟฟ้า</a></li>
			    <li role="presentation"><a href="#water" aria-controls="water" role="tab" data-toggle="tab">ข้อมูลแหล่งน้ำ</a></li>

			    <li role="presentation"><a href="#class" aria-controls="class" role="tab" data-toggle="tab">ชั้นเรียนที่เปิดสอน</a></li>
			    <li role="presentation"><a href="#room" aria-controls="room" role="tab" data-toggle="tab">จำนวนห้องในแต่ละชั้น</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane active" id="tab1">
			    	<?php $this->load->view('member/school/data1', $this);?>
			    </div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab2">
			    	<?php $this->load->view('member/school/data2', $this);?>
			    </div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="tab3">...</div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="computer">...</div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="water">...</div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="class">...</div>
			    <div role="tabpanel" style="padding-top: 20px;" class="tab-pane fade " id="room">...</div>
			  </div>



		</div>
	</div>
	
</div>