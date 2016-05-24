<?php

class HTML
{
    function CreateTemplate($templateName, $data)
    {
        $location = "";
        switch ($templateName)
        {
            case "bienvenida":
                $name   = $data["name"];
                $email  = $data["email"];
                $pass   = $data["password"];
                $location = $this->CreateWelcomeHTML($name, $email, $pass);
                break;
            case "compra":
                $name   = $data["name"];
                $email  = $data["email"];
                $location = $this->CreateCompraHTML($name, $email);
                break;
            case "free":
                $name   = $data["name"];
                $email  = $data["email"];
                $pass   = $data["password"];
                $location = $this->CreateFreeHTML($name, $email, $pass);
                break;
            case "recuperar":
                $email  = $data["email"];
                $url    = $data["url"];
                $location = $this->CreateRecuperarHTML($email, $url);
                break;
        }

        return $location;
    }

    private function CreateWelcomeHTML()
    {

    }
}