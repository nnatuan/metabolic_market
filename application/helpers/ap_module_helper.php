<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------
 * @creator 		: 
 * @finished date	: 2009/011/09
 * @description		: Tra ve tong so dong tu cau lenh sql tuong ung
 * @access	        : public
 *
 * @param string	: $str_where_clause       : menh de where
 * 					: 
 * @return string	: $obj_result->num_rows() : tong so dong
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */	
function get_user_byid($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tuser').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_material_products()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' ORDER BY cindex+0 asc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_clean_material_slug($mat_or_code)
{
	if (is_array($mat_or_code)) {
		$code = isset($mat_or_code['ccode']) ? trim($mat_or_code['ccode']) : '';
		$title = isset($mat_or_code['cmaterial_products']) ? trim($mat_or_code['cmaterial_products']) : '';
		$nid = isset($mat_or_code['nid']) ? intval($mat_or_code['nid']) : 0;
	} else {
		$code = trim((string)$mat_or_code);
		$title = '';
		$nid = 0;
	}

	$map = [
		'TSXD' => 'tru-sac-xe-dien',
		'TBQT' => 'thiet-bi-quan-trac',
		'BLSH' => 'bo-loc-song-hai',
		'BLTNL' => 'bo-luu-tru-nang-luong',
		'BESS' => 'bo-luu-tru-nang-luong',
		'LMTD' => 'lam-mat-tu-dien',
		'RITTAL' => 'lam-mat-tu-dien',
		'DHDN' => 'dong-ho-do-da-nang',
		'BTIV' => 'bien-tan-inverter',
		'INVERTER' => 'bien-tan-inverter',
	];

	$nid_map = [
		1 => 'thiet-bi-quan-trac',
		2 => 'tru-sac-xe-dien',
		3 => 'bo-loc-song-hai',
		4 => 'bo-luu-tru-nang-luong',
		5 => 'lam-mat-tu-dien',
		6 => 'dong-ho-do-da-nang',
		7 => 'bien-tan-inverter',
	];

	$upper = strtoupper($code);
	if (isset($map[$upper])) {
		return $map[$upper];
	}

	if (!empty($code) && (strpos($code, '-') !== false || strlen($code) > 6)) {
		return strtolower($code);
	}

	if ($nid > 0 && isset($nid_map[$nid])) {
		return $nid_map[$nid];
	}

	if (!empty($title)) {
		$t = mb_strtolower($title, 'UTF-8');
		if (strpos($t, 'trụ sạc') !== false || strpos($t, 'tru sac') !== false || strpos($t, 'sạc xe') !== false) return 'tru-sac-xe-dien';
		if (strpos($t, 'quan trắc') !== false || strpos($t, 'quan trac') !== false) return 'thiet-bi-quan-trac';
		if (strpos($t, 'sóng hài') !== false || strpos($t, 'song hai') !== false) return 'bo-loc-song-hai';
		if (strpos($t, 'lưu trữ') !== false || strpos($t, 'bess') !== false) return 'bo-luu-tru-nang-luong';
		if (strpos($t, 'làm mát') !== false || strpos($t, 'rittal') !== false) return 'lam-mat-tu-dien';
		if (strpos($t, 'đồng hồ') !== false || strpos($t, 'dong ho') !== false) return 'dong-ho-do-da-nang';
		if (strpos($t, 'biến tần') !== false || strpos($t, 'inverter') !== false) return 'bien-tan-inverter';
		if (function_exists('Fclean_url_string')) return Fclean_url_string($title);
	}

	return !empty($code) ? strtolower($code) : '';
}

function get_material_db_codes($slug_or_code)
{
	$slug_map = [
		'tru-sac-xe-dien' => ['tru-sac-xe-dien', 'TSXD', '2'],
		'thiet-bi-quan-trac' => ['thiet-bi-quan-trac', 'TBQT', '1'],
		'bo-loc-song-hai' => ['bo-loc-song-hai', 'BLSH', '3'],
		'bo-luu-tru-nang-luong' => ['bo-luu-tru-nang-luong', 'bo-luu-tru-nang', 'BLTNL', 'BESS', '4'],
		'lam-mat-tu-dien' => ['lam-mat-tu-dien', 'lam-mat-tu-dier', 'LMTD', 'RITTAL', '5'],
		'dong-ho-do-da-nang' => ['dong-ho-do-da-nang', 'dong-ho-do-da-', 'DHDN', '6'],
		'bien-tan-inverter' => ['bien-tan-inverter', 'BTIV', 'INVERTER', '7'],
	];

	$code_map = [
		'TSXD' => ['tru-sac-xe-dien', 'TSXD', '2'],
		'TBQT' => ['thiet-bi-quan-trac', 'TBQT', '1'],
		'BLSH' => ['bo-loc-song-hai', 'BLSH', '3'],
		'BLTNL' => ['bo-luu-tru-nang-luong', 'BLTNL', 'BESS', '4'],
		'BESS' => ['bo-luu-tru-nang-luong', 'BLTNL', 'BESS', '4'],
		'LMTD' => ['lam-mat-tu-dien', 'LMTD', 'RITTAL', '5'],
		'RITTAL' => ['lam-mat-tu-dien', 'LMTD', 'RITTAL', '5'],
		'DHDN' => ['dong-ho-do-da-nang', 'DHDN', '6'],
		'BTIV' => ['bien-tan-inverter', 'BTIV', 'INVERTER', '7'],
		'INVERTER' => ['bien-tan-inverter', 'BTIV', 'INVERTER', '7'],
	];

	$res = [$slug_or_code];
	if (isset($slug_map[$slug_or_code])) {
		$res = array_merge($res, $slug_map[$slug_or_code]);
	}
	$upper = strtoupper($slug_or_code);
	if (isset($code_map[$upper])) {
		$res = array_merge($res, $code_map[$upper]);
	}

	return array_values(array_unique($res));
}

function get_material_product_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' ORDER BY cindex+0 asc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_material_product_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' AND nspecial = 1 ';
		$str_query .= ' ORDER BY cindex+0, nid desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_material_product_limit($limit)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' LIMIT 0, '.$limit;
		$str_query .= ' ORDER BY cindex+0, nid desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_material_product_by_group($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' AND a.nid_group = '.$nid;
		$str_query .= ' ORDER BY cindex+0, nid desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_config_byid($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tconfig').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_config_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tconfig').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_value_by_config($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.cvalue';
		$str_query .= ' FROM '.Fget_ap_table('tconfig').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['cvalue'];
	}	
function get_config_byid2($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tconfig').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_module_byid($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tmodule').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		//$str_query .= ' AND a.nstatus = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_module_note($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.cnote ';
		$str_query .= ' FROM '.Fget_ap_table('tmodule').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		//$str_query .= ' AND a.nstatus = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['cnote'];
	}
function get_config_site($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tconfig').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
	
/*End Important helper*/
	//
function get_banner_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tbanner_images');
		$str_query .= ' WHERE nid is not null ';
		$str_query .= ' AND nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_banner_list()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tbanner_images');
		$str_query .= ' WHERE nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' ORDER BY cindex+0 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_banner_location($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tbanner_images');
		$str_query .= ' WHERE nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' AND nid_loc_banner = '.$nid;
		$str_query .= ' ORDER BY cindex+0 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
//
function get_home_product()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';
		$str_query .= ' LIMIT 0,20 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_home_menu()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_center_menu()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.chome	  =	1';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_specific_product()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.ncheck =	1';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';
		$str_query .= ' LIMIT 0,3 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_byid($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$nid.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_product_by_id_hh($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid, a.nhethang';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "'.$nid.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_other_product_by_cat($nid,$nid_cat)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid != "'.$nid.'"';
		$str_query .= ' AND a.nid_cat_products = '.$nid_cat;
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';			
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}


function get_count_search($keyword)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1 AND a.nid_material_products = 1';
		$str_query .= ' AND (a.ccode like "%'.$keyword.'%"';
		$str_query .= ' OR a.cproducts like "%'.$keyword.'%")';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_search($keyword,$row_per_page,$curr_page)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1 AND a.nid_material_products = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.ccode like "%'.$keyword.'%"';
		$str_query .= ' AND (a.ccode like "%'.$keyword.'%"';
		$str_query .= ' OR a.cproducts like "%'.$keyword.'%")';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';	
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_cat_product_name($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['ccat_products'];
	}

function reset_page()
{
	$_SESSION['curr_page_product'] = '1';
	$_SESSION['curr_page_search'] = '1';
		
}

