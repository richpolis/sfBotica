<?php use_helper('I18N') ?>
<?php use_stylesheet('contacto_white.css'); ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<div id="formContacto" style="margin-left: 0px;">
    <p class="validateTips" style="border: 1px solid transparent; padding: 0.3em;display: none;"><?php echo $mensaje_ok ?></p>
    <?php echo $form->renderGlobalErrors() ?>
    <form action="<?php echo url_for('contacto') ?>" method="POST" class="formGen">
        <div class="formRow">
            <table border="0">
                <tr>
                    <td>
                        <label style="width: 80px; color: black;" for="contact_name"><?php echo __('Nombre'); ?><span class="star">*</span>:</label>
                    </td>
                    <td>        
                        <?php echo $form['name']->render(array('class' => 'textField required')) ?>
                    </td>
                    <td>
                        <?php if ($form['name']->hasError()): ?>
                            <span class="errorIcon">
                                <span class="errorTip" style="left: 30px; display: none; opacity: 1; ">
                                    <?php echo $form['name']->getError(); ?>
                                </span>
                            </span>  
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="formRow">
            <table border="0">
                <tr>
                    <td>
                        <label style="width: 80px; color: black;" for="contact_email"><?php echo __('Email'); ?><span class="star">*</span>:</label>
                    </td>
                    <td>        
                        <?php echo $form['email']->render(array('class' => 'textField required email')) ?>
                    </td>
                    <td>
                        <?php if ($form['email']->hasError()): ?>
                            <span class="errorIcon">
                                <span class="errorTip" style="left: 30px; display: none; opacity: 1; ">
                                    <?php echo $form['email']->getError(); ?>
                                </span>
                            </span>  
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="formRow">
            <table border="0">
                <tr>
                    <td>
                        <label style="width: 80px; color: black;" for="contact_subject"><?php echo __('Asunto'); ?>:</label>
                    </td>
                    <td>        
                        <?php echo $form['subject']->render(array('class' => 'textField required')) ?>
                    </td>
                    <td>
                        <?php if ($form['subject']->hasError()): ?>
                            <span class="errorIcon">
                                <span class="errorTip" style="left: 30px; display: none; opacity: 1; ">
                                    <?php echo $form['subject']->getError(); ?>
                                </span>
                            </span>  
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="formRow">
            <table border="0">
                <tr>
                    <td>
                        <label style="width: 80px; color: black;" for="contact_message"><?php echo __('Mensaje'); ?><span class="star">*</span>:</label>
                    </td>
                    <td>        
                        <?php echo $form['message']->render(array('class' => 'textArea required', 'rows' => 5, 'cols' => 40, 'value' => (true ? '' : 'Formulario deshabilitado temporalmente'))) ?>
                    </td>
                    <td>
                        <?php if ($form['message']->hasError()): ?>
                            <span class="errorIcon">
                                <span class="errorTip" style="left: 30px; display: none; opacity: 1; ">
                                    <?php echo $form['message']->getError(); ?>
                                </span>
                            </span>  
                        <?php endif; ?>
                    </td>
                </tr>
            </table>   
        </div>
        <?php echo $form->renderHiddenFields(false) ?>
        <?php if (true): ?>
            <div class="formRow">
                <table boder="0">
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="<?php echo __('Enviar'); ?>" id="submit"/>
                            <!--span class="button_form_contacto">
                                Enviar
                                <span></span>
                            </span-->
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        <?php endif; ?>    
    </form>
