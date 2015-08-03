<?php /*
///-build_id: 2015013020.5255
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/store/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///
*/
include_once (_PS_ROOT_DIR_ . "/modules/agilepaypal/agilepaypal.php");
include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
class AgilePaypalRedirectModuleFrontController extends ModuleFrontController {
    public $ssl = true;
    public function initContent() {
        $this->display_column_left = true;
        $docsgjveyls = "module";
        parent::initContent();
        $ {
            $docsgjveyls
        } = new AgilePaypal();

        foreach ($this->context->cart->getProducts() as $key => $prod) {
        	$product_list_html = $this->getEmailTemplateContent('order_conf_product_list.tpl', Mail::TYPE_HTML, $this->context->cart->getProducts());
			$id_land = 1;   // get current language id , if you are in order page you can use this
			$template_name = 'order_conf_2';  // this is file name here the file name is test.html                                           
			$title = "New Paypal Order";    // mail title 
			$templateVars['{firstname}'] = "Guiding-you Administrator";  
			$templateVars['{lastname}'] = '';
			$templateVars['{email}'] = "email address";
			$templateVars['{passwd}'] = "password";
			$templateVars['{payment}'] = "Agile Paypal";
			$templateVars['{date}'] = date('Y-m-d h:i:s');
			$templateVars['{products}'] = $product_list_html;
			$templateVars['{total_products}'] = $prod['cart_quantity'];
			$templateVars['{total_paid}'] = $prod['total'];
			$templateVars['{customer_id}'] = $this->context->customer->id;
			$templateVars['{order_name}'] = $this->context->customer->firstname . ' ' . $this->context->customer->lastname;
			$to = "webmaster@guiding-you.co"; // $to = "webmaster@guiding-you.co";
			$toName = "Guidingyou Admin";
			$from = $this->context->customer->email;
			$fromName = $this->context->customer->firstname . ' ' . $this->context->customer->lastname;

			Mail::Send($id_land, $template_name, $title, $templateVars, $to, $toName, $from, $fromName);

		}

        $module->agilepaypal_redirect();
        $this->setTemplate("redirect.tpl");
    }

    protected function getEmailTemplateContent($template_name, $mail_type, $var)
	{
		$email_configuration = Configuration::get('PS_MAIL_TYPE');
		if ($email_configuration != $mail_type && $email_configuration != Mail::TYPE_BOTH)
			return '';

		$theme_template_path = _PS_THEME_DIR_.'mails'.DIRECTORY_SEPARATOR.$this->context->language->iso_code.DIRECTORY_SEPARATOR.$template_name;
		$default_mail_template_path = _PS_MAIL_DIR_.$this->context->language->iso_code.DIRECTORY_SEPARATOR.$template_name;

		if (Tools::file_exists_cache($theme_template_path))
			$default_mail_template_path = $theme_template_path;

		if (Tools::file_exists_cache($default_mail_template_path))
		{
			$this->context->smarty->assign('list', $var);
			return $this->context->smarty->fetch($default_mail_template_path);
		}
		return '';
	}
}
?>