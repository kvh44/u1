<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('/contactus/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('/home') ?>">返回</a>
          
          <input type="submit" value="发送" class="rightsubmit" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <td>您的邮箱</td>
        <td>
          
          <?php echo $form['email']->render(array('class' => 'login')) ?>
          <?php echo $form['email']->renderError() ?>
        </td>
      </tr>

          <?php echo $form['fromid'] ?>

      <tr>
        <td>提问内容</td>
        <td>
          
          <?php echo $form['content'] ?>
          <?php echo $form['content']->renderError() ?>
        </td>
      </tr>

    </tbody>
  </table>
</form>
