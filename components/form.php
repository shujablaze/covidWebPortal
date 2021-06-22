    
<h1><?php echo "{$title} form" ?></h1>
<form action="" method="POST">
    <div class="form__block">
        <label for="email" class="form__label">Email</label>
        <input type="email" id="email" class="form__input" name="email" value="<?php echo "$email"; ?>" required>
    </div>
    <div class="form__block">
        <label for="adharNo" class="form__label">Adhaar Number </label>
        <input type="text" id="adharNo" class="form__input" name="adhaar_no" value="<?php echo "$adhaar"; ?>" required>
    </div>
    <div class="form__block">
        <input type="submit" value="submit" class="btn btn-submit" name="formSubmit">
    </div>
</form>
