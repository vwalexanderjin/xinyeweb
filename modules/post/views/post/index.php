<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div id="contentHeader">
    <h3>内容管理</h3>
    <div class="searchArea">
        <ul class="action left">
            <li><a href="<?=Url::to(['create'])?>" class="actionBtn"><span>录入</span></a></li>
        </ul>
        <div class="search right">
            <?php $form = ActiveForm::begin() ?>
            <select name="catalogId" id="catalogId">
                <option value="">=全部内容=</option>

                    <option value="id">name</option>
                    <option value="id">name</option>
                    <option value="id">name</option>

            </select>
            标题
            <input id="title" type="text" name="title" value="" class="txt" size="15"/>
            别名
            <input id="titleAlias" type="text" name="titleAlias" value="" class="txt" size="15"/>
            <input name="searchsubmit" type="submit"  value="查询" class="button "/>
            <script type="text/javascript">
                $(function(){
                    $("#xform").validationEngine();
                });
            </script>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#title").val('<?=Yii::$app->request->get('title')?>');
        $("#titleAlias").val('<?=Yii::$app->request->get('titleAlias')?>');
        $("#catalogId").val('<?=Yii::$app->request->get('catalogId')?>');
    });
</script>
<table border="0" cellpadding="0" cellspacing="0" class="content_list">
    <form method="post" action="<?=Url::to('batch')?>" name="cpform" >
        <thead>
        <tr class="tb_header">
            <th width="10%">ID</th>
            <th>标题</th>
            <th width="16%">分类</th>
            <th width="9%">浏览</th>
            <th width="15%">录入时间</th>
            <th width="8%">操作</th>
        </tr>
        </thead>
        <?php foreach ($dataProvider as $row):?>
            <tr class="tb_list" <?php if($row->status=='0'):?>style=" background:#F0F7FC"<?php endif?>>
                <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
                    <?php echo $row->id?></td>
                <td ><a href="<?php echo $row->getUrl() ?>" target="_blank" style="<?php echo $row->title_style?>"><?php echo $row->title?></a><br />
                    <span class="alias"><?php echo $row->title_alias?></span></td>
                <td ><?php echo $row->catalog->catalog_name?></td>
                <td><span ><?php echo $row->view_count?></span></td>
                <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
                <td ><a href="<?=Url::to(['update','id'=>$row->id])?>"><img src="<?=Yii::$app->request->baseUrl?>/static/admin/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="<?= Url::to('batch',array('command'=>'delete','id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a></td>
            </tr>
        <?php endforeach;?>
        <tr class="operate">
            <td colspan="6"><div class="cuspages right">
                    <?/*=\yii\widgets\LinkPager::widget(['pagination'=>$pagebar])*/?>
                </div>
                <div class="fixsel">
                    <input type="checkbox" name="chkall" id="chkall" onClick="checkAll(this.form, 'id')" />
                    <label for="chkall">全选</label>
                    <select name="command">
                        <option>选择操作</option>
                        <option value="delete">删除</option>
                        <option value="verify">显示</option>
                        <option value="unVerify">隐藏</option>
                        <option value="commend">推荐</option>
                        <option value="unCommend">取消推荐</option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="提交" name="maskall" />
                </div></td>
        </tr>
    </form>
</table>