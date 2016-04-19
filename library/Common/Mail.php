<?php
/**
 * Mail.php
 *
 * @copyright  Copyright 2013 MICROWAVE CO.,LTD. (http://www.micro-wave.net/)
 * @author     MICROWAVE
 */

/**
 * VN_Send mail
 * JP_メール送信
 *
 * @category   Zensho
 * @package    Zensho
 * @copyright  Copyright 2013 MICROWAVE CO.,LTD. (http://www.micro-wave.net/)
 * @author     MICROWAVE
 * @since      2013/06/01
 */
class Zensho_Mail {
    private $locales = array(
            'AF',
            'AM',
            'AR',
            'AS',
            'AZ',
            'BA',
            'BE',
            'BG',
            'BN',
            'BO',
            'BR',
            'BS',
            'CA',
            'CO',
            'CS',
            'CY',
            'DA',
            'DE',
            'DSB',
            'DV',
            'EL',
            'EN',
            'ES',
            'ET',
            'EU',
            'FA',
            'FI',
            'FIL',
            'FO',
            'FR',
            'FY',
            'GA',
            'GD',
            'GL',
            'GSW',
            'GU',
            'HA',
            'HE',
            'HI',
            'HR',
            'HSB',
            'HU',
            'HY',
            'ID',
            'IG',
            'II',
            'IS',
            'IT',
            'IT',
            'IU',
            'JA',
            'KA',
            'KK',
            'KL',
            'KM',
            'KN',
            'KOK',
            'KO',
            'KY',
            'LB',
            'LO',
            'LT',
            'LV',
            'MI',
            'MK',
            'ML',
            'MN',
            'MN',
            'MOH',
            'MR',
            'MS',
            'MT',
            'NB',
            'NE',
            'NL',
            'NN',
            'NSO',
            'OC',
            'OR',
            'PA',
            'PL',
            'PRS',
            'PS',
            'PT',
            'QUT',
            'QUZ',
            'QUZ',
            'QUZ',
            'RM',
            'RO',
            'RU',
            'RW',
            'SAH',
            'SA',
            'SE',
            'SE',
            'SE',
            'SI',
            'SK',
            'SL',
            'SMA',
            'SMA',
            'SMJ',
            'SMJ',
            'SMN',
            'SMS',
            'SQ',
            'SR',
            'SV',
            'SW',
            'SYR',
            'TA',
            'TE',
            'TG',
            'TH',
            'TK',
            'TN',
            'TR',
            'TT',
            'TZM',
            'UG',
            'UK',
            'UZ',
            'VI',
            'WO',
            'XH',
            'YO',
            'ZH',
            'ZU',);


    /**
     *
     * @param email $from
     * @param string $from_name
     * @param email $to
     * @param parameter $options
     * @param string $template file template
    */
    function sendTemplate($from='', $from_name=NULL, $to='', $options=array(), $template='') {
        $locale = new Zend_Locale();
        $httpLang = strtoupper($locale->getLanguage());

        if (file_exists(MAIL_DIRECTORY_PATH . DS . $template)) {
            $file = MAIL_DIRECTORY_PATH . DS . $template;
        } else {
            throw new Mw_GyomuException(EN_8000);
        }
        $contentFile = file_get_contents($file);
        $arrayMail  = explode('[CONTENT]',$contentFile);
        $contentLang = preg_split("/\[$httpLang\]/", $arrayMail[1]);
        if (!isset($contentLang[1])){
            $contentLang = preg_split("/\[JA\]/", $arrayMail[1]);
        }
        if (isset($contentLang[1])){

            $locale = implode("\]|\[", $this->locales);

            preg_match_all("/(\[".$locale."\])(.*)/s", $contentLang[1], $contentArr);

            if (isset($contentArr[0][0])){
                $contentLang = str_replace($contentArr[0][0], "", $contentLang[1]);
            } else {
                $contentLang = $contentLang[1];
            }
        }
        $subject     = trim(str_replace('[SUBJECT]','',$arrayMail[0]));
        $content     = trim($contentLang);

        foreach ($options as $key => $val) {
            $subject = str_replace('<%'.$key.'%>', $val, $subject);
            $content = str_replace('<%'.$key.'%>', $val, $content);
        }

        return $this->send($from, $from_name, $to, $subject, $content);
    }

    /**
     *
     * @param email $from
     * @param string $from_name
     * @param email $to
     * @param string $subject
     * @param string $content
     * @return <Zend_Mail, Zend_Mail>|boolean
     */
    function send($from='', $from_name=NULL, $to='', $subject='', $content='') {
        $mailConfig = Zend_Registry::get('mailConfig');
        $config = array();

        if ($mailConfig->port     != '') $config['port']     = $mailConfig->port;
        if ($mailConfig->auth     != '') $config['auth']     = $mailConfig->auth;
        if ($mailConfig->username != '') $config['username'] = $mailConfig->username;
        if ($mailConfig->password != '') $config['password'] = $mailConfig->password;
        try {
            $transport = new Zend_Mail_Transport_Smtp($mailConfig->host, $config);

            $mail = new Zend_Mail("ISO-2022-JP");
            mb_language("japanese");
            mb_internal_encoding('UTF-8');
            $mail->setBodyText(mb_convert_encoding($content,'ISO-2022-JP','UTF-8'));
            $mail->setFrom($from, mb_encode_mimeheader(mb_convert_encoding($from_name,'ISO-2022-JP','UTF-8')));
            $mail->setSubject(mb_convert_encoding($subject,'ISO-2022-JP','UTF-8'));

            if (strpos($to, ',') !== false) {
                $to_arr = explode(',', $to);
                $is_send = false;
                foreach ($to_arr as $to_address) {
                    if (Zensho_Func::is_email($to_address)) {
                        $mail->addTo($to_address);
                        $is_send = true;
                    } else {
                        Mw_Log::error(json_encode(array('method'=>__METHOD__, 'email'=>$to, 'subject' => $subject)));
                    }
                }
                if (!$is_send) {
                    return false;
                }
            } else {
                $mail->addTo($to);
            }
            return $mail->send($transport);
        } catch (Exception $e){
            //throw new Mw_GyomuException(EN_8001);
            return false;
        }
    }
}