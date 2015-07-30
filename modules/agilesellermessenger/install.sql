CREATE TABLE IF NOT EXISTS `PREFIX_agile_sellermessage` (
      `id_agile_sellermessage` bigint(11) AUTO_INCREMENT NOT NULL,
      `id_seller` bigint(11) NULL,
      `id_product` bigint(11) NULL,
      `id_order` bigint(11) NULL,
      `id_customer` bigint(11) NULL,
      `id_lang` bigint(11) NULL,
      `ip_address` varchar(256) NULL,
      `from_email` varchar(256) NULL,
      `from_name` text NULL,
      `subject` varchar(256) NULL,
      `message` text NULL,
      `is_customer_message` tinyint NULL,
      `active` tinyint NULL,
      `date_add` datetime NULL,
      PRIMARY KEY (`id_agile_sellermessage`)
    ) DEFAULT CHARSET=utf8;