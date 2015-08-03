<?php
/*
///-build_id: 2015031920.2559
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/store/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///
*/
${"GLOBALS"}["ebwpvmqblmd"] = "zip_code_format";
${"GLOBALS"}["ctdciodhb"]   = "zip_regexp";
${"GLOBALS"}["wnwubvg"]     = "postcode";
${"GLOBALS"}["vphoqso"]     = "id_found";
${"GLOBALS"}["uovivsqns"]   = "virtual_uri";
${"GLOBALS"}["esrnnrtkg"]   = "seller_shop";
${"GLOBALS"}["oxjolt"]      = "shop_name";
${"GLOBALS"}["tapzcfv"]     = "vat_display";
${"GLOBALS"}["fjlbulnvkw"]  = "vat_number_exists";
${"GLOBALS"}["mjmlmbldprsl"]     = "vat_number_management";
${"GLOBALS"}["ogvavilgzppe"]     = "dlv_adr_fields";
${"GLOBALS"}["orvncxo"]                            = "selected";
${"GLOBALS"}["flggvi"]                          = "country";
${"GLOBALS"}["coohkibbnl"] = "countries";
${"GLOBALS"}["tjlrhpthnf"]                   = "array";
${"GLOBALS"}["ontiydub"]                     = "selected_country";
${"GLOBALS"}["ppeuxuxmi"]                    = "seller_shopurl";
${"GLOBALS"}["jdvygpdab"]           = "default_shop";
${"GLOBALS"}["tgpizrhrpccv"]     = "languages";
${"GLOBALS"}["lkuqcxcngl"]             = "str_custom_multi_lang_fields";
${"GLOBALS"}["jbuucd"]           = "custom_multi_lang_field";
${"GLOBALS"}["iqpxuil"]                = "conf";
${"GLOBALS"}["ijwyqrvm"]               = "sellermodule";
${"GLOBALS"}["iffkuw"]                       = "ad";
${"GLOBALS"}["gdwbgebyw"]              = "isoTinyMCE";
${"GLOBALS"}["wvwzic"]                    = "isocode";
include_once(_PS_ROOT_DIR_ . "/mod\x75l\x65\x73/a\x67\x69\x6c\x65\x6du\x6c\x74\x69ple\x73\x65\x6cler/S\x65ll\x65r\x49n\x66\x6f.ph\x70");
if (Module::isInstalled("ag\x69lem\x75\x6c\x74\x69p\x6ce\x73\x68\x6f\x70"))
    include_once(_PS_ROOT_DIR_ . "/\x6dod\x75\x6c\x65s/agi\x6cemul\x74\x69pl\x65s\x68o\x70/S\x65\x6cl\x65\x72T\x79p\x65\x2eph\x70");
