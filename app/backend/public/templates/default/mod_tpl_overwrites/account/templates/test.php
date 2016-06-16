<div>
<?php if(isset($this->tplVar['test'])) { ?>
	<h3><?php print htmlspecialchars($this->tplVar['test'], ENT_QUOTES, 'UTF-8');?></h3>
<?php } ?>

<?php 
print 'Message test from language file<br />';
print $this->Lang->write('error1');
print '<br />';
print $this->Lang->combine('error2', array(3));
print '<br />';
print $this->Lang->write('account_message1');
print '<br /><br />';
print $this->Lang->combine('account_message2', array('geknallt'));
?>
<br />
<a href="/account/index/logout/">Logout</a>
</div>