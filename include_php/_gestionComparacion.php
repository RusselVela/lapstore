<?php
include_once 'DB/productoDB.php';
include_once '../config.inc.php';

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
    function compararProductos(){        
        $tablas = "";
        $caracteristicas =array();
        for($i=0;$i < count($_GET['id']); $i++){            
            $caracteristicas[$i] = obtenerCaracteristicasDelProducto($_GET['id'][$i]);
//            echo json_encode($caracteristicas[$i])."XXX<br>";
            
        }
//        echo json_encode($caracteristicas);
        
$tablas .= '        
<table width="200" border="1">
  <tr>
    <th>Caracteristicas</th>';
        for($i = 0 ;  $i < count($_GET['nombreProducto']); $i++){
            $tablas.= '<th>'.$_GET['nombreProducto'][$i].'</th>';
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
    <td>Procesador</td>';
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
    <td>DD</td>';
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
//return compararProductos();
?>
