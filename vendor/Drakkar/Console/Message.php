<?php
namespace Console;

class Message{
    /**
     * add some color on message by status
     * @param type $message
     * @param type $status
     * @return type
     */
    protected static function decorateMessage($message, $status){
        switch($status){
            case "help":
                $out="[0m";
                break;
            case 1:
                $out = "[42m";
                break;
            case 0:
                $out = "[41m";
                break;
            default:
                $out="[0m";
        }
        return "\033$out$message\033[0m\n";
    }
    
    /**
     * display message on console
     * @param type $message
     * @param type $status
     */
    public static function renderMessage($message, $status){
        echo "\n" . self::decorateMessage($message, $status);
    }
}