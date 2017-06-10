<?php

use yii\db\Migration;

class m170609_142808_create_table_type_event extends Migration
{
    public function up()
    {
        $this->createTable('type_event', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->integer(),
        ]);
    }

    public function down()
    {
        echo "m170609_142808_create_table_type_event cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
