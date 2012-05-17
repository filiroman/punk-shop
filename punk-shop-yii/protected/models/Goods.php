<?php

/**
 * This is the model class for table "{{goods}}".
 *
 * The followings are the available columns in table '{{goods}}':
 * @property integer $id
 * @property integer $owner_id
 * @property string $date
 * @property integer $actual
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $type
 * @property integer $views
 *
 * The followings are the available model relations:
 * @property Categories $category
 * @property Users $owner
 * @property Images[] $images
 */
class Goods extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Goods the static model class
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
		return '{{goods}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, title, type, description', 'required'),
			array('category_id, price', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>45),
			//array('active', 'boolean'),
                        array('title, description' , 'safe'),
			array('description', 'length', 'max'=>256),			
			array('price', 'length', 'max'=>10),
			array('type', 'length', 'max'=>4),
			//array('image', 'file', 'types'=>'jpg, gif, png', 'maxSize' => 1048576),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('owner_id, date, actual, category_id, title, description, price, type', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
			'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
			'images' => array(self::HAS_MANY, 'Images', 'good_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'owner_id' => 'Владелец',
			'date' => 'Создан',
			'actual' => 'Актуальность',
			'category_id' => 'Категория',
			'title' => 'Заголовок',
			'description' => 'Описание',
			'price' => 'Цена',
			'type' => 'Тип',
			'views' => 'Просмотров',
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
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('actual',$this->actual);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('views',$this->views);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getUrl()
    {
        return Yii::app()->createUrl('goods/view', array(
            'id'=>$this->id,
        ));
    }
    /**
     * Перерегрузка метода авто сохранения нужной нам информации:
     * время, кто создал, актуальность
     * Если запись уже существует, то перезаписывается только время создания записи
     * @return boolean 
     */
	protected function beforeSave()
    {
        if(parent::beforeSave())
        {   
            if($this->isNewRecord)
            {   $this->actual=true;
                $this->date=date("YmdHis");
                $this->owner_id=Yii::app()->user->id;
            }
            else
                $this->date=date("YmdHis");
            return true;
        }
        else
            return false;
    }
}
