<?php $utl = new Controller_Utilities(); ?>
        <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Checkout <small>Articulos actuales</small></h1>
            </div>
        </div>
    </div>
</div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                <?php if(!count($data['productos'])){ ?>
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Carrito Vacío</h3>
                        </div>
                        <div class="panel-body">
                            El carrito esta vacío
                        </div>
                    </div>
                    <?php  return; } ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                foreach ($data['productos'] as $value) {
                                    ?>
                                    <td class="col-sm-8 col-md-6">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#"><?php echo $value['nombre']; ?></a></h4>
                                                <h5 class="media-heading"> by <a href="#"><?php echo $value['marca']; ?></a></h5>
                                                <span>Status: </span><span class="text-success"><strong><?php echo $value['status']; ?></strong></span>
                                            </div>
                                        </div></td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <input type="numeric" class="form-control producto" <?php echo $this->getDataAttr('add', $value); ?> value="<?php echo $value['cantidad']; ?>">
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $value['precio']; ?></strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $value['precio'] * $value['cantidad']; ?></strong></td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn btn-danger producto" <?php echo $this->getDataAttr( 'remove', $value); ?>>
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </button></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <!-- Fin de los productos !-->
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Subtotal</h5></td>
                                <td class="text-right"><h5><strong>$<?php echo $data['totalCosto'] ?></strong></h5></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Impuesto</h5></td>
                                <td class="text-right"><h5><strong>$150.25</strong></h5></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h3>Total</h3></td>
                                <td class="text-right"><h3><strong>$<?php echo $data['totalCosto'] ?></strong></h3></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td> 
                                    <button type="button" class="btn btn-danger producto" <?php echo $this->getDataAttr('removeAll'); ?>>
                                        <span class="glyphicon glyphicon-remove" ></span> Borrar Todo
                                    </button>
                                </td> 
                                <td>
                                    <button type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Continuar Comprando
                                    </button></td>
                                <td>
                                    <button type="button" class="btn btn-success">
                                        Checkout <span class="glyphicon glyphicon-play"></span>
                                    </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            </form>
        </div>
    </div>
</div>