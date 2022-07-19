
<h1><?= $title ?></h1>

<div>

<?php foreach($posts as $post) :?>
<div>
    <h3><?= $post ?> </h3>
    <img src="/assets/images/avatar.jpeg" style="width:200px" alt="">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi aut provident ratione nesciunt asperiores suscipit quasi aspernatur, necessitatibus, eveniet maiores, minus cumque a. Recusandae debitis neque ullam qui quam rem.</p>
</div>
<?php endforeach; ?>
</div>