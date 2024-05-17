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
/*     fetch("./controladores/eliminar_producto_controlador.php?id=" + id)
      .then((response) => response.text())
      .then((data) => {
        alert("Ok");
      }); */
      alert ("eliminar "+ id)
  }
  cargarDatos();