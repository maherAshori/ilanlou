<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content">
            <div class="row">
                <div class="col">
                    <div class="regular_title text-right">
                        <?= h($term->name) ?>
                    </div>
                    <div class="regular_text text-right" dir="rtl">

                        <ul class="list- mb-3" dir="rtl">
                            <li class="list-group-item">
                                شعبه: <?= $this->Html->link($term->branch->name . '<i class="fa fa-external-link mr-2"></i>', ['controller' => 'Branches', 'action' => 'view', $term->branch->slug], ['class' => 'ml-3', 'escape' => false]); ?> <small>(نمایش سایر ترم ها در این شعبه)</small>
                            </li>
                        </ul>

                        <?= $this->Text->autoParagraph(h($term->description)); ?>

                        <h6>دوره ها</h6>
                        <?php if (!empty($term->classrooms)): ?>
                            <div class="row">
                                <?php foreach ($term->classrooms as $classrooms): ?>
                                    <div class="col-lg-3 col-md-4 col-12 text-center mb-3">
                                        <?= $this->Html->link('<div class="card"><div class="card-body">'.h($classrooms->name).'</div></div>', ['controller' => 'classrooms', 'action' => 'view', $classrooms->slug], ['escape'  => false]) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
