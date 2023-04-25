<div style="background: #77A53D; padding:50px;" align="center">
    <table  style="background: #FFFFFF;color:#00000; font-size:12px; font-family:Arial; padding:20px;" whitd="500">
        <tbody  align="left">
            <tr>
                <td colspan="2" align="center"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/skins/page/images/feroldanlogo2.png" alt=""> <br> </td>
            </tr><!--  -->
            <tr>
            <tr>
                <th scope="row">Nombre:</th>
                <td><?php echo $this->data["clasificados_nombreusuario"]; ?> </td>
            </tr>
            <tr>
                <th scope="row">Documento:</th>
                <td><?php echo $this->data["clasificados_documento"]; ?> </td>
            </tr>
            <tr>
                <th scope="row">Correo:</th>
                <td colspan="2">  <?php echo $this->data["clasificados_correo"]; ?></td>
            </tr>
            <tr>
                <th scope="row">Teléfono:</th>
                <td colspan="2"><?php echo $this->data["clasificados_telefono"]; ?></td>
            </tr>
            <tr>
                <th scope="row" >Clasificado:</th>
                <td colspan="2"><?php echo $this->data["clasificados_nombre"]; ?></td>
            </tr>
            <tr>
                <th scope="row">Descripcion:</th>
                <td colspan="2"><?php echo $this->data["clasificados_descripcion"]; ?></td>
            </tr>
        </tbody>
    </table>
</div>