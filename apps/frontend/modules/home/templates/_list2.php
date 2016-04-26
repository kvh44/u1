
<div class="utoarticles" id="accordion" style='width:100%'>

    <?php foreach ($utoconsult_articles as $i=>$utoconsult_article): ?> 
	
	

    <div style="margin-bottom: 45px; ">   
      
      <div class="pre-cat">
					<div class="pre-cat-inner">
					<?php if ($utoconsult_article['UtoconsultArticleCategory1']!=null): ?>
						<a href="/articles/index/category/<?php echo $utoconsult_article['UtoconsultArticleCategory1']['id'] ?>"><?php echo $utoconsult_article['UtoconsultArticleCategory1']['name'] ?></a>
					<?php endif;?>
					<?php if ($utoconsult_article['UtoconsultArticleCategory2']!=null): ?>
						<a href="/articles/index/category2/<?php echo $utoconsult_article['UtoconsultArticleCategory2']['id'] ?>"><?php echo $utoconsult_article['UtoconsultArticleCategory2']['name'] ?></a>
					<?php endif;?>
					</div>
					<div class="pre-cat-arrow"></div>
					
	  </div>
	  <h2 class="entry-name" style="border-bottom:none;line-height:1.3;margin-bottom:0;background:#FFF;">
	  <a href="/articles/single/id/<?php echo $utoconsult_article['id']  ?>.html"><?php echo $utoconsult_article['title'] ?></a>
      <div class="clear"></div>
      </h2>
     <a href="/user/<?php echo $utoconsult_article['UtoconsultUser']['id'] ?>.html" rel='tipsy' title="<?php echo $utoconsult_article['UtoconsultUser']['username']; ?>">
     <?php 
     if($utoconsult_article['UtoconsultUser']['UtoconsultUserInformation']['realname']!=null)
     echo $utoconsult_article['UtoconsultUser']['UtoconsultUserInformation']['realname'];
     else 
     echo $utoconsult_article['UtoconsultUser']['username'];
     ?>
     </a>
      <span class="live-post-date">
      <?php echo date('Y年m月d日',strtotime($utoconsult_article['updated_at']));?>
      </span>
      <div class="live-post-inner">
      <?php 
      /*
      $pos=strpos(htmlspecialchars_decode($utoconsult_article['content'],ENT_QUOTES),'src=');
         if($pos!==false){
         	
            $pos2=strpos(substr(htmlspecialchars_decode($utoconsult_article['content'],ENT_QUOTES),$pos),' ');
            if($pos2!==false){
            	$imgtag=substr(htmlspecialchars_decode($utoconsult_article['content'],ENT_QUOTES),$pos+5,$pos2-6);
            	//if(@fopen($imgtag, "r")){
            		echo '<div style="text-align:center;padding:10px;width: 200px;">'.'<img src="'.$imgtag.'" style="max-width:150px !important;" />'.'</div>';
            	//}
            	
            }
         }
      */
      ?>
      <?php 
      if($utoconsult_article['description']){
      	echo $utoconsult_article['description'];
      }
      else{
      	echo mb_substr(strip_tags(htmlspecialchars_decode($utoconsult_article['content'],ENT_QUOTES)),0,300, 'utf-8').'...';
      }
      
      ?>
      <br>
      <a href="/articles/single/id/<?php echo $utoconsult_article['id']  ?>.html">(继续阅读...)</a>
      </div>
    </div>
    <?php endforeach; ?>

</div>
