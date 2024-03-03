<!DOCTYPE HTML>
<?php include('header.php'); ?>
<?php
    $course_id = $_GET['course_id'];
?>
<!-- For the ratings read from review table -->
<?php
	$sum =0;
	$count =0;
    $count1 =0;
    $count2 =0;
    $count3 =0;
    $count4 =0;
    $count5 =0;
	$sql="SELECT * FROM tbl_reviews where course_id = $course_id";
	if($result=mysqli_query($conn,$sql))
	{
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_array($result))
			{
				$rating_data = $row['rating_data'];
                if($rating_data == 1){
                    $count1++;
                }
                if($rating_data == 2){
                    $count2++;
                }
                if($rating_data == 3){
                    $count3++;
                }
                if($rating_data == 4){
                    $count4++;
                }
                if($rating_data == 5){
                    $count5++;
                }
				$sum += $rating_data;
				$count++;
				
			}
		}
	}
	
	function realNum($num) {
		$num1 = floor($num);
		$num2 = $num1+.5;
		$num3 = $num1+1;
		if ($num >= $num1 && $num < $num2) {
			$answer = $num1;
		} 
		elseif ($num >= $num2 && $num < $num3) {
			$answer = $num2;
		}
		return $answer;
	}
    if($count !=0){
		$real_rating = $sum/$count;
	} else{
		$real_rating = 0;
	}
	$real_rating_final = realNum($real_rating);

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body style="bgcolor:#FCF3F3;">
    <div class="container">
    	<h1 class="mt-5 mb-5">Review & Rating</h1>
    	<div class="card">
    		<div class="card-header"></div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating"><?php echo $real_rating_final;?></span> / 5</b>
    					</h1>
    				
                        <div class="mb-3">
								<span class="average-rating">(<?php echo $real_rating_final ?>)</span>		
								<span class="average-stars">
								<?php
											if ($real_rating_final == 0){
												for ($i = 1; $i <= 5; $i++) {
													?>
													<span class="average-stars">
														<i class="fa-regular fa-star"></i>
													</span>
                                                    
													<?php
												}
											}
											for ($i = 1; $i <= floor($real_rating_final); $i++) {
												?>
												<span class="average-stars">
												<i  class="fas fa-star text-warning"></i>

												</span>
												<?php
											}
											$rem = $i-$real_rating_final;
											if($rem==0.5){
												?>
												<span class="average-stars">
												<i class="fas fa-star-half-alt text-warning"></i>

												</span>
												<?php
											}
										?>
								</span>
								
							</div>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review"><?php echo $count5;?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review"><?php echo $count4;?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review"><?php echo $count3;?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review"><?php echo $count2;?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review"><?php echo $count1;?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
    <div class="container">
        <!-- reviews list start -->
        <?php
										$sql="SELECT * FROM tbl_reviews where course_id = $course_id";
										if($result=mysqli_query($conn,$sql))
										{
											if(mysqli_num_rows($result)>0)
											{
												while($row=mysqli_fetch_array($result))
												{
													$user_name= $row['user_name'];
													$rating_data = $row['rating_data'];
													$user_review = $row['user_review'];
													$datetime = $row['datetime'];?>
													<div class="reviews-list">
														<!-- reviews item start -->
														<div class="reviews-item">
															<div class="img-box">
																<img src="img/review/1.png" alt="">
															</div>
															<h4><?php echo $user_name?></h4>
															<div class="stars-rating">
																<div class="rating">
																		<span class="average-rating">(<?php echo $rating_data ?>)</span>		
																		<span class="average-stars">
																		<?php
																					if ($rating_data == 0){
																						for ($i = 1; $i <= 5; $i++) {
																							?>
																							<span class="average-stars">
																								<i class="fas fa-star text-warning"></i>
																							</span>
																							<?php
																						}
																					}
																					for ($i = 1; $i <= floor($rating_data); $i++) {
																						?>
																						<span class="average-stars">
																						<i class="fas fa-star text-warning"></i>

																						</span>
																						<?php
																					}
																					$rem = $i-$rating_data;
																					if($rem==0.5){
																						?>
																						<span class="average-stars">
																						<i class="fas fa-star-half-alt text-warning"></i>
																						</span>
																						<?php
																					}
																				?>
																		</span>
																	</div>
																<span class="date"><?php echo $datetime;?></span>
															</div>
															<p><?php echo $user_review;?></p>
														</div>
														<!-- reviews item end -->
													</div>
												<?php
												}
											}
										}
									
									?>
									<!-- reviews list ends -->
    </div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review<?php echo $course_id;?></h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"a_submit_rating.php?course_id=<?php echo $course_id;?>",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();
                    window.location.reload();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"a_submit_rating.php?course_id=<?php echo $course_id;?>",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>