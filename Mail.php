<?php

namespace idfly\mailerBridge;

use yii\helpers\ArrayHelper;

class Mail
{

    public $useFileTransport = false;

    public function create()
    {
        return $this->_getMailerInstance();
    }

    public function send($text, $options)
    {
        $mailer = $this->_getMailerInstance();

        $message = $mailer->compose();

        $from = ArrayHelper::getValue($options, 'from', 'from');
        $to = ArrayHelper::getValue($options, 'to', 'to');
        $subject = ArrayHelper::getValue($options, 'subject', 'subject');
        $type = ArrayHelper::getValue($options, 'type', 'html');

        if($type === 'html') {
            $message->setHtmlBody($text);
        } elseif($type === 'text') {
            $message->setTextBody($text);
        }

        $message->
            setFrom($from)->
            setTo($to)->
            setSubject($subject);

        return $mailer->send($message);
    }

    protected function _getMailerInstance()
    {
        $mailer = new \yii\swiftmailer\Mailer;
        $mailer->useFileTransport = $this->useFileTransport;
        return $mailer;
    }
}
