<?php
$this->assign('title', 'رویداد: '.$event->title);
?>

<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content">
            <div class="row">
                <div class="col">
                    <div class="regular_title text-right">
                        <?= h($event->title) ?>

                        <div class="teacher-img event-img">
                            <?= $this->Html->image('/uploads/events/'.$event->image, ['class' => 'img-thumbnail']) ?>
                        </div>
                    </div>
                    <div class="regular_text text-right" dir="rtl">
                        <ul class="list-group" dir="rtl">
                            <li class="list-group-item">
                                تاریخ انتشار: <span class="ml-3"><?= $this->cell('ConvertDate', [$event->creation_date]) ?></span>
                            </li>
                        </ul>

                        <div class="mt-3 text-right" dir="rtl" lang="fa">
                            <?= $this->Text->autoParagraph(h($event->description)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
