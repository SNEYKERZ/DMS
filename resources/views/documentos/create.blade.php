<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>documentos</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('documentos.index') }}>CRUD Documentos</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('documentos.create') }}>Crear Documento</a>
        </div>
      </div>
    </div>
</nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        <h3>Crear y subir un DOCUMENTO PDF</h3>
        <form action="{{ route('documentos.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="nombre">Nombre del Documento</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
            <label for="descripcion">descripcion</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
          </div>
          <br>
            <div class="form-group">
                <label for="pdf">pdf</label>
                <input type="file" class="form-control-file" id="pdf" name="pdf" required>
            </div>

            <br>
            <div class="dropdown">
                <label for="cars">TIPO:</label>

                <select name="cars" id="cars">
                  <option value="volvo">Volvo</option>
                  <option value="saab">Saab</option>
                  <option value="mercedes">Mercedes</option>
                  <option value="audi">Audi</option>
                </select>
              </div>
              <br>

                <div class="dropdown">
                    <label for="cars">AREA</label>
    
                    <select name="cars" id="cars">
                      <option value="volvo">Volvo</option>
                      <option value="saab">Saab</option>
                      <option value="mercedes">Mercedes</option>
                      <option value="audi">Audi</option>
                    </select>
                  </div>
              <br>


          <button type="submit" class="btn btn-primary">Subir Documento</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>