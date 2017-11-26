<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

class NecoPresenter extends Nette\Application\UI\Presenter{
    /** @var Nette\Database\Context */
    private $database;

    public function __construct(Nette\Database\Context $database){
        $this->database = $database;
    }
 public function renderTohle(){
    $this->template->knihy = $this->database->table('knihy')
        ->order('datumpridani DESC')
        ->limit(10);
}
}