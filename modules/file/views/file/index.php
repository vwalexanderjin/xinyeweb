<table>
    <tr>
        <th>编号</th>
        <th>名称</th>
        <th>类型</th>
        <th>大小</th>
        <th>可读</th>
        <th>可写</th>
        <th>可执行</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>访问时间</th>
        <th>操作</th>
    </tr>
    <?php
        if(isset($directory['file'])) {
            $i = 1;
           foreach ($directory['file'] as $v) {
               $fileName = $path . "/" . $v;
    ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$v?></td>
            <td><?=filetype($fileName)?></td>
            <td><?=\app\modules\file\components\File::transByte(filesize($fileName)) ?></td>
            <td><?php if(is_readable($fileName)) echo "可读"; ?></td>
            <td><?php if(is_writable($fileName)) echo "可写"; ?></td>
            <td><?php if(is_executable($fileName)) echo "可执行"; ?></td>
            <td><?=date('Y-m-d H:i:s', filectime($fileName))?></td>
            <td><?=date('Y-m-d H:i:s', filemtime($fileName))?></td>
            <td><?=date('Y-m-d H:i:s', fileatime($fileName))?></td>
            <td>
                <a href="#">查看</a>
            </td>
        </tr>
    <?php
          $i++;
           }
        } ?>
    <tr></tr>
</table>