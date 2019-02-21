<?php

class Migration_Create_table_slide extends CI_Migration {

	public function up()
	{
        $this->dbforge->add_field([
            'id'			=> [
                'type'			=> 'int',
                'auto_increment'=>	true
            ],
            'Title'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Description'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Image'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'created_at'	=> [
                'type'			=>	'TIMESTAMP',
            ],
            'updated_at'	=> [
                'type'			=>	'TIMESTAMP',
            ]

        ]);

		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('Slide');
	}

	public function down()
	{
		$this->dbforge->drop_table('Slide');
	}
}