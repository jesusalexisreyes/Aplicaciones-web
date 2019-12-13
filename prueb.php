
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


<div class="modal hide" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <!-- cuerpo del modal -->
                                        <div class="modal-body">
                                            <div class="newsletter-widget text-center align-self-center" ;">


                                                <h3>Editar usuario</h3>

                                                <!-- aqui es donde tirara el id definido por bookid -->
                                                <input type="text" name="bookId" id="bookId" value=""/>

                                                <?php
                                                if (isset($error)) { ?>
                                                    <div style="background: #F5A9A9;" class="alert alert-warning alert-dismissable">
                                                    <?php
                                                        printMsg($error, "error");
                                                        echo " ";
                                                    }

                                                    ?>

                                                    <?php if (isset($resQueryUserAdd)) {
                                                        ?>
                                                        <div class="alert alert-success alert-dismissible fade show">
                                                            <strong>Success!</strong> Your message has been sent successfully.
                                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        </div>
                                                    <?php } ?>

                                                    <form class="form-inline" method="post">
                                                        <input type="email" name="correo" placeholder="correo" required class="form-control" value="" />



                                                        <input type="text" name="nombre" placeholder="Nombre completo" required class="form-control" />

                                                        <input type="text" name="contraseña" placeholder="contraseña" requiered class="form-control" />


                                                        <input type="text" name="direccion" placeholder="Direccion" required class="form-control" />

                                                        <select required class="form-control" name="nivel">
                                                            <option value=1>Administrador</option>
                                                            <option value=2>Ditribuidor</option>
                                                            <option value=3>Usuario</option>
                                                        </select>


                                                        <input type="submit" name="sents" value="Registrar" class="btn btn-default " />
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                                    </form>

                                                    </div>
                                            </div>
                                        </div>
                                        <!-- fin del cuerpo del modal -->
                                    </div>
                                </div>
                            </div>

                          </body>
                        </html>