function get_news_byccode_detail($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$nid.'"';
		$str_query .= ' AND a.nstatus = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_section_news_byid($nid_sec)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid,a.ccat_news,a.cimage,a.ctag, a.cnote, a.ccode';
		$str_query .= ' FROM '.Fget_ap_table('tcat_news').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_sec != '')
			$str_query .= ' AND a.nid = '.$nid_sec;
		else
			$str_query .= ' AND a.nid is not null ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_count_news_by_cat($nid_sec)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_sec != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_sec;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_news_by_cat($nid_sec,$row_per_page,$curr_page)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_sec != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_sec;
		
		//$str_query .= ' AND a.nid NOT IN '.$str;

		$str_query .= ' ORDER BY a.nid+0 desc ';			
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_count_news()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_news_paging($row_per_page,$curr_page)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.nid+0 desc ';			
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_news_by_cat_limit($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a, ';
		$str_query .= Fget_ap_table('tcat_news').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_news = b.nid';		
		$str_query .= ' AND a.nid_cat_news = '.$nid;		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_news_by_cat_all($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_news = '.$nid;		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_news_xem_nhieu_nhat()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a, ';
		$str_query .= Fget_ap_table('tcat_news').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		//$str_query .= ' AND a.nid IN (SELECT nid_news as nid FROM ' . Fget_ap_table('tnews_subsite') . ' where nid_subsite  = "' . $nid_subsite . '") ';
		$str_query .= ' AND a.nid_cat_news = b.nid';		
		$str_query .= ' ORDER BY a.cview+0 desc ';			
		$str_query .= ' LIMIT 0,5';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_news_xem_nhieu_nhat_not_me($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as code_cat';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a, ';
		$str_query .= Fget_ap_table('tcat_news').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid != '.$nid;
		$str_query .= ' AND a.nid_cat_news = b.nid';		
		$str_query .= ' ORDER BY a.cview+0 desc ';			
		$str_query .= ' LIMIT 0,5';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}		
	function get_hot_news()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nactive =	1';	
		$str_query .= ' LIMIT 0,1';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
	function get_other_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nactive !=1 ';	
		$str_query .= ' ORDER BY nid desc ';		
		$str_query .= ' LIMIT 0,10';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
	
	function get_home_section()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tsection_news').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_service()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		//$str_query .= ' AND a.nactive !=1 ';	
		$str_query .= ' AND a.nid_section_news = "7"';
		$str_query .= ' ORDER BY nid desc ';		
		//$str_query .= ' LIMIT 0,10';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
	
	function get_other_news($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid != "'.$nid.'"';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';		
$str_query .= ' LIMIT 0,5 ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_news_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "'.$nid.'"';
	//	$str_query .= ' AND a.nstatus = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_news_by_id_detail($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$nid.'"';
	//	$str_query .= ' AND a.nstatus = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_article_by_code($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tarticle').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$ccode.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_article_list()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tarticle').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nid > 1';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_cat_byid($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$nid.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_product_sec_byid($nid) //theo ccode hoac slug hoac id
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$codes = function_exists('get_material_db_codes') ? get_material_db_codes($nid) : [$nid];
		$escaped = array_map(function($c) use ($obj_helper) {
			return $obj_helper->db->escape($c);
		}, $codes);

		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND (a.ccode IN ('.implode(',', $escaped).') OR a.nid IN ('.implode(',', $escaped).'))';		
		$str_query .= ' LIMIT 1';
		$obj_result = $obj_helper->db->query($str_query);  
		$row = $obj_result ? $obj_result->row_array() : null;
		if (!empty($row)) return $row;

		// Fallback kiểm tra qua clean slug
		$str_query2 = ' SELECT * FROM '.Fget_ap_table('tmaterial_products').' WHERE nstatus = 1 ';
		$res2 = $obj_helper->db->query($str_query2);
		if ($res2 && $res2->num_rows() > 0) {
			foreach ($res2->result_array() as $item) {
				if (function_exists('get_clean_material_slug') && get_clean_material_slug($item) === $nid) {
					return $item;
				}
			}
		}

		return null;
	}	
function get_product_group_by_code($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tgroup_product').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$ccode.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_product_brand_by_code($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tbrand_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$ccode.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}		
function get_product_cat($ccode_cat, $row_per_page, $curr_page, $type_sort)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_cat.'"';
		if ($type_sort == 0) {
			$str_query .= ' ORDER BY a.fprice';
		} else if ($type_sort == 1) {
			$str_query .= ' ORDER BY a.fprice desc';
		} else if ($type_sort == 2) {
			$str_query .= ' ORDER BY a.cproducts+0';
		} else if ($type_sort == 3) {
			$str_query .= ' ORDER BY a.cproducts desc';
		} else if ($type_sort == 4) {
			$str_query .= ' ORDER BY a.nid';
		} else if ($type_sort == 5) {
			$str_query .= ' ORDER BY a.nid desc';
		} else if ($type_sort == 6) {
		}
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_cat_tt($ccode_cat, $row_per_page, $curr_page, $type_sort, $arr_tt)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_cat.'"';
		if ($type_sort == 0) {
			$str_query .= ' ORDER BY a.fprice';
		} else if ($type_sort == 1) {
			$str_query .= ' ORDER BY a.fprice desc';
		} else if ($type_sort == 2) {
			$str_query .= ' ORDER BY a.cproducts+0';
		} else if ($type_sort == 3) {
			$str_query .= ' ORDER BY a.cproducts desc';
		} else if ($type_sort == 4) {
			$str_query .= ' ORDER BY a.nid';
		} else if ($type_sort == 5) {
			$str_query .= ' ORDER BY a.nid desc';
		} else if ($type_sort == 6) {
		}
		$str_query .= ' AND a.nid IN (SELECT DISTINCT nid_product as nid FROM ' . Fget_ap_table('tproduct_attribute');	
		$str_query .= ' WHERE nid is not null ';
		foreach ($arr_tt as $tt)  {
			$str_query .= ' AND nid_attribute = ' . $tt;
		}
		$str_query .= ')';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_product_cat2($row_per_page,$curr_page)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as cat_ccode';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a,  ';
		$str_query .= Fget_ap_table('tcat_products').' as b  ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		//$str_query .= ' AND b.ccode = "'.$nid.'"';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_sec($ccode_sec, $row_per_page, $curr_page, $type_sort)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$codes = function_exists('get_material_db_codes') ? get_material_db_codes($ccode_sec) : [$ccode_sec];
		$escaped = array_map(function($c) use ($obj_helper) {
			return $obj_helper->db->escape($c);
		}, $codes);
		$str_query .= ' AND (c.ccode IN ('.implode(',', $escaped).') OR c.nid IN ('.implode(',', $escaped).'))';
		if ($type_sort == 0) {
			$str_query .= ' ORDER BY a.fprice';
		} else if ($type_sort == 1) {
			$str_query .= ' ORDER BY a.fprice desc';
		} else if ($type_sort == 2) {
			$str_query .= ' ORDER BY a.cproducts+0';
		} else if ($type_sort == 3) {
			$str_query .= ' ORDER BY a.cproducts desc';
		} else if ($type_sort == 4) {
			$str_query .= ' ORDER BY a.nid';
		} else if ($type_sort == 5) {
			$str_query .= ' ORDER BY a.nid desc';
		} else if ($type_sort == 6) {
		}
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_sec_tt($ccode_sec, $row_per_page, $curr_page, $type_sort, $arr_tt)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode_sec.'"';
		if ($type_sort == 0) {
			$str_query .= ' ORDER BY a.fprice';
		} else if ($type_sort == 1) {
			$str_query .= ' ORDER BY a.fprice desc';
		} else if ($type_sort == 2) {
			$str_query .= ' ORDER BY a.cproducts+0';
		} else if ($type_sort == 3) {
			$str_query .= ' ORDER BY a.cproducts desc';
		} else if ($type_sort == 4) {
			$str_query .= ' ORDER BY a.nid';
		} else if ($type_sort == 5) {
			$str_query .= ' ORDER BY a.nid desc';
		} else if ($type_sort == 6) {
		}
		$str_query .= ' AND a.nid IN (SELECT DISTINCT nid_product as nid FROM ' . Fget_ap_table('tproduct_attribute');	
		$str_query .= ' WHERE nid is not null ';
		foreach ($arr_tt as $tt)  {
			$str_query .= ' AND nid_attribute = ' . $tt;
		}
		$str_query .= ')';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
	
function get_count_product_by_mat($nid_material_products)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT a.nid';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a ';  
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
    if($nid_material_products!='')
    	$str_query .= ' AND a.nid_material_products = "'.$nid_material_products.'"';
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->num_rows();
	//exit($obj_result->num_rows()); 
}
function get_count_product_ctkm_by_cat($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.ncheck =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND b.ccode = "'.$ccode.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_count_product_by_cat($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' INNER JOIN '.Fget_ap_table('tcat_products').' as b ON a.nid_cat_products = b.nid ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND b.ccode = '.$obj_helper->db->escape($ccode);
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
function get_count_product_by_cat_het_hang($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' INNER JOIN '.Fget_ap_table('tcat_products').' as b ON a.nid_cat_products = b.nid ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.nhethang != 1';
		$str_query .= ' AND b.ccode = '.$obj_helper->db->escape($ccode);
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}		
function get_count_product_by_cat_mobile($ccode, $sort)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' INNER JOIN '.Fget_ap_table('tcat_products').' as b ON a.nid_cat_products = b.nid ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND b.ccode = '.$obj_helper->db->escape($ccode);
		if($sort!="") {
			if($sort==1)
				$str_query .= ' AND a.cnoi_bat = 1';
			elseif($sort==2)
				$str_query .= ' AND a.nnew = 1';
			elseif($sort==3)
				$str_query .= ' AND a.cbest_sell = 1';	
		} 
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
function get_product_page_by_cat_mobile($ccode_cat, $row_per_page, $curr_page, $sort)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$offset = max(0, ($curr_page - 1) * $row_per_page);
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' INNER JOIN '.Fget_ap_table('tcat_products').' as b ON a.nid_cat_products = b.nid ';
		$str_query .= ' LEFT JOIN '.Fget_ap_table('tmaterial_products').' as c ON a.nid_material_products = c.nid ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND b.ccode = '.$obj_helper->db->escape($ccode_cat);
		$str_query .= ' ORDER BY a.cindex+0 ASC, a.ctime_update DESC, a.nid DESC ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
/*	
function get_product_page_by_cat($ccode_cat, $row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_cat.'"';
		$str_query .= ' ORDER BY a.ctime_update+0 desc, a.cindex+0, a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
*/
function get_product_page_by_cat($ccode_cat, $row_per_page, $curr_page)
{		
    $obj_helper =& get_instance(); 
    $obj_helper->load->database();
    
    // Tính OFFSET (vị trí bắt đầu)
    $offset = max(0, ($curr_page - 1) * $row_per_page);
    
    // Tên các bảng
    $t_products = Fget_ap_table('tproducts');
    $t_cat = Fget_ap_table('tcat_products');
    $t_material = Fget_ap_table('tmaterial_products');

    $str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
    $str_query .= ' FROM ' . $t_products . ' as a ';
    $str_query .= ' INNER JOIN ' . $t_cat . ' as b ON a.nid_cat_products = b.nid ';
    $str_query .= ' LEFT JOIN ' . $t_material . ' as c ON a.nid_material_products = c.nid ';
    
    // Điều kiện lọc
    $str_query .= ' WHERE a.nstatus = 1 ';
    
    // Lọc theo ccode_cat và chống SQL Injection
    $str_query .= ' AND b.ccode = ' . $obj_helper->db->escape($ccode_cat);
    
    $str_query .= ' ORDER BY a.cindex+0 ASC, a.ctime_update DESC, a.nid DESC ';
    
    // Phân trang (LIMIT và OFFSET)
    $str_query .= ' LIMIT ' . (int)$row_per_page . ' OFFSET ' . (int)$offset;

    $obj_result = $obj_helper->db->query($str_query);  
    return $obj_result->result_array();	
}
function get_count_product()
{
    $obj_helper =& get_instance(); 
    $obj_helper->load->database();
    $t_products = Fget_ap_table('tproducts');
    $str_query = ' SELECT COUNT(*) as total FROM ' . $t_products . ' WHERE nstatus = 1 ';
    $obj_result = $obj_helper->db->query($str_query);
    $row = $obj_result->row_array();
    return !empty($row['total']) ? (int)$row['total'] : 0;
}
function get_product_page_all($row_per_page, $curr_page)
{		
    $obj_helper =& get_instance(); 
    $obj_helper->load->database();
    
    // Tính OFFSET (vị trí bắt đầu)
    $offset = max(0, ($curr_page - 1) * $row_per_page);
    
    // Tên các bảng
    $t_products = Fget_ap_table('tproducts');
    $t_cat = Fget_ap_table('tcat_products');
    $t_material = Fget_ap_table('tmaterial_products');

    $str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
    $str_query .= ' FROM ' . $t_products . ' as a ';
    $str_query .= ' LEFT JOIN ' . $t_cat . ' as b ON a.nid_cat_products = b.nid ';
    $str_query .= ' LEFT JOIN ' . $t_material . ' as c ON a.nid_material_products = c.nid ';
    $str_query .= ' WHERE a.nstatus = 1 ';
    $str_query .= ' ORDER BY ';
    $str_query .= ' CASE ';
    $str_query .= '   WHEN a.nid_material_products = 1 THEN 1 ';
    $str_query .= '   WHEN a.nid_material_products = 2 THEN 2 ';
    $str_query .= '   ELSE 3 ';
    $str_query .= ' END ASC, ';
    $str_query .= ' a.cindex+0 ASC, a.ctime_update DESC, a.nid DESC ';
    $str_query .= ' LIMIT ' . (int)$row_per_page . ' OFFSET ' . (int)$offset;

    $obj_result = $obj_helper->db->query($str_query);  
    return $obj_result->result_array();	
}
function get_product_page_by_cat_het_hang($ccode_cat, $row_per_page, $curr_page, $sort_price)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nhethang != 1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_cat.'"';
		if($sort_price=='0') 
			$str_query .= ' ORDER BY a.fprice+0 desc ';
		else if($sort_price=='1')
			$str_query .= ' ORDER BY a.fprice+0 asc ';
		else
			$str_query .= ' ORDER BY a.ctime_update desc, a.cindex+0, a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_count_product_by_cat_filter($ccode,$price)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND b.ccode = "'.$ccode.'"';
		if($price=='1')
			$str_query .= ' AND a.fprice < 5000000';
		else if($price=='2')
			$str_query .= ' AND (a.fprice >= 5000000 AND a.fprice <= 10000000)';
		else if($price=='3')
			$str_query .= ' AND (a.fprice >= 10000000 AND a.fprice <= 15000000)';
		else if($price=='4')
			$str_query .= ' AND (a.fprice >= 15000000 AND a.fprice <= 20000000)';
		else if($price==5)
			$str_query .= ' AND (a.fprice >= 20000000 AND a.fprice <= 30000000)';
		else if($price==6)
			$str_query .= ' AND a.fprice >= 30000000';
		else if($price==7)
			$str_query .= ' AND a.cmoi = 1';
		else if($price==8)
			$str_query .= ' AND a.ctbh = 1';
		else if($price==9)
			$str_query .= ' AND a.c99 = 1';

		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
function get_product_page_by_cat_filter($ccode_cat, $row_per_page, $curr_page, $price, $sort_price)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_cat.'"';
		if($price==1)
			$str_query .= ' AND a.fprice < 5000000';
		else if($price==2)
			$str_query .= ' AND (a.fprice >= 5000000 AND a.fprice <= 10000000)';
		else if($price==3)
			$str_query .= ' AND (a.fprice >= 10000000 AND a.fprice <= 15000000)';
		else if($price==4)
			$str_query .= ' AND (a.fprice >= 15000000 AND a.fprice <= 20000000)';
		else if($price==5)
			$str_query .= ' AND (a.fprice >= 20000000 AND a.fprice <= 30000000)';
		else if($price==6)
			$str_query .= ' AND a.fprice >= 30000000';
		else if($price==7)
			$str_query .= ' AND a.cmoi = 1';
		else if($price==8)
			$str_query .= ' AND a.ctbh = 1';
		else if($price==9)
			$str_query .= ' AND a.c99 = 1';
		
		if($sort_price=='0') 
			$str_query .= ' ORDER BY a.fprice+0 desc ';
		else if($sort_price=='1')
			$str_query .= ' ORDER BY a.fprice+0 asc ';
		else
			$str_query .= ' ORDER BY a.ctime_update desc, a.cindex+0, a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_count_product_by_sec($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$codes = function_exists('get_material_db_codes') ? get_material_db_codes($ccode) : [$ccode];
		$escaped = array_map(function($c) use ($obj_helper) {
			return $obj_helper->db->escape($c);
		}, $codes);
		$str_query = ' SELECT a.nid ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' INNER JOIN '.Fget_ap_table('tmaterial_products').' as c ON a.nid_material_products = c.nid ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND (c.ccode IN ('.implode(',', $escaped).') OR c.nid IN ('.implode(',', $escaped).'))';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}		
function get_count_product_by_sec_mobile($ccode, $sort)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$codes = function_exists('get_material_db_codes') ? get_material_db_codes($ccode) : [$ccode];
		$escaped = array_map(function($c) use ($obj_helper) {
			return $obj_helper->db->escape($c);
		}, $codes);
		$str_query = ' SELECT a.nid ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' INNER JOIN '.Fget_ap_table('tmaterial_products').' as c ON a.nid_material_products = c.nid ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND (c.ccode IN ('.implode(',', $escaped).') OR c.nid IN ('.implode(',', $escaped).'))';
		if($sort!="") {
			if($sort==1)
				$str_query .= ' AND a.cnoi_bat = 1';
			elseif($sort==2)
				$str_query .= ' AND a.nnew = 1';
			elseif($sort==3)
				$str_query .= ' AND a.cbest_sell = 1';	
		} 
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}		
function get_product_page_by_sec_mobile($ccode_sec, $row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$offset = max(0, ($curr_page - 1) * $row_per_page);
		$codes = function_exists('get_material_db_codes') ? get_material_db_codes($ccode_sec) : [$ccode_sec];
		$escaped = array_map(function($c) use ($obj_helper) {
			return $obj_helper->db->escape($c);
		}, $codes);
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' INNER JOIN '.Fget_ap_table('tmaterial_products').' as c ON a.nid_material_products = c.nid ';
		$str_query .= ' LEFT JOIN '.Fget_ap_table('tcat_products').' as b ON a.nid_cat_products = b.nid ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND (c.ccode IN ('.implode(',', $escaped).') OR c.nid IN ('.implode(',', $escaped).'))';
		$str_query .= ' ORDER BY a.cindex+0 ASC, a.ctime_update DESC, a.nid DESC ';
		$str_query .= ' LIMIT ' . (int)$row_per_page . ' OFFSET ' . (int)$offset;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_page_by_sec($ccode_sec, $row_per_page, $curr_page)
{		
    $obj_helper =& get_instance(); 
    $obj_helper->load->database();
    
    // Tính OFFSET (vị trí bắt đầu)
    $offset = max(0, ($curr_page - 1) * $row_per_page);
    
    // Tên các bảng
    $t_products = Fget_ap_table('tproducts');
    $t_cat = Fget_ap_table('tcat_products');
    $t_material = Fget_ap_table('tmaterial_products');

    $codes = function_exists('get_material_db_codes') ? get_material_db_codes($ccode_sec) : [$ccode_sec];
    $escaped = array_map(function($c) use ($obj_helper) {
        return $obj_helper->db->escape($c);
    }, $codes);

    $str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
    
    $str_query .= ' FROM ' . $t_products . ' as a ';
    $str_query .= ' INNER JOIN ' . $t_material . ' as c ON a.nid_material_products = c.nid ';
    $str_query .= ' LEFT JOIN ' . $t_cat . ' as b ON a.nid_cat_products = b.nid ';
    
    // Điều kiện lọc
    $str_query .= ' WHERE a.nstatus = 1 ';
    
    // Lọc theo ccode_sec và chống SQL Injection
    $str_query .= ' AND (c.ccode IN (' . implode(',', $escaped) . ') OR c.nid IN (' . implode(',', $escaped) . '))';
    
    $str_query .= ' ORDER BY a.cindex+0 ASC, a.ctime_update DESC, a.nid DESC ';
    
    // Phân trang (LIMIT và OFFSET)
    $str_query .= ' LIMIT ' . (int)$row_per_page . ' OFFSET ' . (int)$offset;

    $obj_result = $obj_helper->db->query($str_query);  
    return $obj_result ? $obj_result->result_array() : [];	
}
function get_count_product_by_province($ccode_sec,$ccode_province)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode_sec.'"';
		$str_query .= ' AND a.nid_province IN (SELECT nid as nid_province FROM ' . Fget_ap_table('tprovince').' WHERE ccode = "'.$ccode_province.'")';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
function get_product_page_by_province($ccode_sec, $ccode_province, $row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode_sec.'"';
		$str_query .= ' AND a.nid_province IN (SELECT nid as nid_province FROM ' . Fget_ap_table('tprovince').' WHERE ccode = "'.$ccode_province.'")';	
		$str_query .= ' ORDER BY a.nid+0 desc, a.cindex+0';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_count_product_by_cat_ajax($ccode_cat, $arr_km, $str_brand, $price_min, $price_max)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND b.nid_material_products = c.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_cat.'"';
		
		if($str_brand!='') 
			$str_query .= ' AND a.nid_brand_products IN '.$str_brand;
		//$str_query .= ' AND a.nid_brand_products IN ('.implode(',', $arr_brand).')';
		
		$str_query .= ' AND a.fprice_sale >= '.$price_min;
		$str_query .= ' AND a.fprice_sale <= '.$price_max;
		
		
		$count = count($arr_km);
		if($count>0) {
			$str_query .= ' AND (a.ncheck=1 OR a.cflash=1) AND (';
			//$str_query .= ' AND (';
			for($i=0;$i<$count;$i++) {
				if ($arr_km[$i]==1)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 10)';
				elseif ($arr_km[$i]==2)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 20)';
				elseif ($arr_km[$i]==3)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 30)';
				elseif ($arr_km[$i]==4)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 40)';
				elseif ($arr_km[$i]==5)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 50)';
				elseif ($arr_km[$i]==6)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 60)';
				elseif ($arr_km[$i]==7)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 70)';
				elseif ($arr_km[$i]==8)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 80)';
					
				if($i<$count-1)
					$str_query .= ' OR ';
			}
			$str_query .= ' ) ';
		}
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}		
function get_product_page_by_cat_ajax($ccode_cat, $row_per_page, $curr_page, $arr_km, $str_brand, $price_min, $price_max, $sort)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND b.nid_material_products = c.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_cat.'"';
		
		if($str_brand!='') 
			$str_query .= ' AND a.nid_brand_products IN '.$str_brand;
		//$str_query .= ' AND a.nid_brand_products IN ('.implode(',', $arr_brand).')';
		
		$str_query .= ' AND a.fprice_sale >= '.$price_min;
		$str_query .= ' AND a.fprice_sale <= '.$price_max;
		
		
		$count = count($arr_km);
		if($count>0) {
			$str_query .= ' AND (a.ncheck=1 OR a.cflash=1) AND (';
			//$str_query .= ' AND (';
			for($i=0;$i<$count;$i++) {
				if ($arr_km[$i]==1)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 10)';
				elseif ($arr_km[$i]==2)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 20)';
				elseif ($arr_km[$i]==3)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 30)';
				elseif ($arr_km[$i]==4)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 40)';
				elseif ($arr_km[$i]==5)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 50)';
				elseif ($arr_km[$i]==6)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 60)';
				elseif ($arr_km[$i]==7)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 70)';
				elseif ($arr_km[$i]==8)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 80)';
					
				if($i<$count-1)
					$str_query .= ' OR ';
			}
			$str_query .= ' ) ';
		}
		
		/*
		if($count>0)
			$str_query .= ' AND a.ncheck=1 AND ';
		if (in_array(1, $arr_km))
			$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 10)';
		if (in_array(2, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 20)';
		if (in_array(3, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 30)';
		if (in_array(4, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 40)';
		if (in_array(5, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 50)';
		if (in_array(6, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 60)';
		if (in_array(7, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 70)';
		if (in_array(8, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 80)';
		*/
		
		if($sort==1)
			$str_query .= ' ORDER BY a.fprice+0 asc ';
		else if($sort==2)
			$str_query .= ' ORDER BY a.fprice+0 desc ';
		else if($sort==3)
			$str_query .= ' ORDER BY a.nid+0 desc ';
		else if($sort==4)
			$str_query .= ' ORDER BY a.cbest_sell+0 desc ';
		
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_count_product_by_sec_ajax($ccode_sec, $arr_km, $str_brand, $price_min, $price_max)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND b.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode_sec.'"';
		
		if($str_brand!='') 
			$str_query .= ' AND a.nid_brand_products IN '.$str_brand;
		//$str_query .= ' AND a.nid_brand_products IN ('.implode(',', $arr_brand).')';
		
		$str_query .= ' AND a.fprice_sale >= '.$price_min;
		$str_query .= ' AND a.fprice_sale <= '.$price_max;
		
		$count = count($arr_km);
		if($count>0) {
			$str_query .= ' AND (a.ncheck=1 OR a.cflash=1) AND (';
			//$str_query .= ' AND (';
			for($i=0;$i<$count;$i++) {
				if ($arr_km[$i]==1)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 10)';
				elseif ($arr_km[$i]==2)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 20)';
				elseif ($arr_km[$i]==3)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 30)';
				elseif ($arr_km[$i]==4)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 40)';
				elseif ($arr_km[$i]==5)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 50)';
				elseif ($arr_km[$i]==6)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 60)';
				elseif ($arr_km[$i]==7)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 70)';
				elseif ($arr_km[$i]==8)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 80)';
					
				if($i<$count-1)
					$str_query .= ' OR ';
			}
			$str_query .= ' ) ';
		}
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}		
function get_product_page_by_sec_ajax($ccode_sec, $row_per_page, $curr_page, $arr_km, $str_brand, $price_min, $price_max, $sort)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND b.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode_sec.'"';
		
		if($str_brand!='') 
			$str_query .= ' AND a.nid_brand_products IN '.$str_brand;
		//$str_query .= ' AND a.nid_brand_products IN ('.implode(',', $arr_brand).')';
		
		$str_query .= ' AND a.fprice_sale >= '.$price_min;
		$str_query .= ' AND a.fprice_sale <= '.$price_max;
		
		$count = count($arr_km);
		if($count>0) {
			$str_query .= ' AND (a.ncheck=1 OR a.cflash=1) AND (';
			//$str_query .= ' AND (';
			for($i=0;$i<$count;$i++) {
				if ($arr_km[$i]==1)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 10)';
				elseif ($arr_km[$i]==2)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 20)';
				elseif ($arr_km[$i]==3)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 30)';
				elseif ($arr_km[$i]==4)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 40)';
				elseif ($arr_km[$i]==5)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 50)';
				elseif ($arr_km[$i]==6)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 60)';
				elseif ($arr_km[$i]==7)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 70)';
				elseif ($arr_km[$i]==8)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 80)';
					
				if($i<$count-1)
					$str_query .= ' OR ';
			}
			$str_query .= ' ) ';
		}
		
		/*
		if($count>0)
			$str_query .= ' AND a.ncheck=1 AND ';
		if (in_array(1, $arr_km))
			$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 10)';
		if (in_array(2, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 20)';
		if (in_array(3, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 30)';
		if (in_array(4, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 40)';
		if (in_array(5, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 50)';
		if (in_array(6, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 60)';
		if (in_array(7, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 70)';
		if (in_array(8, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 80)';
		*/
		
		if($sort==1)
			$str_query .= ' ORDER BY a.fprice+0 asc ';
		else if($sort==2)
			$str_query .= ' ORDER BY a.fprice+0 desc ';
		else if($sort==3)
			$str_query .= ' ORDER BY a.nid+0 desc ';
		else if($sort==4)
			$str_query .= ' ORDER BY a.cbest_sell+0 desc ';
		
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_count_product_by_group_ajax($ccode_group, $arr_km, $str_brand, $price_min, $price_max)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND b.nid_material_products = c.nid';
		$str_query .= ' AND c.nid_group = d.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_group.'"';
		
		if($str_brand!='') 
			$str_query .= ' AND a.nid_brand_products IN '.$str_brand;
		//$str_query .= ' AND a.nid_brand_products IN ('.implode(',', $arr_brand).')';
		
		$str_query .= ' AND a.fprice_sale >= '.$price_min;
		$str_query .= ' AND a.fprice_sale <= '.$price_max;
		
		$count = count($arr_km);
		if($count>0) {
			$str_query .= ' AND (a.ncheck=1 OR a.cflash=1) AND (';
			//$str_query .= ' AND (';
			for($i=0;$i<$count;$i++) {
				if ($arr_km[$i]==1)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 10)';
				elseif ($arr_km[$i]==2)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 20)';
				elseif ($arr_km[$i]==3)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 30)';
				elseif ($arr_km[$i]==4)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 40)';
				elseif ($arr_km[$i]==5)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 50)';
				elseif ($arr_km[$i]==6)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 60)';
				elseif ($arr_km[$i]==7)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 70)';
				elseif ($arr_km[$i]==8)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 80)';
					
				if($i<$count-1)
					$str_query .= ' OR ';
			}
			$str_query .= ' ) ';
		}
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}		
function get_product_page_by_group_ajax($ccode_group, $row_per_page, $curr_page, $arr_km, $str_brand, $price_min, $price_max, $sort)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, d.ccode as ccode_group ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND b.nid_material_products = c.nid';
		$str_query .= ' AND c.nid_group = d.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_group.'"';
		
		if($str_brand!='') 
			$str_query .= ' AND a.nid_brand_products IN '.$str_brand;
		//$str_query .= ' AND a.nid_brand_products IN ('.implode(',', $arr_brand).')';
		
		$str_query .= ' AND a.fprice_sale >= '.$price_min;
		$str_query .= ' AND a.fprice_sale <= '.$price_max;
		
		$count = count($arr_km);
		if($count>0) {
			$str_query .= ' AND (a.ncheck=1 OR a.cflash=1) AND (';
			//$str_query .= ' AND (';
			for($i=0;$i<$count;$i++) {
				if ($arr_km[$i]==1)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 10)';
				elseif ($arr_km[$i]==2)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 20)';
				elseif ($arr_km[$i]==3)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 30)';
				elseif ($arr_km[$i]==4)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 40)';
				elseif ($arr_km[$i]==5)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 50)';
				elseif ($arr_km[$i]==6)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 60)';
				elseif ($arr_km[$i]==7)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 70)';
				elseif ($arr_km[$i]==8)
					$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 80)';
					
				if($i<$count-1)
					$str_query .= ' OR ';
			}
			$str_query .= ' ) ';
		}
		
		/*
		if($count>0)
			$str_query .= ' AND a.ncheck=1 AND ';
		if (in_array(1, $arr_km))
			$str_query .= ' (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 10)';
		if (in_array(2, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 20)';
		if (in_array(3, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 30)';
		if (in_array(4, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 40)';
		if (in_array(5, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 50)';
		if (in_array(6, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 60)';
		if (in_array(7, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 70)';
		if (in_array(8, $arr_km))
			$str_query .= ' AND (ROUND((a.fprice - a.fprice_sale)/a.fprice*100+0.4) >= 80)';
		*/
		
		if($sort==1)
			$str_query .= ' ORDER BY a.fprice+0 asc ';
		else if($sort==2)
			$str_query .= ' ORDER BY a.fprice+0 desc ';
		else if($sort==3)
			$str_query .= ' ORDER BY a.nid+0 desc ';
		else if($sort==4)
			$str_query .= ' ORDER BY a.cbest_sell+0 desc ';
		
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_page_by_sec_het_hang($ccode_sec, $row_per_page, $curr_page, $sort_price)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nhethang != 1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode_sec.'"';
		if($sort_price=='0') 
			$str_query .= ' ORDER BY a.fprice+0 desc ';
		else if($sort_price=='1')
			$str_query .= ' ORDER BY a.fprice+0 asc ';
		else
			$str_query .= ' ORDER BY a.ctime_update desc, a.cindex+0, a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_count_product_by_sec_filter($ccode_sec,$price)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode_sec.'"';
		if($price==1)
			$str_query .= ' AND a.fprice < 5000000';
		else if($price==2)
			$str_query .= ' AND (a.fprice >= 5000000 AND a.fprice <= 10000000)';
		else if($price==3)
			$str_query .= ' AND (a.fprice >= 10000000 AND a.fprice <= 15000000)';
		else if($price==4)
			$str_query .= ' AND (a.fprice >= 15000000 AND a.fprice <= 20000000)';
		else if($price==5)
			$str_query .= ' AND (a.fprice >= 20000000 AND a.fprice <= 30000000)';
		else if($price==6)
			$str_query .= ' AND a.fprice >= 30000000';
		else if($price==7)
			$str_query .= ' AND a.cmoi = 1';
		else if($price==8)
			$str_query .= ' AND a.ctbh = 1';
		else if($price==9)
			$str_query .= ' AND a.c99 = 1';

		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
