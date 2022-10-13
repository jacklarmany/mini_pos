<?php

use yii\db\Migration;

class m220714_095618_create_table_report_by_country extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%report_by_country}}',
            [
                'nb_project' => $this->decimal(42, 0),
                'country_id' => $this->integer()->comment('Country ID is foreign keys form relation table country'),
                'country_name_la' => $this->string()->comment('Country name'),
                'country_name_en' => $this->string()->comment('Country name translate'),
                'agriculture' => $this->decimal(42, 0),
                'mining' => $this->decimal(42, 0),
                'hydro' => $this->decimal(42, 0),
                'concession' => $this->decimal(42, 0),
                'ppp' => $this->decimal(42, 0),
                'total_capital' => $this->double(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%report_by_country}}');
    }
}
