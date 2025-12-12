@extends('layout.dependencia')

@section('content')

<h2 class="mb-2">
    CARGA DE INFORMACIÓN – {{ $dependencia->nombre }}
</h2>

<p>
    <strong>Fecha:</strong> {{ date('d/m/Y') }} <br>
    <strong>Reporte No:</strong> {{ $reporte }}
</p>

<hr>

<h4>Servicios Turísticos</h4>

<p class="mt-3">
    <strong>Bienvenido al sistema estatal de captura</strong>
</p>
<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Método de captura</th>
            <th>Seleccionar</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Plantilla (archivo)</td>
            <td>
                <input type="radio" name="tipo_carga" value="plantilla" onclick="mostrarPlantilla()">
            </td>
        </tr>
        <tr>
            <td>Carga de forma manual</td>
            <td>
                <input type="radio" name="tipo_carga" value="manual" onclick="mostrarManual()">
            </td>
        </tr>
    </tbody>
</table>
<div id="cargaPlantilla" style="display:none">

    <h5>Información requerida</h5>
    <ul>
        <li>Región</li>
        <li>Total de servicios turísticos</li>
    </ul>

    <h6>Ejemplo</h6>

    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Región</th>
                <th>Total servicios turísticos</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cañada</td>
                <td>10</td>
            </tr>
            <tr>
                <td>Costa</td>
                <td>58</td>
            </tr>
            <tr>
                <td>Istmo</td>
                <td>45</td>
            </tr>
            <tr>
                <td>Mixteca</td>
                <td>36</td>
            </tr>
            <tr>
                <td>Papaloapan</td>
                <td>15</td>
            </tr>
            <tr>
                <td>Sierra Norte</td>
                <td>62</td>
            </tr>
            <tr>
                <td>Sierra Sur</td>
                <td>78</td>
            </tr>
            <tr>
                <td>Valles Centrales</td>
                <td>56</td>
            </tr>
        </tbody>
    </table>

    <form>
        <input type="file" id="archivoPlantilla" class="form-control mb-2" accept=".csv,.xlsx">

        <button type="button" class="btn btn-primary" onclick="subirPlantilla()">
            Subir archivo
        </button>

        <p id="nombreArchivo" class="mt-2 text-success"></p>
    </form>
</div>

<div id="cargaManual" style="display:none">

    <h5>Seleccione las regiones</h5>

    @php
    $regiones = [
    'Cañada', 'Costa', 'Istmo', 'Mixteca',
    'Papaloapan', 'Sierra Norte', 'Sierra Sur', 'Valles Centrales'
    ];
    @endphp

    @foreach ($regiones as $region)
    <div class="mb-2">
        <input type="checkbox" onchange="mostrarInput('{{ $region }}')" id="chk_{{ $region }}">
        <label>{{ $region }}</label>

        <input
            type="number"
            id="input_{{ $region }}"
            placeholder="Total servicios"
            style="display:none; width:200px"
            onblur="guardarValor('{{ $region }}')">

    </div>
    @endforeach

    <hr>

    <h6>Registros capturados</h6>

    <table class="table table-bordered" id="tablaResultados">
        <thead>
            <tr>
                <th>Región</th>
                <th>Total servicios turísticos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

</div>
<script>
    function mostrarPlantilla() {
        document.getElementById('cargaPlantilla').style.display = 'block';
        document.getElementById('cargaManual').style.display = 'none';
    }

    function mostrarManual() {
        document.getElementById('cargaManual').style.display = 'block';
        document.getElementById('cargaPlantilla').style.display = 'none';
    }

    function mostrarInput(region) {
        const chk = document.getElementById('chk_' + region);
        const input = document.getElementById('input_' + region);

        if (chk.checked) {
            input.style.display = 'inline-block';
            input.disabled = false;
            input.focus();
        } else {
            input.style.display = 'none';
            eliminarFila(region);
        }
    }

    function guardarValor(region) {
        const input = document.getElementById('input_' + region);
        const valor = input.value;

        if (valor === '' || valor <= 0) return;

        input.disabled = true;
        agregarOActualizarFila(region, valor);
    }

    function agregarOActualizarFila(region, valor) {
        let tbody = document.querySelector('#tablaResultados tbody');
        let fila = document.getElementById('fila_' + region);

        if (!fila) {
            fila = document.createElement('tr');
            fila.id = 'fila_' + region;

            fila.innerHTML = `
            <td>${region}</td>
            <td id="valor_${region}">${valor}</td>
            <td>
                <button class="btn btn-sm btn-warning" onclick="editarRegion('${region}')">
                    Editar
                </button>
                <button class="btn btn-sm btn-danger" onclick="eliminarRegion('${region}')">
                    Eliminar
                </button>
            </td>
        `;
            tbody.appendChild(fila);
        } else {
            document.getElementById('valor_' + region).innerText = valor;
        }
    }

    function editarRegion(region) {
        const input = document.getElementById('input_' + region);
        input.disabled = false;
        input.focus();
    }

    function eliminarRegion(region) {
        document.getElementById('chk_' + region).checked = false;
        eliminarFila(region);
    }

    function eliminarFila(region) {
        const fila = document.getElementById('fila_' + region);
        const input = document.getElementById('input_' + region);

        if (fila) fila.remove();
        if (input) {
            input.value = '';
            input.disabled = false;
            input.style.display = 'none';
        }
    }


    function eliminarFila(region) {
        const fila = document.getElementById('fila_' + region);
        if (fila) fila.remove();
    }

    function subirPlantilla() {
        const input = document.getElementById('archivoPlantilla');
        const texto = document.getElementById('nombreArchivo');

        if (!input.files.length) {
            alert('Seleccione un archivo');
            return;
        }

        texto.innerText = 'Archivo seleccionado: ' + input.files[0].name;
    }
</script>
@endsection