<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');
require_once ('../includes/init.php') ;

    $role = "SELECT survey_student_id ,user_role ,user_fullname ,AVG(survey_mark) as avg FROM `survey`
	inner join `users` on survey.survey_student_id = users.user_id
	GROUP BY survey_student_id";
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

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels($data1x);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#d7a4d8");

$graph->title->Set("Bar Plots");

// Display the graph
$graph->Stroke();
?>
