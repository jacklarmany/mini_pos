<?php

use yii\db\Migration;

class m220714_095613_create_table_ppp_model_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%ppp_model_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->comment('Language code'),
                'name' => $this->string()->notNull()->comment('Name translate'),
                'ppp_model_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table ppp model'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_ppp_model_translate_ppp_model1_idx', '{{%ppp_model_translate}}', ['ppp_model_id']);

        $this->addForeignKey(
            'fk_ppp_model_translate_ppp_model1',
            '{{%ppp_model_translate}}',
            ['ppp_model_id'],
            '{{%ppp_model}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%ppp_model_translate}}');
    }
}
