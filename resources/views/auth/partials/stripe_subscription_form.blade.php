<div class="register-box-body">
    <p class="login-box-msg">Payment mode</p>

    <form action="{{url('subscription_payment')}}" method="POST" id="payment-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <span class="payment-errors"></span>

        <div class="form-group has-feedback">
            <input class="form-control" type="text" placeholder="Card Number" size="20" data-stripe="number"
                   value="4242424242424242"/>
            <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input class="form-control" type="text" placeholder="CVC" size="4" data-stripe="cvc"
                   value="213"/>
            <span class="glyphicon glyphicon-eye-open form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="form-group col-xs-4">
                <input class="form-control" placeholder="MM" type="text" size="2" data-stripe="exp-month"
                       value="05"/>
                <!--span class="glyphicon glyphicon-envelope form-control-feedback"></span-->
            </div>
            <div class="form-group col-xs-8">
                <input type="text" size="4" placeholder="YYYY" class="form-control" data-stripe="exp-year"
                       value="2020"/>
                <!--span class="glyphicon glyphicon-envelope form-control-feedback"></span-->
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat">Check Card</button>
    </form>
</div>