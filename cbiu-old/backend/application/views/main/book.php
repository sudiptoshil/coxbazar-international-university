
<div>
  <h1 class="text-center mt-5"> Books</h1>
</div>


<div class="container mt-5 mb-5"> 

  <div id="accordion" class="row">

<?php $i=1; foreach ($all as $item): ?>
    <div class="col-md-6 col-6 card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <?php echo $item['title']?>
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
         <?php echo $item['short']?>
<a href="<?php echo base_url(); ?>book_upload/<?php echo $item['id']?>.pdf" target="_blank" type="button" class="btn btn-primary mt-4">Download</a>
          
        </div>
      </div>
    </div>
<?php endforeach; ?>
  </div>
<?php echo $links; ?>


</div>
