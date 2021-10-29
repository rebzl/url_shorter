<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>
    <div class="container">
        <?php
            if(session()->getFlashdata('status'))
            {
                echo "<h4>".session()->getFlashdata('status')."</h4>";
            }
        ?>
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Top URL</h2>
                <hr>
                <ul class="mt-4">
         
                    <?php foreach($url as $u) : ?>
                
                        <li class="mb-3">
                            
                            <?php if($u['nsfw']) :?>
                                <div class="d-flex">
                                    <div class="fs-5" onclick="displayModal()">
                                        <?= $u['short_url'] ?>
                                    </div>
                                    <span class="badge bg-danger mx-3 m-auto" >NSFW</span>
                                </div>
                                <div class="modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Not Safe for Work</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>This is a NSFW content</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn btn-dark" href=<?=$u['long_url']?>>Go to URL anyway.</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else :?>
                                <a class="text-decoration-none text-dark fs-5" href=<?=$u['long_url']?>><?= $u['short_url'] ?></a>
                            <?php endif ; ?>
                        </li>
                        
                        
                    <?php endforeach; ?>
                </ul>

            </div>
           
        </div>
    </div>
    
    <script>
        function displayModal() {
            document.querySelector(".modal").style.display = "block";
            setTimeout(function(){ 
                document.querySelector(".modal").style.display = "none";
                
            }, 10000); 
           
        }
    </script>
 
<?= $this->endSection() ?>
