<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<script>
  $(document).ready(function() {
    $("#usertabs").tabs();
  });
</script>
<style>
<!--
      /* .ui-widget-content {
         background:#F2F2F2;
       }
       */
-->
</style>
<form action="<?php echo url_for('/userinfo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table width="100%">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <div>
          <a href="<?php echo url_for('/user') ?>" class='button'>返回</a>
          <input type="submit" value="保存" style="float:right;" />
          </div>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>

        <td>
          <?php  echo $form['user_id']->renderError() ?>
          <?php  echo $form['user_id'] ?>
        </td>
      </tr>
      <tr>
        <td WIDTH="15%"><?php echo $form['realname']->renderLabel('真实姓名') ?></td>
        <td>
          <?php echo $form['realname']->renderError() ?>
          <?php echo $form['realname']->render(array('class' => 'login')) ?>
        </td>
      </tr>
      <tr>
        <td WIDTH="15%"><?php echo $form['web']->renderLabel('网址或微博') ?></td>
        <td>
          <?php echo $form['web']->renderError() ?>
          <?php echo $form['web']->render(array('class' => 'login')) ?>
        </td>
      </tr>
      <tr>
        <td WIDTH="15%"><?php echo $form['special']->renderLabel('专业兴趣') ?></td>
        <td>
          <?php echo $form['special']->renderError() ?>
          <?php echo $form['special']->render(array('class' => 'login')) ?>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <?php echo $form['description']->renderLabel('简短介绍') ?>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description']->render(array('style' => 'width:400px')) ?>
        </td>
      </tr>
      <tr>
        <td WIDTH="15%"><?php echo $form['province']->renderLabel('省') ?></td>
        <td>
          <?php echo $form['province']->renderError() ?>
          <?php echo $form['province']->render(array('class' => 'select1')) ?>
        </td>
      </tr>
      <tr>
        <td WIDTH="15%"><?php echo $form['city']->renderLabel('城市') ?></td>
        <td>
          <?php echo $form['city']->renderError() ?>
          <?php echo $form['city']->render(array('class' => 'select1')) ?>
        </td>
      </tr>
      <tr>
        <td WIDTH="15%"><?php echo $form['area']->renderLabel('地区') ?></td>
        <td>
          <?php echo $form['area']->renderError() ?>
          <?php echo $form['area']->render(array('class' => 'select1')) ?>
        </td>
      </tr>
      
    </tbody>
  </table>
</form>
