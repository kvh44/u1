<div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">技术文档</h3>
                </div>
<div class="media">
     <img class="media-object small-photo-1 pull-left" style="margin-right: 20px;margin-top: 10px;margin-bottom: 10px;" src="<?php echo ($category1['photo1']!=null)?'/uploads/category1photo1/'.$category1['photo1']:'/images/image.gif' ?>" />
<div>     
<?php if (count($utoconsult_files)>0): ?>
<ul>
    <?php foreach ($utoconsult_files as $i=>$utoconsult_file): ?>
    <li><a href="/file/single2/id/<?php echo $utoconsult_file['id']  ?>.html"><?php echo $utoconsult_file['title'] ?></a></li>
    <?php endforeach; ?>
</ul>    
<?php endif; ?>
</div>
</div>  
    
</div>    