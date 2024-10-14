<link rel="stylesheet" href="https://bioingenieria.inventores.org/css/modal-table.css">
<x-modal name="show_table_activos_prov">
    <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto" style="background-color:#F1F6F9;">
        <div id="recipientes" class="w-full p-8 lg:mt-0 rounded shadow bg-white">
            <table id="activos" class="stripe hover"
                style="width:100%; padding-top: 1rem; padding-bottom: 1em; margin-bottom: 1rem;">
                <thead>
                    <div>
                        <h2>Activos</h2>
                    </div>
                    <tr class="title-table-active-prov">
                        <th id="icon-menu-id" data-priority="1">
                            <div class="orden">
                                <div>ID</div>
                            </div>
                        </th>
                        <th id="icon-menu-type" data-priority="2">
                            <div class="orden">
                                <div>TIPO</div>
                            </div>
                        </th>
                        <th id="icon-menu-model" data-priority="3">
                            <div class="orden">
                                <div>MODELO</div>
                            </div>
                        </th>
                        <th id="icon-menu-sublocation" data-priority="4">
                            <div class="orden">
                                <div>SUB UBICACIÓN</div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Obtén los datos de la tabla "activos" y "activos_servicios" de la base de datos
                        $activos = \App\Models\Activo::all();
                        foreach ($activos as $activo) {
                            if($activo->status != "Baja"){
                    ?>
                    <td>
                        <div class="idactivo">
                            <div class="textid"><?php echo "{$activo->id} </td>"; ?></div>
                        </div>
                        <?php
                                    echo "<td>{$activo->type}</td>";
                                    echo "<td>{$activo->model}</td>";
                                    echo "<td>{$activo->sublocation}</td>";
                                    echo "</tr>";

                            }}
                        ?>
                </tbody>
            </table>
            <button id="select-active-prov" class="disabled" disabled ="true" type="button" x-on:click="$dispatch('close')">Aceptar</button>
        </div>
    </div>
</x-modal>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


