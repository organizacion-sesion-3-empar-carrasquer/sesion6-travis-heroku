<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Seriestv extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;
}

// Añadir el resto del código aquí
$app->get('/seriestv', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de series

    // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $seriestv = json_decode(\Seriestv::all());

    // Mostramos la vista
    return $this->view->render($res, 'seriestvlist_template.php', [
        'items' => $seriestv
    ]);
})->setName('seriestv');


/*  Obtención de una serie en concreto  */
$app->get('/seriestv/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la serie pasada como parámetro

    // Obtenemos la serie de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \Seriestv::find($args['name']);  
    $serietv = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'seriestv_template.php', [
        'item' => $serietv
    ]);

});

/*  Eliminacion de una serie en concreto  */
$app->delete('/seriestv/{name}', function ($req, $res, $args) {
	
    // Obtenemos la serie de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \Seriestv::find($args['name']); 
    $p->delete();

});

/*Crea un nueva serie con los datos recibidos*/
$app->post('/seriestv', function ($req, $res, $args) {
    //Código para peticiones de POST (creación de items)
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];  

    $longitud = count($datos);
    for($i=0; $i<$longitud; $i++)
    {
        switch ($datos[$i]['name']){
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $desc = $datos[$i]['value'];
            break;
        case "channel":
            $channel = $datos[$i]['value'];
            break;        
        case "datePublished":
            $date = $datos[$i]['value'];
            break;
        		
        }    
    }
  
    $seriestv = new Seriestv;
    $seriestv->name = $name;
    $seriestv->description = $desc;
    $seriestv->channel = $channel;
    $seriestv->datePublished = $date;
  
    $seriestv->save();
});


//Actualizar serie

$app->put('/seriestv/{name}', function ($req, $res, $args) {

	// Creamos un objeto collection + json con la serie pasado como parámetro

	// Obtenemos el libro de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
	$nuevo_seriestv = \Seriestv::find($args['name']);	

    $template = $req->getParsedBody();

	$datos = $template['template']['data'];
  	foreach ($datos as $item)
  	{ 
		switch($item['name'])
		{
        case "name":
            $name = $item['value'];
            break;
        case "description":
            $description = $item['value'];
            break;
        case "channel":
            $channel = $item['value'];
            break;
        case "datePublished":
            $datePublished = $item['value'];
            break;
		}
	}

	$nuevo_seriestv['name'] = $name;
	$nuevo_seriestv['description'] = $description;
	$nuevo_seriestv['channel'] = $channel;	
	$nuevo_seriestv['datePublished'] = $datePublished;
	$nuevo_seriestv->save();

});


?>
