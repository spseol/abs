<?php
// source: C:\xampp\htdocs\abs\app\presenters/templates/Neco/tohle.latte

use Latte\Runtime as LR;

class Templatebbf4983043 extends Latte\Runtime\Template
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
		if (isset($this->params['book'])) trigger_error('Variable $book overwritten in foreach on line 11');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div>    
    <div>
        <table border="1">
            <div>
                <tr>
                    <td><div>Ev.č</div></td>
               
                </tr>
            </div>          
<?php
		$iterations = 0;
		foreach ($knihy as $book) {
?>            <div class="post">
                <tr>
                    <td><div><?php echo LR\Filters::escapeHtmlText($book->ev_cislo) /* line 13 */ ?></div></td>

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