class AgileMultipleSellerSellerBusinessModuleFrontController extends AgileModuleFrontController
{
    public function setMedia()
    {
        parent::setMedia();
        $ckdzupxjtzb                                                            = "deflang";
        ${"GLOBALS"}["gdzlyfgrzy"] = "isocode";
        ${$ckdzupxjtzb}                                                         = new Language(self::$cookie->id_lang);
        ${${"GLOBALS"}["wvwzic"]}              = (file_exists(_PS_JS_DIR_ . "jquery/ui/jquery.ui.datepicker-" . $deflang->iso_code . ".js") ? $deflang->iso_code : "en");
        $this->addJS(array(
            _PS_ROOT_DIR_ . "/modules/agilemultipleseller/js/sellerbusiness.js",
            _PS_ROOT_DIR_ . "/modules/agilemultipleseller/js/agile_tiny_mce.js",
            _PS_ROOT_DIR_ . "/modules/agilemultipleseller/replica/filemanager/plugin.js",
            _PS_JS_DIR_ . "admin.js",
            _PS_JS_DIR_ . "jquery/plugins/jquery.typewatch.js",
            _PS_JS_DIR_ . "jquery/ui/jquery.ui.core.min.js",
            _PS_JS_DIR_ . "jquery/ui/jquery.ui.widget.min.js",
            _PS_JS_DIR_ . "jquery/ui/jquery.ui.mouse.min.js",
            _PS_JS_DIR_ . "jquery/ui/jquery.ui.slider.min.js",
            _PS_JS_DIR_ . "jquery/ui/jquery.ui.widget.min.js",
            _PS_JS_DIR_ . "jquery/ui/jquery.ui.datepicker.min.js",
            _PS_JS_DIR_ . "jquery/ui/jquery.ui.datepicker-" . ${${"GLOBALS"}["gdzlyfgrzy"]} . ".js",
            _PS_JS_DIR_ . "jquery/plugins/timepicker/jquery-ui-timepicker-addon.js",
            _PS_ROOT_DIR_ . "/modules/agilemultipleseller/js/AgileStatesManagement.js",
            _PS_ROOT_DIR_ . "/modules/agilemultipleseller/replica/themes/default/js/dropdown.js"
        ));
        if (version_compare(_PS_VERSION_, "1.6.0.12", ">=")) {
            $this->addJS(array(
                _PS_JS_DIR_ . "admin/tinymce.inc.js"
            ));
        } else {
            $this->addJS(array(
                _PS_JS_DIR_ . "tinymce.inc.js"
            ));
        }
        $this->addCSS(array(
            _PS_JS_DIR_ . "jquery/ui/themes/base/jquery.ui.theme.css",
            _PS_JS_DIR_ . "jquery/ui/themes/base/jquery.ui.datepicker.css"
        ));
    }
    public function init()
    {
        ${"GLOBALS"}["pcwndnxzm"]     = "isoTinyMCE";
        parent::init();
        ${"GLOBALS"}["akprgggjmj"]    = "languages";
        ${"GLOBALS"}["tbvspw"]        = "deflang";
        ${"GLOBALS"}["vhicmlpg"]      = "custom_labels";
        ${${"GLOBALS"}["tbvspw"]}     = new Language(self::$cookie->id_lang);
        $tmulinwrlntj                                                        = "str_custom_multi_lang_fields";
        ${"GLOBALS"}["ktemnns"]       = "custom_multi_lang_fields";
        ${${"GLOBALS"}["gdwbgebyw"]}  = (file_exists(_PS_ROOT_DIR_ . "/js/tiny_mce/langs/" . $deflang->iso_code . ".js") ? $deflang->iso_code : "en");
        ${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x69\x66\x66\x6bu\x77"]}        = str_replace("\x5c", "\x5c\\", dirname($_SERVER["PH\x50_\x53E\x4cF"]));
        ${${"GLOBALS"}["akprgggjmj"]} = Language::getLanguages(false);
        ${"GLOBALS"}["aecuqgnp"]         = "custom_multi_lang_fields";
        ${${"GLOBALS"}["ijwyqrvm"]}               = new AgileMultipleSeller();
        ${${"GLOBALS"}["iqpxuil"]}                = Configuration::getMultiple($sellermodule->getCustomFields());
        ${${"GLOBALS"}["vhicmlpg"]}         = $sellermodule->getCustomLabels(":");
        ${"GLOBALS"}["ppyvhso"]                   = "custom_labels";
        ${${"GLOBALS"}["aecuqgnp"]}               = SellerInfo::getCustomMultiLanguageFields();
        ${$tmulinwrlntj}                                                     = "";
        ${"GLOBALS"}["wsahmoa"]                         = "isoTinyMCE";
        foreach (${${"GLOBALS"}["ktemnns"]} as ${${"GLOBALS"}["jbuucd"]}) {
            ${"GLOBALS"}["krcvdjennfj"] = "custom_multi_lang_field";
            ${${"GLOBALS"}["lkuqcxcngl"]} .= "&curren;" . ${${"GLOBALS"}["krcvdjennfj"]};
        }
        self::$smarty->assign(array(
            "seller_tab_id" => 2,
            "ad" => ${${"GLOBALS"}["iffkuw"]},
            "isoTinyMCE" => ${${"GLOBALS"}["pcwndnxzm"]},
            "theme_css_dir" => _THEME_CSS_DIR_,
            "languages" => ${${"GLOBALS"}["tgpizrhrpccv"]},
            "current_id_lang" => self::$cookie->id_lang,
            "conf" => ${${"GLOBALS"}["iqpxuil"]},
            "custom_labels" => ${${"GLOBALS"}["ppyvhso"]},
            "str_custom_multi_lang_fields" => ${${"GLOBALS"}["lkuqcxcngl"]},
            "shop_url_mode" => (int) Configuration::get("ASP_SHOP_URL_MODE"),
            "iso_code" => ${${"GLOBALS"}["wsahmoa"]}
        ));
    }

    public function initContent()
    {
        parent::initContent();
        $drmsovcflhye                                              = "default_shop";
        ${${"GLOBALS"}["jdvygpdab"]} = new Shop(Configuration::get("PS_SHOP_DEFAULT"));
        $abkueg                                                    = "seller_shop";
        $yjfmulvwuk                                                = "seller_shop";
        ${$abkueg}                                                 = new Shop($this->sellerinfo->id_shop);
        ${${"GLOBALS"}["ppeuxuxmi"]}    = new ShopUrl(Shop::get_main_url_id($seller_shop->id));
        $kfitqvuwyww                                               = "seller_shopurl";
        self::$smarty->assign(array(
            "default_shop" => ${$drmsovcflhye},
            "seller_shop" => ${$yjfmulvwuk},
            "seller_shopurl" => ${$kfitqvuwyww},
            "sellertypes" => (Module::isINstalled("agilemultipleshop") ? SellerType::getSellerTypes($this->context->language->id, $this->l('Please choose seller type')) : array())
        ));
        $this->assignCountries();
        $this->assignVatNumber();
        $this->assignAddressFormat();
        $this->getImages();
        $this->getLanguage();
        $this->getLang();
        $this->setTemplate("sellerbusiness.tpl");
    }

    public function getLang() {
        $langs = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM `'._DB_PREFIX_.'lang`');

        $langsList ='';
        foreach($langs as $value) {
            $langsList .=  '<option value="' . $value['name'] . '">' .$value['name'] . '</option>';
        }

        $other_lang = array (
            'id_lang' => 500,
            'name' => 'Other Language'
        );

        array_push($langs, $other_lang);

        $this->context->smarty->assign(array(
            "langs" => $langs,
            "langs_list" => $langsList
        ));
    }

    public function getImages() {
        $root = _PS_ROOT_DIR_ . DS . 'img' . DS . 'as'  . DS . $this->sellerinfo->id_sellerinfo;
        $pathImg = SellerInfo::getLogoFolder($this->sellerinfo->id_sellerinfo);
        $images = scandir($root);
        unset($images[0]);
        unset($images[1]);
        $images = array_values($images);
       
        $images2 = array();
        foreach($images as $v) {
            // Get key value from image
            $imagesKey = explode("-",$v);
            if (strpos($imagesKey[1],'jpg') !== false) {
               $key = substr($imagesKey[1], 0, -4);
            } else {
                $key = $imagesKey[1];
            }
            
            $images2[$key] = $pathImg . $v;
        }

       $this->sellerinfo->images_path = $images2;
    }

    public function postProcess()
    {
        if (Tools::isSubmit("submitSellerinfo"))
            $this->processSubmitSellerinfo();
    }

    protected function getLanguage() {
        $count = 0;
        $languages = explode(',',$this->sellerinfo->language);
        $languages_level = explode(',',$this->sellerinfo->language_level);
        // echo '<pre>', print_r($this->sellerinfo) , '</pre>';
        $this->sellerinfo->language_count = $languages;
        $this->sellerinfo->language_count_level = $languages_level;
       /* $this->context->smarty->assign(array(
            "language_count" => count($languages),
        ));*/
    }
    protected function assignCountries()
    {
        ${"GLOBALS"}["vjnnsubap"]                               = "list";
        $vhheljumal                                             = "selected_country";
        $zryhlvp                                                = "list";
        $tjuksry                                                = "countries";
        ${"GLOBALS"}["vpjnzdqa"]        = "countries";
        if (Tools::isSubmit("id_country") && !is_null(Tools::getValue("id_country")) && is_numeric(Tools::getValue("id_country")))
            ${$vhheljumal} = (int) Tools::getValue("id_country");
        else if (isset($this->sellerinfo) && isset($this->sellerinfo->id_country) && !empty($this->sellerinfo->id_country) && is_numeric($this->sellerinfo->id_country))
            ${${"GLOBALS"}["ontiydub"]} = (int) $this->sellerinfo->id_country;
        else if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])) {
            $duwbhhjzvvl    = "array";
            ${$duwbhhjzvvl} = preg_split("/,|-/", $_SERVER["HTTP_ACCEPT_LANGUAGE"]);
            if (!Validate::isLanguageIsoCode(${${"GLOBALS"}["tjlrhpthnf"]}[0]) || !(${${"GLOBALS"}["ontiydub"]} = Country::getByIso(${${"GLOBALS"}["tjlrhpthnf"]}[0])))
                ${${"GLOBALS"}["ontiydub"]} = (int) Configuration::get("PS_COUNTRY_DEFAULT");
        } else
            ${${"GLOBALS"}["ontiydub"]} = (int) Configuration::get("PS_COUNTRY_DEFAULT");
        if (Configuration::get("PS_RESTRICT_DELIVERED_COUNTRIES"))
            ${${"GLOBALS"}["vpjnzdqa"]} = Carrier::getDeliveredCountries($this->context->language->id, true, true);
        else
            ${${"GLOBALS"}["coohkibbnl"]} = Country::getCountries($this->context->language->id, true);
        ${$zryhlvp} = "";

        foreach (${$tjuksry} as ${${"GLOBALS"}["flggvi"]}) {
            ${"GLOBALS"}["fjhrecq"]      = "country";
            ${"GLOBALS"}["qwgsebzu"]     = "selected_country";
            ${"GLOBALS"}["siifuhtsc"] = "list";
            ${${"GLOBALS"}["orvncxo"]}         = (${${"GLOBALS"}["fjhrecq"]}["id_country"] == ${${"GLOBALS"}["qwgsebzu"]}) ? "selected=\"selected\"" : "";
            $tiaupxkdtky                                            = "\x63ou\x6e\x74r\x79";
            ${${"\x47LO\x42\x41L\x53"}["\x73\x69\x69f\x75h\x74sc"]} .= "\x3c\x6f\x70\x74ion\x20\x76al\x75\x65\x3d\"" . (int) ${$tiaupxkdtky}["\x69\x64\x5fc\x6f\x75\x6et\x72y"] . "\x22 " . ${${"\x47\x4cO\x42A\x4c\x53"}["\x6fr\x76n\x63\x78\x6f"]} . "\x3e" . htmlentities(${${"G\x4cO\x42AL\x53"}["\x66\x6cggvi"]}["n\x61me"], ENT_COMPAT, "UTF-\x38") . "</\x6f\x70tio\x6e>";
        }

        $this->context->smarty->assign(array(
            "countries_list" => ${${"GLOBALS"}["vjnnsubap"]},
            "countries" => ${${"GLOBALS"}["coohkibbnl"]}
        ));
    }
    protected function assignAddressFormat()
    {
        ${"GLOBALS"}["fowkkjc"]            = "id_country";
        ${"GLOBALS"}["bttsjxwg"]           = "id_country";
        ${"GLOBALS"}["ulxkeye"]                     = "dlv_adr_fields";
        ${${"GLOBALS"}["fowkkjc"]}               = is_null($this->sellerinfo) ? 0 : (int) $this->sellerinfo->id_country;
        ${${"GLOBALS"}["ogvavilgzppe"]} = AddressFormat::getOrderedAddressFields(${${"GLOBALS"}["bttsjxwg"]}, true, true);
        $this->context->smarty->assign("ordered_adr_fields", ${${"GLOBALS"}["ulxkeye"]});
    }
    
    protected function assignVatNumber()
    {
        ${"GLOBALS"}["vfyrrtr"]                       = "vat_number_exists";
        ${"GLOBALS"}["bhsvndabmia"] = "vat_number_management";
        ${"GLOBALS"}["nmgkvhi"]                    = "vat_number_exists";
        ${${"GLOBALS"}["vfyrrtr"]}                    = file_exists(_PS_MODULE_DIR_ . "vatnumber/vatnumber.php");
        $egrwjbj                                                        = "vat_number_management";
        ${$egrwjbj}                                                     = Configuration::get("VATNUMBER_MANAGEMENT");
        if (${${"GLOBALS"}["bhsvndabmia"]} && ${${"GLOBALS"}["nmgkvhi"]})
            include_once(_PS_MODULE_DIR_ . "vatnumber/vatnumber.php");
        $xotzrgkltvlh = "vat_display";
        if (${${"GLOBALS"}["mjmlmbldprsl"]} && ${${"GLOBALS"}["fjlbulnvkw"]} && VatNumber::isApplicable(Configuration::get("PS_COUNTRY_DEFAULT")))
            ${${"GLOBALS"}["tapzcfv"]} = 2;
        else if (${${"GLOBALS"}["mjmlmbldprsl"]})
            ${${"GLOBALS"}["tapzcfv"]} = 1;
        else
            ${$xotzrgkltvlh} = 0;
        $this->context->smarty->assign(array(
            "vatnumber_ajax_call" => file_exists(_PS_MODULE_DIR_ . "vatnumber/ajax.php"),
            "vat_display" => ${${"GLOBALS"}["tapzcfv"]}
        ));
    }
    
    protected function processSubmitSellerinfo()
    {

         $lang_cookie = self::$cookie->id_lang;
        if($lang_cookie != 1) {
            $_POST['address1_1']        = $_POST['address1_' . $lang_cookie];
            $_POST['address2_1']        = $_POST['address1_' . $lang_cookie];
            $_POST['address2_1']        = $_POST['address1_' . $lang_cookie];
            $_POST['city_1']            = $_POST['city_' . $lang_cookie];
            $_POST['description_1']     = $_POST['description_' . $lang_cookie];
        }
       
        ${"GLOBALS"}["vjnnsubap"]                               = "list";
        $vhheljumal                                             = "selected_country";
        $zryhlvp                                                = "list";
        $tjuksry                                                = "countries";
        ${"GLOBALS"}["vpjnzdqa"]        = "countries";
        if (Tools::isSubmit("id_country") && !is_null(Tools::getValue("id_country")) && is_numeric(Tools::getValue("id_country")))
            ${$vhheljumal} = (int) Tools::getValue("id_country");
        else if (isset($this->sellerinfo) && isset($this->sellerinfo->id_country) && !empty($this->sellerinfo->id_country) && is_numeric($this->sellerinfo->id_country))
            ${${"GLOBALS"}["ontiydub"]} = (int) $this->sellerinfo->id_country;
        else if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])) {
            $duwbhhjzvvl    = "array";
            ${$duwbhhjzvvl} = preg_split("/,|-/", $_SERVER["HTTP_ACCEPT_LANGUAGE"]);
            if (!Validate::isLanguageIsoCode(${${"GLOBALS"}["tjlrhpthnf"]}[0]) || !(${${"GLOBALS"}["ontiydub"]} = Country::getByIso(${${"GLOBALS"}["tjlrhpthnf"]}[0])))
                ${${"GLOBALS"}["ontiydub"]} = (int) Configuration::get("PS_COUNTRY_DEFAULT");
        } else
            ${${"GLOBALS"}["ontiydub"]} = (int) Configuration::get("PS_COUNTRY_DEFAULT");
        if (Configuration::get("PS_RESTRICT_DELIVERED_COUNTRIES"))
            ${${"GLOBALS"}["vpjnzdqa"]} = Carrier::getDeliveredCountries($this->context->language->id, true, true);
        else
            ${${"GLOBALS"}["coohkibbnl"]} = Country::getCountries($this->context->language->id, true);
        ${$zryhlvp} = "";
        $countries = ${$tjuksry};


        /**************** LANGUAGE LEVEL *******************/
        $seller_id_lang =  $this->sellerinfo->id_seller;
        $langLevel = Tools::getValue("lang_level");
        $dialect = Tools::getValue("lang");
        $main_lang = Tools::getValue('main_lang');
        
        /*foreach ($dialect as $key => $value) {
            $level = $langLevel[$key];
            Db::getInstance(_PS_USE_SQL_SLAVE_)->execute("
                INSERT INTO " . _DB_PREFIX_ . "sellerinfo_language (seller_id, language, language_level)
                VALUES ('$seller_id_lang', '$value', '$level')
            ");
        }*/
        
        // die('<pre>' . print_r($dialect, true));

        $langLevel = implode(',',Tools::getValue("lang_level"));

        $languages = implode(',', Tools::getValue("lang"));
        
        $this->sellerinfo->language = $languages;
        $this->sellerinfo->language_level = $langLevel;
        $this->sellerinfo->main_language = $main_lang;

        $jlbwjt                                                  = "shop_name";
        ${"GLOBALS"}["oonrqhi"] = "shop_name";
        ${"GLOBALS"}["zlobvkbr"]            = "virtual_uri";
        AgileMultipleSeller::ensure_date_custom_field();
        $uskhfeodhv                                                 = "zip_code_format";
        ${${"GLOBALS"}["oonrqhi"]} = "";
        if (isset($_POST["shop_name"]))
            ${$jlbwjt} = trim($_POST["shop_name"], " ");
        $famsbcd = "country";
        if (isset($_POST["virtual_uri"]))
            ${${"GLOBALS"}["zlobvkbr"]} = Tools::link_rewrite(trim($_POST["virtual_uri"], " /")) . "/";
        /*if (empty($_POST["postcode"]))
            $this->errors[] = Tools::displayError("Postcode is required field.");*/
        if (empty($_POST["address1_1"]))
            $this->errors[] = Tools::displayError("Address is required field.");
        if (empty($_POST["city_1"]))
            $this->errors[] = Tools::displayError("City is required field.");
        if (empty($_POST["phone"]))
            $this->errors[] = Tools::displayError("Phone is required field.");
        $this->errors                  = array_merge($this->errors, $this->sellerinfo->validateController());
        $this->sellerinfo->id_customer = self::$cookie->id_customer;
        if (Module::isInstalled("agilemultipleshop")) {
            $mcovgfrp                                          = "shop_name";
            ${"GLOBALS"}["xdpblji"] = "seller_shopurl";
            if (empty(${$mcovgfrp}))
                $this->errors[] = Tools::displayError("The shop name can not be empty.");
            if (empty($_POST["virtual_uri"]) AND (int) Configuration::get("ASP_SHOP_URL_MODE") == agilemultipleshop::SHOP_URL_MODE_VIRTUAL)
                $this->errors[] = Tools::displayError("The shop Virtual Uri can not be empty.");
            ${"GLOBALS"}["edessnqo"] = "id_found";
            ${"GLOBALS"}["kkzhciyk"]       = "seller_shop";
            if ($this->sellerinfo->id_shop <= 1)
                $this->sellerinfo->id_shop = 0;
            ${${"GLOBALS"}["kkzhciyk"]} = new Shop($this->sellerinfo->id_shop);
            if (Shop::shop_name_duplicated(${${"GLOBALS"}["oxjolt"]}, $seller_shop->id))
                $this->errors[] = Tools::displayError("The shop name you select has been used by other seller. Please choose a new one.");
            ${"GLOBALS"}["asepnxuok"] = "seller_shop";
            if ($this->errors)
                return;
            if (!Validate::isLoadedObject(${${"GLOBALS"}["asepnxuok"]})) {
                $this->sellerinfo->id_shop = AgileMultipleShop::create_new_shop($this->sellerinfo->id_seller, ${${"GLOBALS"}["oxjolt"]});
                $this->sellerinfo->update();
                ${${"GLOBALS"}["esrnnrtkg"]} = new Shop($this->sellerinfo->id_shop);
            }
            ${${"GLOBALS"}["xdpblji"]} = new ShopUrl(Shop::get_main_url_id($seller_shop->id));
            ${${"GLOBALS"}["edessnqo"]}   = $seller_shopurl->canAddThisUrl($seller_shopurl->domain, $seller_shopurl->domain_ssl, $seller_shopurl->physical_uri, ${${"GLOBALS"}["uovivsqns"]});
            if (intval(${${"GLOBALS"}["vphoqso"]}) > 0)
                $this->errors[] = Tools::displayError("The uri you select has been used by other seller. Please choose a new one.");
        }
        ${"GLOBALS"}["uehqptpfhppm"] = "seller_shop";
        if (!(${${"GLOBALS"}["flggvi"]} = new Country($this->sellerinfo->id_country)) || !Validate::isLoadedObject(${$famsbcd}))
            throw new PrestaShopException("Country cannot be loaded with address->id_country");
        if ((int) $country->contains_states && !(int) $this->sellerinfo->id_state)
            $this->errors[] = Tools::displayError("This country requires a state selection.");
        ${$uskhfeodhv} = $country->zip_code_format;
        if ($country->need_zip_code) {
            $guefxsgyxvp                                                              = "zip_code_format";
            ${"GLOBALS"}["ayucbbdhdhcq"] = "zip_code_format";
            $krvjmkmqh                                                                = "postcode";
            ${"GLOBALS"}["smbwfoxbj"]          = "zip_code_format";
            if ((${${"GLOBALS"}["wnwubvg"]} = Tools::getValue("postcode")) && ${${"GLOBALS"}["ayucbbdhdhcq"]}) {
                ${"GLOBALS"}["gusjike"]                           = "zip_regexp";
                ${"GLOBALS"}["bgahkjn"]                                 = "zip_regexp";
                $edhlvb                                                                      = "zip_regexp";
                ${"GLOBALS"}["yvbcolkxptn"]           = "zip_regexp";
                $pslxhegowq                                                                  = "zip_regexp";
                ${${"GLOBALS"}["ctdciodhb"]}                      = "/^" . ${${"GLOBALS"}["ebwpvmqblmd"]} . "\$/ui";
                ${"GLOBALS"}["mivinoyltqoh"]          = "zip_regexp";
                ${$pslxhegowq}                                                               = str_replace(" ", "( |)", ${${"GLOBALS"}["ctdciodhb"]});
                ${${"GLOBALS"}["mivinoyltqoh"]} = str_replace("-", "(-|)", ${${"GLOBALS"}["bgahkjn"]});
                ${${"GLOBALS"}["ctdciodhb"]}       = str_replace("N", "[0-9]", ${${"GLOBALS"}["gusjike"]});
                ${${"GLOBALS"}["ctdciodhb"]}          = str_replace("L", "[a-zA-Z]", ${${"GLOBALS"}["ctdciodhb"]});
                ${${"GLOBALS"}["ctdciodhb"]}                   = str_replace("C", $country->iso_code, ${${"GLOBALS"}["yvbcolkxptn"]});
                // if (!preg_match(${$edhlvb}, ${${"GLOBALS"}["wnwubvg"]}))
                    // $this->errors[] = "<strong>" . Tools::displayError("Zip / Postal code") . "</strong> " . Tools::displayError("is invalid.") . "<br />" . Tools::displayError("Must be typed as follows:") . " " . str_replace("C", $country->iso_code, str_replace("N", "0", str_replace("L", "A", ${${"GLOBALS"}["ebwpvmqblmd"]})));
            } /*else if (${$guefxsgyxvp})
                $this->errors[] = "<strong>" . Tools::displayError("Zip / Postal code") . "</strong> " . Tools::displayError("is required.");
            else if (${${"GLOBALS"}["wnwubvg"]} && !preg_match("/^[0-9a-zA-Z -]{4,9}\$/ui", ${$krvjmkmqh}))
                $this->errors[] = "<strong>" . Tools::displayError("Zip / Postal code") . "</strong> " . Tools::displayError("is invalid.") . "<br />" . Tools::displayError("Must be typed as follows:") . " " . str_replace("C", $country->iso_code, str_replace("N", "0", str_replace("L", "A", ${${"GLOBALS"}["smbwfoxbj"]})));
        */}
        if ($country->isNeedDni() && (!Tools::getValue("dni") || !Validate::isDniLite(Tools::getValue("dni"))))
            $this->errors[] = Tools::displayError("Identification number is incorrect or has already been used.");
        $this->sellerinfo->dni            = Tools::getValue("dni");
        $this->sellerinfo->latitude       = Tools::getValue("latitude");
        $this->sellerinfo->longitude      = Tools::getValue("longitude");
        $this->sellerinfo->id_sellertype1 = Tools::getValue("id_sellertype1");
        $this->sellerinfo->id_sellertype2 = Tools::getValue("id_sellertype2");
        // echo '<pre>', print_r($_FILES, true) , '</pre>';
        SellerInfo::processLogoUpload($this->sellerinfo);
        SellerInfo::processLicenseUpload($this->sellerinfo);
        $this->errors = array_merge($this->errors, $this->sellerinfo->validateController());
        if (!empty($this->errors))
            return;
        $this->sellerinfo->save();
        if (Module::isInstalled("agilemultipleshop") AND Validate::isLoadedObject(${${"GLOBALS"}["uehqptpfhppm"]})) {
            $wrheluzg          = "shop_name";
            $seller_shop->name = ${$wrheluzg};
            $seller_shop->save();
            ${"GLOBALS"}["sxuwmytjl"] = "virtual_uri";
            $seller_shopurl->virtual_uri                            = ${${"GLOBALS"}["sxuwmytjl"]};
            $seller_shopurl->save();
            Tools::generateHtaccess();
        }
        if (empty($this->errors))
            self::$smarty->assign("cfmmsg_flag", 1);
    }
}
?>