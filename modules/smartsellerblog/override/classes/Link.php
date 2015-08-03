<?php

class Link extends LinkCore {

	public function getPaginationLink2($type, $id_object, $nb = false, $sort = false, $pagination = false, $array = false) {
		return '';
	}

	public function getTest() {
		return 'HAHA!';;
	}

	public function goPage2($url, $p)
	{
		$url = rtrim(str_replace('?&', '?', $url), '?');
		return $url.($p == 1 ? '?p=1' : (!strstr($url, '?') ? '?' : '&').'p='.(int)$p);
	}

}