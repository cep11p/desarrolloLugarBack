<?php

use yii\db\Migration;

/**
 * Class m210625_133150_table_localidad_extra
 */
class m210625_133150_table_localidad_extra extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'localidad_extra';
        $this->createTable($table, ['localidadid' => $this->integer()->notNull()]);

        $this->addForeignKey('fk_localidad_extra', $table, 'localidadid', 'localidad', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210625_133150_table_localidad_extra cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210625_133150_table_localidad_extra cannot be reverted.\n";

        return false;
    }
    */
}
