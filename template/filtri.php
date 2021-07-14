<aside class="col-12 col-md-4 col-xl-3 pt-2" id="filters">
    <button type="button" class="btn btn-block btn-dark ml-2" data-toggle="collapse" data-target="#filtri">Filter</button>
    <div class="list-group collapse ml-3" id="filtri">
        
        <div class="list-group-item">
            <fieldset>
                <legend>Band</legend>
                <?php foreach ($bands as $band) : ?>
                <div class="radio">
                    <input id="<?php echo $band['Band']; ?>" type="radio" name="band">
                    <label for="<?php echo $band['Band']; ?>"> <?php echo $band['Band']; ?></label>
                </div>
                <?php endforeach ?>
            </fieldset>
            <button id="clear1" type="button" class="btn btn-outline-dark btn-sm">Clear</button>
        </div>
        


        <div class="list-group-item">
            <fieldset>
                <legend>Genre</legend>
                <?php foreach ($genres as $genre) : ?>
                <div class="radio">
                    <input id="<?php echo $genre['Genere']; ?>" type="radio" name="genre">
                    <label for="<?php echo $genre['Genere']; ?>"> <?php echo $genre['Genere']; ?></label>
                </div>
                <?php endforeach ?>
            </fieldset>
            <button id="clear2" type="button" class="btn btn-outline-dark btn-sm">Clear</button>
        </div>
        
        <div class="list-group-item">
            <fieldset>
                <legend>Year</legend>
                <?php foreach ($years as $year) : ?>
                <div class="radio">
                    <input id="<?php echo $year['Anno']; ?>" type="radio" name="year">
                    <label for="<?php echo $year['Anno']; ?>"> <?php echo $year['Anno']; ?></label>
                </div>
                <?php endforeach ?>
            </fieldset>
            <button id="clear3" type="button" class="btn btn-outline-dark btn-sm">Clear</button>
        </div>

    </div>
</aside>    