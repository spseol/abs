<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

class PujcenePresenter extends Nette\Application\UI\Presenter{
    /** @var Nette\Database\Context */
    private $database;

    public function __construct(Nette\Database\Context $database){
        $this->database = $database;
    }
 public function renderPujcene(){
    $this->template->log = $this->database->table('log')
        ->order('id DESC')
        ->limit(10);
}
}