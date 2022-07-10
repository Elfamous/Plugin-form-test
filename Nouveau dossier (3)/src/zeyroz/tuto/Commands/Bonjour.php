<?php

namespace zeyroz\tuto\Commands;

use pocketmine\block\DiamondOre;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\lang\Translatable;
use pocketmine\Server;

class Bonjour extends Command{

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->setPermission("bonjour.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            $this->form($sender);
        }return true;
    }

    public function form($sender);
        $formapi = Server::getInstance()->getPluginManager()->getPlugin("FormAPI");
        $form = $formapi->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if($result === null){
                return true;
            }
            switch ($result){
                case 0:
                    $sender->sendMessage("Le plugin marche fdp et la je suis heureux");
                    break;
                case 1:
                    $sender->sendMessage("Casse toi de la");
                    break;
                case 2:
                    $sender->getInventory()->setItemInInventory(ItemFactory::getInstance()->get(ItemIds::DIAMOND, 0, $item->getCount() - 1));
                    break;
            }
        });
        $form->setTitle("Form de bienvenue");
        $form->setContent("Vous avez bien ouvert votre form");
        $form->addButton("Message");
        $form->addButton("Fermer");
        $form->addButton("Test give");
        $form->sendToPlayer($sender);
    }
}