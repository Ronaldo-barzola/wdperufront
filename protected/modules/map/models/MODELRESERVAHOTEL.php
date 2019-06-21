<?php

/**
 * This is the model class for table "RESERVA_HOTEL".
 *
 * The followings are the available columns in table 'RESERVA_HOTEL':
 * @property integer $ID_RESERVA
 * @property integer $ID_HOTEL
 * @property integer $ID_PERSONA
 * @property string $FECHA_RESERVA
 * @property integer $TIPO_HABITACION
 * @property string $NOMBRES_PERSONA
 * @property string $APELLIDO_PATERNO_PERSONA
 * @property string $APELLIDO_MATERNO_PERSONA
 * @property integer $ESTADO_RESERVA
 * @property integer $TIPO_DOCUMENTO_PERSONA
 * @property string $NUMERO_DOCUMENTO_PERSONA
 * @property string $FECHA_REGISTRO
 */
class MODELRESERVAHOTEL extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'RESERVA_HOTEL';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_HOTEL, TIPO_HABITACION', 'required'),
			array('ID_HOTEL, ID_PERSONA, TIPO_HABITACION, ESTADO_RESERVA, TIPO_DOCUMENTO_PERSONA', 'numerical', 'integerOnly'=>true),
			array('NOMBRES_PERSONA, APELLIDO_PATERNO_PERSONA, APELLIDO_MATERNO_PERSONA, NUMERO_DOCUMENTO_PERSONA', 'length', 'max'=>255),
			array('FECHA_RESERVA, FECHA_REGISTRO', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_RESERVA, ID_HOTEL, ID_PERSONA, FECHA_RESERVA, TIPO_HABITACION, NOMBRES_PERSONA, APELLIDO_PATERNO_PERSONA, APELLIDO_MATERNO_PERSONA, ESTADO_RESERVA, TIPO_DOCUMENTO_PERSONA, NUMERO_DOCUMENTO_PERSONA, FECHA_REGISTRO', 'safe', 'on'=>'search'),
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
			'ID_RESERVA' => 'Id Reserva',
			'ID_HOTEL' => 'Id Hotel',
			'ID_PERSONA' => 'Id Persona',
			'FECHA_RESERVA' => 'Fecha Reserva',
			'TIPO_HABITACION' => 'Tipo Habitacion',
			'NOMBRES_PERSONA' => 'Nombres Persona',
			'APELLIDO_PATERNO_PERSONA' => 'Apellido Paterno Persona',
			'APELLIDO_MATERNO_PERSONA' => 'Apellido Materno Persona',
			'ESTADO_RESERVA' => 'Estado Reserva',
			'TIPO_DOCUMENTO_PERSONA' => 'Tipo Documento Persona',
			'NUMERO_DOCUMENTO_PERSONA' => 'Numero Documento Persona',
			'FECHA_REGISTRO' => 'Fecha Registro',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_RESERVA',$this->ID_RESERVA);
		$criteria->compare('ID_HOTEL',$this->ID_HOTEL);
		$criteria->compare('ID_PERSONA',$this->ID_PERSONA);
		$criteria->compare('FECHA_RESERVA',$this->FECHA_RESERVA,true);
		$criteria->compare('TIPO_HABITACION',$this->TIPO_HABITACION);
		$criteria->compare('NOMBRES_PERSONA',$this->NOMBRES_PERSONA,true);
		$criteria->compare('APELLIDO_PATERNO_PERSONA',$this->APELLIDO_PATERNO_PERSONA,true);
		$criteria->compare('APELLIDO_MATERNO_PERSONA',$this->APELLIDO_MATERNO_PERSONA,true);
		$criteria->compare('ESTADO_RESERVA',$this->ESTADO_RESERVA);
		$criteria->compare('TIPO_DOCUMENTO_PERSONA',$this->TIPO_DOCUMENTO_PERSONA);
		$criteria->compare('NUMERO_DOCUMENTO_PERSONA',$this->NUMERO_DOCUMENTO_PERSONA,true);
		$criteria->compare('FECHA_REGISTRO',$this->FECHA_REGISTRO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MODELRESERVAHOTEL the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
