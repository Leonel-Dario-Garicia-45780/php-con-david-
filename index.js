function cargarDatos() {
    fetch("./controladores/traer_productos_controlador.php")
      .then((response) => response.json())
      .then((data) => {
        const tablaDatos = document.getElementById("tablaDatos");
        tablaDatos.innerHTML = "";
        data.forEach((row) => {
          const tr = document.createElement("tr");
          tr.innerHTML = `
              <td>${row.id}</td>
              <td>${row.nombre}</td>
              <td>${row.descripcion}</td>
              <td>
                  <button onclick='traerProducto(${row.id})' type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Actualizar</button>
        
                  <button onclick= eliminarProducto(${row.id}) class="btn btn-dark" >eliminar</button>
              </td>
              `;
          tablaDatos.appendChild(tr);
        });
      });
}

function limpiarFormulario() {
  var inputCodigo = document.getElementById("id");
  var inputNombre = document.getElementById("nombre");
  var inputDescripcion = document.getElementById("descripcion");
  inputCodigo.value = "";
  inputNombre.value = "";
  inputDescripcion.value = "";
}

function eliminarProducto(id) {
  fetch("./controladores/eliminar_producto_controlador.php?id=" + id)
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      cargarDatos();
      mostrarAlerta("Se elimino con exito")
    });
}


  
 function agregarProducto(){
  const id = document.getElementById("id").value;
  const nombre = document.getElementById("nombre").value;
  const descripcion = document.getElementById("descripcion").value;

  fetch(
      `./controladores/agregar_producto_controlador.php?id=${id}&nombre=${nombre}&descripcion=${descripcion}`
    )
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        cargarDatos();
        mostrarAlerta("Se agrego con exito")
        console.log(data);
        document.getElementById("id").value = "";
        document.getElementById("nombre").value = "";
        document.getElementById("descripcion").value = "";
      });
 }

 function mostrarAlerta(mensaje) {
  var alerta = document.getElementById("alerMessange");
  alerta.innerHTML = mensaje;
  alerta.hidden = false;

  setTimeout(function() {
    alerta.hidden = true;
  }, 1000); 
}


function guardarProducto(id, nombre, descripcion) {
  fetch(
    `./controladores/actualizar_producto_controlador.php?id=${id}&nombre=${nombre}&descripcion=${descripcion}`
  )
    .then((response) => response.text())
    .then((data) => {
      limpiarFormulario();
      cargarDatos();
      mostrarAlerta(data);
    });
}

function traerProducto(id) {
  fetch(`./controladores/traer_producto_controlador.php?id=${id}`)
    .then((response) => response.json())
    .then((data) => {
      var inputCodigo = document.getElementById("id");
      var inputNombre = document.getElementById("nombre");
      var inputDescripcion = document.getElementById("descripcion");
      inputCodigo.value = data["id"];
      inputNombre.value = data["nombre"];
      inputDescripcion.value = data["descripcion"];
    });

  var boton = document.getElementById("Guardar");
  boton.onclick = function () {
    var inputCodigo = document.getElementById("id");
    var inputNombre = document.getElementById("nombre");
    var inputDescripcion = document.getElementById("descripcion");
    var valId = inputCodigo.value;
    var valNombre = inputNombre.value;
    var valDescripcion = inputDescripcion.value;
    limpiarFormulario();
    guardarProducto(valId, valNombre, valDescripcion);
  
  };
}







  cargarDatos();