<?php

use yii\db\Migration;

/**
 * Class m221210_060447_tabla_columna
 */
class m221210_060447_tabla_columna extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Columna', [
            'id' => $this->primaryKey(),
            'titulo' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'fecha' => $this->date()->notNull(),
            'texto' => $this->text()->notNull(),
            'columnista_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-columna-columnista_id',
            'Columna',
            'columnista_id',
            'Columnista',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-columna-columnista_id',
            'Columna',
        );

        $this->dropTable('Columna');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221210_060447_tabla_columna cannot be reverted.\n";

        return false;
    }
    */
}
