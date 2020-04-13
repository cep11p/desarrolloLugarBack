<?php

use yii\db\Migration;

/**
 * Class m200413_044014_comision
 */
class m200413_044014_comision extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'comision_fomento';
        $this->createTable($table, [
            'id'=>$this->primaryKey(),
            'nombre'=> $this->string(250)->notNull(),
        ]);
        
        $this->insert($table, ['nombre'=>'Aguada Cecilio']);
        $this->insert($table, ['nombre'=>'Aguada de Guerra']);
        $this->insert($table, ['nombre'=>'Aguada Guzmán']);
        $this->insert($table, ['nombre'=>'Arroyo de La Ventana']);
        $this->insert($table, ['nombre'=>'Arroyo Los Berros']);
        $this->insert($table, ['nombre'=>'Cerro Policía']);
        $this->insert($table, ['nombre'=>'Chelforó']);
        $this->insert($table, ['nombre'=>'Chipauquil']);
        $this->insert($table, ['nombre'=>'Clemente Onelli']);
        $this->insert($table, ['nombre'=>'Colán Conhue']);
        $this->insert($table, ['nombre'=>'Comicó']);
        $this->insert($table, ['nombre'=>'Cona Niyeu']);
        $this->insert($table, ['nombre'=>'Cubanea']);
        $this->insert($table, ['nombre'=>'El Caín']);
        $this->insert($table, ['nombre'=>'El Cuy']);
        $this->insert($table, ['nombre'=>'El Manso']);
        $this->insert($table, ['nombre'=>'Guardia Mitre']);
        $this->insert($table, ['nombre'=>'Laguna Blanca']);
        $this->insert($table, ['nombre'=>'Mamuel Choique']);
        $this->insert($table, ['nombre'=>'Mencué']);
        $this->insert($table, ['nombre'=>'Ministro Ramos Mexía']);
        $this->insert($table, ['nombre'=>'Nahuel Niyeu']);
        $this->insert($table, ['nombre'=>'Naupa Huen']);
        $this->insert($table, ['nombre'=>'Ñorquincó']);
        $this->insert($table, ['nombre'=>'Ojos de Agua']);
        $this->insert($table, ['nombre'=>'Paso Flores']);
        $this->insert($table, ['nombre'=>'Peñas Blancas']);
        $this->insert($table, ['nombre'=>'Pichi Mahuida']);
        $this->insert($table, ['nombre'=>'Pilquiniyeu']);
        $this->insert($table, ['nombre'=>'Pilquiniyeu del Limay']);
        $this->insert($table, ['nombre'=>'Prahuaniyeu']);
        $this->insert($table, ['nombre'=>'Rincón Treneta']);
        $this->insert($table, ['nombre'=>'Río Chico']);
        $this->insert($table, ['nombre'=>'San Javier']);
        $this->insert($table, ['nombre'=>'Sierra Pailemán']);
        $this->insert($table, ['nombre'=>'Valle Azul']);
        $this->insert($table, ['nombre'=>'Villa Llanquín']);
        $this->insert($table, ['nombre'=>'Villa Mascardi']);
        $this->insert($table, ['nombre'=>'Yaminué']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200413_044014_comision cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200413_044014_comision cannot be reverted.\n";

        return false;
    }
    */
}
