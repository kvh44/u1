
<?php foreach ($articles as $i => $article) : ?>
<tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
<td>    
<a href='<?php $hrefvalue='/articles/single/id/'.$article->article_cn_pk.'.html'; echo $hrefvalue;?>'>
<?php echo $article->title; ?>
</a>
</td>    
</tr>
<?php endforeach;?>
