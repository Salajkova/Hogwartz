

<form method="POST">

    <input type="text" 
    name="first_name" 
    placeholder="Křestní jméno" 
    class="first_name" 
    required value="<?php echo htmlspecialchars($first_name) ?>"> <?php //Value je zde pro to, aby si formulář pamatoval přihlašování ?>

    <input type="text" 
    name="second_name" 
    placeholder="Příjmení" 
    class="second_name" 
    required value="<?php echo htmlspecialchars($second_name) ?>">

    <input type="number" 
    name="age" 
    placeholder="Věk" min="10" 
    required value="<?php echo htmlspecialchars($age) ?>">
    <input type="text" 
        name="college" 
        placeholder="Kolej" 
        value="<?php echo htmlspecialchars($college) ?>">
    
    
    <textarea name="life" placeholder="Podrobnosti o žákovi..." ><?php echo htmlspecialchars($life) //zavírací tag musí být přilípnutý hned za tím! ?> </textarea>

    

    <input type="submit" value="Uložit">
    
</form>