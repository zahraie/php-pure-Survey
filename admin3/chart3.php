<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('../includes/init.php') ;

    $role = "SELECT survey_scientific_id ,user_fullname ,AVG(survey_mark) as avg FROM `survey`
	inner join `users` on survey.survey_scientific_id = users.user_id
	GROUP BY survey_scientific_id";
    $stmt = $con->prepare($role);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//echo var_dump ($result);
	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}
// Some data
$data1y=[];
$data1x=[];

foreach ($data as $d) {
	$data1y[] = floatval($d['avg']);
	$data1x[] = $d['user_fullname'];
}

// Setup the graph
$graph = new Graph(1200,600);
$graph->SetScale("intlin",0,$aYMax=3);
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->SetBox(false);

$graph->title->Set('Step Line');
$graph->ygrid->Show(true);
$graph->xgrid->Show(false);
$graph->yaxis->HideZeroLabel();
$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
$graph->SetBackgroundGradient('blue', '#55eeff', GRAD_HOR, BGRAD_PLOT);
$graph->xaxis->SetTickLabels($data1x);

// Create the line
$p1 = new LinePlot($data1y);
$graph->Add($p1);

$p1->SetFillGradient('yellow','red');
$p1->SetStepStyle();
$p1->SetColor('#808000');

// Output line
$graph->Stroke();

?>
