<?php
namespace product\lib;

class Mail{
    public function getMailInfo($user_id, $db){
        $sender = "音楽ボランティア事務局";
        $table = "member";
        $column = "family_name, first_name, email";
        $where = "user_id=".$user_id;
        $data = $db->select($table, $column, $where);
        return $data;
    }

    public function sendMail($dataArr,$data, $user_id, $db){
            error_reporting(E_ALL ^ E_NOTICE);
            
            $mailFrom = "natsu.anatolia@gmail.com";
            $replyTo = $data[0]["email"];
            $adminEmail = "natsu.anatolia@gmail.com";
    
            $addHeader ="From:".mb_encode_mimeheader($sender)."<".$mailFrom.">\n";
            $addHeader .= "Reply-to: ".$replyTo."\n";
            $addHeader .= "X-Mailer: PHP/". phpversion();
    
            // 迷惑メール対策
            $addOption = '-f'.$mailFrom;
    
            //タイムスタンプ
            date_default_timezone_set('Asia/Tokyo');
            $timeStamp = time();
            $week = array('日', '月', '火', '水', '木', '金', '土');
            $dateFormatYMD = date('Y年m月d日',$timeStamp);
            $dateFormatHIS = date('H時i分s秒',$timeStamp);
            $weekFormat = "（".$week[date('w',$timeStamp)]."）";
            $outputDate = $dateFormatYMD.$weekFormat.$dateFormatHIS;
    
            //XSS対策用サニタイズ
            function h($str) {
                return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
            }
            $name = h($data[0]["family_name"].$data[0]["first_name"]);
            $date = h($dataArr["year"]."年".$dataArr["month"]."月".$dataArr["day"]."日");
            $time = h($dataArr["start_hour"]."時".$dataArr["start_min"]."分～".$dataArr["finish_hour"]."時".$dataArr["finish_min"]."分");
            $venue = h($dataArr["venue"]);
            $address = h($dataArr["address"]);
    
            $messageUser = <<<EOM
            お問い合わせありがとうございました。
            下記の内容で承りました。
            ----------------------------------------------------------
    
            【お名前】{$name}
            【日程】{$date}
            【時間】{$time}
            【施設名】{$venue}
            【住所】{$address}
    
            ----------------------------------------------------------
            折り返し返信させていただきます。
            EOM;
    
            $messageAdmin = <<<EOM
            下記の内容でお問い合わせがありました。
            ----------------------------------------------------------
    
            【お名前】{$name}
            【日程】{$date}
            【時間】{$time}
            【施設名】{$venue}
            【住所】{$address}
    
            ----------------------------------------------------------
            EOM;
    
            mb_language("ja");
            mb_internal_encoding("UTF-8");
            //自動返信メール設定
            mb_send_mail($replyTo, "お問いあわせありがとうございます。", $messageUser, $addHeader, $addOption);
            //管理者用メール設定
            mb_send_mail($adminEmail, "お問い合わせ", $messageAdmin, $addHeader, $addOption);
        }

}

?>