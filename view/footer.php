<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  const BASE_URL = "<?= BASE_URL ?>";
</script>
<script src="<?= BASE_URL ?>assets/bootstrap.js"></script>
<script src="<?= BASE_URL ?>ajaxScript.js"></script>
<script src="<?= BASE_URL ?>settings.js"></script>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Settings</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  
  <div class="offcanvas-body">
    <div>
      <!-- Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc. -->
      <p onclick="changeBgc()">
        Click to change bakcground color
      </p>
    </div>
    
  </div>
</div>  
  </body>
</html>