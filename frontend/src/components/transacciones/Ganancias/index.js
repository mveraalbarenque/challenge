import React, { useEffect, useState } from "react";
import axios from "axios";

const url = "http://localhost:8000/api";

const Index = () => {
  const [mes, setMes] = useState(10);
  const [ano, setAno] = useState(2022);

  const [ganancias, setGanancias] = useState([]);
  const [ingresos, setIngresos] = useState([]);
  const [egresos, setEgresos] = useState([]);

  useEffect(() => {
    listarIngresos();
  }, [mes, ano]);

  const listarIngresos = async () => {
    const response = await axios.get(`${url}/ganancias/${mes}/${ano}`);
    setGanancias(response.data.ganancias);
    setIngresos(response.data.ingresos);
    setEgresos(response.data.egresos);
  };

  const handleChange = (e) => {
    const seleccion = e.target.value.split("-");
    setMes(parseInt(seleccion[1]));
    setAno(parseInt(seleccion[0]));
    listarIngresos();
  };

  const listado = () => {
    return (
      <table className="table table-striped">
        <thead className="bg-primary text-white">
          <tr>
            <th>Tranccion</th>
            <th>Monto</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <b>Ganancias</b>
            </td>
            <td className={ganancias < 0 ? "text-danger" : "text-success"}>
              {ganancias.toLocaleString()}
            </td>
          </tr>
          <tr>
            <td>
              <b>Ingresos</b>
            </td>
            <td className={"text-success"}>{ingresos.toLocaleString()} </td>
          </tr>
          <tr>
            <td>
              <b>Egresos</b>
            </td>
            <td className={"text-danger"}> {egresos.toLocaleString()} </td>
          </tr>
        </tbody>
      </table>
    );
  };

  return (
    <div>
      <div className="d-grid gap-2">
        <h1>Ganancias Mensuales</h1>
        <input
          class="form-control me-2"
          onChange={(e) => handleChange(e)}
          type="month"
        />

        {listado()}
      </div>
    </div>
  );
};

export default Index;
