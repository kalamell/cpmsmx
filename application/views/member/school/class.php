
<?php echo form_open('', array('id' => ''));?>



<div class="clearfix"></div>


<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ชั้นเรียนที่เปิดสอน</div>
	  <div class="panel-body">
			 <div class="form-group col-md-6">
				<label for="username">ชั้นเรียนที่สอนต่ำสุด</label>
			    <select class="form-control">
			    	<option value=""> - - - เลือกข้อมูล - - -</option>
			    </select>
			</div>

			<div class="form-group col-md-6">
				<label for="username">ชั้นเรียนที่สอนสูงสุด</label>
			    <select class="form-control">
			    	<option value=""> - - - เลือกข้อมูล - - -</option>
				</select> 
			</div>

		
		</div>
	</div>
</div>


<div class="col-md-12">
	<button class="btn btn-success" type="submit">บันทึกข้อมูล</button>
</div>
<?php echo form_close();?>
	