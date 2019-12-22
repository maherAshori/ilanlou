<?php
$this->assign('title', $classroom->name);

use Cake\Routing\Router;
?>

<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content">

            <div class="row">
                <div class="col">
                    <div class="regular_title text-right">
                        <?= h($classroom->name) ?>

                        <?php if($classroom->points): ?>
                        <span class="float-left h6 mt-2 text-muted">
                            امتیاز کلاس: <span class="ml-3 text-warning"><?= $classroom->points->avgVotes ?> از <?= $classroom->points->allVotes ?> کاربر</span>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="regular_text">
                        <ul class="list-group text-right" dir="rtl">
                            <li class="list-group-item">
                                ترم: <?= $this->Html->link($classroom->term->name . '<i class="fa fa-external-link mr-2"></i>', ['controller' => 'Terms', 'action' => 'view', $classroom->term->slug], ['class' => 'ml-3', 'escape' => false]); ?> <small>(نمایش سایر کلاس ها در این ترم)</small>
                            </li>
                            <li class="list-group-item">
                                آموزگار: <?= $this->Html->link($classroom->teacher->fullName . '<i class="fa fa-external-link mr-2"></i>', ['controller' => 'Teachers', 'action' => 'view', $classroom->teacher->slug], ['class' => 'ml-3', 'escape' => false]) ?> <small>(درباره آموزگار)</small>
                            </li>
                            <li class="list-group-item">
                                <?php if(!$classroom->registred): ?>
                                    مبلغ: <?= $classroom->price != 0 ? '<span class="text-danger ml-3">'.$this->Number->format($classroom->price).' (تومان)</span>' : 'رایگان' ?>
                                <?php endif; ?>
                                <?php if($classroom->registred): ?>
                                    <span class="text-success">شما در این کلاس ثبت نام کرده اید</span>
                                <?php endif; ?>

                                <div class="float-left">
                                    <?php if($auth && !$classroom->registred): ?>
                                        <?php if($classroom->requested): ?>
                                            <button type="button" class="btn btn-sm btn-secondary disabled">
                                                منتظر پاسخ درخواست
                                            </button>
                                        <?php endif; ?>
                                        <?php if(!$classroom->requested): ?>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#request">
                                                درخواست ثبت نام در این کلاس
                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(!$auth && !$classroom->registred): ?>
                                        <?= $this->Html->link('جهت درخواست ثبت نام ابتدا وارد شوید', ['controller' => 'Students', 'action' => 'login', "redirect"=>Router::url()], ['class' => 'btn btn-sm btn-primary']) ?>
                                    <?php endif; ?>
                                </div>
                            </li>
                        </ul>
                        <div class="mt-4 text-right" dir="rtl">
                            <h6>درباره کلاس</h6>
                            <div lang="fa">
                                <?= $this->Text->autoParagraph(h($classroom->description)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" dir="rtl">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">درخواست ثبت نام</h5>
            </div>
            <div class="modal-body text-right">
                <p>بعد از درخواست ثبت نام در این کلاس</p>
                <p>جهت بررسی درخواست با شما تماس گرفته خواهد شد</p>
            </div>
            <div class="modal-footer">
                <?= $this->Form->postLink(__('ارسال درخواست'), ['action' => 'request', $classroom->id], ['class' => 'btn btn-primary']) ?>
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">انصراف</button>
            </div>
        </div>
    </div>
</div>
