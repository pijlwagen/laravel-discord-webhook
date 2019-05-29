<?php

namespace Michel3951\DiscordWebhook;

use DateTime;
use Exception;

class Embed
{
    /*
     * Initiate Discord embed object
     */
    public function __construct()
    {
        $this->title = null;
        $this->type = 'rich';
        $this->description = null;
        $this->url = null;
        $this->timestamp = null;
        $this->color = 0;
        $this->footer = null;
        $this->thumbnail = null;
        $this->timestamp = null;
        $this->author = null;
        $this->fields = [];
    }

    /*
     * Adds a field to the embed
     *
     * @param string $title
     * @param string $value
     * @param boolean $inline
     * @exception \Exception
     * @return Michel3951\DiscordWebhook\Embed
     */
    public function addField($title, $value, $inline = false)
    {
        if (strlen($title) > 256) throw new Exception('Embed field title cannot be longer then 256 characters.');
        if (strlen($value) > 1024) throw new Exception('Embed field value cannot be longer then 1024 characters.');
        array_push($this->fields, ["name" => $title, "value" => $value, "inline" => $inline]);
        return $this;
    }

    /*
     * Sets the embed title
     *
     * @param string $text
     * @exception \Exception
     * @return Michel3951\DiscordWebhook\Embed
     */

    public function setTitle($text)
    {
        if (strlen($text) > 256) throw new Exception('Embed title cannot be longer then 256 characters.');
        $this->title = $text;
        return $this;
    }

    /*
     * Sets the embed thumbnail
     *
     * @param string $url
     * @return Michel3951\DiscordWebhook\Embed
     */

    public function setThumbnail($url)
    {
        $this->thumbnail = $url;
        return $this;
    }

    /*
     * Sets the embed image
     *
     * @param string $url
     * @return Michel3951\DiscordWebhook\Embed
     */

    public function setImage($url)
    {
        $this->image = $url;
        return $this;
    }

    /*
     * Sets the embed color
     *
     * @param integer $decimal
     * @exception \Exception
     * @return Michel3951\DiscordWebhook\Embed
     */

    public function setColor($decimal)
    {
        if (gettype($decimal) !== 'integer') throw new Exception('Color must be an integer.');
        $this->color = $decimal;
        return $this;
    }

    /*
     * Sets the embed author
     * @param string $name
     * @param string $iconURL
     * @exception \Exception
     * @return Michel3951\DiscordWebhook\Embed
     */

    public function setAuthor($name, $iconURL = null)
    {
        if (strlen($name) > 256) throw new Exception('Author name cannot be longer then 256 characters.');
        $this->author = ["name" => $name, "icon_url", $iconURL];
        return $this;
    }

    /*
     * Sets the embed description
     *
     * @param string $value
     * @exception \Exception
     * @return Michel3951\DiscordWebhook\Embed
     */

    public function setDescription($value)
    {
        if (strlen($value) > 2048) throw new Exception('Description cannot be longer then 2048 characters.');
        $this->description = $value;
        return $this;
    }

    /*
     * Sets the embed title URL
     *
     * @param string $url
     * @return Michel3951\DiscordWebhook\Embed
     */

    public function setURL($url)
    {
        $this->url = $url;
        return $this;
    }

    /*
     * Sets the embed timestamp
     *
     * @param ISO8601 $date
     * @return Michel3951\DiscordWebhook\Embed
     */

    public function setTimestamp($date = false)
    {
        if (!$date) $date = date(DateTime::ISO8601, time());
        $this->timestamp = $date;
        return $this;
    }

    /*
     * Sets the embed footer text
     *
     * @param string $value
     * @param string $iconURL
     * @exception \Exception
     * @return Michel3951\DiscordWebhook\Embed
     */

    public function setFooter($value, $iconURL = null)
    {
        if (strlen($value) > 2048) throw new Exception('Footer text cannot be longer then 2048 characters.');
        $this->footer = ["text" => $value, "icon_url" => $iconURL];
        return $this;
    }

    /*
     * Check if the embed has more then 25 fields
     *
     * @exception \Exception
     */

    public function __destruct()
    {
        if (count($this->fields) > 25) {
            throw new Exception('Embed cannot have more then 25 fields.');
        }
    }
}