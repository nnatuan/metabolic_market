<!-- page content -->
<form name="frm_main" method="post" action="<?php echo $link_page; ?>"> 
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><small></small></h3>
              </div>

              <div class="title_right text-right">
					
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>QUẢN LÝ SẢN PHẨM</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
							<div class="top-filter" style="">
									<input name="btn_header_add" type="button" class="btn btn-primary" value="Thêm mới" 
										onclick="js_SetSubmitButtonClick(this.form,'btn_add');" class="button"/>
									
									<input name="btn_delete" type="button" class="btn btn-danger" value="Xóa các mục đã chọn"  
										   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
												'<?php echo $msg_confirm_before_delete; ?>' ,
												'<?php echo $msg_invalid_before_delete;  ?>' )" class="button" />
				
									
									<input type="hidden" name="hidden_button"  id="hidden_button"/>	
							</div>
							<div class="mgb15" style="">
							<table id="datatable" class="table table-striped table-bordered">
							  <thead>
								<tr>
								  <th>
									<div class="d-flex align-items-center justify-content-center">
									 <span>#</span>
									 <span>	
										<input name="chkItems" type="checkbox" class="checkbox" 
										   onclick="js_CheckAllClick(this,this.name);" />
										</span>
									</div>	
								  </th>
								  <th style="width:400px;">Tên</th>
								  <th style="width:200px;">Phân loại</th>
								  <th style="width:200px;">Nhóm</th>
								  <th style="width:100px;">Trạng thái</th>
								  <th style="width:100px;">Trang chủ</th>
								  <th style="width:100px;">Khuyến mãi</th>
								  <th style="width:100px;">Hàng mới</th>
								  <th style="width:100px;">Bán chạy</th>
								  <th style="width:80px;"></th>

								</tr>
							  </thead>
								<tbody>
								<tr class="filter">
									<td>
										<input name="btn_filter" type="button" class="btn btn-info btn-sm" value="<?php echo $btn_filter; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);"/>
									</td>
									<td>
										<input name="txtf_cproducts" type="text" class="form-control" value="<?php echo $txtf_cproducts; ?>" id="txtf_cproducts"/>					
									</td>
									<td><?php echo $gencbo_material_product_list ?></td>
									<td><div id="cnid_cat_products"><?php echo $gencbo_cat_product_list ?></div></td>
									<td><?php echo $gen_cbo_status ?></td>
									<td><?php echo $gen_cbo_home; ?></td>
									<td>&nbsp</td>
									<td>&nbsp</td>
									<td>&nbsp</td>
									<td>&nbsp</td>
								</tr> 
								<?php $i=1; 
								foreach($data_view as $data){
								?>
								  <tr>
									 <td>
										 <div class="d-flex align-items-center justify-content-center">
										 <span><?php echo $i; ?></span>	
										 <span>	
											<input name="chk[]" type="checkbox" value="<?php echo $data['nid']; ?>"
												id="chkItems" class="checkbox" 								   
												onclick="js_CheckItemClick(this, 'chkItems','chkItems');" />
											</span>	
										 </div>
									 </td>
									 <td class="text-left"><a href="<?php echo base_url() . 'index.php/do_product/f_edit/' . $data['nid']; ?>"><?php echo Fview_text($data['cproducts']); ?></a></td>  
									 <td class="text-left"><?php echo Fview_text($data['cmaterial_products']); ?></td>
									<td class="text-left"><?php echo get_cat_product_name($data['nid_cat_products']); ?></td>	
									<td>
										<a href="javascript:void(0)" onclick="update_status('tproducts','<?php echo $data['nid']; ?>','nstatus')">
											<i id="i-nstatus-<?php echo $data['nid']; ?>" class="i-status fa <?php if($data['nstatus']==1) echo "fa-check text-success"; else echo "fa-times text-danger"; ?>" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<a href="javascript:void(0)" onclick="update_status('tproducts','<?php echo $data['nid']; ?>','nhome')">
											<i id="i-nhome-<?php echo $data['nid']; ?>" class="i-status fa <?php if($data['nhome']==1) echo "fa-check text-success"; else echo "fa-times text-danger"; ?>" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<a href="javascript:void(0)" onclick="update_status('tproducts','<?php echo $data['nid']; ?>','ncheck')">
											<i id="i-ncheck-<?php echo $data['nid']; ?>" class="i-status fa <?php if($data['ncheck']==1) echo "fa-check text-success"; else echo "fa-times text-danger"; ?>" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<a href="javascript:void(0)" onclick="update_status('tproducts','<?php echo $data['nid']; ?>','nnew')">
											<i id="i-nnew-<?php echo $data['nid']; ?>" class="i-nnew fa <?php if($data['nnew']==1) echo "fa-check text-success"; else echo "fa-times text-danger"; ?>" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<a href="javascript:void(0)" onclick="update_status('tproducts','<?php echo $data['nid']; ?>','nspecial')">
											<i id="i-nspecial-<?php echo $data['nid']; ?>" class="i-nspecial fa <?php if($data['nspecial']==1) echo "fa-check text-success"; else echo "fa-times text-danger"; ?>" aria-hidden="true"></i>
										</a>
									</td>	
									<td><a href="<?php echo base_url().'index.php/do_product_img/get_id/'.$data['nid']?>">Hình ảnh</a></td>
								  </tr>
								<?php $i++;} ?>
							  </tbody>
							</table>
							</div>
							<table class="table table-filter" cellspacing="1">
								<tr>						
									<td class="d-flex">	
												
									</td>
									
									<td>
										<div class="d-flex justify-content-end align-items-center">	
											<label class="mg0"><?php echo $lbl_rows_per_page; ?>:</label>&nbsp;
											
											<input class="form-control" name="txt_row_per_page" type="text" size="5" value="<?php echo $txt_row_per_page; ?>"
													style="text-align:center;height:31px;width:80px;" />&nbsp;
											
											<input name="btn_row_per_page" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);" class="btn btn-info btn-sm"/>
										</div>
									</td>
									
									<td>
										<div class="d-flex justify-content-end align-items-center">		
											<?php if($txt_current_page > 1): ?>
											<input class="btn btn-secondary btn-sm" name="btn_previous" type="button" value="<<" 
												onclick="js_SetSubmitButtonClick(this.form,'btn_previous');"/>&nbsp;	
											<?php endif; ?>
											
											<label class="mg0"><?php echo $txt_current_page . ' / ' . $txt_total_page; ?></label>&nbsp;
											
											<?php if($txt_current_page < $txt_total_page): ?>
											<input class="btn btn-secondary btn-sm" name="btn_next" type="button" value=">>" 
												onclick="js_SetSubmitButtonClick(this.form,'btn_next');"/>&nbsp;
											<?php endif ?>
													
											<input class="form-control" name="txt_current_page" type="text" value="<?php echo $txt_current_page ; ?>"
												style="text-align:center;height:31px;width:50px;" size="5" />&nbsp;
												   
											<input name="btn_page_number" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);" class="btn btn-info btn-sm" />
										</div>	
									</td>
								</tr>					
							</table>
						  </div>
						  </div>
					  </div>
					</div>
                </div>
              </div>

			</div>
          </div>
        </div>
		</form>
        <!-- /page content -->
<script src="https://code.jquery.com/jquery-latest.min.js"></script>		
<script type="text/javascript">
jQuery('#cbof_nid_material_products').change(function() {
	_nid_cat =this.value;
	jQuery("#cnid_cat_products").html('loading...');
 	jQuery.post("<?php echo base_url().'index.php/do_product_listview/ajax_get_product_cat/'?>", { nid_cat: _nid_cat},
  	function(data) {
		jQuery("#cnid_cat_products").html(data);
  	});
});
</script>