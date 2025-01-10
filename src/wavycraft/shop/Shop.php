<?php

declare(strict_types=1);

namespace wavycraft\shop;

use pocketmine\plugin\PluginBase;

use wavycraft\shop\command\ShopCommand;

use wavycraft\shop\form\ShopForm;

final class Shop extends PluginBase {

    protected static self $instance;

    private ShopForm $shopForm;

    protected function onLoad() : void{
        self::$instance = $this;
    }

    protected function onEnable() : void{
        $this->saveResource("shop.yml");
        $this->shopForm = new ShopForm();
        $this->getServer()->getCommandMap()->register("shop", new ShopCommand());
    }

    public static function getInstance() : self{
        return self::$instance;
    }

    public function getShopForm() : ShopForm{
        return $this->shopForm;
    }
}
