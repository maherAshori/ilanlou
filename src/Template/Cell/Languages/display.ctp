<div class="language">
    <div class="container">
        <div class="row">
            <?php foreach ($languages as $language): ?>

                <!-- Flag -->
                <div class="col text-center">
                    <?= $this->Html->link('<div class="flag">'.$this->Html->image('/uploads/languages/'.$language->image).'</div><small class="mt-2 text-dark">'.h($language->title).'</small>', ['controller'=>'Languages', 'action'=>'view', $language->title], ['escape' => false]); ?>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>



