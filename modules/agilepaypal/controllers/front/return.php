<?php /*
///-build_id: 2015013020.5255
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/store/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///
*/
${"G\x4c\x4f\x42\x41\x4c\x53"}["\x6c\x6c\x69i\x72e\x65\x64\x65"]="\x63\x75\x72\x72\x65n\x63\x79";${"G\x4c\x4fB\x41LS"}["\x78\x68\x65\x6a\x76\x7ayl"]="o\x72d\x65r";${"G\x4c\x4f\x42ALS"}["ly\x78\x71\x75t\x6b"]="\x70\x61r\x61\x6d\x73";${"G\x4c\x4f\x42\x41L\x53"}["t\x69\x61mpu"]="\x69d\x5for\x64e\x72";${"\x47LOB\x41L\x53"}["y\x6d\x75dq\x6d\x67\x72"]="\x69d_c\x61\x72t";${"\x47\x4c\x4fB\x41\x4c\x53"}["\x6d\x77\x65j\x71\x69\x79\x6ci\x6ak\x6b"]="mo\x64u\x6ce";include_once(_PS_ROOT_DIR_."/mo\x64u\x6ces/agi\x6ce\x70a\x79\x70\x61\x6c/\x61gi\x6c\x65\x70\x61\x79pa\x6c\x2ep\x68p");class AgilePaypalReturnModuleFrontController extends ModuleFrontController{public$ssl=true;public function initContent(){$this->display_column_left=true;parent::initContent();${${"GLOB\x41\x4cS"}["\x6d\x77\x65\x6aqi\x79l\x69jk\x6b"]}=new AgilePaypal();$module->agilepaypal_return();$this->context->smarty->assign(array("HO\x4f\x4b_\x4f\x52D\x45\x52_\x43\x4f\x4e\x46\x49RMA\x54I\x4f\x4e"=>$this->displayOrderConfirmation(Tools::getValue("i\x64_c\x61rt"))));$this->setTemplate("r\x65tu\x72\x6e\x2e\x74\x70\x6c");}private function displayOrderConfirmation($id_cart){if(!(int)${${"\x47\x4c\x4fBA\x4cS"}["\x79\x6du\x64\x71\x6d\x67\x72"]})return;${${"G\x4cO\x42\x41\x4c\x53"}["\x74i\x61\x6d\x70\x75"]}=Order::getOrderByCartId(${${"\x47\x4c\x4fBAL\x53"}["ym\x75\x64q\x6dg\x72"]});${${"GL\x4f\x42A\x4c\x53"}["\x6c\x79\x78\x71\x75t\x6b"]}=array();${${"\x47\x4c\x4f\x42\x41L\x53"}["\x78\x68ejv\x7ay\x6c"]}=new Order(${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x74\x69a\x6d\x70\x75"]});${${"\x47\x4cO\x42A\x4c\x53"}["\x6c\x6c\x69i\x72\x65\x65\x64\x65"]}=new Currency($order->id_currency);if(Validate::isLoadedObject(${${"G\x4c\x4f\x42\x41\x4c\x53"}["\x78\x68\x65\x6av\x7ay\x6c"]})){$qxulguwfzl="p\x61r\x61\x6ds";$gyzgdhsxvn="\x63\x75\x72\x72\x65\x6ec\x79";${$qxulguwfzl}["\x74o\x74\x61\x6c_to_pay"]=$order->getOrdersTotalPaid();${${"GLO\x42A\x4c\x53"}["\x6c\x79\x78q\x75\x74k"]}["cu\x72r\x65\x6e\x63\x79"]=$currency->sign;${"\x47LO\x42\x41\x4cS"}["\x6a\x6f\x77u\x6c\x74\x77"]="\x70\x61ra\x6ds";${${"\x47\x4c\x4f\x42\x41LS"}["\x6c\x79x\x71\x75tk"]}["\x6fbjOr\x64\x65r"]=${${"G\x4c\x4f\x42A\x4c\x53"}["xh\x65jv\x7a\x79\x6c"]};${${"\x47L\x4fB\x41LS"}["\x6a\x6f\x77\x75\x6c\x74w"]}["\x63\x75r\x72\x65\x6ecyO\x62j"]=${$gyzgdhsxvn};return Hook::exec("\x64is\x70la\x79Or\x64erCo\x6efi\x72ma\x74\x69\x6f\x6e",${${"\x47\x4cO\x42A\x4c\x53"}["\x6c\x79\x78\x71\x75t\x6b"]});}return;}}
?>