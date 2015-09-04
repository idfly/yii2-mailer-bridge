# yii2-mailer-bridge

Description
========

The module for yii2 which allows mail sending. Work up to swiftmail.

## Set

1. To the project file `composer.json` add to the `require` section:

      `"idfly/yii2-shell-task-ui": "dev-master"`

2. To the `repositories` section:
      ```
      {
           "type": "git",
           "url": "git@bitbucket.org:idfly/yii2-shell-task-ui.git"
      }
      ```

3. Run `composer update`

4. Place to the project's configuration file:

```
$config['components']['mail'] = [
    'class' => 'idfly\mailerBridge\Mail',
    'mailerFrom' => 'noreply@yoursite.com',
    'useFileTransport' => false,
];
```

Usage
=============

Call the function `send()` of mail-component. Set the mail-text as a first 
argument, the second argument is options array.

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
