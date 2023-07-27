<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title><?php echo $page ?></title>

    <style>
        :root {
            --fundo: #F2F2F2;
            --cor_texto: #579BB1;
            --cor_texto_escuro: #3A778A;
            --azul-gradiente: linear-gradient(to bottom, #86c7db, #c6d0d2);
        }

        body {
            display: block;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            background-color: var(--fundo);
            color: var(--cor_texto);
        }

        .btn-primary {
            color: var(--cor_texto);
            background-color: var(--fundo);
        }

        .navbar-inner {
            background-image: var(--azul-gradiente);
        }

        .navbar .nav>li>a {
            color: #000000;
            text-shadow: 0 1px 0 var(--cor_texto);
        }

        .navbar .brand {
            color: var(--cor_texto);
        }

        .navbar .brand:hover,
        .navbar .brand:focus {
            text-decoration: none;
            color: var(--cor_texto_escuro);
        }

        .container-fluid {
            text-align: center;
            margin: 0 50px;
        }

        .form-horizontal,
        .control-label {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn-create,
        .btn-delete,
        .btn-edit {
            color: var(--cor_texto_escuro);
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
            background-color: var(--fundo);
            background-image: var(--azul-gradiente);
            text-shadow: 0 -1px 0 rgba(112, 220, 232, 0.92);
        }
    </style>
</head>