<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $role
 * @property string $password_hash
 */
class User extends CActiveRecord
{
	public $password;
	public $password_repeat;

	public $first_name;
	public $last_name;
	public $address;
	public $city;
	public $state;
	public $zip;

	public function lookupPersonalInformation()
	{
		$personal_information = PersonalInformation::model()->findByAttributes(array('user_id' => $this->id));
		if ($personal_information)
		{
			$this->first_name = $personal_information->first_name;
			$this->last_name = $personal_information->last_name;
			$this->address = $personal_information->address;
			$this->city = $personal_information->city;
			$this->state = $personal_information->state;
			$this->zip = $personal_information->zip;
		}
	}
	public function savePersonalInformation()
	{
		if ( ($this->first_name == '') and ($this->last_name == '') and ($this->city == '') and ($this->state == '') and ($this->zip == '') and ($this->address == '') ) 
		{
			return true;
		}
		$personal_information = PersonalInformation::model()->findByAttributes(array('user_id' => $this->id));
		if (!$personal_information)
		{
			$personal_information = new PersonalInformation;
		}
		$personal_information->user_id = $this->id;
		$personal_information->first_name = $this->first_name;
		$personal_information->last_name = $this->last_name;
		$personal_information->address = $this->address;
		$personal_information->city = $this->city;
		$personal_information->state = $this->state;
		$personal_information->zip = $this->zip;

		return $personal_information->save();
	}

	public function savePasswordInformation()
	{
		if ($this->password != $this->password_repeat) { return false; }
		if ($this->password != '')
		{
			$bcrypt = new Bcrypt(8);
			$this->password_hash = $bcrypt->hash($this->password);
			$this->password = '';
			$this->password_repeat = '';
		}
		elseif ($this->password_hash == null)
		{
			return false;
		}
		return true;
	}

	public function save()
	{
		if (!$this->savePasswordInformation()) { return false;	}
		if (parent::save())
		{
			if (!$this->savePersonalInformation()) { return false;	}
			return true;
		}
		return false;
	}

	public function authenticate($password)
	{
		$bcrypt = new Bcrypt(8);
		return $bcrypt->verify($password, $this->password_hash);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'length', 'max'=>100),
			array('role', 'length', 'max'=>10),
			array('password', 'length', 'max'=>100),
			array('password_repeat', 'compare', 'compareAttribute' => 'password'),

			array('first_name', 'length', 'max'=>60),
			array('last_name', 'length', 'max'=>60),
			array('address', 'length', 'max'=>60),
			array('city', 'length', 'max'=>60),
			array('state', 'length', 'max'=>2),
			array('zip', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, role', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'role' => 'Role',
			'password' => 'Password',
			'password_repeat' => 'Confirm Password',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('role',$this->role,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
