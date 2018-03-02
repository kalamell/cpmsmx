	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">  ตารางวิเคราะห์ความขาดแคลนครูในแต่ละโรงเรียน</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">  ตารางวิเคราะห์ความขาดแคลนครูในแต่ละโรงเรียน</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">
							<div class='table-responsive'>
							<table class="table table-bordered table-striped">
			                  <thead>
				                    <tr>
				                      <th width="120" rowspan="2">อำเภอ</th>

				                      <th width="120" rowspan="2">นักเรียน</th>
				                      <th width="120" rowspan="2">ห้องเรียน</th>
				                      
				                      <th width="100" colspan="2">ครู</th>
				                      <th width="100" colspan="2">ขาด (-)</th>
				                      <th width="100" colspan="2">เกิน (+)</th>

				                      <th width="100" >อัตราส่วน</th>
				                    </tr>

				                    <tr>
				                    	<th>มีจริง</th>
				                    	<th>ตามเกณฑ์</th>
				                    	<th>จำนวน</th>
				                    	<th>ร้อยละ</th>
				                    	<th>จำนวน</th>
				                    	<th>ร้อยละ</th>
				                    	<th>นักเรียน:ห้อง:ครู</th>
				                    </tr>
				                    
				                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="">
			                    		<td style='' colspan=""><?php echo $am->AMPHUR_NAME;?></td>
			                    		
			                    		<td style="text-align: right">0</td>
			                    		<td style="text-align: right">0</td>
			                    		<td style="text-align: right">0</td>
			                    		<td style="text-align: right">0</td>
			                    		<td style="text-align: right">0</td>
			                    		<td style="text-align: right">0</td>
			                    		<td style="text-align: right">0</td>
			                    		<td style="text-align: right">0</td>
			                    		<td style="text-align: right">0:0:0</td>
			                    	</tr>
			                    	
			                    	
			                    	
			                    <?php endforeach;?>
			                   
			                    <tr>
			                    	<td style="text-align: right;"><strong>รวม</strong></td>
			                    	
			                    	<td style="text-align: right"><strong>0</strong></td>
		                    		<td style="text-align: right"><strong>0</strong></td>
		                    		<td style="text-align: right"><strong>0</strong></td>
		                    		<td style="text-align: right"><strong>0</strong></td>
		                    		<td style="text-align: right"><strong>0</strong></td>
		                    		<td style="text-align: right"><strong>0</strong></td>
		                    		<td style="text-align: right"><strong>0</strong></td>
		                    		<td style="text-align: right"><strong>0</strong></td>
		                    		<td style="text-align: right"><strong>0:0:0</strong></td>

			                    </tr>
			                  </tbody>
			                  
			                </table>
			            	</div>
			            </div>
			        </div>

				  </div>
				</div>
			</div>


			

		</div>
	</div>

	
