<?php

namespace app\models;

use yii\db\ActiveRecord;

class Employee extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->job_title = strtolower($this->job_title);
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'hire_date'], 'required'], // Added 'hire_date' to required
            ['email', 'email'],
            ['email', 'unique'],
            [['phone_number'], 'string', 'max' => 20],
            [['hire_date'], 'date', 'format' => 'yyyy-mm-dd'], // Ensure correct date format
            ['hire_date', 'validateHireDate'], // Our custom validation rule
            [['job_title', 'department'], 'string', 'max' => 255],
        ];
    }

    public function validateHireDate($attribute, $params, $validator)
    {
        if (!empty($this->$attribute) && strtotime($this->$attribute) > time()) {
            $this->addError($attribute, 'Hire date cannot be in the future.');
        }
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