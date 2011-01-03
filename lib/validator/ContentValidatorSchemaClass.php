<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ContentValidatorSchema extends sfValidatorSchema
{
     protected function doClean($values)
  {
    $errorSchema = new sfValidatorErrorSchema($this);
    foreach($values as $key => $value)
    {
      $errorSchemaLocal = new sfValidatorErrorSchema($this);
 
      // se ha rellenado el campo title pero no el campo description
      if ($value['title'] && !$value['description'])
      {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'description');
      }
 
      // se ha rellenado el campo caption pero no el campo filename
      if ($value['description'] && !$value['title'])
      {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'title');
      }
 
      // no se ha rellenado ni caption ni filename, se eliminan los valores vacíos
      if (!$value['title'] && !$value['description'])
      {
        unset($values[$key]);
      }
 
      // algun error para este formulario embebido
      if (count($errorSchemaLocal))
      {
        $errorSchema->addError($errorSchemaLocal, (string) $key);
      }
    }

    // lanza un error para el formulario principal
    if (count($errorSchema))
    {
      throw new sfValidatorErrorSchema($this, $errorSchema);
    }
 
    return $values;
  }

}
?>
