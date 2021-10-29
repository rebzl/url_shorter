<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>
    <div class="container">
        <?php
            if(session()->getFlashdata('error'))
            {
                echo "<h4>".session()->getFlashdata('error')."</h4>";
            }
            else
            {
                echo 
                "<h2 class='mb-4'>Shorter URL</h2>
                <p class='mb-4'>Click on the URL to be redirected to the original URL</p>
                <a href='".session()->getFlashdata('long_url')."' target='_blank'>
                    <h4>".session()->getFlashdata('short_url')."</h4>
                </a>";
            }
        ?>
    </div>

<?= $this->endSection() ?>