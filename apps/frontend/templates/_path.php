<div class="zone_path">
您的位置:
<img src="/images/nav-trail.gif"  /><a href="/index.html">主页</a>
<?php 
if($categorys) 
{

	if ($categorys[0]['UtoconsultArticleCategory1']){
	  echo '<img src="/images/nav-trail.gif"  /><a href="/articles/index/category/'.$categorys[0]['UtoconsultArticleCategory1']['id'].'/name/'.$categorys[0]['UtoconsultArticleCategory1']['name'].'.html">'.$categorys[0]['UtoconsultArticleCategory1']['name'].'</a>';
	   echo '<img src="/images/nav-trail.gif"  /><a href="/articles/index/category2/'.$categorys[0]['id'].'/name/'.$categorys[0]['name'].'.html">'.$categorys[0]['name'].'</a>';
	}
	elseif ($categorys[0]){
	  echo '<img src="/images/nav-trail.gif"  /><a href="/articles/index/category/'.$categorys[0]['id'].'/name/'.$categorys[0]['name'].'.html">'.$categorys[0]['name'].'</a>';
	}

}


if ($article){
	echo '<img src="/images/nav-trail.gif"  /><a href="/articles/index/category/'.$article['UtoconsultArticleCategory2']['UtoconsultArticleCategory1']['id'].'/name/'.$article['UtoconsultArticleCategory2']['UtoconsultArticleCategory1']['name'].'.html">'.$article['UtoconsultArticleCategory2']['UtoconsultArticleCategory1']['name'].'</a>';
	echo '<img src="/images/nav-trail.gif"  /><a href="/articles/index/category2/'.$article['UtoconsultArticleCategory2']['id'].'/name/'.$article['UtoconsultArticleCategory2']['name'].'.html">'.$article['UtoconsultArticleCategory2']['name'].'</a>';
    echo '<img src="/images/nav-trail.gif"  /><a href="/articles/single/id/'.$article['id'].'/name/'.$article['title'].'.html">'.$article['title'].'</a>';
}
?>
</div>