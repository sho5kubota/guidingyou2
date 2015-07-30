<?php
/*
///-build_id: 2015042222.1245
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/store/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///
*/
$ {
    "GLOBALS"
}
["usxshxp"] = "idx";
$ {
    "GLOBALS"
}
["ajztkmhlf"] = "sellerinfos";
$ {
    "GLOBALS"
}
["jkdmbkvfe"] = "sql1";
$ {
    "GLOBALS"
}
["hbrwvgrewxi"] = "sql0";
$ {
    "GLOBALS"
}
["pukknqg"] = "nb_only";
$ {
    "GLOBALS"
}
["fikxfqrasp"] = "seller_location";
$ {
    "GLOBALS"
}
["dhmgqmru"] = "seller_type";
$ {
    "GLOBALS"
}
["yrvgkjhsvn"] = "filter";
$ {
    "GLOBALS"
}
["vhsixjirton"] = "n";
$ {
    "GLOBALS"
}
["dnjxlkemh"] = "p";
$ {
    "GLOBALS"
}
["jjtugzy"] = "currentURL";
$ {
    "GLOBALS"
}
["ttvqpqg"] = "sellerlocs";
$ {
    "GLOBALS"
}
["hfizsmyzc"] = "sql";
$ {
    "GLOBALS"
}
["vjhhwtnl"] = "id_country";
$ {
    "GLOBALS"
}
["nyyubgx"] = "seller_list";
$ {
    "GLOBALS"
}
["sjmhyny"] = "selers_nb";
$ {
    "GLOBALS"
}
["inoywq"] = "parentid";
$ {
    "GLOBALS"
}
["qdayfxgyolo"] = "loclevel";
$ {
    "GLOBALS"
}
["zlnwwfwwxl"] = "id_lang";
class AgileSellersControllerCore extends FrontController {
    public $php_self = 'agilesellers';
    public $authRedirection = 'agilesellers';
    protected function canonicalRedirection($canonical_url = '') {
        parent::canonicalRedirection();
    }
    public function initContent() {
        parent::initContent();
        $this->processData();
        $this->setTemplate(_PS_ROOT_DIR_ . "/modules/agilemultipleshop/views/templates/front/agilesellers.tpl");
    }
    public function setMedia() {
        parent::setMedia();
        $this->addCSS(array(_PS_ROOT_DIR_ . "/modules/agilemultipleshop/css/agilemultipleshop.css" => "all"));
        $this->addJS(_PS_ROOT_DIR_ . "/modules/agilemultipleshop/js/agilemultipleshop.js");
    }
    public function processData() {
        ${"GLOBALS"}["fdbwqugrvpj"]     = "sellertypes";
        ${"GLOBALS"}["rafjmgrtz"]       = "currentURL";
        global $link, $cookie;
        ${"GLOBALS"}["wyfrrsgzcqmj"]    = "parentid";
        $wkdfihoixlt = "sellerlocs";
        ${"GLOBALS"}["abfhyohxcepq"]    = "sellertypes";
        ${"GLOBALS"}["onavblgqay"]      = "loclevel";
        ${"GLOBALS"}["cmrbhwildqq"]     = "sql";
        $rnauidpzoj = "id_state";
        $vltwwfcpyb = "sql";
        ${${"GLOBALS"}["wyfrrsgzcqmj"]} = Tools::getValue("parentid");
        ${${"GLOBALS"}["onavblgqay"]}   = Tools::getValue("loclevel");
        ${"GLOBALS"}["wneezryb"]        = "id_state";
        $rjnipgjmcov = "id_country";
        ${${"GLOBALS"}["zlnwwfwwxl"]}   = $cookie->id_lang;
        ${${"GLOBALS"}["rafjmgrtz"]}    = $link->getAgileSellersLink(Tools::getValue("filter"), NULL, ${${"GLOBALS"}["qdayfxgyolo"]}, 
            ${${"GLOBALS"}["inoywq"]});
        ${"GLOBALS"}["xgpwhw"]          = "sql";
        $sqfkfhf                        = "selers_nb";
        $wrxuynjjspv                    = "id_lang";

        include_once (_PS_ROOT_DIR_ . "/modules/agilemultipleshop/SellerType.php");
        
        ${"GLOBALS"}["pxrhlvnban"]      = "id_country";
        $ndrslk = "sellerlocs";
        $fiwtjwlboebj = "selers_nb";
        ${${"GLOBALS"}["abfhyohxcepq"]} = SellerType::getSellerTypes($cookie->id_lang);
        ${"GLOBALS"}["iqeqiylvi"]       = "sql";
        $sbiweugxfex = "module";
        ${${"GLOBALS"}["sjmhyny"]}      = $this->getSellers(Tools::getValue("filter"), Tools::getValue("loclevel"), Tools::getValue("seller_location"), Tools::getValue("parentid"), Tools::getValue("seller_type"), true);
        $this->pagination((int)${$sqfkfhf});
        ${${"GLOBALS"}["nyyubgx"]}      = $this->getSellers(Tools::getValue("filter"), Tools::getValue("loclevel"), Tools::getValue("seller_location"), Tools::getValue("parentid"), Tools::getValue("seller_type"), false, $this->p, $this->n);
        $qjtsnum = "sql";
        ${${"GLOBALS"}["cmrbhwildqq"]}  = "";

        switch (${${"GLOBALS"}["qdayfxgyolo"]}) {

            case "city":
                ${$rnauidpzoj} = Tools::getValue("parentid");
                ${$vltwwfcpyb} =    "SELECT distinct sl.city AS id, sl.city AS name 
                                    FROM " . _DB_PREFIX_ . "sellerinfo s
                                    LEFT JOIN " . _DB_PREFIX_ . "sellerinfo_lang sl ON (s.id_sellerinfo=sl.id_sellerinfo AND sl.id_lang = " . $cookie->id_lang . ")
                                    WHERE s.id_state=" . intval(${${"GLOBALS"}["wneezryb"]});
                break;

            case "state":
                ${${"GLOBALS"}["vjhhwtnl"]} = intval(Tools::getValue("parentid"));
                if (${${"GLOBALS"}["pxrhlvnban"]} <= 0) 
                    ${ $rjnipgjmcov} = intval(Configuration::get("PS_COUNTRY_DEFAULT"));
                ${${"GLOBALS"}["hfizsmyzc"]} = "SELECT distinct id_state AS id, name 
                                                FROM " . _DB_PREFIX_ . "state 
                                                WHERE id_country=" . intval(${${"GLOBALS"}["vjhhwtnl"]});
                break;

            case "country":
                ${${"GLOBALS"}["iqeqiylvi"]} = "SELECT distinct c.id_country AS id, cl.name 
                                                FROM " . _DB_PREFIX_ . "country c 
                                                LEFT JOIN " . _DB_PREFIX_ . "country_lang cl ON (cl.id_country=c.id_country AND cl.id_lang = " . ${$wrxuynjjspv} . ")
                                                WHERE active=1
                                                ";
                break;
            }

            if (!empty(${$qjtsnum})) 
                ${${"GLOBALS"}["ttvqpqg"]} = Db::getInstance()->ExecuteS(${${"GLOBALS"}["xgpwhw"]});

            else ${$wkdfihoixlt} = array();

            include_once (_PS_ROOT_DIR_ . "/modules/agilemultipleshop/agilemultipleshop.php");
            ${$sbiweugxfex} = new AgileMultipleShop();


            // GEt Countries
            $countryQuery = "SELECT distinct c.id_country AS id, cl.name 
                            FROM " . _DB_PREFIX_ . "country c 
                            LEFT JOIN " . _DB_PREFIX_ . "country_lang cl ON (cl.id_country=c.id_country AND cl.id_lang = " . ${$wrxuynjjspv} . ")
                            WHERE active=1
                            ";


            $countries = Db::getInstance()->ExecuteS($countryQuery);

            // Get States
            $country_id = intval(Tools::getValue("parentid"));
            $stateQuery = "SELECT distinct id_state AS id, name 
                           FROM " . _DB_PREFIX_ . "state 
                           WHERE id_country=" . intval($country_id);

            $states = Db::getInstance()->ExecuteS($stateQuery);


            self::$smarty->assign(array(
                "seller_list"           => ${${"GLOBALS"}["nyyubgx"]}, 
                "selers_nb"             => ${$fiwtjwlboebj}, 
                "countries"             => $countries,
                "states"                => $states,
                "sellertypes"           => ${${"GLOBALS"}["fdbwqugrvpj"]}, 
                "sellerlocs"            => ${$ndrslk}, 
                "filters"               => array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"), 
                "filter"                => Tools::getValue("filter"), 
                "parentid"              => ${${"GLOBALS"}["inoywq"]}, 
                "loclevel"              => ${${"GLOBALS"}["qdayfxgyolo"]}, 
                "userview"              => Tools::getValue("userview"), 
                "seller_type"           => intval(Tools::getValue("seller_type")), 
                "seller_location"       => Tools::getValue("seller_location"), 
                "currentURL"            => ${${"GLOBALS"}["jjtugzy"]}, 
                "homeSize"              => Image::getSize("home_default"), 
                "agilemultipleshop_tpl" => _PS_ROOT_DIR_ . "/modules/agilemultipleshop/", 
                "path"                  => $module->getL("Shop By Seller")
                )
            );
        }

