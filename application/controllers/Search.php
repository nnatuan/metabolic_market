<?php 
class search extends CI_Controller {

var $event 				= '';
var	$obj_search			='';
var $m_language			='eng';

var $nid_material		= '';
var $nid_cat			= '';

var	$title					= '';
var	$tags					= '';
var	$description			= ''; 
var $key_word				= '';

var $ncurr_page 		= '';
var $nrow_per_page 	= '20';
var $ntotal_page	 	= '';

function __construct()
    {
        parent::__construct();	
		session_start();
		
		$this->load->database();	
		$this->load->helper('ap_function');
		$this->load->helper('ap_object');
		$this->load->helper('ap_html');
		$this->load->helper('ap_view_helper');
		$this->load->helper('ap_db');
		$this->load->helper('ap_module');		

	}

// Dinh nghia ham rut gon khi set cookie cho cac bien.
//
private function f_set_cookie($cookie_name,$cookie_value)
 { 
	return dbset_cookie('cookie_guide_'.$cookie_name,$cookie_value);
 }
 
// Dinh nghia ham rut gon khi get cookie cho cac bien.
//
private function f_get_cookie($cookie_name)
 { 
	return dbget_cookie('cookie_search_'.$cookie_name);
 }
	
// Dinh nghia ham rut gon khi set language cho cac label.
// 
private function m_language_key($str_key)
{
	return $this->lang->line('lbl.search.'.$str_key);
}


function set_page()
{
	$ncurr_page = 1;
	if(isset($_POST['ncurr_page']))
		$ncurr_page = $_POST['ncurr_page'];
	$_SESSION['ncurr_page_search']=$ncurr_page;
	
}

function next_()
{
	if(isset($_POST['btn_click_next']))	
	{
		if(isset($_SESSION['ncurr_page_search']))
			$this->ncurr_page = $_SESSION['ncurr_page_search'];
		if($this->ncurr_page == '' )
			$this->ncurr_page  = 1;
		$this->ncurr_page  += 1;	
		$_SESSION['ncurr_page_search'] = $this->ncurr_page;
		$this->do_process();
	}	
}

function previous_()
{
	if(isset($_POST['btn_click_previous']))	
	{
		if(isset($_SESSION['ncurr_page_search']))
			$this->ncurr_page = $_SESSION['ncurr_page_search'];
		if($this->ncurr_page == '' )
			$this->ncurr_page  = 1;
		$this->ncurr_page  -= 1;	
		$_SESSION['ncurr_page_search'] = $this->ncurr_page;
		$this->do_process();
	}	
}	
function index()
{
	$this->do_process();
}
	
function do_process() 
{
	$this->get_data(); 		
	$this->caculate_data(); 		
	$this->do_business(); 		
	$this->destroy_data();
}
	
private function get_data()
{  
	if(isset($_POST['key_word']))
		$this->key_word = trim($_POST['key_word']);
	else if(isset($_GET['key_word']))
		$this->key_word = trim($_GET['key_word']);
	else if(isset($_GET['q']))
		$this->key_word = trim($_GET['q']);
}
	
private function caculate_data()
{
	$this->load->language('ap', $this->m_language);
	if(isset($_GET['page']) && (int)$_GET['page'] > 0)
		$this->ncurr_page = (int)$_GET['page'];
	else if(isset($_POST['ncurr_page']) && (int)$_POST['ncurr_page'] > 0)
		$this->ncurr_page = (int)$_POST['ncurr_page'];
	else if(isset($_SESSION['ncurr_page_search']))
		$this->ncurr_page = $_SESSION['ncurr_page_search'];
	
	if($this->ncurr_page == '' OR $this->ncurr_page < 1 )
		$this->ncurr_page = 1;
	
	$total_count = get_count_search($this->key_word);
	$this->total_row = $total_count;
	$this->ntotal_page = (int)ceil($total_count / $this->nrow_per_page);
}
	
private function do_business()
{	
	$data['title']			= (!empty($this->key_word)) ? 'Tìm kiếm: '.$this->key_word : 'Tìm kiếm sản phẩm';
	$data['tags']			= $this->tags;
	$data['description']	= $this->description;
	$data['key_word']		= $this->key_word;
	$data['ncurr_page']		= $this->ncurr_page;
	$data['nrow_per_page']	= $this->nrow_per_page;
	$data['ntotal_page']	= $this->ntotal_page;
	$data['total_row']		= isset($this->total_row) ? $this->total_row : 0;
	$data['list_products']	= get_search($this->key_word, $this->nrow_per_page, $this->ncurr_page);

	$data['menu_top']		= 'search';	

	$this->load->view('search',$data);	
}
	
private function destroy_data()
{
			
}
private function get_where_guide_string()
{
		$str		= 'where nstatus = "1"';	
		//$str	   .= 'AND ccode_cat_news = "'.$this->m_nid_cat_news.'" ';
//Dieu kien get record nstatus
//0:Khong active
//1:Active

		return $str ;
}

}