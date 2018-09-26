<?php

namespace Libraries\Email;

use Swift_Mailer;
use Swift_SmtpTransport;
use Swift_Message;

class Client
{
    /**
     * Transport object
     *
     * @var Swift_SmtpTransport
     */
    private $transport;

    /**
     * Mailer Object
     *
     * @var Swift_Mailer
     */
    private $mailer;

    /**
     * Mail message
     *
     * @var Swift_Message
     */
    private $message;

    /**
     * Client Construct
     *
     * @param string $email
     * @param string $password
     * @param string $host
     * @param integer $port
     * @param string $ssl
     */
    public function __construct($email, $password, $host='smtp.gmail.com', $port=465, $ssl='ssl')
    {
        $this->transport = (new Swift_SmtpTransport($host, $port, $ssl))
            ->setUsername($email)
            ->setPassword($password);

        $this->mailer = new Swift_Mailer($this->transport);
    }

    /**
     * Create new message
     *
     * @param array $from
     * @param array $to
     * @return Client
     */
    public function createMessage($subject, $from, $to)
    {
        $this->message = (new Swift_Message($subject))
            ->setFrom($from)
            ->setTo($to);

        return $this;
    }

    /**
     * Add body contect
     *
     * @param string $body
     * @return Client
     */
    public function setBody($body)
    {
        $this->message->setBody($body, 'text/html');
        return $this;
    }

    /**
     * Return a response from the emial
     *
     * @return void
     */
    public function send()
    {
        return $this->mailer->send($this->message);
    }
}