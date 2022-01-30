
<?php if (Yii::$app->session->hasFlash("error")): ?>
<?php
    $session = \Yii::$app->getSession();
    $session->setFlash("error", "Se a eliminado con Exito!"); ?>
    <?= \odaialali\yii2toastr\ToastrFlash::widget([
  "options" => [
      "closeButton"=> true,
      "debug" =>  false,
      "progressBar" => true,
      "preventDuplicates" => true,
      "positionClass" => "toast-top-right",
      "onclick" => null,
      "showDuration" => "100",
      "hideDuration" => "1000",
      "timeOut" => "2000",
      "extendedTimeOut" => "100",
      "showEasing" => "swing",
      "hideEasing" => "linear",
      "showMethod" => "fadeIn",
      "hideMethod" => "fadeOut"
      ]
  ]);?>
<?php endif; ?> <?php

include '../include/dbconnect.php';

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



// CONSULTA PARA OBTENER EL NOMBRE DEL USUARIO
    $queryUsuarios = "SELECT concat(u.Nombres,' ',u.Apellidos ) as 'NOMBRE' FROM consulta c 
      INNER JOIN usuario u on c.IdUsuario = u.IdUsuario";
    $resultadoUsuarios = $mysqli->query($queryUsuarios);
    while ($test = $resultadoUsuarios->fetch_assoc()) {
        $IdUsuarios = $test['NOMBRE'];
    }

$this->title = 'Administrador de Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>

      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                                    <?= GridView::widget([
                      'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                          'IdConsulta',
                          [
                            'attribute'=>'IdPersona',
                            'value'=>'persona.FullName',
                          ],
                          'FechaConsulta',
                          // 'IdUsuario',

                          [
                            'attribute'=>'IdModulo',
                            'value'=>'modulo.NombreModulo',
                          ],
                          //'Diagnostico:ntext',
                          // 'Comentarios:ntext',
                          // 'Otros:ntext',
                          // 'IdEnfermedad',
                          // 'FechaConsulta',
                          // 'Activo',
                          // 'IdEstado',
                          // 'Status',
                          // 'EstadoNutricional:ntext',
                          // 'CirugiasPrevias:ntext',
                          // 'MedicamentosActuales:ntext',
                          // 'ExamenFisica:ntext',
                          // 'PlanTratamiento:ntext',
                          // 'FechaProxVisita',
                          // 'Alergias:ntext',
                          // 'Consultaimaurl',
                          ['class' => 'yii\grid\ActionColumn',
                           'options' => ['style' => 'width:100px;'],
                           'template' => " {view} {update} {delete} "
                          ],
                          ],
                      ]); ?>
                                  </table>
          </div>
      </div>
    </div>
</div>
