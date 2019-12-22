<?php
    $this->assign('title', 'آموزشگاه زبان');
?>
<!-- Home -->
<div class="home">
    <div class="home_background" style="background-image: url(<?= _WWW_ROOT.'/web/images/index_background.jpg' ?>);"></div>
    <div class="home_content">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="home_title"><?= $description ?></h1>

                    <?php if(!$auth): ?>
                        <div class="home_button trans_200">
                                <?= $this->Html->link("همین الان ثبت نام کنید", ['controller' => 'Students', 'action' => 'add']) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->cell("Classrooms") ?>
<?= $this->cell("Teachers") ?>
<?= $this->cell("Events") ?>
