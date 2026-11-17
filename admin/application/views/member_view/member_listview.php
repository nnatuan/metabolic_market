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
                    <h2>QUẢN LÝ KHÁCH HÀNG</h2>
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
									<input name="btn_delete" type="button" class="btn btn-danger" value="Xóa các mục đã chọn"  
										   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
												'<?php echo $msg_confirm_before_delete; ?>' ,
												'<?php echo $msg_invalid_before_delete;  ?>' )" class="button" />
									<input type="hidden" name="hidden_button"  id="hidden_button"/>	
							</div>
							<table id="datatable" class="table table-striped table-bordered" style="width:100%">
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
								  <th>Họ tên</th>
								  <th>SĐT</th>
								  <th>Email</th>
								  <th>Địa chỉ</th>
								  <th>Trạng thái</th>
								  <th></th>
								</tr>
							  </thead>
								<tbody>
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
									 <td class="text-left"><?php echo Fview_text($data['cname']); ?></td>   
									 <td><?php echo Fview_text($data['cphone']); ?></td>
									 <td><?php echo Fview_text($data['cemail']); ?></td>
									 <td><?php echo Fview_text($data['caddress']); ?></td>
									 <td>
										<a href="javascript:void(0)" onclick="update_status('tmember','<?php echo $data['nid']; ?>','cstatus')">
											<i id="i-cstatus-<?php echo $data['nid']; ?>" class="i-status fa <?php if($data['cstatus']==1) echo "fa-check text-success"; else echo "fa-times text-danger"; ?>" aria-hidden="true"></i>
										</a>
									</td>
									 <td><a href="javascript:void(0);" onclick="reset_pass('<?php echo $data['nid']; ?>');">Đặt lại mật khẩu</a><br><span id="pass-<?php echo $data['nid']; ?>" style="font-weight:bold;color:red;"></span></td>
								  </tr>
								<?php $i++;} ?>
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
        </div>
		</form>
        <!-- /page content -->
		<script type="text/javascript" >
function reset_pass(_nid)
{
	$.ajax({
		type: "POST",
		url: "<?php echo base_url()?>index.php/do_member_listview/reset_pass",
		data: { nid: _nid },
		success: function(result) {
			$('#pass-'+_nid).text(result);
		}
	});
}
</script>