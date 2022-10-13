<?php

use yii\db\Migration;

class m220714_095629_create_table_study_item extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%study_item}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'item_name' => $this->string(100)->notNull()->comment('Item'),
                'sector_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table sector'),
                'area_completed' => $this->decimal()->comment('Area completed'),
                'area_increased' => $this->decimal()->comment('Area increased'),
                'area_returned' => $this->decimal()->comment('Area returned'),
                'the_date' => $this->date()->comment('Returned Date or Approval/Certified Date'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%study_item}}');
    }
}