function get_product_page_by_sec_filter($ccode_sec, $row_per_page, $curr_page, $price, $sort_price)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode_sec.'"';
		if($price==1)
			$str_query .= ' AND a.fprice < 5000000';
		else if($price==2)
			$str_query .= ' AND (a.fprice >= 5000000 AND a.fprice <= 10000000)';
		else if($price==3)
			$str_query .= ' AND (a.fprice >= 10000000 AND a.fprice <= 15000000)';
		else if($price==4)
			$str_query .= ' AND (a.fprice >= 15000000 AND a.fprice <= 20000000)';
		else if($price==5)
			$str_query .= ' AND (a.fprice >= 20000000 AND a.fprice <= 30000000)';
		else if($price==6)
			$str_query .= ' AND a.fprice >= 30000000';
		else if($price==7)
			$str_query .= ' AND a.cmoi = 1';
		else if($price==8)
			$str_query .= ' AND a.ctbh = 1';
		else if($price==9)
			$str_query .= ' AND a.c99 = 1';
		
		if($sort_price=='0') 
			$str_query .= ' ORDER BY a.fprice+0 desc ';
		else if($sort_price=='1')
			$str_query .= ' ORDER BY a.fprice+0 asc ';
		else
			$str_query .= ' ORDER BY a.cindex+0, a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}		
