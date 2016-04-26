<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('category2/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('category2/index') ?>" class="btn btn-default">返回</a>
          <input type="submit" value="确定" class="btn btn-success pull-right" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>母分类</th>
        <td>
          <?php echo $form['category1_id']->renderError() ?>
          <?php echo $form['category1_id']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <th>目录名称</th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <th>目录介绍</th>
        <td>
          <?php echo $form['keywords']->renderError() ?>
          <?php echo $form['keywords']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <th>二级分类排序</th>
        <td>
          <?php echo $form['orders']->renderError() ?>
          <?php echo $form['orders']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
