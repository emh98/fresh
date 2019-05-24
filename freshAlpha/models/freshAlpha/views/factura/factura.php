<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Factura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form" action="<?php echo constant('URL')?>Factura/registrarFactura" method="POST">
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-6">
              <h3>Información Cliente</h3>
              <div class="form-group">
                <label for="cedula">Cedula</label>
                <input type="text" class="form-control" id="cedula" placeholder="Cedula" name="cedula">
              </div>
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                </div>
            </div>
            <div class="col-6">
                <div class="container">
                <div class="row">
                      <div class="col-md-12">
                        <h3>Factura</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="codF">Codigo De La Factura</label>
                          <input type="text" class="form-control" id="codF" placeholder="Código" name="codigoF">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <h3>Prendas</h3>
                      </div>
                    </div>
            
                    <div class="row">
                      <div class="col-md-12 center">
                      
                      <div class="form-group">
                        <label for="prenda">Prenda</label>
                        <select class="form-control" id="prenda" name="codP">
                        <?php 
                              include_once 'models/PrendaModel.php';
                              foreach ($this->prenda as $row) {
                                $prenda = new PrendaModel();
                                $prenda = $row;?>
                              <option value="<?php echo $prenda->cod_prenda?>"  data-prenda="<?php echo $prenda->cod_prenda?>"><?php echo $prenda->nom_prenda?></option>
                              <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="servicio">Servicio</label>
                        <select class="form-control" id="servicio" name="codS">
                        <?php 
                              include_once 'models/ServicioModel.php';
                              foreach ($this->servicio as $row) {
                                $servicio = new ServicioModel();
                                $servicio = $row;?>
                              <option value="<?php echo $servicio->cod_servicio?>" data-servicio="<?php echo $servicio->cod_servicio?>"><?php echo $servicio->nom_servicio?></option>
                              <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <select class="form-control" id="cantidad" name="cantidad">
                        <?php
                            for ($i=1; $i <= 10; $i++) { ?>
                                <option value="<?php echo $i?>" data-cantidad="<?php echo $i?>"><?php echo $i?></option>
                                <?php  }?>
                        </select>
                      </div>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button form="form" type="submit" class="btn btn-success">Añadir</button>
          </div>
        </div>
      </form>
      
  </div>
</div>