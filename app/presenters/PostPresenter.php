<?php
namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


class PostPresenter extends Nette\Application\UI\Presenter
{
    /** @var Nette\Database\Context */
    private $database;
    
    public function __construct(Nette\Database\Context $database){
        $this->database = $database;
    }
    
    protected function createComponentPostForm()
    {
        $form = new Form;
        $form->addText('ev_cislo', 'Evidenční číslo práce:')
            ->setRequired();
        $form->addText('prace', 'Název práce:')
            ->setRequired();
        $form->addText('ajmeno', 'Příjmení a jméno autora:')
            ->setRequired();
        $form->addTextArea('vedouci', 'Vedoucí:')
            ->setRequired();
        $form->addTextArea('trida', 'Třída::')
            ->setRequired();
        $form->addTextArea('oponent', 'Oponent:')
            ->setRequired();
        $form->addTextArea('rok', 'Rok/měsíc::')
            ->setRequired();
        $form->addTextArea('stav', 'Stav:')
            ->setRequired();
        $form->addTextArea('souhlas', 'souhlas:')
            ->setRequired();
          
        $form->addSubmit('send', 'Uložit a publikovat');
        $form->onSuccess[] = [$this, 'postFormSucceeded'];
	
        return $form;
    }
    public function postFormSucceeded($form, $values)
{
    $post = $this->database->table('knihy')->insert($values);
    $this->flashMessage("Nová práce byla vložena.", 'success');
    $this->redirect('this');
    }   
}