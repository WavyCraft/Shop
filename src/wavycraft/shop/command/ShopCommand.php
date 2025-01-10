<?php

declare(strict_types=1);

namespace wavycraft\shop\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\player\Player;

use wavycraft\shop\Shop;

class ShopCommand extends Command {

    private $plugin;

    public function __construct() {
        parent::__construct("shop");
        $this->setDescription("Open the shop menu");
        $this->setPermission("shop.cmd");

        $this->plugin = Shop::getInstance();
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) : bool{
        if (!$sender instanceof Player) {
            $sender->sendMessage("This command can only be used in-game!");
            return false;
        }
        
        if (!$this->testPermission($sender)) {
            return false;
        }

        $this->plugin->getShopForm()->sendShopUI($sender);
        return true;
    }
}
