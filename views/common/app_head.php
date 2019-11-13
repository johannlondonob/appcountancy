  <div class="container-fluid my-4 pt-5">
      <div id="app-container" class="row">
          <div id="app-menu" class="col-lg-2 col-md-3 col-sm-12 py-3">
              <nav class="navbar navbar-expand-md navbar-light flex-md-column flex-lg-column p-0 d-flex align-items-start position-lg-fixed border-right">
                  <a id="menu" class="navbar-brand" href="#"><h4>Menú</h4></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-app"
                      aria-controls="menu-app" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="menu-app">
                      <ul class="navbar-nav flex-column">
                          <li class="nav-item active">
                              <a id="perfil" class="nav-link" href="#">Perfil</a>
                          </li>
                          <div class="dropdown-divider"></div>
                          <li class="nav-item">
                              <a id="cuadresDiarios" class="nav-link" href="#">Cuadres Diarios</a>
                          </li>
                          <li class="nav-item">
                              <a id="egresos" class="nav-link" href="#">Egresos</a>
                          </li>
                          <li class="nav-item">
                              <a id="domicilios" class="nav-link" href="#">Domicilios</a>
                          </li>
                          <li class="nav-item">
                              <a id="zonas" class="nav-link" href="#">Zonas</a>
                          </li>
                          <li class="nav-item">
                              <a id="mensajeros" class="nav-link" href="#">Mensajeros</a>
                          </li>
                          <!-- <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Dropdown
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                          </li> -->
                      </ul>
                  </div>
              </nav>
          </div>
          <div class="col-lg-10 col-md-9 col py-3">
              <div id="nav-botones" class="row mb-4 px-3">
                  <ul class="nav">
                      <li class="nav-item">
                          <button id="refresh" class="btn btn-primary mr-2" onClick="">
                              <i class="mr-lg-1 mr-md-1 mr-0 fas fa-sync-alt"></i>
                              <span class="icon-text">Refrescar</span>
                          </button>
                      </li>
                      <!-- <li class="nav-item">
                          <button id="buscar" class="btn btn-primary mr-2" onClick="">
                              <i class="mr-lg-1 mr-md-1 mr-0 fas fa-search"></i>
                              <span class="icon-text">Buscar</span>
                          </button>
                      </li> -->
                      <li class="nav-item">
                          <button id="add" class="btn btn-primary mr-2" onClick="">
                              <i class="mr-lg-1 mr-md-1 mr-0 fas fa-plus"></i>
                              <span class="icon-text">Agregar</span>
                          </button>
                      </li>
                      <!-- <li class="nav-item">
                          <button id="borrar" class="btn btn-primary mr-2" onClick="">
                              <i class="mr-lg-1 mr-md-1 mr-0 fas fa-eraser"></i>
                              <span class="icon-text">Borrar</span>
                          </button>
                      </li> -->
                  </ul>
              </div>
              <div id="app-subcontainer" class="row px-3">