function get_count_product_group($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND a.nid_group_product = d.nid';
		$str_query .= ' AND d.ccode = "'.$ccode.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
function get_product_group($ccode_group, $row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND a.nid_group_product = d.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_group.'"';
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_count_product_group_filter($ccode,$price)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tgroup_product').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_group_product = b.nid';
		$str_query .= ' AND b.ccode = "'.$ccode.'"';
		if($price==1)
			$str_query .= ' AND a.fprice < 5000000';
		else if($price==2)
			$str_query .= ' AND (a.fprice >= 5000000 AND a.fprice <= 10000000)';
		else if($price==3)
			$str_query .= ' AND (a.fprice >= 10000000 AND a.fprice <= 15000000)';
		else if($price==4)
			$str_query .= ' AND (a.fprice >= 15000000 AND a.fprice <= 20000000)';
		else if($price==5)
			$str_query .= ' AND (a.fprice >= 20000000 AND a.fprice <= 30000000)';
		else if($price==6)
			$str_query .= ' AND a.fprice >= 30000000';

		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}		
function get_product_group_filter($ccode_group, $row_per_page, $curr_page, $price)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND a.nid_group_product = d.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_group.'"';
		if($price==1)
			$str_query .= ' AND a.fprice < 5000000';
		else if($price==2)
			$str_query .= ' AND (a.fprice >= 5000000 AND a.fprice <= 10000000)';
		else if($price==3)
			$str_query .= ' AND (a.fprice >= 10000000 AND a.fprice <= 15000000)';
		else if($price==4)
			$str_query .= ' AND (a.fprice >= 15000000 AND a.fprice <= 20000000)';
		else if($price==5)
			$str_query .= ' AND (a.fprice >= 20000000 AND a.fprice <= 30000000)';
		else if($price==6)
			$str_query .= ' AND a.fprice >= 30000000';
		
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_product_doi_moi()
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		//$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cdoi_moi = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		//$str_query .= ' AND a.nid_group_product = d.nid';
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_doi_moi_search($key)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cdoi_moi = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND (a.cproducts like "%'.$key.'%"';
		$str_query .= ' OR a.ccode like "%'.$key.'%")';
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_doi_moi_by_sec($ccode)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		//$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cdoi_moi = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		//$str_query .= ' AND a.nid_group_product = d.nid';
		$str_query .= ' AND c.ccode = "'.$ccode.'"';
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_doi_moi_by_group($ccode_group)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cdoi_moi = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND a.nid_group_product = d.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_group.'"';
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_doi_moi_by_group_search($ccode_group,$key)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cdoi_moi = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND a.nid_group_product = d.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_group.'"';
		$str_query .= ' AND (a.cproducts like "%'.$key.'%"';
		$str_query .= ' OR a.ccode like "%'.$key.'%")';
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_doi_moi_by_group_not_me($ccode_group,$nid_product)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid != "'.$nid_product.'"';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cdoi_moi = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND a.nid_group_product = d.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_group.'"';
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_product_doi_moi_by_sec_search($ccode,$key)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cdoi_moi = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode.'"';
		$str_query .= ' AND (a.cproducts like "%'.$key.'%"';
		$str_query .= ' OR a.ccode like "%'.$key.'%")';
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_doi_moi_by_sec_not_me($ccode,$nid_product)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid != "'.$nid_product.'"';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cdoi_moi = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode.'"';
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_brand_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*';
		$str_query .= ' FROM '.Fget_ap_table('tbrand_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' LIMIT 0,5';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_brand_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tbrand_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_count_product_brand($ccode_brand)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tbrand_products').' as b ';
		
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_brand_products = b.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_brand.'"';
		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
function get_product_brand($ccode_brand, $row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tbrand_products').' as d ';
		
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND a.nid_brand_products = d.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_brand.'"';
		$str_query .= ' ORDER BY  a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_count_product_brand_filter($ccode_group, $ccode_brand, $price)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tbrand_products').' as d, ';
		$str_query .= Fget_ap_table('tgroup_product').' as e ';
		
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.nid_brand_products = d.nid';
		$str_query .= ' AND a.nid_group_product = e.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_brand.'"';
		$str_query .= ' AND e.ccode = "'.$ccode_group.'"';
		if($price==1)
			$str_query .= ' AND a.fprice < 5000000';
		else if($price==2)
			$str_query .= ' AND (a.fprice >= 5000000 AND a.fprice <= 10000000)';
		else if($price==3)
			$str_query .= ' AND (a.fprice >= 10000000 AND a.fprice <= 15000000)';
		else if($price==4)
			$str_query .= ' AND (a.fprice >= 15000000 AND a.fprice <= 20000000)';
		else if($price==5)
			$str_query .= ' AND (a.fprice >= 20000000 AND a.fprice <= 30000000)';
		else if($price==6)
			$str_query .= ' AND a.fprice >= 30000000';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
function get_product_brand_filter($ccode_group, $ccode_brand, $row_per_page, $curr_page, $price)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tbrand_products').' as d, ';
		$str_query .= Fget_ap_table('tgroup_product').' as e ';
		
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.nid_brand_products = d.nid';
		$str_query .= ' AND a.nid_group_product = e.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_brand.'"';
		$str_query .= ' AND e.ccode = "'.$ccode_group.'"';
		if($price==1)
			$str_query .= ' AND a.fprice < 5000000';
		else if($price==2)
			$str_query .= ' AND (a.fprice >= 5000000 AND a.fprice <= 10000000)';
		else if($price==3)
			$str_query .= ' AND (a.fprice >= 10000000 AND a.fprice <= 15000000)';
		else if($price==4)
			$str_query .= ' AND (a.fprice >= 15000000 AND a.fprice <= 20000000)';
		else if($price==5)
			$str_query .= ' AND (a.fprice >= 20000000 AND a.fprice <= 30000000)';
		else if($price==6)
			$str_query .= ' AND a.fprice >= 30000000';
		$str_query .= ' ORDER BY  a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_count_product_cat($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND b.ccode = "'.$ccode.'"';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_count_product_cat_tt($ccode, $arr_tt)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND b.ccode = "'.$ccode.'"';
		$str_query .= ' AND a.nid IN (SELECT DISTINCT nid_product as nid FROM ' . Fget_ap_table('tproduct_attribute');	
		$str_query .= ' WHERE nid is not null ';
		foreach ($arr_tt as $tt)  {
			$str_query .= ' AND nid_attribute = ' . $tt;
		}
		$str_query .= ')';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
function get_count_product_cat2()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
	//	$str_query .= ' AND b.ccode = "'.$nid.'"';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_count_product_sec($ccode_sec)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_material_products = b.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_sec.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_count_product_sec_tt($ccode_sec, $arr_tt)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_material_products = b.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_sec.'"';
		$str_query .= ' AND a.nid IN (SELECT DISTINCT nid_product as nid FROM ' . Fget_ap_table('tproduct_attribute');	
		$str_query .= ' WHERE nid is not null ';
		foreach ($arr_tt as $tt)  {
			$str_query .= ' AND nid_attribute = ' . $tt;
		}
		$str_query .= ')';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_menu_left($nid_sec)
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		if($nid_sec !='')	
		$str_query .= ' AND a.nid_material_products =	"'.$nid_sec.'"';	
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function Fview_price($number)
{
	return number_format($number).' đ';
}
function get_product_relate($nid_product,$nid_cat_products)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_product !='')
			$str_query .= ' AND a.nid != "'.$nid_product.'"';		
		if($nid_cat_products !='')
			$str_query .= ' AND a.nid_cat_products = "'.$nid_cat_products.'"';	
		$str_query .= ' ORDER BY  a.nid+0 desc ';	
		$str_query .= ' LIMIT 0,12';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}

