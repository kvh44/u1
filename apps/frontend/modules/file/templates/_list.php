<?php if (count($utoconsult_files)>0): ?>
<table border='0' class="table table-striped table-hover">
<thead>
    <tr class="ui-widget-header">
      <td>标题</td>
      <td>作者</td>
      <td>更新于</td>
    </tr>
</thead>
    <?php foreach ($utoconsult_files as $i=>$utoconsult_file): ?>
   
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">

      <td><a href="/file/single2/id/<?php echo $utoconsult_file['id']  ?>.html"><?php echo $utoconsult_file['title'] ?></a></td>
      <td><a href="/user/<?php echo $utoconsult_file['UtoconsultUser']['username'] ?>.html"><?php echo ($utoconsult_file['UtoconsultUser']['UtoconsultUserInformation']['realname'])?$utoconsult_file['UtoconsultUser']['UtoconsultUserInformation']['realname']:$utoconsult_file['UtoconsultUser']['username'] ?></a></td>
      <td><?php echo date('Y年m月d日',strtotime($utoconsult_file['updated_at']));
       ?></td>
    </tr>
    <?php endforeach; ?>

</table>
<?php endif; ?>