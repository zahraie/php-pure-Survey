<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('../includes/init.php') ;

    $role = "SELECT survey_research_id ,user_fullname ,AVG(survey_mark) as avg FROM `survey`
	inner join `users` on survey.survey_research_id = users.user_id
	GROUP BY survey_research_id";
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
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Filled Y-grid');
$graph->SetBox(false);

$graph->SetMargin(40,20,36,63);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($data1x);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($data1y);
$graph->Add($p1);
$p1->SetColor("#995525");
$p1->SetLegend('Line 1');


$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>
