<?php
// source: C:\xampp\htdocs\abs\app\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Template2d59123cd5 extends Latte\Runtime\Template
{
	public $blocks = [
		'head' => 'blockHead',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'head' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striphtml', $_fi, $s));
			});
			?> | <?php
		}
?>Nette Sandbox</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */ ?>/css/style.css">
	<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
?>
</head>

<body>
    <div>
        <nav id="sidemenu">    
                <li><h2>Tisk</h2></li> 
                <li><a href="">Eco1</a></li>
                <li><a href="">Eco1</a></li>
                <li><a href="">Eco1</a></li>
                <li><a href="">Eco1</a></li>
        </nav>
    </div>
    <div>     
        <nav id="menu">     
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Přehled prací</a></li>
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Knihyinfo:rezervovane")) ?>">Rezervovane</a></li>
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Knihyinfo:pripravene")) ?>">Pripravene k vyzvednutí</a></li>
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Knihyinfo:pujcene")) ?>">Půjčené</a></li>           
            <li><a href="">Prihlášen jako: DODELAT!!</a></li>
            <li style="float:right"><a href="">Odlasit se</a></li>
            <li id="date">
                <a>  
                    <script type="text/javascript">
                        d = new Date();
                        document.write("Dnes je: " + d.getDate() + ". " + (d.getMonth() + 1) + ". " + d.getFullYear());
                        document.write("<br />");
                    </script>               
                </a>
            </li>
        </nav>     
    </div>
    
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>	<div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 47 */ ?></div>
<?php
			$iterations++;
		}
		$this->renderBlock('content', $this->params, 'html');
?>

<?php
		$this->renderBlock('scripts', get_defined_vars());
?>
</body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 47');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
	<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 53 */ ?>/js/date.js"></script>
        
<?php
	}

}
