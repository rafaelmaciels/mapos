<?php

class Migration_add_desconto_produtos_os extends CI_Migration
{
    public function up()
    {
        $this->db->query('ALTER TABLE `produtos_os` ADD `tipo_desconto` VARCHAR(8) NULL DEFAULT NULL');
        $this->db->query('ALTER TABLE `produtos_os` ADD `desconto` DECIMAL(10, 2) NULL DEFAULT 0.00');
        $this->db->query('ALTER TABLE `produtos_os` ADD `valor_desconto` DECIMAL(10, 2) NULL DEFAULT 0.00');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE `produtos_os` DROP `tipo_desconto`');
        $this->db->query('ALTER TABLE `produtos_os` DROP `desconto`');
        $this->db->query('ALTER TABLE `produtos_os` DROP `valor_desconto`');
    }
}
