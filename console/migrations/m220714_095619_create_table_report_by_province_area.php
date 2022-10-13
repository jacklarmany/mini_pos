<?php

use yii\db\Migration;

class m220714_095619_create_table_report_by_province_area extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%report_by_province_area}}',
            [
                'id' => $this->integer()->notNull()->defaultValue('0')->comment('Primary key of table is auto increment'),
                'province_name_la' => $this->string()->notNull()->comment('Province name'),
                'province_name_en' => $this->string()->comment('Province name translate'),
                'agriculture' => $this->double(),
                'mining' => $this->double(),
                'hydro' => $this->double(),
                'concession' => $this->double(),
                'ppp' => $this->double(),
                'control_list' => $this->double(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%report_by_province_area}}');
    }
}
