<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image Manipulation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Image Manipulation</h1>
        <?php if (isset($validation)) : ?>
            <div class="text-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlFile1" class="form-label">Upload File</label>
                <input type="file" multiple name="theFile[]" id="" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php if(isset($image)) : ?>
            <div class="row">
                <div class="col-md-4 mt-4">
                    <h4>Original</h4>
                    <img src="<?= src($image) ?>" alt="" class="img-fluid">
                </div>
                <?php foreach($folders as $folder) : ?>
                    <div class="col-md-4 mt-4">
                        <h4><?= ucfirst($folder) ?></h4>
                        <img src="<?= src($image, $folder) ?>" alt="" class="img-fluid">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>