<?php

/**
 * Modelo del modulo Core que se encarga de inicializar  la clase de envio de correos
 */
class Core_Model_Mail
{
    /**
     * classe de  phpmailer
     * @var class
     */
    private $mail;

    /**
     * asigna los valores a la clase e instancia el phpMailer
     */
    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPSecure = "ssl";
        $this->mail->Host = "mail.feroldan.com";
        $this->mail->Port = 465;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = "notificaciones@feroldan.com";
        $this->mail->Password = "Fer.2023*";
        $this->mail->setFrom("email@omegasolucionesweb.com", "Feroldán");
    }
    /**
     * retorna la  instancia de email
     * @return class email
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * envia el correo
     * @return bool envia el estado del correo
     */
    public function sed()
    {
        if ($this->mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}
