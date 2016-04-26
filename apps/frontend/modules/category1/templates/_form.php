<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('category1/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('category1/index') ?>" class="btn btn-default">返回</a>
          <input type="submit" value="确定" class="btn btn-success pull-right" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>目录名字</th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <th>首页小图</th>
        <td>
          <?php echo $form['photo1']->renderError() ?>
          <?php echo $form['photo1']  ?>
        </td>
      </tr>
      <tr>
        <th>目录介绍</th>
        <td>
          <?php echo $form['keywords']->renderError() ?>
          <?php echo $form['keywords']->render(array('class'=>'form-control'))  ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
