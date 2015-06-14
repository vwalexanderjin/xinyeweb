<p>外部替换 放在main等</p>
<?php if(isset($this->blocks['block1'])): ?>
    <?=$this->blocks['block1']?>
<?php else: ?>
    <p>默认内容</p>
<?php endif;?>



××××××××××××××××××××××××××××××××××
<p>注册block</p>
<?php $this->beginBLock('block1');?>
这里是block代码
<?php  $this->endVlock(); ?>




<div class="box1">
</div>