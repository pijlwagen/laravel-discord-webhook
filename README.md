# laravel-discord-webhook
Send embeds &amp; messages to discord webhooks
### Examples
Webhook with embed
```php
use Michel3951\DiscordWebhook\Embed;
use Michel3951\DiscordWebhook\Webhook;

$embed = new Embed();
$embed->addField('I am a field title, i can be up to 256 characters long', 'I am the field content, i can be up to 1024 characters long');
$embed->addField('The limit of fields is 25', 'plenty fields to use.', true); //Inlined field
$embed->setDescription('The description can be up to 2048 characters long');
$embed->setFooter('and the footer up to 2048 characters long');

$hook = new Webhook('Webhook ID', 'Webhook token');
$hook->setEmbed($embed);
$hook->send();
```

Webhook with custom avatar & username
```php
use Michel3951\DiscordWebhook\Webhook;

$hook = new Webhook('Webhook ID', 'Webhook token');
$hook->setText('Text messages can be up to 2000 characters');
$hook->setAvatar('https://example.com/my-image.jpg'); //Only URLs are supported.
$hook->setUsername('Min 2, Max 32 characters');
$hook->send();
```
