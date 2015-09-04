# yii2-mailer-bridge

Описание
========

Модуль для yii2 для отправки писем. Работает поверх swiftmail.

## Установка

1. В проектный `composer.json` добавить в секцию `require`:

        "idfly/yii2-mailer-bridge": "dev-master",

2. В секцию `repositories`:

        {
            "type": "git",
            "url": "git@bitbucket.org:idfly/yii2-mailer-bridge.git"
        }

3. Выполнить `composer update`

4. Поместить в конфиг:

```
$config['components']['mail'] = [
    'class' => 'idfly\mailerBridge\Mail',
    'mailerFrom' => 'noreply@yoursite.com',
    'useFileTransport' => false,
];
```

Использование
=============

Вызвать функцию send у компонента mail. Передать первым аргументом
текст письма, вторым опции.

```
Yii::$app->mail->send(
    Yii::$app->view->render('@app/mail/case/recommend', [
        'case' => $this,
        'user' => $user,
    ]), [
        'to' => $recipientEmail,
        'subject' => $subject,
    ]
);
```
