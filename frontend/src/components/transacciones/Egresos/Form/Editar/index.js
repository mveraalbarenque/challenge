import axios from "axios";
import React, { useState, useEffect } from "react";
import { useNavigate, useParams } from "react-router-dom";

const url = "http://localhost:8000/api/egreso/";

const Index = () => {
  const [descripcion, setDescripcion] = useState("");
  const [monto, setMonto] = useState(0);
  const [fecha, setFecha] = useState("dd-mm-YYYY");

  const navigate = useNavigate();
  const { id } = useParams();

  const update = async (e) => {
    e.preventDefault();
    await axios.put(`${url}${id}`, {
      descripcion: descripcion,
      monto: monto,
      fecha: fecha,
    });
    navigate("/egresos");
  };

  useEffect(() => {
    const getEgresos = async () => {
      const response = await axios.get(`${url}${id}`);
      console.log(response.data.egreso);
      const egreso = response.data.egreso;
      setDescripcion(egreso.descripcion);
      setMonto(egreso.monto);
      setFecha(egreso.fecha);
    };
    getEgresos();
  }, []);

  return (
    <div>
      <h3>Editar Transacción</h3>
      <form onSubmit={update}>
        <div className="mb-3">
          <label className="form-label">Descripcion</label>
          <input
            value={descripcion}
            onChange={(e) => setDescripcion(e.target.value)}
            type="text"
            className="form-control"
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
          <label className="form-label">fecha</label>
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
