<?php require(__DIR__.'/../header.php'); ?>
    <div class="card mt-4" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?=$article->getTitle();?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?=$article->getAuthorId()->getNickname();?></h6>
        <p class="card-text"><?=$article->getText();?></p>
        <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/edit/<?=$article->getId();?>" class="btn btn-primary">Edit article</a>
        <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/delete/<?=$article->getId();?>" class="btn btn-warning">Delete article</a>
        <form action="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/comment/<?=$article->getId();?>" method="POST">
            <label for="text"> Comment acticle</label>
            <input type="text" id="text" name="text">
            <input type="hidden" id="authorId" name="authorId" value="<?=$article->getAuthorId()->getId();?>">
            <input type="hidden" id="articleId" name="articleId" value=" <?=$article->getId();?>">
            <button type="submit" class="btn btn-primary">Add comment</button>
        </form>
        <h3>Comments</h3>

        <?php foreach($comments as $comment):?>
            <div data-id="<?=$comment->getId();?>" style="border: solid 1px black; padding: 5px 7px; border-radius: 10px; margin-bottom: 10px;">
                <p>Author <span><?=$comment->getAuthorId()->getNickname();?></span></p>
                <p><?=$comment->getText();?></p>
                <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/comment/delete/<?=$comment->getId();?>" class="btn btn-danger">Delete comment</a>
            </div>
         <?php endforeach;?>

    </div>
</div>
<?php require(__DIR__.'/../footer.php'); ?>