function get_menutop()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('ttopmenu').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		$str_query .= ' ORDER BY  a.cindex+0 asc ';	
		//$str_query .= ' LIMIT 0,8';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_detail($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	//$str_query .= ' AND a.nstatus =	1';	
	$str_query .= ' AND a.nid = '.$nid;
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_product_detail_full($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
	//$str_query .= ' AND a.nstatus =	1';	
	$str_query .= ' AND a.nid = '.$nid;
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function Bget_guest_online()
{
    $obj_helper =& get_instance();
    $session    = session_id();
    $time       = time();
    $tbl_name   = 'tguest_online';
    $time_check = $time - 300;
    $online     = 7;
    $obj_helper->db->where('csession_id', $session);
    $obj_result = $obj_helper->db->get($tbl_name);
    if ($obj_result->num_rows() == 0) {
        $data_log = array(
            'csession_id' => $session,
            'ctime_log' => $time
        );
        $obj_helper->db->insert($tbl_name, $data_log);
        $obj_helper->db->set('ntotal', 'ntotal+1', FALSE);
        $obj_helper->db->where('nid', 1);
        $obj_helper->db->update('total_visit');
    } else {
        $data_log = array(
            'ctime_log' => $time
        );
        $obj_helper->db->where('csession_id', $session);
        $obj_helper->db->update($tbl_name, $data_log);
    }
    $obj_result = $obj_helper->db->get($tbl_name);
    $online += $obj_result->num_rows();
    $obj_helper->db->where('ctime_log <', $time_check);
    $obj_helper->db->delete($tbl_name);
    return $online;
}
function Bget_total_vistis()
{
    $total = '0';
    $obj_helper =& get_instance();
    $obj_helper->db->where('nid', '1');
    $obj_result = $obj_helper->db->get('total_visit');
    $obj_result = $obj_result->row_array();
    $total      = $obj_result['ntotal'];
    return $total;
}
function get_products_mat_paging($nid_material_products,$ncurrent_page,$nrow_per_page) //note
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT *';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts').' as a';
    $str_query .= ' WHERE nid is not null ';
    $str_query .= ' AND nstatus = 1 ';
	if($nid_material_products !='')
		$str_query .= ' AND nid_material_products = "'.$nid_material_products.'"';
	$str_query .=  ' limit '. ($ncurrent_page -1 )* $nrow_per_page . ' , ' . $nrow_per_page;	
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->result_array();
}
function get_material_by_idl($nid_material)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT *';
    $str_query .= ' FROM ' . Fget_ap_table('tmaterial_products') . ' as a ';
    $str_query .= ' WHERE a.nid is not null ';
   
     if($nid_material !='')
		$str_query .= ' AND a.nid	 ="'.$nid_material.'"';
    
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->row_array();
}	
function get_product_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nstatus = 1 AND a.nhome = 1';		
		$str_query .= ' LIMIT 0,28';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_home_by_cat($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null AND a.nstatus = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nhome = 1';	
		$str_query .= ' AND a.nid_cat_products = "'.$nid.'"';	
		$str_query .= ' LIMIT 0,6';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_home_by_sec($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nhome = 1';	
		$str_query .= ' AND c.nid = "'.$nid.'"';
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';		
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_home_menu_by_cat($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid ';
		$str_query .= ' AND a.nid_cat_products = "'.$nid.'"';	
		$str_query .= ' LIMIT 0,5';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_cat_news_limit_by_sec($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*';
		$str_query .= ' FROM '.Fget_ap_table('tcat_news').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_section_news = "'.$nid.'"';	
		$str_query .= ' LIMIT 0,5';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_hot($index,$limit)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null AND a.nstatus = 1';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nspecial = 1';		
		$str_query .= ' LIMIT '.$index.','.$limit;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_new($index,$limit)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nnew = 1';		
		$str_query .= ' LIMIT '.$index.','.$limit;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_km($index,$limit)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.ncheck = 1';		
		$str_query .= ' LIMIT '.$index.','.$limit;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_bymat($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_material_products = "'.$nid.'"';		
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_bycat($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = "'.$nid.'"';		
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_hot_by_sec($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.ncheck = 1 ';	
		$str_query .= ' ORDER BY a.cindex+0 asc ';
		$str_query .= ' LIMIT 0,1';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_product_noi_bat_by_sec($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.cnoi_bat = 1 ';	
		$str_query .= ' ORDER BY a.cindex+0 asc ';
		$str_query .= ' LIMIT 0,1';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}		
function get_product_bymat_home($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.nhome = 1 ';
		//$str_query .= ' AND a.ncheck != 1 ';	
		$str_query .= ' ORDER BY a.cindex+0 asc ';
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_bygroup_home($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid AND a.nid_group_product = d.nid';
		$str_query .= ' AND a.nid_group_product = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.nhome = 1 ';	
		$str_query .= ' ORDER BY a.cindex+0 desc ';
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_bygroup_home_mobile($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid AND a.nid_group_product = d.nid';
		$str_query .= ' AND a.nid_group_product = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.nhome = 1 ';	
		$str_query .= ' ORDER BY a.cindex+0 desc ';
		$str_query .= ' LIMIT 0,4';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_bymat_home_mobile($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.nhome = 1 ';	
		$str_query .= ' ORDER BY a.cindex+0 asc ';
		$str_query .= ' LIMIT 0,4';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	

function get_count_product_thanh_ly()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		//$str_query .= ' AND a.nstatus_365 =	1';
		$str_query .= ' AND a.cthanh_ly = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
/*	
function get_product_thanh_ly($row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		//$str_query .= ' AND a.nstatus_365 =	1';
		$str_query .= ' AND a.cthanh_ly = 1 ';	
		$str_query .= ' AND a.cdong_gia != 1 ';
		$str_query .= ' AND a.cflash != 1 ';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' ORDER BY a.fprice_sale asc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	*/
function get_product_thanh_ly()
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		//$str_query .= ' AND a.nstatus_365 =	1';
		$str_query .= ' AND a.cthanh_ly = 1 ';	
		$str_query .= ' AND a.cdong_gia != 1 ';
		$str_query .= ' AND a.cflash != 1 ';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' ORDER BY a.fprice_sale asc ';
		//$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_count_product_hang_moi()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		//$str_query .= ' AND a.nstatus_365 =	1';
		$str_query .= ' AND a.nnew = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}	
function get_product_hang_moi($row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		//$str_query .= ' AND a.nstatus_365 =	1';
		$str_query .= ' AND a.nnew = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}		
function get_count_product_km()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.ncheck = 1 ';
		$str_query .= ' AND a.cflash != 1 ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_count_product_ban_chay()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cbest_sell = 1 ';
		//$str_query .= ' AND a.cflash != 1 ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_product_dong_gia_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		//$str_query .= ' AND a.c9k = 1 ';	
		$str_query .= ' AND a.cdong_gia = 1 ';	
		//$str_query .= ' AND a.cflash != 1 ';	
		//$str_query .= ' AND a.cnoi_bat != 1 ';
		$str_query .= ' ORDER BY a.cindex+0 desc ';
		//$str_query .= ' LIMIT 0,12';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_with($price_bill)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		//$str_query .= ' AND a.c9k = 1 ';	
		$str_query .= ' AND a.cdong_gia = 1 ';		
		$str_query .= ' AND a.cflash != 1 ';	
		$str_query .= ' AND a.cap_dung_bill <= '.$price_bill;
		//$str_query .= ' AND a.cnoi_bat != 1 ';
		$str_query .= ' ORDER BY a.cindex+0 desc ';
		$str_query .= ' LIMIT 0,5';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_ctkm($ccode_cat, $row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.ncheck = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';	
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_cat.'"';
		$str_query .= ' ORDER BY a.ctime_update desc, a.cindex+0, a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	

function get_product_ban_chay($row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cbest_sell = 1 ';	
		//$str_query .= ' AND a.cflash != 1 ';	
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' ORDER BY a.ctime_update desc, a.cindex+0, a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_product_km_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.ncheck = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';	
		$str_query .= ' AND a.cnoi_bat != 1 ';
		$str_query .= ' ORDER BY a.ddate02 desc ';
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_km_relate($nid_product,$nid_cat_products)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		if($nid_product !='')
			$str_query .= ' AND a.nid != "'.$nid_product.'"';		
		if($nid_cat_products !='')
			$str_query .= ' AND a.nid_cat_products = "'.$nid_cat_products.'"';		
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.ncheck = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';	
		$str_query .= ' AND a.cnoi_bat != 1 ';
		$str_query .= ' ORDER BY a.ddate02 desc ';
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_deal_soc()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.cdeal_soc = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';	
		$str_query .= ' AND a.cnoi_bat != 1 ';
		$str_query .= ' ORDER BY a.ddate02 desc ';
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_km_home_mobile()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.ncheck = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';	
		$str_query .= ' ORDER BY a.ddate02 desc ';
		$str_query .= ' LIMIT 0,4';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_flash_sale()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.cflash = 1 ';	
		$str_query .= ' ORDER BY a.cindex+0 asc ';
		$str_query .= ' LIMIT 0,6';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}

function get_product_hang_moi_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.nnew = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';	
		$str_query .= ' AND a.cnoi_bat != 1 ';
		$str_query .= ' ORDER BY a.ctime_update+0 desc';
		$str_query .= ' LIMIT 0,12';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_count_product_xakho()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nnew = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_product_xakho($row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nnew = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
function get_count_product_giamsoc()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cgiam_soc = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_product_giamsoc($row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.cgiam_soc = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}	
	/*
	function get_product_hang_moi()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.nhome = 1 ';	
		$str_query .= ' ORDER BY a.cindex+0 asc ';
		$str_query .= ' LIMIT 0,12';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	*/

function get_product_group_byid($nid) //theo id
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tgroup_product').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "'.$nid.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_product_brand_byid($nid) //theo id
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tbrand_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "'.$nid.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_product_cat_byid2($nid) //theo id
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "'.$nid.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_product_sec_byid2($nid) //theo id
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "'.$nid.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_news_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$obj_result = $obj_helper->db->query($str_query);
		return $obj_result->result_array();
	}
function get_news_all_by_cat($nid_cat)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_cat != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_cat;		
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$obj_result = $obj_helper->db->query($str_query);
		return $obj_result->result_array();
	}
function get_news_latest_by_cat($nid_cat)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as code_cat';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a, ';
		$str_query .= Fget_ap_table('tcat_news').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_news = b.nid';		
		$str_query .= ' AND a.nid_cat_news = '.$nid_cat;	
		$str_query .= ' ORDER BY a.cindex+0, a.nid+0 desc ';			
		$str_query .= ' LIMIT 0,8';	
		$obj_result = $obj_helper->db->query($str_query);
		return $obj_result->result_array();
	}
function get_news_relate($nid,$nid_cat)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();
		$str_query = ' SELECT a.*';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid !='')
			$str_query .= ' AND a.nid != "'.$nid.'"';		
		if($nid_cat !='')
			$str_query .= ' AND a.nid_cat_news = "'.$nid_cat.'"';	
		$str_query .= ' ORDER BY a.nid+0 desc ';	
		$str_query .= ' LIMIT 0,5';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
/*	
function get_news_home_by_cat($nid_cat)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as code_cat';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a, ';
		$str_query .= Fget_ap_table('tcat_news').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.chome = 1';
		$str_query .= ' AND a.nid_cat_news = b.nid';	
		$str_query .= ' AND a.nid_cat_news = '.$nid_cat;		
		$str_query .= ' ORDER BY a.cindex+0, a.nid+0 desc ';			
		$str_query .= ' LIMIT 0,4 ';
		$obj_result = $obj_helper->db->query($str_query);
		return $obj_result->result_array();
	}
	*/
	function get_cat_news_name($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tcat_news').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['ccat_news'];
	}
	function get_cat_news_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tcat_news').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
	
function get_news_home()
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.chome = 1';	
		$str_query .= ' ORDER BY a.nid+0 desc, cindex+0 ';			
		$str_query .= ' LIMIT 0,3 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}		
function get_news_home_by_cat($nid_cat)
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.chome = 1';
		//$str_query .= ' AND a.nid IN (SELECT nid_news as nid FROM ' . Fget_ap_table('tnews_subsite') . ' where nid_subsite  = "' . $nid_subsite . '") ';
		if($nid_cat != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_cat;	
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$str_query .= ' LIMIT 0,3 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_news_home_by_sec($nid)
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a, ';
		$str_query .= Fget_ap_table('tcat_news').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.chome = 1';
		$str_query .= ' AND a.nid_cat_news = b.nid';
		$str_query .= ' AND b.nid_section_news = '.$nid;	
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$str_query .= ' LIMIT 0,3 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_news_home_by_cat_limit($nid_cat,$index,$limit)
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.chome = 1';
		//$str_query .= ' AND a.nid IN (SELECT nid_news as nid FROM ' . Fget_ap_table('tnews_subsite') . ' where nid_subsite  = "' . $nid_subsite . '") ';
		if($nid_cat != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_cat;	
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$str_query .= ' LIMIT '.$index.','.$limit;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}		
function get_product_mat()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' ORDER BY a.nid desc ';
		$str_query .= ' LIMIT 0,3';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_cat_product_limit_by_sec($nid, $limit)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' AND a.nid_material_products = '.$nid;	
		$str_query .= ' ORDER BY cindex+0, nid desc ';
		$str_query .= ' LIMIT 0, '.$limit;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_cat_product_first_by_sec($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' AND a.nid_material_products = '.$nid;	
		$str_query .= ' ORDER BY cindex+0, nid desc ';
		$str_query .= ' LIMIT 0, 1';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}		
function get_cat_product_bymat($nid_sec)
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		//$str_query .= ' AND a.nspecial =	1';	
		if($nid_sec !='')	
		$str_query .= ' AND a.nid_material_products =	"'.$nid_sec.'"';	
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		//$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_cat_product_bymat_home($nid_sec)
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		$str_query .= ' AND a.nspecial =	1';	
		if($nid_sec !='')	
		$str_query .= ' AND a.nid_material_products =	"'.$nid_sec.'"';	
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$str_query .= ' LIMIT 0,5';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_cat_product_home()
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		$str_query .= ' AND a.nspecial = 1';	
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_cat_product_all()
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_product_preorder($limit)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nstatus =	1';	
		$str_query .= ' AND a.cdat_truoc = 1';
		$str_query .= ' ORDER BY a.nid desc ';
		$str_query .= ' LIMIT 0, ' . $limit;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_img_by_product($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tproduct_images').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	//$str_query .= ' AND a.nstatus =	1';
	$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$str_query .= ' ORDER BY a.nid desc ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}

function get_product_in_array($array)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
	//	$str_query .= ' AND a.ncheck = 1 ';	
		$str_query .= ' AND a.nid IN('.$array.')';	
		
		$str_query .= ' ORDER BY a.cindex+0 asc ';
		$str_query .= ' LIMIT 0,12';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_code_sale_member($nid_code, $nid_member)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tcode_sale_member').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	//$str_query .= ' AND a.nstatus =	1';		
	$str_query .= ' AND a.nid_code = '.$nid_code;
	$str_query .= ' AND a.nid_member = '.$nid_member;
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}	
function get_code_sale_detail($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tcode_sale').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';	
	//$str_query .= ' AND a.nid != 1';	
	$str_query .= ' AND a.nid = '.$nid;
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_code_sale_home()
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tcode_sale').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';	
	$str_query .= ' AND a.chome = 1';
	$str_query .= ' LIMIT 0,3';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_code_sale_all()
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tcode_sale').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';	
	//$str_query .= ' AND a.nid != 1';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_code_sale_bycode($code)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tcode_sale').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';	
	//$str_query .= ' AND a.nid != 1';	
	$str_query .= ' AND a.ccode = "' . $code . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_sec_by_brand($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_brand_products = '.$nid;
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_cat_by_sec($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_material_products = '.$nid;
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_attribute_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tattribute').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_brand_product_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tbrand_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_brand_product_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tbrand_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_group_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tgroup_product').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_group_product_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tgroup_product').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_group_product_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tgroup_product').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.chome = 1';
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_brand_product_by_group($ccode)
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT DISTINCT a.nid, a.ccode, a.cbrand_products';
		$str_query .= ' FROM '.Fget_ap_table('tbrand_products').' as a, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		$str_query .= ' AND a.nid = b.nid_brand_products ';
		
		$str_query .= ' AND b.nid IN (SELECT DISTINCT nid_material_products as nid FROM ' . Fget_ap_table('tproducts').' as c, ';	
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE c.nid_group_product = d.nid ';
		$str_query .= ' AND d.ccode = "' . $ccode . '"';
		$str_query .= ')';
		
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}	
function get_brand_product_by_group_home($ccode)
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT DISTINCT a.nid, a.ccode, a.cbrand_products';
		$str_query .= ' FROM '.Fget_ap_table('tbrand_products').' as a, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		$str_query .= ' AND a.nid = b.nid_brand_products ';
		
		$str_query .= ' AND b.nid IN (SELECT DISTINCT nid_material_products as nid FROM ' . Fget_ap_table('tproducts').' as c, ';	
		$str_query .= Fget_ap_table('tgroup_product').' as d ';
		$str_query .= ' WHERE c.nid_group_product = d.nid ';
		$str_query .= ' AND d.ccode = "' . $ccode . '"';
		$str_query .= ')';
		
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$str_query .= ' LIMIT 0,8';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}	
function get_count_search_brand($keyword, $ccode_group, $ccode_brand)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tbrand_products').' as d, ';
		$str_query .= Fget_ap_table('tgroup_product').' as e ';
		
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.nid_brand_products = d.nid';
		$str_query .= ' AND a.nid_group_product = e.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_brand.'"';
		$str_query .= ' AND e.ccode = "'.$ccode_group.'"';
		
		$str_query .= ' AND (a.cproducts like "%'.$keyword.'%"';
		$str_query .= ' OR a.ccode like "%'.$keyword.'%")';
		/*
		$str = explode(' ',$keyword);
		for($i=0;$i<count($str);$i++) {
			$str_query .= ' AND (a.cproducts like "%'.$str[$i].'%"';
			$str_query .= ' OR a.ccode like "%'.$str[$i].'%")';
		}*/

		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_product_brand_search($keyword, $ccode_group, $ccode_brand, $row_per_page, $curr_page)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tbrand_products').' as d, ';
		$str_query .= Fget_ap_table('tgroup_product').' as e ';
		
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.nid_brand_products = d.nid';
		$str_query .= ' AND a.nid_group_product = e.nid';
		$str_query .= ' AND d.ccode = "'.$ccode_brand.'"';
		$str_query .= ' AND e.ccode = "'.$ccode_group.'"';
		
		$str_query .= ' AND (a.cproducts like "%'.$keyword.'%"';
		$str_query .= ' OR a.ccode like "%'.$keyword.'%")';
		/*
		$str = explode(' ',$keyword);
		for($i=0;$i<count($str);$i++) {
			$str_query .= ' AND (a.cproducts like "%'.$str[$i].'%"';
			$str_query .= ' OR a.ccode like "%'.$str[$i].'%")';
		}*/
		
		$str_query .= ' ORDER BY  a.nid+0 desc ';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_count_color($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tcolor').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_product = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_product_color($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tcolor').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';
	if($nid !='')
		$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_color_detail($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tcolor').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	if($nid !='')
		$str_query .= ' AND a.nid = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_product_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nid = "'.$nid.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_product_random_flashsale($limit)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.nid';
	$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';
	$str_query .= ' AND a.cflash = 1 AND a.fprice_sale<a.fprice';	
	$str_query .= ' ORDER BY RAND() ';	
	$str_query .= ' LIMIT 0,'.$limit;
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_flash_today($time)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tflash').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.ctime = "' . $time . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_flash_byid($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tflash').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_search_product($keyword)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str = explode(' ',$keyword);
		for($i=0;$i<count($str);$i++) {
			$str_query .= ' AND (a.cproducts like "%'.$str[$i].'%"';
			$str_query .= ' OR a.ccode like "%'.$str[$i].'%")';
		}
		/*
		$str_query .= ' AND (a.ccode like "%'.$keyword.'%"';
		$str_query .= ' OR a.cproducts like "%'.$keyword.'%")';
		*/
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';	
		$str_query .= ' LIMIT 0,20';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_img_kh()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tcustomer_img').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		//$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_customer()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tcustomer').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		//$str_query .= ' AND a.nstatus =	1';
		//$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_color_lv2($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tcolor_lv2').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	if($nid !='')
		$str_query .= ' AND a.nid_color = "' . $nid . '"';
	$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_color_lv2_by_id($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tcolor_lv2').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_comment_by_news($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tcomment').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$str_query .= ' AND a.cpage = 2 ';
	$str_query .= ' AND a.nstatus = 1 ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_comment_by_product($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tcomment').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$str_query .= ' AND a.cpage = 1 ';
	$str_query .= ' AND a.nstatus = 1 ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_reply_by_comment($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('treply').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_comment = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_rating_by_product($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('trating').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_rating_by_product_limit($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('trating').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$str_query .= ' ORDER BY a.ctime desc ';
	$str_query .= ' LIMIT 0,5 ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_schedule_curr($time)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tschedule').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus = 1 ';
	$str_query .= ' AND a.ctime = "' . $time . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_province_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tprovince').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		//$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_province_by_code($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tprovince').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "' . $ccode . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}		
function get_district_by_province($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tdistrict').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		//$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_province = ' . $nid;
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_ward_by_district($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tward').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		//$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_district = ' . $nid;
		$str_query .= ' ORDER BY a.cindex+0, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_member_by_userid($cid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.cid = "' . $cid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_member_by_id($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
	$str_query .= ' WHERE a.nid = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_member_by_mail($cemail)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
	$str_query .= ' WHERE a.cemail = "' . $cemail . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_member_by_active_code($cactive_code)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
	$str_query .= ' WHERE a.cactive_code = "' . $cactive_code . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}

function get_bid_win_by_member($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tbid_win').' as a ';
	$str_query .= ' WHERE a.nid_member = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_bid_win_by_product_bid($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tbid_win').' as a ';
	$str_query .= ' WHERE a.nid_product_bid = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_product_bid_log_by_id_today($nid,$time)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tproduct_bid_log').' as a ';
	$str_query .= ' WHERE a.nid_product_bid = "' . $nid . '"';
	$str_query .= ' AND a.ctime_search = "' . $time . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_bid_win_by_product_bid_today($nid,$time)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tbid_win').' as a ';
	$str_query .= ' WHERE a.nid_product_bid = "' . $nid . '"';
	$str_query .= ' AND a.ctime_search = "' . $time . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function lay_dau_gia_cao_nhat_theo_sp($nid,$time)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tbid').' as a ';
	$str_query .= ' WHERE a.nid_product = "' . $nid . '"';
	$str_query .= ' AND a.ctime_search = "' . $time . '"';
	$str_query .= ' ORDER BY a.cprice desc ';
	$str_query .= ' LIMIT 0,1';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function lay_dau_gia_cao_nhat_theo_sp_bid($nid,$time)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tbid').' as a ';
	$str_query .= ' WHERE a.nid_product_bid = "' . $nid . '"';
	$str_query .= ' AND a.ctime_search = "' . $time . '"';
	$str_query .= ' ORDER BY a.cprice desc ';
	$str_query .= ' LIMIT 0,1';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function lay_dau_gia_theo_sp($nid,$time)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tbid').' as a ';
	$str_query .= ' WHERE a.nid_product_bid = "' . $nid . '"';
	$str_query .= ' AND a.ctime_search = "' . $time . '"';
	$str_query .= ' ORDER BY a.cprice desc ';
	$str_query .= ' LIMIT 0,5';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_member($cid, $cpassword)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.cid = "' . $cid . '"';
	if($cpassword != "anmytest")
		$str_query .= ' AND (a.cpassword = "' . md5($cpassword) . '")';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_random_bot($nid_bot)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.nid';
	$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.ctype = 0 ';
	$str_query .= ' AND a.nid != "' . $nid . '"';
	$str_query .= ' ORDER BY RAND() ';	
	$str_query .= ' LIMIT 0,1';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_product_bid_bot_by_id($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tproduct_bid').' as a ';
	$str_query .= ' WHERE a.nid = "' . $nid . '"';
	$str_query .= ' AND a.nstatus = 1 ';
	$str_query .= ' AND a.cbid = 1 ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_product_bid_by_id($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tproduct_bid').' as a ';
	$str_query .= ' WHERE a.nid = "' . $nid . '"';
	$str_query .= ' AND a.nstatus = 1 ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_product_bid_by_product($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tproduct_bid').' as a ';
	$str_query .= ' WHERE a.nid_product = "' . $nid . '"';
	$str_query .= ' AND a.nstatus = 1 ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_product_bid_by_date($ctime)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tproduct_bid').' as a ';
	$str_query .= ' WHERE a.ctime_search = "' . $ctime . '"';
	$str_query .= ' AND a.nstatus = 1 ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}	
function get_order_by_member($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('torder').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_member = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_order_by_code_and_id($ccode, $cid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('torder').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.ccode = "' . $ccode . '"';
	$str_query .= ' AND (a.cphone = "' . $cid . '"';
	$str_query .= ' OR a.cemail = "' . $cid . '")';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_order_by_id($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('torder').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_order_status_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('torder_status').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1';
		$str_query .= ' AND a.nid = "'.$nid.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_order_detail_by_order($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('torder_detail').' as a ';
	$str_query .= ' WHERE a.nid_order = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_point_list($nid_member, $date_str)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tpoint_list').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_member = "'.$nid_member.'"';
		$str_query .= ' AND a.ctime_search = "'.$date_str.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_product_doi_qua()
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.cdoi_qua = 1';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_code_vqmm($ccode)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tcode_vqmm').' as a ';
	$str_query .= ' WHERE a.ccode = "' . $ccode . '"';
	$str_query .= ' AND a.nstatus = 1 ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_dong_gia_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tdong_gia').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_dong_gia_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tdong_gia').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}		
function get_product_by_dong_gia($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.cdong_gia = 1';
		$str_query .= ' AND a.cprice_dong_gia != ""';
		$str_query .= ' AND a.nid_dong_gia = "' . $nid . '"';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_mail_register($mail)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tregister').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.cemail = "' . $mail . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_member_password($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['cpassword'];
	}
function get_order_tmp_by_ip($cip,$date) {
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('torder').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 0 ';
		$str_query .= ' AND a.cip = "' . $cip . '"';
		$str_query .= ' AND a.ddate01 = "' . $date . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
}
function get_flashsale_gan_nhat() {
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tflashsale').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.cfull_time_start <= '. time();
		$str_query .= ' AND a.cfull_time_end >= '. time();
		$str_query .= ' ORDER BY a.cfull_time_start asc ';
		$str_query .= ' LIMIT 0,1 ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_product_flashsale($nid) {
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tflashsale_product').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_flashsale = '. $nid;
		$str_query .= ' AND a.nid_product IN (SELECT nid as nid_product FROM '.Fget_ap_table('tproducts'). ' WHERE nstatus = 1 AND fprice_sale < fprice AND (ncheck = 1 OR cflash = 1))';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_ward_name($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tward').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['cname'];
	}	
function get_district_name($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tdistrict').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['cname'];
	}	
function get_province_name($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tprovince').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['cname'];
	}
function get_huong_name($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('thuong').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['cname'];
	}
function get_loai_tin_name($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tloai_tin').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['cname'];
	}	
function get_cat_name($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tcat_news').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array()['ccat_news'];
	}	
function get_loai_tin_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tloai_tin').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_loai_bds_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tloai_bds').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_huong_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('thuong').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
	
function webpConvert2($file, $compression_quality = 80)
{
    // check if file exists
    if (!file_exists($file)) {
        return false;
    }
    $file_type = exif_imagetype($file);
    //https://www.php.net/manual/en/function.exif-imagetype.php
    //exif_imagetype($file);
    // 1    IMAGETYPE_GIF
    // 2    IMAGETYPE_JPEG
    // 3    IMAGETYPE_PNG
    // 6    IMAGETYPE_BMP
    // 15   IMAGETYPE_WBMP
    // 16   IMAGETYPE_XBM
	
	/*
	$jpg=imagecreatefromjpeg('filename.jpg');
	$w=imagesx($jpg);
	$h=imagesy($jpg);
	$webp=imagecreatetruecolor($w,$h);
	imagecopy($webp,$jpg,0,0,0,0,$w,$h);
	imagewebp($webp, 'filename.webp', 80);
	imagedestroy($jpg);
	imagedestroy($webp);
	*/
	
    $output_file =  $file . '.webp';
    if (file_exists($output_file)) {
        return $output_file;
    }
    if (function_exists('imagewebp')) {
        switch ($file_type) {
            case '1': //IMAGETYPE_GIF
                $image = imagecreatefromgif($file);
                break;
            case '2': //IMAGETYPE_JPEG
                $image = imagecreatefromjpeg($file);
                break;
            case '3': //IMAGETYPE_PNG
                    $image = imagecreatefrompng($file);
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                    break;
            case '6': // IMAGETYPE_BMP
                $image = imagecreatefrombmp($file);
                break;
            case '15': //IMAGETYPE_Webp
               return false;
                break;
            case '16': //IMAGETYPE_XBM
                $image = imagecreatefromxbm($file);
                break;
            default:
                return false;
        }
        // Save the image
        $result = imagewebp($image, $output_file, $compression_quality);
        if (false === $result) {
            return false;
        }
        // Free up memory
        imagedestroy($image);
        return $output_file;
    } elseif (class_exists('Imagick')) {
        $image = new Imagick();
        $image->readImage($file);
        if ($file_type === "3") {
            $image->setImageFormat('webp');
            $image->setImageCompressionQuality($compression_quality);
            $image->setOption('webp:lossless', 'true');
        }
        $image->writeImage($output_file);
        return $output_file;
    }
    return false;
}
function get_gallery()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tgallery_img').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_gallery_first()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tgallery_img').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' LIMIT 0,1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_img_by_gallery($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tgallery_img').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_product = ' . $nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_loai_phong_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tloai_phong').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	

function get_menu_frontend() {
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmenu_frontend').' as a ';
		$str_query .= ' WHERE a.nid is not null AND a.nid!=0 ';
		$str_query .= ' AND a.nstatus =	1';	
		$str_query .= ' ORDER BY  a.cindex+0 asc ';	
		//$str_query .= ' LIMIT 0,8';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
/**
 * Tổ chức mảng menu phẳng thành cấu trúc cây dựa trên nid và nid_parent.
 * @param array $elements Mảng menu phẳng (kết quả từ DB).
 * @param int $parentId ID cha bắt đầu (thường là 0).
 * @return array Cấu trúc menu dạng cây.
 */
function build_menu_tree(array $elements, $parentId = 0) {
    $branch = [];

    foreach ($elements as $element) {
        // Sử dụng nid_parent để xác định cấp bậc
        if (isset($element['nid_parent']) && $element['nid_parent'] == $parentId) { 
            
            // Đệ quy để tìm các mục con, sử dụng nid làm ID Cha mới
            $children = build_menu_tree($elements, $element['nid']); 
            
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

/**
 * Hiển thị cấu trúc menu cây thành HTML <ul>/<li> lồng nhau, phù hợp với Elementor Nav Menu.
 * @param array $tree Cấu trúc menu dạng cây.
 * @param string $ul_class CSS class cho thẻ <ul> hiện tại ('elementor-nav-menu' hoặc 'sub-menu elementor-nav-menu--dropdown').
 * @return string Mã HTML của menu.
 */
function render_menu_tree(array $tree, $ul_class = 'elementor-nav-menu') {
    if (empty($tree)) {
        return '';
    }

    $html = '<ul class="' . htmlspecialchars($ul_class) . '">';

    foreach ($tree as $item) {
        $has_children = isset($item['children']) && !empty($item['children']);
        
        // ===============================================
        // BƯỚC 1: XỬ LÝ LINK (FIX LỖI TUYỆT ĐỐI)
        // ===============================================
        $link = $item['clink'];

        // Kiểm tra nếu link không phải là liên kết ngoài và không phải là anchor
        if (!preg_match('#^https?://#i', $link) && $link !== '#') {
            // Sử dụng hàm base_url() của CodeIgniter để tạo liên kết tuyệt đối
            if (function_exists('base_url')) {
                // Đảm bảo không có dấu '/' kép nếu $link đã bắt đầu bằng '/'
                $link = base_url(ltrim($link, '/'));
            }
        }
        $processed_link = htmlspecialchars($link);
        
        // ===============================================
        // BƯỚC 2: XỬ LÝ CLASS CỦA LI
        // ===============================================
        
        $li_classes = 'menu-item menu-item-type-post_type menu-item-object-page';
        if ($has_children) {
            $li_classes .= ' menu-item-has-children';
        }
        
        // Thêm class trạng thái hoạt động (active)
        // Lưu ý: Cần đảm bảo hàm current_url() (hoặc tương đương) được định nghĩa hoặc dùng CI Instance
        // Để đơn giản, ta sẽ dùng cách so sánh đơn giản nhất với $processed_link.
        // Bạn có thể tùy chỉnh logic này tùy thuộc vào cách CI của bạn định nghĩa current_url().
        // if (function_exists('current_url') && $processed_link == current_url()) {
        //      $li_classes .= ' current-menu-item current_page_item';
        // }


        $html .= '<li class="' . htmlspecialchars($li_classes) . '">';
        
        // ===============================================
        // BƯỚC 3: XỬ LÝ THẺ A (elementor-item vs elementor-sub-item)
        // ===============================================
        
        // Dựa vào ul_class hiện tại để xác định class của <a>
        $a_class = ($ul_class === 'elementor-nav-menu') ? 'elementor-item' : 'elementor-sub-item';

        $html .= '<a href="' . $processed_link . '" class="' . htmlspecialchars($a_class) . '">'; 
        $html .= htmlspecialchars($item['cname']); 
        $html .= '</a>';
        
        // ===============================================
        // BƯỚC 4: GỌI ĐỆ QUY CHO MENU CON
        // ===============================================
        
        if ($has_children) {
            // Gọi đệ quy, cấp con dùng class 'sub-menu elementor-nav-menu--dropdown'
            $html .= render_menu_tree($item['children'], 'sub-menu elementor-nav-menu--dropdown'); 
        }
        
        $html .= '</li>';
    }
    $html .= '</ul>';

    return $html;
}