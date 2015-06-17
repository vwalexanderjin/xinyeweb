<?php
use yii\helpers\Url;
$this->registerCssFile(Yii::$app->request->baseUrl.'/static/admin/css/manage.css');
?>
</head>

<body scroll="no">
<div class="header">
    <div class="logo">xxxx.com</div>
    <div class="nav">
        <ul>
            <?php $i = 0; foreach(\app\modules\admin\components\MenuList::$menus as $key=>$row):?>
    <li index="<?php echo $i ?>">
        <div><a href="<?=Yii::$app->urlManager->createUrl($row['url']) ?>" target="win" hidefocus><?php echo $key ?></a></div>
    </li>
    <?php $i++;endforeach;?>
        </ul>
    </div>
    <div class="logininfo"><span class="welcome"><img src="<?=Yii::$app->request->baseUrl?>/static/admin/images/user_edit.png" align="absmiddle"> 欢迎, <em><?=Yii::$app->user->identity->username?></em> </span> <a href="<?=Url::to(['admin/ownerUpdate'])?>" target="win">修改密码</a> <a href="<?=Url::to(['index/logout'])?>" target="_top">退出登录</a> <a href="<?=Yii::$app->homeUrl?>" target="_blank">前台首页</a></div>
</div>
<div class="topline">
    <div class="toplineimg left" id="imgLine"></div>
</div>
<div class="main" id="main">
    <div class="mainA">
        <div id="leftmenu" class="menu">
            <?php $i = 0; foreach(\app\modules\admin\components\MenuList::$menus as $key=>$row):?>
    <ul index="<?php echo $i ?>" class="left_menu">
        <?php foreach((array)$row['action'] as $k=>$rc):?>
            <li index="<?php echo $k ?>"><a href="<?=Yii::$app->urlManager->createUrl($rc['url'])?>" target="win"><?php echo $rc['name'] ?></a></li>
        <?php endforeach;?>
    </ul>
    <?php $i++; endforeach;?>
        </div>
    </div>
    <div class="mainB" id="mainB" style="padding: 20px;">
        <iframe src="<?=Url::to(['/admin/default/home'])?>" name="win" id="win" width="100%" height="100%" frameborder="0"></iframe>
    </div>
</div>

<?php
$js = <<<JS
    window.onload =window.onresize= function(){winresize();}
    function winresize()
    {
        function $(s){return document.getElementById(s);}
        var D=document.documentElement||document.body,h=D.clientHeight-90,w=D.clientWidth-160;
        $("main").style.height=h+"px";
        $("mainB").style.width=w+"px";
    }
    $(document).ready(function(){
        var s=document.location.hash;
        if(s==undefined||s==""){s="#0_0";}
        s=s.slice(1);
        var navIndex=s.split("_");
        $(".nav").find("li:eq("+navIndex[0]+")").addClass("active");
        var targetLink=$(".menu").find("ul").hide().end()
            .find(".left_menu:eq("+navIndex[0]+")").show()
            .find("li:eq("+navIndex[1]+")").addClass("active")
            .find("a").attr("href");
        $("#win").attr("src",targetLink);
        $(".nav").find("li").click(function(){
            $(this).parent().find("li").removeClass("active").end().end()
                .addClass("active");
            var index=$(this).attr("index");
            $(".menu").find(".left_menu").hide();
            $(".menu").find(".left_menu:eq("+index+")").show()
                .find("li").removeClass("active").first().addClass("active");
            document.location.hash=index+"_0";
        });
        $(".left_menu").find("li").click(function(){
            $(this).parent().find("li").removeClass("active").end().end()
                .addClass("active");
            document.location.hash=$(this).parent().attr("index")+"_"+$(this).attr("index");
        });
    });
JS;
$this->registerJs($js);
?>