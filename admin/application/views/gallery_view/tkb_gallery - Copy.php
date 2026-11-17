<div id="ContentMessage">
	<div id="NoteContentMessage">
		<?php echo $get_message_notnull ?>
	</div>
	
	<div id="ErrorContentMessage">
		<?php echo $lbl_error_msg; ?>
	</div>
</div>		
<form  name='form_main' id="form_main" method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">	
<div id="SiteContent_main">			
	
	
	<div id="EditContent">
		<table class="EditStyle01" >
			<tbody>		
			
				<tr>
						<td class="key" width="150" align="right">
						<?php echo 'Tên'; ?><?php echo $get_icon_notnull; ?>					</td>
						<td width="400">
							<input style="width:238px;" type="text" width="" name="ctitle" value="<?php echo $ctitle; ?>" onkeyup="document.getElementById('txt_ccode').value = locdau(this.value);">					</td>
				</tr>	
				<tr>
                  <td class="key">
                     <?php echo 'Code'; ?><?php echo $get_icon_notnull; ?>					
                  </td>
                  <td>
                     <input style="width:250px;" type="text" width="" name="txt_ccode" value="<?php echo $txt_ccode; ?>" id="txt_ccode">					
                  </td>
                  
               </tr>	
				<tr>
						<td class="key" width="150" align="right">
						<?php echo 'Chỉ mục'; ?>					</td>
						<td width="400">
							<input style="width:238px;" type="text" width="" name="cindex" value="<?php echo $cindex; ?>" maxlength="4"/>					</td>
				</tr>
				
				<tr>
					<td align="right" class="key">
						<?php echo 'Hình ảnh'; ?>						</td>
					<td>
						<input name="cimage" type="file" id="cimage" value ="" size="25" /> 
						<br/>Width:400px; height:400px
						<div style="position:absolute; top:95px; left:650px;">
							<div style="border:1px #CCC solid;width:170px;height:200px; text-align:center;">
							<?php 
								$url_icon = base_url().'do_gallery/delete_image_icon/'.$nid; 
							?>
								<div id="images_div_icon">
							<?php 
								if($cimage !='') echo '<img width="150" style=" border:none;"  height="150" src="'.$fr_img.'upload/gallery/'.$cimage.'  "/>';
								else echo 'No image ';
							?>
								
								</div>
								
							</div>
							
						</div>
					</td>
				</tr>
                
				
				<tr>
						<td class="key" width="150" align="right">
						<?php echo $lbl_cnote; ?></td>
						<td width="400" >
                        <textarea name="cnote" style="width:233px;height:150px;"><?php echo $cnote?></textarea>			

						</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="button" name="btn_submit" style="width:80px;" value ="<?php echo $btn_update; ?>" 
							onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="button"/>
													   
						<input name="btn_cancel" style="width:80px;" type="button" 
							   value = "<?php echo $btn_cancel; ?>"
							   onclick="location.href='<?php echo $link_cancel; ?> '" class="button"/>
					</td>
				</tr>		
			
			<tbody>				
		</table>
	</div>
	<input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
	<input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
	<input type="hidden" name="hidden_button_click"  value = "" />	
	<input type="hidden" name="hidden_image_old"  value = "<?php echo $cimage; ?>" />

</div>
</form>

<!-- BAT BUOC CAC FORM NHAP LIEU DEU PHAI DUNG SCRIPT NAY. -->

<script type="text/javascript" >
function js_SetSubmitButtonClick(obj_form, btn_name) 
	{
		obj_form.hidden_button_click.value = btn_name;
		obj_form.submit();		
	}	

</script>