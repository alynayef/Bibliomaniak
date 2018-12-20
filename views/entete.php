<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title><?php echo $titrepage; ?></title>

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Slabo+27px|Yesteryear'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="public/css/style1.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        table {
            font-family: arial, sans-serif;

            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            font-size: 15px;
            padding: 4px;
            width: 10px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;

        }
        input{
            background: transparent;
            border: 0px;
            font-size: 12px;
        }
        input:hover{
            background: #1abc9c;
            border: 2px;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            font-size: 12px;
        }
        .vert {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
            padding: 6px 10px;
        }

        .vert:hover {
            background-color: #4CAF50;
            color: white;
        }
        .retour {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }

        .retour:hover {
            background-color: #4CAF50;
            color: white;
        }
        .bleue {
            background-color: white;
            color: black;
            border: 2px solid #008CBA;
            padding: 6px 10px;
        }

        .bleue:hover {
            background-color: #008CBA;
            color: white;
        }

        .rouge {
            background-color: white;
            color: black;
            border: 2px solid #f44336;
            padding: 6px 10px;
        }

        .rouge:hover {
            background-color: #f44336;
            color: white;
        }


    </style>

</head>
<body>
<div class="wrapper">

    <div class="header">
        <h1 class="header__title">BIBLIOTHEQUE DES MANIAQUES</h1>
        <h2 class="header__subtitle"><?php echo $soustitre  ?></h2>
        <?php
        if($test == null){
            echo "<h3 class=\"header__subtitle\">$message</h3>";
        }

        if($retour!='ok'){
            echo"<form method=\"post\">
            <input  type=\"submit\" name=\"retour\" value=\"RETOUR\" class=\"button retour\"/>
            </form>";
        }?>

    </div>
    <table>