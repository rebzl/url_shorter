<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="<?= base_url('url-store') ?>" method="POST">
                    <h2 class="mb-3">Add URL</h2>
                    <div class="form-group mb-3">
                        <label class="mb-2" for="long_url">Please enter the URL you want to get shorter *</label>
                        <input type="text" class="form-control" name="long_url" id="long_url" placeholder="URL" required>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="nsfw" name="nsfw">
                        <label class="form-check-label" for="nsfw">Not Safe For Work</label>
                    </div>
                    <button type="submit" class="btn btn-dark">Convert to Short URL</button>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>