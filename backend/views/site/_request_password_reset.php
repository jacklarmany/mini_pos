<br><br>
<div class="row">
    <div class="col-md-4 bg-white mx-auto p-2 shadow-lg rounded">
        <p id="showAccount"></p>
        <div class="bg-white text-center text-success p-5">
            <br>
            <div id="oldform">
                <div class="form-group text-left">
                    <input type="email" required id="email" class="form-control" name="email" style="height:48px;" placeholder="<?= Yii::t('app', 'Email') ?>">
                </div>
                <div class="form-group text-center">
                    <button type="button" id="searchAccount" class="btn btn-outline-primary border-3 rounded" style="height:47px;"><?= Yii::t('app', 'Search Account') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$script = <<< JS
    $("#searchAccount").click(function(){
        var email = $("#email").val();
        if(email === ""){
            $("#email").css({"border":"1px solid red"});
        }
        else{
            var realEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            if (realEmail.test(email)){
                $.post("index.php?r=site/search-account&email="+email,function(op){
                    $("#showAccount").html(op);
                    $('#oldform').hide();
                });
            }
            else{
                alert("ອີເມວລ໌ບໍ່ຖືກ");
            }
        }
    });

    $("#email").keyup(function(){
        $("#email").css({"border":"1px solid #ccc"});
    });
JS;
$this->registerJs($script);
?>