<style>
<!--
.article table tr td {
	 border: 1px solid;
}
-->
</style>


<?php slot('title') ?>
  <?php 
  $title="";
  if (isset($article))
  $title.=$article['title']; 
  $title.=" 优拓";
  echo $title;
  
  $description=$title;
  
  $keywords=$article['keywords'];
  
  $robots=$title;
  
  
  
  ?>
<?php end_slot(); ?>
<?php slot('description') ?>
  <?php echo $description; ?>
<?php end_slot(); ?>  
<?php slot('keywords') ?>
  <?php echo $keywords; ?>
<?php end_slot(); ?>  
<?php slot('robots') ?>
  <?php echo $robots; ?>
<?php end_slot(); ?>




<div class="left">
<input type="hidden" id="article_id" value="<?php echo $article['id'];?>" />
<input type="hidden" id="user_id" value="<?php echo $article['UtoconsultUser']['id'];?>" />






<h2 style="text-align:center;"><?php echo $article['title'];?></h2>
<p style="text-align:center;font-size: 14px;"><span><a href="/user/<?php echo $article['UtoconsultUser']['username']; ?>.html"><?php echo $article['UtoconsultUser']['UtoconsultUserInformation']['realname']?$article['UtoconsultUser']['UtoconsultUserInformation']['realname']:$article['UtoconsultUser']['username']; ?></a> <?php echo date('Y年m月d日',strtotime($article['updated_at'])); ?></span> </p>

<br>
<div class="article">
<?php echo htmlspecialchars_decode($article['content'],ENT_QUOTES); ?>
</div>


<br>

<?php if ($articlePrev):?>

上一篇: <a href="/articles/single/id/<?php echo $articlePrev['id']; ?>/name/<?php echo $articlePrev['title']; ?>.html" ><?php echo $articlePrev['title']; ?></a>

<?php endif;?><br>
<?php if ($articleNext):?>

下一篇: <a href="/articles/single/id/<?php echo $articleNext['id']; ?>/name/<?php echo $articleNext['title'];  ?>.html" ><?php echo $articleNext['title']; ?></a>

<?php endif;?>


<br><br>

<?php 

if($article['keywords']!= ''){
echo "<div class='panel'><div class='panel-heading'>文章关键词</div>{$article['keywords']}</div>";
}
?>

<br>

<div class="panel">
  <div class="panel-heading">作者</div>
  <div id="publisher_information"></div>
</div>

<br>

<div class="panel">
  <div class="panel-heading">其他文章</div>
  <div id="other_article_list"></div>
</div>


</div>
