<?php  
//session_start();
if($_SESSION['info_user'][0]->tipo!=1)
{

  redirect(base_url());
}
plantilla::iniciar();?>
  <div class="content-wrapper">
  
  <div class="cont-titulo">

    <h1>Editar Eventos</h1>

  </div>
    
   
	

    <div class="container">
    <form action="<?php echo base_url('panel/eventos/modificar/'.$datos_eventos[0]->id)?>" method="POST"   enctype="multipart/form-data">
      <table class="table table-bordered">
      <tr>
        <td>Titulo</td>
        <td><input type="text" name="titulo" class="form-control"
				value="<?php echo $datos_eventos[0]->titulo;?>"></td>
      </tr>
      <tr>
        <td>Lugar</td>
        <td><input type="text" name="lugar" class="form-control"
				value="<?php echo $datos_eventos[0]->lugar;?>"></td>
      </tr>
      <tr>
        <td>Descripcion</td>
        <td> <textarea name="descripcion"><?php echo $datos_eventos[0]->descripcion;?></textarea> </td>
      </tr>
      <tr>
        <td>Longitud</td>
        <td><input type="text" name="longitud" class="form-control"
				value="<?php echo $datos_eventos[0]->longitud;?>"></td>
      </tr>
      <tr>
        <td>Latituden</td>
        <td><input type="text" name="latitud" class="form-control"
				value="<?php echo $datos_eventos[0]->latitud;?>"></td>
      </tr>
      <tr>
        <td>fecha</td>
        <td><input required type="date" name="fecha" class="form-control"
				value="<?php echo $datos_eventos[0]->fecha;?>"></td>
      </tr>
      <tr>
        <td>hora</td>
        <td><input required type="time" name="hora" class="form-control"
				value="<?php echo $datos_eventos[0]->hora;?>"></td>
      </tr>
      <tr>
      <tr>
        <td>Imagen</td>
        <td><input   type="file" name="fileimagen" class="form-control"
				></td>
      </tr>
      <tr>
        <td>link</td>
        <td><input type="text" name="link" class="form-control"
				value="<?php echo $datos_eventos[0]->link;?>"></td>
      </tr>
			<tr>
        <td>idUser</td>
        <td><input type="text" name="id_usuario" class="form-control" value="<?php echo $_SESSION['info_user'][0]->id?>"></td>
      </tr>
      <tr>
        <td colspan="2"> 
          <input class="btn btn-dark float-right" type="submit" value="Guardar" name="btn_enviar" ><br>
					<a href="<?php echo base_url('panel/eventos')?>">Volver</a>
        </td>
      
      </tr>
    </table>
    </form>
    </div>





</div>

<style>
textarea{
  width: 100%;
}
td{
  font-weight: bold;
  color: rgb(9, 93, 167);
}
.cont-titulo{
  text-align: center;
}


</style>
