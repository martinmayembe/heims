<?php

use app\models\LearningProgramme;
use app\models\University;
use app\models\User;
use yii\helpers\Html;

$this->title = 'Dashboard';
$programmes = LearningProgramme::find()->all();
$Quarter1;
$index1;
$Quarter2;
$index2;
$Quarter3;
$index3;
$Quarter4;
$index4;
    
    
    

$sum = count($programmes);
$js1 = "
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,\"Segoe UI\",Roboto,\"Helvetica Neue\",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var ctx1 = document.getElementById(\"programmeAccreditationChart\");
var accreditationChart = new Chart(ctx1, {
  type: 'doughnut',
  data: {
    labels: [\"Accredited\", \"Not Accredited\"],
    datasets: [{
      data: [".\app\models\LearningProgramme::find()->where(['status' => 'Accredited'])->count().", ".\app\models\LearningProgramme::find()->where(['status' => 'Not Accredited'])->count()."],
      backgroundColor: ['#4e73df', '#1cc88a'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: \"rgba(234, 236, 244, 1)\",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: \"rgb(255,255,255)\",
      bodyFontColor: \"#858796\",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});";
$js2 = "var ctx2 = document.getElementById(\"programmeEvaluationChart\");
var evaluationChart = new Chart(ctx2, {
  type: 'doughnut',
  data: {
    labels: [\"Collected for desk review\", \"Site Visit Conducted\"],
    datasets: [{
      data: [".\app\models\LearningProgramme::find()->where(['status' => 'Collected For Desk Review'])->count().", ".\app\models\LearningProgramme::find()->where(['status' => 'Site Visit Conducted'])->count()."],
      backgroundColor: ['#4e73df', '#1cc88a'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: \"rgba(234, 236, 244, 1)\",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: \"rgb(255,255,255)\",
      bodyFontColor: \"#858796\",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});";
$js3 = "var ctx3 = document.getElementById(\"EvaluationStatusChart\");
var statusChart = new Chart(ctx3, {
  type: 'doughnut',
  data: {
    labels: [\"Evaluated\", \"Not Evaluated\"],
    datasets: [{
      data: [".\app\models\LearningProgramme::find()->where(['or', ['status' => 'Collected For Desk Review'], ['status' => 'Site Visit Conducted'], ])->count()."],
      backgroundColor: ['#4e73df', '#1cc88a'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: \"rgba(234, 236, 244, 1)\",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: \"rgb(255,255,255)\",
      bodyFontColor: \"#858796\",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});";

$script = <<< JS
    $js1
    $js2
    $js3
  
JS;
$this->registerJs($script);
?>

<div class="row">
    <div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Universities</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= Html::encode(University::find()->count()) ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-building text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Programmes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= Html::encode(\app\models\LearningProgramme::find()->count()) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Programme Experts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= Html::encode(\app\models\ProgrammeExpert::find()->count()) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="far fa-address-book text-gray-500"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">Programmes by Accreditation</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="programmeAccreditationChart" class="chartjs-render-monitor" style="display: block; height: 245px; width: 307px;" width="614" height="490"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Not Accredited
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Accredited
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">Evaluated Programmes</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="memberMaritalChart" class="chartjs-render-monitor" style="display: block; height: 245px; width: 307px;" width="614" height="490"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Submitted for Desk Review
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Site Visit Conducted
                    </span>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">Programmes by Evaluation</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="memberStatusChart" class="chartjs-render-monitor" style="display: block; height: 245px; width: 307px;" width="614" height="490"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Evaluated
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Not Evaluated
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