        protected function getSellers($filter, $loclevel, $seller_location, $parentid, $seller_type, $nb_only = false, $p = 1, $n = 10) {
            $kkogupccdhb = "n";
            $pkeqzkyiwg = "filter";
            $vuksqrvbb = "p";
            $fmudhbweowv = "n";
            $ {
                "GLOBALS"
            }
            ["tpuyuglez"] = "filter";
            global $cookie;
            if ($ {
                $ {
                    "GLOBALS"
                }
                ["dnjxlkemh"]
            } < 1) $ {
                $vuksqrvbb
            } = 1;
            $ngvwirzrfke = "seller_type";
            $ {
                "GLOBALS"
            }
            ["xjmyxplqv"] = "sql";
            $ {
                "GLOBALS"
            }
            ["jiccurkf"] = "idx";
            if ($ {
                $fmudhbweowv
            } < 1) $ {
                $ {
                    "GLOBALS"
                }
                ["vhsixjirton"]
            } = 10;
            $yzmtckn = "n";
            if (strtoupper($ {
                $pkeqzkyiwg
            }) == "ALL") $ {
                $ {
                    "GLOBALS"
                }
                ["yrvgkjhsvn"]
            } = "";
            $cpfozsi = "filter";
            require_once (_PS_ROOT_DIR_ . "/modules/agilemultipleseller/SellerInfo.php");
            $ {
                $ {
                    "GLOBALS"
                }
                ["hfizsmyzc"]
            } = "FROM `" . _DB_PREFIX_ . "employee` e
                     LEFT JOIN  `" . _DB_PREFIX_ . "sellerinfo` s ON e.id_employee = s.id_seller
                     LEFT JOIN  `" . _DB_PREFIX_ . "sellerinfo_lang` sl ON s.id_sellerinfo=sl.id_sellerinfo AND sl.id_lang = " . $cookie->id_lang . "
                     LEFT JOIN (SELECT count(*) as products,id_owner FROM " . _DB_PREFIX_ . "product_owner po1 LEFT JOIN " . _DB_PREFIX_ . "product p1 on(p1.id_product=po1.id_product) WHERE p1.active=1 GROUP BY id_owner) p ON e.id_employee=p.id_owner
                     LEFT JOIN  `" . _DB_PREFIX_ . "country_lang` cl ON (s.id_country = cl.id_country AND cl.id_lang=" . (int)$cookie->id_lang . ")
                     LEFT JOIN  `" . _DB_PREFIX_ . "state` st ON s.id_state = st.id_state
                 WHERE e.active=1 
                    AND e.id_profile = " . Configuration::get("AGILE_MS_PROFILE_ID") . "
                 ";
            if (!empty($ {
                $cpfozsi
            })) $ {
                $ {
                    "GLOBALS"
                }
                ["hfizsmyzc"]
            } = $ {
                $ {
                    "GLOBALS"
                }
                ["hfizsmyzc"]
            } . " AND sl.company like '" . $ {
                $ {
                    "GLOBALS"
                }
                ["tpuyuglez"]
            } . "%'";
            if ($ {
                $ {
                    "GLOBALS"
                }
                ["dhmgqmru"]
            } > 0) $ {
                $ {
                    "GLOBALS"
                }
                ["hfizsmyzc"]
            } = $ {
                $ {
                    "GLOBALS"
                }
                ["xjmyxplqv"]
            } . " AND (s.id_sellertype1 = " . $ {
                $ {
                    "GLOBALS"
                }
                ["dhmgqmru"]
            } . " OR s.id_sellertype2 = " . $ {
                $ngvwirzrfke
            } . ")";
            $njsrwx = "loclevel";
            $ {
                "GLOBALS"
            }
            ["wczwhpewofs"] = "p";
            $ {
                "GLOBALS"
            }
            ["ueccovehs"] = "idx";
            if ($ {
                $ {
                    "GLOBALS"
                }
                ["qdayfxgyolo"]
            } == "country") {
                $brksdpu = "sql";
                if (!empty($ {
                    $ {
                        "GLOBALS"
                    }
                    ["fikxfqrasp"]
                })) $ {
                    $brksdpu
                } = $ {
                    $ {
                        "GLOBALS"
                    }
                    ["hfizsmyzc"]
                } . " AND s.id_country = " . intval($ {
                    $ {
                        "GLOBALS"
                    }
                    ["fikxfqrasp"]
                });
            } else if ($ {
                $ {
                    "GLOBALS"
                }
                ["qdayfxgyolo"]
            } == "state") {
                $ptmgmprnvnq = "seller_location";
                if ($ {
                    $ {
                        "GLOBALS"
                    }
                    ["inoywq"]
                } > 0) {
                    $ {
                        $ {
                            "GLOBALS"
                        }
                        ["hfizsmyzc"]
                    } = $ {
                        $ {
                            "GLOBALS"
                        }
                        ["hfizsmyzc"]
                    } . " AND s.id_country = '" . $ {
                        $ {
                            "GLOBALS"
                        }
                        ["inoywq"]
                    } . "'";
                }
                if (!empty($ {
                    $ptmgmprnvnq
                })) {
                    $qstkrnbfb = "sql";
                    $rmbwgxvdm = "seller_location";
                    $ {
                        $ {
                            "GLOBALS"
                        }
                        ["hfizsmyzc"]
                    } = $ {
                        $qstkrnbfb
                    } . " AND s.id_state = " . intval($ {
                        $rmbwgxvdm
                    });
                }
            } else if ($ {
                $njsrwx
            } == "city") {
                if ($ {
                    $ {
                        "GLOBALS"
                    }
                    ["inoywq"]
                } > 0) {
                    $ {
                        "GLOBALS"
                    }
                    ["defcvsfnbfjm"] = "sql";
                    $ {
                        "GLOBALS"
                    }
                    ["uvoktmkcmfd"] = "parentid";
                    $ {
                        $ {
                            "GLOBALS"
                        }
                        ["hfizsmyzc"]
                    } = $ {
                        $ {
                            "GLOBALS"
                        }
                        ["defcvsfnbfjm"]
                    } . " AND s.id_state = '" . $ {
                        $ {
                            "GLOBALS"
                        }
                        ["uvoktmkcmfd"]
                    } . "'";
                }
                $ {
                    "GLOBALS"
                }
                ["kiofppjfwr"] = "seller_location";
                if (!empty($ {
                    $ {
                        "GLOBALS"
                    }
                    ["kiofppjfwr"]
                })) {
                    $mrqmpxsh = "sql";
                    $ {
                        $mrqmpxsh
                    } = $ {
                        $ {
                            "GLOBALS"
                        }
                        ["hfizsmyzc"]
                    } . " AND sl.city = '" . $ {
                        $ {
                            "GLOBALS"
                        }
                        ["fikxfqrasp"]
                    } . "'";
                }
            }
            if ($ {
                $ {
                    "GLOBALS"
                }
                ["pukknqg"]
            }) {
                $hzocsdrvh = "sql0";
                $jxqxbioqh = "sql";
                $ {
                    $ {
                        "GLOBALS"
                    }
                    ["hbrwvgrewxi"]
                } = "SELECT COUNT(*) " . $ {
                    $jxqxbioqh
                };
                return Db::getInstance()->getValue($ {
                    $hzocsdrvh
                });
            }
            $ {
                $ {
                    "GLOBALS"
                }
                ["jkdmbkvfe"]
            } = "SELECT s.`id_sellerinfo`, s.`id_seller`, s.`id_country`, s.`id_state`, s.`postcode`, s.`phone`, s.`fax`, s.`latitude`, s.`longitude`, s.`date_add`, s.`date_upd`, s.`id_customer`, s.`dni`, s.`id_shop`, s.`id_category_default`, s.`id_sellertype1`, s.`id_sellertype2`,
                        cl.name as country, st.name as state, sl.*, IFNULL(p.products,0) AS products " . $ {
                $ {
                    "GLOBALS"
                }
                ["hfizsmyzc"]
            } . "   
                    ORDER BY sl.company ASC
                    LIMIT " . (((int)($ {
                $ {
                    "GLOBALS"
                }
                ["wczwhpewofs"]
            }) - 1) * (int)($ {
                $yzmtckn
            })) . "," . (int)($ {
                $kkogupccdhb
            });
            $ {
                $ {
                    "GLOBALS"
                }
                ["ajztkmhlf"]
            } = Db::getInstance()->ExecuteS($ {
                $ {
                    "GLOBALS"
                }
                ["jkdmbkvfe"]
            });
            for ($ {
                $ {
                    "GLOBALS"
                }
                ["jiccurkf"]
            } = 0;$ {
                $ {
                    "GLOBALS"
                }
                ["ueccovehs"]
            } < count($ {
                $ {
                    "GLOBALS"
                }
                ["ajztkmhlf"]
            });$ {
                $ {
                    "GLOBALS"
                }
                ["usxshxp"]
            }
            ++) {
                $ {
                    "GLOBALS"
                }
                ["eeicqs"] = "sellerinfos";
                $orjoeecmnc = "sellerinfos";
                $ {
                    $ {
                        "GLOBALS"
                    }
                    ["eeicqs"]
                }
                [$ {
                    $ {
                        "GLOBALS"
                    }
                    ["usxshxp"]
                }
                ]["seller_logo_url"] = SellerInfo::get_seller_logo_url_static_sellers($ {
                    $orjoeecmnc
                }
                [$ {
                    $ {
                        "GLOBALS"
                    }
                    ["usxshxp"]
                }
                ]["id_sellerinfo"]);
            }
            return $ {
                $ {
                    "GLOBALS"
                }
                ["ajztkmhlf"]
            };
        }
    }
?>