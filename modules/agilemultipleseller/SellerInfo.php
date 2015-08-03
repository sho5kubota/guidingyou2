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
${"GLOBALS"}["kdmkog"]                        = "field_lang_value";
${"GLOBALS"}["znrbdvbetm"]              = "language";
${"GLOBALS"}["wpnbfimr"]                               = "field_lang_value_default";
${"GLOBALS"}["ptnvnxrnw"]                     = "empty";
${"GLOBALS"}["wfflirafolq"]          = "value";
${"GLOBALS"}["thutunrxpxi"]                = "htmlentities";
${"GLOBALS"}["xgynkihlk"]               = "errors";
${"GLOBALS"}["iwnmlbb"]                 = "data";
${"GLOBALS"}["nsrqxdsfw"]                        = "field";
${"GLOBALS"}["dhtyhjdihlm"] = "fieldsRequiredDatabase";
${"GLOBALS"}["tquylljuk"]               = "class_name";
${"GLOBALS"}["ljiveifke"]                     = "languages";
${"GLOBALS"}["kauibmxwpf"]           = "sellerInfo";
${"GLOBALS"}["psrqwxih"]                            = "logo_folder";
${"GLOBALS"}["mhicgcqirc"]                 = "id_customer";
${"GLOBALS"}["sgqhktmtycj"]                      = "logofile";
${"GLOBALS"}["uwncnbul"]                = "lang";
${"GLOBALS"}["bfvcihexrq"]                          = "sellerinfo";
${"GLOBALS"}["cmiueifue"]                           = "id_seller";
${"GLOBALS"}["xomhrk"]                                 = "custom_multi_lang_fields";
${"GLOBALS"}["avednykrlb"]                 = "custom_fields";
${"GLOBALS"}["pbihue"]                                 = "i";
${"GLOBALS"}["bonxfwafuqj"]                   = "folder";
${"GLOBALS"}["bcsibh"]                                 = "res";
${"GLOBALS"}["eyigfrivx"]                  = "state";
${"GLOBALS"}["faqryz"]                                 = "str_address";
${"GLOBALS"}["vcipgie"]                                = "id_lang";
${"GLOBALS"}["dsxshion"]                         = "result";
${"GLOBALS"}["ngzhniutoqka"]               = "id_sellerinfo";
class SellerInfo extends ObjectModel
{
	public $id_sellerinfo;
	public $id_seller;
	public $id_shop;
	public $id_category_default;
	public $company;
	public $id_sellertype1;
	public $id_sellertype2;
	public $id_country;
	public $country;
	public $id_customer;
	public $id_state;
	public $state;
	public $address1;
	public $address2;
	public $postcode;
	public $city;
	public $description;
	public $phone;
	public $language;
	public $language_level;
	public $main_language;
	public $license;
	public $fax;
	public $dni;
	public $latitude;
	public $longitude;
	public $date_add;
	public $date_upd;
	public $customer_info_text;
	public $ams_custom_text1;
	public $ams_custom_text2;
	public $ams_custom_text3;
	public $ams_custom_text4;
	public $ams_custom_text5;
	public $ams_custom_text6;
	public $ams_custom_text7;
	public $ams_custom_text8;
	public $ams_custom_text9;
	public $ams_custom_text10;
	public $ams_custom_html1;
	public $ams_custom_html2;
	public $ams_custom_number1;
	public $ams_custom_number2;
	public $ams_custom_number3;
	public $ams_custom_number4;
	public $ams_custom_number5;
	public $ams_custom_number6;
	public $ams_custom_number7;
	public $ams_custom_number8;
	public $ams_custom_number9;
	public $ams_custom_number10;
	public $ams_custom_date1;
	public $ams_custom_date2;
	public $ams_custom_date3;
	public $ams_custom_date4;
	public $ams_custom_date5;
	private static $_idZones = array();
	private static $_idCountries = array();
	public static $definition = array( 
		'table' => 'sellerinfo', 
		'primary' => 'id_sellerinfo', 
		'multilang' => true, 
		'multilang_shop' => false, 
		'fields' => 
			array(  'id_seller' => array( 'type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true ), 
					'id_country' => array( 'type' => self::TYPE_INT, 'validate' => 'isUnsignedId' ), 
					'id_state' => array( 'type' => self::TYPE_INT, 'validate' => 'isNullOrUnsignedId' ), 
					'postcode' => array( 'type' => self::TYPE_STRING, 'validate' => 'isPostCode', 'size' => 12 ), 
					'phone' => array( 'type' => self::TYPE_STRING, 'validate' => 'isPhoneNumber', 'size' => 16 ), 
					'fax' => array( 'type' => self::TYPE_STRING, 'validate' => 'isPhoneNumber', 'size' => 16 ), 
					'latitude' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'longitude' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'date_add' => array( 'type' => self::TYPE_DATE, 'validate' => 'isDate' ), 
					'date_upd' => array( 'type' => self::TYPE_DATE, 'validate' => 'isDate' ), 
					'id_customer' => array( 'type' => self::TYPE_INT, 'validate' => 'isUnsignedId' ), 
					'dni' => array( 'type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 128 ), 
					'id_shop' => array( 'type' => self::TYPE_INT ), 
					'id_category_default' => array( 'type' => self::TYPE_INT, 'validate' => 'isUnsignedId' ), 
					'id_sellertype1' => array( 'type' => self::TYPE_INT, 'validate' => 'isUnsignedId' ), 
					'id_sellertype2' => array( 'type' => self::TYPE_INT, 'validate' => 'isUnsignedId' ), 
					'ams_custom_number1' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'ams_custom_number2' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'ams_custom_number3' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'ams_custom_number4' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'ams_custom_number5' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'ams_custom_number6' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'ams_custom_number7' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'ams_custom_number8' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'ams_custom_number9' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'ams_custom_number10' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString' ), 
					'ams_custom_date1' => array( 'type' => self::TYPE_DATE, 'validate' => 'isDate' ), 
					'ams_custom_date2' => array( 'type' => self::TYPE_DATE, 'validate' => 'isDate' ), 
					'ams_custom_date3' => array( 'type' => self::TYPE_DATE, 'validate' => 'isDate' ), 
					'ams_custom_date4' => array( 'type' => self::TYPE_DATE, 'validate' => 'isDate' ), 
					'ams_custom_date5' => array( 'type' => self::TYPE_DATE, 'validate' => 'isDate' ), 
					'company' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'required' => true, 'size' => 256 ), 
					'description' => array( 'type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString', 'size' => 6000 ), 
					'address1' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAddress', 'size' => 128, 'required' => false ), 
					'address2' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAddress', 'size' => 128 ), 
					'city' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCityName', 'size' => 64 ), 
					'ams_custom_text1' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 1000 ), 
					'ams_custom_text2' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 1000 ), 
					'ams_custom_text3' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 1000 ), 
					'ams_custom_text4' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 1000 ), 
					'ams_custom_text5' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 1000 ), 
					'ams_custom_text6' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 1000 ), 
					'ams_custom_text7' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 1000 ), 
					'ams_custom_text8' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 1000 ), 
					'ams_custom_text9' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 1000 ), 
					'ams_custom_text10' => array( 'type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 1000 ), 
					'ams_custom_html1' => array( 'type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString', 'size' => 8000 ), 
					'ams_custom_html2' => array( 'type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString', 'size' => 8000 ), 
					'ams_custom_number8' => array( 'type' => self::TYPE_FLOAT, 'validate' => 'isString'),
					'language' 			=> array( 'type' => self::TYPE_STRING, 'validate' => 'isString'),
					'language_level' 	=> array( 'type' => self::TYPE_STRING, 'validate' => 'isString'),
					'main_language' 	=> array( 'type' => self::TYPE_STRING, 'validate' => 'isString'),
					'license' 			=> array( 'type' => self::TYPE_STRING, 'validate' => 'isString')
				) 
			);
	protected $_includeContainer = false;
	public function __construct( $id_sellerinfo = NULL, $id_lang = NULL ) {
		${"\x47LO\x42ALS"}["bg\x75\x72\x62z\x72\x6d\x67"] = "\x69\x64_\x6c\x61\x6e\x67";
		parent::__construct( ${${"G\x4c\x4f\x42AL\x53"}["\x6e\x67z\x68n\x69utoq\x6b\x61"]}, ${${"G\x4c\x4f\x42AL\x53"}["\x62\x67\x75\x72\x62\x7arm\x67"]} );
		if ( $this->id ) {
			$onyhwxf                                                       = "\x69\x64\x5f\x6c\x61n\x67";
			$ikvhdfnrm                                                     = "\x72e\x73\x75lt";
			${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x74\x6d\x74o\x74\x69\x69"] = "\x69\x64_lan\x67";
			${${"\x47L\x4f\x42\x41\x4c\x53"}["d\x73\x78s\x68\x69o\x6e"]}   = Db::getInstance()->getRow( "\x53ELE\x43\x54\x20`na\x6de`\x20FR\x4f\x4d \x60" . _DB_PREFIX_ . "c\x6fun\x74r\x79\x5fl\x61\x6e\x67`\n\t\t\t\t\t\t\t\t\t\t\t\t\x57HE\x52E \x60\x69d\x5f\x63\x6funt\x72y\x60 \x3d " . intval( $this->id_country ) . "\n\t\t\t\t\t\t\t\t\t\t\t\t\x41ND `\x69d_\x6can\x67`\x20\x3d " . ( ${${"GLO\x42\x41\x4c\x53"}["\x74\x6d\x74\x6ftii"]} ? intval( ${$onyhwxf} ) : Configuration::get( "\x50\x53\x5fL\x41\x4eG_D\x45FAU\x4c\x54" ) ) );
			$this->country                                                 = ${$ikvhdfnrm}["\x6e\x61\x6d\x65"];
			if ( intval( $this->id_state ) > 0 ) {
				${"GL\x4f\x42A\x4c\x53"}["\x66b\x65l\x6e\x6fh\x71"]       = "resu\x6c\x74";
				${${"\x47LOB\x41\x4c\x53"}["\x66\x62\x65\x6c\x6eo\x68q"]} = Db::getInstance()->getRow( "\x53ELE\x43T \x60\x6eam\x65`\x20F\x52\x4f\x4d\x20\x60" . _DB_PREFIX_ . "\x73\x74\x61te\x60\n\t\t\t\t\t\t\t\t\t\t\t\tW\x48\x45\x52\x45\x20\x60i\x64_s\x74\x61te`\x20= " . intval( $this->id_state ) );
				$this->state                                              = ${${"\x47\x4c\x4fBAL\x53"}["d\x73\x78shi\x6fn"]}["\x6e\x61\x6d\x65"];
			}
			if ( intval( $this->id_customer ) > 0 ) {
				$qyqodtyv                 = "custome\x72";
				${$qyqodtyv}              = new Customer( $this->id_customer );
				$this->customer_info_text = $customer->firstname . " " . $customer->lastname . "(" . $customer->email . ")";
			}
		}
	}
	public function fulladdress( $id_lang ) {
		${"G\x4c\x4f\x42\x41\x4c\x53"}["x\x61\x67\x6f\x63\x6cl\x66\x70\x65\x6b\x6d"] = "\x69d_\x6c\x61n\x67";
		$yotxfgcop                                                                   = "i\x64_\x6ca\x6e\x67";
		${"\x47L\x4f\x42\x41\x4cS"}["c\x6e\x6a\x78s\x69"]                            = "\x69\x64\x5fl\x61\x6e\x67";
		$mckcwgengl                                                                  = "\x63\x6f\x75\x6e\x74\x72\x79";
		$psowlpcyr                                                                   = "\x73\x74\x72\x5f\x61\x64\x64\x72es\x73";
		$rwhjxqvxko                                                                  = "\x73t\x72\x5f\x61\x64\x64r\x65ss";
		if ( !${${"\x47\x4c\x4f\x42A\x4c\x53"}["\x76\x63\x69\x70gi\x65"]} )
			${${"\x47L\x4f\x42\x41LS"}["\x78\x61\x67\x6fcl\x6cf\x70\x65\x6bm"]} = intval( Configuration::get( "PS_C\x4f\x55N\x54R\x59_\x44E\x46\x41\x55\x4cT" ) );
		${"\x47\x4c\x4f\x42\x41LS"}["p\x6b\x72\x65\x6b\x71\x6a\x6br\x64"] = "\x73t\x72\x5f\x61\x64\x64\x72\x65s\x73";
		${$rwhjxqvxko}                                                    = ( is_array( $this->address1 ) ? $this->address1[${${"\x47\x4c\x4f\x42\x41L\x53"}["c\x6e\x6ax\x73\x69"]}] : $this->address1 );
		if ( !empty( $this->address2 ) )
			${${"\x47\x4cO\x42A\x4c\x53"}["p\x6br\x65\x6b\x71j\x6b\x72\x64"]} .= ", " . ( is_array( $this->address2 ) ? $this->address2[${${"G\x4cO\x42\x41L\x53"}["vcip\x67ie"]}] : $this->address2 );
		$excfmpulmht = "s\x74\x72_\x61\x64d\x72\x65\x73\x73";
		${${"GL\x4fBA\x4c\x53"}["f\x61\x71\x72\x79\x7a"]} .= ", " . ( is_array( $this->city ) ? $this->city[${${"\x47\x4c\x4fB\x41L\x53"}["\x76\x63\x69\x70\x67\x69e"]}] : $this->city );
		if ( $this->id_state > 0 ) {
			${"\x47\x4cO\x42\x41\x4c\x53"}["\x6cib\x68x\x6c\x78\x76"]        = "s\x74\x72\x5f\x61\x64\x64\x72\x65\x73s";
			${${"\x47\x4cO\x42\x41\x4cS"}["\x65\x79ig\x66\x72\x69\x76\x78"]} = new State( $this->id_state );
			${${"G\x4c\x4f\x42\x41\x4c\x53"}["\x6c\x69\x62\x68\x78\x6c\x78\x76"]} .= ", " . $state->name;
		}
		${$psowlpcyr} .= ", " . $this->postcode;
		${$mckcwgengl} = new Country( $this->id_country, ${$yotxfgcop} );
		${$excfmpulmht} .= ", " . $country->name;
		return ${${"GL\x4fB\x41\x4cS"}["\x66\x61\x71\x72y\x7a"]};
	}
	public static function getIdBSellerId( $id_seller ) {
		$ojqsjl                                                         = "sql";
		${"G\x4c\x4fB\x41\x4cS"}["\x62\x68\x70i\x66d\x66\x74"]          = "\x73\x71\x6c";
		${"\x47\x4cO\x42\x41LS"}["\x65lu\x69vh\x6bu\x6e\x66y"]          = "\x72\x65\x73";
		${"\x47\x4cO\x42\x41\x4c\x53"}["\x66\x75ht\x68\x66fl\x78d\x62"] = "i\x64_\x73\x65\x6c\x6ce\x72";
		${"\x47L\x4f\x42ALS"}["g\x7a\x76b\x68\x63"]                     = "re\x73";
		${${"\x47\x4c\x4fB\x41\x4cS"}["bhp\x69\x66dft"]}                = "SE\x4c\x45\x43T i\x64\x5f\x73\x65\x6cleri\x6e\x66\x6f FRO\x4d `" . _DB_PREFIX_ . "s\x65\x6c\x6ce\x72\x69nf\x6f` \x57\x48ER\x45\x20\x69\x64_\x73\x65l\x6c\x65\x72=" . intval( ${${"\x47L\x4f\x42AL\x53"}["\x66u\x68\x74h\x66f\x6c\x78d\x62"]} );
		${${"\x47L\x4f\x42A\x4c\x53"}["b\x63si\x62\x68"]}               = Db::getInstance()->getRow( ${$ojqsjl} );
		if ( isset( ${${"\x47\x4cO\x42A\x4c\x53"}["\x67\x7a\x76\x62h\x63"]}["\x69d\x5fseller\x69n\x66o"] ) and intval( ${${"G\x4c\x4f\x42\x41L\x53"}["\x65\x6cu\x69\x76\x68k\x75\x6e\x66y"]}["i\x64_\x73e\x6c\x6ce\x72\x69\x6ef\x6f"] ) > 0 )
			return intval( ${${"\x47\x4cO\x42A\x4cS"}["\x62\x63\x73ibh"]}["id_\x73\x65\x6c\x6ce\x72i\x6e\x66o"] );
		return 0;
	}
	public static function get_logo_folder() {
		$sxpssij     = "folder";
		$pcrlrhfufzv = "folder";
		$cuyvefiv    = "folder";
		${$sxpssij}  = _PS_IMG_DIR_ . "as/";
		if ( !file_exists( ${$pcrlrhfufzv} ) )
			mkdir( ${${"GLOBALS"}["bonxfwafuqj"]} );

		return ${$cuyvefiv};
	}
	public static function getCustomFields() {
		${"GL\x4f\x42ALS"}["\x6a\x70\x66\x64h\x6ac\x72\x73\x79"]    = "\x63\x75\x73\x74\x6fm\x5f\x66iel\x64\x73";
		$vdbbyyces                                                  = "\x69";
		$nokyyfpvpn                                                 = "i";
		${${"GL\x4fB\x41L\x53"}["\x6a\x70f\x64\x68j\x63\x72s\x79"]} = SellerInfo::getCustomMultiLanguageFields();
		for ( ${${"\x47LOB\x41\x4cS"}["\x70\x62\x69\x68u\x65"]} = 1; ${${"\x47L\x4f\x42\x41\x4cS"}["p\x62\x69h\x75\x65"]} <= 10; ${$nokyyfpvpn}++ ) {
			$quuyavkggs      = "\x63\x75\x73\x74\x6f\x6d\x5f\x66\x69e\x6c\x64\x73";
			$ufkkwwedxg      = "\x69";
			${$quuyavkggs}[] = "am\x73_cus\x74\x6fm\x5fnu\x6db\x65r" . ${$ufkkwwedxg};
		}
		for ( ${${"\x47\x4cO\x42\x41\x4c\x53"}["p\x62\x69\x68ue"]} = 1; ${${"\x47L\x4f\x42\x41LS"}["pb\x69\x68ue"]} <= 5; ${$vdbbyyces}++ ) {
			${"G\x4c\x4fBALS"}["\x6fv\x79\x64\x69\x66\x68"]         = "\x63\x75s\x74om\x5f\x66\x69\x65\x6c\x64\x73";
			${${"GLO\x42A\x4c\x53"}["\x6f\x76\x79\x64i\x66\x68"]}[] = "am\x73\x5fcus\x74\x6f\x6d_da\x74\x65" . ${${"G\x4cOB\x41\x4c\x53"}["p\x62i\x68\x75\x65"]};
		}
		return ${${"\x47\x4c\x4f\x42\x41LS"}["avedny\x6b\x72\x6c\x62"]};
	}
	public static function getCustomMultiLanguageFields() {
		$latzftn                                                              = "\x69";
		${"GLOB\x41LS"}["\x77y\x76h\x6f\x77\x72v\x6b\x64h"]                   = "\x63\x75\x73\x74o\x6d\x5fm\x75\x6c\x74\x69_l\x61\x6eg\x5f\x66\x69\x65\x6c\x64\x73";
		$yjwoxtl                                                              = "i";
		${${"\x47LO\x42\x41\x4c\x53"}["\x77\x79\x76\x68\x6fw\x72\x76\x6bdh"]} = array();
		$zuwfqkyxgyt                                                          = "\x69";
		for ( ${$latzftn} = 1; ${$yjwoxtl} <= 10; ${${"G\x4cO\x42ALS"}["\x70b\x69\x68u\x65"]}++ ) {
			$ynrldyinrd      = "cu\x73\x74\x6fm_m\x75\x6c\x74\x69_\x6c\x61ng_\x66\x69e\x6cd\x73";
			$lxrsnindv       = "\x69";
			${$ynrldyinrd}[] = "a\x6ds\x5f\x63\x75s\x74o\x6d\x5f\x74\x65x\x74" . ${$lxrsnindv};
		}
		$crncqkpdybu = "\x69";
		for ( ${$crncqkpdybu} = 1; ${${"\x47\x4cO\x42\x41\x4c\x53"}["\x70bi\x68\x75e"]} <= 2; ${$zuwfqkyxgyt}++ ) {
			${"GLO\x42\x41\x4c\x53"}["\x78\x73z\x62\x76\x69\x6c\x70j\x63xm"]   = "c\x75\x73t\x6f\x6d\x5f\x6dul\x74\x69\x5fla\x6e\x67\x5f\x66i\x65\x6cd\x73";
			${${"G\x4cO\x42\x41\x4c\x53"}["\x78s\x7ab\x76\x69lp\x6acx\x6d"]}[] = "\x61\x6ds_\x63u\x73tom_\x68tml" . ${${"\x47\x4c\x4fB\x41\x4c\x53"}["p\x62\x69\x68u\x65"]};
		}
		return ${${"\x47LO\x42A\x4c\x53"}["x\x6f\x6d\x68\x72\x6b"]};
	}

	public static function getSellerLogoFilePath( $id_order ) {
		$sgjhhlshb                                                          = "\x69\x64\x5f\x6fr\x64\x65r";
		$bdlfirw                                                            = "i\x64\x5f\x73\x65l\x6c\x65\x72";
		${$bdlfirw}                                                         = intval( AgileSellerManager::getObjectOwnerID( "\x6f\x72d\x65\x72", ${$sgjhhlshb} ) );
		${${"G\x4cOB\x41L\x53"}["n\x67\x7a\x68\x6e\x69\x75\x74o\x71k\x61"]} = self::getIdBSellerId( ${${"\x47\x4cO\x42\x41\x4c\x53"}["\x63\x6d\x69\x75\x65\x69\x66\x75e"]} );
		$gmfcsouumjq                                                        = "s\x65ller\x69\x6e\x66o";
		${${"G\x4c\x4f\x42A\x4c\x53"}["b\x66\x76\x63\x69\x68ex\x72\x71"]}   = new SellerInfo( ${${"\x47L\x4f\x42\x41L\x53"}["n\x67\x7ah\x6ei\x75\x74\x6fq\x6b\x61"]} );
		if ( !Validate::isLoadedObject( ${$gmfcsouumjq} ) )
			return "";
		return self::seller_logo_physical_path( $sellerinfo->id );
	}
	public static function seller_logo_physical_path( $id_seller ) {
		$path = SellerInfo::get_logo_folder() . ${${"GLOBALS"}["cmiueifue"]};

		@$images = scandir($path);
		unset($images[0]);
		unset($images[1]);
		@$images = array_values($images);
		if(count($images) > 0) {
			foreach(@$images as $k => $v) {
				$img = explode('active', $v);
				if(count($img) >= 2)
					@$active = $v;
				
			}
		}

		return SellerInfo::get_logo_folder() . ${${"GLOBALS"}["cmiueifue"]} . '/' . @$active;
	}

	public function get_seller_logo_url() {
		$logo = self::get_seller_logo_url_static( $this->id );

		return $logo;

	}
    public function get_seller_logo_url2() {
		$logo = self::get_seller_logo_url_static2( $this->id );

		return $logo;

	}	

	public  function get_seller_license_url() {
		return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "img/as/" . $this->id . "_license";
	}

	public function getLicenseImages() {
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS("
			SELECT * 
			FROM " . _DB_PREFIX_ . "sellerinfo_license
			WHERE del_flg = 0 AND seller_id = " . $this->id);

		return $result;
	}

	public static function get_seller_logo_url_static( $id_sellerinfo ) {

		global $cookie;
		${"GLOBALS"}["nhosflhjk"]			= "id_sellerinfo";
		${${"GLOBALS"}["uwncnbul"]} 		= new Language( $cookie->id_lang );
		${${"GLOBALS"}["sgqhktmtycj"]}    	= self::seller_logo_physical_path( ${${"GLOBALS"}["nhosflhjk"]} );

		$active = explode('/', ${${"GLOBALS"}["sgqhktmtycj"]});
		$activeImg = end($active);
		
		if(is_dir( ${${"GLOBALS"}["sgqhktmtycj"]} ))
			return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "modules/agilemultipleseller/images/en_nologo.jpg";
		else {
			if ( file_exists( ${${"GLOBALS"}["sgqhktmtycj"]} ) )
				return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "img/as/" . ${${"GLOBALS"}["ngzhniutoqka"]} . '/' . $activeImg;
			else
				return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "modules/agilemultipleseller/images/en_nologo.jpg";
				// return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "modules/agilemultipleseller/images/" . $lang->iso_code . "-nologo.png";
		}
	}
	public static function get_seller_logo_url_static2( $id_sellerinfo ) {

		global $cookie;
		${"GLOBALS"}["nhosflhjk"]			= "id_sellerinfo";
		${${"GLOBALS"}["uwncnbul"]} 		= new Language( $cookie->id_lang );
		${${"GLOBALS"}["sgqhktmtycj"]}    	= self::seller_logo_physical_path( ${${"GLOBALS"}["nhosflhjk"]} );

		$active = explode('/', ${${"GLOBALS"}["sgqhktmtycj"]});
		$activeImg = end($active);
		
		if(is_dir( ${${"GLOBALS"}["sgqhktmtycj"]} ))
			return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "modules/agilemultipleseller/images/en-nologo_register.png";
		else {
			if ( file_exists( ${${"GLOBALS"}["sgqhktmtycj"]} ) )
				return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "img/as/" . ${${"GLOBALS"}["ngzhniutoqka"]} . '/' . $activeImg;
			else
				return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "modules/agilemultipleseller/images/en-nologo_register.png";
				// return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "modules/agilemultipleseller/images/" . $lang->iso_code . "-nologo.png";
		}
	}	


	public static function get_seller_logo_url_static_sellers( $id_sellerinfo ) {

		global $cookie;
		${"GLOBALS"}["nhosflhjk"]			= "id_sellerinfo";
		${${"GLOBALS"}["uwncnbul"]} 		= new Language( $cookie->id_lang );
		${${"GLOBALS"}["sgqhktmtycj"]}    	= self::seller_logo_physical_path( ${${"GLOBALS"}["nhosflhjk"]} );

		$active = explode('/', ${${"GLOBALS"}["sgqhktmtycj"]});
		$activeImg = end($active);
		 // echo 'GET SELLER LOGO: <h4>'. ${${"GLOBALS"}["sgqhktmtycj"]}  . '</h4><br/>';
		/*if ( file_exists( ${${"GLOBALS"}["sgqhktmtycj"]} ) )
			echo 'ALEX YES!';
		else
			echo 'ALEX NO!';*/

		if(is_dir( ${${"GLOBALS"}["sgqhktmtycj"]} ))
			return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "modules/agilemultipleseller/images/en-nologo-2.png";
		else {
			if ( file_exists( ${${"GLOBALS"}["sgqhktmtycj"]} ) )
				return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "img/as/" . ${${"GLOBALS"}["ngzhniutoqka"]} . '/' . $activeImg;
			else
				return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "modules/agilemultipleseller/images/en-nologo-2.png";
				// return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "modules/agilemultipleseller/images/" . $lang->iso_code . "-nologo.png";
		}
	}

	public static function getLogoFolder($id) {
		return Tools::getShopDomainSsl( true ) . __PS_BASE_URI__ . "img/as/" . $id . '/';
	}

	public static function getIdByCustomerId( $id_customer ) {
		$scvvlomsf                                                 = "s\x71\x6c";
		$wnypuqhh                                                  = "\x69d\x5f\x63\x75\x73\x74\x6f\x6d\x65r";
		${"G\x4cO\x42AL\x53"}["\x6ej\x6e\x76wb"]                   = "\x73\x71\x6c";
		$fgvyheekkq                                                = "\x72\x65s";
		${${"GL\x4fB\x41\x4c\x53"}["\x6e\x6a\x6evw\x62"]}          = "\x53\x45L\x45C\x54 id_s\x65\x6cle\x72i\x6e\x66o \x46\x52\x4fM\x20\x60" . _DB_PREFIX_ . "se\x6cl\x65r\x69n\x66\x6f`\x20\x57\x48\x45\x52E\x20\x69d\x5fcustom\x65r=" . intval( ${$wnypuqhh} );
		$rjfhgubi                                                  = "\x72e\x73";
		${${"\x47\x4c\x4f\x42\x41\x4cS"}["b\x63\x73\x69\x62\x68"]} = Db::getInstance()->getRow( ${$scvvlomsf} );
		if ( isset( ${$fgvyheekkq}["id_\x73\x65\x6c\x6ce\x72\x69n\x66o"] ) and intval( ${${"G\x4cO\x42A\x4c\x53"}["\x62\x63\x73\x69\x62\x68"]}["\x69d\x5fse\x6c\x6ce\x72\x69\x6efo"] ) > 0 )
			return intval( ${$rjfhgubi}["\x69\x64\x5f\x73\x65lleri\x6ef\x6f"] );
		return 0;
	}
	public static function getSellerIdByCustomerId( $id_customer ) {
		${"\x47\x4c\x4f\x42\x41\x4c\x53"}["s\x77\x70\x7a\x63\x76\x72h"]          = "s\x71\x6c";
		${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x71p\x6ba\x63\x6e\x66\x6c\x64b\x6e"] = "\x73\x71\x6c";
		$wokxuyschox                                                             = "\x69\x64\x5f\x73\x65\x6c\x6c\x65\x72";
		${${"\x47L\x4fB\x41\x4c\x53"}["q\x70\x6ba\x63n\x66\x6c\x64bn"]}          = "\x53\x45\x4cEC\x54 id\x5fs\x65ller\x20F\x52\x4fM \x60" . _DB_PREFIX_ . "s\x65\x6c\x6c\x65r\x69\x6e\x66o\x60\x20WH\x45\x52E\x20\x69\x64_\x63ust\x6fme\x72\x3d" . intval( ${${"\x47L\x4fB\x41\x4c\x53"}["m\x68i\x63g\x63q\x69rc"]} );
		${$wokxuyschox}                                                          = (int) Db::getInstance()->getValue( ${${"\x47\x4c\x4f\x42A\x4cS"}["s\x77\x70\x7a\x63vr\x68"]} );
		return ${${"\x47\x4c\x4f\x42\x41L\x53"}["\x63\x6d\x69\x75\x65\x69\x66\x75e"]};
	}

	public static function processLogoUpload( $sellerInfo ) {

		$path = SellerInfo::get_logo_folder();
		$fullPath = $path . $sellerInfo->id . '/';

		if ( !Validate::isLoadedObject( ${${"GLOBALS"}["kauibmxwpf"]} ) )
			return;
		if ( !empty( $_FILES["logo"]["name"] ) ) {

			// Check existing images
			$images = scandir($fullPath);
			unset($images[0]);
			unset($images[1]);
			$images = array_values($images);

			$ids = array();
			foreach($images as $img) {
				$imgExp = explode('-', $img);
			if (strpos($imgExp[1],'jpg') !== false) 
               $ids[] = substr($imgExp[1], 0, -4);
            else
                $ids[] = $imgExp[1];
    		}
			$lastId = max($ids);
			$key = $lastId + 1;
			foreach($_FILES["logo"]["name"] as $k => $value) {
				$name = $sellerInfo->id . '-' . $key . ".jpg";
				$fileName = $fullPath . $name;
				if(!file_exists($fullPath))
					mkdir($fullPath, 0755, true);
				
				move_uploaded_file($_FILES["logo"]["tmp_name"][$k], $fileName);
				$key++;
			}
		}

	}

	public static function processLicenseUpload( $sellerInfo ) {

		$path = SellerInfo::get_logo_folder();

		if ( !empty( $_FILES["seller_license"]["name"] ) ) {
			$name = $sellerInfo->id . "-license.jpg";
			$fileName = $path . $name;
			// echo $fileName;
			move_uploaded_file($_FILES["seller_license"]["tmp_name"], $fileName);
		}
	}

	public static function get_seller_email_by_order_id( $id_order ) {
		${"\x47L\x4fB\x41\x4cS"}["h\x6a\x61\x73\x6decy\x71\x67s"]    = "\x73q\x6c";
		$edkjdwbgyhe                                                 = "\x65m\x61i\x6c";
		${"\x47L\x4f\x42A\x4c\x53"}["kko\x6f\x73\x63\x6bf\x6d"]      = "\x69\x64\x5f\x6frde\x72";
		$cngrylg                                                     = "e\x6da\x69\x6c";
		${${"\x47LO\x42AL\x53"}["\x68\x6a\x61s\x6dec\x79\x71g\x73"]} = "\x53E\x4c\x45\x43\x54 \x65\x2e\x65ma\x69l\x20\x46\x52\x4f\x4d " . _DB_PREFIX_ . "\x6frd\x65\x72_o\x77\x6eer\x20oo IN\x4eE\x52 \x4a\x4f\x49N\x20" . _DB_PREFIX_ . "\x65\x6d\x70loyee\x20\x65\x20ON\x20oo.\x69d\x5fo\x77n\x65r = \x69d_\x65mplo\x79e\x65\x20WH\x45\x52E\x20o\x6f.id\x5f\x6f\x72\x64\x65\x72\x20=\x20" . (int) ${${"G\x4c\x4fBA\x4cS"}["k\x6b\x6f\x6f\x73\x63kf\x6d"]};
		$hrbphiqgh                                                   = "sq\x6c";
		${$cngrylg}                                                  = Db::getInstance()->getValue( ${$hrbphiqgh} );
		return ${$edkjdwbgyhe};
	}
	
	public function validateController( $htmlentities = true ) {
		${"GLOBALS"}["qvokpxp"]              = "errors";
		$wgpvts                                                      = "field";
		${"GLOBALS"}["yvnpfwzt"] = "required_fields_database";
		${${"GLOBALS"}["qvokpxp"]}           = array();
		$pwnpyvvih                                                   = "data";
		${${"GLOBALS"}["ljiveifke"]}   = Language::getLanguages( false );
		${"GLOBALS"}["ayihnmvk"]          = "default_language";
		${${"GLOBALS"}["ayihnmvk"]} = new Language( (int) Configuration::get( "PS_LANG_DEFAULT" ) );
		${${"GLOBALS"}["tquylljuk"]}            = "SellerInfo";
		${"GLOBALS"}["qlxwjnbhsld"] = "fieldsRequiredDatabase";
		${${"GLOBALS"}["yvnpfwzt"]}          = ( isset( self::${${"GLOBALS"}["dhtyhjdihlm"]}[get_class( $this )] ) ) ? self::${${"GLOBALS"}["qlxwjnbhsld"]}[get_class( $this )] : array();
		foreach ( $this->def["fields"] as ${$wgpvts} => ${$pwnpyvvih} ) {
			${"GLOBALS"}["ldqeiejmi"]             = "field";
			${"GLOBALS"}["mzlthpv"]               = "field";
			$runwnk                                                          = "value";
			${"GLOBALS"}["fpuljc"]       = "field";
			${"GLOBALS"}["ntpixskg"]           = "value";
			${"GLOBALS"}["spnaati"]               = "value";
			${"GLOBALS"}["skojvpla"]           = "value";
			$wbvroskeu                                                       = "field";
			${"GLOBALS"}["qgndecvge"]       = "data";
			$urltcywzxdo                                                     = "value";
			$yvjdjqrxlw                                                      = "data";
			${"GLOBALS"}["jhstjcwuy"] = "required_fields_database";
			$pviioxnj                                                        = "value";
			if ( in_array( ${${"GLOBALS"}["nsrqxdsfw"]}, ${${"GLOBALS"}["jhstjcwuy"]} ) ) {
				${${"GLOBALS"}["iwnmlbb"]}["required"] = true;
			}
			if ( isset( ${${"GLOBALS"}["iwnmlbb"]}["required"] ) && ${${"GLOBALS"}["iwnmlbb"]}["required"] && ( ${${"GLOBALS"}["skojvpla"]} = Tools::getValue( ${${"GLOBALS"}["ldqeiejmi"]}, $this->{${${"GLOBALS"}["mzlthpv"]}} ) ) == false && (string) ${$pviioxnj} != "0" ) {
				if ( !$this->id || ${${"GLOBALS"}["nsrqxdsfw"]} != "passwd" ) {
					$zetdmofamt                                         = "htmlentities";
					$ywohmlrfbnh                                        = "field";
					${${"GLOBALS"}["xgynkihlk"]}[] = "<b>" . self::displayFieldName( ${$ywohmlrfbnh}, get_class( $this ), ${$zetdmofamt} ) . "</b> " . Tools::displayError( "is required." );
				}
			}
			if ( isset( ${${"GLOBALS"}["qgndecvge"]}["size"] ) && ( ${${"GLOBALS"}["spnaati"]} = Tools::getValue( ${$wbvroskeu}, $this->{${${"GLOBALS"}["nsrqxdsfw"]}} ) ) && Tools::strlen( ${${"GLOBALS"}["ntpixskg"]} ) > ${$yvjdjqrxlw}["size"] ) {
				$piwznejj                                                       = "data";
				$dlcyqqmxyc                                                     = "field";
				${${"GLOBALS"}["xgynkihlk"]}[] = sprintf( Tools::displayError( "%1\$s is too long. Maximum length: %2\$d" ), self::displayFieldName( ${$dlcyqqmxyc}, get_class( $this ), ${${"GLOBALS"}["thutunrxpxi"]} ), ${$piwznejj}["size"] );
			}
			${${"GLOBALS"}["wfflirafolq"]} = Tools::getValue( ${${"GLOBALS"}["fpuljc"]}, $this->{${${"GLOBALS"}["nsrqxdsfw"]}} );
			if ( ( ${$urltcywzxdo} || ${${"GLOBALS"}["wfflirafolq"]} == "0" ) || ( ${${"GLOBALS"}["nsrqxdsfw"]} == "postcode" && ${$runwnk} == "0" ) ) {
				$lmfyshwbdhu                                      = "field";
				${"GLOBALS"}["rfjxsv"] = "field";
				$kfuebbjho                                        = "field";
				if ( ${${"GLOBALS"}["nsrqxdsfw"]} == "company" || ${${"GLOBALS"}["nsrqxdsfw"]} == "description" || ${${"GLOBALS"}["nsrqxdsfw"]} == "address1" || ${$kfuebbjho} == "address2" || ${${"GLOBALS"}["rfjxsv"]} == "city" || in_array( ${$lmfyshwbdhu}, SellerInfo::getCustomMultiLanguageFields() ) ) {
					$npjnrrbqcu                                                     = "field";
					$gnbvmqgsjne                                                    = "empty";
					$bugdocnlwylp                                                   = "language";
					$bksuduoel                                                      = "empty";
					$pfktclkpyrm                                                    = "field";
					${"GLOBALS"}["gnwnnefkkal"] = "field";
					// if ( ( ${${"GLOBALS"}["gnwnnefkkal"]} == "company" || ${${"GLOBALS"}["nsrqxdsfw"]} == "address1" || ${$npjnrrbqcu} == "city" ) && ( ( ${$gnbvmqgsjne} = Tools::getValue( ${$pfktclkpyrm} . "_" . $default_language->id ) ) === false || ${$bksuduoel} !== "0" && empty( ${${"GLOBALS"}["ptnvnxrnw"]} ) ) ) {
					if ( ( ${${"GLOBALS"}["gnwnnefkkal"]} == "company" ) && ( ( ${$gnbvmqgsjne} = Tools::getValue( ${$pfktclkpyrm} . "_" . $default_language->id ) ) === false || ${$bksuduoel} !== "0" && empty( ${${"GLOBALS"}["ptnvnxrnw"]} ) ) ) {
						${"GLOBALS"}["doslmnuqidd"] = "class_name";
						${"GLOBALS"}["aqlwwfiq"]          = "class_name";
						${${"GLOBALS"}["xgynkihlk"]}[]                = sprintf( Tools::displayError( "The field %1\$s is required at least in %2\$s." ), call_user_func( array(
									${${"GLOBALS"}["doslmnuqidd"]},
									"displayFieldName"
								), ${${"GLOBALS"}["nsrqxdsfw"]}, ${${"GLOBALS"}["aqlwwfiq"]} ), $default_language->name );
					}
					${${"GLOBALS"}["wpnbfimr"]} = "";
					foreach ( ${${"GLOBALS"}["ljiveifke"]} as ${$bugdocnlwylp} ) {
						$cndzkijievc                                                       = "field";
						${${"GLOBALS"}["wpnbfimr"]} = Tools::getValue( ${$cndzkijievc} . "_" . ${${"GLOBALS"}["znrbdvbetm"]}["id_lang"] );
						if ( !empty( ${${"GLOBALS"}["wpnbfimr"]} ) )
							break;
					}
					foreach ( ${${"GLOBALS"}["ljiveifke"]} as ${${"GLOBALS"}["znrbdvbetm"]} ) {
						$lldgwfe                                                                = "language";
						${"GLOBALS"}["vsmetocbel"]          = "field_lang_value";
						${"GLOBALS"}["xivpfytplj"]    = "field_lang_value";
						${${"GLOBALS"}["xivpfytplj"]} = Tools::getValue( ${${"GLOBALS"}["nsrqxdsfw"]} . "_" . ${$lldgwfe}["id_lang"] );
						${"GLOBALS"}["brtzwoc"]                         = "field_lang_value";
						${"GLOBALS"}["gtkfqtcf"]               = "field_lang_value_default";
						${"GLOBALS"}["ewqypbcfttt"]      = "field_lang_value";
						if ( ${${"GLOBALS"}["ewqypbcfttt"]} !== false && Tools::strlen( ${${"GLOBALS"}["vsmetocbel"]} ) > ${${"GLOBALS"}["iwnmlbb"]}["size"] ) {
							${"GLOBALS"}["wtwtictfns"]      = "errors";
							$wdwsuuwkquqt                                                    = "field";
							$cuwecmug                                                        = "class_name";
							${"GLOBALS"}["swcuxu"]                = "language";
							${${"GLOBALS"}["wtwtictfns"]}[] = sprintf( Tools::displayError( "The field %1\$s (%2\$s) is too long (%3\$d chars max, html chars including)." ), call_user_func( array(
										${$cuwecmug},
										"displayFieldName"
									), ${$wdwsuuwkquqt}, ${${"GLOBALS"}["tquylljuk"]} ), ${${"GLOBALS"}["swcuxu"]}["name"], ${${"GLOBALS"}["iwnmlbb"]}["size"] );
						}
						if ( isset( ${${"GLOBALS"}["iwnmlbb"]}["validate"] ) && !Validate::${${"GLOBALS"}["iwnmlbb"]}["validate"]( ${${"GLOBALS"}["kdmkog"]} ) && !empty( ${${"GLOBALS"}["brtzwoc"]} ) ) {
							$grnizjh                                               = "class_name";
							$lmtxfwvvoce                                           = "field";
							$xhefwlyisa                                            = "language";
							${${"GLOBALS"}["xgynkihlk"]}[] = sprintf( Tools::displayError( "The field %1\$s (%2\$s) Is Invalid." ), call_user_func( array(
										${$grnizjh},
										"displayFieldName"
									), ${$lmtxfwvvoce}, ${${"GLOBALS"}["tquylljuk"]} ), ${$xhefwlyisa}["name"] );
						}
						$this->{${${"GLOBALS"}["nsrqxdsfw"]}}[${${"GLOBALS"}["znrbdvbetm"]}["id_lang"]] = ( empty( ${${"GLOBALS"}["kdmkog"]} ) ? ${${"GLOBALS"}["gtkfqtcf"]} : ${${"GLOBALS"}["kdmkog"]} );
					}
				} else {
					${"GLOBALS"}["mejgkzpxfs"] = "value";
					${"GLOBALS"}["mehkcydynk"]          = "data";
					if ( isset( ${${"GLOBALS"}["iwnmlbb"]}["validate"] ) && !Validate::${${"GLOBALS"}["iwnmlbb"]}["validate"]( ${${"GLOBALS"}["wfflirafolq"]} ) && ( !empty( ${${"GLOBALS"}["mejgkzpxfs"]} ) || ( isset( ${${"GLOBALS"}["iwnmlbb"]}["required"] ) && ${${"GLOBALS"}["mehkcydynk"]}["required"] ) ) ) {
						$vltxdvdq                                                  = "htmlentities";
						${"GLOBALS"}["bohkdrh"]   = "errors";
						$btpfmrdi                                                  = "data";
						${${"GLOBALS"}["bohkdrh"]}[] = "<b>" . ${$btpfmrdi}["validate"] . " " . self::displayFieldName( ${${"GLOBALS"}["nsrqxdsfw"]}, get_class( $this ), ${$vltxdvdq} ) . "</b> " . Tools::displayError( "is invalid." );
					} else {
						${"GLOBALS"}["susgffn"]            = "data";
						$ojhawnjc                                                           = "field";
						${"GLOBALS"}["ddnlvjvgd"] = "data";
						if ( isset( ${${"GLOBALS"}["ddnlvjvgd"]}["copy_post"] ) && !${${"GLOBALS"}["susgffn"]}["copy_post"] )
							continue;
						$this->{${$ojhawnjc}} = ${${"GLOBALS"}["wfflirafolq"]};
					}
				}
			}
		}
		return ${${"GLOBALS"}["xgynkihlk"]};
	}

}
?>
