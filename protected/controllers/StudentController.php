<?php

class StudentController extends UserController
{
	protected $class_name = 'Student';
	protected $lower_case_class_name = 'student';
	protected $plural_class_name = 'Students';
	protected $form_name = 'student-form';
	protected $gather_personal_information = Student::GATHER_PERSONAL_INFORMATION;
}
