<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section>
    <p class="font-bold text-center bg-blue-400 ">Identificação</p>
    </section>
    <form action="../Controller/Provider.php">
        <section class="mt-4 columns-2" >
            <article>
                <label for="cnpj">CNPJ</label>
                <input type="number" name="cnpj" id="cnpj" class="border border-blue-400" required>
            </article>
            <article>
                <label for="name">Nome do Fornecedor</label>
                <input type="text" name="name" id="name" class="border border-blue-400" required>
            </article>
        </section>

        <section>
            <p class="mt-4 font-bold text-center bg-blue-400">Endereço</p>
        </section>
        <section class="flex mt-4 colunms-5" class="border border-blue-400" required>
            <article class="mx-2">
                <label for="street">Rua</label>
                <input type="text" name="publicPlace" id="publicPlace" class="border border-blue-400" required>
            </article>

            <article  class="mx-2">
                <label for="">N°</label>
                <input type="number" name="streetNumber" id="streetNumber" class="border border-blue-400" required>
            </article>

            <article class="mx-2">
                <label for="">Bairro</label>
                <input type="text" name="neighborhood" id="neighborhood" class="border border-blue-400" required>
            </article>

            <article class="mx-2">
                <label for="">Cidade</label>
                <input type="text" name="city" id="city" class="border border-blue-400" required>
            </article>
            
            <article class="mx-2">
                <label for="">Código Postal</label>
                <input type="number" name="postalCode" id="oostalCode" class="border border-blue-400" required>
            </article>
        </section>
        <article class="flex justify-center mt-3">
            <button type="submit" class="p-3 text-white bg-blue-700 rounded">Cadastrar</button>
        </article>
    </form>
</body>
</html>