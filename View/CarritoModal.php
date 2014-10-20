<?php $utl = new Controller_Utilities(); ?>
<!-- Modal -->
<?php if(!$data['productosCarrito']['isRecarga']){ ?>
<div class="modal fade" id="carritoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
<?php }?> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito de compras</h4>
            </div> 
            <?php if(count($data['productosCarrito']['productos'])){ ?>
            <!-- Cuerpo modal -->
            <div class="modal-body">
                <div class="panel-body">
                <?php 
                
                foreach ($data['productosCarrito']['productos'] as $value) { ?>
               
                    <div class="row">
                        <div class="col-xs-4">
                            <h4 class="product-name">
                                <strong><?php echo $value['nombre']; ?>
                                </strong>
                            </h4>
                            <h4>
                                <small><?php echo $value['descripcion']; ?></small>
                            </h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong><?php echo $value['precio']; ?> <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control input-sm productoInp" 
                                <?php echo $utl->getDataAttr('add', $value); ?>
                                value="<?php echo $value['cantidad']; ?>">
                            </div>
                            <div class="col-xs-2">
                                <button type="button" class="btn btn-link btn-xs producto glyphicon glyphicon-trash" <?php echo $utl->getDataAttr('remove', $value); ?>>
                                    
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
                    
                </div>
            </div>
            <!-- Footer Modal -->
            <div class="modal-footer">
                <div class="row text-center">
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                    <div class="col-xs-7">
                        <h4 class="text-right">Total <strong>$<?php echo $data['productosCarrito']['total']; ?></strong></h4>
                    </div>
                    <div class="col-xs-3">
                        
                            <a type="button"  class="btn btn-success btn-block" <?php echo $utl->getLink('CheckOut'); ?>>Verificar</a>
                        
                    </div>
                </div>
            </div>
            <?php }else{
                ?>
                <blockquote>
                    <h4 class='text-info text-center'>Carrito Vacío</h4>
                </blockquote>
                <!-- Footer Modal -->
            <div class="modal-footer">
                <div class="row text-center">
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
                <?php
            } ?>
        </div>
   <?php if(!$data['productosCarrito']['isRecarga']){ ?>     
    </div>
</div> 
<?php } ?>