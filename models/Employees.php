<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone_number
 * @property string|null $hire_date
 * @property string|null $job_title
 * @property string|null $department
 */
class Employees extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number', 'hire_date', 'job_title', 'department'], 'default', 'value' => null],
            [['first_name', 'last_name', 'email'], 'required'],
            [['hire_date'], 'safe'],
            [['first_name', 'last_name', 'email', 'job_title', 'department'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 20],
            [['email'], 'unique'],
        ];
    }

    public function validateHireDate($attribute, $params, $validator)
    {
    if (!empty($this->$attribute) && strtotime($this->$attribute) > time()) 
        $this->addError($attribute, 'Hire date cannot be in the future.');
        }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'hire_date' => 'Hire Date',
            'job_title' => 'Job Title',
            'department' => 'Department',
        ];
    }

}
