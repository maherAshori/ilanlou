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

            <?php foreach ($classrooms as $course): ?>
                <!-- Course -->
                <div class="col-lg-4 course_col">
                    <div class="course">
                        <div class="course_image">
                            <?= $this->Html->image('/uploads/classrooms/'.$course->image) ?>
                        </div>
                        <div class="course_body">
                            <div class="course_title text-right">
                                <?= $this->Html->link($course->name, ['controller' => 'Classrooms', 'action' => 'view', $course->slug]) ?>
                            </div>
                            <div class="course_info text-right">
                                <ul>
                                    <li>
                                        <?= $this->Html->link($course->teacher->fullName, ['controller' => 'Teachers', 'action' => 'view', $course->teacher->slug]) ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="course_text text-right" dir="rtl">
                                <p>
                                    <?= $this->Text->truncate(
                                            $course->description ,
                                            80,
                                            [
                                                'ellipsis' => '...',
                                                'exact' => false
                                            ]
                                        );
                                    ?>
                                </p>
                                <?= $this->Html->link('بیشتر', ['controller' => 'Classrooms', 'action' => 'view', $course->slug], ['class' => 'btn btn-sm btn-dark mt-2']) ?>
                            </div>
                        </div>
                        <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                            <div class="course_students" title="تعداد دانش آموزان  <?= $course->name ?>"><i class="fa fa-user" aria-hidden="true"></i><span><?= count($course->student_classroom) ?></span></div>
                            <div class="course_rating ml-auto" title="امتیاز  <?= $course->name ?>"><i class="fa fa-star" aria-hidden="true"></i><span><?= $course->vote ?></span>
                            </div>
                            <div class="course_mark course_free" title="قیمت  <?= $course->name ?>">
                                <a href="#">
                                    <?= $course->price != 0 ? $this->Number->format($course->price) : 'رایگان' ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
