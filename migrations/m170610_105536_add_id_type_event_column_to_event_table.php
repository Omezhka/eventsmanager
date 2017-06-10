<?php

use yii\db\Migration;

/**
 * Handles adding id_type_event to table `event`.
 * Has foreign keys to the tables:
 *
 * - `type_event`
 */
class m170610_105536_add_id_type_event_column_to_event_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('event', 'id_type_event', $this->integer()->notNull());

        // creates index for column `id_type_event`
        $this->createIndex(
            'idx-event-id_type_event',
            'event',
            'id_type_event'
        );

        // add foreign key for table `type_event`
        $this->addForeignKey(
            'fk-event-id_type_event',
            'event',
            'id_type_event',
            'type_event',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `type_event`
        $this->dropForeignKey(
            'fk-event-id_type_event',
            'event'
        );

        // drops index for column `id_type_event`
        $this->dropIndex(
            'idx-event-id_type_event',
            'event'
        );

        $this->dropColumn('event', 'id_type_event');
    }
}
