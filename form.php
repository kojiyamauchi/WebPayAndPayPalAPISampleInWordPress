<?php
/*
Template Name: form Page
*/
?>
<?php get_header(); ?>
<div id="contents">
<div id="planDetail">
  <h1>プラン詳細</h1>
</div>
<form action="../testconfirm" method="post" name="formPost" id="post">
<table>
  <tr>
    <th>名前</th>
    <td><input type="text" id="name" name="paymentName"/></td>
  </tr>
  
  <tr>
    <th>住所</th>
    <td><input type="text" id="paymentAddress" name="paymentAddress"/></td>
  </tr>
  <tr>
    <th>電話番号</th>
    <td><input type="text" id="paymentPhone" name="paymentPhone"/></td>
  </tr>
  <tr>
    <th>メールアドレス</th>
    <td><input type="text" id="paymentMailAddress" name="paymentMailAddress"/></td>
  </tr>

  <tr>
    <th>プラン</th>
    <td><select name="planSelect" id="planSelect" class="selectpicker">
        <option value="default"  selected>プランセレクト</option>
        <option value="KIMONO">KIMONO</option><!-- &yen;50000 -->
        <option value="HAKAMA">HAKAMA</option><!-- &yen;75000 -->
        <option value="HAORI">HAORI</option><!-- &yen;100000 -->
        <option value="SAKURA">SAKURA</option><!-- &yen;125000 -->
        <option value="FUJI">FUJI</option><!-- &yen;150000 -->
      </select>
      <select name="planNumberSelect" id="planNumberSelect" class="selectpicker">
        <option value="default"  selected>人数セレクト</option>
        <option value="1">1人</option>
        <option value="2">2人</option>
        <option value="3">3人</option>
        <option value="4">4人</option>
        <option value="5">5人</option>
      </select>
      <input type="hidden" name="planPrice" value="">
      <output name="total"></output></td>
  </tr>
  <tr>
    <th>料金支払い者名</th>
    <td><input type="text" id="payerName"  name="payerName"/></td>
  </tr>
</table>
<input class="btn btnSend" type="submit" name="submit" value="決済画面に進む">
</from>
</div>
<?php get_footer(); ?>
