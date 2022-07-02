<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');
require_once ('../includes/init.php') ;

    $role = "SELECT survey_faculty_id ,user_fullname ,AVG(survey_mark) as avg FROM `survey`
	inner join `users` on survey.survey_faculty_id = users.user_id
	GROUP BY survey_faculty_id";
    $stmt = $con->prepare($role);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//echo var_dump ($result);
	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

$data1y=[];
$data1x=[];

foreach ($data as $d) {
	$data1y[] = floatval($d['avg']);
	$data1x[] = $d['user_fullname'];
}



// Create the graph. These two calls are always required
$graph = new Graph(1200,600,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels($data1x);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("red","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(200);
$graph->title->Set("Bar Gradient(Left reflection)");

// Display the graph
$graph->Stroke();
?>
