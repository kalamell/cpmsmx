	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">  ตารางแสดงครูใน สพฐ.กับหน่วยงานอื่น จำแนกตามอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">  ตารางแสดงครูใน สพฐ.กับหน่วยงานอื่น จำแนกตามอำเภอ</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">
							<div class='table-responsive'>
								<table class="table table-bordered table-striped">
				                  <thead>
				                    <tr>
				                      <th width="120" rowspan="2">อำเภอ</th>
				                      <?php foreach($level as $l):?>
				                      	<th colspan="3"><?php echo $l['level_name'];?></th>
				                      <?php endforeach;?>
				                      <th width="100"  colspan="3">รวม</th>
				                    </tr>
				                    <tr>
				                    	<?php foreach($level as $l):?>
					                    	<th>ครู</th>
					                    	<th>นักเรียน</th>
					                    	<th>อัตราส่วน</th>
					                    <?php endforeach;?>

					                    <th>ครู</th>
				                    	<th>นักเรียน</th>
				                    	<th>อัตราส่วน</th>
				                    </tr>
				                    
				                  </thead>
				                  <tbody>
				                    <?php
				                    $ar = array(); 
				                    foreach($amphur as $am):?>
				                    	<tr>
				                    		<td style='' colspan="">
				                    			<?php echo $am->AMPHUR_NAME;?>
				                    			
				                    		</td>
				                    	
				                    		<?php 
				                    		$sum_num = 0;
				                    		foreach($level as $l):?>
					                      		<td width="100" style="text-align: right;">
					                      			<?php 

					                      			
					                      			$num = 0;

					                      			echo $num;
					                      			$sum_num += $num;

													$ar[$l['level_id']] = isset($ar[$l['level_id']]) ?  $num + $ar[$l['level_id']] : $num;
					                      			
					                      			?>
					                      		</td>


					                      		<td width="100" style="text-align: right;">
					                      			<?php 

					                      			$num = 0;

					                      			echo $num;
					                      			$sum_num += $num;

													//$ar[$l['level_id']] = isset($ar[$l['level_id']]) ?  $num + $ar[$l['level_id']] : $num;
					                      			
					                      			?>
					                      		</td>

					                      		<td width="100" style="text-align: right;">
					                      			0:0
					                      		</td>


					                      		
					                      		</td>

					                    	<?php endforeach;?>
					                    	<td width="100" style="text-align: right"><strong>0</strong></td>
					                    	<td width="100" style="text-align: right"><strong>0</strong></td>
					                    	<td width="100" style="text-align: right"><strong>0:0</strong></td>
					                    </tr>
				                    <?php endforeach;?>

				                    <tr>
				                    	<td style="text-align: right">รวม</td>
				                    	<?php 
				                    	$total_sum = 0;
				                    	foreach($ar as $_a => $v) {
				                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
				                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
				                    		echo '<td style="text-align: right;"><strong>0:0</strong></td>';
				                    		$total_sum += $v;
				                    	}
				                    	?>
				                    	<td style="text-align: right"><strong>0</strong></td>
				                    	<td style="text-align: right"><strong>0</strong></td>
				                    	<td style="text-align: right"><strong>0:0</strong></td>
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

	
