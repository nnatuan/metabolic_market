<?php				
	header("Content-Type: text/html; charset=UTF-8");
?>
<h1 style="text-align:center;font-size:16px;">DANH SÁCH SẢN PHẨM</h1>
<table width="100%" border="1" >

		<tr style="background:#ccc;font-weight:bold;text-align:center;">
								  <th style="text-align:center;">#</th>	
								  <th>Tên</th>
								  <th>Phân loại</th>
								  <th>Nhóm</th>
								  <th style="width:100px;">Giá gốc</th>
								  <th style="width:100px;">Giá giảm</th>
								  <th style="width:100px;">Trạng thái</th>
								  <th style="width:100px;">Trang chủ</th>
								  <th style="width:100px;">Khuyến mãi</th>
								  <th style="width:100px;">Flashsale</th>	
								  <th style="width:100px;">Bán chạy</th>
								  <th style="width:100px;">Hết hàng</th>
		</tr>
		<?php $i=1; 
								foreach($data_view as $data){
								?>
		<tr>
									 <td style="text-align:center;"><?php echo $i; ?></span></td> 
									 <td><?php echo $data['cproducts']; ?></td>  
									 <td><?php echo $data['cmaterial_products']; ?></td>
									<td><?php echo $data['ccat_products']; ?></td>
									<td><?php echo number_format($data['fprice']); ?></td>
									<td><?php echo number_format($data['fprice_sale']); ?></td>
									<td style="text-align:center;"><?php 
											$link = "#";
											echo show_img_pulish_active($link,$data['nstatus']); 
										?></td>
									<td style="text-align:center;"><?php 
											$link = "#";
											echo show_img_pulish_active($link,$data['nhome']); 
										?></td>
									<td style="text-align:center;">
										 <?php 
											$link = "#";
											echo show_img_pulish_active($link,$data['ncheck']); 
											?>
									 </td>
									 <td style="text-align:center;">
										 <?php 
											$link = "#";
											echo show_img_pulish_active($link,$data['cflash']); 
											?>
									 </td>	
									 <td style="text-align:center;">
										 <?php 
											$link = "#";
											echo show_img_pulish_active($link,$data['cbest_sell']); 
											?>
									 </td>
									 <td style="text-align:center;">
										 <?php 
											$link = "#";
											echo show_img_pulish_active($link,$data['nhethang']); 
											?>
									 </td>
								  </tr>
		<?php $i++; } ?>

</table>
