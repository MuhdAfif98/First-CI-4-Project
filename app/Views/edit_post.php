<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1><?= $title ?></h1>

<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <form method="post">

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="post_title" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $post['post_title'] ?>">
            </div>

            <div class="form-group">
                <label for="">Content</label>
                <textarea class="form-control" name="post_content" id="" rows="3"><?= $post['post_content'] ?></textarea>
            </div>
            &nbsp;
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>