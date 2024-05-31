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
                  <button onclick= eliminarProducto(${row.id})>eliminar</button>
              </td>
              `;
          tablaDatos.appendChild(tr);
        });
      });
  }

function eliminarProducto(id) {
    fetch("./controladores/eliminar_producto_controlador.php?id=" + id)
      .then((response) => response.text())
      .then((data) => {
        alert("Ok");
      }); 
   /*   alert ("eliminar "+ id) */
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







  cargarDatos();