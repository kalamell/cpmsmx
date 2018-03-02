	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active"> ตารางแสดงจำนวนครู/ครูพี่เลี้ยง ที่มี/ไม่มี วุฒิการศึกษาตรงสาขาในแต่ละชั้น</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading"> ตารางแสดงจำนวนครู/ครูพี่เลี้ยง ที่มี/ไม่มี วุฒิการศึกษาตรงสาขาในแต่ละชั้น</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">
							<div class='table-responsive'>
							<table class="table table-bordered table-striped">
			                  <thead>
				                    <tr>
				                      <th width="120" rowspan="2">อำเภอ</th>
				                      <?php foreach($level as $l):?>
				                      	<th colspan="2"><?php echo $l['level_name'];?></th>
				                      <?php endforeach;?>
				                      <th width="100" colspan="2">รวม</th>
				                    </tr>

				                    <tr>

				                    <?php foreach($level as $l):?>
				                      	<th colspan="">ตรง</th>
				                      	<th colspan="">ไม่ตรง</th>
				                      <?php endforeach;?>
				                      <th colspan="">ตรง</th>
				                      	<th colspan="">ไม่ตรง</th>
				                  </tr>
				                    
				                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo (count($level) * 2) + 3;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php
			                    		
			                    		foreach($cert as $c):?>
			                    			
		                    				<tr>
				                    			<td><?php echo $c['name'];?></td>
				                    			<?php 
				                    			$sum = 0;
				                    			foreach($level as $l):?>
						                      		<td width="100" style="text-align: right;">
						                      			<?php 
						                      			

						                      			
						                      			$num = 0;
						                      			
						                      			echo $num;
						                      			
						                      			$sum+= $num;

						                      			$ar[$l['level_id']] = isset($ar[$l['level_id']]) ?  $num + $ar[$l['level_id']] : $num;

						                 

						                      			?>
						                      		</td>

						                      		<td width="100" style="text-align: right;">0</td>

						                      		
						                      	
						                    	<?php endforeach;?>
						                    	<td style="text-align: right;"><strong><?php echo $sum;?></strong></td>
						                    	<td style="text-align: right;"><strong><?php echo $sum;?></strong></td>
						                    </tr>

					                    <?php endforeach;?>

			                    	
			                    <?php endforeach;?>
			                   
			                    <tr>
			                    	<td style="text-align: right;"><strong>รวม</strong></td>
			                    	<?php 
			                    	$total_sum = 0;
			                    	foreach($ar as $_a => $v) {
			                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
			                    		$total_sum += $v;
			                    	}
			                    	?>
			                    	<td style="text-align: right"><strong><?php echo $total_sum;?></strong></td>
			                    	<td style="text-align: right"><strong><?php echo $total_sum;?></strong></td>
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

	
