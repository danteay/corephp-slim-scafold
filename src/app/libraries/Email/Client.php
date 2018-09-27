<?php
/**
 * Client of Email services
 *
 * PHP Version 7.1
 *
 * @category  Scafolding
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */

namespace Libraries\Email;

use Swift_Mailer;
use Swift_SmtpTransport;
use Swift_Message;

/**
 * Swift mailer Client
 *
 * @category  Library
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */
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
     * @param string  $email    User of the stp account
     * @param string  $password Password of the stp account
     * @param string  $host     Host of the stp account
     * @param integer $port     Stp port
     * @param string  $ssl      Use ssl? (ssl | null)
     */
    public function __construct($email, $password, $host = 'smtp.gmail.com', $port = 465, $ssl = 'ssl')
    {
        $this->transport = (new Swift_SmtpTransport($host, $port, $ssl))
            ->setUsername($email)
            ->setPassword($password);

        $this->mailer = new Swift_Mailer($this->transport);
    }

    /**
     * Create new message
     *
     * @param array $from Sender email
     * @param array $to   List of emails to send
     *
     * @return Client Self instance of client
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
     * @param string $body HTML body string
     *
     * @return Client Self instance of client
     */
    public function setBody($body)
    {
        $this->message->setBody($body, 'text/html');
        return $this;
    }

    /**
     * Return a response from the emial
     *
     * @return int Swift code
     */
    public function send()
    {
        return $this->mailer->send($this->message);
    }
}
