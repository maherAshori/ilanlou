<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        ilanlou - page not found
    </title>

    <?= $this->Html->css('/web/styles/bootstrap4/bootstrap.min.css') ?>
</head>
<body>
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>
