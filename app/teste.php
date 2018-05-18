<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style type="text/css">

        #conteudos{
            border: 1px solid blue;
        }
        #abas ul li{
            display: inline-block;
            border: 1px solid red;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }
        .selecionado{
            background-color: yellow;
        }
        #abas ul{
            margin: 1px;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#abas ul li").addClass("selecionado");
            $("#abas ul li").click(function () {

                $(this).toggleClass("selecionado");

                var meuID = $(this).attr("id");

                $("."+meuID).toggle();
            })
        })
    </script>
</head>
<body>
<div id="abas">
    <ul>
        <?php foreach ($categorias as $categoria): ?>
        <li id="<?=$categoria->getID()?>" class="selecionado"><?= $categoria->getNome()?></li>
        <?php endforeach;?>
    </ul>
</div>
<div id="conteudos">
    <?php foreach ($produtos as $produto): ?>
    <div class="<?=$produto->getID()?>">
        <?= $produto->getNome()?>
    </div>
    <?php endforeach;?>
</div>
</body>
</html>