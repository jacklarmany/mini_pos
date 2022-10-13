<?php

use yii\db\Migration;

class m220714_095609_create_table_pdv extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%pdv}}',
            [
                'p_code' => $this->string(),
                'p_lao' => $this->string(),
                'p_en' => $this->string(),
                'd_code' => $this->string(),
                'd_lao' => $this->string(),
                'd_en' => $this->string(),
                'v_code' => $this->string(),
                'v_lao' => $this->string(),
                'v_en' => $this->string(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%pdv}}');
    }
}
