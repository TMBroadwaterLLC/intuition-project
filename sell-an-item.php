<? include("inc/incfiles/header.inc.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>inTuition</title>
</head>

<body>
	<div class="container">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">What are you selling?</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter item description">
          </div>
          <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
          	Choose a Category
          <span class="caret"></span>
          </button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
              </ul>
            </div>
          <div class="form-group">
            <label for="exampleInputFile">Upload Photo</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Max size 25MB.</p>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">What is your item worth?</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Item price">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
	</div><!--end container-->
</body>
</html>