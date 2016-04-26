<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script>
  $(document).ready(function() {
    $("#phototab").tabs();
  });
</script>

<form action="<?php echo url_for('/userprofilephoto/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table style="padding: 20px;">
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<?php echo link_to('返回', '/user',array('class'=>'button')) ?>
          <?php echo $form->renderHiddenFields(false) ?>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('删除我的照片', '/userprofilephoto/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '确定删除照片?','class'=>'button')) ?>
          <?php endif; ?>
          <input type="submit" value="保存" class="button" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      
      <tr>
        <th><?php echo $form['photo']->renderLabel('上传照片') ?></th>
        <td>
          <?php echo $form['photo'] ?>
          <?php echo $form['photo']->renderError() ?>
        </td>
      </tr>

    </tbody>
  </table>
</form>
