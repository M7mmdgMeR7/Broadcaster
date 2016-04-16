<?php

/*
 * Broadcaster (v1.16) by EvolSoft
 * Developer: EvolSoft (Flavius12)
 * Website: http://www.evolsoft.tk
 * Date: 28/05/2015 01:23 PM (UTC)
 * Copyright & License: (C) 2014-2015 EvolSoft
 * Licensed under MIT (https://github.com/EvolSoft/Broadcaster/blob/master/LICENSE)
 */

namespace Broadcaster;

use pocketmine\Player;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
	
	//About Plugin Const
	const PRODUCER = "EvolSoft";
	const VERSION = "1.16";
	const MAIN_WEBSITE = "http://www.evolsoft.tk";
	//Other Const
	//Prefix
	const PREFIX = "&9[&eTag1b&b] ";
	
    public $cfg;
    
    public $task;

    public function translateColors($symbol, $message){
    
    	$message = str_replace($symbol."0", TextFormat::BLACK, $Tag);
    	$message = str_replace($symbol."1", TextFormat::DARK_BLUE, $tag);
    	$message = str_replace($symbol."2", TextFormat::DARK_GREEN, $tag);
    	$message = str_replace($symbol."3", TextFormat::DARK_AQUA, $Tag);
    	$message = str_replace($symbol."4", TextFormat::DARK_RED, $Tag);
    	$message = str_replace($symbol."5", TextFormat::DARK_PURPLE, $tag);
    	$message = str_replace($symbol."6", TextFormat::GOLD, $tag);
    	$message = str_replace($symbol."7", TextFormat::GRAY, $tag);
    	$message = str_replace($symbol."8", TextFormat::DARK_GRAY, $tag);
    	$message = str_replace($symbol."9", TextFormat::BLUE, $tag);
    	$message = str_replace($symbol."a", TextFormat::GREEN, $tag);
    	$message = str_replace($symbol."b", TextFormat::AQUA, $tag);
    	$message = str_replace($symbol."c", TextFormat::RED, $tag);
    	$message = str_replace($symbol."d", TextFormat::LIGHT_PURPLE, $tag);
    	$message = str_replace($symbol."e", TextFormat::YELLOW, $tag);
    	$message = str_replace($symbol."f", TextFormat::WHITE, $tag);
    
    	$message = str_replace($symbol."k", TextFormat::OBFUSCATED, $tag);
    	$message = str_replace($symbol."l", TextFormat::BOLD, $tag);
    	$message = str_replace($symbol."m", TextFormat::STRIKETHROUGH, $tag);
    	$message = str_replace($symbol."n", TextFormat::UNDERLINE, $tag);
    	$message = str_replace($symbol."o", TextFormat::ITALIC, $tag);
    	$message = str_replace($symbol."r", TextFormat::RESET, $tag);
    
    	return $tag;
    }
    
    public function onEnable(){
	    @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->cfg = $this->getConfig()->getAll();
        $this->getCommand("PluginByxdplugins")->setExecutor(new Commands\Commands($this));
        $this->getCommand("defTag")->setExecutor(new Commands\deftheTag($this));
        $this->getCommand("TAGBLOCK World z y x")->setExecutor(new Commands\Tagblock($this));
        $time = intval($this->cfg["time"]) * 20;
        $ptime = intval($this->cfg["popup-time"]) * 20;
        $this->task = $this->getServer()->getScheduler()->scheduleRepeatingTask(new Tasks\Task($this), $time);
        $this->ptask = $this->getServer()->getScheduler()->scheduleRepeatingTask(new Tasks\PopupTask($this), $ptime);
    }
    
	public function broadcast($conf, $message){
		$message = str_replace("{MAXPLAYERS}", $this->getServer()->getMaxPlayers(), $message);
		$message = str_replace("{TOTALPLAYERS}", count($this->getServer()->getOnlinePlayers()), $message);
		$message = str_replace("{PREFIX}", $conf["prefix"], $message);
		$message = str_replace("{SUFFIX}", $conf["suffix"], $message);
		$message = str_replace("{TIME}", date($conf["datetime-format"]), $message);
		return $message;
	}

	public function messagebyPlayer(Player $player, $conf, $message){
	    $format = $conf["sendmessage-format"];
		$format = str_replace("{MESSAGE}", $message, $format);
		$format = str_replace("{MAXPLAYERS}", $this->getServer()->getMaxPlayers(), $format);
		$format = str_replace("{TOTALPLAYERS}", count($this->getServer()->getOnlinePlayers()), $format);
		$format = str_replace("{PREFIX}", $conf["prefix"], $format);
		$format = str_replace("{SENDER}", $player->getName(), $format);
		$format = str_replace("{SUFFIX}", $conf["suffix"], $format);
		$format = str_replace("{TIME}", date($conf["datetime-format"]), $format);
		return $format;
	}
	
	public function messagebyConsole(CommandSender $player, $conf, $message){
		$format = $conf["sendmessage-format"];
		$format = str_replace("{MESSAGE}", $message, $format);
		$format = str_replace("{MAXPLAYERS}", $this->getServer()->getMaxPlayers(), $format);
		$format = str_replace("{TOTALPLAYERS}", count($this->getServer()->getOnlinePlayers()), $format);
		$format = str_replace("{PREFIX}", $conf["prefix"], $format);
		$format = str_replace("{SENDER}", $player->getName(), $format);
		$format = str_replace("{SUFFIX}", $conf["suffix"], $format);
		$format = str_replace("{TIME}", date($conf["datetime-format"]), $format);
		return $format;
	}
	
	public function broadcastPopup($conf, $message){
		$message = str_replace("{MAXPLAYERS}", $this->getServer()->getMaxPlayers(), $message);
		$message = str_replace("{TOTALPLAYERS}", count($this->getServer()->getOnlinePlayers()), $message);
		$message = str_replace("{PREFIX}", $conf["prefix"], $message);
		$message = str_replace("{SUFFIX}", $conf["suffix"], $message);
		$message = str_replace("{TIME}", date($conf["datetime-format"]), $message);
		return $message;
	}
	
	public function popupbyPlayer(Player $player, $conf, $message){
		$format = $conf["sendmessage-format"];
		$format = str_replace("{MESSAGE}", $message, $format);
		$format = str_replace("{MAXPLAYERS}", $this->getServer()->getMaxPlayers(), $format);
		$format = str_replace("{TOTALPLAYERS}", count($this->getServer()->getOnlinePlayers()), $format);
		$format = str_replace("{PREFIX}", $conf["prefix"], $format);
		$format = str_replace("{SENDER}", $player->getName(), $format);
		$format = str_replace("{SUFFIX}", $conf["suffix"], $format);
		$format = str_replace("{TIME}", date($conf["datetime-format"]), $format);
		return $format;
	}
	
	public function popupbyConsole(CommandSender $player, $conf, $message){
		$format = $conf["sendpopup-format"];
		$format = str_replace("{MESSAGE}", $message, $format);
		$format = str_replace("{MAXPLAYERS}", $this->getServer()->getMaxPlayers(), $format);
		$format = str_replace("{TOTALPLAYERS}", count($this->getServer()->getOnlinePlayers()), $format);
		$format = str_replace("{PREFIX}", $conf["prefix"], $format);
		$format = str_replace("{SENDER}", $player->getName(), $format);
		$format = str_replace("{SUFFIX}", $conf["suffix"], $format);
		$format = str_replace("{TIME}", date($conf["datetime-format"]), $format);
		return $format;
	}
	
	public function getMessagefromArray($array){
		unset($array[0]);
		return implode(' ', $array);
	}
	
}
?>
