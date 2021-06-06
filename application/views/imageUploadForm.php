<!doctype html>
<html>
  <head>
   <title>Codeigniter - Upload Multiple Files and Images Example - ItSolutionStuff.com</title>
  </head>
  <body>

    <strong><?php if(isset($totalFiles)) echo "Successfully uploaded ".count($totalFiles)." files"; ?></strong>
    
    <form method='post' action='<?php echo site_url('image-upload/post') ?>' enctype='multipart/form-data'>

      <input type='file' name='files[0]' > <br/><br/>
      <input type='file' name='files[1]' > <br/><br/>
      <input type='file' name='files[2]' > <br/><br/>
      <input type='file' name='files[3]' title="Dokumen 1"> <br/><br/>
      <input type='submit' value='Upload' name='upload' />

    </form>
 
  </body>
</html>