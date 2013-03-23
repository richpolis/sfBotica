<?php use_helper('I18N') ?>

<div style="padding-left: 205px;" class="login-form-richpolis">
    <form action="<?php echo url_for(sfAdminDash::getProperty('login_route', '@sf_guard_signin')); ?>" method="post">
        <div class="form-block" style="background-color: transparent; border: none;">
            <?php echo $form->renderGlobalErrors(); ?>
            <?php if (isset($form['_csrf_token'])): ?>
                <?php echo $form['_csrf_token']->render(); ?> 
            <?php endif; ?>
            <div class="inputlabel">
                <?php echo $form['username']->renderLabel(__('Usuario', array(), 'sf_admin_dash')); ?>:
            </div>
            <div>
                <?php echo $form['username']->renderError(); ?>
                <?php echo $form['username']->render(array('class' => 'inputbox')); ?>
            </div>
            <div class="inputlabel">
                <?php echo $form['password']->renderLabel(__('Password', array(), 'sf_admin_dash')); ?>:
            </div>
            <div>
                <?php echo $form['password']->renderError(); ?>
                <?php echo $form['password']->render(array('class' => 'inputbox')); ?>
            </div>
            <div class="inputlabel">
                <?php echo $form['remember']->render(array('class' => 'inputcheck')); ?>
                <?php echo $form['remember']->renderLabel(__('Recordar?', array(), 'sf_admin_dash')); ?>
            </div>
            <div align="right">
                <!--input type="submit" name="submit" class="button clr" value="<?php echo __('Login', array(), 'sf_admin_dash'); ?>" /-->
                <a class="boton_login" href="javascript:void(0);" onclick="javascript:forms[0].submit();">
                    <?php echo __('Entrar', array(), 'sf_admin_dash'); ?>
                </a>
            </div>
        </div>
    </form>
</div>