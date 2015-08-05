<?php

namespace idfly\mailerBridge;

use yii\helpers\ArrayHelper;

class Mail
{

    public $useFileTransport = false;

    public $mailerFrom = '';

    public function create()
    {
        $mailer = new \yii\swiftmailer\Mailer;
        $mailer->useFileTransport = $this->useFileTransport;
        return $mailer;
    }

    public function send($text, $options)
    {
        $mailer = $this->create();

        $message = $mailer->compose();

        $from = ArrayHelper::getValue($options, 'from', $this->mailerFrom);
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
}
