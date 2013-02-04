<?php

class Teacher extends User
{
	public function defaultScope(){
		 return array(
			   'condition'=>'role = "teacher"',
				  );
	}
}

