import React from "react";
import { Link } from "react-router-dom";
const Index = () => {
  return (
    <div>
      <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
        <div className="container-fluid">
          <a className="navbar-brand" href="#">
            MVERA
          </a>
          <button
            className="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span className="navbar-toggler-icon"></span>
          </button>
          <div className="collapse navbar-collapse" id="navbarNav">
            <ul className="navbar-nav">
              <li className="nav-item">
                <Link
                  className="nav-link active"
                  aria-current="page"
                  to="/ganancias"
                >
                  Ganancias
                </Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/ingresos">
                  Ingresos
                </Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/egresos">
                  Egresos
                </Link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  );
};

export default Index;
