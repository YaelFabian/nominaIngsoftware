
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.Empleado</th>
                            <th>Nombre</th>
                            <th>CURP</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Eliminar</th>
                        </tr>
                     </thead>  
                        <tbody> 
                            <?php
                            $EmElim = new MvcController();
                            $EmElim->vistaEmpleadoController();
                            $EmElim->borrarEmpleadoController();                            ?>
                        </tbody>   
                    </table>

<script>
function confirmacion() {
    if (confirm('¿Esta seguro de que desea ELIMINAR el Empleado?')){ 
        submit();
    }
}
</script>