<?php
// source: C:\xampp\htdocs\abs\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Templatee3d414ec40 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['book'])) trigger_error('Variable $book overwritten in foreach on line 24');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div>    
    <div>
        <table>
            <div>
                <tr>
                    <td><div>Ev.č</div></td>
                    <td><div>Název práce </div></td>
                    <td><div>Autor</div></td>
                    <td><div>Vedoucí práce</div></td>
                    <td><div>Oponent práce</div></td>
                    <td><div>Rok</div></td>
                    <td><div>VOŠ / SPŠE</div></td>
                    <td><div>Stav</div></td>
                    <td>
                        <div>
                            <button>
                                <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Post:create")) ?>">Přidat práci</a>
                            </button>
                        </div>
                    </td>                
                </tr>
            </div>          
<?php
		$iterations = 0;
		foreach ($knihy as $book) {
?>            <div class="post">
                <tr>
                    <td><div><?php echo LR\Filters::escapeHtmlText($book->ev_cislo) /* line 26 */ ?></div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($book->prace) /* line 27 */ ?></div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($book->ajmeno) /* line 28 */ ?></div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($book->ref('oponenti', 'vedouci')->jmeno) /* line 29 */ ?></div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($book->ref('oponenti', 'oponent')->jmeno) /* line 30 */ ?></div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($book->rok) /* line 31 */ ?></div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($book->typ) /* line 32 */ ?></div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($book->stav) /* line 33 */ ?></div></td>                  
                    <td>
                        <div><a href="">Upravit</a></div>
                        <div><a href="">Smazat</a></div>
                    </td>
                </tr>
            </div>
<?php
			$iterations++;
		}
?>
        </table>
    </div>
</div>
<?php
	}

}
