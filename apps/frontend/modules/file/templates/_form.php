<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('file/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(true) ?>
          <?php echo $form['isuto']->renderError() ?>
          <?php echo $form['isuto'] ?>
          <?php echo $form['user_id']->renderError() ?>
          <?php echo $form['user_id'] ?>
          <?php echo $form['imageicon'] ?>
          <a href="<?php echo url_for('/file/listadmin') ?>" class="btn btn-default">返回文件列表</a>
          <input type="submit" value="提交" class="pull-right btn btn-success" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      
      <tr>
        <th>文档标题(必填)</th>
        <td>
          <?php echo $form['title']->render(array('class'=>'form-control')) ?>
          <?php echo $form['title']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th>文档摘要</th>
        <td>
          <?php echo $form['description']->render(array('class'=>'form-control')) ?>
          <?php echo $form['description']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th>文档分类</th>
        <td>
          <?php echo $form['category_id']->render(array('class'=>'form-control')) ?>                
          <?php if ($utoconsult_file->category_id): ?>

          <?php endif;?>
      </td>
      </tr>
      <tr>
        <th>选择文档(必填)</th>
        <td>
        <?php if (isset($utoconsult_file))
                       echo "<a href='/file/single2/id/".$utoconsult_file->getId().".html' target='_blank'>查看文档</a>";
        ?>
        <?php if (isset($form['file'])):?>
          <?php echo $form['file'] ?>
          <?php echo $form['file']->renderError() ?>
        <?php endif;?>  
        </td>
      </tr>
      <tr>
        <th>封面小图</th>
        <td>
           <?php if (isset($utoconsult_file)): ?>
           <img src="/uploads/usersharedfileimageicon/<?php echo $utoconsult_file->imageicon; ?>" />

           <?php elseif (isset($form['image'])):?>
           <?php echo $form['image']->render(array('style'=>'max-width:200px;')) ?>
           <?php echo $form['image']->renderError() ?>
           <?php endif; ?>
        </td>
      </tr>
      <tr>
        <th>语言</th>
        <td>
          <?php echo $form['lang']->render(array('class'=>'form-control')) ?>
          <?php echo $form['lang']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th>等级</th>
        <td>
          <?php echo $form['level']->render(array('class'=>'form-control')) ?>
          <?php echo $form['level']->renderError() ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
