<?php require(__DIR__.'/../header.php'); ?>
    <div class="card mt-4" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?=$article->getTitle();?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?=$article->getAuthorId()->getNickname();?></h6>
        <p class="card-text"><?=$article->getText();?></p>
        <a href="dirname($_SERVER['SCRIPT_NAME'])?>/article/article/edit/<?=$article -> getId();?>" class="btn btn-primary">Edit article</a>
        <a href="dirname($_SERVER['SCRIPT_NAME'])?>/article/article/delete/<?=$article -> getId();?>" class="btn btn-warning">Delete article</a>
        

    </div>
</div>
<?php require(__DIR__.'/../footer.php'); ?>