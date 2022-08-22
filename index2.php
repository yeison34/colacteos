<!Doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Colacteos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;500;700&display=swap" rel="stylesheet">
</head>

<body style=" font-family: 'Noto Sans', sans-serif;
    background: #cbe0e7;">

<div class="container ">

    <nav class="navbar fixed-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" routerLink="">
                <img src="img/colacteos.png" alt="" width="40" height="40">
                <span class="navbar-brand mb-0 fs-4 mx-2">Colacteos</span>
            </a>

        </div>
    </nav>

    <div class="center" style="text-align:center; padding-top:100px;">
        <div class="row text-center" style="justify-content: center;">
            <div class="col ">
                <form>
                    <div class=" ">
                        <img src="img/colacteos.png" class="rounded" alt="Colacteos" height="250">
                    </div>
                    <div class="container mt-4 col-3">
                        <span class="p-float-label">
                            <input id="float-input-invalid" type="text" pInputText  class="ng-valid ng-dirty form-control"> 
                            <label for="float-input-invalid">Usuario</label>
                        </span>

                    </div>
                    <div class="container mt-4 col-3">
                        <span class="p-float-label">
                            <input id="float-input-invalid" type="password" pInputText  class="ng-valid ng-dirty form-control"> 
                            <label for="float-input-invalid">Contraseña</label>
                        </span>
                    </div>
                    <div class="continer mt-3 text-center d-grid gap-2 col-2 mx-auto ">
                        <!-- <button pButton pRipple type="button" label="Ingresar" class="p-button-rounded p-button-success"></button>-->
                        <button type="button" class="btn btn-outline-success">Ingresar</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>