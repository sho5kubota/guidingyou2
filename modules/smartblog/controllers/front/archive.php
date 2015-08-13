<?php

include_once(dirname(__FILE__).'/../../classes/controllers/FrontController.php');
class smartblogarchiveModuleFrontController extends smartblogModuleFrontController
{
	public $ssl = true;
	public function init(){
            parent::init();
	}  
	public function initContent(){
           parent::initContent();
                $blogcomment = new Blogcomment();
                $year = Tools::getvalue('year');
                $month = Tools::getvalue('month');
                $seller_id = Tools::getvalue('seller_id');
                // die('ID: '.$seller_id);
                $title_category = '';
                $page_type = !empty($seller_id)? 'archive' : 'no';
                $posts_per_page = Configuration::get('smartpostperpage');
                $limit_start = 0;
                $limit = $posts_per_page;
                if((boolean)Tools::getValue('page')){
	            $c = (int)Tools::getValue('page');
                    $limit_start = $posts_per_page * ($c - 1);
	        }
                $result = SmartBlogPost::getArchiveResult($month,$year,$limit_start,$limit,$seller_id);
                
                $total = count($result);
                $totalpages = ceil($total/$posts_per_page);

                $i = 0;
            if(!empty($result)){
                foreach($result as $item){
                   $to[$i] = $blogcomment->getToltalComment($item['id_post']);
                   $i++;
                }
                $j = 0;
                foreach($to as $item){
                    if($item == ''){
                        $result[$j]['totalcomment'] = 0;
                    }else{
                        $result[$j]['totalcomment'] = $item;
                    }
                    $j++;
                }
            }

            /******* MONTHS *********/
            $date = self::get_months();
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $active_link = explode('/', $actual_link);
            end($active_link);
            $active_month = prev($active_link);

            $year = array();
            // die('->'.count($active_link));
            if(count($active_link) == 8)
                $year['current'] = $active_month;
            else
                $year['current'] = prev($active_link);

            $year['prev'] = $year['current'] - 1;
            $year['next'] = $year['current'] + 1;

            // die('ID: '.$seller_id);

            $info = SmartBlogPost::getSellerinfoLang($seller_id);

            // die('<pre>'.print_r($info,true));

            $this->context->smarty->assign( array(
                                            'postcategory'=>$result,
                                            'title_category'=>$title_category,
                                            'smartshowauthorstyle'=>Configuration::get('smartshowauthorstyle'),
                                            'limit'=>isset($limit) ? $limit : 0,
                                            'limit_start'=>isset($limit_start) ? $limit_start : 0,
                                            'c'=>isset($c) ? $c : 1,
                                            'total'=>$total,
                                            'smartshowviewed' => Configuration::get('smartshowviewed'),
                                            'smartcustomcss' => Configuration::get('smartcustomcss'),
                                            'smartshownoimg' => Configuration::get('smartshownoimg'),
                                            'smartshowauthor'=>Configuration::get('smartshowauthor'),
                                            'post_per_page'=>$posts_per_page,
                                            'pagenums' => $totalpages - 1,
                                            'smartblogliststyle' => Configuration::get('smartblogliststyle'),
                                            'totalpages' =>$totalpages,
                                            'page_type' => $page_type,
                                            'date' => $date,
                                            'active_month' => $active_month,
                                            'id_author' => $seller_id,
                                            'year' => $year,
                                            'store_name' => $info[0]['company'],
                                            ));

       $template_name  = 'archivecategory.tpl';
            $this->setTemplate($template_name);
	}

    public static function get_months() {
        $months = array();
        for( $i = 1; $i <= 12; $i++ ) {
            $date = date('Y-'.$i);

            $months['month'][$i] = date('F', strtotime($date));
            $months['year'][$i] = date('Y', strtotime($date));
        }
        return $months;
    }


}