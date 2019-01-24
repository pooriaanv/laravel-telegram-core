<?php

namespace TelegramCore\LaravelTelegramCore;

class LaravelTelegramCore
{

    /**
     *    Variables that contents information of received  message from user
     */
    private $token;
    private $chat_id;
    private $message_id;
    private $user_name;
    private $first_name;
    public $text;


    /**
     * Get json from php input and Sets $updates
     *
     * Sets $chat_id , $username , $first_name , $text from given array
     *
     * @param array $data
     */
    public function __construct(Array $data)
    {
        $this->token = config('laraveltelegramcore.token');

        $this->message_id = $data['message']['message_id'];
        $this->chat_id = $data['message']['from']['id'];
        $this->first_name = $data['message']['from']['first_name'];
        $this->user_name = $data['message']['from']['username'];
        $this->text = $data['message']['text'];
    }

    /**
     * Get every variable from class
     *
     * @param string $variable name of variable that we will get
     * @return string requested variable
     */
    public function __get($variable)
    {
        return $this->$variable;
    }

    /**
     * Method to send message to user
     *
     * @param string $message a string to be sent to user
     * @param string $chat_id
     * @param array $keyboard a keyboard to be sent to user
     * @param string $parse pares type Html/Markdown
     * @return void
     */
    public function sendMessage($message, $chat_id = "", $keyboard = [], $parse = "")
    {
        $reply_markup = "";
        if (!empty($keyboard)) {
            $reply_markup = "&reply_markup=" . json_encode($keyboard);
        }
        if (!empty($chat_id)) {
            $this->chat_id = $chat_id;
        }
        $url = "https://api.telegram.org/bot" . $this->token . "/sendMessage?chat_id=" . $this->chat_id . "&text=" .
            $message . $reply_markup . "&parse_mode=" . $parse;
        file_get_contents($url);
    }

    /**
     * @param string $photo url/telegram file id
     * @param string $message
     * @param string $chat_id
     * @param array $keyboard
     * @param string $parse
     */
    public function sendPhoto($photo, $message = "", $chat_id = "", $keyboard = [], $parse = "")
    {
        $reply_markup = "";
        if (!empty($keyboard)) {
            $reply_markup = "&reply_markup=" . json_encode($keyboard);
        }

        if (!empty($chat_id)) {
            $this->chat_id = $chat_id;
        }
        $url = "https://api.telegram.org/bot" . $this->token . "/sendPhoto?chat_id=" . $this->chat_id . "&photo=" .
            $photo . "&caption=" . $message . $reply_markup . "&parse_mode=" . $parse;
        file_get_contents($url);
    }

}