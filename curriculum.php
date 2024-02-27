




<!--course curriculum starts-->
<div class="tab-pane fade  show active" id="course-curriculum" role="tabpanel" aria-labelledby="course-curriculum-tab">
	<div class="course-curriculum box">
		<h3 class="text-capitalize">curriculum</h3>

		<!-- bootstrap accordion -->
		<div class="accordion" id="accordionExample">
		<div class="accordion-item">
			<h2 class="accordion-header" id="headingOne">
			
			<?php  
			$sql2="SELECT * FROM tbl_lesson where course_id=".$course_id;

			$res2=mysqli_query($conn,$sql2);

			$count2=mysqli_num_rows($res2);

			if($count2>0)
			{
				while($row2=mysqli_fetch_assoc($res2))
				{
					$lesson_id=$row2['id'];
					$lesson_name=$row2['lesson_name'];

			?>
			<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $lesson_id ?>" aria-expanded="true" aria-controls="collapse-<?php echo $lesson_id ?>">
				<!-- Accordion Item is lesson_name -->
				<?php echo $lesson_name; ?>
				<?php 
				$totalTime = 0;	
				$sql3 = "SELECT tbl_sublesson.sublesson_id, tbl_sublesson.sublesson_name, tbl_sublesson.duration, COUNT(DISTINCT tbl_sublesson.sublesson_id) as sublessonsCount
         FROM tbl_sublesson
         INNER JOIN tbl_lesson ON tbl_sublesson.lesson_id = tbl_lesson.id
         INNER JOIN tbl_course ON tbl_lesson.course_id = tbl_course.id
         WHERE tbl_course.id = '$course_id'
         GROUP BY tbl_sublesson.sublesson_id, tbl_sublesson.sublesson_name, tbl_sublesson.duration";
					
						$res3 = mysqli_query($conn, $sql3);
						while ($row3 = mysqli_fetch_assoc($res3)){
							$sublessonsCount = $row3['sublessonsCount'];
							$duration = $row3['duration'];
							list($hours, $minutes, $seconds) = explode(':', $duration);
    						$durationInSeconds = $hours * 3600 + $minutes * 60 + $seconds;
						
							$totalTime += $durationInSeconds;
						}
						$formattedTotalTime = gmdate("H:i:s", $totalTime);
						
				?>						
				<span><?php echo $sublessonsCount?>lectures | <?php echo $formattedTotalTime; ?></span>
			</button>
			<?php   } }?>	
			
			<div id="collapse-<?php echo $lesson_id ?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
			<div class="accordion-body">
				<ul>
					<li>
						<i class="fas fa-play-circle"></i>
						<?php	
						$totalTime = 0;									
						$res4 = mysqli_query($conn, $sql3);
						while ($row4 = mysqli_fetch_assoc($res4)){
							
							$sublesson_id=$row4['sublesson_id'];
							$sublesson_name=$row4['sublesson_name'];
							$video=$row4['sublesson_video'];
							$duration = $row4['duration'];

							?>
							<?php echo $sublesson_name; ?>
							<span><?php echo $duration;?></span>
						<?php } 

						?>
						
					</li>
				</ul>
			</div>
			</div>
		</div>
		</div>
		<!-- bootstrap accordion -->
	
	</div>
</div>
<!--course curriculum ends-->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myAccordion = new bootstrap.Collapse(document.getElementById('accordionExample'), {
            toggle: false  // Set to true if you want only one panel to be open at a time
        });
    });
</script>
