<?php

class Migration_Create_table_product extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'int',
                'auto_increment' => true
            ],
            'id_store' => [
                'type' => 'int',
            ],
            'id_category' => [
                'type' => 'int',
            ],
            'Title' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'Description'			=> [
                'type'			=>	'Text',
            ],
            'Price' => [
                'type' => 'Double',
            ],
            'PriceDiscount' => [
                'type' => 'Double',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
            ]

        ]);

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('Product');
    }

    public function down()
    {
        $this->dbforge->drop_table('Product');
    }
}