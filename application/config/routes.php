<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$route['default_controller']                                        = "home";
$route['/?utm_source=(:any)&utm_medium=(:any)&utm_campaign=(:any)&zarsrc=(:any)'] = "home";
$route['/?zarsrc=(:any)&utm_source=(:any)&utm_medium=(:any)&utm_campaign=(:any)'] = "home";

$route['gioi-thieu']                                            = "about";
$route['san-pham']                                              = "products/set_page_all/1";
$route['san-pham/trang-(:num)']                                 = "products/set_page_all/$1";
$route['san-pham/([a-zA-Z0-9-_]+)']                            = "product_detail/get/$1";
$route['danh-muc/([a-zA-Z0-9-_]+)']                  			= "products/set_page_cat/$1/1";
$route['danh-muc/([a-zA-Z0-9-_]+)/trang-(:num)']                  			= "products/set_page_cat/$1/$2";
$route['phan-loai/([a-zA-Z0-9-_]+)']                  			= "products/set_page_sec/$1/1";
$route['phan-loai/([a-zA-Z0-9-_]+)/trang-(:num)']                  			= "products/set_page_sec/$1/$2";

$route['tin-tuc']                                               = "news_list/cat_page/1/1";
$route['tin-tuc/trang-(:num)']                                  = "news_list/cat_page/1/$1";
$route['tin-tuc/([a-zA-Z0-9-_]+)']                              = "news/detail/$1";

$route['giai-phap']                                             = "news_list/cat_page/2/1";
$route['giai-phap/trang-(:num)']                                = "news_list/cat_page/2/$1";
$route['giai-phap/([a-zA-Z0-9-_]+)']                            = "news/detail/$1";

$route['hoan-tat-dat-hang']  = "complete_cart";
