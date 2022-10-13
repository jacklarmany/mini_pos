<?php

use yii\db\Migration;

class m220107_074942_create_table_mineral extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%mineral}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'name' => $this->string()->notNull()->comment('ຊື່ແຮ່ທາດ/ຊື່ບໍແຮ່'),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%mineral}}');
    }
}
