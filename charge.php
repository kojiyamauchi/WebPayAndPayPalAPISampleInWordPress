<?php
/*
Template Name: WebPay Charge Page
*/
?>
<?php
require 'webpay-php-full-2.2.2/autoload.php';
use WebPay\WebPay;

require 'webpayConfig.php';

// 支払金額。実際には商品番号などを送信し、それに対応する金額をデータベースから引きます
$amount = $_POST['amount'];
// トークン
$token = $_POST['webpay-token'];

// WebPayインスタンスを非公開
$webpay = new WebPay(SECRET_KEY);
//暫定コメントアウト$webpay->acceptLanguage('ja');

try {
    // 決済を実行
    $result = $webpay->charge->create(array(
       'amount' => intval($amount, 10),
       'currency' => 'jpy',
       'card' => $token,
       'description' => 'PHP からのアイテムの購入',
    ));
    // 以下エラーハンドリング
} catch (\WebPay\ErrorResponse\CardException $e) {
    $data = $e->getData()->error;
    // カードが拒否された場合
    echo 'Status is:'.$e->getStatus()."\n";
    echo 'Type is:'.$data->type."\n";
    echo 'Code is:'.$data->code."\n";
    echo 'Param is:'.$data->param."\n";
    echo 'Message is:'.$data->message."\n";
    exit('Error');
} catch (\WebPay\ErrorResponse\InvalidRequestException $e) {
    // リクエストで指定したパラメータが不正な場合
    echo "InvalidRequestException\n";
    echo 'Param is:'.$e->getParam()."\n";
    echo 'Message is:'.$e->getMessage()."\n";
    exit('Error');
} catch (\WebPay\ErrorResponse\AuthenticationException $e) {
    // 認証に失敗した場合
    echo "AuthenticationException\n";
    echo 'Param is:'.$e->getParam()."\n";
    echo 'Message is:'.$e->getMessage()."\n";
    exit('Error');
} catch (\WebPay\ErrorResponse\ApiException $e) {
    // WebPayのサーバでエラーが起きた場合
    echo "ApiException\n";
    echo 'Message is:'.$e->getMessage()."\n";
    exit('Error');
} catch (\WebPay\ApiConnectionException $e) {
    // APIへの接続エラーが起きた場合
    echo "ApiConnectionException\n";
    echo 'Message is:'.$e->getMessage()."\n";
    exit('Error');
} catch (\WebPay\InvalidRequestException $e) {
    // リクエストで指定したパラメータが不正で、リクエストがおこなえなかった場合
    echo 'InvalidRequestException';
    echo 'Message is:'.$e->getMessage()."\n";
    exit('Error');
} catch (\Exception $e) {
    // WebPayとは関係ない例外の場合
    echo "Unexpected exception\n";
    echo 'Message is:'.$e->getMessage()."\n";
    exit('Error');
}
//ヒデジ Writing.
print_r($result);
// 処理終了後、 https://webpay.jp/test/charges で課金が発生したことが分かります。
?>

<?php get_header(); ?>
<div id="contents">
  <h1>完了</h1>
  <h2 class="testcomplete">後程、メールでお知らせ致します。</h2>
  <ul>
  <li>お支払い金額: <?php echo $result->amount; ?></li>
  <li>カード名義: <?php echo $result->card->name; ?></li>
  <li>カード番号: ****-****-****-<?php echo $result->card->last4; ?></li>
  <li>メールアドレス: <?php echo $_POST['paymentMailAddress']; ?></li>
</ul>

  <p><a class="btn btn-default" href="<?php bloginfo('url'); ?>/testform" role="button">Page Back.</a></p>
</div>
<?php get_footer(); ?>
