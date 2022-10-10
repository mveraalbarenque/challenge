import React, { useEffect, useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";

const url = "http://localhost:8000/api";

const Index = () => {
  const [ingresos, setIngresos] = useState([]);

  useEffect(() => {
    listarIngresos();
  }, []);

  const listarIngresos = async () => {
    const response = await axios.get(`${url}/ingresos`);
    setIngresos(response.data.ingresos);
  };

  const eliminarIngreso = async (id) => {
    await axios.delete(`${url}/ingreso/${id}`);
    listarIngresos();
  };

  const listado = () => {
    return (
      <table className="table table-striped">
        <thead className="bg-success text-white">
          <tr>
            <th>Descripcion</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          {ingresos.map((obj) => (
            <tr key={obj.id}>
              <td> {obj.descripcion} </td>
              <td> {obj.monto} </td>
              <td> {obj.fecha} </td>
              <td>
                <Link
                  to={`/ingreso/edit/${obj.id}`}
                  className="btn btn-warning"
                >
                  Editar
                </Link>
                |
                <button
                  onClick={() => eliminarIngreso(obj.id)}
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
          Ingresos Registrados |
          <Link
            to="/ingreso/create"
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
