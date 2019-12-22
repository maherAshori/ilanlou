<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('/web/plugins/iranfont/fontiran.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('/web/js/jquery-3.2.1.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
            <h1><a href=""><?= $this->fetch('title') ?></a></h1>
        </li>
    </ul>
    <div class="top-bar-section">
        <ul class="left">
            <li>
                <?= $this->Html->link($user->firstName . ' ' . $user->lastName, ['controller' => $this->request->getParam("prefix") == 'admin' ? 'Users' : 'Teachers', 'action' => 'view', $user->id]) ?>
            </li>
            <li>
                <?= $this->Html->link('خروج از پنل', ['controller' => $this->request->getParam("prefix") == 'admin' ? 'Users' : 'Teachers', 'action' => 'logout']) ?>
            </li>
        </ul>
    </div>
</nav>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <?php if ($this->request->getParam("prefix") == 'admin'): ?>
            <ul class="side-nav">
                <li><?= $this->Html->link(__('شعبه ها'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('دوره ها'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('ترم ها'), ['controller' => 'Terms', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('کلاس ها'), ['controller' => 'Classrooms', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('کاربران پنل'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('دانش آموزان'), ['controller' => 'Students', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('آموزگاران'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('اخبار ورویدادها'), ['controller' => 'Events', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('درخواست ها'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('پیام ها'), ['controller' => 'Notifications', 'action' => 'index']) ?></li>
            </ul>
        <?php endif; ?>

        <?php if ($this->request->getParam("prefix") == 'teacher'): ?>
            <ul class="side-nav">
                <li><?= $this->Html->link(__('Profile'), ['controller' => 'Teachers', 'action' => 'view']) ?></li>
            </ul>
        <?php endif; ?>
    </nav>
    <div class="large-9 medium-8 columns content">
        <?= $this->fetch('content') ?>
    </div>
</div>
<footer>
</footer>
</body>
</html>
