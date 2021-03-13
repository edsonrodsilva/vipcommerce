<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VipCommerce</title>
    <style type="text/css">
        body {
            margin: 0;
            min-width: 100% !important;
            color: #606062;
            font-family: arial;
            padding: 30px 20px 90px;
            background: #eaeced;
        }

        a:link {
            text-decoration: none;
        }

        .content {
            width: 100%;
            max-width: 600px;
        }

        .header {
            padding: 40px 30px 20px 30px;
        }

        .innerpadding {
            padding: 30px 30px 30px 30px;
        }

        .h1,
        .h2,
        .bodycopy {
            color: #606062;
            font-family: sans-serif;
        }

        .h1 {
            font-size: 33px;
            line-height: 38px;
            font-weight: bold;
        }

        .h2 {
            padding: 0 0 15px 0;
            font-size: 24px;
            line-height: 28px;
            font-weight: bold;
        }

        .bodycopy {
            font-size: 16px;
            line-height: 22px;
        }

        .button {
            text-align: center;
            font-size: 1em;
            font-family: sans-serif;
            font-weight: bold;
            padding: 0 30px 0 30px;
            border-radius: 15px;
            background-color: #7c945b;
        }

        .button a {
            color: #ffffff;
            text-decoration: none;
        }

        .button a:hover {
            color: #ccc;
        }

        .footer {
            padding: 20px 30px 15px 30px;
        }

        .footercopy {
            font-family: sans-serif;
            font-size: 14px;
            color: #ffffff;
        }

        .footercopy a {
            color: #ffffff;
            text-decoration: underline;
        }

        @media only screen and (max-width: 550px),
        screen and (max-device-width: 550px) {
            body .hide {
                display: none !important;
            }

            body .buttonwrapper {
                background-color: transparent !important;
            }

            body .button {
                padding: 0px !important;
            }

            body .button a {
                padding: 15px 15px 13px !important;
            }

            body .unsubscribe {
                display: block;
                margin-top: 20px;
                padding: 10px 50px;
                background: #2f3942;
                border-radius: 5px;
                text-decoration: none !important;
                font-weight: bold;
            }
        }
    </style>
</head>

<body bgcolor="">
    <table width="100%" bgcolor="" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <![endif]-->
                <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td bgcolor="" class="header">
                            <table border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 0 20px 20px 0;">
                                        {{-- <img width="250" src="{{ asset('/assets/emails/images/m2000-logo.png') }}" border="0" alt=""/> --}}
                                    </td>
                                </tr>
                            </table>
                            <!--[if (gte mso 9)|(IE)]>
                                <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td>
                                            <![endif]-->
                            <table class="col425" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                <tr>
                                    <td>
                                        <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <!--dados do cliente!-->
                                            <tr>
                                                <td colspan="5" align="center" class="h2" style="padding: 5px 0 0 0;">
                                                    Olá {{$order->client->name}}
                                                    <h3>Seu pedido foi gerado com sucesso! </h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" align="center" class="h2" style="padding: 5px 0 0 0;">
                                                    Número do pedido:
                                                    <p style="color:#69a315!important;margin-top: 6px!important;">{{$order->id}}</p>
                                                </td>
                                            </tr>
                                            <!--/dados do cliente!-->

                                            <tr>
                                                <td colspan="5" align="center" class="h2" style="padding: 5px 0 0 0;">
                                                    <p style="color:#69a315!important;margin-top: 6px!important; font-size:16px;text-decoration: underline;">INFORMAÇÕES DO SEU PEDIDO</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="10%" style="font-size: 13px!important;font-weight: bolder!important;border:1px solid;padding:3px;border-right: 0px!important;" colspan="1" align="center">Código</td>
                                                <td width="50%" style="font-size: 13px!important;font-weight: bolder!important;border:1px solid;padding:3px;border-right: 0px!important;" colspan="1" align="center">Poduto</td>
                                                <td width="10%" style="font-size: 13px!important;font-weight: bolder!important;border:1px solid;padding:3px;border-right: 0px!important;" colspan="1" align="center">Preço</td>
                                                <td width="10%" style="font-size: 13px!important;font-weight: bolder!important;border:1px solid;padding:3px;border-right: 0px!important;" colspan="1" align="center">Qtd.</td>
                                                <td width="10%" style="font-size: 13px!important;font-weight: bolder!important;border:1px solid;padding:3px;border-right: 0px!important;" colspan="1" align="center">Subtotal</td>
                                            </tr>

                                            <!--foreach produtos!-->
                                            @forelse($order->itens as $item)
                                            <tr>
                                                <td width="10%" style="font-size: 13px!important;font-weight: bolder!important;border:1px solid;padding:3px;border-right: 0px!important;">{{$item->id}}</td>
                                                <td width="50%" style="font-size: 13px!important;font-weight: bolder!important;border:1px solid;padding:3px;border-right: 0px!important;">{{ $item->product->name }}</td>
                                                <td class="10%" style="font-size: 13px!important;font-weight: bolder!important;border:1px solid;padding:3px;border-right: 0px!important;">R$ {{ AppHelperFunction::formatReal($item->price) }}</td>
                                                <td class="10%" style="font-size: 13px!important;font-weight: bolder!important;border:1px solid;padding:3px;border-right: 0px!important;">{{ $item->amount }}</td>
                                                <td class="10%" style="font-size: 13px!important;font-weight: bolder!important;border:1px solid;padding:3px;border-right: 0px!important;">R$ {{ AppHelperFunction::formatReal($item->price * $item->amount) }}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5"></td>
                                            </tr>
                                        </table>
                                        <!--/foreach produtos!-->

                                        <!--footer!-->
                                        <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="20%" style="font-size: 13px!important;border-bottom:1px solid;padding:3px;border-right: 0px!important;border-top: 0px!important;" colspan="2" align="center" style="padding: 5px 0 0 0;"></td>
                                                <td width="60%" style="font-size: 13px!important;border-bottom:1px solid;padding:3px;border-right: 0px!important;border-top: 0px!important;" colspan="2" align="right" style="padding: 5px 0 0 0;">Valor:</td>
                                                <td width="20%" style="font-size: 13px!important;border-bottom:1px solid;padding:3px;border-top: 0px!important;" colspan="1" align="right" style="padding: 5px 0 0 0;">R$ {{AppHelperFunction::formatReal($order->id)}}</td>
                                            </tr>

                                            <tr>
                                                <td width="20%" style="font-size: 13px!important;border-bottom:1px solid;padding:3px;border-right: 0px!important;border-top: 0px!important;" colspan="2" align="center" style="padding: 5px 0 0 0;"></td>
                                                <td width="60%" style="font-size: 13px!important;border-bottom:1px solid;padding:3px;border-right: 0px!important;border-top: 0px!important;" colspan="2" align="right" style="padding: 5px 0 0 0;">Total:</td>
                                                <td width="20%" style="font-size: 13px!important;border-bottom:1px solid;padding:3px;border-top: 0px!important;" colspan="1" align="right" style="padding: 5px 0 0 0;">R$ {{AppHelperFunction::formatReal($order->id)}}</td>
                                            </tr>

                                        </table>
                                        <!--/footer!-->
                                    </td>
                                </tr>
                            </table>

                            <!--[if (gte mso 9)|(IE)]>
                                </td>
                                </tr>
                                </table>
                                <![endif]-->
                        </td>
                    </tr>

                    <tr>
                        <td align="center" class="innerpadding bodycopy">
                            <p>Dúvidas ou sugestões, envie email para x.x.com.br</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
            </td>
        </tr>
    </table>
</body>

</html>
