<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $description = $_POST["description"];
    $date_create = date("Y-m-d H:i:s");
    $date_updated = date("Y-m-d H:i:s");
    $user_id = $_POST["user_id"];

    $sql = "INSERT INTO projects (titulo, description, date_created, date_updated, user_id) VALUES ('$titulo', '$description', '$date_create', '$date_updated', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Projeto cadastrado com sucesso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<h1>Criar um novo projeto</h1>
<form action="?page=save-project" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="form-group">
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" placeholder="Digite o título do projeto" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="15" maxlength="500" style="max-height: 250px" oninput="updateCharacterCount()" placeholder="Digite a descrição do projeto" required></textarea>
            <div class="mt-2 d-flex justify-content-end align-items-end">
                <span class="character-count-box border" id="characterCount" style="font-size:10px; border-radius: 5px; padding: 5px;">500</span>
                <script>
                    updateCharacterCount();

                    function updateCharacterCount() {
                        const maxLength = 500;
                        const textarea = document.getElementById('exampleFormControlTextarea1');
                        const remainingChars = maxLength - textarea.value.length;
                        const characterCountElement = document.getElementById('characterCount');
                        characterCountElement.textContent = remainingChars;
                    }
                </script>
            </div>
        </div>
        <div class="form-group row ml-1">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">@</span>
                <select class="form-control col-sm-5" name="user_id"  id="user_id" required>
                    <option value="" selected disabled>Escolha um usuário</option>
                    <?php
                    $query = "SELECT id, name FROM users ";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row ">
            <div class="form-group col-sm-2">
                <label for="exampleFormControlTextarea1">Prazo</label>
                <input type="date" name="date_updated" class="form-control">" readonly>
            </div>
            <div class="form-group col-sm-2">
                <label>Data da Criação</label>
                <input type="date" name="date_create" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
            </div>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-control">
                <input type="radio" name="ativo" value="s"> Concluído
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-control">
                <input type="radio" name="ativo" value="n" checked> Em andamento
            </label>
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary">Criar o projeto</button>
        </div>
    </div>
</form>

