<?php 

?>

<div class="nmp-nutrition-facts-wrapper plugins">

<div class="nmp-nutrition-facts-title-wrapper">
  <label>Title<input 
    class="nmp-nutrition-facts-title" 
    name="nmp-nutrition-facts[title]" 
    type="text" 
    maxlength="50"
    <?php if(isset($nm_nutrition_facts['title'])): ?>
      value="<?php echo $nm_nutrition_facts['title']; ?>"
    <?php endif; ?>
    >
  </label>
</div>

  <div class="nmp-nutrition-facts-rows">
    
    <div class="nmp-nutrition-facts-row-prototype">          
      <label>Nutrient
        <input class="nmp-nutrition-facts-nutrient" type="text" maxlength="50">
      </label>              
      <label>Value
        <input class="nmp-nutrition-facts-value" type="text" maxlength="25">
      </label>  
      <a href="#" class="nmp-move-nutrition-fact-up"><span class="dashicons dashicons-arrow-up-alt"></span></a>
      <a href="#" class="nmp-move-nutrition-fact-down"><span class="dashicons dashicons-arrow-down-alt"></span></a>
      <a href="#" class="nmp-remove-nutrition-fact delete" id="nmp-remove-nutrition-fact">Remove</a>      
    </div>  
    
    <?php if (!empty($nm_nutrition_facts['facts'] ) && is_array($nm_nutrition_facts['facts'])): ?>
      <?php $key = 0; ?>
      <?php foreach($nm_nutrition_facts['facts'] as $nutrition_fact): ?>
        <div class="nmp-nutrition-facts-row">          
          <label>Nutrient
            <input class="nmp-nutrition-facts-nutrient" name="nmp-nutrition-facts[facts][<?php echo $key; ?>][nutrient]" value="<?php echo $nutrition_fact['nutrient']; ?>" type="text" maxlength="50">
          </label>              
          <label>Value
            <input class="nmp-nutrition-facts-value" name="nmp-nutrition-facts[facts][<?php echo $key; ?>][value]" value="<?php echo $nutrition_fact['value']; ?>" type="text" maxlength="25">
          </label>  
          <a href="#" class="nmp-move-nutrition-fact-up"><span class="dashicons dashicons-arrow-up-alt"></span></a>
          <a href="#" class="nmp-move-nutrition-fact-down"><span class="dashicons dashicons-arrow-down-alt"></span></a>
          <a href="#" class="nmp-remove-nutrition-fact delete" id="nmp-remove-nutrition-fact">Remove</a>      
        </div>
        <?php $key++; ?>
      <?php endforeach; ?>
    <?php endif; ?>

  </div>  

  <button type="button" class="button" id="nmp-add-nutrition-fact" aria-expanded="false">Add new fact</button>
  
</div>