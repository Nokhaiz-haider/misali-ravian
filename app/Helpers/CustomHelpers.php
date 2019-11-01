<?php
    function setActive($path,$class_name = "is-active")
        {
            return Request::path() === $path ? $class_name : "";
        }
?>