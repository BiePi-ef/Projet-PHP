<h1>Vos taches</h1>

<div id="main">
<?php foreach ($taches as $tache) { ?>
    <div>
        <h2><?= $tache['tache_name'] ?></h2>
        <p>
        </p>
        <small><i>Date de creation de la liste : <?= $tache['tache_date'] ?></i></small>
        </br>

        <?php foreach ($fields as $field) {
            if ($field['tache_id'] == $tache['tache_id'])
            { 
                $fieldText = $field['field_name'];
                $fieldValue = ($field['field_value'] == 1)?"checked":"";
            }?>
            
            <input type="checkbox" name="fieldCheckbox" <?= $fieldValue?>/>
            <label for="fieldCheckbox"><?= $fieldText ?>
            </label>
            <button>Cocher Case</button>
            </br>
        <?php  
    } ?>

        </br>
        <button id="addField<?= $tache['tache_id'] ?>">Ajouter une mission</button>
        </br>
    </div>
<?php }?>
</div>

<script>
    let buttons = document.getElementById('main').getElementsByTagName('button');
    for (let i=0; i<buttons.length; i++){
        buttons[i].addEventListener("click", () => {
            let a = buttons[i].id;
            let field = document.createElement("form");
            field.setAttribute('method', 'post');

            let nameFieldInput = document.createElement("input");
            nameFieldInput.setAttribute('type', 'text');
            nameFieldInput.setAttribute('name', a);
            nameFieldInput.setAttribute('placeholder', 'Nom de la tache...');

            let buttonField = document.createElement("button");
            buttonField.innerHTML = "Valider le champ";

            field.appendChild(nameFieldInput);
            field.appendChild(buttonField);
            
            let currentButton = document.getElementById(a);
            document.getElementById(a).insertAdjacentElement('beforebegin', field);
        });
    }

    // function addField(i){
    //     console.log('test');
    //     let field = document.createElement("form");
    //     field.setAttribute('method', 'post');

    //     let nameFieldInput = document.createElement("input");
    //     nameFieldInput.setAttribute('type', 'text');
    //     nameFieldInput.setAttribute('name', i);
    //     nameFieldInput.setAttribute('placeholder', 'Nom de la tache...');

    //     field.appendChild(nameFieldInput);
        
    //     let currentButton = document.getElementById(i);

    //     document.getElementById(i).insertAdjacentElement('beforebegin', field);
    // };
</script>