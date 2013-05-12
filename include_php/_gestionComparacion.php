<?php

//include_once 'DB/productoDB.php';
//include_once '../config.inc.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _gestionComparacion
 *
 * @author Angel
 */

    //put your code here
class gestorComparacion{
    public function compararProductos(){        
        $tablas = "";
        $caracteristicas =array();
        if(isset($_GET['idComp'])){
        for($i=0;$i < count($_GET['idComp']); $i++){        
//            echo $_GET['idComp'][$i];
            $caracteristicas[$i] = obtenerCaracteristicasDelProducto($_GET['idComp'][$i]);
//            echo json_encode($caracteristicas[$i])."XXX<br>";
            
        }
//        echo json_encode($caracteristicas);
//        if(count($caracteristicas)>=1){
$tablas .= '        
<table width="200" border="1">
  <tr>
    <th>Caracteristicas</th>';
        for($i = 0 ;  $i < count($_GET['nomComp']); $i++){
            $tablas.= '<th>'.$_GET['nomComp'][$i].'</th>';
        }
  $tablas .='</tr>
  <tr>
    <td>Precio</td>';
        for($i = 0 ;  $i < count($caracteristicas); $i++){
            if(isset($caracteristicas[$i]['Precio'])){
                $tablas.= '<td>'.$caracteristicas[$i]['Precio']["valor"].'</td>';
            }
            else{
                $tablas.= '<td>N/A</td>';
            }
        }
  $tablas .='
  </tr>
  <tr>
    <td class="par">Procesador</td>';
        for($i = 0 ;  $i < count($caracteristicas); $i++){
            if(isset($caracteristicas[$i]['Procesador'])){
            $tablas.= '<td>'.$caracteristicas[$i]["Procesador"]["valor"].'</td>';
                        }
            else{
                $tablas.= '<td>N/A</td>';
            }
        }
  $tablas .='
  </tr>
  <tr>
    <td>Ram</td>';
        for($i = 0 ;  $i < count($caracteristicas); $i++){
            if(isset($caracteristicas[$i]['Ram'])){
            $tablas.= '<td>'.$caracteristicas[$i]["Ram"]["valor"].'</td>';
                        }
            else{
                $tablas.= '<td>N/A</td>';
            }
        }
  $tablas .='
  </tr>
  <tr>
    <td class="par">DD</td>';
        for($i = 0 ;  $i < count($caracteristicas); $i++){
            if(isset($caracteristicas[$i]['DD'])){
            $tablas.= '<td>'.$caracteristicas[$i]["DD"]["valor"].'</td>';
                        }
            else{
                $tablas.= '<td>N/A</td>';
            }
        }
  $tablas .='
  </tr>
  <tr>
    <td>Video</td>';
        for($i = 0 ;  $i < count($caracteristicas); $i++){
            if(isset($caracteristicas[$i]['Video'])){
            $tablas.= '<td>'.$caracteristicas[$i]["Video"]["valor"].'</td>';
                        }
            else{
                $tablas.= '<td>N/A</td>';
            }
        }
  $tablas .='
  </tr>
</table>';
        return $tablas ;
    }    
    else{
        return "No hay elementos para comparar";
    }
}
}
//$g = new gestorComparacion();
//echo $g->compararProductos();
?>
