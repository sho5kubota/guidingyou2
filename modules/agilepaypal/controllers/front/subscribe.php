<?php /*
///-build_id: 2015013020.5255
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/store/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///
*/
include_once(_PS_ROOT_DIR_."/\x6d\x6f\x64ule\x73/ag\x69\x6c\x65\x70aypal/a\x67il\x65\x70a\x79pa\x6c.\x70hp");class AgilePaypalSubscribeModuleFrontController extends ModuleFrontController{public$ssl=true;public function initContent(){${"\x47\x4cO\x42\x41\x4cS"}["f\x64\x72\x7a\x6bf\x75w\x74"]="\x6d\x6f\x64\x75\x6c\x65";$this->display_column_left=true;parent::initContent();${${"\x47\x4cOB\x41\x4c\x53"}["f\x64\x72z\x6b\x66\x75w\x74"]}=new AgilePaypal();$module->agilepaypal_subscribe();$this->setTemplate("s\x75\x62\x73\x63ri\x62\x65.t\x70l");}}
?>