</div>
<script>

    $(function($){

        var form = $('#dialog-form form');

        form.zinePretifyForm();

        form.submit(handleFormSubmit);
        form.find('input[type=submit]').click(handleFormSubmit);

        var submitFlag = false;

        function handleFormSubmit(){
            if(submitFlag){
                return false;
            }
            overlay.show();
            submitFlag = true;

            $('#contact_name,#contact_email').focus();
            /*$('').focus();*/

            $.post(form.attr('action'),form.serialize(),function(data){
                submitFlag = false;
                overlay.hide();
                $('#dialog-form').html(data);
                submitFlag=false;
            });

            return false;
        }

        var overlay = {
            show    : function(){
                $('body').append('<div id="overlay"></div><div id="preloader">Enviando...</div>');
            },
            hide    : function(){
                $('#overlay,#preloader').remove();
            }
        }

        function displayOverlay(){
        }
    
       
        var errorTip=$('.errorTip');        
        $('.errorIcon').each(function(index){
            $(this).hover(function(){
                errorTip.eq(index).stop().fadeIn(function(){
                    errorTip.eq(index).css('opacity',1);
                });
            },function(){
                errorTip.eq(index).stop().fadeOut('slow',function(){
                    errorTip.eq(index).hide().css('opacity',1);
                });
            });
        });               
     
    });

    (function($){

        $.fn.zinePretifyForm = function(){
            return this.each(function(){

                var form = $(this);

                form.find('input[type=button],input[type=submit]').each(function(){

                    var originalButton = $(this),
                    button = $('<span>',{
                        class   : 'button',
                        html    : originalButton.val()+'<span></span>'
                    });

                    button.insertAfter(originalButton.hide());

                    button.click(function(){
                        originalButton.click();
                    });

                });

                form.find('input[type=checkbox]').each(function(){

                    var originalCheckBox = $(this),
                    checkBox = $('<span>',{
                        class   : 'checkBox '+(this.checked?'checked':'')
                    });

                    checkBox.insertAfter(originalCheckBox.hide());

                    checkBox.click(function(){
                        checkBox.toggleClass('checked');
                        originalCheckBox.attr('checked',checkBox.hasClass('checked'));
                    });

                });

                form.find('input[type=radio]').each(function(){

                    var originalRadio = $(this),
                    radio = $('<span>',{
                        class  : 'radio '+(this.checked?'checked':'')
                    });

                    radio.insertAfter(originalRadio.hide());

                    radio.click(function(){
                        $('input[type=radio][name='+originalRadio.attr('name')+']').each(function(){
                            $(this).next().removeClass('checked');
                        });

                        radio.addClass('checked');
                        originalRadio.attr('checked',true);
                    });

                });

                form.find('select').each(function(i){

                    var select = $(this);

                    var selectBoxContainer = $('<span>',{
                        width       : select.outerWidth(),
                        class       : 'selectContainer',
                        html        : '<div class="selectBox"></div><span></span>',
                        css         : {zIndex : 1000-i}
                    });

                    var dropDown = $('<ul>',{class:'dropDown'});
                    var selectBox = selectBoxContainer.find('.selectBox');

                    select.find('option').each(function(i){
                        var option = $(this);

                        if(i==select.attr('selectedIndex')){
                            selectBox.html(option.text());
                        }

                        var li = $('<li>',{
                            html:   option.html()
                        });

                        li.click(function(){

                            selectBox.html(option.text());
                            dropDown.trigger('hide');

                            select.val(option.val());
                            return false;
                        });

                        dropDown.append(li);
                    });

                    selectBoxContainer.append(dropDown.hide());
                    select.hide().after(selectBoxContainer);

                    dropDown.bind('show',function(){

                        if(dropDown.is(':animated')){
                            return false;
                        }

                        selectBox.addClass('expanded');
                        dropDown.slideDown('fast');

                    }).bind('hide',function(){

                        if(dropDown.is(':animated')){
                            return false;
                        }

                        selectBox.removeClass('expanded');
                        dropDown.slideUp('fast');

                    }).bind('toggle',function(){
                        if(selectBox.hasClass('expanded')){
                            dropDown.trigger('hide');
                        }
                        else dropDown.trigger('show');
                    });

                    selectBoxContainer.click(function(){
                        dropDown.trigger('toggle');
                        return false;
                    });

                    $(document).click(function(){
                        dropDown.trigger('hide');
                    });
                });

            });
        }

    })(jQuery);
    $(document).ready(function(){
<?php if (strlen($mensaje_ok) > 0): ?>
            $("p.validateTips").show('fast',function(){
                setTimeout(function(){
                    $("p.validateTips").hide('fast');
                },3000);
            });
<?php endif; ?>
    });
</script>
