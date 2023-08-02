@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">Top Labels Over Line</h5>

            <form>
                <label class="form-group has-float-label">
                    <input class="form-control" />
                    <span>E-mail</span>
                </label>

                <label class="form-group has-float-label">
                    <input class="form-control" type="password" placeholder="" />
                    <span>Password</span>
                </label>


                <label class="form-group has-float-label">
                    <input data-role="tagsinput" type="text">
                    <span>Tags</span>
                </label>

                <label class="form-group has-float-label">
                    <input class="form-control datepicker" placeholder="">
                    <span>Date</span>
                </label>

                <label class="form-group has-float-label">
                    <select class="form-control select2-single" data-width="100%">
                        <option label="&nbsp;">&nbsp;</option>

                        <optgroup label="Alaskan/Hawaiian Time Zone">
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                        </optgroup>
                        <optgroup label="Pacific Time Zone">
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
                            <option value="OR">Oregon</option>
                            <option value="WA">Washington</option>
                        </optgroup>
                        <optgroup label="Mountain Time Zone">
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NM">New Mexico</option>
                            <option value="ND">North Dakota</option>
                            <option value="UT">Utah</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Central Time Zone">
                            <option value="AL">Alabama</option>
                            <option value="AR">Arkansas</option>
                            <option value="IL">Illinois</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="OK">Oklahoma</option>
                            <option value="SD">South Dakota</option>
                            <option value="TX">Texas</option>
                            <option value="TN">Tennessee</option>
                            <option value="WI">Wisconsin</option>
                        </optgroup>
                        <optgroup label="Eastern Time Zone">
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="IN">Indiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="OH">Ohio</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WV">West Virginia</option>
                        </optgroup>
                        <option value="TNOGZ" disabled="disabled">The No Optgroup Zone</option>
                        <option value="TPZ">The Panic Zone</option>
                        <option value="TTZ">The Twilight Zone</option>
                    </select>
                    <span>State</span>
                </label>


                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="customRadio"
                               class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Toggle this custom
                            radio</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="customRadio"
                               class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">Or toggle this other
                            custom radio</label>
                    </div>
                </div>

                <!--
                    Inline :
                    <div class="form-group">
                    <div class="d-inline-flex custom-control custom-radio">
                        <input type="radio" id="customRadioInline1" name="customRadioInline"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">Toggle this custom
                            radio</label>
                    </div>
                    <div class="d-inline-flex custom-control custom-radio">
                        <input type="radio" id="customRadioInline2" name="customRadioInline"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Or toggle this other
                            custom radio</label>
                    </div>
                </div> -->

                <button class="btn btn-primary" type="submit">Sign up</button>
            </form>
        </div>
    </div>

@endsection
