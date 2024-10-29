<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume Keyword Analyzer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex justify-content-center">
    <div class="d-flex justify-content-center mt-4 flex-column w-full">
      <div class="card d-flex justify-content-center" style="width: 40rem;">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="card-body d-flex justify-content-center">
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Multiple files(pdf only):</label>
              <input class="form-control" type="file" name="pdf_files[]" id="formFileMultiple" multiple>
              <div class="d-flex justify-content-end">
                <button class="btn btn-primary mt-2" name="submit" type="submit">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="d-flex justify-content-center mt-4">
        <div>
          <?php
           include_once('code.php');
          ?>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>