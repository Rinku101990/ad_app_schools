
        <div class="top-bar clearfix">
            <div class="page-title">
                <h4>Add Users</h4></div>
           
        </div>
        <div class="main-container">
            <div class="container-fluid">
               
               
                <div class="row gutter">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h4>Master Admin Information</h4></div>
                            <div class="panel-body">
                                <form method="post" action="" class="form-horizontal">
                                    <fieldset>
                                       
                                        <div class="form-group col-lg-4">
                                            <label class="col-lg-3 control-label">Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                        </div>
										 <div class="form-group col-lg-4">
                                            <label class="col-lg-3 control-label">Email</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                        </div>
										 <div class="form-group col-lg-4">
                                            <label class="col-lg-3 control-label">Mobile</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Country</label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="country">
                                                    <option value="">-- Select a country --</option>
                                                    <option value="fr">France</option>
                                                    <option value="de">Germany</option>
                                                    <option value="it">Italy</option>
                                                    <option value="jp">Japan</option>
                                                    <option value="ru">Russia</option>
                                                    <option value="gb">United Kingdom</option>
                                                    <option value="us">United State</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6 col-lg-offset-6">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="acceptTerms"> Accept the terms and policies</div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Regular expression based validators</legend>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Email Address</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Website</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="website" placeholder="http://">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">US Phone number</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="phoneNumberUS">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">IND Phone Number</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="phoneNumberUK">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Hex Color</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="color">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">US Zip Code</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="zipCode">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Identical Validator</legend>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Password</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Retype Password</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="confirmPassword">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Other Validators</legend>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Age</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="ages">
                                            </div>
                                        </div>
                                    </fieldset>
									  <fieldset>
									 <div class="form-group">
                                        <label class="control-label">Rating</label>
                                        <div class="input-group">
                                            <div class="round-radio">
                                                <input type="radio" value="terrible" id="terrible" name="ratingRadio" checked="">
                                                <label for="terrible"></label>
                                                <div class="cb-label">Terrible</div>
                                            </div>
                                            <div class="round-radio">
                                                <input type="radio" value="watchable" id="watchable" name="ratingRadio">
                                                <label for="watchable"></label>
                                                <div class="cb-label">Watchable</div>
                                            </div>
                                            <div class="round-radio">
                                                <input type="radio" value="bestEver" id="bestEver" name="ratingRadio">
                                                <label for="bestEver"></label>
                                                <div class="cb-label">Best ever</div>
                                            </div>
                                        </div>
                                    </div>
									 </fieldset>
                                    <div class="form-group">
                                        <div class="col-lg-6 col-lg-offset-6">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-tw">
                            <div class="panel-heading">
                                <h4>Credit Card Information</h4></div>
                            <div class="panel-body">
                                <form id="paymentForm" method="post" action="http://bootstrap.gallery/sunrise-admin-feb26/target.php">
                                    <div class="form-group">
                                        <div class="row gutter">
                                            <div class="col-md-12">
                                                <label class="control-label">Name</label>
                                                <input type="text" class="form-control" name="trailer">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row gutter">
                                            <div class="col-md-12">
                                                <label class="control-label">Credit Card Number</label>
                                                <input type="text" class="form-control" id="ccNumber">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row gutter">
                                            <div class="col-md-12">
                                                <label class="control-label">Expiration</label>
                                                <input type="text" class="form-control" placeholder="Month" data-stripe="exp-month">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row gutter">
                                            <div class="col-md-12">
                                                <label class="control-label">Expiration</label>
                                                <input type="text" class="form-control" placeholder="Year" data-stripe="exp-year">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row gutter">
                                            <div class="col-md-12">
                                                <label class="control-label">CVV</label>
                                                <input type="text" class="form-control cvvNumber" name="cvv">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group no-margin">
                                        <div class="row gutter">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-warning">Pay Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       