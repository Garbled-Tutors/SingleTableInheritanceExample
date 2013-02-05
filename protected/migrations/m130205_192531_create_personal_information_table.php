<?php

class m130205_192531_create_personal_information_table extends CDbMigration
{
	public function up()
	{
    $this->createTable('personal_information',
      array('id' => 'pk',
			'user_id' => 'int(11)',
			'first_name' => 'varchar(60)',
			'last_name' => 'varchar(60)',
			'address' => 'varchar(60)',
			'city' => 'varchar(60)',
			'state' => 'varchar(2)',
			'zip' => 'int(11)'));
		$this->addForeignKey('idxUserId', 'personal_information', 'user_id', 'user', 'id', 'CASCADE');
	}

	public function down()
	{
    $this->dropTable('personal_information');
	}
}
