<?php

/**
 * This is the model class for table "Users".
 *
 * The followings are the available columns in table 'Users':
 * @property integer $id
 * @property string $name
 * @property string $pass
 * @property string $email
 * @property integer $phone
 * @property string $user_pic
 * @property string $perm_level
 * @property string $about
 *
 * The followings are the available model relations:
 * @property Goods[] $goods
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'Users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, pass, email, phone, perm_level', 'required'),
			array('phone', 'numerical', 'integerOnly'=>true),
			array('name, pass, email, user_pic, about', 'length', 'max'=>45),
			array('perm_level', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pass, email, phone, user_pic, perm_level, about', 'safe', 'on'=>'search'),
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
			'goods' => array(self::HAS_MANY, 'Goods', 'owner_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'pass' => 'Pass',
			'email' => 'Email',
			'phone' => 'Phone',
			'user_pic' => 'User Pic',
			'perm_level' => 'Perm Level',
			'about' => 'About',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('user_pic',$this->user_pic,true);
		$criteria->compare('perm_level',$this->perm_level,true);
		$criteria->compare('about',$this->about,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}