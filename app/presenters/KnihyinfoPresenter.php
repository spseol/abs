<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

class KnihyinfoPresenter extends Nette\Application\UI\Presenter{
    /** @var Nette\Database\Context */
    private $database;

    public function __construct(Nette\Database\Context $database){
        $this->database = $database;
    }
        public function renderRezervovane(){
        $this->template->log = $this->database->table('log')          
        ->order('date DESC')
        ->where('akce', 'Rezervováno');      
    }
        public function renderPujcene(){
        $this->template->log = $this->database->table('log')           
        ->where('akce = ?', 'Vypůjčena');       
   }
       public function renderPripravene(){
        $this->template->log = $this->database->table('log')           
        ->where('akce = ?', 'Připravena k vyzvednutí');       
   }
}


