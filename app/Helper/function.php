<?php

function categoryParent($categories, $selected = 0, $parentId = 0,  $character = '') {
    foreach ($categories as $key => $item) {
        if ($item->parent_id == $parentId) {
            if ($selected == $item->id) {
                echo "<option value='$item->id' selected> $character $item->name </option>";
            } else {
                echo "<option value='$item->id' > $character $item->name </option>";
            }
            unset($categories[$key]);
            categoryParent($categories, $selected, $item->id, $character.'---');
        }
    }
}

function percent($sale, $price) {
    return round(($price - $sale) *100/$price);
}
