CREATE TABLE IF NOT EXISTS `PREFIX_agilepaypal_txn` (
      `id_agilepaypal_txn` bigint(11) AUTO_INCREMENT NOT NULL,
      `id_cart` bigint(11) NULL,
      `id_order` bigint(11) NULL,
      `paypal_txn` varchar(256) NULL,
      `subscr_id` varchar(256) NULL,
      `remark` varchar(1024) NULL,
      `date_add` datetime NOT NULL,
      PRIMARY KEY (`id_agilepaypal_txn`)
    ) DEFAULT CHARSET=utf8;
