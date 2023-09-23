<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratory 1</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body style="background-color: #efdecd;">


  <table class="table table-striped mt-3">
      <thead>
          <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Product Description</th>
              <th>Product Category</th>
              <th>Product Quantity</th>
              <th>Product Price</th>
              <th></th>
          </tr>
      </thead>

      <tbody>
          <?php foreach ($lab1 as $us): ?>
              <tr data-category="<?= $us['ProductCategory'] ?>">
                  <td><?= $us['ID'] ?></td>
                  <td><?= $us['ProductName'] ?></td>
                  <td><?= $us['ProductDescription'] ?></td>
                  <td><?= $us['ProductCategory'] ?></td>
                  <td><?= $us['ProductQuantity'] ?></td>
                  <td><?= $us['ProductPrice'] ?></td>
                  <td>
                      <a href="/edit/<?= $us['ID']?>" class="btn btn-primary" style="background-color: #a48665">Edit</a>
                      &nbsp;
                      <a href="/delete/<?= $us['ID']?>" class="btn btn-danger" style="background-color: #a48665">Delete</a>
                  </td>
              </tr>
          <?php endforeach; ?>
      </tbody>
  </table>

  <script>
      document.getElementById('categoryFilter').addEventListener('change', function() {
          var selectedCategory = this.value;
          var rows = document.querySelectorAll('tbody tr');
          rows.forEach(function(row) {
              var rowCategory = row.getAttribute('data-category');
              if (selectedCategory === 'All' || selectedCategory === rowCategory) {
                  row.style.display = 'table-row';
              } else {
                  row.style.display = 'none';
              }
          });
      });
  </script>



<div class="container mt-4">
     <div class="left">


	<h3>Product Info</h3>
	<br>
    <form action="/insert" method="post">
        <input type="hidden" name="ID" value="<?= isset($user['ID']) ? $user['ID'] : '' ?>">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="ProdName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="ProdName" id="ProdName" placeholder="Enter Name" value="<?= isset($user['ProductName']) ? $user['ProductName'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="ProdDesc" class="form-label">Description</label>
                    <!-- Increase the height of the input box here -->
                    <input type="text" class="form-control" name="ProdDesc" id="ProdDesc" placeholder="Enter Description" style="height: 100px;" value="<?= isset($user['ProductDescription']) ? $user['ProductDescription'] : '' ?>">



            <!-- Right Column -->
          <div class="col-md-12">
		    <div class="row">
		        <div class="col-md-6 mb-3">
		            <label for="ProdCat" class="form-label">Category</label>
		            <input type="text" class="form-control" name="ProdCat" id="ProdCat" placeholder="Enter New Category" value="<?= isset($user['ProductCategory']) ? $user['ProductCategory'] : '' ?>">
		        </div>
		        <div class="col-md-6 mb-3">
		            <label for="SelectProdCat" class="form-label">Select Category</label>

		            <select class="form-select d-inline-block ml-2" name="SelectProdCat" id="SelectProdCat">
		                <?php
		                foreach ($lab1 as $us) {
		                    echo "<option>{$us['ProductCategory']}</option>";
		                }
		                ?>
                    </select>
                    <label for="SelectProdCat" class="form-label">View All Category</label>

                   <select class="form-select d-inline-block ml-2 right" id="categoryFilter">
                     <option value="All">All</option> <!-- Add an "All" option -->
                       <?php
                       foreach ($lab1 as $us) {
                           echo "<option>{$us['ProductCategory']}</option>";
                       }
                       ?>
                   </select>

		    </div>

		<script>
		    document.getElementById('SelectProdCat').addEventListener('change', function() {
		        var selectedValue = this.value;
		        document.getElementById('ProdCat').value = selectedValue;
		    });
		</script>




                <div class="mb-3">
                    <label for="ProdQuan" class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="ProdQuan" id="ProdQuan" placeholder="Enter Quantity" value="<?= isset($user['ProductQuantity']) ? $user['ProductQuantity'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="ProdPr" class="form-label">Price</label>
                    <input type="text" class="form-control" name="ProdPr" id="ProdPr" placeholder="Enter Price" value="<?= isset($user['ProductPrice']) ? $user['ProductPrice'] : '' ?>">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #a48665">Save</button>
        &nbsp;
        <a href="/lab1" class="btn btn-primary" style="background-color: #a48665">New</a>
    </form>
  </div>
</div>



<br>
 <br>
<div class="mt-5">
  <div class="container mt-4">
    <div class="card p-4">
       <div class="right">


  <h3 class="d-inline-block">Product List</h3>
  <br>

   	<table class="table table-striped mt-3">
<ul style="list-style-type:square">

	<?php foreach ($lab1 as $us): ?>
    <br>

		                <li><b>Product ID:   &nbsp;&nbsp;</b><?= $us['ID'] ?></li>
		                <li><b>Name:   &nbsp;&nbsp;</b><?= $us['ProductName'] ?></li>
		                <li><b>Description:   &nbsp;&nbsp;</b><?= $us['ProductDescription'] ?></li>
		                <li><b>Category: 	&nbsp;&nbsp;</b><?= $us['ProductCategory'] ?></li>
		                <li><b>Quantity:	&nbsp;&nbsp;</b><?= $us['ProductQuantity'] ?></li>
		                <li><b>Price: 	 &nbsp;&nbsp;</b><?= $us['ProductPrice'] ?></li>
                    <br />
                      </ul>
		                    <a href="/edit/<?= $us['ID']?>" class="btn btn-primary" style="background-color: #a48665">Edit</a>
                        &nbsp;
		                    <a href="/delete/<?= $us['ID']?>" class="btn btn-danger" style="background-color: #a48665">Delete</a>
		                </li>
		               <br>
                   <br>
                    <br>
		        <?php endforeach; ?>
            </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
