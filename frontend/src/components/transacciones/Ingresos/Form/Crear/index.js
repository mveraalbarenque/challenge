import axios from "axios";
import React, { useState } from "react";
import { useNavigate } from "react-router-dom";

const endpoint = "http://127.0.0.1:8000/api/ingreso";

const Index = () => {
  const [descripcion, setDescripcion] = useState("");
  const [monto, setMonto] = useState(0);
  const [fecha, setFecha] = useState("yyyy-MM-dd");
  const navigate = useNavigate();

  const store = async (e) => {
    e.preventDefault();
    await axios.post(endpoint, {
      nombre: "test",
      descripcion: descripcion,
      monto: monto,
      fecha: fecha,
    });
    navigate("/ingresos");
  };

  return (
    <div>
      <h3>Registrar Ingreso</h3>
      <form onSubmit={store}>
        <div className="mb-3">
          <label className="form-label">Descripción</label>
          <input
            value={descripcion}
            onChange={(e) => setDescripcion(e.target.value)}
            type="text"
            className="form-control"
            autofocus="autofocus"
          />
        </div>
        <div className="mb-3">
          <label className="form-label">Monto</label>
          <input
            value={monto}
            onChange={(e) => setMonto(e.target.value)}
            type="number"
            className="form-control"
          />
        </div>
        <div className="mb-3">
          <label className="form-label">Fecha</label>
          <input
            value={fecha}
            onChange={(e) => setFecha(e.target.value)}
            type="date"
            className="form-control"
          />
        </div>
        <button type="submit" className="btn btn-primary">
          Guardar
        </button>
      </form>
    </div>
  );
};

export default Index;
