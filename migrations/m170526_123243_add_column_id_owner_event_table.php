<?php

use yii\db\Migration;

class m170526_123243_add_column_id_owner_event_table extends Migration
{
    public function up()
    {
        $this -> addColumn ( 'event',
            'id_owner', 
           ' integer(11)'
        );

    }

    public function down()
    {
        echo "m170526_123243_add_column_id_owner_event_table cannot be reverted.\n";

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
