<?php
	$ORDER_ID = "";

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

	} 

?>  
<?php include('header.php');
include('navbar.php'); 
?>
<div class="col-sm-9 container-fluid " style="margin-top: 30px; margin-left:260px;">
<div class="main-content" style="margin-top:-30px">
     <h2 class="my-4">Payment Status </h2>
     <form method="post" action="">
     <div class="form-group row">
        <label for="ORDER_ID" class="offset-sm-1 col-form-label">Order ID: </label>
        <div>
          <input type="text" class="form-control mx-3" id="ORDER_ID" tabindex="1" maxlength="10" size="10" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
        </div>
        <br> <br>
        <div>
          <input class="btn btn-primary mx-4" value="View" type="submit">
        </div>
      </div>
      
     </form>
    </div>
    <div class="container">
    <?php
      if (isset($responseParamList) && count($responseParamList)>0 )
      { 
        $sql = "SELECT order_id FROM courseorder";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
          if($responseParamList["ORDERID"] == $row["order_id"]){     
      ?>
            <div class="row justify-content-center">
              <div class="col-auto">
                <h2 class="text-center">Payment Receipt</h2>
                <table class="table table-bordered">
                 <tbody>
                  <?php
                    foreach($responseParamList as $paramName => $paramValue) {
                  ?>
                  <tr >
                    <td><label><?php echo $paramName?></label></td>
                    <td><?php echo $paramValue?></td>
                  </tr>
                  <?php
                    }
                  ?>
                  <tr>
                    <td></td>
                    <td><button class="btn btn-primary" onclick="javascript:window.print();">Print Receipt</button></td>
                  </tr>
                  </tbody>
                </table>
          <?php
          } 
        } 
    } 
      ?>
      
      </div>
      </div>

    </div> 
    </div>  <!-- div Row close from header -->
</div>  <!-- div Conatiner-fluid close from header -->
</div>

<!-- ------------------------------------------------------------------ -->



