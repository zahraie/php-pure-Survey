<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('../includes/init.php') ;

    $role = "SELECT survey_education_id ,user_fullname ,AVG(survey_mark) as avg FROM `survey`
	inner join `users` on survey.survey_education_id = users.user_id
	GROUP BY survey_education_id";
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
// Setup the graph
$graph = new Graph(1200,600);
$graph->SetScale("intlin",0,$aYMax=3);

$theme_class= new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->SetMargin(40,40,50,40);

$graph->title->Set('Inverted Y-axis');
$graph->SetBox(false);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// For background to be gradient, setfill is needed first.
$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
$graph->SetBackgroundGradient('#FFFFFF', '#00FF7F', GRAD_HOR, BGRAD_PLOT);

$graph->xaxis->SetTickLabels($data1x);
$graph->xaxis->SetLabelMargin(20);
$graph->yaxis->SetLabelMargin(20);

$graph->SetAxisStyle(AXSTYLE_BOXOUT);
$graph->img->SetAngle(180);

// Create the line
$p1 = new LinePlot($data1y);
$graph->Add($p1);

$p1->SetFillGradient('#FFFFFF','#F0F8FF');
$p1->SetColor('#aadddd');

// Output line
$graph->Stroke();

?>
