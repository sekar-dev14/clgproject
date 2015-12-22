					<?php
					$columncount = 1;	
					foreach($FieldList as $columnname => $FIELD){
						if($FIELD['fieldname'] == 'uid')continue;
						@extract($FIELD);
					if($columncount%2 == 1){ 
                                        	?> <div class="form-group">
					<?php
					}
					?>
					    <div class="col-lg-6">	
						    <label><?php echo $labelname; ?></label>
						    <?php
							if($uitype == 'string' || $uitype == 'email' || $uitype == 'dob' || $uitype == 'mobileno'){
						    ?>
							<input type="text" class="form-control <?php echo $uitype ?>" <?php echo $is_required == 1 ? 'required' : '' ?> name="<?php echo $fieldname ?>" value="<?php echo $$fieldname ?>" />
						    <?php
							}else if($uitype == 'textarea'){
							?>
							<textarea name = "<?php echo $fieldname ?>" class="form-control <?php echo $uitype ?>" <?php echo $is_required == 1 ? 'required' : '' ?> ><?php echo $$fieldname ?></textarea>
							<?php
							}else if($uitype == 'radio'){
							?>
							<?php
								$option = explode(',',$optionvalue);
								$checked = $$fieldname == '' ? 'a' : $$fieldname;
								foreach($option as $val){
									?>
								<div >
                                                		 <label>	
								  	<input type="radio" name="<?php echo $fieldname ?>" class="<?php echo $uitype ?> " value="<?php echo $val ?>" <?php echo $checked == '' || $checked == $val ? 'checked' : '' ?> <?php echo $is_required == 1 ? 'required' : '' ?>  />
									<span>	<?php echo ucwords($val) ;?></span>
								 </label>
								</div>
								
							<?php
								}	
							}else if($uitype == 'checkbox'){
								$option = explode(',',$optionvalue);
                                                                $checked = $$fieldname == '' ? 'a' : $$fieldname;
                                                                foreach($option as $val){
                                                                        ?>
								<div >
                                                		 <label>
                                                                	<input type="checkbox" name="<?php echo $fieldname ?>" class=" <?php echo $uitype ?> " value="<?php echo $val ?>" <?php echo $checked == 'a' || $checked == $val ? 'checked' : '' ?>  <?php $is_required == 1 ? 'required' : '' ?>/>
                                                                	<?php echo ucwords($option) ;?> &nbsp;&nbsp;
								 </label>
								</div>
                                                                

							<?php
								}
							}else if($uitype == 'picklist'){
								$sql = "select * from picklist_$fieldname ;";
								$px  = mysql_query($sql);
								$checked = $$fieldname; 
								$option = '';
								while($ps = mysql_fetch_assoc($px)){
									$selected = $ps['value'] == $checked ? 'selected' : '';
									$option .= "<option value = '{$ps['value']}' $selected >{$ps['value']}</option>";
								}
								?>
								<select name="<?php echo $fieldname ?>" class="form-control <?php echo $uitype ?>" <?php echo $is_required == 1 ? 'required' : '' ?> >
									<?php echo $option  ; ?>
								</select><br> 
							<?php	
							}
						?>
					    </div>

						<?php
					if($columncount%2 == 1){ 
						    ?>			
                                        	</div>
					<?php 
					}
						$columncount++;
						}
					if($columncount%2 == 1){ 
						    ?>			
                                        	</div>
					<?php
					}
					?>
