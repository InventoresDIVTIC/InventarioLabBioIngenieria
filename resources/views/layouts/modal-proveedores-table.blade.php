<link rel="stylesheet" href="http://localhost/labbio/resources/css/modal-table.css">    
<x-modal name="show_table_prov">
    <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto" style="background-color:#F1F6F9;">
        <div id="recipientes" class="w-full p-8 lg:mt-0 rounded shadow bg-white">
            <table id="proveedores" class="stripe hover"
                style="width:100%; padding-top: 1rem; padding-bottom: 1em; margin-bottom: 1rem;">
                <thead>
                    <div>
                        <h2>Proveedores</h2>
                    </div>
                    <tr class="title-table-prov">
                        <th id="icon-menu-id" data-priority="1">
                            <div class="orden">
                                <div>ID</div>
                            </div>
                        </th>
                        <th id="icon-menu-type" data-priority="2">
                            <div class="orden">
                                <div>NOMBRE</div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Obtén los datos de la tabla "proveedores" y de la base de datos
                        $proveedores = \App\Models\Proveedores::all();
                        foreach ($proveedores as $proveedor) { 
                    ?>
                    <td>
                        <div class="idproveedor">
                            <div class="textid"><?php echo "{$proveedor->id} </td>"; ?></div>
                        </div>
                        <?php
                                    echo "<td>{$proveedor->name}</td>";
                                    echo "</tr>";
                                    
                            }
                        ?>
                </tbody>
            </table>
            <button id="select-proveedor" class="disabled" disabled ="true" type="button" x-on:click="$dispatch('close')">Aceptar</button>
        </div>
    </div>
</x-modal>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


