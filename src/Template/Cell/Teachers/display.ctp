<?php if(!empty($teachers)): ?>
<div class="instructors" dir="rtl">
    <div class="instructors_background" style="background-image:url(<?= _WWW_ROOT.'/web/images/instructors_background.png' ?>images/instructors_background.png)"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="section_title text-center">
                    آموزگاران
                </h2>
            </div>
        </div>
        <div class="row instructors_row">

            <?php foreach ($teachers as $teacher): ?>
                <!-- Instructor -->
                <div class="col-lg-4 instructor_col">
                    <div class="instructor text-center">
                        <div class="instructor_image_container">
                            <div class="instructor_image">
                                <?= $this->Html->image('/uploads/teachers/'.$teacher->image) ?>
                            </div>
                        </div>
                        <div class="instructor_name">
                            <?= $this->Html->link($teacher->fullName, ['controller' => 'Teachers', 'action' => 'view', $teacher->slug]) ?>
                        </div>
                        <div class="instructor_title">آموزگار</div>
                        <div class="instructor_text">
                            <p>
                                <?= $this->Text->truncate(
                                    $teacher->description ,
                                    80,
                                    [
                                        'ellipsis' => '...',
                                        'exact' => false
                                    ]
                                );
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
