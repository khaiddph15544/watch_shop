<?php
    include_once "pdo.php";
    
    function slider_new($slider_name, $image, $create_at, $product_id){
        $sql = "INSERT INTO sliders(slider_name, image, create_at, product_id) VALUES (?, ?, ?, ?)";

        pdo_execute($sql, $slider_name, $image, $create_at, $product_id);
    }
    function slider_update($slider_name, $image, $update_at, $product_id, $slider_id){
        $sql = "UPDATE sliders SET slider_name = ?, image = ?, update_at = ?, product_id = ? WHERE slider_id = ?";

        pdo_execute($sql, $slider_name, $image, $update_at, $product_id, $slider_id);
    }
    function slider_delete($slider_id){
        $sql = "DELETE FROM sliders WHERE slider_id = ?";

        if(is_array($slider_id)){
            foreach($slider_id as $delId){
                pdo_execute($sql, $delId);
            }
        }
        else{
            pdo_execute($sql, $slider_id);
        }
    }
    function slider_select_all(){
        $sql = "SELECT * FROM sliders";

        return pdo_query($sql);
    }

    function slider_select_one($slider){
        $sql = "SELECT * FROM sliders WHERE slider_id = ?";

        return pdo_query_one($sql, $slider);
    }

?>