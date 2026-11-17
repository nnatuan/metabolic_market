<!-- page content -->
<style>
.ajax-loader {
  visibility: hidden;
  background-color: rgba(0,0,0,0.5);
  position: fixed;
  z-index: +100 !important;
  width: 100%;
  height:100%;
  top: 0;
  left: 0;
  text-align: center;
}
.ajax-loader p {
	font-size:20px !important;
	position: absolute;
	top: 45%;
	color: #fff;
	width:100%;
	text-align:center;
    letter-spacing: 3px;	
}
.ajax-loader p .fa {
	font-size:30px !important;
}
</style>
<div class="ajax-loader">
	<p><i class="fa fa-spinner fa-spin fa-3x"></i><br> <em>Waiting...</em></p>
</div>
			<div class="right_col" role="main">
					<div class="page-title">
						<div class="title_left">
							<h3><small></small></h3>
						</div>

						<div class="title_right">
							
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Thêm mới / Chỉnh sửa</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form name='form_main' method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">
										<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
										  <li class="nav-item">
											<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="true">Thông tin cơ bản</a>
										  </li>
										  <li class="nav-item">
											<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile" aria-selected="false">Nội dung bài viết</a>
										  </li>
										  <li class="nav-item">
											<a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="contact" aria-selected="false">Hình ảnh đại diện</a>
										  </li>

										</ul>
										
										<div class="tab-content" id="myTabContent">
										  <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="home-tab">
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Tên <span class="required">*</span></label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" name="txt_cproducts" value='<?php echo $txt_cproducts; ?>' required="required" class="form-control" onkeyup="document.getElementById('txt_ccode').value = locdau(this.value);checkTitleSEO(this.value,'title');">
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Code <span class="required">*</span></label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" id="txt_ccode" name="txt_ccode" value="<?php echo $txt_ccode; ?>" placeholder="" class="form-control ">
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-3 label-align">Phân loại</label>
												<div class="col-md-8 col-sm-6 ">
													<select class="form-control " name="cbo_nid_material_products" id="cbo_nid_material_products" >
														<option value="">-- Chọn phân loại --</option>
														<?php foreach($material_product_view as $data): ?>	
														<option <?php if($data['nid'] == $cbo_nid_material_products){echo 'selected="selected"';} ?> value="<?php echo $data['nid'] ?>"><?php echo $data['cmaterial_products'] ?></option>
														<?php endforeach; ?>
													 </select>
												</div>	
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-3 label-align">Nhóm</label>
												<div class="col-md-8 col-sm-6 ">
													<?php //echo $gencbo_cat_product_list; ?>
													<div id="cnid_cat_products">
													<select class="form-control " id="cbo_nid_cat_products" name="cbo_nid_cat_products" >
													   <option></option>
													</select>
													</div>	
												</div>	
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Chỉ mục </label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" name="txt_cindex" value="<?php echo $txt_cindex; ?>" placeholder="" class="form-control ">
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Giá gốc</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" name="fprice" value="<?php echo $txt_fprice; ?>" placeholder="" class="form-control ">
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Giá giảm</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" name="txt_fprice_sale" value="<?php echo $txt_fprice_sale; ?>" placeholder="" class="form-control ">
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Mã SP </label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" name="txt_ctag" value="<?php echo $txt_ctag; ?>" placeholder="" class="form-control ">
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Mô tả FB </label>
												<div class="col-md-8 col-sm-8 ">
													<textarea class="form-control" id="" name="fb_cdescription" style="height:180px;" onkeyup="checkTitleSEO(this.value,'desc');"><?php echo $fb_cdescription; ?></textarea>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="profile-tab">
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Mô tả </label>
												<div class="col-md-8 col-sm-8 ">
													<textarea class="form-control" id="editor1" name="txt_cdescription"><?php echo $txt_cdescription; ?></textarea>
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Chi tiết </label>
												<div class="col-md-8 col-sm-8 ">
													<textarea class="form-control" id="editor2" name="txt_cdetail"><?php echo $txt_cdetail; ?></textarea>
												</div>	
											</div>
										</div>
										<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="profile-tab">
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align"></label>
												<div class="col-md-8 col-sm-8 text-danger">
													<em>* Lưu ý: để tránh phát sinh lỗi không mong muốn vui lòng:<br>- Nhập size < 2MB<br>- Kích thước hình vuông dài rộng tối đa 2000x2000<br>- Tên file ảnh không dấu.</em>
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Image <br><span style="color:red;">(1000x1000)</span></label>
												<div class="col-md-8 col-sm-8 ">
													<input name="txt_cimage" type="file" id="txt_cimage" value ="" size="25" style="width:400px;"/>
													 <br>
													 <?php if($txt_cimage != ''): ?>
													 <img style="margin-top:10px" width="200" src="<?php echo $fr_img.'upload/images_product/full_images/'.$txt_cimage; ?>"/>
													 <?php endif; ?>
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Image FB <br><span style="color:red;">(600x315)</span></label>
												<div class="col-md-8 col-sm-8 ">
													<input name="cproduct_fb" type="file" id="cproduct_fb" value ="" size="25" style="width:400px;"/>
													 <br>
													 <?php if($cproduct_fb != ''): ?>
													 <img style="margin-top:10px" width="200" src="<?php echo $fr_img.'upload/images_product/fb/'.$cproduct_fb; ?>"/>
													 <?php endif; ?>
												</div>
											</div>
										</div>
										
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-8 col-sm-8 offset-md-2">
												<button type="button" class="btn btn-primary" name="btn_submit" value ="<?php echo $btn_update; ?>" 
													onclick ="js_SetSubmitButtonClick(this.form, this.name);">Xác nhận</button>
												<button class="btn btn-danger" type="button" name="btn_cancel" value ="<?php echo $btn_cancel; ?>" 
													onclick ="location.href='<?php echo $link_cancel; ?> '">Quay về</button>
											</div>
										</div>
										<input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
									  <input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
									  <input name="hidden_image_old" type="hidden" value = "<?php echo $txt_cimage; ?>"  />
									  <input name="hidden_image_old_resize" type="hidden" value = "<?php echo $txt_cimage_resize; ?>"  />
									  <input type="hidden" name="hidden_button"  value = "" />

									</form>
								</div>
							</div>
						</div>
					</div>

					
				</div>
			</div>
			<!-- /page content -->


