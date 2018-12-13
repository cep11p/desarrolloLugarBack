<?php

use yii\db\Migration;

/**
 * Handles adding entre_calle_1_column_entre_calle_2 to table `lugar`.
 */
class m181213_141839_add_entre_calle_1_column_entre_calle_2_column_to_lugar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('lugar', 'entre_calle_1', $this->string(200));
        $this->addColumn('lugar', 'entre_calle_2', $this->string(200));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('lugar', 'entre_calle_1');
        $this->dropColumn('lugar', 'entre_calle_2');
    }
}
