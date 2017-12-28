<?php
use admin\assets\AceAsset;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="page-content">
    <!--
    page header 可选用 
    <div class="page-header">
        <h3>
            Tables
            <small>
                <i class="icon-double-angle-right"></i>
                Static &amp; Dynamic Tables
            </small>
        </h3>
    </div>
    -->
    <div class="space"></div>
    <div class="row">
        <form id="form" class="form-horizontal" role="form" action="javascript:;">
            <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="name"> Name </label>
                <div class="col-sm-9">
                    <input type="text" id="name" placeholder="input..." name="name" />
                </div>
                <span class = "form-error" id="form-error-name"></span>
            </div>

            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="phone"> Phone </label>
                <div class="col-sm-9">
                    <input type="text" id="phone" placeholder="input..." name="phone" />
                </div>
                <span class = "form-error" id="form-error-phone"></span>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="email"> Email</label>
                <div class="col-sm-9">
                    <input type="email" id="email" placeholder="input..." name="email" />
                </div>
                <span class = "form-error" id="form-error-email"></span>
            </div>
            <div class="space-4"></div>
             <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="password"> Password</label>
                <div class="col-sm-9">
                    <input type="password" id="password" placeholder="input..." name="password" />
                </div>
                <span class = "form-error" id="form-error-password"></span>
            </div>

            <div class="space-4"></div>
         <div class="col-sm-2"></div>
            <button class="btn btn-primary col-sm-2" id="submit">提交</button>
            <div class="col-sm-5"></div>
        </form>

        
      
    </div>
</div>


<?php AceAsset::addScript($this, '@web/js/ace/js/jquery.validate.min.js'); ?>


<script type="text/javascript">
    WWW = {};
    WWW.register = function(){
        var handleValidation = function() {
            
            $("#form").validate({
                errorElement: 'span',
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    phone : {
                        required: true,
                        mobile: true
                    }
                },

                messages: {
                    name: {
                        required: 'enter your name',
                        minlength: "The name you entered shuld be more than {0} bite"
                    },
                    email: {
                        required: 'enter your email',
                        email: 'Please make sure the email you entered'
                    },
                    password: {
                        required: 'enter your password'
                    },
                    phone: {
                        required: 'enter your phone'
                    }
                },

                errorPlacement: function(error, element) {
                    var errorId = 'form-error-' + $(element).attr('id');
                    var errorObj = $(element).parents("form").find("span[id='" + errorId + "']");
                    errorObj.addClass('col-sm-9').css({
                        color: 'red',
                    });
                    errorObj.text(error.text());
                },

                success: function (label, element) {
                    // label 指代当前的errorElement
                    $(label).removeClass('error');
                }
            });
        };

        return {
        //main function to initiate the module
        init: function () {
                handleValidation();
            }
        };

    }();

    WWW.register.init();

</script>