<script src="https://code.jquery.com/jquery-latest.min.js"></script>				
<script type="text/javascript" >
	
$(document).ready(function() {

   	//Default Action
   
   	$(".tab_content").hide(); //Hide all content
   
   	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
   
   	$(".tab_content:first").show(); //Show first tab content
   
   	
   
   	//On Click Event
   
   	$("ul.tabs li").click(function() {
   
   	
   
   		$("ul.tabs li").removeClass("active"); //Remove any "active" class
   
   		$(this).addClass("active"); //Add "active" class to selected tab
   
   		$(".tab_content").hide(); //Hide all tab content
   
   		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
   
   		$(activeTab).fadeIn(); //Fade in the active content
   
   		return false;
   
   	});
   
   
   
   });

   function js_SetSubmitButtonClick(obj_form, btn_name) 
   	{
   		obj_form.hidden_button_click.value = btn_name;
   		obj_form.submit();		
   	}	
   $('#cbo_nid_material_products').change(function() {
   	_nid_cat =this.value;
	
   	$("#cnid_cat_products").html('loading...');
    	$.post("<?php echo base_url().'index.php/Do_product/ajax_get_product_cat/'?>", { nid_cat: _nid_cat},
     	function(data) {
   		$("#cnid_cat_products").html(data);
     	});
   });
   load_cat();
   function load_cat()
   {
   	_nid_sec ='<?php echo $cbo_nid_material_products?>';
   	_nid_cat='<?php echo $cbo_nid_cat_products?>';
   	if(_nid_cat !='')
   	{
   		$.post("<?php echo base_url().'index.php/do_product/ajax_get_product_cat_select/'?>", { nid_cat: _nid_sec,nid_cat_select:_nid_cat},
   		function(data) {
   		
   			$("#cnid_cat_products").html(data);
   		});
   	}
   }
   
   $('#cbo_province').change(function() {
   	_nid_province =this.value;
	
   	$("#div_district").html('loading...');
    	$.post("<?php echo base_url().'index.php/Do_product/ajax_get_district/'?>", { nid_province: _nid_province},
     	function(data) {
   		$("#div_district").html(data);
     	});
   });
  
   load_district();
   function load_district()
   {
   	_nid_province ='<?php echo $cbo_province?>';
   	_nid_district='<?php echo $cbo_district?>';
   	if(_nid_district !='')
   	{
   		$.post("<?php echo base_url().'index.php/do_product/ajax_get_district_select/'?>", { nid_province: _nid_province,nid_district:_nid_district},
   		function(data) {
   			$("#div_district").html(data);
   		});
   	}
   }
   
</script>