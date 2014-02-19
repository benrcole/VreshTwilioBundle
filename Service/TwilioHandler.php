<?php
    namespace Vresh\TwilioBundle\Service;
    use Vresh\TwilioBundle\Entity\Message;
    use Vresh\TwilioBundle\Entity\TelephoneNumber;
    use Services_Twilio_RestException;
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
     */
    public function __construct($em, $logger,$wrapper)
    {
        $this -> twilioWrapper = $wrapper;
        $this -> em  = $em;
        $this -> logger  = $logger;
    }


    public function sendText($to,$messageText,$sendFrom=false)
    {
        //get a list of active CLIs
        //find one that hasnt been used much today
        //send the message
        //log that its been sent

        /** @var Message $message */
        $message=null;

        if(!$sendFrom){

            /** @var  \Vresh\TwilioBundle\Entity\TelephoneNumber $telephoneNumber */
            $telephoneNumber = $this -> em -> getRepository('VreshTwilioBundle:TelephoneNumber')
                ->findOneByEnabled(true);


            $query = $this -> em->createQuery(
                'SELECT t
                FROM VreshTwilioBundle:TelephoneNumber t
                WHERE t.enabled = :enabled
                AND t.sendCount < :limit
                ORDER BY t.sendCount ASC'
            )->setParameter('enabled', true)
            ->setParameter('limit', 500);

            $results = $query->getResult();

            if(!$results)
                throw new \Exception('No Telephone numbers available to use');

            $telephoneNumber = $results[0];

            $sendFrom = '+'.$telephoneNumber -> getCli();
            $message = new Message;
            $message -> setContent($messageText);
            $message -> setRecipient(str_replace('+','',$to));
            $message -> setTelephoneNumber($telephoneNumber);
            $telephoneNumber -> setSendCount($telephoneNumber -> getSendCount()+1);
            $this -> em -> persist($telephoneNumber);
            $this -> em -> persist($message);
        }

            $twMessage = $this -> twilioWrapper->account->messages->sendMessage($sendFrom,$to,$messageText);
            if($message){
                $message -> setVendorReference($twMessage -> sid);
                $this -> em -> persist($message);
            }

            $this -> logger -> info('Message sent to '.$to);
            $this -> em -> flush();
            return $twMessage -> sid;

    }

    public function purchaseNewTelephoneNumber($countryCode  = 'US')
    {

    }

    public function searchForTelephoneNumber($countryCode)
    {
        $numbers = $this -> twilioWrapper->account->available_phone_numbers->getList($countryCode, 'Local' );
        foreach($numbers->available_phone_numbers as $number) {
            echo $number->phone_number;
        }
    }

    public function purchaseTelephoneNumber($number)
    {
        $number = $this -> twilioWrapper ->account->incoming_phone_numbers->create(array(
                                                                        "PhoneNumber" => "+".$number
                                                                   ));

        pr($this -> twilioWrapper -> last_response);
        prd($number);
        if(/*success*/true)
        {
            $number = new TelephoneNumber;
            $number -> setCli($number);
            $this -> em -> persist($number);
            $this -> em -> flush();
        }
        pr($number);
        prd($number->sid);
    }

}