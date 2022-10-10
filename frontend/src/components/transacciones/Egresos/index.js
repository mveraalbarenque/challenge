import React, { useEffect, useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";

const url = "http://localhost:8000/api";

const Index = () => {
  const [egresos, setEgresos] = useState([]);

  useEffect(() => {
    listarEgresos();
  }, []);

  const listarEgresos = async () => {
    const response = await axios.get(`${url}/egresos`);
    setEgresos(response.data.egresos);
  };

  const eliminarEgreso = async (id) => {
    await axios.delete(`${url}/egreso/${id}`);
    listarEgresos();
  };

  const listado = () => {
    return (
      <table className="table table-striped">
        <thead className="bg-danger text-white">
          <tr>
            <th>Descripcion</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          {egresos.map((obj) => (
            <tr key={obj.id}>
              <td> {obj.descripcion} </td>
              <td> {obj.monto} </td>
              <td> {obj.fecha} </td>
              <td>
                <Link to={`/egreso/edit/${obj.id}`} className="btn btn-warning">
                  Editar
                </Link>
                |
                <button
                  onClick={() => eliminarEgreso(obj.id)}
                  className="btn btn-danger"
                >
                  Eliminar
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    );
  };

  return (
    <div>
      <div className="d-grid gap-2">
        <h1>
          Egresos Registrados |
          <Link
            to="/egreso/create"
            className="btn btn-primary btn-sm text-white"
          >
            Agregar +
          </Link>
        </h1>

        {listado()}
      </div>
    </div>
  );
};

export default Index;
