<div class="panel panel-info" style="max-width: 330px; width: 330px;">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $utoconsult_articles[0]['UtoconsultArticleCategory2']['UtoconsultArticleCategory1']['name']; ?></h3>
                </div>
    
<div class="media">
     <?php if($utoconsult_articles[0]): ?> 
     <img class="media-object small-photo-1 pull-left" style="margin-right: 20px;margin-top: 10px;margin-bottom: 10px; max-width: 100px; width: 100px;" src="<?php echo ($utoconsult_articles[0]['UtoconsultArticleCategory2']['UtoconsultArticleCategory1']['photo1']!=null)?'/uploads/category1photo1/'.$utoconsult_articles[0]['UtoconsultArticleCategory2']['UtoconsultArticleCategory1']['photo1']:'/images/image.gif' ?>" />
     <?php endif; ?>
<div>  
<ul>   
<?php foreach ($utoconsult_articles as $i=>$utoconsult_article): ?> 
    <li><h5><a href="/articles/single/id/<?php echo $utoconsult_article['id']  ?>/name/<?php echo $utoconsult_article['title']; ?>.html"><?php echo $utoconsult_article['title'] ?></a></h5></li>
<?php endforeach; ?>
</ul>
</div>
</div>     
    
</div>    