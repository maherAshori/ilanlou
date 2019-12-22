<?php
$this->assign('title', 'حساب کاربری');
?>

<div class="home"></div>
<div class="regular">
    <div class="container profile-container">
        <div class="regular_content">
            <div class="row">
                <div class="col">
                    <div class="regular_title text-right">
                        <span class="text-muted"><?= h($student->fullName) ?></span>

                        <div class="student-img">
                            <?= $this->Html->image('profile.png', ['class' => 'img-thumbnail']) ?>
                        </div>
                    </div>
                    <div class="regular_text">
                        <div class="related">

                            <?= $this->Flash->render() ?>

                            <?php if (empty($student->notifications) && empty($student->student_classroom) && empty($student->requests) && empty($student->scores)): ?>
                                <div class="alert alert-primary text-right" dir="rtl">
                                    <p>زبان آموز عزیز</p>
                                    <p>از اینکه آموزشگاه ما را جهت پیشرفت خودتان انتخاب کرده اید متشکریم</p>
                                    <p>شما در این قسمت به اطلاعات کلاس هایی که در آنها ثبت نام کرده اید و همچنین نمرات کلاس ها دسترسی خواهید داشت</p>
                                </div>
                                <div class="alert alert-warning text-right" dir="rtl">
                                    <p>برای شروع کلاس خودتان را از بخش کلاس ها پیدا کنید و درخواست ثبت نام نمائید</p>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($student->notifications)): ?>
                                <div class="alert alert-primary text-right" dir="rtl">
                                    <?php foreach ($student->notifications as $notification): ?>
                                        <?= $notification->message ?>
                                    <?php endforeach; ?>

                                    <div class="clearfix mt-3">
                                        <?= $this->Form->postLink(__('بستن'), ['action' => 'closeNotification'], ['class' => 'text-dark']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <?php if (!empty($student->student_classroom)): ?>
                                <h4 class="text-right" dir="rtl"><?= __('#کلاس های من') ?></h4>

                                <table class="table table-bordered" dir="rtl">
                                    <tr>
                                        <th class="text-center" style="width: 50%"><?= __(' عنوان کلاس') ?></th>
                                        <th class="text-center"><?= __('تاریخ ثبت نام') ?></th>
                                    </tr>
                                    <?php foreach ($student->student_classroom as $studentClassroom): ?>
                                        <tr>
                                            <td class="text-center"><?= $this->Html->link($studentClassroom->classroom->name, ['controller' => 'classrooms', 'action' => 'view', $studentClassroom->classroom->slug]) ?></td>
                                            <td class="text-center">
                                                <?= $this->cell("ConvertDate", [$studentClassroom->registration_date]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php endif; ?>
                        </div>

                        <div>
                            <?php if (!empty($student->requests)): ?>
                                <h4 class="text-right" dir="rtl"><?= __('#درخواست های در انتظار تایید') ?></h4>

                                <table class="table table-bordered" dir="rtl">
                                    <tr>
                                        <th class="text-center" style="width: 50%"><?= __(' کلاس مورد نظر') ?></th>
                                        <th class="text-center"><?= __('تاریخ درخواست') ?></th>
                                    </tr>
                                    <?php foreach ($student->requests as $request): ?>
                                        <tr>
                                            <td class="text-center"><?= $this->Html->link($request->classroom->name, ['controller' => 'classrooms', 'action' => 'view', $request->classroom->slug]) ?></td>
                                            <td class="text-center">
                                                <?= $this->cell("ConvertDate", [$request->created]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php endif; ?>
                        </div>

                        <div class="related">
                            <?php if (!empty($student->scores)): ?>
                                <h4 class="text-right" dir="rtl"><?= __('#نمرات من') ?></h4>

                                <table class="table table-bordered" dir="rtl">
                                    <tr>
                                        <th class="text-center" style="width: 50%"><?= __('کلاس') ?></th>
                                        <th class="text-center"><?= __(' نمره') ?></th>
                                    </tr>
                                    <?php foreach ($student->scores as $item): ?>
                                        <tr>
                                            <td class="text-center text-primary"><?= $item->classroom->name ?></td>
                                            <td class="text-center"><?= $item->score ? $item->score : '<span class="text-warning"> نمره وارد نشده است </span>' ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
