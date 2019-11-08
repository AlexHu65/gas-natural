<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Excel
{

  public function excelAllEmpleados($arreglo, $tipoReporte)
  {
    // CREACION DEL EXCEL
    // Variables de apoyo
    $filename = $tipoReporte. ' - '.date('Y-m-d'); // nombre del archivo
    $sep = "\t"; // separador

    // Headers
    header("Content-Type: application/xls; charset=utf-8");
    header("Content-Disposition: attachment; filename=$filename.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Creamos los nombres de las columnas
    $keys = array_keys($arreglo[0]);
    for ($i = 0; $i < count($keys); $i++) {
      echo utf8_decode($keys[$i]). "\t";
    }
    print("\n");

    // Creamos las filas
    foreach ($arreglo as $fila) {
      $schema_insert = '';
      foreach ($fila as $dato) {
        //echo '<br />file: '.$dato;
        if(!isset($dato))
        $schema_insert .= "NULL".$sep;
        elseif ($dato != "")
        $schema_insert .= utf8_decode(trim($dato)).$sep;
        else
        $schema_insert .= "".$sep;
      }
      $schema_insert = str_replace($sep."$", "", $schema_insert);
      $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
      $schema_insert .= "\t";
      print(trim($schema_insert));
      print "\n";

    }

  }

  public function excelEvaluciones($arreglo){

  }

}
