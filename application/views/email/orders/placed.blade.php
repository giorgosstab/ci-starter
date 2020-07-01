@extends('mail.html.layout')

@section('content')
    <!-- Email Body -->
    <tr>
        <td class="body" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; border-bottom: 1px solid #EDEFF2; border-top: 1px solid #EDEFF2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; margin: 0 auto; padding: 0; width: 800px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                <!-- Body content -->
                <tr>
                    <td class="content-cell" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                        <h1 style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #2F3133; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">Γειά σου, {{ $company }}</h1>
                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Σας ευχαριστούμε που επιλέξατε το <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">{{ config_item('base_url') }}</strong> Ακολουθεί μια σύνοψη της παραγγελίας σας.</p>
                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;"><br></p>
                        <h2 style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #2F3133; font-size: 16px; font-weight: bold; margin-top: 0; text-align: left;">Αριθμός παραγγελίας: #{{ $order_id }}</h2>
                        <table class="panel" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 0 0 21px;">
                            <tr>
                                <td class="panel-content" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #EDEFF2; padding: 16px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                    <tr>
                                        <td class="panel-item" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 0;">
                                            <h1 style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #2F3133; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">Προϊόντα Παραγγελίας</h1>
                                            <div class="table" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                <table style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 30px auto; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: white; padding-top: 8px; padding-right: 5px; padding-left: 5px; border-collapse: collapse;">
                                                <thead style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                    <tr>
                                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px solid #EDEFF2; padding-bottom: 8px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: left;">Κωδικός Προϊόντος</th>
                                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px solid #EDEFF2; padding-bottom: 8px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: left;">Όνομα Προϊόντος</th>
                                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px solid #EDEFF2; padding-bottom: 8px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;">Ποσότητα</th>
                                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px solid #EDEFF2; padding-bottom: 8px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;">Τιμή Μονάδας</th>
                                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px solid #EDEFF2; padding-bottom: 8px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;">Σύνολό Φ.Π.Α</th>
                                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px solid #EDEFF2; padding-bottom: 8px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;">Σύνολό Προϊόντος</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                    @foreach($order_products as $product)
                                                        <tr>
                                                            <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $product->model }}</td>
                                                            <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: left;">
                                                                {{ $product->name }}<br>
                                                                @foreach($product->order_options as $key => $order_option)
                                                                    @if($key == 0)
                                                                        -<small>Μέγεθος: {{ $order_option->name }}</small><br>
                                                                    @endif
                                                                    @if($key == 1)
                                                                        -<small>Χρώμα: {{ $order_option->name }}</small><br>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;">{{ $product->quantity }}</td>
                                                            <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;">{{ price_format($product->price, 2) }}</td>
                                                            <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;">{{ price_format($product->tax * $product->quantity, 2) }}</td>
                                                            <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;">{{ price_format($product->price * $product->quantity, 2) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr style="background-color: #f2f2f2;">
                                                        <td colspan="2" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;"><strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Σύνολο:</strong></td>
                                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;"><strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">{{ $total_quantity }} τμχ</strong></td>
                                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;"><strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">{{ price_format($total_prices, 2) }}</strong></td>
                                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;"><strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">{{ price_format($total_tax, 2) }}</strong></td>
                                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: right;"><strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">{{ price_format($totals, 2) }}</strong></td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table class="panel" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 0 0 21px;">
                            <tr>
                                <td class="panel-content" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #EDEFF2; padding: 16px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                    <tr>
                                        <td class="panel-item" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 0;">
                                            <h1 style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #2F3133; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">Επιπλέον Στοιχεία</h1>
                                            <div class="table" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                <table style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 30px auto; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: white; padding-top: 8px; padding-right: 5px; padding-left: 5px; border-collapse: collapse;">
                                                    <thead style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                        <tr>
                                                            <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px solid #EDEFF2; padding-bottom: 8px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: left;">Στοιχεία πελάτη</th>
                                                            <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px solid #EDEFF2; padding-bottom: 8px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: center;">Έξτρα Πληροφορίες</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                        <tr>
                                                            <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: left;">
                                                                <ul style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; line-height: 1.4; text-align: left; list-style: none;">
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Εταιρία:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $company }}</span>
                                                                    </li>
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Α.Φ.Μ:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $afm }}</span>
                                                                    </li>
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Δ.Ο.Υ:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $doy }}</span>
                                                                    </li>
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">E-Mail:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $email }}</span>
                                                                    </li>
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Διεύθυνση:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $address }}</span>
                                                                    </li>
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Πόλη:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $city }}</span>
                                                                    </li>
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Τηλέφωνο:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $telephone }}</span>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                            <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; margin: 0; border: 1px solid #ddd; padding: 8px; text-align: center;">
                                                                <ul style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; line-height: 1.4; text-align: left; list-style: none;">
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Collection:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $collection }}</span>
                                                                    </li>
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Ημερομηνία παράδοσης:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $delivery_date }}</span>
                                                                    </li>
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Τρόπος λήψης παραγγελίας:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $order_way }}</span>
                                                                    </li>
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Ο Λαμβάνων την παραγγελία:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $order_recipient }}</span>
                                                                    </li>
                                                                    <li style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <strong style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">Τηλέφωνο πωλητή:</strong> <span style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px dotted #000;">{{ $telephone_seller }}</span>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        @include('mail.html.terms')
                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                            Με εκτίμηση,<br>
                            {{ config_item('name') }}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection