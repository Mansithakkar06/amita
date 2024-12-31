<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/websrc">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="sb-zhqtl25067585@business.example.com">
    <input type="hidden" name="item_name" value="Laptop"> 
    <input type="hidden" name="item_number" value="1"> 
    <input type="hidden" name="amount" value="200.00"> 
    <input type="hidden" name="no_shipping" value="0"> 
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="lc" value="AU">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="notify_url" value="http://localhost/amita/user/cart_demo.php">
    <input type="hidden" name="return" value="http://localhost/amita/user/cart_demo.php"> 
    <button type="submit" name ="pay">pay here</button>
</form>

<!-- 
    http://localhost/amita/user/cart_demo.php?pro_id=5
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
   <input type="hidden" name="cmd" value="_xclick">
   <input type="hidden" name="business" value="sb-jkekc25050688@business@example.com">
   <input type="hidden" name="item_name" value="Widget">
   <input type="hidden" name="amount" value="100">
   <input type="hidden" name="currency_code" value="USD">
   <input type="submit" value="here">
</form> -->
<!-- 
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  accept-charset="UTF-8" method="post" id="uc-paypal-wps-form">
<div>
<input type="hidden" name="cmd" id="edit-cmd" value="_cart"  />
<input type="hidden" name="charset" id="edit-charset" value="utf-8"  />
<input type="hidden" name="notify_url" id="edit-notify-url" value="https://xxxxxxxxxxx/xx/uc_paypal/ipn/84423"  />
<input type="hidden" name="cancel_return" id="edit-cancel-return" value="https://xxxxxxxxxxx/xx/uc_paypal/wps/cancel"  />
<input type="hidden" name="no_note" id="edit-no-note" value="1"  />
<input type="hidden" name="no_shipping" id="edit-no-shipping" value="1"  />
<input type="hidden" name="return" id="edit-return" value="https://xxxxxxxxxxx/xx/uc_paypal/wps/complete/84423"  />
<input type="hidden" name="rm" id="edit-rm" value="2"  />
<input type="hidden" name="currency_code" id="edit-currency-code" value="CAD"  />
<input type="hidden" name="handling_cart" id="edit-handling-cart" value="2.00"  />
<input type="hidden" name="invoice" id="edit-invoice" value="XXXXX-XXXXXXXXXX"  />
<input type="hidden" name="tax_cart" id="edit-tax-cart" value="0.35"  />
<input type="hidden" name="business" id="edit-business" value="sb-jkekc25050688@business@example.com"  />
<input type="hidden" name="upload" id="edit-upload" value="1"  />
<input type="hidden" name="lc" id="edit-lc" value="US"  />
<input type="hidden" name="address1" id="edit-address1" value="Some street"  />
<input type="hidden" name="city" id="edit-city" value="SomeCity"  />
<input type="hidden" name="country" id="edit-country" value="CA"  />
<input type="hidden" name="state" id="edit-state" value="AB"  />
<input type="hidden" name="zip" id="edit-zip" value="123"  />
<input type="hidden" name="amount_1" id="edit-amount-1" value="7.00"  />
<input type="hidden" name="item_name_1" id="edit-item-name-1" value="XXXXXXXX"  />
<input type="hidden" name="item_number_1" id="edit-item-number-1" value="XXXXX"  />
<input type="hidden" name="quantity_1" id="edit-quantity-1" value="1"  />
<input type="submit" name="op" id="edit-submit" value="Submit Order"  class="form-submit" />
</div></form> -->