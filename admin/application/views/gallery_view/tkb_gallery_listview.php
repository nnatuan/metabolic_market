		<div class="app-title">
            <div>
               <h1><i class="ico-artist"></i>Quản lý Thư viện ảnh</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Thư viện ảnh</li>
            </ul>
         </div>
		<form name="frm_employee" method="post" action="<?php echo $link_page; ?>"> 
		<div class="card card-flat table-responsive">
			<div class="card-header">
				<button class="btn mui-btn mui-btn--accent" style="margin-bottom:20px;" onclick="js_SetSubmitButtonClick(this.form,'btn_add');">Thêm mới</button>
				<input type="hidden" name="hidden_button"  id="hidden_button"/>		
			</div>
            <table class="table datatable table-striped">
               <thead>
                  <tr>
                     <th style="width:100px;">#</th>
                     <th>Tên</th>
					 <th>Status</th>
					 <th>Index</th>
                     <th>Note</th>
					 <th class="text-center">Actions</th>
                  </tr>
               </thead>
               <tbody>
					<?php $i=1; 
						foreach($data_view as $data){
					?>
                  <tr>
                     <td><?php echo $i; ?></span></td>
                     <td><a href="<?php echo base_url().'index.php/do_gallery/f_edit/'.Fview_text($data['nid']); ?>"><?php echo Fview_text($data['ctitle']); ?></a></td>   
					 <td><?php  if(Fview_text($data['nstatus'])==1)
						{
							echo '<a href="'.base_url().'index.php/do_gallery_listview/f_active/'.$data['nid'].'/'.$data['nstatus'].'"><img src="'.base_url() .'images/publish.png"></a>';
						
						}
						else 
							echo '<a href="'.base_url().'index.php/do_gallery_listview/f_active/'.$data['nid'].'/'.$data['nstatus'].'"><img src="'.base_url() .'images/unpublish.png"></a>';

						 ?></td>					 
					 <td><?php echo Fview_text($data['cindex']); ?></td>
                     <td><?php if(strlen($data['cnote'])>35) echo Fview_text(substr($data['cnote'],0,35)).'...';else  echo Fview_text($data['cnote']); ?></td>
					 <td class="text-center">
                        <ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="<?php echo base_url().'index.php/do_gallery_img_listview/get/'.$data['nid']?>" class="dropdown-item"><i class="ico-edit"></i> Thêm hình</a></li>
                              </ul>
                           </li>
                        </ul>
                     </td>
                  </tr>
					<?php $i++;} ?>
			   </tbody>
            </table>
         </div>
         </form>