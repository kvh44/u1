<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>



<script type="text/javascript">

  tinyMCE.init({
    elements : "utoconsult_my_article_content",
    mode:                              "exact",
    theme_advanced_buttons1_add :      "fontselect,fontsizeselect,forecolor,backcolor",
    theme_advanced_fonts :             "微软雅黑=微软雅黑;\u5b8b\u4f53=\u5b8b\u4f53;\u6977\u4f53=\u6977\u4f53\u005f\u0067\u0062\u0032\u0033\u0031\u0032;"+
                                       "Andale Mono=andale mono,times;"+
                "Arial=arial,helvetica,sans-serif;"+
                "Arial Black=arial black,avant garde;"+
                "Book Antiqua=book antiqua,palatino;"+
                "Comic Sans MS=comic sans ms,sans-serif;"+
                "Courier New=courier new,courier;"+
                "Georgia=georgia,palatino;"+
                "Helvetica=helvetica;"+
                "Impact=impact,chicago;"+
                "Symbol=symbol;"+
                "Tahoma=tahoma,arial,helvetica,sans-serif;"+
                "Terminal=terminal,monaco;"+
                "Times New Roman=times new roman,times;"+
                "Trebuchet MS=trebuchet ms,geneva;"+
                "Verdana=verdana,geneva;"+
                "Webdings=webdings;"+
                "Wingdings=wingdings,zapf dingbats",  

    theme:                             "advanced",
    plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager",
    skin_variant : "silver",
    language : "ch",
    width : 775,
    height : 800,
    relative_urls :                    false,
    document_base_url :                "<?php echo "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']; ?>",

    

    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

  });
  
</script>




<form action="<?php echo url_for('/articles/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table width="900" class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <a href="<?php echo url_for('/articles/listadmin') ?>" class="btn btn-default">返回列表</a>
          <input type="submit" value="提交" class="btn btn-success pull-right" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <td width="20%"><label></label>分类1</label></td>
        <td>
          <?php echo $form['category1_id']->renderError() ?>
          <?php echo $form['category1_id']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <td width="20%"><label>分类2</label></td>
        <td>
          <?php echo $form['category2_id']->renderError() ?>
          <?php echo $form['category2_id']->render(array('class'=>'form-control')) ?>
          <span id="article_category2_loader"></span>
        </td>
      </tr>
      <tr>
        <td width="20%"><label>标题</label></td>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <td width="20%"><label>关键词</label></td>
        <td>
          <?php echo $form['keywords']->renderError() ?>
          <?php echo $form['keywords']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <td width="20%"><label>文章介绍</label></td>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <td width="20%"><label>文章内容</label></td>
        <td>   
          <?php echo $form['content']->renderError() ?>
          <?php echo $form['content'] ?>
        </td>
      </tr>
      <tr>
        <td width="20%"><label>作者</label></td>
        <td>
          <?php echo $form['user_id']->renderError() ?>
          <?php echo $form['user_id'] ?>
          <?php echo $user->getUsername() ?>
        </td>
      </tr>

      <tr>
        <td width="20%"><label>等级</label></td>
        <td>
          <?php echo $form['level']->renderError() ?>
          <?php echo $form['level']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
