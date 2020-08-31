<?php         

    date_default_timezone_set($this->session->userdata['time_zone']);

    $unread_messages = $this->db->where('message_read', 0)->from('messages')->count_all_results();
    $total_exams = $this->db->select('*')->from('exam_title')->count_all_results();
    $total_courses = $this->db->select('*')->from('courses')->count_all_results();
    $total_students = $this->db->where('user_role_id',5)->from('users')->count_all_results();



    $all_categories = $this->db->get('categories')->result();
    $active_category = count($this->db->get_where('categories', array('active' => 1))->result());
    $inactive_category = (count($all_categories) - $active_category);

    // Create the data table for EARNINGS.
    $data_earnings = "['Month', 'Earned'],";
    for ($i=0; $i < 6; $i++) { 
        $month_name = date('M', strtotime(-$i." month"));
        $month = date('m', strtotime(-$i." month"));

        $earned = $this->db->where("MONTH(pay_date)", $month)
                        ->select_sum('pay_amount')
                        ->get('payment_history')
                        ->row()->pay_amount;

         $earned = ($earned)?$earned:'0';

         $data_earnings .= "['".$month_name."',". $earned."],";
    }
    $data_earnings = substr($data_earnings, 0, -1);

    // Create the data table for EXAM.
    $data_exam = "['Category', 'Active', 'Inactive'],";
    
    foreach ($all_categories as $value) {
        $sub_categories = $this->db->where('cat_id', $value->category_id)->get('sub_categories')->result();

        $active_exams = 0;
        $inactive_exams = 0;

        foreach ($sub_categories as $val) {

            $active_exams += $this->db->where('category_id', $val->id)
                            ->where("active", 1)
                            ->from('exam_title')
                            ->count_all_results();

            $inactive_exams += $this->db->where('category_id', $val->id)
                            ->where("active", 0)
                            ->from('exam_title')
                            ->count_all_results();        
        }

        $data_exam .= "['".$value->category_name."',". $active_exams.",". $inactive_exams."],";
    }
    $data_exam = substr($data_exam, 0, -1);


?>



<script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table for USER.
        var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'Topping');
        data1.addColumn('number', 'Slices');
        data1.addRows([
          ['Admin', <?=$total_admin;?>],
          ['Moderator', <?=$total_moderator;?>],
          ['Teacher', <?=$total_teacher;?>],
          ['Student', <?=$total_student;?>]
        ]);

        // Create the data table for CATEGORY.
        var data2 = new google.visualization.DataTable();
        data2.addColumn('string', 'Topping');
        data2.addColumn('number', 'Slices');
        data2.addRows([
          ['Active', <?=$active_category;?>],
          ['Inactive', <?=$inactive_category;?>]
        ]);

        // Create the data table for EARNING.
        var data3 = google.visualization.arrayToDataTable([
            <?php echo $data_earnings; ?>
          ]);

        // Create the data table for EXAM.
        var data4 = google.visualization.arrayToDataTable([
            <?php echo $data_exam; ?>
          ]);

        // Set chart options USER
        var options1 = {
                       'legend':'left',
                       'is3D':true,
                       'width':400,
                       'height':300
                        };

        // Set chart options EARNINGS
        var options3 = {
           width: 400,
           height: 300,
           legend: 'left',
           bar: {groupWidth: '95%'},
            vAxis: {title: 'Month',  titleTextStyle: {color: 'gray'}}
          };
        // Set chart options EXAM
        var options4 = {
           width: 400,
           height: 300,
           legend: 'left',
           bar: {groupWidth: '95%'},
            hAxis: {title: 'Category', titleTextStyle: {color: 'red'}}
          };

        // Instantiate and draw our chart, passing in some options.
        var chart1 = new google.visualization.PieChart(document.getElementById('chart_user'));
        chart1.draw(data1, options1);
        var chart2 = new google.visualization.PieChart(document.getElementById('chart_category'));
        chart2.draw(data2, options1);
         var chart3 = new google.visualization.BarChart(document.getElementById('chart_earn'));
         chart3.draw(data3, options3);
        var chart4 = new google.visualization.ColumnChart(document.getElementById('chart_exam'));
        chart4.draw(data4, options4);




      }


</script>

<div class="row">
    <div class="col-sm-12 mb-4">
        <div class="card-group">
			
			
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-users"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count"><?= $total_students; ?></span>
                    </div>
                     <a href="<?= base_url('index.php/user_control'); ?>">
                    <small class="text-muted text-uppercase font-weight-bold">Total Students</small></a>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
			
			
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?= $unread_messages; ?></span>
                    </div><a href="<?= base_url('index.php/message_control'); ?>">
                    <small class="text-muted text-uppercase font-weight-bold">Unread Messages</small></a>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
			
			
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-bookmark-o"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?= $total_courses; ?></span>
                    </div><a href="<?= base_url('index.php/exam_control/view_results'); ?>">
                    <small class="text-muted text-uppercase font-weight-bold">Total Courses</small></a>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
			
			
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?= $total_exams; ?></span>
                    </div><a href="<?= base_url('index.php/mocks'); ?>">
                    <small class="text-muted text-uppercase font-weight-bold">Total Exams</small></a>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
			
			
        </div>
    </div>
	</div>








<div class="row">
<div class="col-md-12">
	
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Active users</h4>
                                <div class="flot-container">
                                    <div id="chart_user"></div>
                                </div>
                            </div>
                        </div><!-- /# card -->
                    </div>
	
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Total categories</h4>
                                <div class="flot-container">
                                    <div id="chart_category"></div>
                                </div>
                            </div>
                        </div><!-- /# card -->
                    </div>

</div>
</div>


<div class="row">
<div class="col-md-12">
	
	    <div class="col-lg-6">
    <div class="card"><!-- /.panel Start-->
		<div class="card-body">
    <h4 class="mb-3">Earnings (last 6 months) <?=$currency_code . ' ' . $currency_symbol;?></h4>
       <div id="chart_earn"></div>
		</div>
    </div><!-- /.panel End-->
    </div>
	
	<div class="col-lg-6">
    <div class="card"><!-- /.panel Start-->
		<div class="card-body">
			<h4 class="mb-3">Total exams based on category</h4>
        <div id="chart_exam"></div>
		</div>
    </div><!-- /.panel End-->
</div>
</div>
</div>