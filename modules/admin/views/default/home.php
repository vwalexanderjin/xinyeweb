<?php
use yii\helpers\Html;
?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th colspan="2">备忘录(记录未完成或待办事宜)<span id="notebookMessage"></span></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td colspan="2"><?=Html::textarea('notebook', $notebook,['id'=>'notebook','onblur'=>'updateNotebook()','class'=>'form-control','rows'=>6])?></td>
        </tr>
        <tr>
            <th colspan="2">系统信息</th>
        </tr>
        <tr>
            <td width="100" >程序版本</td>
            <td ><?php echo 'cms'?> <?php echo 'cmsRelease'?></td>
        </tr>
        <tr>
            <td >最新版本</td>
            <td ><span id="bagesoftVersion"></span></td>
        </tr>
        <tr>
            <td >产品支持</td>
            <td ><a href="#" target="_blank">www.xxxxxx.com </a><a href="#" target="_blank">使用手册</a></td>
        </tr>
        <tr>
            <td >操作系统软件</td>
            <td ><?php echo $server['serverOs']?> - <?php echo $server['serverSoft']?></td>
        </tr>
        <tr>
            <td >数据库及大小</td>
            <td ><?php echo $server['mysqlVersion']?> (<?php echo $server['dbsize']?>)</td>
        </tr>
        <tr>
            <td >上传许可</td>
            <td ><?php echo $server['fileupload']?></td>
        </tr>
        <tr>
            <td >主机名</td>
            <td ><?php echo $server['serverUri']?></td>
        </tr>
        <tr>
            <td >当前使用内存</td>
            <td ><?php echo $server['excuteUseMemory']?></td>
        </tr>
        <tr>
            <td >PHP环境</td>
            <td >magic_quote_gpc:<?php echo $server['magic_quote_gpc']?> allow_url_fopen:<?php echo $server['allow_url_fopen']?></td>
        </tr>
    </tbody>
</table>

<script language="javascript">
    <!--
    function updateNotebook()
    {
        $("#notebookMessage").fadeIn(2000);
        $("#notebookMessage").html('<span style="color:#FF0000"><img src="<?=Yii::$app->request->baseUrl?>/static/admin/images/loading.gif" align="absmiddle">正在更新数据...</span>');
        $.post("<?=\yii\helpers\Url::to(['notebook-update'])?>",{notebook:$('#notebook').val()},function(response){
            //alert(response);
            if(response.state == 'success'){
                $("#notebookMessage").html('<span style="color:#FF0000">'+response.message+'</span>');
            }else{
                //alert(response.message);
            }
            $("#notebookMessage").fadeOut(2000);
        }, 'json');

    }
    //-->
</script>