<?php if(!empty($classrooms)): ?>
<div class="courses">
    <div class="courses_background"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="section_title text-center">
                    کلاس های محبوب
                </h2>
            </div>
        </div>
        <div class="row courses_row">

            <?php foreach ($classrooms as $classroom): ?>
                <!-- Course -->
                <div class="col-lg-4 course_col">
                    <div class="course">
                        <div class="course_image">
                            <?= $this->Html->image('/uploads/classrooms/'.$classroom->image) ?>
                        </div>
                        <div class="course_body">
                            <div class="course_title text-right">
                                <?= $this->Html->link($classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $classroom->slug]) ?>
                                <?php if(!empty($classroom->point)): ?>
                                <div class="points d-flex">
                                    <div class="text-success mr-3">
                                        <i class="fa fa-thumbs-up mr-1" aria-hidden="true"></i><span><?= $classroom->point->positive_points ?></span>
                                    </div>
                                    <div class="text-danger">
                                        <i class="fa fa-thumbs-down mr-1" aria-hidden="true"></i><span><?= $classroom->point->negative_points ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="course_info text-right">
                                <ul>
                                    <li>
                                        <?= $this->Html->link($classroom->teacher->fullName, ['controller' => 'Teachers', 'action' => 'view', $classroom->teacher->slug]) ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="course_text text-right" dir="rtl">
                                <p>
                                    <?= $this->Text->truncate(
                                        $classroom->description ,
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
                        <div class="course_footer d-flex align-items-center justify-content-start">
                            <div title="تعداد زبان آموزان در این کلاس">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span><?= count($classroom->student_classroom) ?></span>
                            </div>
                            <div class="ml-auto">
                                <?= $this->Html->link('بیشتر', ['controller' => 'Classrooms', 'action' => 'view', $classroom->slug], ['class' => 'btn btn-sm btn-dark']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
