<?php

use yii\db\Migration;

/**
 * Class m200412_031734_delegacion
 */
class m200412_031734_delegacion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'delegacion';
        $this->createTable($table, [
            'id'=>$this->primaryKey(),
            'nombre'=> $this->string(250)->notNull(),
        ]);
        
        $this->insert($table, ['id'=>20,'nombre'=>'Delegación Zona Alto Valle Oeste']);
        $this->insert($table, ['id'=>21,'nombre'=>'Delegación Zona Valle Inferior']);
        $this->insert($table, ['id'=>22,'nombre'=>'Delegación Zona Alto Valle Centro']);
        $this->insert($table, ['id'=>23,'nombre'=>'Delegación Zona Alto Valle Este']);
        $this->insert($table, ['id'=>24,'nombre'=>'Delegación Zona Valle Medio']);
        $this->insert($table, ['id'=>25,'nombre'=>'Delegación Zona Andina']);
        $this->insert($table, ['id'=>26,'nombre'=>'Delegación Zona Sur']);
        $this->insert($table, ['id'=>27,'nombre'=>'Delegación Zona Atlantica']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200412_031734_delegacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200412_031734_delegacion cannot be reverted.\n";

        return false;
    }
    */
}
