<?php // content="text/plain; charset=utf-8"
// $Id: groupbarex1.php,v 1.2 2002/07/11 23:27:28 aditus Exp $
ini_set("display_errors",1);

class PollGraph extends Acontroller{
    public function createGraph(){
        require_once ('libraries/jpgraph/jpgraph.php');
        require_once ('libraries/jpgraph/jpgraph_bar.php');
        
        $question_id = $_GET['question'];
        //$option_id = $_GET['option'];
        
        $objUser = $this->loadModel("User");
        $data = $objUser->getTotalPoll($question_id);
        if(!empty($data)){
            $count = $data[0]['count'];                    
        }        
        
        
        $datay1=array($count);
        //$datay2=array(35);
        //$datay3=array(20,70,70,140,230,260);
        //$datay4=array(22,25,85,190,200,240);
         
        $graph = new Graph(500,420,'auto');    
        $graph->SetScale("textlin");
        
        $graph->Set90AndMargin(100,30,50,20);
        
        $graph->SetShadow();
        //$graph->img->SetMargin(40,30,40,40);
        $graph->xaxis->SetTickLabels($gDateLocale->GetShortMonth());
         
        $graph->xaxis->title->Set('Year 2002');
        $graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
         
        $graph->title->Set('Group bar plot');
        $graph->title->SetFont(FF_FONT1,FS_BOLD);
         
        $bplot1 = new BarPlot($datay1);
        //$bplot2 = new BarPlot($datay2);
        //$bplot3 = new BarPlot($datay3);
        //$bplot4 = new BarPlot($datay4);
         
        $bplot1->SetFillColor("orange");
        //$bplot2->SetFillColor("brown");
        //$bplot3->SetFillColor("darkgreen");
        //$bplot4->SetFillColor("red");
         
        $bplot1->SetShadow();
        //$bplot2->SetShadow();
        //$bplot3->SetShadow();
        //$bplot4->SetShadow();
        
        $bplot1->SetShadow();
        //$bplot2->SetShadow();
        //$bplot3->SetShadow();
        //$bplot4->SetShadow();
        
        $gbarplot = new GroupBarPlot(array($bplot1));//,$bplot2,$bplot3,$bplot4));
        $gbarplot->SetWidth(0.6);
        $graph->Add($gbarplot);
         
        $graph->Stroke();
    }
}
// $objPoll = new PollGraph();
// $objPoll->createGraph();
?>