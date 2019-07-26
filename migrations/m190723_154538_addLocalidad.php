<?php

use yii\db\Migration;

/**
 * Class m190723_154538_addLocalidad
 */
class m190723_154538_addLocalidad extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'localidad';
        $this->insert($table, ['nombre'=>'Aguada de Guerra','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'Clemente Onelli','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'Colan Conhue','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'El Caín','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'Ingeniero Jacobacci','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'Corral Choique','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'Los Menucos','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'Llama Niyeo','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'Mina Santa Teresita','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'Pilquiniyeu','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'San Antonio del Cuy','departamentoid'=>399]);
        $this->insert($table, ['nombre'=>'Paraje Yuquiche','departamentoid'=>399]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190723_154538_addLocalidad cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190723_154538_addLocalidad cannot be reverted.\n";

        return false;
    }
    */
}
