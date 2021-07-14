<div class="container">
    <div class="d-flex justify-content-center h-100">
        <section>
            
            <!-- Default form register -->
            <form class="text-center border border-light p-5" action="./login.php" method="post">

                <h3 class="mb-4">Personal Data</h3>

                <div  class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <label style="text-align:left" for="nm">First Name</label>
                        <input id="nm" type="text" name="nome" class="form-control" placeholder="Enter your name" maxlength="29" required>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <label for="cogn">Surname</label>
                        <input id="cogn" type="text" name="cognome" class="form-control" placeholder="Enter your surname" maxlength="29" required>
                    </div>
                </div>

                <!-- E-mail -->
                <label for="inputAddress">Email Address</label>
                <input type="email" id="Email" name="email" class="form-control mb-4" placeholder="E.g Mario.Rossi@unibo.it" required>

                <!-- Password -->
                <label for="pswd">Password</label>
                <input type="password"id="pswd" name="pass" class="form-control mb-4" placeholder="Enter a password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>
                <!--Password-->

                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter your residential address" maxlength="29" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" placeholder="E.g. Bolzano" name="city" maxlength="29" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select name="state" class="form-control" required>
                            <option value="Italy" label="Italy">Italy</option>
                            <option value="Albania" label="Albania">Albania</option>
                            <option value="Andorra" label="Andorra">Andorra</option>
                            <option value="Austria" label="Austria">Austria</option>
                            <option value="Belarus" label="Belarus">Belarus</option>
                            <option value="Belgium" label="Belgium">Belgium</option>
                            <option value="Bulgaria" label="Bulgaria">Bulgaria</option>
                            <option value="Croatia" label="Croatia">Croatia</option>
                            <option value="Cyprus" label="Cyprus">Cyprus</option>
                            <option value="Czech Republic" label="Czech Republic">Czech Republic</option>
                            <option value="Denmark" label="Denmark">Denmark</option>
                            <option value="Estonia" label="Estonia">Estonia</option>
                            <option value="Finland" label="Finland">Finland</option>
                            <option value="France" label="France">France</option>
                            <option value="Germany" label="Germany">Germany</option>
                            <option value="Gibraltar" label="Gibraltar">Gibraltar</option>
                            <option value="Greece" label="Greece">Greece</option>
                            <option value="Guernsey" label="Guernsey">Guernsey</option>
                            <option value="Hungary" label="Hungary">Hungary</option>
                            <option value="Iceland" label="Iceland">Iceland</option>
                            <option value="Ireland" label="Ireland">Ireland</option>
                            <option value="Jersey" label="Jersey">Jersey</option>
                            <option value="Latvia" label="Latvia">Latvia</option>
                            <option value="Liechtenstein" label="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania" label="Lithuania">Lithuania</option>
                            <option value="Luxembourg" label="Luxembourg">Luxembourg</option>
                            <option value="Macedonia" label="Macedonia">Macedonia</option>
                            <option value="Malta" label="Malta">Malta</option>
                            <option value="Moldova" label="Moldova">Moldova</option>
                            <option value="Monaco" label="Monaco">Monaco</option>
                            <option value="Montenegro" label="Montenegro">Montenegro</option>
                            <option value="Netherlands" label="Netherlands">Netherlands</option>
                            <option value="Norway" label="Norway">Norway</option>
                            <option value="Poland" label="Poland">Poland</option>
                            <option value="Portugal" label="Portugal">Portugal</option>
                            <option value="Romania" label="Romania">Romania</option>
                            <option value="Russia" label="Russia">Russia</option>
                            <option value="San Marino" label="San Marino">San Marino</option>
                            <option value="Serbia" label="Serbia">Serbia</option>
                            <option value="Slovakia" label="Slovakia">Slovakia</option>
                            <option value="Slovenia" label="Slovenia">Slovenia</option>
                            <option value="Spain" label="Spain">Spain</option>
                            <option value="Sweden" label="Sweden">Sweden</option>
                            <option value="Switzerland" label="Switzerland">Switzerland</option>
                            <option value="Ukraine" label="Ukraine">Ukraine</option>
                            <option value="United Kingdom" label="United Kingdom">United Kingdom</option>
                            <option value="Vatican City" label="Vatican City">Vatican City</option>
                            <option disabled> </option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">ZIP</label>
                        <input type="text" class="form-control" name="zip" placeholder="E.g. 10435" minlength="5" maxlength="5" required>
                    </div>
                </div>

                <hr>

                <h3 class="mb-4">Payment</h3>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" name="ccnumber" placeholder="Enter your credit card number" minlength="11" maxlength="16" pattern="[0-9]{11,16}" required>
                        
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration date</label>
                        <input type="text" class="form-control" name="ccexp" placeholder="mm/aa" required>
                        
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-ccv">CVV</label>
                        <input type="text" class="form-control" name="cccvv" placeholder="Enter your cvv" minlength="3" maxlength="3" required>
                        
                    </div>
                </div>
                <hr>

                <!-- Sign up button -->
                <button class="btn btn-dark my-4 btn-block waves-effect waves-light" type="submit">Sign Up</button>      

                <hr>
            </form>
            <!-- Default form register -->
        </section>
    </div>
    <div id="snackbar"></div>
</div>

