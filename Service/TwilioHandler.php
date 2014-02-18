<?php
    namespace Vresh\TwilioBundle\Service;
/**
 * This file is part of the VreshTwilioBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Fridolin Koch <info@fridokoch.de>
 */
class TwilioHandler
{
    /** @var  \Doctrine\ORM\EntityManager $em */
    private $em;


    /** @var  \Symfony\Bridge\Monolog\Logger $logger */
    private $logger;

    /** @var \Vresh\TwilioBundle\Service\TwilioWrapper $twilioWrapper */
    private $twilioWrapper;

    /**
     * @param EntityManager $em
     * @param Logger $logger
     * @param string $sid
     * @param string $token
     * @param null   $version
     * @param int    $retryAttempts
     */
    public function __construct($em, $logger, $sid, $token, $version = null, $retryAttempts = 1)
    {
        $this -> twilioWrapper =  new TwilioWrapper($sid, $token, $version, null, $retryAttempts);
        $this -> em  = $em;
        $this -> logger  = $logger;
    }


    public function sendText($to,$message)
    {
        //get a list of active CLIs
        //find one that hasnt been used much today
        //send the message
        //log that its been sent

        $telephoneNumber = $this -> em -> getRepository('VreshTwilioBundle:TelephoneNumber') ->findOneByEnabled(true);
        $from = $telephoneNumber -> getCli();


        $this -> twilioWrapper->account->messages->sendMessage($from,$to,$message);

        $this -> logger -> info('Message sent');
    }

}