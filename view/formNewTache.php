<h1>Nouvelle Tache</h1>

<form action="" method="post">

    <label for="tacheTitre">Titre</label></br>
    <input type="text" name="tacheTitre">
    <br>
    <!-- <button id="addField">Ajouter une tache</button> -->
    <button>Enregistrer la tache</button>
</form>

<!-- 
    <div id="nameField">
        <label for="nameField">Nom du champ</label></br>
        <input type="text" name="nameField">
        </br>
    </div>
     -->
<!-- <script>
    document.getElementById("addField").addEventListener("click",addField());
    
    function addField(){
        let nameField = document.createElement("label");
        nameField.setAttribute('for', 'nameField');
        nameField.innerHTML = "Nom du champ";

        let nameFieldInput = document.createElement("input");
        nameFieldInput.setAttribute('type', 'text');
        nameFieldInput.setAttribute('name', 'nameField');

        document.getElementById('nameField').appendChild(nameField);
        document.getElementById('nameField').appendChild(document.createElement("br"));
        document.getElementById('nameField').appendChild(nameFieldInput);
        document.getElementById('nameField').appendChild(document.createElement("br"));
    };
</script> -->