<?php
/*
Template Name: Confirm Page
*/
?>
<?php get_header(); ?>
<?php require 'webpayConfig.php'; ?>
<?php
$planSelect = $_POST['planSelect'];
$planPrice = $_POST['planPrice'];
$planNumberSelect = $_POST['planNumberSelect'];
$total = $planPrice * $planNumberSelect;
?>
<div id="contents" class="clearfix">
  <h1>確認</h1>
  <table>
    <tr>
      <th>名前</th>
      <td><p><?php echo $_POST['paymentName']; ?></p></td>
    </tr>
    
    <tr>
      <th>住所</th>
      <td><p><?php echo $_POST['paymentAddress']; ?></p></td>
    </tr>
    <tr>
      <th>電話番号</th>
      <td><p><?php echo $_POST['paymentPhone']; ?></p></td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td><p><?php echo $_POST['paymentMailAddress']; ?></p></td>
    </tr>

    <tr>
      <th>プラン</th>
      <td><p><?php echo $_POST['planSelect'].'プラン'; ?></p></td>
    </tr>
    <tr>
      <th>人数</th>
      <td><p><?php echo $_POST['planNumberSelect'].'人'; ?></p></td>
    </tr>
    <tr>
      <th>合計金額</th>
      <td><p><?php echo '&yen;'.$total; ?></p></td>
    </tr>
    <tr>
      <th>料金支払い名義</th>
      <td><p><?php echo $_POST['payerName']; ?></p></td>
    </tr>
  </table>

  <!-- PayPal -->
  <form action="<?php bloginfo('template_url'); ?>/expresscheckout.php" method="post" class="payPalButton">
    <!-- testHiddenData -->
    <input type="hidden" name="planSelect" value="<?php echo $planSelect; ?>">
    <input type="hidden" name="planNumberSelect" value="<?php echo $planNumberSelect; ?>">
    <input type="hidden" name="planPrice" value="<?php echo $planPrice; ?>">
<!-- testHiddenDataEnd -->
    <input type="hidden" name="Payment_Amount" value="<?php echo $total; ?>">
    <input class="btn btnSend" type="submit" name="submit" value="PayPalで決済">
  </form>

  <!-- WebPay -->
  <form action="<?php bloginfo('url'); ?>/testwebpaycharge" method="post" class="webPayButton">
    <input type="hidden" name="paymentMailAddress" value="<?php echo $_POST['paymentMailAddress']; ?>">
    <input type="hidden" name="amount" value="<?php echo $total; ?>">

    <script src="https://checkout.webpay.jp/v2/" class="webpay-button"
            data-lang="ja"
            data-key="<?php echo PUBLIC_KEY; ?>" data-text="クレジットカードで決済"></script>
  </form>
</div>
<?php get_footer(); ?>
