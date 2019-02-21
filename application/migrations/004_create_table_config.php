<?php

class Migration_Create_table_config extends CI_Migration {

	public function up()
	{
        $this->dbforge->add_field([
            'id'			=> [
                'type'			=> 'int',
                'auto_increment'=>	true
            ],
            'Name'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Email'			=> [
                'type'			=> 'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Mobile'			=> [
                'type'			=> 'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Phone'			=> [
                'type'			=> 'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Address'			=> [
                'type'			=> 'Text',
            ],
            'Description'			=> [
                'type'			=> 'Text',
            ],
            'Icon'			=> [
                'type'			=> 'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Logo'			=> [
                'type'			=> 'VARCHAR',
                'constraint'	=>	'255'
            ],
            'MetaDeskripsi'			=> [
                'type'			=> 'Text',
            ],
            'MetaKeyword'			=> [
                'type'			=> 'Text',
            ],
            'created_at'	=> [
                'type'			=>	'TIMESTAMP',
            ],
            'updated_at'	=> [
                'type'			=>	'TIMESTAMP',
            ]

        ]);

		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('Config');
	}

	public function down()
	{
		$this->dbforge->drop_table('Config');
	}
}