<aside  class="col-12 col-md-4 col-xl-4 pt-2">

<!--total cart -->
<div class="mb-3">
  <div class="pt-4">
    <h5 class="mb-3">Cart Amount</h5>
    <ul class="list-group list-group-flush">
      <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
        Products
        <span class="totals-value" id="cart-subtotal"><?php echo $amount ?>€</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
        VAT
        <span class="totals-value" id="cart-tax"><?php echo ($amount * 0.22) ?>€</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
        <div>
          <strong>Total</strong>
          <p class="mb-0"><strong></strong>(VAT Included)</p>
        </div>
        <span><strong class="cart-total"><?php echo ($amount * 1.22) ?>€</strong></span>
      </li>
    </ul>
    <a href="./checkout-data.php"><button type="button" class="btn btn-dark btn-block">Checkout</button></a>
  </div>
</div>
<!-- total cart -->

</aside>