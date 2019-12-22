<?php
$this->assign('title', 'آموزگار: '.$teacher->fullName);
?>

<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content" dir="rtl">
            <div class="row">
                <div class="col">
                    <div class="regular_title text-right">
                        <?= h($teacher->fullName) ?>

                        <div class="teacher-img">
                            <?= $this->Html->image('/uploads/teachers/'.$teacher->image, ['class' => 'img-thumbnail']) ?>
                        </div>
                    </div>
                    <div class="regular_text text-justify" dir="rtl">

                        <div class="mt-5">
                            <?= $this->Text->autoParagraph(h($teacher->description)); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
