<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $tel;
    public $address;
    public $checkMail = true ;
    public $body;
//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'tel', 'address', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom(["xinyeweb@163.com"])
                ->setSubject($this->name . "xinyeweb Contact")
                ->setTextBody($this->name.'<br>'.$this->email.'<br>'.$this->tel.'<br>'.$this->address.'<br>'.$this->body)
                ->setHtmlBody($this->name.'<br>'.$this->email.'<br>'.$this->tel.'<br>'.$this->address.'<br>'.$this->body)
                ->send();
            return true;
        } else {
            return false;
        }
    }
}
