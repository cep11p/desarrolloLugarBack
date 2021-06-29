<?php

use yii\db\Migration;

/**
 * Class m210629_160514_alter_localidad
 */
class m210629_160514_alter_localidad extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('localidad', 'nombre', $this->string(200)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210629_160514_alter_localidad cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210629_160514_alter_localidad cannot be reverted.\n";

        return false;
    }
    */
}
