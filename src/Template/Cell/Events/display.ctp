<?php if(!empty($events)): ?>
<div class="events">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="section_title text-center">
                    رویدادها
                </h2>
            </div>
        </div>
        <div class="row events_row">
            <?php foreach ($events as $event): ?>
            <!-- Event -->
            <div class="col-lg-4 event_col">
                <div class="event">
                    <div class="event_image">
                        <?= $this->Html->image('/uploads/events/'.$event->image) ?>
                    </div>
                    <div class="event_date d-flex flex-column align-items-center justify-content-center" title="<?= $this->cell("ConvertDate", [$event->creation_date, 'y']) ?>">
                        <div class="event_day">
                            <?= $this->cell("ConvertDate", [$event->creation_date, 'd']) ?>
                        </div>
                        <div class="event_month">
                            <?= $this->cell("ConvertDate", [$event->creation_date, 'm']) ?>
                        </div>
                    </div>
                    <div class="event_body text-right">
                        <div class="event_title pt-3">
                            <?= $this->Html->link($event->title, ['controller' => 'Events', 'action' => 'view', $event->slug]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
