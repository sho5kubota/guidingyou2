<?php


class State extends StateCore {

	/**
	 * Get a state id with its name
	 *
	 * @param string $id_state Country ID
	 * @return integer state id
	 */
	public static function getIdByNameLike($state)
	{
		$sql = '
		SELECT `id_state`
		FROM `'._DB_PREFIX_.'state`
		WHERE `name` LIKE \''.pSQL($state).'%\'';

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

		$ids_loc = array();
		foreach ($result as $key => $value) {
			$ids_loc[] = $value['id_state'];
		}

		return $ids_loc;

	}
	
}

