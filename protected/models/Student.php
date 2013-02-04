<?php

class Student extends User
{
	public function defaultScope(){
		 return array(
			   'condition'=>'role = "student"',
				  );
	}
}


