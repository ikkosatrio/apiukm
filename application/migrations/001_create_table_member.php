<?php

class Migration_Create_table_member extends CI_Migration {

	public function up()
	{
        $this->dbforge->add_field([
            'id'			=> [
                'type'			=> 'int',
                'auto_increment'=>	true
            ],
            'id_store'			=> [
                'type'			=> 'int',
            ],
            'Name'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Phone'		=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Email'		=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Username'		=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Password'		=>	[
                'type'			=>	'text',
            ],
            'Gender'			=>	[
                'type'			=>	'ENUM("FEMALE", "MALE","UNKNOW")',
                'default'		=>	'UNKNOW'
            ],
            'DateOfBirth'			=>	[
                'type'			=>	'DATE',
            ],
            'CodeActivation'	=>	[
                'type'			=>	'text',
            ],
            'Status'	=>	[
                'type'			=>	'ENUM("AKTIF", "NON-AFTIF")',
                'default'		=>	'NON-AFTIF'
            ],
            'created_at'	=> [
                'type'			=>	'TIMESTAMP',
            ],
            'updated_at'	=> [
                'type'			=>	'TIMESTAMP',
            ]

        ]);

		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('Member');
	}

	public function down()
	{
		$this->dbforge->drop_table('Member');
	}
}