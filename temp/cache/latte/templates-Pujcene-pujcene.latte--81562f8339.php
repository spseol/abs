<?php
// source: C:\xampp\htdocs\abs\app\presenters/templates/Pujcene/pujcene.latte

use Latte\Runtime as LR;

class Template81562f8339 extends Latte\Runtime\Template
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
		if (isset($this->params['logs'])) trigger_error('Variable $logs overwritten in foreach on line 14');
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
                    <td><div>Práce</div></td>
                    <td><div>Kdo jí chce</div></td>
                    <td><div>Stav</div></td>
                    <td><div>Čas záznamu</div></td>
                </tr>
            </div>          
<?php
		$iterations = 0;
		foreach ($log as $logs) {
?>            <div class="post">
                <tr>
                    <td><div>{"dodelat left join z knihy"}</div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($logs->ID_knihy) /* line 17 */ ?></div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($logs->ID_users) /* line 18 */ ?></div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($logs->akce) /* line 19 */ ?></div></td>
                    <td><div><?php echo LR\Filters::escapeHtmlText($logs->date) /* line 20 */ ?></div></td>
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
