import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";

import Menu from "./components/Menu";
import Ganancias from "./components/transacciones/Ganancias";

import Ingresos from "./components/transacciones/Ingresos";
import CrearIngreso from "./components/transacciones/Ingresos/Form/Crear";
import EditarIngreso from "./components/transacciones/Ingresos/Form/Editar";

import Egresos from "./components/transacciones/Egresos";
import CrearEgreso from "./components/transacciones/Egresos/Form/Crear";
import EditarEgreso from "./components/transacciones/Egresos/Form/Editar";

function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Menu />
        <div className="container">
          <Routes>
            <Route path="/" element={<Ganancias />} />

            <Route path="/ingresos" element={<Ingresos />} />
            <Route path="/ingreso/create" element={<CrearIngreso />} />
            <Route path="/ingreso/edit/:id" element={<EditarIngreso />} />

            <Route path="/egresos" element={<Egresos />} />
            <Route path="/egreso/create" element={<CrearEgreso />} />
            <Route path="/egreso/edit/:id" element={<EditarEgreso />} />
          </Routes>
        </div>
      </BrowserRouter>
    </div>
  );
}

export default App;
