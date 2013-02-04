<?php

class Admin extends User
{
	public function defaultScope(){
		 return array(
			   'condition'=>'role = "admin"',
				  );
	}
}

