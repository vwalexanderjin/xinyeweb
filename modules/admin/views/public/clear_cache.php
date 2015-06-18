<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>执行缓存清理，将清除所有页面缓存、片段缓存以及动态缓存<span id="clearCache"></span></th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?=\yii\helpers\Html::a('清理','javascript:void(0);',['onclick'=>"clearCache()", 'class'=>'btn btn-primary'])?>
            </td>
        </tr>
    </tbody>
</table>

<script language="javascript">
    <!--
    function clearCache()
    {
        $("#clearCache").fadeIn(2000);
        $("#clearCache").html('<span style="color:#FF0000"><img src="<?=Yii::$app->request->baseUrl?>/static/admin/images/ajax_loader.gif" align="absmiddle">正在清理数据...请稍后</span>');
        $.get("<?=\yii\helpers\Url::to(['clear'])?>",{},function(response){
            //alert(response);
            if(response.state == 'success'){
                $("#clearCache").html('<span style="color:#FF0000">'+response.message+'</span>');
            }else{
                //alert(response.message);
            }
            $("#clearCache").fadeOut(2000);
        }, 'json');

    }
    //-->
</script>