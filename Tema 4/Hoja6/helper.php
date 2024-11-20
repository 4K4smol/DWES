<?php

    function validarRequerido(string $param):string
    {
        return !empty($param);
    }

    function validarNumero(int $num):int
    {
        return is_numeric($num);
    }

    function validarSubidaArchivo(array $file):bool
    {
        return is_uploaded_file($file['tmp_name']);
    }

    function validaFormato(string $format): bool
    {
        return in_array($format, ['jpeg', 'png']);
    }

    function cleanText(string $param):string
    {
        $allowed_fags = '<a><strong><em><h1><h2><h3><h4><span><p><em>';

        $stripped_param = strip_tags($param,$allowed_fags);

        return $stripped_param;

    }

    function sanizar(array $formData): array
    {
        foreach ($formData as $key => $value){
                $formData[$key] = cleanText($value);
        }
        return $formData;
    }

    function redirect(string $path):void
    {
        header("Location: {$path}");
        exit;
    }

?>