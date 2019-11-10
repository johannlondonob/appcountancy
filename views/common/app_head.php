  <div class="container-fluid my-4 pt-5">
      <div id="app-container" class="row">
          <div id="app-menu" class="col-lg-2 col-md-3 col-sm-12 py-3">
              <nav
                  class="navbar navbar-expand-md navbar-light flex-md-column flex-lg-column p-0 d-flex align-items-start position-lg-fixed">
                  <a class="navbar-brand" href="#">Menú</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-app"
                      aria-controls="menu-app" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="menu-app">
                      <ul class="navbar-nav flex-column">
                          <li class="nav-item active">
                              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Link</a>
                          </li>
                          <li class="nav-item dropdown">
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
                          </li>
                      </ul>
                  </div>
              </nav>
          </div>
          <div class="col-lg-10 col-md-9 col py-3">
              <div id="nav-botones" class="row mb-4 px-3">
                  <ul class="nav">
                      <li class="nav-item">
                          <button id="refrescar" class="btn btn-primary mr-2">
                              <i class="fas fa-sync-alt"></i>
                              <span class="icon-text">Refrescar</span>
                          </button>
                      </li>
                      <li class="nav-item">
                          <button class="btn btn-primary mr-2">
                              <i class="fas fa-search"></i>
                              <span class="icon-text">Buscar</span>
                          </button>
                      </li>
                      <li class="nav-item">
                          <button class="btn btn-primary mr-2">
                              <i class="fas fa-plus"></i>
                              <span class="icon-text">Agregar</span>
                          </button>
                      </li>
                      <li class="nav-item">
                          <button class="btn btn-primary mr-2">
                              <i class="fas fa-eraser"></i>
                              <span class="icon-text">Borrar</span>
                          </button>
                      </li>
                  </ul>
              </div>
              <div id="app-subcontainer" class="row px-3">